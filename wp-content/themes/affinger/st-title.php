<?php
// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

//////////////////////////////////
// タイトル
//////////////////////////////////

// 記事タイトル先頭に挿入するテキスト
$title_h = '';

if ( trim( $GLOBALS["stdata95"] ) === '' ) { //チェックがある場合はWPデフォルトのタイトル出力を使用
	if ( ! function_exists( '_st_get_title_extras' ) ) {
		function _st_get_title_extras( $post = null ) {
			$post         = get_post( $post );
			if ( st_is_ver_ex() ) {
				$title_extra  = st_get_the_title_extra( $post->ID );
			} else {
				$title_extra  = '';
			}
			$sttitlewords = trim( (string) get_post_meta( $post->ID, 'st_titlewords', true ) );
			$before       = '';
			$title        = '';
			$after        = '';

			if ( $sttitlewords !== '' ) {
				$title = $sttitlewords;
			} elseif ( $title_extra === 'category' ) {
				$cat_parts = [];

				foreach ( get_the_category( $post->ID ) as $category ) {
					// カテゴリー名
					$cat_parts[] = '【' . $category->name . '】';
				}

				// {$カテゴリー名} . '' . {$カテゴリー名} ...
				$before = esc_html( implode( '', $cat_parts ) );
			} elseif ( $title_extra === 'year_month' ) {
				$after = ' ' . esc_html( date_i18n( 'Y年n月' ) );
			}

			return compact( 'before', 'title', 'after' );
		}
	}

	if ( !function_exists( 'st_document_title_separator' ) ) {
		/**
		 * ドキュメントの区切り文字を取得
		 *
		 * @return string 区切り文字
		 */
		function st_get_document_title_separator()
		{
			if(trim($GLOBALS["stdata219"]) === ''):
				$st_title_userseparator = '-'; //デフォルトのセパレート
			else:
				$st_title_userseparator = $GLOBALS["stdata219"]; //任意のセパレート
			endif;
			return $st_title_userseparator;
		}
	}
	add_filter('document_title_separator', 'st_get_document_title_separator');

	if ( !function_exists( 'st_wp_title' ) ) {
		/**
		 * WP 4.3以下用の wp_title() 互換関数 (WP 4.3相当) + α
		 *
		 * @param string $sep 区切り文字
		 * @param bool $display 出力の有無
		 * @param string $seplocation 区切り文字の位置
		 *
		 * @return string|null タイトル
		 */
		function st_wp_title($sep = '&raquo;', $display = true, $seplocation = '' ) {
			global $wp_locale, $page, $paged;

			$m	   = get_query_var( 'm' );
			$year	= get_query_var( 'year' );
			$monthnum = get_query_var( 'monthnum' );
			$day	 = get_query_var( 'day' );

			$search = function_exists( 'st_cs_get_search_query' )
				? st_cs_get_search_query( null, '', '', '', ' - ', '・' )
				: get_query_var( 's' );

			$title    = '';
			$t_sep    = '%WP_TITILE_SEP%';
			$force_to_overwrite = false;

			// title タグの設定
			$title_extras = array(
				'before' => '',
				'title'  => '',
				'after'  => '',
			);

			// 投稿, 固定ページ
			if ( is_single() || ( is_page() && ! is_front_page() ) ) {
				$title_extras = _st_get_title_extras( get_queried_object() );
			};

			if ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) {
				if ( ( $title_extras['title'] !== '' ) ) {
					$title              = $title_extras['title'];
					$force_to_overwrite = true;
				} else {
					$title = $title_extras['before'] . single_post_title( '', false ) . $title_extras['after'];
				}
			}

			// 投稿タイプアーカイブ
			if ( is_post_type_archive() ) {
				$post_type = get_query_var( 'post_type' );

				if ( is_array( $post_type ) ) {
					$post_type = reset( $post_type );
				}

				$post_type_object = get_post_type_object( $post_type );

				if ( !$post_type_object->has_archive ) {
					$title = post_type_archive_title( '', false );
				}
			}

			// カテゴリー, タグ
			if ( is_category() || is_tag() ) {
				$title = single_term_title( '', false );
			}

			// タクソノミー
			if ( is_tax() ) {
				$term = get_queried_object();

				if ( $term ) {
					$tax   = get_taxonomy( $term->taxonomy );
					$title = single_term_title( $tax->labels->name . $t_sep, false );
				}
			}

			// 著者
			if ( is_author() && !is_post_type_archive() ) {
				$author = get_queried_object();

				if ( $author ) {
					$title = $author->display_name;
				}
			}

			// 投稿タイプアーカイブ (has_archive)
			if ( is_post_type_archive() && $post_type_object->has_archive ) {
				$title = post_type_archive_title( '', false );
			}

			// 月
			if ( is_archive() && !empty( $m ) ) {
				$my_year  = substr( $m, 0, 4 );
				$my_month = $wp_locale->get_month( substr( $m, 4, 2 ) );
				$my_day   = intval( substr( $m, 6, 2 ) );
				$title    = $my_year . ( $my_month ? $t_sep . $my_month : '' ) . ( $my_day ? $t_sep . $my_day : '' );
			}

			// 年
			if ( is_archive() && !empty( $year ) ) {
				$title = $year;

				if ( !empty( $monthnum ) ) {
					$title .= $t_sep . $wp_locale->get_month( $monthnum );
				}
				if ( !empty( $day ) ) {
					$title .= $t_sep . zeroise( $day, 2 );
				}
			}

			// 検索
			if ( is_search() ) {
				$title = sprintf( __( 'Search Results %1$s %2$s','affinger' ), $t_sep, strip_tags( $search ) );
			}

			// 404
			if ( is_404() ) {
				$title = __( 'Page not found','affinger' );
			}

			$prefix = '';

			if ( ! empty( $title ) && ! $force_to_overwrite ) {
				$prefix = " $sep ";
			}

			$title_array = apply_filters( 'wp_title_parts', explode( $t_sep, $title ) );

			if ( $seplocation === 'right' ) {
				$title_array = array_reverse( $title_array );
				$title	  = implode( " $sep ", $title_array ) . $prefix;
			} else {
				$title = $prefix . implode( " $sep ", $title_array );
			}

			// wp_head() 以外はフィルターを適用
			if ( ! did_action( 'wp_head' ) && ! doing_action( 'wp_head' ) ) {
				$title = apply_filters( 'wp_title', $title, $sep, $seplocation );
			}

			if ( $display ) {
				echo $title;
			} else {
				return $title;
			}
		}
	}

	if ( !function_exists( 'st_get_document_title' ) ) {
		/**
		 * タイトルを取得
		 *
		 * @return string タイトル
		 */
		function st_get_document_title() {
			global $page, $paged;

			$title	= '';
			if( trim($GLOBALS["stdata220"]) === '' ):
				$blog_name = get_bloginfo( 'name', 'display' ); //サイトタイトル
			else:
				$blog_name = $GLOBALS["stdata220"]; // 記事タイトル末尾に付くタイトル変更
			endif;
			$page_name = '';

			if ( $paged >= 2 || $page >= 2 ) {
				$page_name = ' ' . st_get_document_title_separator() . ' ' . sprintf( '%sページ', max( $paged, $page ) );
			}

			// フロントページ
			if ( is_front_page() ) {
				if ( trim( $GLOBALS["stdata33"] ) !== '' ) {
					$title = esc_html( $GLOBALS["stdata33"] );
				} elseif ( !is_home() ){
					$title = single_post_title( '', false ); //記事タイトル
				} elseif ( get_bloginfo( 'description', 'display' ) !== '' ){
					$title .= get_bloginfo( 'description', 'display' ) . ' ' . st_get_document_title_separator() . ' ' . get_bloginfo( 'name', 'display' );
				} else {
					$title .= get_bloginfo( 'name', 'display' );
				}

				return $title;
			}

			// title タグの設定
			$title_extras = array(
				'before' => '',
				'title'  => '',
				'after'  => '',
			);

			if ( is_single() || ( is_page() && ! is_front_page() ) ) {
				$title_extras = _st_get_title_extras( get_queried_object() );
			};

			// その他
			if ( trim( $GLOBALS["stdata94"] ) !== '' && ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) ) { //タイトルにサイト名を付加しない
				$title = ( $title_extras['title'] !== '' )
					? $title_extras['title']
					: $title_extras['before'] . single_post_title( '', false ) . $title_extras['after'];

				$title .= $page_name;
			} else {
				switch ( true ) {
					case ( is_single() ):
						$title = st_wp_title( st_get_document_title_separator(), false, 'right' );
						$title .= ( $title_extras['title'] !== '' ) ? $page_name : $blog_name . $page_name;
						break;

					case ( is_home() && ! is_front_page() ):
						$title = st_wp_title( st_get_document_title_separator(), false, 'right' );
						$title .= $blog_name . $page_name;
						break;

					case ( is_page() ):
						$title = st_wp_title( st_get_document_title_separator(), false, 'right' );
						$title .= ( $title_extras['title'] !== '' ) ? $page_name : $blog_name . $page_name;
						break;

					case ( is_archive() ):
						$title = st_wp_title( st_get_document_title_separator(), false, 'right' );
						$title .= $blog_name . $page_name;
						break;

					case ( is_search() ):
						$title = st_wp_title( st_get_document_title_separator(), false, 'right' );
						$title .= $blog_name . $page_name;
						break;

					case ( is_404() ):
						$title = '404 ' . st_get_document_title_separator();
						$title .= $blog_name . $page_name;
						break;

					default:
						$title .= $blog_name . $page_name;
						break;
				}
			}

			if ( st_is_ver_ex() ) {
				//タームのカスタムタイトル挿入
				if ( is_category() || is_tag() ) {
					$term_id   = get_queried_object_id(); //現在のターム ID を取得
					$term_meta = st_get_term_meta( $term_id );

					if ( $term_meta['title'] !== '' ) {
						$title = esc_html( $term_meta['title'] );
					}
				}
			} else {
				//カテゴリーのカスタムタイトル挿入
				if( is_category() ){
						$now_category = get_query_var('cat');
						$args = array(
						'include' => array( $now_category ),
					);
					$tag_all = get_terms( "category", $args );
					$cat_data = st_get_term_meta( $now_category );

					if ( trim($cat_data['st_cattitle']) !== '' ){
						$title = esc_html( $cat_data['st_cattitle'] );
					}
				}
			}

			// 記事タイトル先頭に挿入するテキスト
			if( ! is_front_page() && ( is_single() || is_page() ) && trim( $GLOBALS["stdata652"] ) !== '' ):
				$title_h = $GLOBALS["stdata652"];
				$title = $title_h . $title;
			endif;

			return $title;
		}

		// wp_title フィルターでタイトルを置換 (WP ~4.3)
		if ( !function_exists( 'wp_get_document_title' ) ) {
			add_filter( 'wp_title', 'st_get_document_title' );
		}
	}

	if ( !function_exists( 'st_legacy_render_title_tag' ) ) {
		/**
		 * title要素を出力 (WP ~4.1互換)
		 */
		function st_legacy_render_title_tag() {
			echo '<' . 'title>' . st_get_document_title() . '<' . '/title>' . "\n";
		}

		// 互換関数でtitle要素を出力 (WP ~4.1)
		if ( !function_exists( '_wp_render_title_tag' ) ) {
			add_action( 'wp_head', 'st_legacy_render_title_tag', 1 );
		}
	}

	if ( !function_exists( 'st_get_document_title_array' ) ) {
		/**
		 * タイトルの要素を配列で取得
		 *
		 * @return string[] タイトルの要素
		 */
		function st_get_document_title_array() {
			return array( st_get_document_title() );
		}

		// document_title_parts フィルターでタイトルを置換 (WP 4.4+)
		if ( function_exists( 'wp_get_document_title' ) ) {
			add_filter( 'document_title_parts', 'st_get_document_title_array' );
		}
	}

	// タイトル (<title>, 投稿タイトル) のテキスト変換を無効化
	// 各バージョン共通
	remove_filter( 'wp_title', 'wptexturize' );
	remove_filter( 'the_title', 'wptexturize'   );

	// WP 4.4+ ('title-tag' サポート)
	if ( !function_exists( 'st_render_title_tag_wrapper' ) ) {
		/**
		 * _wp_render_title_tag() のラッパー (run_texturize無効化用)
		 */
		function st_render_title_tag_wrapper() {
			$GLOBALS['_st_should_run_wptexturize'] = false;
			wptexturize( 'force to reset static $run_wptexturize', true );

			_wp_render_title_tag();

			$GLOBALS['_st_should_run_wptexturize'] = true;
			wptexturize( 'force to reset static $run_wptexturize', true );

			unset($GLOBALS['_st_should_run_wptexturize']);
		}
	}

	if ( !function_exists( 'st_should_run_wptexturize' ) ) {
		/**
		 * wptexturizeを実行するかどうかを取得
		 *
		 * @param bool $run_texturize run_wptexturizeフィルターの引数
		 *
		 * @return bool wptexturizeを実行するかどうか
		 */
		function st_should_run_wptexturize( $run_texturize ) {
			if ( !isset( $GLOBALS['_st_should_run_wptexturize'] ) || $GLOBALS['_st_should_run_wptexturize'] ) {
				return $run_texturize;
			}

			return false;
		}
	}
	add_filter( 'run_wptexturize', 'st_should_run_wptexturize', PHP_INT_MAX );

	if ( function_exists( '_wp_render_title_tag' ) ) {
		// _wp_render_title_tag 差し替え
		remove_action( 'wp_head', '_wp_render_title_tag', 1 );
		add_action( 'wp_head', 'st_render_title_tag_wrapper', 1 );
	}


}
