<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

use MediaWiki\Skins\Wisdom\Components\WisdomComponentMobileNavItem;
use MessageLocalizer;

/**
 * WisdomComponentFooter component
 */
class WisdomComponentMobileNav implements WisdomComponent {

	public function __construct(
		private readonly MessageLocalizer $localizer,
	) {
	}

	public function getTemplateData(): array {
		$localizer = $this->localizer;
		$listItems = [];

		$listItem = new WisdomComponentMobileNavItem( 'nbnav-Menu', '', 'Build_Mode');
		$listItems[0] = $listItem->getTemplateData();

		$listItem = new WisdomComponentMobileNavItem( 'nbnav-Menu', '', 'Build_Mode');
		$listItems[1] = $listItem->getTemplateData();

		$listItem = new WisdomComponentMobileNavItem( 'nbnav-Menu', '', 'Build_Mode');
		$listItems[2] = $listItem->getTemplateData();

		return [
			'array-list-items' => $listItems
		];
	}
}
