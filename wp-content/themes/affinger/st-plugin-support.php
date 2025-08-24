<?php
if ( ! function_exists( '_st_plugin_support_get_container' ) ) {
	function _st_plugin_support_get_container( $id ) {
		return isset( $GLOBALS[ $id ] ) ? $GLOBALS[ $id ] : null;
	}
}

if ( ! function_exists( '_st_plugin_support_get' ) ) {
	function _st_plugin_support_get( $constant, $id ) {
		if ( ! defined( $constant ) ) {
			return null;
		}

		$container_id = constant( $constant );
		$container    = _st_plugin_support_get_container( $container_id );

		if ( $container === null || ! isset( $container[ $id ] ) ) {
			return null;
		}

		return $container[ $id ];
	}
}

if ( ! function_exists( '_st_plugin_support_is_enabled' ) ) {
	function _st_plugin_support_is_enabled( $constant, $value = null) {
		if ( ! defined( $constant ) ) {
			return false;
		}

		$id        = constant( $constant );
		$container = _st_plugin_support_get_container( $id );

		if ( $container === null || ! isset( $container['plugin_meta'] ) ) {
			return false;
		}

		if ( $value !== null ) {
			$plugin_meta = $container['plugin_meta'];

			return ( $plugin_meta->get_slug() === $value );
		}

		return true;
	}
}

if ( ! function_exists( '_st_plugin_support_version_compare' ) ) {
	function _st_plugin_support_version_compare( $constant, $version, $operator = null ) {
		if ( ! defined( $constant ) ) {
			return false;
		}

		$version_1 = strtolower( constant( $constant ) );
		$version_2 = strtolower( $version );

		return version_compare( $version_1, $version_2, $operator );
	}
}

if ( ! function_exists( '_st_plugin_support_support_st_gallery' ) ) {
	/**
	 * 商品ギャラリープラグインに対応する
	 */
	function _st_plugin_support_support_st_gallery() {
		// add_filter(
		// 	ST_GALLERY_API_PREFIX . '_primary_image_size',
		// 	function ( $size ) {
		// 		return 'full';    // メイン画像のサイズ名 (登録済み画像サイズ以外は要 `add_image_size()`)
		// 	}
		// );

		add_filter(
			ST_GALLERY_API_PREFIX . '_thumbnail_image_size',
			function ( $size ) {
				return 'st_kaiwa_image';    // サムネイル画像のサイズ名 (登録済み画像サイズ以外は要 `add_image_size()`)
			}
		);

		add_action(
			ST_GALLERY_API_PREFIX . '_post_configure',
			function () {
				st_gallery_run();
			}
		);
	}
}

if ( ! function_exists( '_st_plugin_support_support_st_kaiwa' ) ) {
	/**
	 * 会話風吹き出しプラグインに対応する
	 */
	function _st_plugin_support_support_st_kaiwa() {
		$plugin_meta = _st_plugin_support_get( 'ST_KAIWA', 'plugin_meta' );

		add_filter(
			$plugin_meta->get_prefix() . '_post_thumbnail_size',
			function ( $image_size ) {
				// 画像サイズ: 画像名、または [幅, 高さ, クロップ]
				return 'st_kaiwa_image';
			}
		);

		if ( get_option( 'st-data91' ) === 'yes' ) {    // サムネイル画像を大きくする
			add_filter(
				$plugin_meta->get_prefix() . '_preview_image_size',
				function ( $image_size ) {
					// プレビューサイズ: 画像名、または [幅, 高さ, クロップ]
					return array( 80, 80, true );
				}
			);
		}
	}
}

if ( ! function_exists( 'st_is_st_no_lazy_laod_shortcode_exists' ) ) {
	/**
	 * Affinger LazyLoad プラグインの [st-no-lazy-load] が存在するかどうかを返す
	 *
	 * @return bool
	 */
	function st_is_st_no_lazy_laod_shortcode_exists() {
		return _st_plugin_support_is_enabled( 'ST_LAZY_LOAD', 'st-lazy-load' ) &&
		       shortcode_exists( 'st-no-lazy-load' );
	}
}

