<footer id=wkFtr>
	<a id=wkLogo href=http://wikia.com></a>
	<? if( !empty( $links ) ) :?>
		<ul>
			<? foreach( $links as $link ) :?>
				<li><?= $link ;?></li>
			<? endforeach ;?>
		</ul>
	<? endif ;?>
	<ul>
		<li><a href=?useskin=oasis id=wkFllSite><?= $wf->Msg('mobile-full-site') ;?></a></li>
		<li><?= $copyrightLink ;?></li>
		<li><a href="<?= $feedbackLink ;?>" target=_blank><?= $wf->Msg('wikiamobile-feedback') ;?></a></li>
	</ul>
</footer>
