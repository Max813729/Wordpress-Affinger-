<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// TOC+
if ( ! function_exists( 'st_toc_do_shortcode' ) ) {
	function st_toc_do_shortcode( $content ) {
		global $shortcode_tags;

		if ( empty( $shortcode_tags ) || ! is_array( $shortcode_tags ) ) {
			return $content;
		}

		$tagnames     = array( 'toc', 'no_toc' );
		$tag_is_found = false;

		foreach ( $tagnames as $tagname ) {
			if ( strpos( $content, '[' . $tagname . ']' ) !== false ) {
				$tag_is_found = true;
			}
		}

		if ( ! $tag_is_found ) {
			return $content;
		}

		$content = do_shortcodes_in_html_tags( $content, false, $tagnames );

		$pattern = get_shortcode_regex( $tagnames );
		$content = preg_replace_callback( "/$pattern/", 'do_shortcode_tag', $content );

		return $content;
	}
}

if ( ! function_exists( 'st_toc_the_content' ) ) {
	function st_toc_the_content( $content ) {
		/** @var toc $tic */
		$tic = $GLOBALS['tic'];

		$content = st_toc_do_shortcode( $content );
		$content = $tic->the_content( $content );

		return $content;
	}
}

if ( ! function_exists( 'st_toc_init' ) ) {
	function st_toc_init() {
		/** @var toc $tic */
		$tic = $GLOBALS['tic'];

		remove_filter( 'the_content', array( $tic, 'the_content' ), 100 );
		add_filter( 'the_content', 'st_toc_the_content', 10 );
	}
}

if ( isset( $GLOBALS['tic'] ) && class_exists( 'toc' ) ) {
	add_action( 'init', 'st_toc_init' );
}

// 目次プラグイン
if ( ! function_exists( 'st_toc_is_enabled' ) ) {
	/**
	 * 目次プラグインが有効かどうかを返す
	 *
	 * @return bool
	 */
	function st_is_st_toc_enabled() {
		return isset( $GLOBALS['st_toc'] );
	}
}

if ( ! function_exists( 'st_toc_html_class' ) ) {
	/**
	 * 目次のリストスタイルを追加した HTML クラスを返す
	 *
	 * @param string[] $classes
	 *
	 * @return string[]
	 */
	function st_toc_html_class( array $classes ) {
		if ( ! st_is_st_toc_enabled() ) {
			return $classes;
		}

		if ( ! isset( $GLOBALS['st_toc']['queried_object'] ) ) {
			return $classes;
		}

		$queried_object = $GLOBALS['st_toc']['queried_object'];
		$settings       = $queried_object->get_settings();

		$classes[] = 'toc-style-' . $settings->get_list_style();

		return $classes;
	}
}

add_filter( 'theme_html_class', 'st_toc_html_class' );

if (!function_exists('st_toc_default_settings')) {
	/**
	 * @param array<string, mixed> $settings 目次プラグインのデフォルト設定
	 *
	 * @return array<string, mixed>
	 */
	function st_toc_default_settings( array $settings ) {
		if ( isset( $settings['list_styles'] ) ) {
			//$settings['list_styles']['paper']          = 'ペーパー風デザイン';
			$settings['list_styles']['timeline']       = 'タイムライン';
			$settings['list_styles']['timeline-count'] = 'タイムライン（カウント）';
			$settings['list_styles']['check']          = 'チェック';
			$settings['list_styles']['question']       = 'はてな';
		}

		if ( isset( $settings['list_style'] ) ) {
			$settings['list_style'] = _st_get_global_toc_list_style();
		}

		return $settings;
	}
}

add_filter( 'st_toc_default_settings', 'st_toc_default_settings' );

if (!function_exists('st_toc_settings')) {
	/**
	 * @param array<string, mixed> $settings 目次プラグインの全体設定
	 *
	 * @return array<string, mixed>
	 */
	function st_toc_settings( array $settings ) {
		// 常に "プラグインの CSS スタイルを読み込まない" ようにする。
		$settings['disable_style'] = true;

		return $settings;
	}
}

add_filter( 'st_toc_settings', 'st_toc_settings' );

// "CSS スタイル" 設定を非表示にする
add_filter( 'st_toc_admin_show_style_asset_settings', '__return_false' );