if ( ! function_exists( '_st_plugin_support_support_st_rich_animation' ) ) {
	/**
	 * リッチアニメーションプラグインに対応する
	 */
	function _st_plugin_support_support_st_rich_animation() {
		add_action(
			ST_RICH_ANIMATION_API_PREFIX . '_post_configure',
			function () {
				st_rich_animation_run();
			}
		);
	}
}

if ( ! function_exists( 'st_is_st_rich_animation_enabled' ) ) {
	/**
	 * リッチアニメーションプラグインが有効かどうかを返す
	 *
	 * @return bool
	 */
	function st_is_st_rich_animation_enabled() {
		return defined( 'ST_RICH_ANIMATION' );
	}
}

if ( st_is_st_rich_animation_enabled() ) {
	if ( ! function_exists( 'amp_shortcode_st_rich_animation' ) ) {
		/**
		 * リッチアニメーションプラグイン: AMP 用ショートコード。コンテンツのみを出力する。
		 *
		 * @param array<string, string>|string $atts
		 * @param string|null $content
		 *
		 * @return string
		 */
		function amp_shortcode_st_rich_animation( $atts, $content = null ) {
			return _st_pass_through_shortcode( $atts, $content );
		}
	}
}

if ( ! function_exists( 'st_is_st_search_suggestion_enabled' ) ) {
	/**
	 * 検索ワード提案プラグインが有効かどうかを返す
	 *
	 * @return bool
	 */
	function st_is_st_search_suggestion_enabled() {
		return defined( 'ST_SEARCH_SUGGESTION' );
	}
}

if ( ! function_exists( 'st_is_st_reaction_buttons_enabled' ) ) {
	/**
	 * 評価ボタンプラグインが有効かどうかを返す
	 *
	 * @return bool
	 */
	function st_is_st_reaction_buttons_enabled() {
		return defined( 'ST_REACTION_BUTTONS' );
	}
}

