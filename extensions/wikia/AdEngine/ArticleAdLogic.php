<?php
/* This script will look at the html of an article and evaluate it for ads, determining attributes like:
 * ) If it is a "short" article that should have no ads at all?
 * ) If it is a "long" article that can have additional ads in the left nav?
 * ) If it it an article with html that will collide with the Box Ad, so it should have a banner instead
 */

$wgExtensionCredits['other'][] = array(
        'name' => 'ArticleAdLogic',
        'author' => 'Nick Sullivan'
);

class ArticleAdLogic {

	// Play with these levels, once we get more test cases.
	const stubArticleThreshold = 400; // what defines a "stub" article, in characters.
	const shortArticleThreshold = 650; // what defines a "short" article, in pixel height
	const longArticleThreshold = 1200; // what defines a "long" article, in pixel height.
	const superLongArticleThreshold = 2500; // what defines a "super long" article, in pixel height. (3 skyscrapers)
	const collisionRankThreshold = .300;  // what collison score constitutes a collision. 0-1
	const firstHtmlThreshold = 1500; // Check this much of the html for collision causing tags
	const pixelThreshold = 350; // how many pixels for a "wide" object that will cause a collision, in pixels
	const percentThreshold = 50; // what % of the content is a "wide" table that will cause a collision
	const columnThreshold = 3; // what # of columns is a "wide" table that will cause a collision

	public static function isStubArticle($html) {
		wfProfileIn(__METHOD__);
		$length = strlen(strip_tags($html));
		$out = $length < self::stubArticleThreshold;
		self::adDebug("Article is $length characters. Check for stub article is " . var_export($out, true));
		wfProfileOut(__METHOD__);
		return $out;
	}

	public static function isShortArticle($html) {
		wfProfileIn(__METHOD__);
		$height = self::getArticleHeight($html);
		$out = $height < self::shortArticleThreshold;
		self::adDebug("Article is at least $height pixels high. Check for short article is " . var_export($out, true));
		wfProfileOut(__METHOD__);
		return $out;
	}

	public static function isLongArticle($html) {
		wfProfileIn(__METHOD__);
		$height = self::getArticleHeight($html);
		$out = $height > self::longArticleThreshold;
		self::adDebug("Article is at least $height pixels high. Check for long article is " . var_export($out, true));
		wfProfileOut(__METHOD__);
		return $out;
	}

	public static function isSuperLongArticle($html) {
		wfProfileIn(__METHOD__);
		$height = self::getArticleHeight($html);
		$out = $height > self::superLongArticleThreshold;
		self::adDebug("Article is at least $height pixels high. Check for super-long article is " . var_export($out, true));
		wfProfileOut(__METHOD__);
		return $out;
	}

	/* Note, this comment in the html is filled in by the hook AdEngineMagicWords */
	public static function hasWikiaMagicWord ($html, $word) {
		wfProfileIn(__METHOD__);
		$out = strpos($html, "<!--{$word}-->") !== false;
		self::adDebug( "Check for $word is ". var_export($out, true));
		wfProfileOut(__METHOD__);
		return $out;
	}

