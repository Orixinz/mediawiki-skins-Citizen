<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

/**
 * WisdomComponentMenuListItem component
 */
class WisdomComponentMenuListItem implements WisdomComponent {

	public function __construct(
		private readonly WisdomComponentLink $link,
		private readonly string $class = '',
		private readonly string $id = ''
	) {
	}

	public function getTemplateData(): array {
		return [
			'array-links' => $this->link->getTemplateData(),
			'item-class' => $this->class,
			'item-id' => $this->id,
		];
	}
}
