<?php
/**
 * [st-card-ex] プラウイン
 */

// テーマフィルター

// AMP ページで許可するショートタグ名
add_filter(
	'st_amp_get_allowed_shortcode_tags',
	function ( $tag_names ) {
		$tag_names[] = 'st-card-ex';

		return $tag_names;
	}
);

// 除去するショートコードタグ (抜粋等)
add_filter(
	'st_strip_shortcodes_tagnames',
	function ( $tag_names ) {
		$tag_names[] = 'st-card-ex';

		return $tag_names;
	}
);

// プラグインフィルター

add_filter( 'st_card_ex_enqueue_styles', '__return_false' );

// 設定
// add_filter(
// 	'st_card_ex_settings',
// 	function ( array $settings ) {
// 		$settings['cache']['expiration'] = 60 * 60;    // キャッシュが期限切れとなるまでの最大秒数 (デフォルト: 3600 = 1 時間)
//
// 		return $settings;
// 	}
// );

// クローラーの設定
add_filter(
	'st_card_ex_crawler_settings',
	function ( array $settings ) {
		$settings['http_client']['wp_http']['timeout'] = 120;    // タイムアウト秒 (デフォルト: 30)

		return $settings;
	}
);

// 抜粋表示の有無 (デフォルト: true)
add_filter(
	'st_card_ex_show_excerpt',
	function ( $show ) {
		$hide_excerpt_on_pc    = (bool) trim( get_option( 'st-data221', '' ) );
		$show_excerpt_on_phone = (bool) trim( get_option( 'st-data280', '' ) );

		// AMP.
		if ( amp_is_amp() ) {
			return ( ! st_is_mobile() && ! $hide_excerpt_on_pc );
		}

		return ( ! st_is_mobile() && ! $hide_excerpt_on_pc ) || ( st_is_mobile() && $show_excerpt_on_phone );
	}
);

// `thumb=""` の使用の有無 (デフォルト: false)
// add_filter(
// 	'st_card_ex_use_thumb_attr',
// 	function ( $use ) {
// 		return true;
// 	}
// );

// [st-card-ex] のテンプレート名 (デフォルト: `default`)
add_filter(
	'st_card_ex_template',
	function ( $name ) {
		// AMP.
		if ( amp_is_amp() ) {
			return 'amp';
		}

		return $name;
	}
);

// [st-card-ex] のテンプレートパス (デフォルト: `プラグインディレクトリ/templates/shortcode/テンプレート名.php`)
// add_filter(
// 	'st_card_ex_template_path',
// 	function ( $path ) {
// 		return locate_template( 'st-card-ex-custom.php' );
// 	}
// );

// 抜粋の文字数 (デフォルト: 100)
add_filter(
	'st_card_ex_excerpt_length',
	function ( $length ) {
		$excerpt_length = trim( get_option( 'st-data73', '100' ) );
		$excerpt_length = ( $excerpt_length !== '' ) ? (int) $excerpt_length : 100;

		return $excerpt_length;
	}
);

// 抜粋の省略文字 (デフォルト: ' ...')
// add_filter(
// 	'st_card_ex_excerpt_hellip',
// 	function ( $hellip ) {
// 		return '…';
// 	}
// );

// エディターボタンの追加の有無 (デフォルト: true)
add_filter(
	'st_card_ex_add_editor_buttons',
	function ( $add ) {
		$hide_editor_buttons = (bool) trim( get_option( 'st-data137', '' ) );

		return ! $hide_editor_buttons;
	}
);
