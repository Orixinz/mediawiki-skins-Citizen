<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

use MessageLocalizer;

/**
 * WisdomComponentFooter component
 */
class WisdomComponentFooter implements WisdomComponent {

	public function __construct(
		private readonly MessageLocalizer $localizer,
		private readonly array $footerData
	) {
	}

	public function getTemplateData(): array {
		$localizer = $this->localizer;
		$footerData = $this->footerData;

		return $footerData + [
			'msg-citizen-footer-desc' => $localizer->msg( "citizen-footer-desc" )->inContentLanguage()->parse(),
			'msg-citizen-footer-tagline' => $localizer->msg( "citizen-footer-tagline" )->inContentLanguage()->parse()
		];
	}
}
