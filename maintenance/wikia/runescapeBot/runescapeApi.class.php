<?php

class RunescapeApi {

	const API_URL_TEMPLATE = "http://services.runescape.com/m=itemdb_rs/api/graph/%s.json";
	const TOP_TRADED_ITEMS_URL = "http://services.runescape.com/m=itemdb_rs/top100.ws";
	const ONE_SECOND = 1;

	/**
	 * @param string $itemId
	 * @return GrandExchangeItem
	 * @throws Exception
	 */
	public function getItemId( string $itemId ) : GrandExchangeItem  {
		$response = $this->makeRequestAndRetryOnFailure( sprintf( self::API_URL_TEMPLATE, $itemId ) );
		if ( $response === false ) {
			throw new Exception( "Error fetching data from runescape API" );
		}

		$jsonResponse = json_decode( $response, true );
		if ( json_last_error() !== JSON_ERROR_NONE || !isset( $jsonResponse['daily'] ) ) {
			throw new Exception( "Error decoding json from runesacpe API. Last error: " . json_last_error() );
		}

		$latestTimestamp = max( array_keys( $jsonResponse['daily'] ) );

		return new GrandExchangeItem(
			$this->convertToSeconds( $latestTimestamp ),
			$jsonResponse['daily'][$latestTimestamp],
			$itemId
		);
	}


	/**
	 * The runscape API returns epoch time in ms, we want it in seconds. Strip off the last 3 digits to do
	 * the conversion
	 * @param $timestamp
	 * @return bool|string
	 */
	private function convertToSeconds( $timestamp ) {
		return substr( $timestamp, 0, -3 );
	}

	public function getTopItems() {
		$idToTradeCountMap = [];
		$response = $this->makeRequestAndRetryOnFailure( self::TOP_TRADED_ITEMS_URL );

		if ( $response === false ) {
			return $idToTradeCountMap;
		}

		$domDocument = HtmlHelper::createDOMDocumentFromText( $response );
		$tableBody = $domDocument->getElementsByTagName( 'tbody' );
		$tableRows = $tableBody->item(0)->getElementsByTagName('tr');
		/** @var DOMElement $row */
		foreach( $tableRows as $row ) {
			$totalsColumn = $row->getElementsByTagName( 'td' )->item( 5 );
			$totalsLink = $totalsColumn->getElementsByTagName( 'a' )->item( 0 );

			$itemid = $this->extractIdFromTotalsLink( $totalsLink );
			$tradeCount = $this->extractTradeCountFromTotalsLink( $totalsLink );
			$idToTradeCountMap[$itemid] = $tradeCount;
		}

		return $idToTradeCountMap;
	}

	private function makeRequestAndRetryOnFailure( string $url, int $retriesLeft = 2  ) {
		$response = Http::get( $url, "default", [ 'noProxy' => true ] );
		if ( $response === false && $retriesLeft !== 0 ) {
			sleep( self::ONE_SECOND );
			return $this->makeRequestAndRetryOnFailure( $url, $retriesLeft - 1 );
		}

		return $response;
	}

	private function extractIdFromTotalsLink( DOMElement $totalsLink ) {
		$match = [];
		$urlAttr = $totalsLink->getAttribute( "href" );
		preg_match( "/obj=(\d+)/", $urlAttr, $match );
		return $match[1];
	}

	private function extractTradeCountFromTotalsLink(DOMElement $totalsLink  ) {
		$match = [];
		preg_match( "/([\d\.]+)/", $totalsLink->textContent, $match );
		return $match[1];
	}
}
