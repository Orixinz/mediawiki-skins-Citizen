<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

use MediaWiki\Skin\Skin;
/**
 * WisdomComponentMenuListItem component
 */
class WisdomComponentMobileNavItem implements WisdomComponent {

	public function __construct(
		private readonly string $id = '',
		private readonly string $img = '',
		private readonly string $link = ''
	) {
	}

	public function getTemplateData(): array {
		$href = Skin::makeInternalOrExternalUrl( $this->link );
		return [
			'item-id' => $this->id,
			'img' => $this->img,
			'href' => $href
		];
	}
}
