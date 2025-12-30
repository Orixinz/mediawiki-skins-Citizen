<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Tests\Components;

use MediaWiki\Skins\Wisdom\Components\WisdomComponentKeyboardHint;
use MediaWikiUnitTestCase;

/**
 * @group Citizen
 * @group Components
 * @coversDefaultClass \MediaWiki\Skins\Wisdom\Components\WisdomComponentKeyboardHint
 */
class WisdomComponentKeyboardHintTest extends MediaWikiUnitTestCase {

	/**
	 * @covers ::__construct
	 * @covers ::getTemplateData
	 */
	public function testGetTemplateData(): void {
		$expected = [
			'label' => 'Mock aria label',
			'key' => 'mock-key'
		];

		$component = new WisdomComponentKeyboardHint( 'Mock aria label', 'mock-key' );
		$this->assertSame( $expected, $component->getTemplateData() );
	}
}