add_action(
	'after_setup_theme',
	function () {
		// 置換くん + テンプレート挿入プラグイン
		if ( _st_plugin_support_is_enabled( 'ST_TEMPLATE_MANAGER' ) &&
		     _st_plugin_support_is_enabled( 'ST_REPLACE_META_BOX' ) &&
		     _st_plugin_support_version_compare( 'ST_REPLACE_META_BOX_API_VERSION', '1.1.0', '==' ) ) {
			$post_types = _st_plugin_support_get( 'ST_TEMPLATE_MANAGER', 'post_types');

			if (defined('ST_REPLACE_META_BOX_API_PREFIX') && isset($post_types['template'])) {
				$post_type = $post_types['template']->get_meta()->get_name();

				add_filter(
					ST_REPLACE_META_BOX_API_PREFIX . '_post_types',
					function ( array $post_types = array() ) use ( $post_type ) {
						$post_types[] = $post_type;

						return $post_types;
					}
				);
			}
		}

		if ( _st_plugin_support_is_enabled( 'ST_CARD_EX', 'st-card-ex' ) &&
		     _st_plugin_support_version_compare( 'ST_CARD_EX_API_VERSION', '1.1.0', '==' ) &&
		     function_exists( 'St\Plugin\Card_Ex\boot' ) ) {
			St\Plugin\Card_Ex\boot();
		}

		if ( _st_plugin_support_is_enabled( 'ST_LAZY_LOAD', 'st-lazy-load' ) &&
		     _st_plugin_support_version_compare( 'ST_LAZY_LOAD_API_VERSION', '1.1.0', '>=' ) &&
		     function_exists( 'St\Plugin\Lazy_Load\run' ) ) {
			St\Plugin\Lazy_Load\run();
		}

		if ( _st_plugin_support_is_enabled( 'ST_TEMPLATE_MANAGER', 'st-template-manager' ) &&
		     function_exists( 'St\Plugin\Template_Manager\run' ) ) {
			St\Plugin\Template_Manager\run();
		}

		if ( _st_plugin_support_is_enabled( 'ST_EXPORT_META_BOX', 'st-export-meta-box' ) &&
		     function_exists( 'St\Plugin\Export_Meta_Box\boot' ) ) {
			St\Plugin\Export_Meta_Box\boot();
		}

		if ( _st_plugin_support_is_enabled( 'ST_REPLACE_META_BOX', 'st-replace-meta-box' ) ) {
			// \St\Plugin\Replace_Meta_Box\boot() 追加前のバージョンとの互換用
			if ( isset( $GLOBALS[ ST_REPLACE_META_BOX ]['plugin'] ) ) {
				$GLOBALS[ ST_REPLACE_META_BOX ]['plugin']->boot();
			}
		}

		if ( _st_plugin_support_is_enabled( 'ST_CUSTOM_SEARCH', 'st-custom-search' ) &&
		     function_exists( 'St\Plugin\Custom_Search\run' ) ) {
			St\Plugin\Custom_Search\run();
		}

		if ( _st_plugin_support_is_enabled( 'ST_MULTI_INSTALLER', 'st-multi-installer' ) &&
		     function_exists( 'St\Plugin\Multi_Installer\run' ) ) {
			St\Plugin\Multi_Installer\run();
		}

		// 会話風吹き出しプラグイン
		if ( _st_plugin_support_is_enabled( 'ST_KAIWA', 'st-kaiwa' ) ) {
			_st_plugin_support_support_st_kaiwa();

			// st-kaiwa 2.2.0+
			if ( _st_plugin_support_version_compare( 'ST_KAIWA_API_VERSION', '2.2.0', '>=' ) ) {
				add_filter(
					'st_block_editor_style_dependencies',
					function ( array $deps ) {
						$deps[] = ST_KAIWA_API_SLUG . '-block-editor';

						return $deps;
					}
				);
			}
		}

		// Gutenberg 用ブロックプラグイン
		if ( _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) &&
		     function_exists( 'St\Plugin\Blocks\run' ) ) {
			St\Plugin\Blocks\run();

			// プラグインの構造化データ出力を無効化する
			add_filter( 'st_blocks_output_structured_data', '__return_false' );

			// st-blocks プラグイン
			if ( _st_plugin_support_version_compare( 'ST_BLOCKS_API_VERSION', '2.5.0', '>=' ) ) {
				// st-blocks 2.5.0+
				if ( ! _st_plugin_support_version_compare( 'ST_KAIWA_API_VERSION', '2.2.0', '>=' ) ) {
					// st-kaiwa < 2.2.0
					add_filter(
						'st_block_editor_style_dependencies',
						function ( array $deps ) {
							$deps[] = ST_BLOCKS_API_SLUG . '-st-kaiwa';

							return $deps;
						}
					);
				}
			} elseif ( defined( 'ST_KAIWA' ) && defined( 'ST_KAIWA_API_SLUG' ) ) {
				// st-blocks 2.5.0 未満
				add_filter(
					'st_block_editor_style_dependencies',
					function ( array $deps ) {
						$deps[] = ST_KAIWA_API_SLUG . '-block-editor-style';

						return $deps;
					}
				);
			}
		}

		// 商品ギャラリープラグイン
		if ( defined( 'ST_GALLERY' ) ) {
			_st_plugin_support_support_st_gallery();
		}

		// リッチアニメーションプラグイン
		if ( st_is_st_rich_animation_enabled() ) {
			_st_plugin_support_support_st_rich_animation();
		}
	});

if ( wp_is_mobile() ){ // スマホ又はタブレット
	if( get_theme_mod( 'st_sticky_menu', '' ) === 'fixed' ) { // スマホスライドメニューが「固定」の場合
		add_filter(
			'st_toc_fixed_element_selector',
			function ( $selector ) {
				return '#s-navi dl.acordion';
			}
		);
	} elseif( get_theme_mod( 'st_sticky_menu', '' ) === 'fixed-info' ) { // スマホ インフォメーションが「固定」の場合
		add_filter(
			'st_toc_fixed_element_selector',
			function ( $selector ) {
				return '#st-header-top-widgets-box';
			}
		);
	}
} else {
	if ( get_theme_mod( 'st_fixed_pc_header', '' ) === 'fixed' ) {    // ヘッダーナビゲーション（PC）の表示パターンが「固定」の場合
		add_filter(
			'st_toc_fixed_element_selector',
			function ( $selector ) {
				return '#headbox-bg';
			}
		);	
	} elseif ( get_theme_mod( 'st_fixed_pc_header', '' ) === 'fixed-pcmenu' ) { // ヘッダーナビゲーション（PC）の表示パターンが「メニュー」の場合
		add_filter(
			'st_toc_fixed_element_selector',
			function ( $selector ) {
				return '#st-menuwide';
			}
		);	
	} elseif ( get_theme_mod( 'st_fixed_pc_header', '' ) === 'fixed-headerinfo' ) { // ヘッダーナビゲーション（PC）の表示パターンが「インフォメーション」の場合
		add_filter(
			'st_toc_fixed_element_selector',
			function ( $selector ) {
				return '#st-header-top-widgets-box';
			}
		);	
	}
}

