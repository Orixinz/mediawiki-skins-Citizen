<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Tests\Unit\Components;

use MediaWiki\Skins\Wisdom\Components\WisdomComponent;
use MediaWiki\Skins\Wisdom\Components\WisdomComponentMainMenu;
use MediaWikiUnitTestCase;

/**
 * @group Citizen
 * @group Components
 * @coversDefaultClass \MediaWiki\Skins\Wisdom\Components\WisdomComponentMainMenu
 */
class WisdomComponentMainMenuTest extends MediaWikiUnitTestCase {

	/**
	 * This test checks if the WisdomComponentMainMenu class can be instantiated
	 * @covers ::__construct
	 */
	public function testConstruct() {
		// Mock the sidebar data
		$sidebarData = [];

		// Create a new WisdomComponentMainMenu object
		$mainMenu = new WisdomComponentMainMenu( $sidebarData );

		// Assert that the object is an instance of WisdomComponent
		$this->assertInstanceOf( WisdomComponent::class, $mainMenu );
	}

	/**
	 * @covers ::__construct
	 * @covers ::getTemplateData
	 * @dataProvider provideMainMenuData
	 */
	public function testGetTemplateData( array $sidebarData ) {
		// Create a new WisdomComponentMainMenu object
		$mainMenu = new WisdomComponentMainMenu( $sidebarData );

		// Call the getTemplateData method
		$templateData = $mainMenu->getTemplateData();

		// Assert the structure and types of expected keys
		$this->assertIsArray( $templateData['data-portlets-first'] );
		$this->assertIsArray( $templateData['array-portlets-rest'] );

		// Assert the structure and types of expected keys
		$this->assertArrayHasKey( 'data-portlets-first', $templateData );
		$this->assertArrayHasKey( 'array-portlets-rest', $templateData );
	}

	public static function provideMainMenuData(): iterable {
		yield 'empty sidebar data' => [
			'sidebarData' => [
				'data-portlets-first' => [],
				'array-portlets-rest' => [],
			]
		];
	}
}
