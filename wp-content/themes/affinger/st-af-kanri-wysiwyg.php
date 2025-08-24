<?php
// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

// WYSIWYGエディタを有効化
define('ST_AF_KANRI_WYSIWYG_ENABLE', true);

if (!function_exists( 'st_af_kanri_wysiwyg_get_option_name' )) {
	/**
	 * アップデート用のオプション名を取得
	 *
	 * @param string $location エディタの場所名
	 *
	 * @return string オプション名
	 */
	function st_af_kanri_wysiwyg_get_option_name( $location ) {
		return 'st_af_kanri_wysiwyg_0.0.0_to_1.0.1_' . $location;
	}
}

if (!function_exists('st_af_kanri_wysiwyg_is_updated')) {
	/**
	 * アップデート済みかどうかを取得
	 *
	 * @param string $location エディタの場所名
	 *
	 * @return bool アップデート済みの場合は true
	 */
	function st_af_kanri_wysiwyg_is_updated( $location ) {
		$option_name = st_af_kanri_wysiwyg_get_option_name( $location );
		$isUpdated   = ( get_option( $option_name, '0' ) !== '0' );

		return $isUpdated;
	}
}

if (!function_exists('st_af_kanri_wysiwyg_is_enabled')) {
	/**
	 * WYSIWYGエディタが有効化どうかを取得
	 *
	 * @return bool 有効の場合は true
	 */
	function st_af_kanri_wysiwyg_is_enabled() {
		return (defined( 'ST_AF_KANRI_WYSIWYG_ENABLE' ) && ST_AF_KANRI_WYSIWYG_ENABLE);
	}
}

if ( !function_exists( 'st_af_kanri_wysiwyg_revert' ) ) {
	/**
	 * アップデート処理を初期化
	 *
	 * @param string $location エディタの場所名
	 * @param string $option_name オプション名
	 * @param string $wysiwyg_content 説明の内容
	 */
	function st_af_kanri_wysiwyg_revert( $location, $option_name, $wysiwyg_content ) {
		if ( !st_af_kanri_wysiwyg_is_updated( $location ) ) {
			return;
		}

		$wysiwyg_content = str_replace( array( "\r", "\n" ), '', $wysiwyg_content );
		$wysiwyg_content = preg_replace( '!<br\s*/?>!', "\n", $wysiwyg_content );
		$wysiwyg_content = strip_tags( $wysiwyg_content );

		update_option( $option_name, $wysiwyg_content );
		update_option( st_af_kanri_wysiwyg_get_option_name( $location ), '0' );
	}
}

// 初期化
if ( !st_af_kanri_wysiwyg_is_enabled() ) {
	st_af_kanri_wysiwyg_revert( 'description_1', 'my-af4', stripslashes( get_option( 'my-af4' ) ) );
	st_af_kanri_wysiwyg_revert( 'description_2', 'my-af8', stripslashes( get_option( 'my-af8' ) ) );
	st_af_kanri_wysiwyg_revert( 'description_3', 'my-af12', stripslashes( get_option( 'my-af12' ) ) );
	st_af_kanri_wysiwyg_revert( 'description_1b', 'my-af4b', stripslashes( get_option( 'my-af4b' ) ) );
	st_af_kanri_wysiwyg_revert( 'description_2b', 'my-af8b', stripslashes( get_option( 'my-af8b' ) ) );
	st_af_kanri_wysiwyg_revert( 'description_3b', 'my-af12b', stripslashes( get_option( 'my-af12b' ) ) );
	st_af_kanri_wysiwyg_revert( 'description_0', 'my-af22', stripslashes( get_option( 'my-af22' ) ) );
}

if (!function_exists('st_af_kanri_wysiwyg_update')) {
	/**
	 * アップデート処理
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $option_name オプション名
	 * @param string $content 内容
	 */
	function st_af_kanri_wysiwyg_update( $location = null, $option_name = null, $content = '' ) {
		if ($location === null || $option_name === null) {
			return;
		}

		if ( !st_af_kanri_wysiwyg_is_enabled() ) {
			st_af_kanri_wysiwyg_revert( $location, $option_name, $content );

			return;
		}

		if ( st_af_kanri_wysiwyg_is_updated( $location ) ) {
			return;
		}

		// 旧データの互換 / 更新処理 (HTMLをエスケープ / 改行を <br> へ変換 / p要素とする)
		$content = get_option( $option_name, '' );
		$content = '<p>' . nl2br( esc_html( $content ) ) . '</p>';

		update_option( $option_name, $content );
		update_option( st_af_kanri_wysiwyg_get_option_name( $location ), '1' );
	}

	add_action( 'st_af_kanri_editor', 'st_af_kanri_wysiwyg_update', ~PHP_INT_MAX, 3 );
}