	/* Return the likelihood that there is a collision with the Box Ad
 	 * 1 - we are sure there is a collision.
 	 * 0 - we are sure there won't be.
 	 * num in between - we don't know, the higher the number the more likely
 	 *
 	 * Logic:
 	 * Check for a series of things known to cause collision. If found, increase score based
 	 * based on the likelihood of that item causing a collision, ala Mr. Bayes.
 	 */
	public static function getCollisionRank($html) {
		wfProfileIn(__METHOD__);

		$score = 0;

		$firstHtml = substr($html, 0, self::firstHtmlThreshold);

		// Look for html tags that may cause collisions, and evaluate them
		$tableFound = false;
		if (preg_match_all('/<(table|img|div)[^>]+>/is', $firstHtml, $matches, PREG_OFFSET_CAPTURE)){

			// PHP's preg_match_all return is a PITA to deal with
			for ($i = 0; $i < sizeof($matches[0]) && $score < 1; $i++){
				$wholetag = $matches[0][$i];
				$tag = $matches[1][$i][0];
				if (strtolower($tag) == 'table' ) $tableFound=true;

				$attr = self::getHtmlAttributes($matches[0][$i][0]);

				$tagscore = self::getTagCollisionScore($tag, $attr);
				self::adDebug("Collision score for $tag: $tagscore");
				$score += $tagscore;
			}
		}

		// For tables, check to see if we have a table that has a lot of columns.
		if ( $tableFound && $score < 1 ){
			$firstRow = substr($firstHtml, 0, stripos($firstHtml, '</tr>'));
			if (preg_match_all('/<\/[tT][HhDd]>/', $firstRow, $columnMatches)){
				$numColumns = count($columnMatches[0]);
				if ( $numColumns > self::columnThreshold ) {
					self::adDebug("Table with more than columnThreshold columns found ($numColumns)");
					$score += ($numColumns * .2);
				}
			}
		}

		// Score is between 0 and 1, so if it's over 1, reset it to 1
		if ($score > 1) $score = 1;
		$score = round($score, 3);
		self::adDebug("Overall Collision Rank: $score");

		wfProfileOut(__METHOD__);
		
		return $score;

	}


	/* Find out how naughty a particular tag is.*/
	private static function getTagCollisionScore($tag, $attr) {
		wfProfileIn(__METHOD__);

		switch (strtolower($tag)){
		  // The tag itself gets a store
		  case 'table':
			self::adDebug("Table found: " . print_r($attr, true));
		  	if (isset($attr['id']) && $attr['id'] == 'toc') {
				//This table is the Table of Contents and shouldn't cause a collision
				self::adDebug("Table is TOC");
				wfProfileOut(__METHOD__);
				return 0.02;
			}
			if (isset($attr['width'])){
				self::adDebug("Table has width attribute");
				if ( self::getPixels($attr['width']) >= self::pixelThreshold){
					self::adDebug("Table has width over pixel threshold of " . self::pixelThreshold);
					wfProfileOut(__METHOD__);
					return .75;
				} else if ( self::getPercentage($attr['width']) >= self::percentThreshold){
					self::adDebug("Table has width over percent threshold of " . self::percentThreshold);
					wfProfileOut(__METHOD__);
					return .75;
				} else {
					// Seems safe, % is low and pixels are low
					self::adDebug("Table has width, but seems ok");
					wfProfileOut(__METHOD__);
					return .05;
				}
			} else if (isset($attr['style'])){
				$cssattr=self::getCssAttributes($attr['style']);
				self::adDebug("Table has style attributes of: " . print_r($cssattr, true));

				if (!empty($cssattr['width'])){
					$pixels = self::getPixels($cssattr['width']);
					$percentage = self::getPercentage($cssattr['width']);

					if ($pixels >= self::pixelThreshold){
						self::adDebug("Table has style width over pixel threshold of " . self::pixelThreshold);
						wfProfileOut(__METHOD__);
						return .75;
					} else if ($percentage >= self::percentThreshold){
						self::adDebug("Table has style width over percent threshold of " . self::percentThreshold);
						wfProfileOut(__METHOD__);
						return .75;
					} else if ($pixels === false && $percentage === false ) {
						self::adDebug("Table has style width of an unrecognized unit");
						wfProfileOut(__METHOD__);
						return .05;
					}
				} else {
					// Seems safe, width is not defined via a style
					self::adDebug("Table has style, but seems ok");
					wfProfileOut(__METHOD__);
					return .03;
				}
			} else if (isset($attr['class'])){
				self::adDebug("Table has class attribute");
				// This table has a class, which may have width defined
				wfProfileOut(__METHOD__);
				return .1;
			} else if (isset($attr['id'])){
				self::adDebug("Table has id attribute");
				// This table has an id, which may have css styling and width defined
				wfProfileOut(__METHOD__);
				return .075;
			} else {
				// There is a table, but it seems harmless
				self::adDebug("Table seems ok");
				wfProfileOut(__METHOD__);
				return .05;
			}

		  case 'div':
			self::adDebug("Div found: " . print_r($attr, true));
			if (isset($attr['style'])){
				$cssattr = self::getCssAttributes($attr['style']);
				self::adDebug("Div has style attributes of: " . print_r($cssattr, true));
				if (!empty($cssattr['width'])){
					$pixels = self::getPixels($cssattr['width']);
					$percentage = self::getPercentage($cssattr['width']);

					if ($pixels >= self::pixelThreshold){
						self::adDebug("Div has style width over pixel threshold of " . self::pixelThreshold);
						wfProfileOut(__METHOD__);
						return .75;
					} else if ($percentage >= self::percentThreshold){
						self::adDebug("Div has style width over percent threshold of " . self::percentThreshold);
						wfProfileOut(__METHOD__);
						return .75;
					} else if ($pixels === false && $percentage === false ) {
						self::adDebug("Div has style width of an unrecognized unit");
						wfProfileOut(__METHOD__);
						return .10;
					}
				} else {
					// Has a style with a width, but seems narrow enough
					// Seems safe, % is low and pixels are low
					self::adDebug("Div has style, but no width defined");
					wfProfileOut(__METHOD__);
					return .015;
				}
			} else if (isset($attr['class'])){
				self::adDebug("Div has class attribute");
				// This div has a class, which may have width defined
				wfProfileOut(__METHOD__);
				return .015;
			}
			self::adDebug("Div seems harmless");
			wfProfileOut(__METHOD__);
			return 0;

		  case 'img':
			self::adDebug("Image found: " . print_r($attr, true));
			if (isset($attr['width']) && $attr['width'] >= self::pixelThreshold){
				self::adDebug("Image has width over pixel threshold of " . self::pixelThreshold . ", .75");
				wfProfileOut(__METHOD__);
				return .75;
			} else if (isset($attr['width'])){
				// Return a value proportional to the size of the image, where a $pixelThreshold wide
				$eachpixel = self::collisionRankThreshold/self::pixelThreshold;
				$out = round(($eachpixel * $attr['width'])/4, 3) ;
				self::adDebug("Image is {$attr['width']} pixels, $out");
				wfProfileOut(__METHOD__);
				return $out;
			} else {
				self::adDebug("No width set on image");
				wfProfileOut(__METHOD__);
				return .05;
			}

		  default :
			  wfProfileOut(__METHOD__);
			  return 0;
		}
	}