/** 安心くん: 一般テーマ用バージョン作成前の互換用 */
add_filter(
	'st_export_meta_box_download_filename',
	function ( $filename ) {
		// ファイル名: 以下の文字は置換されます。
		//
		// 置換前          置換後
		// %datetime_Y%    年
		// %datetime_m%    月
		// %datetime_d%    日
		// %datetime_H%    時
		// %datetime_i%    分
		// %datetime_s%    秒
		// %site_name%     サイト名
		// %post_title%    記事タイトル

		return '%datetime_Y%_%datetime_m%%datetime_d%_%datetime_H%_%datetime_i%_%post_title%_%site_name%.txt';
	}
);

/** テンプレート挿入プラグイン: 調整 */
add_action(
	'st_template_manager_wp_head',
	function () {
		get_template_part( 'st-richjs' );

		$width = (int) get_option('stdata-128', '1060') - 320;

		echo <<<HTML
<style>
.st-template-manager-preview-view {
	box-sizing: border-box;
	display: block;
	margin: auto;
	padding: 20px 15px;
}

@media only screen and (min-width: 600px) {
	.st-template-manager-preview-view {
		padding: 20px 30px;
	}
}

@media only screen and (min-width: 960px) {
	.st-template-manager-preview-view {
		padding: 30px 50px;
		max-width: {$width}px;
	}
}
</style>
HTML;
	}
);

/** カスタム検索プラグイン */
add_filter('st_cs_enqueue_shortcode_styles', '__return_false');

if ( ! function_exists( '_st_plugin_support_generate_st_kaiwa_data' ) ) {
	/**
	 * st-blocks, st-kaiwa 2.2.0+ 用のショートコードのデータを生成する。
	 *
	 * @param array<string, array<string, mixed>> $data
	 *
	 * @return array<string, array<string, mixed>>
	 */
	function _st_plugin_support_generate_st_kaiwa_data( array $data ) {
		$get_option_value = function ( $option_name ) {
			$value = trim( (string) get_option( $option_name, '' ) );

			return ( $value !== '' ) ? $value : null;
		};

		return [
			'st-kaiwa1' => [
				'tagName'      => 'st-kaiwa1',
				'label'        => '会話風アイコン 1',
				'classes'      => [ 'kaiwaicon1' ],
				'iconName'     => $get_option_value( 'st-data134' ),
				'iconImageUrl' => $get_option_value( 'st-data131' ),
			],
			'st-kaiwa2' => [
				'tagName'      => 'st-kaiwa2',
				'label'        => '会話風アイコン 2',
				'classes'      => [ 'kaiwaicon2' ],
				'iconName'     => $get_option_value( 'st-data135' ),
				'iconImageUrl' => $get_option_value( 'st-data132' ),
			],
			'st-kaiwa3' => [
				'tagName'      => 'st-kaiwa3',
				'label'        => '会話風アイコン 3',
				'classes'      => [ 'kaiwaicon3' ],
				'iconName'     => $get_option_value( 'st-data136' ),
				'iconImageUrl' => $get_option_value( 'st-data133' ),
			],
			'st-kaiwa4' => [
				'tagName'      => 'st-kaiwa4',
				'label'        => '会話風アイコン 4',
				'classes'      => [ 'kaiwaicon4' ],
				'iconName'     => $get_option_value( 'st-data145' ),
				'iconImageUrl' => $get_option_value( 'st-data144' ),
			],
			'st-kaiwa5' => [
				'tagName'      => 'st-kaiwa5',
				'label'        => '会話風アイコン 5',
				'classes'      => [ 'kaiwaicon5' ],
				'iconName'     => $get_option_value( 'st-data147' ),
				'iconImageUrl' => $get_option_value( 'st-data146' ),
			],
			'st-kaiwa6' => [
				'tagName'      => 'st-kaiwa6',
				'label'        => '会話風アイコン 6',
				'classes'      => [ 'kaiwaicon6' ],
				'iconName'     => $get_option_value( 'st-data149' ),
				'iconImageUrl' => $get_option_value( 'st-data148' ),
			],
			'st-kaiwa7' => [
				'tagName'      => 'st-kaiwa7',
				'label'        => '会話風アイコン 7',
				'classes'      => [ 'kaiwaicon7' ],
				'iconName'     => $get_option_value( 'st-data151' ),
				'iconImageUrl' => $get_option_value( 'st-data150' ),
			],
			'st-kaiwa8' => [
				'tagName'      => 'st-kaiwa8',
				'label'        => '会話風アイコン 8',
				'classes'      => [ 'kaiwaicon8' ],
				'iconName'     => $get_option_value( 'st-data153' ),
				'iconImageUrl' => $get_option_value( 'st-data152' ),
			],
		];
	}
}