if ( !function_exists( 'st_af_kanri_wysiwyg_get_settings' ) ) {
	/**
	 * WYSIWYTエディタの設定を取得
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $name コントロール名 (name 属性値)
	 *
	 * @return mixed[] WYSIWYGエディタの設定
	 *
	 * @see http://codex.wordpress.org/Function_Reference/wp_editor
	 */
	function st_af_kanri_wysiwyg_get_settings( $location = null, $name = null ) {
		$settings = array(
			'wpautop'          => false,    // 内容を自動整形するかどうか (true / false) / true は互換性なし
			'media_buttons'    => true,     // メディアボタンを表示するかどうか (true / false)
			'textarea_rows'    => 10,       // テキストエリアの rows 属性値
			// 'tabindex'         => null,     // テキストエリアの tabindex 属性値
			// 'editor_css'       => '',       // テキストエリアのCSS
			// 'editor_class'     => '',       // テキストエリアの class 属性値
			// 'editor_height'    => 320,      // テキストエリアの高さ (px)
			// 'teeny'            => false,    // ツールバーのボタンを最小限にするかどうか (true / false)
			// 'dfw'              => false,    // フルスクリーンエディタを置換するかどうか (カスタマイズ用) (true / false)
			// 'tinymce'          => true,     // TinyMCE (WP標準のエディタと同じ形式) にするかどうか (true / false)
			// 'quicktags'        => true,     // Quicktags (テキストタブ) を有効にするかどうか (true / false)
			// 'drag_drop_upload' => false,    // ドラッグ & ドロップでアップロードできるようにするかどうか (true / false)
		);

		if ($name !== null) {
			$settings['textarea_name'] = $name;    // テキストエリアの name 属性値
		}

		return $settings;
	}
}

if ( !function_exists( 'st_af_kanri_wysiwyg_editor' ) ) {
	/**
	 * 説明のエディタ (WYSIWYG) を出力
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $option_name オプション名
	 * @param string $content 内容
	 */
	function st_af_kanri_wysiwyg_editor( $location = null, $option_name = null, $content = '' ) {
		// WYSIWYGエディタ無効化時
		if ( $location !== null && $option_name !== null && !st_af_kanri_wysiwyg_is_enabled() ) {
			st_af_kanri_wysiwyg_revert( $location, $option_name, $content );

			$content = stripslashes( get_option( $option_name, '' ) );

			// 場所別アクションフック `st_af_kanri_<location>_editor` をトリガー
			do_action('st_af_kanri_' . $location . '_editor', $location, $option_name, $content);

			return;
		}

		$editor_id = ( $location !== null ) ? ( 'st-af-kanri-' . $location ) : 'st-af-kanri';
		$settings  = st_af_kanri_wysiwyg_get_settings( $location, $option_name );
		$content   = stripslashes( get_option( $option_name, '' ) );

		// 旧データの互換処理 (HTMLをエスケープ / 改行を <br> へ変換 / p要素とする)
		if ( $location !== null && !st_af_kanri_wysiwyg_is_updated( $location ) ) {
			$content = '<p>' . nl2br( esc_html( $content ) ) . '</p>';
		}

		wp_editor( $content, $editor_id, $settings );
	}

	// デフォルトアクションを置換
	remove_action( 'st_af_kanri_editor', 'st_af_kanri_editor' );
	add_action( 'st_af_kanri_editor', 'st_af_kanri_wysiwyg_editor', 10, 3 );
}

if ( !function_exists( 'st_af_kanri_wysiwyg_editor_content' ) ) {
	/**
	 * ランキングの説明を取得 (HTMLを整形)
	 *
	 * @param string $content 説明の内容
	 * @param string $location エディタの場所名
	 * @param string $option_name オプション名
	 *
	 * @return string 説明の内容
	 */
	function st_af_kanri_wysiwyg_editor_content( $content, $location, $option_name ) {
		// WYSIWYGエディタ無効化時
		if ( !st_af_kanri_wysiwyg_is_enabled() ) {
			st_af_kanri_wysiwyg_revert( $location, $option_name, $content );

			return '<p>' . nl2br( esc_html( stripslashes( get_option( $option_name, '' ) ) ) ) . '</p>';
		}

		// 旧データの更新処理
		if ( !st_af_kanri_wysiwyg_is_updated( $location ) ) {
			st_af_kanri_wysiwyg_update( $location, $option_name );

			$content = stripslashes( get_option( $option_name, '' ) );
		}

		return $content;
	}

	// デフォルトフィルターを置換
	remove_filter( 'st_af_kanri_rank_description', 'st_af_kanri_default_editor_content' );
	remove_filter( 'st_af_kanri_rank1_description', 'st_af_kanri_default_editor_content' );
	remove_filter( 'st_af_kanri_rank2_description', 'st_af_kanri_default_editor_content' );
	remove_filter( 'st_af_kanri_rank3_description', 'st_af_kanri_default_editor_content' );
	remove_filter( 'st_af_kanri_rank1b_description', 'st_af_kanri_default_editor_content' );
	remove_filter( 'st_af_kanri_rank2b_description', 'st_af_kanri_default_editor_content' );
	remove_filter( 'st_af_kanri_rank3b_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank1_description', 'st_af_kanri_wysiwyg_editor_content', 10, 6 );
	add_filter( 'st_af_kanri_rank2_description', 'st_af_kanri_wysiwyg_editor_content', 10, 6 );
	add_filter( 'st_af_kanri_rank3_description', 'st_af_kanri_wysiwyg_editor_content', 10, 6 );
	add_filter( 'st_af_kanri_rank1b_description', 'st_af_kanri_wysiwyg_editor_content', 10, 6 );
	add_filter( 'st_af_kanri_rank2b_description', 'st_af_kanri_wysiwyg_editor_content', 10, 6 );
	add_filter( 'st_af_kanri_rank3b_description', 'st_af_kanri_wysiwyg_editor_content', 10, 6 );
}