if ( ! function_exists( 'st_toc_wrapper_html' ) ) {
	/**
	 * @param string $html 目次を囲む HTML (`data-st-toc-wrapper` に目次が入る)
	 * @param St\Plugin\Toc\Settings $settings プラグインの設定
	 *
	 * @return string
	 */
	function st_toc_wrapper_html( $html, $settings ) {
		$list_style = is_callable( [ $settings, 'get_list_style' ] ) ? $settings->get_list_style() : 'default';

		// AF6よりペーパー風デザイン停止
		$list_style = 'default';
		// ペーパー風デザイン
		if ( $list_style === 'paper' ) {
			return <<<HTML
<div class="mokuzi-paper">
	<div class="kasane-paper page3">
		<div class="kasane-paper page2">
			<div class="kasane-paper page1">
				<div class="kasane-paper page">
					<div class="kasane-paper nakami" data-st-toc-wrapper></div>
				</div>
			</div>
		</div>
	</div>
</div>
HTML;
		}

		return $html;
	}
}

add_filter( 'st_toc_wrapper_html', 'st_toc_wrapper_html', 10, 2 );

if ( ! function_exists( 'st_toc_should_show_toc_for_front_page' ) ) {
	/**
	 * フロントページに目次を表示するかどうかを返す
	 *
	 * @return bool
	 */
	function st_toc_should_show_toc_for_front_page() {
		$post = get_post( (int) get_option( 'st-data9', '' ) );

		if ( ! $post ) {
			return false;
		}

		// 目次プラグイン: 旧バージョン
		if ( ! function_exists( 'st_toc_has_toc_shortcode' ) ) {
			return true;
		}

		$post_content = get_the_content( $post );

		// [st_toc] がある場合にのみ表示
		return st_toc_has_toc_shortcode( $post_content );
	}
}

if ( ! function_exists( 'st_toc_overrides_condition' ) ) {
	/**
	 * 1. 目次の表示条件を強制的に上書きするかどうかを返す
	 *
	 * @param bool $overrides 上書きするかどうか (デフォルト: `false`)
	 *
	 * @return bool 表示条件を上書きする場合は `true` を返す
	 *              `false` の場合はプラグインの標準動作になる
	 */
	function st_toc_overrides_condition( $overrides = false ) {
		// 1. 2 ページ目以降で強制的に条件を上書きする場合の例
		// if ( (int) get_query_var( 'paged' ) >= 2 || (int) get_query_var( 'page' ) >= 2 ) {
		// 	return true;
		// }

		// フロント/ホーム/カテゴリーアーカイブページは、強制的に条件を上書き
		if ( is_front_page() || is_home() || is_category() ) {
			return true;
		}

		return $overrides;
	}
}

add_filter( 'st_toc_overrides_condition', 'st_toc_overrides_condition' );