	public static function getPercentage($in) {
		$out = str_replace('%', '', $in);
		if ($out != $in ){
			return $out;
		} else {
			return false;
		}
	}

	/* Normalize the pixels. Possible values for 200 pixels include:
	 * 200
	 * 200px
 	 * 20em (yeah, not exact, but close enough)
 	 *
 	 * For any of the values
 	 */
	public static function getPixels($in) {
		$in = trim($in);
		if (preg_match('/^[0-9]+$/', $in)) {
			// Nothing but numbers.
			return $in;
		} else if (preg_match('/^([0-9]+)px/i', $in, $match)) {
			// NNNpx
			return $match[1];
		} else if (preg_match('/^([0-9]+)em/i', $in, $match)) {
			// Convert X em to X*10 em
			return $match[1] * 10;
		} else {
			return false;
		}
	}

	/* Based on our collision detection logic, figure out if we are displaying
	 * the leaderboard or the box ad. Return true for box ad, else false.
	 *
	 * Rules:
	 * 1) If magic word WIKIA_BANNER appears, return false
	 * 2) If magic word WIKIA_BOXAD appears, return true
	 * 3) If collisionRank is higher than collisionRankThreshold, return false
	 *
	 * Otherwise, return true.
	 */
	public static function isBoxAdArticle($html) {
		wfProfileIn(__METHOD__);

		static $lastMd5, $lastResult;

		$currentMd5 = md5($html);
		if ($currentMd5 === $lastMd5) {
			// function was called again with the same html as last time.
			wfProfileOut(__METHOD__);
			return $lastResult;
		}

		if (self::hasWikiaMagicWord($html, "__WIKIA_BANNER__")) {
			$result = false;
		} else if (self::hasWikiaMagicWord($html, "__WIKIA_BOXAD__")) {
			$result = true;
		} else if (self::getCollisionRank($html) >= self::collisionRankThreshold) {
			$result = false;
		} else {
			$result = true;
		}

		$lastMd5 = $currentMd5;
		$lastResult = $result;

		wfProfileOut(__METHOD__);
		return $result;
	}


