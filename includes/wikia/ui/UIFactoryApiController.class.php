<?php

namespace Wikia\UI;

/**
 * Wikia\UI\UIFactoryController contains entry point for UI Styleguide ajax calls
 *
 * @author mech <mech@wikia-inc.com>
 */


class UIFactoryApiController extends \WikiaApiController {

	/**
	 * @desc Status code returned in json in case of an error
	 */
	const STATUS_ERROR = 0;

	/**
	 * @desc how long the response should be cached in varnish/browser
	 */
	const CLIENT_CACHE_VALIDITY = 86400; //24*60*60 = 24h

	/**
	 * @desc Status code returned in json when there were no errors
	 */
	const STATUS_OK = 1;

	/**
	 * Return configuration of UI Styleguide components
	 *
	 * @requestParam Array  $components list of component names
	 */
	public function getComponentsConfig() {

		$componentNames = $this->request->getArray( 'components', [] );
		$factory = Factory::getInstance();
		try {
			$components = $factory->init( $componentNames, false );
			if ( !is_array( $components ) ) {
				$components = [ $components ];
			}
		} catch( \Exception $e ) {
			$this->setVal( 'status', self::STATUS_ERROR );
			$this->setVal( 'errorMessage', $e->getMessage() );
			return;
		}

		$result = [];
		foreach( $components as $component ) {
			$componentResult = [];

			$componentResult[ 'templateVarsConfig' ] = $component->getTemplateVarsConfig();
			$componentResult[ 'templates' ] = [];
			foreach( array_keys( $componentResult[ 'templateVarsConfig' ] ) as $type ) {
				$componentResult[ 'templates' ][ $type ] = $factory->loadComponentTemplateContent( $component, $type );
			}
			$componentResult[ 'assets' ] = $factory->getComponentAssetsUrls( $component );
			$result[] = $componentResult;
		}
		$this->setVal( 'components', $result );
		$this->setVal( 'status', self::STATUS_OK );

		$this->response->setCacheValidity(
			self::CLIENT_CACHE_VALIDITY,
			self::CLIENT_CACHE_VALIDITY,
			array(
				\WikiaResponse::CACHE_TARGET_BROWSER,
				\WikiaResponse::CACHE_TARGET_VARNISH
			)
		);
	}

}
