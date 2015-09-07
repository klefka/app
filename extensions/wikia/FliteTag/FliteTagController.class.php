<?php
class FliteTagController extends WikiaParserTagController {
	const MIN_SIZE = 1;
	const PARSER_TAG_NAME = 'flite';
	const GUID_PATTERN = '/[a-z0-9]{8,8}\-[a-z0-9]{4,4}\-[a-z0-9]{4,4}\-[a-z0-9]{4,4}\-[a-z0-9]{12,12}/';

	private $requiredParams = [ 'guid', 'width', 'height' ];

	public static function onParserFirstCallInit( Parser $parser ) {
		$parser->setHook( self::PARSER_TAG_NAME, [ new static(), 'renderFliteAdUnit' ] );
		return true;
	}

	public function renderFliteAdUnit( $input, array $args, Parser $parser, PPFrame $frame ) {
		$errorMessage = '';
		if( !$this->areTagParamsValid($args, $errorMessage) ) {
			return $this->sendRequest(
				'FliteTagController',
				'fliteTagError',
				[ 'errorMessage' => $errorMessage ]
			);
		}

		return $this->sendRequest(
			'FliteTagController',
			'fliteAdUnit',
			[
				'guid' => $args[ 'guid' ],
				'width' => $args[ 'width' ],
				'height' => $args[ 'height' ],
			]
		);
	}

	private function areTagParamsValid($params, &$errorMessage) {
		if( empty($params) ) {
			$errorMessage = wfMessage( 'flite-tag-error-no-required-parameters' )->plain();
			return false;
		}

		foreach( $this->requiredParams as $paramName ) {
			if( !$this->isTagParamValid( $paramName, $params[$paramName], $errorMessage ) ) {
				return false;
			}
		}

		return true;
	}

	protected function buildParamValidator( $paramName ) {
		$validator = null;

		switch( $paramName ) {
			case 'guid':
				$validator = new WikiaValidatorRegex([
					'required' => true,
					'pattern' => self::GUID_PATTERN,
				], [
					'wrong' => 'flite-tag-error-invalid-guid'
				]);
				break;
			case 'width':
			case 'height':
				$validator = new WikiaValidatorNumeric( [
					'required' => true,
					'min' => self::MIN_SIZE
				], [
					'not_numeric' => 'flite-tag-error-invalid-size',
					'too_small' => 'flite-tag-error-min-size'
				] );
				break;
		}

		return $validator;
	}

	public function fliteAdUnit() {
		$this->setVal( 'guid', $this->getVal( 'guid' ) );
		$this->setVal( 'width', $this->getVal( 'width' ) );
		$this->setVal( 'height', $this->getVal( 'height' ) );

		$this->response->setTemplateEngine( WikiaResponse::TEMPLATE_ENGINE_MUSTACHE );
	}

	public function fliteTagError() {
		$this->setVal( 'errorMessage', $this->getVal( 'errorMessage', wfMessage( 'flite-tag-error-unknown' )->plain() ) );

		$this->response->setTemplateEngine( WikiaResponse::TEMPLATE_ENGINE_MUSTACHE );
	}

}