	public static function isMainPage() {
		wfProfileIn(__METHOD__);
		global $wgTitle;

		$isMainPage = (
			is_object($wgTitle)
			&& $wgTitle->getArticleId() == Title::newMainPage()->getArticleId()
			&& $wgTitle->getArticleId() != 0 # caused problems on central due to NS_SPECIAL main page
			&& !self::isDiffPage()
			&& !self::isAnonPurgePrompt()
			&& !self::isActionPage()
		);

		wfProfileOut(__METHOD__);
		return $isMainPage;
	}

	public static function isArticlePage() {
		wfProfileIn(__METHOD__);
		global $wgOut;
		if (is_object($wgOut) &&
		    $wgOut->isArticle() &&
		    self::isContentPage()){

			wfProfileOut(__METHOD__);
			return true;
		} else {
			wfProfileOut(__METHOD__);
			return false;
		}
	}


	public static function isContentPage() {
		wfProfileIn(__METHOD__);
		global $wgTitle, $wgContentNamespaces;

		// not a content page if one of the weird edge cases occurs
		if ( self::isDiffPage() || self::isAnonPurgePrompt() || self::isActionPage() ) {
			wfProfileOut(__METHOD__);
			return false;
		}

		// actual content namespace check along with hardcoded override (main, image & category)
		// note this is NOT used in isMainPage() since that is to ignore content namespaces
		if (is_object($wgTitle)){
			wfProfileOut(__METHOD__);
			return in_array($wgTitle->getNamespace(), array_merge( $wgContentNamespaces, array(NS_MAIN, NS_IMAGE, NS_CATEGORY) ));
		} else {
			wfProfileOut(__METHOD__);
			return false;
		}
	}

	public static function isDiffPage() {
		global $wgRequest;
		return $wgRequest->getVal( 'diff' ) != '';
	}

	/*
	 * @author tor@wikia-inc.com
	 *
	 * Catch all check for page actions
	 */
	public static function isActionPage() {
		global $wgRequest;

		$noAdActions = array(
			'delete',
			'edit',
			'formedit',
			'watch',
			'unwatch',
			'protect',
			'unprotect',
			'rollback');

		return in_array($wgRequest->getVal( 'action' ), $noAdActions);
	}

	/*
	 * @author tor@wikia-inc.com
	 *
	 * Anons get an additional prompt when they try to purge a page,
	 * we don't want to display an ad on the prompt page,
	 * but we do if the page is actually purged
	 *
	 * @return boolean
	 */
	public static function isAnonPurgePrompt() {
		global $wgUser, $wgRequest;
		return ($wgRequest->getVal('action') == 'purge' && $wgUser->isAnon() && !$wgRequest->wasPosted());
	}

	public static function isMandatoryAd($slotname) {
		/* Ads that always display, even if user is logged in, etc.
  	 	* See http://staff.wikia-inc.com/wiki/DART_Implementation#When_to_show_ads */
		$mandatoryAds = array(
			'HOME_TOP_LEADERBOARD',
			'HOME_TOP_RIGHT_BOXAD',
			'LEFT_NAV_205x400'
		);

		// Certain ads always display
		return (
			AdEngine::getInstance()->getAdType($slotname) == 'spotlight'
			|| in_array($slotname, $mandatoryAds)
		);
	}


