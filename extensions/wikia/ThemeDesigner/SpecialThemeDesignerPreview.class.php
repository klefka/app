<?php

class SpecialThemeDesignerPreview extends UnlistedSpecialPage {

	public function __construct() {
		parent::__construct( 'ThemeDesignerPreview', 'themedesignerpreview' );
	}

	public function execute( $par ) {
		global $wgOut, $wgExtensionsPath;

		// check rights
		if ( !ThemeDesignerHelper::checkAccess() ) {
			$this->displayRestrictionError();

			return;
		}

		$wgOut->allowClickjacking();

		$this->setHeaders();

		$wgOut->setPageTitle( 'Example Page Title' );

		$wgOut->addScript( '<script src="' . $wgExtensionsPath . '/wikia/ThemeDesigner/js/ThemeDesignerPreview.js"></script>' );
		$wgOut->addLink( [
			"type" => "text/css",
			"rel" => "stylesheet",
			"href" => AssetsManager::getInstance()->getSassCommonURL( '/extensions/wikia/ThemeDesigner/css/ThemeDesignerPreview.scss' ),
		] );

		$wgOut->addHtml( F::app()->renderView( 'ThemeDesigner', 'Preview' ) );

		// page header: use static date
		global $wgHooks;
		$wgHooks['PageHeaderIndexAfterExecute'][] = 'SpecialThemeDesignerPreview::modifyHeaderData';
	}

	/**
	 * Use fake data for page header when rendering page preview
	 *
	 * @author macbre
	 */
	static function modifyHeaderData(&$moduleObject, &$params) {
		global $wgExtensionsPath;

		// fake static data for ThemeDesignerPreview
		$moduleObject->revisions = array(
			'current' => array(
				'user' => 'foo',
				'avatarUrl' => "{$wgExtensionsPath}/wikia/ThemeDesigner/images/td-avatar.jpg",
				'link' => '<a>FunnyBunny</a>',
				'timestamp' => ''
			),
		);

		$moduleObject->categories = array("<a>More Sample</a>", "<a>Others</a>");
		$moduleObject->comments = 23;
		$moduleObject->pageSubtitle = false;
		$moduleObject->action = array("text" => "Edit this page");
		$moduleObject->actionImage = '';
		$moduleObject->actionName = 'edit';
		$moduleObject->dropdown = array(['title' => 'foo', 'text' => 'foo'], ['title' => 'bar', 'text' => 'bar']);

		return true;
	}
}