if ( ! function_exists( 'st_toc_overridden_result' ) ) {
	/**
	 * 2. 目次の表示条件が `true` のときの結果を返す
	 *
	 * @param WP_Post|false|null $result TOC の表示結果 (デフォルト: `null`)
	 *
	 * @return WP_Post|false|null `WP_Post` オブジェクト (`get_post()` の結果) を返すとその投稿の設定で目次を有効化
	 *                            `false` を返すと強制的に目次を無効化
	 *                            `null` を返すと全体設定で目次を有効化 (クリック計測は無効化される)
	 */
	function st_toc_overridden_result( $result = null ) {
		// 2. 2 ページ目以降で強制的に非表示にする場合の例
		// if ( (int) get_query_var( 'paged' ) >= 2 || (int) get_query_var( 'page' ) >= 2 ) {
		// 	return false;
		// }

		$new_result            = false;
		$show_on_front         = ( get_option( 'show_on_front' ) === 'page' );

		// 表示設定 > 固定ページ > ホームページ
		$page_id_on_front     = (int) get_option( 'page_on_front' );
		$is_page_on_front_set = ( $show_on_front && $page_id_on_front > 0 );
		$page_on_front        = get_post( $page_id_on_front );

		// 表示設定 > 固定ページ > 投稿ページ
		$page_id_for_posts     = (int) get_option( 'page_for_posts' );
		$is_page_for_posts_set = ( $show_on_front && $page_id_for_posts > 0 );
		$page_for_posts        = get_post( $page_id_for_posts );

		// トップページに固定記事を挿入 (優先順位: フロントページ > テーマ設定 > 投稿ページ)
		$theme_front_page_id     = (int) get_option( 'st-data9', '' );
		$is_theme_front_page_set = ( $theme_front_page_id > 0 );
		$theme_front_page        = get_post( $theme_front_page_id );

		// 挿入コンテンツ (優先順位: フロントページ > テーマ設定 > 投稿ページ)
		$front_content        = trim( get_option( 'st-data89', '' ) );
		$is_front_content_set = ( $front_content !== '' );

		$function_exists = function_exists( 'st_toc_has_toc_shortcode' );

		switch ( true ) {
			// 表示設定 > 固定ページ > ホームページ
			case ( is_front_page() && $show_on_front && $is_page_on_front_set ):
				$new_result = $function_exists && st_toc_has_toc_shortcode( $page_on_front->post_content ) ? $page_on_front : false;

				break;

			// 表示設定 > 固定ページ > 投稿ページ
			case is_home():
				if ( $is_theme_front_page_set ) {
					// トップページに固定記事を挿入
					$new_result = $function_exists && st_toc_has_toc_shortcode( $theme_front_page->post_content ) ? $theme_front_page : false;

					// トップページに固定記事を挿入 (ショートコードなし) + 挿入コンテンツ
					if ( $new_result === false && $is_front_content_set ) {
						// トップページに固定記事を挿入の場合は、固定ページのクリックとして計測
						$new_result = $function_exists && st_toc_has_toc_shortcode( $front_content ) ? $theme_front_page : false;
					}
				} elseif ( $is_front_content_set ) {
					// 挿入コンテンツのみ
					$new_result = $function_exists && st_toc_has_toc_shortcode( $front_content ) ? null : false;
				} elseif ( $is_page_for_posts_set && ! is_paged() ) {
					// 表示設定 > 固定ページ > 投稿ページ (コンテンツが入らないので対象外)
					// $new_result = $function_exists && st_toc_has_toc_shortcode( $page_for_posts->post_content ) ? $page_for_posts : false;
				}

				break;

			// カテゴリーアーカイブ
			case is_category():
				$category_id = get_queried_object_id();
				$description = get_term_field( 'description', $category_id );

				// 説明内にショートーコードがある場合のみ有効
				$new_result = $function_exists && st_toc_has_toc_shortcode( $description ) ? null : false;

				break;

			default:
				break;
		}

		return $new_result;
	}
}

add_filter( 'st_toc_overridden_result', 'st_toc_overridden_result' );