	public static function getCssAttributes($style){
		wfProfileIn(__METHOD__);
		$pattern = '/([a-zA-Z\-0-9]+)\:([^;]+);/';
		$attr = array();
		$style = trim($style, '; ') . ';';
		if (preg_match_all($pattern, $style, $attmatch)){
			for ($j = 0; $j<sizeof($attmatch[1]); $j++){
				$attr[$attmatch[1][$j]] = $attmatch[2][$j];
			}
		}
		wfProfileOut(__METHOD__);
		return $attr;
	}


	// Get attributes from html tag.
	// Note, this requires well-formed html with quoted attributes. Second regexp for poor html?
	public static function getHtmlAttributes($tag) {
		wfProfileIn(__METHOD__);
		$pattern = '/\s([a-zA-Z]+)\=[\x22\x27]([^\x22\x27]+)[\x22\x27]/';
		$attr = array();
		if (preg_match_all($pattern, $tag, $attmatch)){
			for ($j = 0; $j<sizeof($attmatch[1]); $j++){
				$attr[$attmatch[1][$j]] = $attmatch[2][$j];
			}
		}
		wfProfileOut(__METHOD__);
		return $attr;
	}


	public static function adDebug($msg){
		if (empty($_GET['adDebug'])){
			return;
		} else {
			$backtrace = debug_backtrace();
			echo "<font color='red'>Ad Debug from {$backtrace[1]['function']}: $msg</font><br />";
		}

	}


	/* Function to guess the height, in pixels of the supplied html */
	public static function getArticleHeight($html) {
		wfProfileIn(__METHOD__);
		
		static $lastMd5, $lastResult;

		$currentMd5 = md5($html);
		if ($currentMd5 == $lastMd5 ){
			// function was called again with the same html as last time.
			wfProfileOut(__METHOD__);
			return $lastResult;
		}

		/* First, measure the text. */
		$textOnly = strip_tags($html);
		$textOnlyLength = strlen($textOnly);
		self::adDebug("Article is $textOnlyLength characters.");
		$textHeight = round($textOnlyLength * self::getCharacterFactor());
		self::adDebug("Text height is $textHeight pixels.");

		// Next measure the html height
		$htmlHeight = self::getHtmlHeight($html);
		self::adDebug("Weighted HTML height is $htmlHeight pixels.");

		// Next look at images;
		$imageHeight = self::getImageHeight($html);
		self::adDebug("Weighted image height is $imageHeight pixels.");

		$result = $textHeight + $htmlHeight + $imageHeight;

		$lastMd5 = $currentMd5;
		$lastResult = $result;
		wfProfileOut(__METHOD__);
		return $result;
	}

	/* Get the mutiplier based on the number of pixels wide we expect the article area to be(articleAreaWidth).
	 * I used 4 data points to arrive at the multiplier:
	 * A 500x1000 div fits 3151 characters
	 * A 750x1000 div fits 4760 characters
	 * A 1000x1000 div fits 5430 characters
	 * A 1250x1000 div fits 6639 characters
	 * A 1500x1000 div fits 8463 characters
	 *
	 * Tested in Firefox 3, with negligible differences in other browsers.
	 * See testfiles/testHeight.html if you want to do your own experimenting
	 */
	public static function getCharacterFactor() {
		$usableWidth = self::getArticleAreaWidth();
		if ($usableWidth < 500) { return 1000/3151;
		} else if ($usableWidth < 750) { return 1000/4760;
		} else if ($usableWidth < 1000) { return 1000/5430;
		} else if ($usableWidth < 1250) { return 1000/6639;
		} else if ($usableWidth < 1500) { return 1000/8463;
		} else { return 1;
		}
	}

