<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Tests\Components;

use MediaWiki\Skins\Wisdom\Components\WisdomComponentLink;
use MediaWiki\Skins\Wisdom\Components\WisdomComponentMenuListItem;
use MediaWikiUnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @group Citizen
 * @group Components
 * @coversDefaultClass \MediaWiki\Skins\Wisdom\Components\WisdomComponentMenuListItem
 */
class WisdomComponentMenuListItemTest extends MediaWikiUnitTestCase {

	/**
	 * @covers ::__construct
	 * @covers ::getTemplateData
	 * @dataProvider provideMenuListItemData
	 */
	public function testGetTemplateData(
		string $class,
		string $id,
		string $expectedClass,
		string $expectedId
	): void {
		$menuItem = new WisdomComponentMenuListItem(
			$this->getMockLink(),
			$class,
			$id
		);

		$templateData = $menuItem->getTemplateData();

		$this->assertArrayHasKey( 'array-links', $templateData );
		$this->assertArrayHasKey( 'item-class', $templateData );
		$this->assertArrayHasKey( 'item-id', $templateData );
		$this->assertSame( $expectedClass, $templateData['item-class'] );
		$this->assertSame( $expectedId, $templateData['item-id'] );
		$this->assertSame( '/test', $templateData['array-links']['href'] );
		$this->assertSame( 'Test Link', $templateData['array-links']['text'] );
	}

	public static function provideMenuListItemData(): iterable {
		yield 'minimal parameters' => [
			'class' => '',
			'id' => '',
			'expectedClass' => '',
			'expectedId' => '',
		];
		yield 'with class and id' => [
			'class' => 'test-class',
			'id' => 'test-id',
			'expectedClass' => 'test-class',
			'expectedId' => 'test-id',
		];
	}

	private function getMockLink(): WisdomComponentLink&MockObject {
		$mockLink = $this->createMock( WisdomComponentLink::class );
		$mockLink->expects( $this->once() )
			->method( 'getTemplateData' )
			->willReturn( [
				'href' => '/test',
				'text' => 'Test Link'
			] );

		return $mockLink;
	}
}