if ( ! function_exists( 'st_toc_get_exposed_settings' ) ) {
	/**
	 * @param mixed[] $settings フロントエンド向けのプラグイン設定
	 * @param WP_Post|null $post 投稿オブジェクト
	 *
	 * @return mixed[] テーマ独自の設定を返す
	 */
	function st_toc_get_exposed_settings( $settings, $post ) {
		// ------------------------------------------------------------------------------------------------------------
		// 本文エリアを強制追加する場合
		// ------------------------------------------------------------------------------------------------------------
		// 本文エリア (jQuery セレクター)
		$content_selectors = explode( ',', $settings['content_selector'] );

		// 追加のセレクター
		// $content_selectors[] = '追加のセレクター';
		// $content_selectors[] = '追加のセレクター';
		// ...

		if ( is_home() ) {
			// トップページに固定記事を挿入 (優先順位: フロントページ > テーマ設定 > 投稿ページ)
			$theme_front_page_id     = (int) get_option( 'st-data9', '' );
			$is_theme_front_page_set = ( $theme_front_page_id > 0 );
			$theme_front_page        = get_post( $theme_front_page_id );

			// 挿入コンテンツ (優先順位: フロントページ > テーマ設定 > 投稿ページ)
			$front_content        = trim( get_option( 'st-data89', '' ) );
			$is_front_content_set = ( $front_content !== '' );

			$function_exists = function_exists( 'st_toc_has_toc_shortcode' );

			// トップページに固定記事を挿入の場合
			if ( $is_theme_front_page_set && $function_exists && st_toc_has_toc_shortcode( $theme_front_page->post_content ) ) {
				$content_selectors[] = 'body.blog .home-post .st-topin';
			}

			// 挿入コンテンツ
			if ( $is_front_content_set && $function_exists && st_toc_has_toc_shortcode( $front_content ) ) {
				$content_selectors[] = 'body.blog .home-post .st-topcontent';
			}
		} elseif ( is_category() ) {    // カテゴリーページ (カテゴリーの説明用)
			$content_selectors[] = 'body.category main > article > .post .entry-content';
		}

		$content_selectors            = array_unique( $content_selectors );
		$settings['content_selector'] = implode( ', ', $content_selectors );

		// ------------------------------------------------------------------------------------------------------------
		// 追加の hn を強制追加する場合
		// ------------------------------------------------------------------------------------------------------------
		// 追加の hn の要素 (jQuery セレクター)
		// $accepted_selectors = $settings['accepted_selectors'];
		//
		// if ( /* 条件 */ ) {
		// 	$_accepted_selectors = $accepted_selectors[ /* レベル (1 〜 6) */ ];
		//
		// 	// $_accepted_selectors[] = '追加セレクター';
		// 	// $_accepted_selectors[] = '追加セレクター';
		// 	// ...
		//
		// 	$_accepted_selectors = array_unique( $_accepted_selectors );
		// }
		//
		// $settings['accepted_selectors'][ /* レベル (1 〜 6) */ ] = $accepted_selectors;

		// ------------------------------------------------------------------------------------------------------------
		// 除外セレクターを強制追加する場合
		// ------------------------------------------------------------------------------------------------------------
		// 見出し対象外の要素 (jQuery セレクター)
		$rejected_selectors = $settings['rejected_selectors'];

		// 強制除外
		foreach ( $rejected_selectors as $level => $selectors ) {
			$_rejected_selectors = $rejected_selectors[ $level ];

			$_rejected_selectors[] = '.kanren h5.kanren-t';    // [st-catgroup], [st-taggroup] の見出し
			$_rejected_selectors[] = '.kanren h3';    // [st-postgroup] の見出し
			$_rejected_selectors[] = '.post-card-title';    // [st-{post,cat,tag}group type="card"] の見出し
			$_rejected_selectors[] = '.pop-box h5';    // [st-osusume] の見出し

			// $_rejected_selectors[] = '除外セレクター';
			// ...

			$rejected_selectors[ $level ] = array_unique( $_rejected_selectors );
		}

		// if ( /* 条件 */ ) {
		// 	foreach ( $rejected_selectors as $level => $selectors ) {
		// 		$_rejected_selectors = $rejected_selectors[ $level ];
		//
		// 		// $_rejected_selectors[] = '除外セレクター';
		// 		// $_rejected_selectors[] = '除外セレクター';
		// 		// ...
		//
		// 		$rejected_selectors[ $level ] = array_unique( $_rejected_selectors );
		// 	}
		// }

		$settings['rejected_selectors'] = $rejected_selectors;

		return $settings;
	}
}

add_filter( 'st_toc_exposed_settings', 'st_toc_get_exposed_settings', 10, 2 );

if ( ! function_exists( 'st_toc_get_ignored_selector_before_heading' ) ) {
	function st_toc_get_ignored_selector_before_heading( $selector ) {
		$selectors = explode( ',', $selector );

		// 見出しの前への目次挿入時に無視する要素のセレクター
		$selectors[] = '.st-h-ad'; // 見出し前の広告

		return implode( ',', array_filter( $selectors ) );
	}
}

add_filter( 'st_toc_ignored_selector_before_heading', 'st_toc_get_ignored_selector_before_heading' );

if ( ! function_exists( 'st_toc_back_class' ) ) {
	function st_toc_back_class( $classes ) {
		if ( get_theme_mod( 'st_pagetop_up', '' ) ) {
			$classes[] = 'is-top';
		}

		if ( get_theme_mod( 'st_pagetop_circle', 'yes' ) ) {
			$classes[] = 'is-rounded';
		}

		return $classes;
	}
}

add_filter( 'st_toc_back_class', 'st_toc_back_class' );
