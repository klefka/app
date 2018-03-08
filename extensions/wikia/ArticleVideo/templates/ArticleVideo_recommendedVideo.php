<div class="article-recommended-video-unit">
	<a class="article-recommended-video-unit__close-button">
		<?= DesignSystemHelper::renderSvg('wds-icons-cross', 'wds-icon wds-icon-tiny' ); ?>
	</a>
	<div class="article-recommended-videos-wrapper">
		<h2><strong>Fandom</strong>Video</h2>
		<section class="article-recommended-videos">
			<? foreach($videos as $video): ?>
				<div class="article-recommended-video">
					<div class="video" id="recommendedVideo<?= $video['mediaId'] ?>" data-media-id="<?= $video['mediaId'] ?>"></div>
					<div class="article-recommended-video-placeholder">
						<img src="<?= $video['image'] ?>">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="180" height="180" viewBox="0 0 180 180"><defs><rect id="b" width="150" height="150" rx="75"/><filter id="a" width="130%" height="130%" x="-15%" y="-15%" filterUnits="objectBoundingBox"><feOffset in="SourceAlpha" result="shadowOffsetOuter1"/><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="7.5"/><feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"/></filter></defs><g fill="none" fill-rule="evenodd"><g opacity=".9" transform="rotate(90 75 90)"><use fill="#000" filter="url(#a)" xlink:href="#b"/><use fill="#FFF" xlink:href="#b"/></g><path fill="#00D6D6" fill-rule="nonzero" d="M80.87 58.006l34.32 25.523c3.052 2.27 3.722 6.633 1.496 9.746a6.91 6.91 0 0 1-1.497 1.527l-34.32 25.523c-3.053 2.27-7.33 1.586-9.558-1.527A7.07 7.07 0 0 1 70 114.69V63.643c0-3.854 3.063-6.977 6.84-6.977 1.45 0 2.86.47 4.03 1.34z"/></g></svg>
					</div>
					<h3><?= $video['title'] ?></h3>
				</div>
			<? endforeach ?>
		</section>
	</div>
</div>