/**
 * st-blocks 2.5.0 未満
 * 
 * @deprecated st-blocks 2.5.0 未満の後方互換用
 */
add_filter( 'st_blocks_st_kaiwa_shortcode_data_1', '_st_plugin_support_generate_st_kaiwa_data' );

/**
 * st-blocks 2.5.0+
 */
add_filter( 'st_blocks_st_kaiwa_shortcode_data', '_st_plugin_support_generate_st_kaiwa_data' );

/**
 * st-kaiwa 2.2.0+
 */
add_filter(
	'st_kaiwa_shortcode_data',
	function ( array $data ) {
		$theme_data = _st_plugin_support_generate_st_kaiwa_data( $data );

		return $theme_data + $data;
	}
);

add_filter(
	'st_blocks_is_pc',
	function ( $is_pc ) {
		return ! st_is_mobile();
	}
);

add_filter(
	'st_blocks_is_amp',
	function ( $is_amp ) {
		return amp_is_amp();
	}
);

add_filter(
	'st_blocks_theme_supports_data',
	function ( $data ) {
		return array(
			'ex' => st_is_ver_ex(),
		);
	}
);

add_filter(
	'st_blocks_features_data',
	function ( $data ) {
		$is_ex                    = st_is_ver_ex();
		$in_speed_mode            = ( get_option( 'st-data434', '' ) === 'yes' );
		$is_infinity_loop_enabled = ( get_option( 'st-data421', '' ) === 'yes' );

		$data['blocks']['st-catgroup']['card']      = $is_ex;
		$data['blocks']['st-catgroup']['slide']     = true;
		$data['blocks']['st-catgroup']['load_more'] = ($is_ex && !$in_speed_mode && $is_infinity_loop_enabled);

		$data['blocks']['st-taggroup']['card']      = $is_ex;
		$data['blocks']['st-taggroup']['slide']     = true;
		$data['blocks']['st-taggroup']['load_more'] = ($is_ex && !$in_speed_mode && $is_infinity_loop_enabled);

		$data['blocks']['st-postgroup']['card']  = $is_ex;
		$data['blocks']['st-postgroup']['slide'] = $is_ex;

		return $data;
	}
);

add_filter( 'st_card_ex_register_block_assets', '__return_true' );
add_filter( 'st_card_ex_enqueue_block_assets', '__return_true' );

if ( ! function_exists( '_st_plugin_support_st_blocks_structured_data' ) ) {
	/**
	 * Gutenberg 用ブロックプラグインの構造化データを統合する
	 *
	 * @param array<string, mixed> $data
	 *
	 * @return array<string, mixed>
	 */
	function _st_plugin_support_st_blocks_structured_data( array $data ) {
		$structured_data = _st_plugin_support_get( 'ST_BLOCKS', 'structured_data' );

		if ( $structured_data === null ) {
			return $data;
		}

		$data = array_merge( $data, $structured_data->all() );

		return $data;
	}
}

add_filter( 'st_sd_structured_data', '_st_plugin_support_st_blocks_structured_data' );
