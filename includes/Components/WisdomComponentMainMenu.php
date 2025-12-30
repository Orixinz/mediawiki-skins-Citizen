<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

/**
 * WisdomComponentMainMenu component
 */
class WisdomComponentMainMenu implements WisdomComponent {

	public function __construct(
		private readonly array $sidebarData
	) {
	}

	public function getTemplateData(): array {
		return [
			'data-portlets-first' => (
				new WisdomComponentMenu( $this->sidebarData['data-portlets-first'] )
			)->getTemplateData(),
			'array-portlets-rest' => array_map(
				static fn ( array $data ): array => ( new WisdomComponentMenu( $data ) )->getTemplateData(),
				$this->sidebarData[ 'array-portlets-rest' ]
			)
		];
	}
}
