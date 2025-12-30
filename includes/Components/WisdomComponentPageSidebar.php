<?php

declare( strict_types=1 );

namespace MediaWiki\Skins\Wisdom\Components;

use MediaWiki\Title\Title;
use MessageLocalizer;

/**
 * WisdomComponentPageSidebar component
 */
class WisdomComponentPageSidebar implements WisdomComponent {

	public function __construct(
		private readonly MessageLocalizer $localizer,
		private readonly Title $title,
		private readonly array $lastModifiedData
	) {
	}

	private function getLastModData(): array {
		$lastModifiedData = $this->lastModifiedData;
		$timestamp = $this->lastModifiedData['timestamp'];

		if ( $timestamp === null ) {
			return [];
		}

		$items = [
			'item-id' => 'lm-time',
			'item-class' => 'mw-list-item',
			'array-links' => [
				'array-attributes' => [
					[
						'key' => 'id',
						'value' => 'citizen-lastmod-relative'
					],
					[
						'key' => 'href',
						'value' => $this->title->getLocalURL( [ 'diff' => '' ] )
					],
					[
						'key' => 'title',
						'value' => trim( $lastModifiedData['text'] )
					],
					[
						'key' => 'data-timestamp',
						'value' => wfTimestamp( TS_UNIX, $lastModifiedData['timestamp'] )
					]
				],
				'icon' => 'history',
				'text' => $lastModifiedData['date']
			]
		];

		// TODO: We should not use WisdomComponentMenu here, but a custom component
		$menu = new WisdomComponentMenu(
			[
				'id' => 'citizen-sidebar-lastmod',
				'label' => $this->localizer->msg( 'citizen-page-info-lastmod' ),
				'array-list-items' => $items
			]
		);

		return $menu->getTemplateData();
	}

	public function getTemplateData(): array {
		return [
			'data-page-sidebar-lastmod' => $this->getLastModData()
		];
	}
}
