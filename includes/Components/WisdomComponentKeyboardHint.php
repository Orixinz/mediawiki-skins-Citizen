<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

/**
 * WisdomComponentKeyboardHint component
 */
class WisdomComponentKeyboardHint implements WisdomComponent {

	public function __construct(
		private readonly string $label = '',
		private readonly string $key = ''
	) {
	}

	public function getTemplateData(): array {
		return [
			'label' => $this->label,
			'key' => $this->key,
		];
	}
}
