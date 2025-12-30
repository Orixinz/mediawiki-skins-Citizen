<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Tests\Unit\Components;

use MediaWiki\Skins\Wisdom\Components\WisdomComponentMenu;
use MediaWikiUnitTestCase;

/**
 * @group Citizen
 * @group Components
 * @coversDefaultClass \MediaWiki\Skins\Wisdom\Components\WisdomComponentMenu
 */
class WisdomComponentMenuTest extends MediaWikiUnitTestCase {

	/**
	 * This test checks if the count method returns the correct number of items
	 * @covers ::count
	 * @dataProvider provideCountData
	 */
	public function testCount( array $data, int $expected ) {
		// Create a new WisdomComponentMenu object
		$menu = new WisdomComponentMenu( $data );

		// Check if the count method returns the correct number of items
		$this->assertSame( $expected, $menu->count() );
	}

	public static function provideCountData(): iterable {
		yield 'With array-list-items' => [
			[
				'array-list-items' => [ 'some-item-one', 'some-item-2', 'some-item-3' ]
			],
			3
		];
		yield 'With html-items' => [
			[
				'html-items' => '<li>Some item</li><li>Some item</li><li>Some item</li>'
			],
			3
		];
	}

	/**
	 * This test checks if the getTemplateData method returns the correct data
	 * @covers ::__construct
	 * @covers ::getTemplateData
	 * @dataProvider provideMenuData
	 */
	public function testGetTemplateData( array $data ) {
		// Create a new WisdomComponentMenu object
		$menu = new WisdomComponentMenu( $data );

		// Call the getTemplateData method
		$actualData = $menu->getTemplateData();

		// Check if the getTemplateData method returns the correct data
		$this->assertSame( $data, $actualData );
	}

	public static function provideMenuData(): iterable {
		yield 'Complete menu data' => [
			[
				'class' => 'some-class',
				'label' => 'Some label',
				'html-tooltip' => 'Some tooltip',
				'label-class' => 'some-label-class',
				'html-before-portal' => 'Some before portal',
				'html-items' => 'Some items',
				'html-after-portal' => 'Some after portal',
				'array-list-items' => [ 'some-item-one', 'some-item-2', 'some-item-3' ]
			]
		];
	}
}
