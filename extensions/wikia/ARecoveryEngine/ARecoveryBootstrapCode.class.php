<?php
class ARecoveryBootstrapCode {
	public static function getHeadBootstrapCode() {

		return (new ARecoveryModule())->isPageFairRecoveryEnabled() ?
			F::app()->sendRequest( 'ARecoveryEngineApiController', 'getPageFairBootstrapHead' ) :
			static::getBootstrapDisabledMessage('Head');
	}
	
	public static function getTopBodyBootstrapCode() {

		return (new ARecoveryModule())->isPageFairRecoveryEnabled() ?
			F::app()->sendRequest( 'ARecoveryEngineApiController', 'getPageFairBootstrapTopBody' ) :
			static::getBootstrapDisabledMessage('Top body');
	}

	public static function getBottomBodyBootstrapCode() {

		return (new ARecoveryModule())->isPageFairRecoveryEnabled() ?
			F::app()->sendRequest( 'ARecoveryEngineApiController', 'getPageFairBootstrapBottomBody' ) :
			static::getBootstrapDisabledMessage('Bottom body');
	}

	public static function getSourcePointBootstrapCode() {
		return (new ARecoveryModule())->isSourcePointRecoveryEnabled() ?
			F::app()->sendRequest( 'ARecoveryEngineApiController', 'getBootstrap' ) :
			static::getBootstrapDisabledMessage();
	}

	private static function getBootstrapDisabledMessage( $placement = '' ) {
		return PHP_EOL .
			'<!-- Recovery disabled. ' .
			$placement .
			'-->' .
			PHP_EOL;
	}
}