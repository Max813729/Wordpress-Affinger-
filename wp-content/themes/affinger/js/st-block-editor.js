(function (window, document, wp, undefined) {
	'use strict'

	wp.domReady(function () {
		var block_types = [
			// テキスト
			// 'core/paragraph',       // 段落
			// 'core/heading',         // 見出し
			// 'core/list',            // リスト
			// 'core/quote',           // 引用
			// 'core/code',            // コード
			// 'core/freeform',        // クラシック
			'core/preformatted',    // 整形済みテキスト
			'core/pullquote',       // プルクオート
			// 'core/table',           // テーブル
			'core/verse',           // 詩

			// メディア
			// 'core/image',      // 画像
			// 'core/gallery',    // ギャラリー
			'core/audio',         // 音声
			// 'core/cover',      // カバー
			'core/file',          // ファイル
			'core/media-text',    // メディアと文章
			// 'core/video',      // 動画

			// デザイン
			// 'core/buttons',     // ボタン
			// 'core/columns',     // カラム
			// 'core/group',       // グループ
			'core/more',        // 続きを読む
			// 'core/nextpage'     // ページ区切り
			// 'core/separator'    // 区切り
			// 'core/spacer'       // スペーサー

			// ウィジェット
			// 'core/shortcode',          // ショートコード
			'core/archives',           // アーカイブ
			'core/calendar',           // カレンダー
			'core/categories',         // カテゴリー
			// 'core/html',               // カスタムHTML
			'core/latest-comments',    // 最新のコメント
			'core/latest-posts',       // 最新の投稿
			'core/rss',                // RSS
			'core/social-links',       // ソーシャルアイコン
			'core/tag-cloud',          // タグクラウド
			// 'core/search',             // 検索
		];

		block_types.forEach(function (block_type) {
			if (wp.blocks.getBlockType(block_type) !== undefined) {
				wp.blocks.unregisterBlockType(block_type);
			}
		});

		var block_variations = {
			'core/embed': [
				// 埋め込み
				// 'twitter',          // Twitter
				// 'youtube',          // YouTube
				// 'wordpress',        // WordPress
				'soundcloud',       // SoundCloud
				// 'spotify',          // Spotify
				// 'flickr',           // Flickr
				// 'vimeo',            // Vimeo
				'animoto',          // Animoto
				'cloudup',          // Cloudup
				'crowdsignal',      // Crowdsignal
				'dailymotion',      // Dailymotion
				'imgur',            // Imgur
				'issuu',            // Issuu
				'kickstarter',      // Kickstarter
				'meetup-com',       // Meetup.com
				'mixcloud',         // Mixcloud
				'reddit',           // Reddit
				'reverbnation',     // ReverbNation
				'screencast',       // Screencast
				'scribd',           // Scribd
				// 'slideshare',       // Slideshare
				'smugmug',          // SmugMug
				'speaker-deck',     // Speaker Deck
				// 'tiktok',           // TikTok
				'ted',              // TED
				'tumblr',           // Tumblr
				'videopress',       // VideoPress
				'wordpress-tv',     // WordPress.tv
				'amazon-kindle',    // Amazon Kindle
			],
		};

		for (const [block_type, variations] of Object.entries(block_variations)) {
			if (wp.blocks.getBlockType(block_type) === undefined) {
				continue;
			}

			variations.forEach(function (variation) {
				wp.blocks.unregisterBlockVariation(block_type, variation);
			});
		}
	});
}(window, window.document, wp));
