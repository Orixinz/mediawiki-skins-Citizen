<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Tests\Components;

use MediaWikiUnitTestCase;
use Message;
use MessageLocalizer;

/**
 * @group Citizen
 * @group Components
 * @coversDefaultClass \MediaWiki\Skins\Wisdom\Components\WisdomComponentSearchBox
 */
class WisdomComponentSearchBoxTest extends MediaWikiUnitTestCase {

	/**
	 * @covers ::__construct
	 * @covers ::getTemplateData
	 */
	public function testGetTemplateData(): void {
		$localizer = $this->createMock( MessageLocalizer::class );
		$localizer->method( 'msg' )->willReturnCallback( function ( $key ) {
			return $this->createConfiguredMock( Message::class, [
				'text' => "$key-mocked"
			] );
		} );
		// $component = new WisdomComponentSearchBox( $localizer, [] );
		// $actualData = $component->getTemplateData();
		// TODO: Add tests
		$this->expectNotToPerformAssertions();
	}
}
