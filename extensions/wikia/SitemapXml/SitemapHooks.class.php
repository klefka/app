<?php

class SitemapHooks {

	protected static function isSitemapTitle( Title $title ) {
		return $title->isSpecial( 'Sitemap' );
	}

	/**
	 * Disable title redirects for sitemaps, as we want to use the original request url rather than Special:Sitemap.
	 */
	public static function onBeforeTitleRedirect( WebRequest $request, Title $title ): bool {
		if ( self::isSitemapTitle( $title ) ) {
			return false;
		}
		return true;
	}

	public static function onTestCanonicalRedirect( WebRequest $request, Title $title, OutputPage $output ) {
		if ( !self::isSitemapTitle( $title ) ) {
			return true;
		}
		// Question 1: do we cancel a redirect for all alternative domains?
		$output->cancelRedirect( false );
		if ( $output->isRedirect() ) {
			// there is still a protocol redirect left, proceed with redirecting
			return true;
		}
		$request->response()->header( 'X-sitemaps-redirect-cancelled: 1' );
		// Override the wgServer so the sitemap uses host from the current request.
		// This needs to be done because WFL used the address from city_url
		global $wgServer;
		$currentUri = \WikiFactoryLoader::getCurrentRequestUri( $_SERVER, true, true );
		$parsed = parse_url( $currentUri );
		$wgServer = $parsed['scheme'] . '://' . $parsed['host'];	// TBD: need to care about language path?
		return false;
	}

}