	public static function getArticleAreaWidth() {
		/* Average window width is 1100 (confirmed with the collision tester),
		 * note this is different from screen resolution reported by Google Analytics.
		 */

		$skin_name = RequestContext::getMain()->getSkin()->getSkinName();
		switch ($skin_name) {
			case 'monaco': return 1100; // Assume generous 1300 px browser width, subtract 200 for left nav
			case 'monobook': return 1030; // Assume generous 1300 px browser width, subtract 150 for left nav and 120 for right nav
			case 'uncyclopedia': return 1150; // Assume generous 1300 px browser width, subtract 150 for left nav
			default: return 1100;
		}
	}


	public static function getHtmlHeight($html) {
		wfProfileIn(__METHOD__);
		
		$height = 0;

		// Assume a minimum of number pixels for certian tags. In all likelihood it will be higher
		if (preg_match_all('/<(tr|div|ul)>/i', $html, $matches)){
			$height += 25 * count($matches[0]);
		}

		wfProfileOut(__METHOD__);

		return round($height);
	}



	public static function getImageHeight($html) {
		wfProfileIn(__METHOD__);
		
		$imageArea = 0;

		if (preg_match_all('/<img[^>]+>/is', $html, $matches)){

			// PHP's preg_match_all return is a PITA to deal with
			for ($i = 0; $i< sizeof($matches[0]); $i++){
				$wholetag = $matches[0][$i];

				$attr = self::getHtmlAttributes($matches[0][$i]);

				if (empty($attr['width']) || empty($attr['height'])){
					continue; // Shouldn't happen...
				}

				$imageArea =+ $imageArea + ($attr['width'] * $attr['height']);

			}
		}

		wfProfileOut(__METHOD__);
		
		// This assumes that all the images are perfectly arranged
		// unlikely best case scenario, but good minimum floor
		return round($imageArea / self::getArticleAreaWidth());
	}

	public static function isSearch() {
		wfProfileIn(__METHOD__);

		global $wgTitle;

		$searchPageNames = array('Search', 'WikiaSearch');

		wfProfileOut(__METHOD__);

		return !empty($wgTitle) && -1 == $wgTitle->getNamespace()
			&& in_array(array_shift(SpecialPageFactory::resolveAlias($wgTitle->getDBkey())), $searchPageNames);
	}

	public static function isForum() {
		global $wgEnableForumExt, $wgIsForum;
		return (!empty($wgEnableForumExt) && !empty($wgIsForum));
	}

	public static function isExtra() {
		wfProfileIn(__METHOD__);
		global $wgExtraNamespaces, $wgTitle;

		wfProfileOut(__METHOD__);
		return array_key_exists($wgTitle->getNamespace(), $wgExtraNamespaces);
	}

	public static function getPageType() {
		if (self::isMainPage()) {
			$type = "home";
		} elseif (self::isSearch()) {
			$type = "search";
		} elseif (self::isExtra()) {
			$type = 'extra';
		} else {
			$type = "article";
		}

		return $type;
	}

	public static function isWikiaHub() {
		wfProfileIn(__METHOD__);
		global $wgEnableWikiaHubsExt, $wgWikiaHubsPages, $wgTitle;
		
		$titleParts = explode('/', $wgTitle->getDBkey());
		$hub = false;
		if(!empty($wgEnableWikiaHubsExt)) {
			foreach($wgWikiaHubsPages as $hubGroup) {
				if(in_array($titleParts[0], $hubGroup)) {
					$hub = true;
				}
			}
		}

		wfProfileOut(__METHOD__);
		return $hub;
	}

	public static function isAdsEnabledOnWikiaHub() {
		wfProfileIn(__METHOD__);

		global $wgHubsAdsEnabled, $wgEnableWikiaHubsExt, $wgTitle;

		if (!empty($wgEnableWikiaHubsExt) && !empty($wgHubsAdsEnabled)) {
			if (in_array($wgTitle->getDBkey(), $wgHubsAdsEnabled)) {
				wfProfileOut(__METHOD__);
				return true;
			}
		}

		wfProfileOut(__METHOD__);
		return false;
	}
}
