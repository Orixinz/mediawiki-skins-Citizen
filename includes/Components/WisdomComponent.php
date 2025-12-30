<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

/**
 * Component interface for managing Citizen-modified components
 *
 * @internal
 */
interface WisdomComponent {

	public function getTemplateData(): array;
}
