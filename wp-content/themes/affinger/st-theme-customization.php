<?php
// 全ver統一

//カラーパターンによるオリジナルカスタマイザー **使用時** の theme_mod の値を取得
if ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'biz' ){ //ビジネス
	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides_biz.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides_biz.php' );
	}
}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'flat' ){ // フラット
 	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides_flat.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides_flat.php' );
	}
}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'cute' ){ // キュート
 	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides_cute.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides_cute.php' );
	}
}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'blog' ){ // ブログ
 	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides_blog.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides_blog.php' );
	}
}elseif ( st_is_ver_ex() && isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'ex' ){ // EX
 	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides_ex.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides_ex.php' );
	}
}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'reset' ){ // リセット
 	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides_reset.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides_reset.php' );
	}
}else{ // デフォルト（横グラデーション）
 	if ( locate_template( 'st-theme-get-preset-theme-mod-overrides.php' ) !== '' ) {
		require_once locate_template( 'st-theme-get-preset-theme-mod-overrides.php' );
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'St_Customize_Button_Control' ) ) {
	class St_Customize_Button_Control extends WP_Customize_Control {
		public $type         = 'button';

		public $button_label = 'ボタン';

		public $class        = 'button-primary button';

		public function render_content() {
			?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>

				<button id="<?php echo esc_attr( $this->id ); ?>" type="button" name="<?php echo esc_attr( $this->id ); ?>" class="<?php echo esc_attr( $this->class ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); ?>>
					<?php echo esc_html( $this->button_label ); ?>
				</button>
			</label>
			<?php
		}

		public function enqueue() {
			wp_enqueue_script(
				'st-customizer-reset',
				get_template_directory_uri() . '/js/customizer-reset.js',
				array( 'jquery' ),
				false,
				true
			);

			wp_localize_script(
				'st-customizer-reset',
				'ST_CUSTOMIZER_RESET',
				array(
					'nonce' => wp_create_nonce( 'st_customizer_reset' ),
				)
			);
		}
	}
}

if ( !function_exists( 'st_is_customizer_enabled' ) ) {
	/**
	 * オリジナルカスタマイザーが有効化どうかを取得
	 *
	 * @return bool 有効な場合は true、 その他は false
	 */
	function st_is_customizer_enabled() {
		return true;
	}
}

if ( !function_exists( 'st_get_preset_name' ) ) {
	/**
	 * プリセット名を取得
	 *
	 * @return string プリセット名
	 */
	function st_get_preset_name() {
		return get_option( 'st-data68', '' );
	}
}

if ( !function_exists( 'st_should_output_style_element' ) ) {
	/**
	 * カスタマイザー用CSSを <style> で出力するかどうかを取得
	 *
	 * @return bool 出力する場合は true、 その他は false
	 */
	function st_should_output_style_element() {
		return ( get_option( 'st-data90', '' ) === 'yes' );
	}
}

if ( !function_exists( 'st_get_kantan_setting' ) ) {
	/**
	 * 簡単設定の値を取得
	 *
	 * @return string 簡単設定の値
	 */
	function st_get_kantan_setting() {
		return get_theme_mod( 'st_theme_setting', '' );
	}
}

if ( !function_exists( 'st_get_entrytitle_designsetting' ) ) {
	/**
	 * 見出しタイトルの値を取得
	 */
	function st_get_entrytitle_designsetting() {
		return get_theme_mod( 'st_entrytitle_designsetting', '' );
	}
}

if ( !function_exists( 'st_get_h2_designsetting' ) ) {
	/**
	 * h2設定の値を取得
	 */
	function st_get_h2_designsetting() {
		return get_theme_mod( 'st_h2_designsetting', 'centerlinedesign' );
	}
}

if ( !function_exists( 'st_get_h3_designsetting' ) ) {
	/**
	 * h3設定の値を取得
	 */
	function st_get_h3_designsetting() {
		return get_theme_mod( 'st_h3_designsetting', '' );
	}
}

if ( !function_exists( 'st_get_widgets_title_designsetting' ) ) {
	/**
	 * ウィジェット設定の値を取得
	 */
	function st_get_widgets_title_designsetting() {
		return get_theme_mod( 'st_widgets_title_designsetting', '' );
	}
}

if ( !function_exists( 'st_get_previous_kantan_setting' ) ) {
	/**
	 * 保存済みの簡単設定の値を取得
	 *
	 * @return string 保存済みの簡単設定の値
	 */
	function st_get_previous_kantan_setting() {
		return get_theme_mod( '_st_current_theme_setting', st_get_kantan_setting() );
	}
}

if ( !function_exists( 'st_get_preset_colors' ) ) {
	/**
	 * プリセットのカラーを取得
	 *
	 * @param string|null $preset_name リセット名
	 *
	 * @return array<string, string> プリセットのカラー
	 */
	function st_get_preset_colors( $preset_name = null ) {
		switch ( true ) {
			// 赤 (エレガント)
			case ( $preset_name === 'red' ):
				$basecolor   = '#cf3c4f';  //一番濃い色
				$maincolor   = '#d34c5d';  //少し薄い色
				$subcolor    = '#fef9fa';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// 青 (ビジネス)
			case ( $preset_name === 'blue' ):
				$basecolor   = '#3880ff';  //一番濃い色
				$maincolor   = '#4c8dff';  //少し薄い色
				$subcolor    = '#eefaff';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// 緑 (ナチュラル)
			case ( $preset_name === 'green' ):
				$basecolor   = '#28ba62';  //一番濃い色
				$maincolor   = '#2bca6b';  //少し薄い色
				$subcolor    = '#f7fdf9';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// オレンジ (元気)
			case ( $preset_name === 'orange' ):
				$basecolor   = '#ffc409';  //一番濃い色
				$maincolor   = '#ffcd30';  //少し薄い色
				$subcolor    = '#fffefa';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// ピンク (可愛い)
			case ( $preset_name === 'pink' ):
				$basecolor   = '#ff8be2';  //一番濃い色
				$maincolor   = '#ff9fe7';  //少し薄い色
				$subcolor    = '#fffbfc';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// グレー (ダーク)
			case ( $preset_name === 'glay' ):
				$basecolor   = '#222428';  //一番濃い色
				$maincolor   = '#34373d';  //少し薄い色
				$subcolor    = '#FAFAFA';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// 赤 (やさしい)
			case ( $preset_name === 'red_y' ):
                $basecolor   = '#ed576b';  //一番濃い色
                $maincolor   = '#ef697b';  //少し薄い色
                $subcolor    = '#fef7f8';  //とても薄い色
                $accentcolor = $basecolor; //アクセント
                $textcolor   = '#ffffff';     //テキスト

				break;

			// 青 (やさしい)
			case ( $preset_name === 'blue_y' ):
                $basecolor   = '#3dc2ff';  //一番濃い色
                $maincolor   = '#51c8ff';  //少し薄い色
                $subcolor    = '#eefaff';  //とても薄い色
                $accentcolor = $basecolor; //アクセント
                $textcolor   = '#ffffff';     //テキスト

				break;

			// 緑 (やさしい)
			case ( $preset_name === 'green_y' ):
                $basecolor   = '#42d77d';  //一番濃い色
                $maincolor   = '#52da88';  //少し薄い色
                $subcolor    = '#f4fdf7';  //とても薄い色
                $accentcolor = $basecolor; //アクセント
                $textcolor   = '#ffffff';     //テキスト

				break;

			// オレンジ (やさしい)
			case ( $preset_name === 'orange_y' ):
                $basecolor   = '#ffd349';  //一番濃い色
                $maincolor   = '#ffd85d';  //少し薄い色
                $subcolor    = '#fffefa';  //とても薄い色
                $accentcolor = $basecolor; //アクセント
                $textcolor   = '#ffffff';     //テキスト

				break;

			// ピンク (やさしい)
			case ( $preset_name === 'pink_y' ):
				$basecolor   = '#ffafeb';  //一番濃い色
				$maincolor   = '#ffc3f0';  //少し薄い色
				$subcolor    = '#fffbfc';  //とても薄い色
				$accentcolor = $basecolor; //アクセント
				$textcolor   = '#ffffff';     //テキスト

				break;

			// グレー (やさしい)
			case ( $preset_name === 'glay_y' ):
                $basecolor   = '#92949c';  //一番濃い色
                $maincolor   = '#9c9ea5';  //少し薄い色
                $subcolor    = '#FAFAFA';  //とても薄い色
                $accentcolor = $basecolor; //アクセント
                $textcolor   = '#FFFFFF';     //テキスト

				break;

			// デフォルト
			default:
				$basecolor   = ''; //一番濃い色
				$maincolor   = ''; //少し薄い色
				$subcolor    = '#fafafa'; //とても薄い色
				$accentcolor = ''; //アクセント
				$textcolor   = '#333'; //テキスト

				break;
		}

		// カラーパレット
		if ( st_get_kantan_setting() !== '' ) { // 「簡単設定を使用する」が 使用しない 以外
			// カラーパレットに値がある場合は上書きする
			$kantan_colors = st_get_kantan_colors();

			$basecolor = ( $kantan_colors['keycolor'] !== '' ) ? $kantan_colors['keycolor'] : $basecolor;
			$maincolor = ( $kantan_colors['maincolor'] !== '' ) ? $kantan_colors['maincolor'] : $maincolor;
			$subcolor  = ( $kantan_colors['subcolor'] !== '' ) ? $kantan_colors['subcolor'] : $subcolor;
			$textcolor = ( $kantan_colors['textcolor'] !== '' ) ? $kantan_colors['textcolor'] : $textcolor;
		}

		// $preset_colors = st_get_preset_colors( 'プリセット名' );
		// extract( $preset_colors, EXTR_OVERWRITE ); // 強制的に上書きの場合
		//
		// で変数へ展開可
		return array(
			// キー (展開時は変数名) => 値
			'basecolor'   => $basecolor,
			'maincolor'   => $maincolor,
			'subcolor'    => $subcolor,
			'accentcolor' => $accentcolor,
			'textcolor'   => $textcolor,
		);
	}
}

if ( !function_exists( 'st_get_kantan_colors' ) ) {
	/**
	 * 簡単設定のカラーを取得
	 *
	 * @return array<string, string> 簡単設定のカラー
	 */
	function st_get_kantan_colors() {
		// $kantan_colors = st_get_kantan_colors();
		// extract( $kantan_colors, EXTR_OVERWRITE ); // 強制的に上書きの場合
		//
		// で変数へ展開可
		return array(
			// キー (展開時は変数名) => 値
			'keycolor'  => get_theme_mod( 'st_key_patterncolor', '' ),
			'maincolor' => get_theme_mod( 'st_main_patterncolor', '' ),
			'subcolor'  => get_theme_mod( 'st_sub_patterncolor', '' ),
			'textcolor' => get_theme_mod( 'st_text_patterncolor', '' ),
		);
	}
}

if ( !function_exists( 'st_get_plain_theme_mod_defaults' ) ) {
	/**
	 * オリジナルカスタマイザー **未使用時** の theme_mod の初期値を取得
	 *
	 * プリセットを使用 **しない** 場合の初期値を取得
	 * 初期値は、全てのカスタマイザー設定 (プリセット、簡単設定) のベースにもなる
	 *
	 * 取得対象は `get_theme_mod()` で取得する値のみ
	 * `get_option()` で取得する値は **対象外**
	 *
	 * @return array<string, string> theme_mod の初期値
	 */
	function st_get_plain_theme_mod_defaults() {
		return array(
			// `get_theme_mod(theme_mod名, 初期値)` の theme_mod名 => 初期値
			'st_adjustment_label_post_area'   => '', // 調整ラベル
			'st_adjustment_label_post_area_front'   => '', // 調整ラベル
			'st_tilt_direction'      => '',   //傾きの方向
			'st_tilt_height'         => '40', //傾きの高さ（%）
			'st_tilt_direction_btm'  => '',   //傾きの方向
			'st_tilt_height_btm'     => '60', //傾きの高さ（%）
			'st_tilt_bgcolor'        => '',   //背景色
			'st_tilt_bgcolor_btm'    => '',   //背景色
			'st_tilt_brightness'     => '',   //暗くする

			'st_header_footer_logo'   => '',   //ヘッダーロゴをフッターにも
			'st_pc_logo_height'       => '',   //PCロゴ画像の最大の高さ（px）
			'st_mobile_logo_height'   => '48', //スマホロゴ画像の最大の高さ（px）
			'st_mobile_logo_center'   => '',   //スマホロゴ（又はタイトル）をセンター寄せ
			'st_mobile_sitename'      => '',   //スマホタイトル使用時のテキスト色
			'st_icon_logo_width'      => '60', //アイコンロゴの最大の高さ（px）
			'st_icon_logo_width_sp'   => '38', //スマホアイコンロゴの最大の高さ（px）
			'st_icon_logo_radius'     => '',   //丸くする

			'st_area'                 => '', //記事エリアを広げる
			'st_main_top_bg_none'     => '', //トップページのみ背景色を無くす
			'st_main_archive_bg_none' => '', //アーカイブの背景色を無くす

			'st_top_bordercolor' => '',    //サイト上部にボーダー
			'st_line100'         => '',    //サイト上部ボーダーを100%に
			'st_line_height'     => '',    //サイト上部ボーダーの高さ

			'st_headbox_bgcolor_t'          => '',    //ヘッダーの背景色上部
			'st_headbox_bgcolor'            => '',    //ヘッダーの背景色下部
			'st_body_sub_bgcolor'           => '', //サブ背景色
			'st_body_bg_designsetting'      => '', //背景のスタイル
			'st_body_alpha_bgcolor'         => '', //透過背景色
			'st_body_bg_alpha'              => 0.9, //透過レベル
			'st_front_page_bgcolor'         => '', //フロントページの背景色
			'st_wrapper_bgcolor'            => '',    //Wrapperの背景色
			'st_header100'                  => '',    //ヘッダーの背景画像の幅100%
			'st_header_image_side'          => 'center', //ヘッダーの背景画像の横位置
			'st_header_image_top'           => 'center', //ヘッダーの背景画像の縦位置
			'st_header_image_repeat'        => '',    //ヘッダーの背景画像の繰り返し
			'st_header_bg_image_flex'       => '',    //背景画像を幅100%のレスポンシブにする
			'st_header_front_exclusion_set' => '',    //背景色及び画像をトップページのみ除外する
			'st_header_gradient'            => '',        //グラデーションを横向きにする

			'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
			'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
			'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
			'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

			'st_headerarea_bgcolor'        => '',       //headerの背景色
			'st_headerbg_image_area'       => '',       //headerの背景画像の範囲
			'st_headerbg_image_side'       => 'center', //headerの背景画像の横位置
			'st_headerbg_image_top'        => 'center', //headerの背景画像の縦位置
			'st_headerbg_image_repeat'     => '',       //headerの背景画像の繰り返し
			'st_headerbg_image_flex'       => '',       //headerの背景画像のレスポンシブ化
			'st_headerbg_image_dark'       => '',       //背景画像を暗くする

			'st_menu_logocolor' => '', //サイトタイトル及びディスクリプション色

			'st_front_menu_maincolor'                 => '',        //フロントメインエリア背景色
			'st_front_menu_main_bordercolor'          => '',        //フロントメインエリアボーダー色
			'st_front_main_shadow'                    => '',        //シャドウを適応する
			'st_front_main_opacity'                   => '',        //フロントメインエリア背景の透過
			'st_front_main_opacity_sp'                => '',        //スマホにも反映する
			'st_front_entry_content_bg_image_side'    => 'center',  //フロントメインエリア背景画像の横位置
			'st_front_entry_content_bg_image_top'     => 'center',  //フロントメインエリア背景画像の縦位置
			'st_front_entry_content_bg_image_repeat'  => '',        //フロントメインエリア背景画像の繰り返し
			'st_front_entry_content_bg_image_flex'    => '',        //背景画像を幅100%のレスポンシブにする

			'st_menu_maincolor'                 => '',        //記事エリア背景色
			'st_menu_main_bordercolor'          => '',        //記事エリアボーダー色
			'st_main_shadow'                    => '',        //シャドウを適応する
			'st_main_opacity'                   => '',        //記事エリア背景の透過
			'st_main_opacity_sp'                => '',        //スマホにも反映する
			'st_entry_content_bg_image_side'    => 'center',  //記事エリア背景画像の横位置
			'st_entry_content_bg_image_top'     => 'center',  //記事エリア背景画像の縦位置
			'st_entry_content_bg_image_repeat'  => '',        //記事エリア背景画像の繰り返し
			'st_entry_content_bg_image_flex'    => '',        //背景画像を幅100%のレスポンシブにする
			
			'st_stdata275'    => '',        //フロントメインエリア上部の余白を0にする（PCのみ※960px以上）
			'st_stdata382'    => '',        //フロントメインエリア上部の余白を0にする（スマホ・タブレットのみ※959px以下）
			'st_stdata276'    => '',        //記事エリア上部の余白を0にする（PCのみ※960px以上）
			'st_stdata383'    => '',        //記事エリア上部の余白を0にする（スマホ・タブレットのみ※959px以下）

			'st_footer_widgets_bg_color' => '',       //フッターバナーエリア背景色
			'st_footer_widgets100'       => '',       //フッターバナーエリア幅を100%にする

			'st_footer_bg_text_color' => '',       //フッターテキスト色
			'st_footer_bg_color_t'    => '',       //フッター背景色上部
			'st_footer_bg_color'      => '',       //フッター背景色下部
			'st_footer100'            => '',       //フッター背景幅100%
			'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
			'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
			'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
			'st_footerbg_image_flex'  => '',       //背景画像を幅100%のレスポンシブにする
			'st_footerbg_image_dark'  => '',       //背景画像を暗くする
			'st_footer_gradient'      => '',        //グラデーションを横向きにする

			//一括カラー
			'st_main_textcolor'      => '', //記事の文字色
			'st_main_textcolor_sub'      => '', //範囲を広げる（記事タイトル・抜粋など）
			'st_side_textcolor'      => '', //サイドバーの文字色
			'st_link_textcolor'      => '', //記事のリンク色
			'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
			'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

			//オリジナルブロック
			'st_memo_block_icon_color'      => '', //メモブロックの文字色
			'st_memo_block_bg_color'        => '', //メモブロックの背景色
			'st_memo_block_border_color'    => '', //メモブロックの枠線
			'st_mybox_block_icon_color'      => '', //マイボックスブロックの文字色
			'st_mybox_block_bg_color'        => '', //マイボックスブロックの背景色
			'st_mybox_block_border_color'    => '', //マイボックスブロックの枠線
			'st_freebox_block_icon_color'    => '', //見出し付きフリーボックスブロックの文字色
			'st_freebox_block_bg_color'      => '', //見出し付きフリーボックブロックの背景色
			'st_freebox_block_border_color'  => '', //見出し付きフリーボックブロックの枠線
			'st_banarbox_block_icon_color'    => '', //バナー風ボックスブロックの文字色
			'st_banarbox_block_bg_color'      => '', //バナー風ボックブロックの背景色

			//ヘッダー
			'st_headerwidget_bgcolor'   => '',        //ヘッダーウィジェットの背景色
			'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
			'st_header_tel_color'       => '', //ヘッダーの電話番号とリンク色
			'st_fixed_pc_header'        => '', //ヘッダーナビゲーションを固定する
			'st_pc_header_fixed_alpha_bgcolor'        => '', //ヘッダーナビゲーション固定用カラーフィルター
			'st_pc_header_fixed_bg_alpha'        => 0.9, //ヘッダーナビゲーション固定用カラーフィルター透過レベル

			//投稿及び固定記事
			'st_kuzu_color'      => '#777', //投稿日時・ぱんくず・タグ
			'st_kuzu_b'          => '', //投稿日時スタイルBに
			'st_kuzu_b_color'    => '', //スタイルBのテキスト色
			'st_kuzu_b_bg_color' => '', //スタイルBの背景色
			'st_kuzu_b_color_writer'    => '', //スタイルBの執筆者テキスト色
			'st_kuzu_b_bg_color_writer' => '', //スタイルBの執筆者背景色

			//記事タイトル
			'st_entrytitle_color'             => '', //記事タイトルのテキスト色
			'st_entrytitle_bgcolor'           => '',        //記事タイトルの背景色
			'st_entrytitle_bgcolor_t'         => '',        //記事タイトルの背景色上部
			'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
			'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
			'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
			'st_entrytitle_border_tb_sub'     => '',    //記事タイトルのボーダー上を太く下をサブカラーに
			'st_entrytitle_border_size'       => '',    //記事タイトルのボーダーの太さ
			'st_entrytitle_border_tb_dot'     => '',    //記事タイトルのボーダー上をドットに
			'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更
			'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
			'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
			'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
			'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
			'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの上下の余白
			'st_entrytitle_bgimg_margin'      => '',        //記事タイトルの下のマージン
			'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
			'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
			'st_entrytitle_gradient'          => '',        //グラデーションを横向きにする
			'st_entrytitle_text_center'       => '',        //テキストをセンタリング
			'st_entrytitle_design_wide'       => '',        //デザインを幅一杯にする

			//h2タグ
			'st_h2_color'             => '', //h2のテキスト色
			'st_h2_bgcolor'           => '',        //h2の背景色
			'st_h2_bgcolor_t'         => '',        //h2の背景色上部
			'st_h2border_color'       => '',        //h2のボーダー色
			'st_h2border_undercolor'  => '', //h2のボーダー色（2色アンダーライン）
			'st_h2_border_tb'         => '',        //h2のボーダー上下のみ
			'st_h2_border_tb_sub'     => '',    //h2のボーダー上を太く下をサブカラーに
			'st_h2_border_size'       => '',    //h2のボーダーの太さ
			'st_h2_border_tb_dot'     => '',    //h2のボーダー上をドットに
			'st_h2_designsetting'     => '',        //h2デザインの変更
			'st_h2_bgimg_side'        => 'left',  //h2の背景画像の横位置
			'st_h2_bgimg_top'         => 'center',  //h2の背景画像の縦位置
			'st_h2_bgimg_repeat'      => '',        //h2の背景画像の繰り返し
			'st_h2_bgimg_leftpadding' => 20,        //h2の背景画像の左の余白
			'st_h2_bgimg_tupadding'   => 10,        //h2の背景画像の上下の余白
			'st_h2_bgimg_tumargin'    => '',        //h2の背景画像の上下のマージン
			'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
			'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
			'st_h2_gradient'          => '',        //グラデーションを横向きにする
			'st_h2_text_center'       => '',        //テキストをセンタリング
			'st_h2_design_wide'       => '',        //デザインを幅一杯にする

			//h3タグ
			'st_h3_color'             => '', //h3のテキスト色
			'st_h3_bgcolor'           => '',        //h3の背景色
			'st_h3_bgcolor_t'         => '',        //h3の背景色上部
			'st_h3border_color'       => '',        //h3のボーダー色
			'st_h3border_undercolor'  => '', //h3のボーダー色（2色アンダーライン）
			'st_h3_border_tb'         => '',        //h3のボーダー上下のみ
			'st_h3_border_size'       => '',    //h3のボーダーの太さ
			'st_h3_border_tb_sub'     => '',    //h3のボーダー上を太く下をサブカラーに
			'st_h3_border_tb_dot'     => '',    //h3のボーダー上をドットに
			'st_h3_designsetting'     => '',        //h3デザインの変更
			'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
			'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
			'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
			'st_h3_bgimg_leftpadding' => 20,        //h3の背景画像の左の余白
			'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
			'st_h3_bgimg_tumargin'    => '',         //h3の背景画像の上下のマージン
			'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
			'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
			'st_h3_gradient'          => '',        //グラデーションを横向きにする
			'st_h3_text_center'       => '',        //テキストをセンタリング
			'st_h3_design_wide'       => '',        //デザインを幅一杯にする

			//h4タグ
			'st_h4_textcolor'         => '', //h4の文字色
			'st_h4bordercolor'        => '',        //h4のボーダー色
			'st_h4bgcolor'            => '',        //h4の背景色
			'st_h4_design'            => '',         //h4の左ボーダー
			'st_h4_top_border'        => '',        //h4の上ボーダー
			'st_h4_bottom_border'     => '',        //h4の下ボーダー
			'st_h4_border_size'       => '',         //h4のボーダーの太さ
			'st_h4_bgimg_side'        => 'left',  //h4の背景画像の横位置
			'st_h4_bgimg_top'         => 'center',  //h4の背景画像の縦位置
			'st_h4_bgimg_repeat'      => '',        //h4の背景画像の繰り返し
			'st_h4_bgimg_leftpadding' => 20,        //h4の背景画像の左の余白
			'st_h4_bgimg_tupadding'   => 10,        //h4の背景画像の上下の余白
			'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
			'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
			'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
			'st_h4_husen_shadow'      => '',        //ふせん風の影をつける

			//h4（まとめ）タグ
			'st_h4_matome_textcolor'         => '', //h4（まとめ）の文字色
			'st_h4_matome_bordercolor'       => '',        //h4（まとめ）のボーダー色
			'st_h4_matome_bgcolor'           => '',        //h4（まとめ）の背景色
			'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
			'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
			'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
			'st_h4_matome_bgimg_side'        => 'left',  //h4（まとめ）の背景画像の横位置
			'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
			'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
			'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
			'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
			'st_h4_matome_hukidasi_design'   => '',        //h4（まとめ）デザインをふきだしに変更
			'st_h4_matome_bg_radius'         => '',        //背景や吹き出しの角を丸くする
			'st_h4_matome_no_css'            => '',        //カスタマイザーのCSSを無効化

			//h5タグ
			'st_h5_textcolor'         => '', //h5の文字色
			'st_h5bordercolor'        => '',        //h5のボーダー色
			'st_h5bgcolor'            => '',        //h5の背景色
			'st_h5_design'            => '',        //h5デザインの変更
			'st_h5_top_border'        => '',        //h5の上ボーダー
			'st_h5_bottom_border'     => '',        //h5の下ボーダー
			'st_h5_border_size'       => '',        //h5のボーダーの太さ
			'st_h5_bgimg_side'        => 'left',  //h5の背景画像の横位置
			'st_h5_bgimg_top'         => 'center',  //h5の背景画像の縦位置
			'st_h5_bgimg_repeat'      => '',        //h5の背景画像の繰り返し
			'st_h5_bgimg_leftpadding' => 20,        //h5の背景画像の左の余白
			'st_h5_bgimg_tupadding'   => 10,        //h5の背景画像の上下の余白
			'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
			'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
			'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
			'st_h5_husen_shadow'            => '',        //ふせん風の影をつける

			'st_blockquote_color'      => '', //引用部分の背景色
			'st_blockquote_icon_color' => '', //引用部分のアイコン・ライン

			'st_separator_color'       => '', //NEW ENTRYのテキスト色
			'st_separator_bgcolor'     => '', //NEW ENTRYの背景色
			'st_separator_bordercolor' => '', //NEW ENTRYのボーダー色
			'st_separator_type'        => '', //デザインパターン

			'st_catbg_color'   => '', //カテゴリーの背景色
			'st_cattext_color' => '', //カテゴリーのテキスト色
			'st_cattext_radius' => '', //角を丸くする

			// 広告
			'st_ad_display_bg_color'   => '', //広告の背景色
			'st_ad_display_text_color' => '', //広告のテキスト色
			'st_ad_display_style'      => '', //広告のスタイル

			//お知らせ
			'st_news_datecolor'            => '', //お知らせ日付のテキスト色
			'st_news_text_color'           => '', //お知らせのテキストと下線色
			'st_menu_newsbarcolor_t'       => '',        //お知らせの背景色上
			'st_menu_newsbarcolor'         => '',        //お知らせの背景色下
			'st_menu_newsbar_border_color' => '',        //お知らせのボーダー色
			'st_menu_newsbartextcolor'     => '', //お知らせのテキスト色
			'st_menu_newsbgcolor'          => '',        //お知らせの全体背景色

			//メニュー
			'st_menu_navbar_topunder_color' => '',        //メニューの上下ボーダー色
			'st_menu_navbar_side_color'     => '',        //メニューの左右ボーダー色
			'st_menu_navbar_right_color'    => '',        //メニューの右ボーダー色
			'st_menu_navbarcolor'           => '',        //メニューの背景色下
			'st_menu_navbarcolor_t'         => '',        //メニューの背景色上
			'st_menu_navbartextcolor'       => '', //PCメニューテキスト色
			'st_menu_bold'                  => '',        //第一階層メニューを太字にする
			'st_menu100'                    => '',        //PCメニュー100%
			'st_menu_center'                => 'yes',        //メニューをセンター寄せにする
			'st_menu_width'                 => 160,        //PCメニューの幅
			'st_menu_padding'               => '',        //PCメニューの上下に隙間
			'st_navbarcolor_gradient'       => '',        //グラデーションを横向きにする

			'st_headermenu_bgimg_side'           => 'center', //ヘッダーメニューの背景画像の横位置
			'st_headermenu_bgimg_top'            => 'center', //ヘッダーメニューの背景画像の縦位置
			'st_headermenu_bgimg_repeat'         => '',       //ヘッダーメニューの背景画像の繰り返し
			'st_menu_navbar_front_exclusion_set' => '',       //背景色及び画像をトップページのみ除外する（第一階層）

			'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
			'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
			'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
			'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
			'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

			'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
			'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
			'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

			'st_header_top_bgcolor'      => '', //ヘッダー画像上の背景色
			'st_header_top_bgcolor_g'    => '', //ヘッダー画像上の背景色（右）
			'st_header_top_textcolor'    => '', //ヘッダー画像上のテキスト色
			'st_header_top_stripe'       => '', //ストライプデザインに変更（※要背景色）
			'st_header_info_100'         => 'yes', //横幅を100%にする

			'st_header_under_bgcolor'       => '',        //ヘッダー画像下の背景色
			'st_header_under_image_side'    => 'center',  //ヘッダー画像下の背景画像の横位置
			'st_header_under_image_top'     => 'center',  //ヘッダー画像下の背景画像の縦位置
			'st_header_under_image_repeat'  => '',        //ヘッダー画像下の背景画像の繰り返し
			'st_header_under_image_flex'    => '',        //ヘッダー画像下の背景画像のレスポンシブ化
			'st_header_under_image_dark'    => '',        //ヘッダー画像下の背景を暗くする
			'st_header_under_100'           => 'yes',        //横幅を100%にする

			'st_header_card_bgcolor'    => '',      //ヘッダーバナーの背景色
			'st_header_card_image_side'    => '',   //ヘッダーバナーの背景画像の横位置
			'st_header_card_image_top'    => '',    //ヘッダーバナーの背景画像の縦位置
			'st_header_card_image_repeat'    => '', //ヘッダーバナーの背景画像を繰り返さない
			'st_header_card_image_flex'    => '',   //ヘッダーバナー背景画像を幅100%のレスポンシブにする

			'st_headerimg100'             => '',       //ヘッダー画像100%
			'st_header_height'            => '',       //ヘッダー画像エリアの高さ
			'st_header_height_sp'         => '',       //ヘッダー画像エリアの高さ（599px以下）
			'st_header_height_vh'         => '',       //ヘッダー画像エリアの高さ（画面サイズ）
			'st_header_bgcolor'           => '',       //ヘッダー画像の背景色
			'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
			'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
			'st_topgabg_image_repeat'     => '',       //ヘッダー画像の背景画像の繰り返し
			'st_topgabg_image_flex'       => '',       //ヘッダー画像の背景画像のレスポンシブ化
			'st_topgabg_image_fix'        => '',       //パララックス効果
			'st_topgabg_image_sumahoonly' => '',       //ヘッダー画像の背景画像をスマホとタブレットのみに

			'st_menu_navbar_undercolor' => '', //PCドロップダウン下層メニュー背景

			//サイドメニューウィジェット
			'st_menu_side_widgets_topunder_color' => '',        //サイドメニューウィジェットのボーダー色
			'st_menu_side_widgetscolor'           => '',        //サイドメニューウィジェットの背景色下
			'st_menu_side_widgetscolor_t'         => '',        //サイドメニューウィジェットの背景色上
			'st_menu_side_widgetstextcolor'       => '', //サイドメニューウィジェットテキスト色
			'st_menu_icon'            => '', //メニュー第一階層のWebアイコン
			'st_undermenu_icon'       => '', //メニュー第二階層のWebアイコン
			'st_menu_icon_color'      => '', //メニュー第一階層のWebアイコンカラー
			'st_undermenu_icon_color' => '', //メニュー第二階層のWebアイコンカラー
			'st_sidemenu_fontsize'    => '', //第一階層メニューの文字サイズを大きくする
			'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
			'st_sidemenu_gradient'            => '',        //グラデーションを横向きにする

			'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色
			'st_stdata29'    => '',        //サイドバーを左にする

			'st_menu_pagelist_childtextcolor'         => '', //サイドメニュー下層のテキスト色
			'st_menu_pagelist_bgcolor'                => '',        //サイドメニュー下層の背景色
			'st_menu_pagelist_childtext_border_color' => '',        //サイドメニュー下層の下線色

			//ウィジェットタイトル
			'st_widgets_title_color'             => '', //ウィジェットタイトルのテキスト色
			'st_widgets_title_bgcolor'           => '',        //ウィジェットタイトルの背景色
			'st_widgets_title_bgcolor_t'         => '',        //ウィジェットタイトルの背景色上部
			'st_widgets_titleborder_color'       => '',        //ウィジェットタイトルのボーダー色
			'st_widgets_titleborder_size'        => '',        //ウィジェットタイトルの太さ
			'st_widgets_titleborder_undercolor'  => '', //ウィジェットタイトルのボーダー色（2色アンダーライン）
			'st_widgets_title_designsetting'     => '',        //ウィジェットタイトルデザインの変更
			'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
			'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
			'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
			'st_widgets_title_bgimg_leftpadding' => 10,       //ウィジェットタイトルの背景画像の左の余白
			'st_widgets_title_bgimg_tupadding'   => 7,       //ウィジェットタイトルの背景画像の上下の余白
			'st_widgets_title_bg_radius'         => '',        //背景や吹き出しの角を丸くする

			'st_tagcloud_color'       => '', //タグクラウドテキスト色
			'st_tagcloud_bordercolor'       => '', //タグクラウドボーダー色
			'st_tagcloud_bgcolor'       => '', //タグクラウド背景色
			'st_rss_color'            => '', //RSSボタン

			'st_search_form_text'            => '', // 検索フォーム内のテキスト
			'st_search_form_border_color'    => '', // 検索フォームの枠線
			'st_search_form_border_width'    => 1, // 検索フォームの枠線の太さ
			'st_search_form_bg_color'        => '', // 検索フォームの背景色
			'st_search_form_text_color'      => '', // 検索フォーム内の文字色
			'st_search_form_icon_color'      => '', // 検索アイコンの色
			'st_search_form_icon_bg_color'   => '', // 検索アイコンの背景色
			'st_search_form_border_radius'   => '', // 検索フォームの丸み（px）
			'st_search_form_font_size'       => 14, // 文字・アイコンサイズ（px）
			'st_search_form_padding_lr'      => 25, // 左右の余白（px）
			'st_search_form_padding_tb'      => 10, // 上下の余白（px）

			'st_search_form_btn_border_color'    => '', // 検索ボタンの枠線の色
			'st_search_form_btn_border_width'    => 1, // 検索ボタンの枠線の太さ
			'st_search_form_btn_bg_color'        => '#f3f3f3', // 検索ボタンの背景色
			'st_search_form_btn_shadow_color'    => '', // 検索ボタンの影色
			'st_search_form_btn_text_color'      => '#424242', // 検索ボタン内の文字色
			'st_search_form_btn_font_weight'     => '', // 検索ボタン内の文字を太字
			'st_search_form_btn_border_radius'   => 5, // 検索フォームの丸み（px）
			'st_search_form_btn_font_size'       => 14, // 文字・アイコンサイズ（px）
			'st_search_form_btn_padding_lr'      => 10, // 左右の余白（px）
			'st_search_form_btn_padding_tb'      => 10, // 上下の余白（px）

			'st_sns_btn'     => '', //SNSボタン背景
			'st_sns_btntext' => '', //SNSボタンテキスト

			'st_formbtn_textcolor'   => '', //ウィジェット問合せフォームのテキスト色
			'st_formbtn_bordercolor' => '',        //ウィジェット問合せフォームのボーダー色
			'st_formbtn_bgcolor_t'   => '',        //ウィジェット問合せフォームの背景色上部
			'st_formbtn_bgcolor'     => '', //ウィジェット問合せフォームの背景色
			'st_formbtn_radius'      => '',        //ウィジェット問合せフォームの角を丸くする

			'st_formbtn2_textcolor'   => '', //ウィジェットオリジナルボタンのテキスト色
			'st_formbtn2_bordercolor' => '',        //ウィジェットオリジナルボタンのボーダー色
			'st_formbtn2_bgcolor_t'   => '',        //ウィジェットオリジナルボタンの背景色
			'st_formbtn2_bgcolor'     => '', //ウィジェットオリジナルボタンの背景色
			'st_formbtn2_radius'      => '',        //ウィジェットオリジナルボタンの角を丸くする

			'st_contactform7btn_textcolor' => '', //コンタクトフォーム7の送信ボタンテキスト色
			'st_contactform7btn_bgcolor'   => '',  //コンタクトフォーム7の送信ボタンの背景色

			//任意記事
			'st_menu_osusumemidasitextcolor' => '', //任意記事の見出しテキスト色
			'st_menu_osusumemidasicolor'     => '', //任意記事の見出し背景色
			'st_menu_osusumemidasinocolor'   => '', //任意記事のナンバー色
			'st_menu_osusumemidasinobgcolor' => '', //任意記事のナンバー背景色
			'st_menu_popbox_color'           => '', //任意記事の背景色
			'st_menu_popbox_textcolor'       => '',        //任意記事のテキスト色
			'st_nohidden'                    => '',        //任意記事のナンバー削除

			//こんな方におすすめ（ver20240520で設定削除済み）
			'st_blackboard_textcolor'   => '', //枠線とタイトル下線
			'st_blackboard_bordercolor' => '', //ulリストの下線
			'st_blackboard_bgcolor'     => '', //背景色
			'st_blackboard_mokuzicolor'   => '', //タイトル色
			'st_blackboard_title_bgcolor'   => '', //タイトル背景色
			'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
			'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
			'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

			//フリーボックスウィジェット
			'st_freebox_tittle_textcolor' => '', //フリーボックスウィジェットの見出しテキスト色
			'st_freebox_tittle_color'     => '', //フリーボックスウィジェットの見出背景色
			'st_freebox_color'            => '', //フリーボックスウィジェットの背景色
			'st_freebox_textcolor'        => '',        //フリーボックスウィジェットのテキスト色

			//メモボックス
			'st_memobox_color' => '', //文字・ボーダー色
			//スライドボックス
			'st_slidebox_color' => '', //背景色

			//スマホサイズ
			'st_menu_sumartmenutextcolor'          => '',        //スマホメニュー文字色
			'st_menu_sumartmenubordercolor'        => '',        //スマホメニューボーダー
			'st_menu_sumart_bg_color'              => '',        //スマホメニュー背景色
			'st_menu_smartbar_bg_color_t'          => '',        //スマホメニューバー背景色（グラデーション上部）
			'st_menu_smartbar_bg_image_side'       => 'center',  //スマホメニューバー背景画像の横位置
			'st_menu_smartbar_bg_image_top'        => 'center',  //スマホメニューバー背景画像の縦位置
			'st_menu_smartbar_bg_image_repeat'     => '',        //スマホメニューバー背景画像の繰り返し
			'st_menu_smartbar_bg_image_cover'      => '',        //背景画像を幅100%のレスポンシブにする
			'st_menu_smartbar_front_exclusion_set' => '',        //背景色及び画像をトップページのみ除外する
			'st_menu_smartbar_bg_color'            => '',        //スマホメニューOPアイコン背景色
			'st_menu_sumartbar_bg_color'           => '',        //スマホメニューバーエリア内背景色
			'st_menu_sumartcolor'                  => '',        //スマホwebアイコン
			'st_menu_faicon'                       => '',        //メニューのWebアイコンを非表示
			'st_search_slide_sumartbar_bg_color'   => '',        //スマホ検索メニュー背景色
			'st_sticky_menu'                       => '',        //スマホメニューfix
			'st_sticky_menu_alpha_bgcolor'         => '',        //スマホメニューカラーフィルター
			'st_sticky_menu_bg_alpha'              => 0.9,        //スマホメニュー透過レベル
			'st_sticky_primary_menu_side'          => '',        //スクロールで内容対象をヘッダーメニュー（横列）に変更
			'st_slidemenubg_image_side'            => 'center',  //スライドメニューの背景画像の横位置
			'st_slidemenubg_image_top'             => 'center',  //スライドメニューの背景画像の縦位置
			'st_slidemenubg_image_repeat'          => '',        //スライドメニューの背景画像の繰り返し
			'st_slidemenubg_image_flex'            => '',        //スライドメニューの背景画像を幅100%のレスポンシブにする

			//スマホミドルメニュー
			'st_middle_sumartmenutextcolor'   => '', //文字色
			'st_middle_sumartmenubordercolor' => '', //ボーダー
			'st_middle_sumart_bg_color'       => '', //背景色
			'st_middle_sumart_bg_color_t'     => '', //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）
			'st_middle_sumartmenu_space'      => '', //周りに余白

			'st_menu_sumart_st_bg_color'  => '', //追加スマホメニュー背景色
			'st_menu_sumart_st_color'     => '', //追加スマホwebアイコン色
			'st_menu_sumart_st2_bg_color' => '', //追加スマホメニュー背景色2
			'st_menu_sumart_st2_color'    => '', //追加スマホwebアイコン色2
			'st_menu_sumart_footermenu_text_color'    => '', //スマホフッターメニューテキスト色
			'st_menu_sumart_footermenu_bg_color'    => '', //スマホフッターメニュー背景色
			'st_menu_sumart_footermenu_fontawesome' => '', //アイコンサイズ(%)

			//ガイドメニュー
			'st_guidemenu_bg_color'     => '', //背景色（第一階層）
			'st_guidemenu_radius'       => '', //角を丸くする
			'st_guidemenutextcolor'     => '', //テキスト色（第一階層）
			'st_guidemenutextcolor2'    => '', //テキスト色（第二階層以下）
			'st_guide_bg_color'         => '', //背景色（記事内用タグのみ）

			//ボックスメニュー
			'st_boxnavimenu_color'        => '', //テキスト色
			'st_boxnavimenu_bg_color'     => '', //背景色
			'st_boxnavimenu_bordercolor'  => '', //ボーダー色
			'st_boxnavimenu_fontawesome'  => '300', //アイコンサイズ（%）

			//Webアイコン
			'st_webicon_question'        => '',    //はてな
			'st_webicon_check'           => '',    //チェック
			'st_webicon_checkbox'        => '',    //チェックボックス
			'st_webicon_checkbox_square' => '',    //チェックボックス（枠）
			'st_webicon_checkbox_size'   => '120', //チェックボックス（サイズ）
			'st_webicon_checkbox_simple' => 'yes',    // チェックボックスのデザインをチェックのみにする
			'st_webicon_exclamation'     => '',    //エクステンション
			'st_webicon_memo'            => '',    //メモ
			'st_webicon_user'            => '',    //人物
			'st_webicon_oukan'           => '',    //王冠
			'st_webicon_bigginer'        => '',    // 初心者マーク

			//サイト管理者紹介
			'st_author_basecolor'          => '',      //「サイト管理者紹介」のボーダーカラー
			'st_author_bg_color'           => '',      //「サイト管理者紹介」の背景カラー

			'st_author_profile'               => '',   //「旧プロフィールカード」に変更
			'st_author_bg_color_profile'      => '',   //「プロフィールカード」の背景カラー
			'st_author_basecolor_profile'     => '',   //「プロフィールカード」のボーダーカラー
			'st_author_text_color_profile'    => '',   //「プロフィールカード」のテキストカラー
			'st_author_profile_shadow'        => 'yes',   //「プロフィールカード」影をつける
			'st_author_profile_avatar_shadow' => '',   //「プロフィールカード」アバター画像に影をつける
			'st_author_profile_radius'        => '',   //「プロフィールカード」角丸にする

			'st_author_profile_btn_url'        => '',   //「プロフィールカード」のボタンURL
			'st_author_profile_btn_text'       => '',   //「プロフィールカード」のボタンテキスト
			'st_author_profile_btn_text_color' => '',   //「プロフィールカード」のボタンテキストカラー
			'st_author_profile_btn_top'        => '#eb445a',   //「プロフィールカード」のボタン上部
			'st_author_profile_btn_bottom'     => '',   //「プロフィールカード」のボタン下部
			'st_author_profile_btn_shadow'     => '',   //「プロフィールカード」のボタン影

			//一覧のサムネイル画像の枠線
			'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線
			//記事一覧の区切りボーダー
			'st_kanren_bordercolor' => '',   // ボーダーカラー
			'st_kanren_border_dashed' => '',   // 破線にするー
			//ページャーとPREV NEXTリンク
			'st_pagination_bordercolor' => '',   // カラー

			//ページトップボタン
			'st_pagetop_up'            => '',   //TOPに戻るボタンの配置を上にする
			'st_pagetop_circle'        => '', //ページトップボタンを丸くする
			'st_pagetop_text'        => '', //ページトップボタンをテキストにする
			'st_pagetop_bgcolor'       => '',     //背景色
			'st_pagetop_arrow_color'   => '',     //矢印色
			'st_pagetop_img_right'     => '',     //right（px）
			'st_pagetop_img_bottom'    => '',     //bottom（px）
			'st_pagetop_hidden'        => '',     //ページトップボタンを非表示

			//TOC
			'st_toc_textcolor'           => '', //文字色
			'st_toc_text2color'          => '', //文字色2
			'st_toc_bordercolor'         => '#f3f3f3', //ボーダー色
			'st_toc_mokuzi_left'         => 'yes', //目次タイトルを左寄せにする
			'st_toc_bgcolor'             => '', //背景色
			'st_toc_list_icon_base'      => '#777', //リスト数字・アイコン
			'st_toc_mokuzicolor'         => '', //目次色
			'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
			'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
			'st_toc_list1_number'        => '', //第1リンクの数字を表示
			'st_toc_list1_icon'          => '', //数字をアイコンに変更
			'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
			'st_toc_list3_fontweight'    => '', //第2リンク太字
			'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
			'st_toc_underbordercolor'    => '', //下線
			'st_toc_webicon'             => 'e91c', //目次アイコン
			'st_toc_radius'              => '', //背景を角丸にする
			'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
			'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
			'st_toc_border_width'        => '5', //ボーダーの太さ（px）

			//マル数字のカラー
			'st_maruno_textcolor'   => '', //ナンバー色
			'st_maruno_nobgcolor'   => '', //ナンバー背景色
			'st_maruno_bordercolor' => '', //囲いボーダー色
			'st_maruno_bgcolor'     => '', //囲い背景色
			'st_maruno_radius'     => '', //背景色の角を丸くする

			//マルチェックのカラー
			'st_maruck_textcolor'   => '', //ナンバー色
			'st_maruck_nobgcolor'   => '', //ナンバー背景色
			'st_maruck_bordercolor' => '', //囲いボーダー色
			'st_maruck_bgcolor'     => '', //囲い背景
			'st_maruck_radius'      => '', //背景色の角を丸くする

			//マル・バツ
			'st_correct_list'       => '#4FC3F7', //マル
			'st_wrong_list'         => '#F44336',   //バツ

			//タイムライン
			'st_timeline_list_color'       => '', //ラインカラー
			'st_timeline_list_now_color'   => '', //ラインカラー（nowクラス）
			'st_timeline_list_bg_color'    => '', //背景色
			'st_timeline_list_color_count' => '', //カウントカラー
			'st_timeline_list_now_blink'   => '', //nowクラスの点滅

			//ブログカード
			'st_card_border_color'   => '', //枠線
			'st_card_border_size'   => '', //枠線のカラー
			'st_card_label_bgcolor' => '', //ラベル背景色
			'st_card_label_textcolor'     => '', //ラベルテキスト色
			'st_card_label_designsetting' => '', //ラベルデザイン

			//ステップ
			'st_step_bgcolor' => '', //ステップ数の背景色
			'st_step_color'     => '', //ステップ数の色
			'st_step_text_color'     => '', //テキスト色
			'st_step_text_bgcolor' => '', //テキストの背景色
			'st_step_text_border_color'   => '', //ボーダー色
			'st_step_radius'   => '', //角を丸くする

			//テーブルのカラー
			'st_table_bordercolor'  => '', //表のボーダー色
			'st_table_cell_bgcolor' => '', //偶数行のセルの色
			'st_table_td_bgcolor'   => '', //縦一列目の背景色
			'st_table_td_textcolor' => '', //縦一列目の文字色
			'st_table_td_bold'      => '', //縦一列目の太字
			'st_table_tr_bgcolor'   => '', //横一列目の背景色
			'st_table_tr_textcolor' => '', //横一列目の文字色
			'st_table_tr_bold'      => '', //横一列目の太字
			'st_table_tr_all'       => '',  //ヘッダーセクション未設定時の横一列目に反映する
			'st_table_td_center'    => 'yes',  //「カラムを中央配置」設定時は上下中央にする

			//会話ふきだし
			'st_kaiwa_bgcolor'        => '', //会話統一ふきだし背景色
			'st_kaiwa2_bgcolor'       => '', //会話2ふきだし背景色
			'st_kaiwa3_bgcolor'       => '', //会話3ふきだし背景色
			'st_kaiwa4_bgcolor'       => '', //会話4ふきだし背景色
			'st_kaiwa5_bgcolor'       => '', //会話5ふきだし背景色
			'st_kaiwa6_bgcolor'       => '', //会話6ふきだし背景色
			'st_kaiwa7_bgcolor'       => '', //会話7ふきだし背景色
			'st_kaiwa8_bgcolor'       => '', //会話8ふきだし背景色
			'st_kaiwa_no_border'      => '', //ボーダーなし
			'st_kaiwa_borderradius'   => '', //ふきだしを角丸にしない
			'st_kaiwa_change_border'  => '', //ふきだしのカラーをボーダー（2px）に変更
			'st_kaiwa_change_border_bgcolor'  => '', //ふきだしのカラーをボーダー（2px）に変更した時の背景色

		);
	}
}

if (!function_exists( 'st_get_menuonly_theme_mod_overrides' )) {
	/**
	 * 簡単設定をメニューのみに反映する場合の theme_mod の値を取得
	 *
	 * `st_get_plain_theme_mod_defaults()`, `st_get_preset_theme_mod_overrides()` の値から **上書きする値のみ** を取得
	 *
	 * 取得対象は `get_theme_mod()` で取得する値のみ
	 * `get_option()` で取得する値は **対象外**
	 *
	 * @return array<string, string> メニューのみに反映する場合の theme_mod の値
	 */
	function st_get_menuonly_theme_mod_overrides() {
		/**
		 * @var string $keycolor キーカラー
		 * @var string $maincolor メインカラー
		 * @var string $subcolor サブカラー
		 * @var string $textcolor テキストカラー
		 */
		extract( st_get_kantan_colors(), EXTR_OVERWRITE );

		return array(
			// theme_mod名 => 値

			//メニュー
			'st_menu_navbar_topunder_color' => $keycolor,  //メニューの上下ボーダー色
			'st_menu_navbar_side_color'     => $keycolor,  //メニューの左右ボーダー色
			'st_menu_navbar_right_color'    => $maincolor, //メニューの右ボーダー色
			'st_menu_navbarcolor'           => $keycolor,  //メニューの背景色下
			'st_menu_navbarcolor_t'         => $maincolor, //メニューの背景色上

			'st_menu_navbartextcolor' => $textcolor, //PCメニューテキスト色

			//サイドメニュー
			'st_menu_pagelist_childtextcolor'         => $keycolor,  //サイドメニュー下層のテキスト色
			'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
			'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色
		);
	}
}

if (!function_exists( 'st_get_zentai_theme_mod_overrides' )) {
	/**
	 * 簡単設定を全体に反映する場合の theme_mod の値を取得
	 *
	 * `st_get_plain_theme_mod_defaults()`, `st_get_preset_theme_mod_overrides()` の値から **上書きする値のみ** を取得
	 * 初期値として設定、強制設定の両方で共用される
	 *
	 * 取得対象は `get_theme_mod()` で取得する値のみ
	 * `get_option()` で取得する値は **対象外**
	 *
	 * @return array<string, string> 全体に反映する theme_mod の値
	 */
	function st_get_zentai_theme_mod_overrides() {
		/**
		 * @var string $keycolor キーカラー
		 * @var string $maincolor メインカラー
		 * @var string $subcolor サブカラー
		 * @var string $textcolor テキストカラー
		 */
		extract( st_get_kantan_colors(), EXTR_OVERWRITE );

		$menuonly_overrides = st_get_menuonly_theme_mod_overrides();

		/**
		 * 全体カラー設定「簡単設定を使用する」有効時のデザインパターンによる上書き
		 *
		 * `st_get_menuonly_theme_mod_overrides` から変更がある上書きする値のみ
		 * theme_mod名 => 値
		 *
		 * $basecolor → $keycolor
		 */
		if ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'biz' ){ //ビジネス
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_height' => '', //スマホロゴ画像の最大の高さ（px）
				'st_mobile_logo_center' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => $textcolor,    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる

				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '5px', //サイト上部ボーダーの高さ

				'st_headbox_bgcolor_t'   => $maincolor,    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => $keycolor,    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => 'yes',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => 'center', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => 'center', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => '',        //グラデーションを横向きにする

				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

				'st_menu_logocolor' => $textcolor, //サイトタイトル及びディスクリプション色

				'st_menu_maincolor'        => '#ffffff', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過

				'st_footer_bg_text_color' => $textcolor,       //フッターテキスト色
				'st_footer_bg_color_t'    => $maincolor,       //フッター背景色上部
				'st_footer_bg_color'      => $keycolor,       //フッター背景色下部
				'st_footer100'            => 'yes',       //フッター背景幅100%
				'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
				'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => '',        //グラデーションを横向きにする

				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

				//オリジナルブロック
				'st_memo_block_icon_color'      => $keycolor, //メモブロックの文字色
				'st_memo_block_bg_color'        => $subcolor, //メモブロックの背景色
				'st_memo_block_border_color'    => $subcolor, //メモブロックの枠線
				'st_mybox_block_icon_color'      => $keycolor, //マイボックスブロックの文字色
				'st_mybox_block_bg_color'        => $subcolor, //マイボックスブロックの背景色
				'st_mybox_block_border_color'    => $keycolor, //マイボックスブロックの枠線
				'st_freebox_block_icon_color'    => $textcolor, //見出し付きフリーボックスブロックの文字色
				'st_freebox_block_bg_color'      => $subcolor, //見出し付きフリーボックブロックの背景色
				'st_freebox_block_border_color'  => $keycolor, //見出し付きフリーボックブロックの枠線
				'st_banarbox_block_icon_color'    => $keycolor, //バナー風ボックスブロックの文字色
				'st_banarbox_block_bg_color'      => $subcolor, //バナー風ボックブロックの背景色

				//ヘッダー
				'st_headerwidget_bgcolor'   => $subcolor, //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => $textcolor, //ヘッダーの電話番号とリンク色

				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_center'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする

				//h2タグ
				'st_h2_color'           => $keycolor, //h2のテキスト色
				'st_h2_bgcolor'         => $subcolor,  //h2の背景色
				'st_h2_bgcolor_t'       => '#fff',  //h2の背景色上部
				'st_h2border_color'       => $keycolor, //h2のボーダー色
				'st_h2border_undercolor'  => $keycolor,  //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb_sub'         => '',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'         => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => 'linedesign', //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => 'left',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => 'center',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => 0,         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => 10,         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_center'            => '',        //テキストをセンタリング
				'st_h2_design_wide'            => '',        //デザインを幅一杯にする

				//h3タグ
				'st_h3_color'          => $keycolor, //h3のテキスト色
				'st_h3_bgcolor'        => '', //h3の背景色
				'st_h3_bgcolor_t'      => '', //h3の背景色上部
				'st_h3border_color'       => $keycolor, //h3のボーダー色
				'st_h3border_undercolor'  => $subcolor,  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => '',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => 'underlinedesign',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => 10,        //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_center'            => '',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする

				//h4タグ
				'st_h4_textcolor'    => $keycolor, //h4の文字色
				'st_h4bordercolor'   => $keycolor,         //h4のボーダー色
				'st_h4bgcolor'       => '',  //h4の背景色
				'st_h4_design'            => 'yes',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => 'left',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => 'center',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => 20,         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => 7,         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける

				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => '', //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => '',        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => 'center',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => '',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => '',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化

				//h5タグ
				'st_h5_textcolor'    => $keycolor, //h5の文字色
				'st_h5bordercolor'   => '',        //h5のボーダー色
				'st_h5bgcolor'       => $subcolor,  //h5の背景色
				'st_h5_design'            => '',         //h5デザインの変更
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => '',         //h5の下ボーダー
				'st_h5_bgimg_side'        => 'center',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => 'center',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '10',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => '10',         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => '',        //ふせん風の影をつける

				'st_blockquote_color' => '', //引用部分の背景色

				'st_separator_color'   => $textcolor, //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => $keycolor, //NEW ENTRYの背景色

				'st_catbg_color'   => $keycolor, //カテゴリーの背景色
				'st_cattext_color' => $textcolor, //カテゴリーのテキスト色

				//お知らせ
				'st_news_datecolor'            => $keycolor, //お知らせ日付のテキスト色
				'st_news_text_color'           => '#333',  //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => $keycolor, //お知らせの背景色上
				'st_menu_newsbarcolor'         => $keycolor, //お知らせの背景色下
				'st_menu_newsbar_border_color' => $keycolor, //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => $textcolor, //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色

				//メニュー
				'st_menu_navbar_topunder_color' => $maincolor, //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => $keycolor, //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => $maincolor, //メニューの右ボーダー色
				'st_menu_navbarcolor'           => $keycolor, //メニューの背景色下
				'st_menu_navbarcolor_t'         => $maincolor, //メニューの背景色上
				'st_menu_navbar_undercolor'         => $maincolor, //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => $textcolor, //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => 'yes',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,bottom10)
				'st_navbarcolor_gradient'            => '',        //グラデーションを横向きにする

				'st_headermenu_bgimg_side'   => 'center', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => 'center', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し

				'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

				'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに

				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => '',        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => $keycolor,        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => $maincolor,        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => '', //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => 'f138', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => 'f105', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => '', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => '',        //グラデーションを横向きにする

				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色

				'st_menu_pagelist_childtextcolor'         => $keycolor, //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色

				//ウィジェットタイトル
				'st_widgets_title_color'          => $keycolor, //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => $subcolor,       //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => '#fff',        //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => $keycolor,        //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => $keycolor, //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => 'linedesign', //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => 10,       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => 7,       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => '',        //背景や吹き出しの角を丸くする

				'st_tagcloud_color'       => $keycolor, //タグクラウド色
				'st_tagcloud_bordercolor' => $keycolor, //タグクラウドボーダー色
				'st_rss_color'            => $keycolor, //RSSボタン

				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト

				'st_formbtn_textcolor'   => $textcolor, //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => $keycolor, //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => 'yes',         //ウィジェット問合せフォームの角を丸くする

				'st_formbtn2_textcolor'   => $textcolor, //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => $keycolor, //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => 'yes',         //ウィジェッオリジナルボタンの角を丸くする

				'st_contactform7btn_textcolor' => $textcolor, //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => $keycolor, //コンタクトフォーム7の送信ボタンの背景色

				//任意記事
				'st_menu_osusumemidasitextcolor' => $textcolor,   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => $keycolor, //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => $textcolor,   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => $keycolor, //任意記事のナンバー背景色
				'st_menu_popbox_color'           => $subcolor,    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除

				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => $textcolor,   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => $keycolor, //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => $subcolor,    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色

				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色

				//スマホサイズ
				'st_menu_sumartmenutextcolor' => '', //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => $maincolor, //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => $subcolor,       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => $textcolor, //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix

				'st_menu_sumart_st_bg_color'  => $maincolor, //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => $textcolor, //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => $maincolor, //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => $textcolor, //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => $textcolor, //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => $maincolor, //スマホフッターメニュー背景色

				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor' => $textcolor, //文字色
				'st_middle_sumartmenubordercolor' => $maincolor, //ボーダー
				'st_middle_sumart_bg_color'     => $keycolor, //背景色
				'st_middle_sumart_bg_color_t'     => $keycolor, //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）

				//Webアイコン
				'st_webicon_question'    => '', //はてな
				'st_webicon_check'       => '', //チェック
				'st_webicon_exclamation' => '#f44336', //エクステンション
				'st_webicon_memo'        => '', //メモ
				'st_webicon_user'        => '', //人物

				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線

				//サイト管理者紹介
				'st_author_basecolor' => $keycolor,   //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => $subcolor,   //「サイト管理者紹介」の背景カラー

				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => 'yes', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => $keycolor,     //背景色

				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）

				//マル数字のカラー
				'st_maruno_textcolor'   => $textcolor, //ナンバー色
				'st_maruno_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => '', //囲い背景色
				'st_maruno_radius'     => '', //背景色の角を丸くする

				//マルチェックのカラー
				'st_maruck_textcolor'   => $textcolor, //ナンバー色
				'st_maruck_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => '', //囲い背景
				'st_maruck_radius'     => '', //背景色の角を丸くする

				//チェックボックスのカラー
				'st_webicon_checkbox'          => $keycolor, //チェック色
				'st_webicon_checkbox_square'   => $subcolor, //チェックの枠色

				//タイムラインのカラー
				'st_timeline_list_color'         => $keycolor, //ラインカラー
				'st_timeline_list_color_count'   => $textcolor, //カウントカラー

				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => $keycolor, //横一列目の背景色
				'st_table_tr_textcolor' => $textcolor, //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字

				//会話ふきだし
				'st_kaiwa_bgcolor'  => $subcolor, //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色

				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする

				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => '', //影をつける（プロフィールカード）
			);
		}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'blog' ){ // ブログ
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_center' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => $textcolor,    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる

				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '5px', //サイト上部ボーダーの高さ

				'st_headbox_bgcolor_t'   => $keycolor,    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => $keycolor,    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => 'yes',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => 'center', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => 'center', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => '',        //グラデーションを横向きにする

				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

				'st_menu_logocolor' => $textcolor, //サイトタイトル及びディスクリプション色

				'st_menu_maincolor'        => '#ffffff', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過

				'st_footer_bg_text_color' => $textcolor,       //フッターテキスト色
				'st_footer_bg_color_t'    => $keycolor,       //フッター背景色上部
				'st_footer_bg_color'      => $keycolor,       //フッター背景色下部
				'st_footer100'            => 'yes',       //フッター背景幅100%
				'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
				'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => '',        //グラデーションを横向きにする
				'st_footerbg_image_flex'  => 'yes',       //背景画像を幅100%のレスポンシブにする

				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

				//ヘッダー
				'st_headerwidget_bgcolor'   => $subcolor, //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => $textcolor, //ヘッダーの電話番号とリンク色

				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_center'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする

				//h2タグ
				'st_h2_color'          => $keycolor, //h2のテキスト色
				'st_h2_bgcolor'        => $subcolor, //h2の背景色
				'st_h2_bgcolor_t'      => '', //h2の背景色上部
				'st_h2border_color'       => $keycolor, //h2のボーダー色
				'st_h2border_undercolor'  => '',  //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb'         => 'yes',        //h2のボーダー上下のみ
				'st_h2_border_tb_sub'         => 'yes',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'         => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => '', //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => 'left',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => 'center',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => '',         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => 15,         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_center'            => '',        //テキストをセンタリング
				'st_h2_design_wide'            => '',        //デザインを幅一杯にする

				//h3タグ
				'st_h3_color'           => $textcolor, //h3のテキスト色
				'st_h3_bgcolor'         => $keycolor,  //h3の背景色
				'st_h3_bgcolor_t'       => $keycolor,  //h3の背景色上部
				'st_h3border_color'       => '', //h3のボーダー色
				'st_h3border_undercolor'  => '',  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => '',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => '',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => 20,        //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_center'            => '',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする

				//h4タグ
				'st_h4_textcolor'         => $keycolor, //h4の文字色
				'st_h4bordercolor'        => '',         //h4のボーダー色
				'st_h4bgcolor'            => $subcolor,  //h4の背景色
				'st_h4_design'            => '',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => 'left',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => 'center',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => 20,         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => 10,         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける

				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => $textcolor, //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => $keycolor,        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => 'center',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => 'yes',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => 'yes',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化

				//h5タグ
				'st_h5_textcolor'    => $maincolor, //h5の文字色
				'st_h5bordercolor'   => '',        //h5のボーダー色
				'st_h5bgcolor'       => '',  //h5の背景色
				'st_h5_design'            => '',         //h5デザイン左ボーダーを付ける
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => '',         //h5の下ボーダー
				'st_h5_bgimg_side'        => 'center',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => 'center',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => '7',         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => '',        //ふせん風の影をつける

				'st_blockquote_color' => '', //引用部分の背景色

				'st_separator_color'   => $textcolor, //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => $keycolor, //NEW ENTRYの背景色

				'st_catbg_color'   => $keycolor, //カテゴリーの背景色
				'st_cattext_color' => '#ffffff', //カテゴリーのテキスト色
				'st_cattext_radius' => 'yes', //カテゴリー角を丸くする

				//お知らせ
				'st_news_datecolor'            => $keycolor, //お知らせ日付のテキスト色
				'st_news_text_color'           => '#000000',  //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => $keycolor, //お知らせの背景色上
				'st_menu_newsbarcolor'         => $keycolor, //お知らせの背景色下
				'st_menu_newsbar_border_color' => $keycolor, //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => $textcolor, //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色

				//メニュー
				'st_menu_navbar_topunder_color' => $maincolor, //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => '', //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => $maincolor, //メニューの右ボーダー色
				'st_menu_navbarcolor'           => $keycolor, //メニューの背景色下
				'st_menu_navbarcolor_t'         => $keycolor, //メニューの背景色上
				'st_menu_navbar_undercolor'         => $maincolor, //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => $textcolor, //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => 'yes',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,bottom10)
				'st_navbarcolor_gradient'            => '',        //グラデーションを横向きにする

				'st_headermenu_bgimg_side'   => 'center', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => 'center', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し

				'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

				'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに

				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => $maincolor,        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => $keycolor,        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => $keycolor,        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => $textcolor, //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => 'f138', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => 'f105', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => 'yes', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => '',        //グラデーションを横向きにする

				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色

				'st_menu_pagelist_childtextcolor'         => $keycolor, //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色

				//ウィジェットタイトル
				'st_widgets_title_color'          => $keycolor, //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => '',       //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => '',        //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => $keycolor,        //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => $keycolor, //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => 'leftlinedesign', //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => 20,       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => 5,       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => 'yes',        //背景や吹き出しの角を丸くする

				'st_tagcloud_color'       => $keycolor, //タグクラウド色
				'st_tagcloud_bordercolor' => $keycolor, //タグクラウドボーダー色
				'st_rss_color'            => $keycolor, //RSSボタン

				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト

				'st_formbtn_textcolor'   => $textcolor, //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => $keycolor, //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => 'yes',         //ウィジェット問合せフォームの角を丸くする

				'st_formbtn2_textcolor'   => $textcolor, //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => $keycolor, //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => 'yes',         //ウィジェッオリジナルボタンの角を丸くする

				'st_contactform7btn_textcolor' => $textcolor, //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => $keycolor, //コンタクトフォーム7の送信ボタンの背景色

				//任意記事
				'st_menu_osusumemidasitextcolor' => $textcolor,   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => $keycolor, //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => $textcolor,   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => $keycolor, //任意記事のナンバー背景色
				'st_menu_popbox_color'           => $subcolor,    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除

				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => $textcolor,   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => $keycolor, //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => $subcolor,    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色

				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色

				//スマホサイズ
				'st_menu_sumartmenutextcolor' => $textcolor, //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => $maincolor, //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => $keycolor,       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => $textcolor, //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix

				'st_menu_sumart_st_bg_color'  => $maincolor, //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => $textcolor, //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => $maincolor, //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => $textcolor, //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => $textcolor, //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => $maincolor, //スマホフッターメニュー背景色

				//ガイドメニュー
				'st_guidemenu_bg_color'     => $keycolor, //背景色（第一階層）
				'st_guidemenu_radius'       => 'yes', //角を丸くする
				'st_guidemenutextcolor'     => $textcolor, //テキスト色（第一階層）
				'st_guidemenutextcolor2'    => '', //テキスト色（第二階層以下）
				'st_guide_bg_color'         => $subcolor, //背景色（記事内用タグのみ）

				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor' => $textcolor, //文字色
				'st_middle_sumartmenubordercolor' => $maincolor, //ボーダー
				'st_middle_sumart_bg_color'     => $keycolor, //背景色
				'st_middle_sumart_bg_color_t'     => $keycolor, //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）

				//Webアイコン
				'st_webicon_question'    => '#64B5F6', //はてな
				'st_webicon_check'       => '#FFA726', //チェック
				'st_webicon_exclamation' => '#f44336', //エクステンション
				'st_webicon_memo'        => '#29B6F6', //メモ
				'st_webicon_user'        => '#4FC3F7', //人物
				'st_webicon_oukan'        => '#9E9D24', //王冠
				'st_webicon_bigginer'        => '#4CAF50', // 初心者マーク

				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線

				//サイト管理者紹介
				'st_author_basecolor' => $keycolor,   //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => $subcolor,   //「サイト管理者紹介」の背景カラー

				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => 'yes', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => $keycolor,     //背景色

				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）

				//マル数字のカラー
				'st_maruno_textcolor'   => $textcolor, //ナンバー色
				'st_maruno_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => $subcolor, //囲い背景色
				'st_maruno_radius'     => 'yes', //背景色の角を丸くする

				//マルチェックのカラー
				'st_maruck_textcolor'   => $textcolor, //ナンバー色
				'st_maruck_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => $subcolor, //囲い背景
				'st_maruck_radius'     => 'yes', //背景色の角を丸くする

				//チェックボックスのカラー
				'st_webicon_checkbox'          => $keycolor, //チェック色
				'st_webicon_checkbox_square'   => $subcolor, //チェックの枠色

				//タイムラインのカラー
				'st_timeline_list_color'         => $keycolor, //ラインカラー
				'st_timeline_list_color_count'   => $textcolor, //カウントカラー

				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => $keycolor, //横一列目の背景色
				'st_table_tr_textcolor' => $textcolor, //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字

				//会話ふきだし
				'st_kaiwa_bgcolor'  => $subcolor, //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色

				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする

				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => '', //影をつける（プロフィールカード）
			);
		}elseif ( st_is_ver_ex() && isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'ex' ){ // EX
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_height' => '', //スマホロゴ画像の最大の高さ（px）
				'st_mobile_logo_center' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => $textcolor,    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる

				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '', //サイト上部ボーダーの高さ

				'st_headbox_bgcolor_t'   => $keycolor,    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => $keycolor,    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => 'yes',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => 'center', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => 'center', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => '',        //グラデーションを横向きにする

				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

				'st_menu_logocolor' => $textcolor, //サイトタイトル及びディスクリプション色

				'st_menu_maincolor'        => '#ffffff', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過

				'st_footer_bg_text_color' => $textcolor,       //フッターテキスト色
				'st_footer_bg_color_t'    => $keycolor,       //フッター背景色上部
				'st_footer_bg_color'      => $keycolor,       //フッター背景色下部
				'st_footer100'            => 'yes',       //フッター背景幅100%
				'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
				'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => '',        //グラデーションを横向きにする
				'st_footerbg_image_flex'  => 'yes',       //背景画像を幅100%のレスポンシブにする

				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

				//ヘッダー
				'st_headerwidget_bgcolor'   => $subcolor, //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => $textcolor, //ヘッダーの電話番号とリンク色

				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_center'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする

				//h2タグ
				'st_h2_color'          => $keycolor, //h2のテキスト色
				'st_h2_bgcolor'        => '', //h2の背景色
				'st_h2_bgcolor_t'      => '', //h2の背景色上部
				'st_h2border_color'       => $keycolor, //h2のボーダー色
				'st_h2border_undercolor'  => '',  //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb'         => '',        //h2のボーダー上下のみ
				'st_h2_border_tb_sub'         => '',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'         => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => 'hukidasidesign_under', //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => 'left',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => 'center',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => 10,         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => 15,         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_center'            => '',        //テキストをセンタリング
				'st_h2_design_wide'            => '',        //デザインを幅一杯にする

				//h3タグ
				'st_h3_color'           => $textcolor, //h3のテキスト色
				'st_h3_bgcolor'         => $keycolor,  //h3の背景色
				'st_h3_bgcolor_t'       => '',  //h3の背景色上部
				'st_h3border_color'       => $keycolor, //h3のボーダー色
				'st_h3border_undercolor'  => $textcolor,  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => '',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => 'checkboxdesign',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => '',        //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_center'            => '',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする

				//h4タグ
				'st_h4_textcolor'         => $keycolor, //h4の文字色
				'st_h4bordercolor'        => $keycolor,         //h4のボーダー色
				'st_h4bgcolor'            => '',  //h4の背景色
				'st_h4_design'            => 'yes',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => 'left',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => 'center',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => 20,         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => 10,         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける

				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => $textcolor, //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => $keycolor,        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => 'center',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => 'yes',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => 'yes',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化

				//h5タグ
				'st_h5_textcolor'    => $keycolor, //h5の文字色
				'st_h5bordercolor'   => '',        //h5のボーダー色
				'st_h5bgcolor'       => $subcolor,  //h5の背景色
				'st_h5_design'            => '',         //h5デザイン左ボーダーを付ける
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => '',         //h5の下ボーダー
				'st_h5_bgimg_side'        => 'center',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => 'center',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '15',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => '7',         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => '',        //ふせん風の影をつける

				'st_blockquote_color' => '', //引用部分の背景色

				'st_separator_color'   => $textcolor, //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => $keycolor, //NEW ENTRYの背景色

				'st_catbg_color'   => $keycolor, //カテゴリーの背景色
				'st_cattext_color' => '#ffffff', //カテゴリーのテキスト色
				'st_cattext_radius' => 'yes',    //カテゴリー角を丸くする

				//お知らせ
				'st_news_datecolor'            => $keycolor,  //お知らせ日付のテキスト色
				'st_news_text_color'           => '#333',     //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => $keycolor,  //お知らせの背景色上
				'st_menu_newsbarcolor'         => $keycolor,  //お知らせの背景色下
				'st_menu_newsbar_border_color' => $keycolor,  //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => $textcolor, //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色

				//メニュー
				'st_menu_navbar_topunder_color' => $maincolor, //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => '', //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => $maincolor, //メニューの右ボーダー色
				'st_menu_navbarcolor'           => $keycolor, //メニューの背景色下
				'st_menu_navbarcolor_t'         => $keycolor, //メニューの背景色上
				'st_menu_navbar_undercolor'         => $keycolor, //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => $textcolor, //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => 'yes',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,bottom10)
				'st_navbarcolor_gradient'            => '',        //グラデーションを横向きにする

				'st_headermenu_bgimg_side'   => 'center', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => 'center', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し

				'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

				'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに

				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => $maincolor,        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => $keycolor,        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => $keycolor,        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => $textcolor, //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => 'f138', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => 'f105', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => 'yes', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => '',        //グラデーションを横向きにする

				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色

				'st_menu_pagelist_childtextcolor'         => $maincolor, //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色

				//ウィジェットタイトル
				'st_widgets_title_color'          => $keycolor, //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => '',       //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => '',        //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => $keycolor,      //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => '', //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => 'leftlinedesign', //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => 20,       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => 5,       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => '',        //背景や吹き出しの角を丸くする

				'st_tagcloud_color'       => $keycolor, //タグクラウド色
				'st_tagcloud_bordercolor' => $keycolor, //タグクラウドボーダー色
				'st_rss_color'            => $keycolor, //RSSボタン

				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト

				'st_formbtn_textcolor'   => $textcolor, //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => $keycolor,  //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => 'yes',         //ウィジェット問合せフォームの角を丸くする

				'st_formbtn2_textcolor'   => $textcolor, //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => $keycolor,  //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => 'yes',         //ウィジェッオリジナルボタンの角を丸くする

				'st_contactform7btn_textcolor' => $textcolor, //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => $maincolor, //コンタクトフォーム7の送信ボタンの背景色

				//任意記事
				'st_menu_osusumemidasitextcolor' => $textcolor,   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => $maincolor, //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => $textcolor,   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => $maincolor, //任意記事のナンバー背景色
				'st_menu_popbox_color'           => $subcolor,    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除

				// チェック（ボックスタイプ）のデザインをチェックのみにする
				'st_webicon_checkbox_simple'      => 'yes',

				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => $textcolor,   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => $keycolor, //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => $subcolor,    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色

				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色

				//スマホサイズ
				'st_menu_sumartmenutextcolor' => $textcolor, //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => $keycolor, //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => $keycolor,       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => $textcolor, //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix

				'st_menu_sumart_st_bg_color'  => $keycolor, //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => $textcolor, //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => $keycolor, //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => $textcolor, //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => $textcolor, //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => $keycolor, //スマホフッターメニュー背景色

				//ガイドメニュー
				'st_guidemenu_bg_color'     => $keycolor, //背景色（第一階層）
				'st_guidemenu_radius'       => 'yes', //角を丸くする
				'st_guidemenutextcolor'     => $textcolor, //テキスト色（第一階層）
				'st_guidemenutextcolor2'    => '', //テキスト色（第二階層以下）
				'st_guide_bg_color'         => $subcolor, //背景色（記事内用タグのみ）

				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor'   => $textcolor, //文字色
				'st_middle_sumartmenubordercolor' => $maincolor, //ボーダー
				'st_middle_sumart_bg_color'       => $keycolor, //背景色
				'st_middle_sumart_bg_color_t'     => $keycolor, //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）

				//Webアイコン
				'st_webicon_question'    => '#64B5F6', //はてな
				'st_webicon_check'       => '#FFA726', //チェック
				'st_webicon_exclamation' => '#f44336', //エクステンション
				'st_webicon_memo'        => '#29B6F6', //メモ
				'st_webicon_user'        => '#4FC3F7', //人物
				'st_webicon_oukan'        => '#9E9D24', //王冠
				'st_webicon_bigginer'        => '#4CAF50', // 初心者マーク

				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線

				//サイト管理者紹介
				'st_author_basecolor' => $keycolor,  //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => $subcolor,   //「サイト管理者紹介」の背景カラー

				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => 'yes', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => $keycolor,     //背景色

				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）

				//マル数字のカラー
				'st_maruno_textcolor'   => $textcolor, //ナンバー色
				'st_maruno_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => $subcolor, //囲い背景色
				'st_maruno_radius'     => 'yes', //背景色の角を丸くする

				//マルチェックのカラー
				'st_maruck_textcolor'   => $textcolor, //ナンバー色
				'st_maruck_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => $subcolor, //囲い背景
				'st_maruck_radius'     => 'yes', //背景色の角を丸くする

				//チェックボックスのカラー
				'st_webicon_checkbox'          => $keycolor, //チェック色
				'st_webicon_checkbox_square'   => $subcolor, //チェックの枠色

				//タイムラインのカラー
				'st_timeline_list_color'         => $keycolor, //ラインカラー
				'st_timeline_list_color_count'   => $textcolor, //カウントカラー

				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => $keycolor, //横一列目の背景色
				'st_table_tr_textcolor' => $textcolor, //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字

				//会話ふきだし
				'st_kaiwa_bgcolor'  => $subcolor, //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色

				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする

				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => '', //影をつける（プロフィールカード）
			);
		}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'cute' ){ // キュート
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_height' => '', //スマホロゴ画像の最大の高さ（px）
				'st_mobile_logo_center' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => $textcolor,    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる

				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '5px', //サイト上部ボーダーの高さ

				'st_headbox_bgcolor_t'   => $keycolor,    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => $maincolor,    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => 'yes',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => 'center', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => 'center', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

				'st_menu_logocolor' => $textcolor, //サイトタイトル及びディスクリプション色

				'st_menu_maincolor'        => '#ffffff', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過

				'st_footer_bg_text_color' => $textcolor,       //フッターテキスト色
				'st_footer_bg_color_t'    => $maincolor,       //フッター背景色上部
				'st_footer_bg_color'      => $keycolor,       //フッター背景色下部
				'st_footer100'            => 'yes',       //フッター背景幅100%
				'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
				'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => 'yes',        //グラデーションを横向きにする

				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

				//ヘッダー
				'st_headerwidget_bgcolor'   => $subcolor, //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => $textcolor, //ヘッダーの電話番号とリンク色

				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_center'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする

				//h2タグ
				'st_h2_color'             => $keycolor, //h2のテキスト色
				'st_h2_bgcolor'           => $subcolor,  //h2の背景色
				'st_h2_bgcolor_t'         => '',  //h2の背景色上部
				'st_h2border_color'       => '', //h2のボーダー色
				'st_h2border_undercolor'  => '',  //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb_sub'     => '',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'     => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => 'hukidasidesign',        //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => 'left',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => 'center',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => '',         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => 25,         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_center'            => 'yes',        //テキストをセンタリング
				'st_h2_design_wide'            => 'yes',        //デザインを幅一杯にする

				//h3タグ
				'st_h3_color'          => $textcolor, //h3のテキスト色
				'st_h3_bgcolor'        => $keycolor, //h3の背景色
				'st_h3_bgcolor_t'      => $maincolor,  //h3の背景色上部
				'st_h3border_color'       => $keycolor, //h3のボーダー色
				'st_h3border_undercolor'  => $keycolor,  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => '',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => 'stripe_design',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => '',       //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => 'yes',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_center'            => '',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする

				//h4タグ
				'st_h4_textcolor'         => $keycolor, //h4の文字色
				'st_h4bordercolor'        => $maincolor, //h4のボーダー色
				'st_h4bgcolor'            => '',   //h4の背景色
				'st_h4_design'            => 'yes',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => 'left',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => 'center',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => 20,         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => 10,         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => 'yes',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける

				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => '', //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => '',        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => 'center',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => '',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => '',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化

				//h5タグ
				'st_h5_textcolor'    => $keycolor, //h5の文字色
				'st_h5bordercolor'   => '',         //h5のボーダー色
				'st_h5bgcolor'       => $subcolor,  //h5の背景色
				'st_h5_design'            => '',         //h5デザインの変更
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => '',         //h5の下ボーダー
				'st_h5_bgimg_side'        => 'center',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => 'center',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '20',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => 10,         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => 'yes',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => 'yes',        //ふせん風の影をつける

				'st_blockquote_color' => '', //引用部分の背景色

				'st_separator_color'   => $textcolor, //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => $keycolor, //NEW ENTRYの背景色

				'st_catbg_color'   => $keycolor, //カテゴリーの背景色
				'st_cattext_color' => '#ffffff', //カテゴリーのテキスト色

				//お知らせ
				'st_news_datecolor'            => $keycolor, //お知らせ日付のテキスト色
				'st_news_text_color'           => '#333',  //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => $keycolor, //お知らせの背景色上
				'st_menu_newsbarcolor'         => $keycolor, //お知らせの背景色下
				'st_menu_newsbar_border_color' => $keycolor, //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => $textcolor, //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色

				//メニュー
				'st_menu_navbar_topunder_color' => $maincolor, //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => $keycolor, //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => '', //メニューの右ボーダー色
				'st_menu_navbarcolor'           => $keycolor, //メニューの背景色下
				'st_menu_navbarcolor_t'         => $maincolor, //メニューの背景色上
				'st_menu_navbar_undercolor'         => $maincolor, //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => $textcolor, //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => 'yes',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,bottom10)
				'st_navbarcolor_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_headermenu_bgimg_side'   => 'center', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => 'center', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し

				'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

				'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに

				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => '',        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => $keycolor,        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => $maincolor,        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => '', //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => 'f138', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => 'f105', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => '', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色

				'st_menu_pagelist_childtextcolor'         => $keycolor, //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色

				//ウィジェットタイトル
				'st_widgets_title_color'          => $textcolor, //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => $keycolor,       //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => $maincolor,       //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => $maincolor,        //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => $maincolor, //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => 'stripe_design',        //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => 20,       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => 7,       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => 'yes',        //背景や吹き出しの角を丸くする

				'st_tagcloud_color'       => $keycolor, //タグクラウド色
				'st_tagcloud_bordercolor' => $keycolor, //タグクラウドボーダー色
				'st_rss_color'            => $keycolor, //RSSボタン

				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト

				'st_formbtn_textcolor'   => $textcolor, //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => $keycolor, //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => 'yes',         //ウィジェット問合せフォームの角を丸くする

				'st_formbtn2_textcolor'   => $textcolor, //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => $keycolor, //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => 'yes',         //ウィジェッオリジナルボタンの角を丸くする

				'st_contactform7btn_textcolor' => $textcolor, //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => $keycolor, //コンタクトフォーム7の送信ボタンの背景色

				//任意記事
				'st_menu_osusumemidasitextcolor' => $textcolor,   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => $keycolor, //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => $textcolor,   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => $keycolor, //任意記事のナンバー背景色
				'st_menu_popbox_color'           => $subcolor,    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除

				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => $textcolor,   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => $keycolor, //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => $subcolor,    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色

				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色

				//スマホサイズ
				'st_menu_sumartmenutextcolor' => '', //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => $maincolor, //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => $subcolor,       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => $textcolor, //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix

				'st_menu_sumart_st_bg_color'  => $maincolor, //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => $textcolor, //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => $maincolor, //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => $textcolor, //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => $textcolor, //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => $maincolor, //スマホフッターメニュー背景色

				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor' => $textcolor, //文字色
				'st_middle_sumartmenubordercolor' => '', //ボーダー
				'st_middle_sumart_bg_color'     => $keycolor, //背景色
				'st_middle_sumart_bg_color_t'     => $maincolor, //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）

				//Webアイコン
				'st_webicon_question'    => '', //はてな
				'st_webicon_check'       => '', //チェック
				'st_webicon_exclamation' => '#f44336', //エクステンション
				'st_webicon_memo'        => '', //メモ
				'st_webicon_user'        => '', //人物

				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線

				//サイト管理者紹介
				'st_author_basecolor' => $keycolor,   //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => $subcolor,   //「サイト管理者紹介」の背景カラー

				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => 'yes', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => $keycolor,     //背景色

				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）

				//マル数字のカラー
				'st_maruno_textcolor'   => $textcolor, //ナンバー色
				'st_maruno_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => '', //囲い背景色
				'st_maruno_radius'     => '', //背景色の角を丸くする

				//マルチェックのカラー
				'st_maruck_textcolor'   => $textcolor, //ナンバー色
				'st_maruck_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => '', //囲い背景
				'st_maruck_radius'     => '', //背景色の角を丸くする

				//チェックボックスのカラー
				'st_webicon_checkbox'          => $keycolor, //チェック色
				'st_webicon_checkbox_square'   => $subcolor, //チェックの枠色

				//タイムラインのカラー
				'st_timeline_list_color'         => $keycolor, //ラインカラー
				'st_timeline_list_color_count'   => $textcolor, //カウントカラー

				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => $keycolor, //横一列目の背景色
				'st_table_tr_textcolor' => $textcolor, //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字

				//会話ふきだし
				'st_kaiwa_bgcolor'  => $subcolor, //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色

				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする

				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => '', //影をつける（プロフィールカード）
			);
		}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'flat' ){ // フラット
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_height' => '', //スマホロゴ画像の最大の高さ（px）
				'st_mobile_logo_center' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => $textcolor,    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる

				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '5px', //サイト上部ボーダーの高さ

				'st_headbox_bgcolor_t'   => $keycolor,    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => $keycolor,    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => 'yes',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => 'center', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => 'center', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

				'st_menu_logocolor' => $textcolor, //サイトタイトル及びディスクリプション色

				'st_menu_maincolor'        => '#ffffff', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過

				'st_footer_bg_text_color' => $textcolor,       //フッターテキスト色
				'st_footer_bg_color_t'    => $keycolor,      //フッター背景色上部
				'st_footer_bg_color'      => $keycolor,       //フッター背景色下部
				'st_footer100'            => 'yes',       //フッター背景幅100%
				'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
				'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => 'yes',        //グラデーションを横向きにする

				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

				//ヘッダー
				'st_headerwidget_bgcolor'   => $subcolor, //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => $textcolor, //ヘッダーの電話番号とリンク色

				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_center'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする

				//h2タグ
				'st_h2_color'           => $textcolor, //h2のテキスト色
				'st_h2_bgcolor'         => $keycolor,  //h2の背景色
				'st_h2_bgcolor_t'       => '',   //h2の背景色上部
				'st_h2border_color'       => '',  //h2のボーダー色
				'st_h2border_undercolor'  => '',   //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb_sub'         => '',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'         => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => 'hukidasidesign',        //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => 'left',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => 'center',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => 0,         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => 10,         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_center'            => 'yes',        //テキストをセンタリング
				'st_h2_design_wide'            => '',        //デザインを幅一杯にする

				//h3タグ
				'st_h3_color'          => $keycolor, //h3のテキスト色
				'st_h3_bgcolor'        => $subcolor, //h3の背景色
				'st_h3_bgcolor_t'      => '', //h3の背景色上部
				'st_h3border_color'       => $keycolor, //h3のボーダー色
				'st_h3border_undercolor'  => $keycolor,  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => 'yes',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => '',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => '',        //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_center'            => '',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする

				//h4タグ
				'st_h4_textcolor'         => $keycolor, //h4の文字色
				'st_h4bordercolor'        => $keycolor,         //h4のボーダー色
				'st_h4bgcolor'            => '',  //h4の背景色
				'st_h4_design'            => 'yes',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => 'left',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => 'center',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => 20,         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => 10,         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける

				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => '', //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => '',        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => 'center',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => '',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => '',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化

				//h5タグ
				'st_h5_textcolor'    => $keycolor, //h5の文字色
				'st_h5bordercolor'   => $maincolor,         //h5のボーダー色
				'st_h5bgcolor'       => $subcolor,  //h5の背景色
				'st_h5_design'            => '',         //h5デザインの変更
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => '',         //h5の下ボーダー
				'st_h5_bgimg_side'        => 'center',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => 'center',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '20',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => 10,         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => '',        //ふせん風の影をつける

				'st_blockquote_color' => '', //引用部分の背景色

				'st_separator_color'   => $textcolor, //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => $keycolor, //NEW ENTRYの背景色

				'st_catbg_color'   => $keycolor, //カテゴリーの背景色
				'st_cattext_color' => '#ffffff', //カテゴリーのテキスト色

				//お知らせ
				'st_news_datecolor'            => $keycolor, //お知らせ日付のテキスト色
				'st_news_text_color'           => '#333',  //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => $keycolor, //お知らせの背景色上
				'st_menu_newsbarcolor'         => $keycolor, //お知らせの背景色下
				'st_menu_newsbar_border_color' => $keycolor, //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => $textcolor, //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色

				//メニュー
				'st_menu_navbar_topunder_color' => $maincolor, //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => $keycolor, //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => $maincolor, //メニューの右ボーダー色
				'st_menu_navbarcolor'           => $keycolor, //メニューの背景色下
				'st_menu_navbarcolor_t'         => $keycolor, //メニューの背景色上
				'st_menu_navbar_undercolor'         => $maincolor, //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => $textcolor, //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => 'yes',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,bottom10)
				'st_navbarcolor_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_headermenu_bgimg_side'   => 'center', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => 'center', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し

				'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

				'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに

				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => '',        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => $keycolor,        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => $keycolor,        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => '', //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => 'f138', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => 'f105', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => '', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色

				'st_menu_pagelist_childtextcolor'         => $keycolor, //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色

				//ウィジェットタイトル
				'st_widgets_title_color'          => $textcolor, //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => $keycolor,        //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => '',        //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => '',         //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => '',  //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => 'hukidasidesign',        //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => 20,       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => 7,       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => '',        //背景や吹き出しの角を丸くする

				'st_tagcloud_color'       => $keycolor, //タグクラウド色
				'st_tagcloud_bordercolor' => $keycolor, //タグクラウドボーダー色
				'st_rss_color'            => $keycolor, //RSSボタン

				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト

				'st_formbtn_textcolor'   => $textcolor, //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => $keycolor, //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => 'yes',         //ウィジェット問合せフォームの角を丸くする

				'st_formbtn2_textcolor'   => $textcolor, //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => $keycolor, //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => 'yes',         //ウィジェッオリジナルボタンの角を丸くする

				'st_contactform7btn_textcolor' => $textcolor, //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => $keycolor, //コンタクトフォーム7の送信ボタンの背景色

				//任意記事
				'st_menu_osusumemidasitextcolor' => $textcolor,   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => $keycolor, //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => $textcolor,   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => $keycolor, //任意記事のナンバー背景色
				'st_menu_popbox_color'           => $subcolor,    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除

				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => $textcolor,   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => $keycolor, //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => $subcolor,    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色

				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色

				//スマホサイズ
				'st_menu_sumartmenutextcolor' => '', //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => $maincolor, //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => $subcolor,       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => $textcolor, //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix

				'st_menu_sumart_st_bg_color'  => $maincolor, //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => $textcolor, //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => $maincolor, //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => $textcolor, //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => $textcolor, //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => $maincolor, //スマホフッターメニュー背景色

				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor' => $textcolor, //文字色
				'st_middle_sumartmenubordercolor' => $maincolor, //ボーダー
				'st_middle_sumart_bg_color'     => $keycolor, //背景色
				'st_middle_sumart_bg_color_t'     => $keycolor, //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）

				//Webアイコン
				'st_webicon_question'    => '', //はてな
				'st_webicon_check'       => '', //チェック
				'st_webicon_exclamation' => '#f44336', //エクステンション
				'st_webicon_memo'        => '', //メモ
				'st_webicon_user'        => '', //人物

				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線

				//サイト管理者紹介
				'st_author_basecolor' => $keycolor,   //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => $subcolor,   //「サイト管理者紹介」の背景カラー

				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => 'yes', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => $keycolor,     //背景色

				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）

				//マル数字のカラー
				'st_maruno_textcolor'   => $textcolor, //ナンバー色
				'st_maruno_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => '', //囲い背景色
				'st_maruno_radius'     => '', //背景色の角を丸くする

				//マルチェックのカラー
				'st_maruck_textcolor'   => $textcolor, //ナンバー色
				'st_maruck_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => '', //囲い背景
				'st_maruck_radius'     => '', //背景色の角を丸くする

				//チェックボックスのカラー
				'st_webicon_checkbox'          => $keycolor, //チェック色
				'st_webicon_checkbox_square'   => $subcolor, //チェックの枠色

				//タイムラインのカラー
				'st_timeline_list_color'         => $keycolor, //ラインカラー
				'st_timeline_list_color_count'   => $textcolor, //カウントカラー

				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => $keycolor, //横一列目の背景色
				'st_table_tr_textcolor' => $textcolor, //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字

				//会話ふきだし
				'st_kaiwa_bgcolor'  => $subcolor, //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色

				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする

				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => '', //影をつける（プロフィールカード）
			);
		}elseif ( isset( $GLOBALS['stdata261']) && $GLOBALS['stdata261'] === 'reset' ){ // リセット
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_on' => '', //スマホロゴ（タイトル）を使用する
				'st_mobile_logo_' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => '',    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる
	
				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '', //サイト上部ボーダーの高さ
	
				'st_headbox_bgcolor_t'   => '',    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => '',    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => '',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => '', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => '', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => '',        //グラデーションを横向きにする
	
				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => '', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => '', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し
	
				'st_menu_logocolor' => '', //サイトタイトル及びディスクリプション色
	
				'st_menu_maincolor'        => '', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過
	
				'st_footer_bg_text_color' => '',       //フッターテキスト色
				'st_footer_bg_color_t'    => '',       //フッター背景色上部
				'st_footer_bg_color'      => '',       //フッター背景色下部
				'st_footer100'            => '',       //フッター背景幅100%
				'st_footer_image_side'    => '', //フッターの背景画像の横位置
				'st_footer_image_top'     => '', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => '',        //グラデーションを横向きにする
	
				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度
	
				//ヘッダー
				'st_headerwidget_bgcolor'   => '', //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => '', //ヘッダーの電話番号とリンク色
	
				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）linedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => '',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => '',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする
	
				//h2タグ
				'st_h2_color'           => '', //h2のテキスト色
				'st_h2_bgcolor'         => '',  //h2の背景色
				'st_h2_bgcolor_t'       => '',  //h2の背景色上部
				'st_h2border_color'       => '', //h2のボーダー色
				'st_h2border_undercolor'  => '',  //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb_sub'         => '',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'         => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => '',        //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）linedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => '',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => '',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => '',         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => '',         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_'            => '',        //テキストをセンタリング
				'st_h2_design_wide'            => '',        //デザインを幅一杯にする
	
				//h3タグ
				'st_h3_color'          => '', //h3のテキスト色
				'st_h3_bgcolor'        => '', //h3の背景色
				'st_h3_bgcolor_t'      => '', //h3の背景色上部
				'st_h3border_color'       => '', //h3のボーダー色
				'st_h3border_undercolor'  => '',  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => '',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => '',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）linedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => '',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => '',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => '',        //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => '',        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_'            => '',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする
	
				//h4タグ
				'st_h4_textcolor'    => '', //h4の文字色
				'st_h4bordercolor'   => '',         //h4のボーダー色
				'st_h4bgcolor'       => '',  //h4の背景色
				'st_h4_design'            => '',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => '',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => '',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => '',         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => '',         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける
	
				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => '', //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => '',        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => '',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => '',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => '',        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => '',        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => '',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => '',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化
	
				//h5タグ
				'st_h5_textcolor'    => '', //h5の文字色
				'st_h5bordercolor'   => '',         //h5のボーダー色
				'st_h5bgcolor'       => '',  //h5の背景色
				'st_h5_design'            => '',         //h5デザインの変更
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => '',         //h5の下ボーダー
				'st_h5_bgimg_side'        => '',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => '',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => '',         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => '',        //ふせん風の影をつける
	
				'st_blockquote_color' => '', //引用部分の背景色
	
				'st_separator_color'   => '', //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => '', //NEW ENTRYの背景色
	
				'st_catbg_color'   => '', //カテゴリーの背景色
				'st_cattext_color' => '', //カテゴリーのテキスト色
	
				//お知らせ
				'st_news_datecolor'            => '', //お知らせ日付のテキスト色
				'st_news_text_color'           => '',  //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => '', //お知らせの背景色上
				'st_menu_newsbarcolor'         => '', //お知らせの背景色下
				'st_menu_newsbar_border_color' => '', //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => '', //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色
	
				//メニュー
				'st_menu_navbar_topunder_color' => '', //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => '', //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => '', //メニューの右ボーダー色
				'st_menu_navbarcolor'           => '', //メニューの背景色下
				'st_menu_navbarcolor_t'         => '', //メニューの背景色上
				'st_menu_navbar_undercolor'         => '', //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => '', //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => '',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,)
				'st_navbarcolor_gradient'            => '',        //グラデーションを横向きにする
	
				'st_headermenu_bgimg_side'   => '', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => '', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し
	
				'st_sidemenu_bgimg_side'        => '', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => '', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => '',       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => '',        //サイドメニュー第一階層の背景画像の上下の余白
	
				'st_sidebg_bgimg_side'   => '', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => '', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し
	
				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => '', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => '', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに
	
				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => '#eee',        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => '',        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => '',        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => '', //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => '', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => '', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => '', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => '',        //グラデーションを横向きにする
	
				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色
	
				'st_menu_pagelist_childtextcolor'         => '', //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => '',  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => '#eee', //サイドメニュー下層の下線色
	
				//ウィジェットタイトル
				'st_widgets_title_color'          => '', //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => '',        //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => '',        //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => '',        //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => '', //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => '',        //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => '',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => '',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => '',       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => '',       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => '',        //背景や吹き出しの角を丸くする
	
				'st_tagcloud_color'       => '', //タグクラウド色
				'st_tagcloud_bordercolor' => '', //タグクラウドボーダー色
				'st_rss_color'            => '', //RSSボタン
	
				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト
	
				'st_formbtn_textcolor'   => '', //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => '', //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => '',         //ウィジェット問合せフォームの角を丸くする
	
				'st_formbtn2_textcolor'   => '', //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => '', //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => '',         //ウィジェッオリジナルボタンの角を丸くする
	
				'st_contactform7btn_textcolor' => '', //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => '', //コンタクトフォーム7の送信ボタンの背景色
	
				//任意記事
				'st_menu_osusumemidasitextcolor' => '',   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => '', //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => '',   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => '', //任意記事のナンバー背景色
				'st_menu_popbox_color'           => '',    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除
	
				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => '', //Webアイコン（Font Awesome）
	
				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => '',   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => '', //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => '',    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色
	
				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色
	
				//スマホサイズ
				'st_menu_sumartmenutextcolor' => '', //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => '', //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => '',       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => '', //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix
	
				'st_menu_sumart_st_bg_color'  => '', //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => '', //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => '', //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => '', //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => '', //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => '', //スマホフッターメニュー背景色
	
				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor' => '', //文字色
				'st_middle_sumartmenubordercolor' => '', //ボーダー
				'st_middle_sumart_bg_color'     => '', //背景色
				'st_middle_sumart_bg_color_t'     => '', //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）
	
				//Webアイコン
				'st_webicon_question'    => '', //はてな
				'st_webicon_check'       => '', //チェック
				'st_webicon_exclamation' => '', //エクステンション
				'st_webicon_memo'        => '', //メモ
				'st_webicon_user'        => '', //人物
	
				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線
	
				//サイト管理者紹介
				'st_author_basecolor' => '',   //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => '',   //「サイト管理者紹介」の背景カラー
	
				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => '', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => '',     //背景色
	
				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）
	
				//マル数字のカラー
				'st_maruno_textcolor'   => '', //ナンバー色
				'st_maruno_nobgcolor'   => '', //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => '', //囲い背景色
				'st_maruno_radius'     => '', //背景色の角を丸くする
	
				//マルチェックのカラー
				'st_maruck_textcolor'   => '', //ナンバー色
				'st_maruck_nobgcolor'   => '', //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => '', //囲い背景
				'st_maruck_radius'     => '', //背景色の角を丸くする
	
				//チェックボックスのカラー
				'st_webicon_checkbox'          => '', //チェック色
				'st_webicon_checkbox_square'   => '', //チェックの枠色
	
				//タイムラインのカラー
				'st_timeline_list_color'         => '', //ラインカラー
				'st_timeline_list_color_count'   => '', //カウントカラー
	
				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => '', //横一列目の背景色
				'st_table_tr_textcolor' => '', //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字
	
				//会話ふきだし
				'st_kaiwa_bgcolor'  => '', //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色
	
				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする
	
				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => '', //影をつける（プロフィールカード）
	
				//mainエリア（記事）
				'st_menu_main_bordercolor'           => '#eee', //周りのボーダー
			);
		} else { // デフォルト（横グラデーション）
			$zentai_overrides   = array(
				'st_header_footer_logo' => '', //ヘッダーロゴをフッターにも
				'st_mobile_logo_height' => '', //スマホロゴ画像の最大の高さ（px）
				'st_mobile_logo_center' => '', //スマホロゴ（又はタイトル）をセンター寄せ
				'st_mobile_sitename'     => $textcolor,    //スマホタイトル使用時のテキスト色
				'st_area'               => '', //記事エリアを広げる

				'st_top_bordercolor' => '',    //サイト上部にボーダー
				'st_line100'         => '',    //サイト上部ボーダーを100%に
				'st_line_height'     => '5px', //サイト上部ボーダーの高さ

				'st_headbox_bgcolor_t'   => $keycolor,    //ヘッダーの背景色上部
				'st_headbox_bgcolor'     => $maincolor,    //ヘッダーの背景色下部
				'st_wrapper_bgcolor'     => '',    //Wrapperの背景色
				'st_header100'           => 'yes',    //ヘッダーの背景画像の幅100%
				'st_header_image_side'   => 'center', //ヘッダーの背景画像の横位置
				'st_header_image_top'    => 'center', //ヘッダーの背景画像の縦位置
				'st_header_image_repeat' => '',    //ヘッダーの背景画像の繰り返し
				'st_header_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_headerunder_bgcolor'      => '',    //ヘッダー以下の背景色
				'st_headerunder_image_side'   => 'center', //ヘッダー以下の背景画像の横位置
				'st_headerunder_image_top'    => 'center', //ヘッダー以下の背景画像の縦位置
				'st_headerunder_image_repeat' => '',    //ヘッダー以下の背景画像の繰り返し

				'st_menu_logocolor' => $textcolor, //サイトタイトル及びディスクリプション色

				'st_menu_maincolor'        => '#ffffff', //コンテンツ背景色
				'st_menu_main_bordercolor' => '',        //コンテンツボーダー色
				'st_main_opacity'          => '',        //メインコンテンツ背景の透過

				'st_footer_bg_text_color' => $textcolor,       //フッターテキスト色
				'st_footer_bg_color_t'    => $maincolor,       //フッター背景色上部
				'st_footer_bg_color'      => $keycolor,       //フッター背景色下部
				'st_footer100'            => 'yes',       //フッター背景幅100%
				'st_footer_image_side'    => 'center', //フッターの背景画像の横位置
				'st_footer_image_top'     => 'center', //フッターの背景画像の縦位置
				'st_footer_image_repeat'  => '',       //フッターの背景画像の繰り返し
				'st_footer_gradient'            => 'yes',        //グラデーションを横向きにする

				//一括カラー
				'st_main_textcolor'      => '', //記事の文字色
				'st_side_textcolor'      => '', //サイドバーの文字色
				'st_link_textcolor'      => '', //記事のリンク色
				'st_link_hovertextcolor' => '', //記事のリンクマウスオーバー色
				'st_link_hoveropacity'   => '', //記事のリンクマウスオーバー時の透明度

				//ヘッダー
				'st_headerwidget_bgcolor'   => $subcolor, //ヘッダーウィジェットの背景色
				'st_headerwidget_textcolor' => '', //ヘッダーウィジェットのテキスト色
				'st_header_tel_color'       => $textcolor, //ヘッダーの電話番号とリンク色

				//記事タイトル
				'st_entrytitle_color'           => '', //記事タイトルのテキスト色
				'st_entrytitle_bgcolor'         => '',        //記事タイトルの背景色
				'st_entrytitle_bgcolor_t'       => '',        //記事タイトルの背景色上部
				'st_entrytitleborder_color'       => '',        //記事タイトルのボーダー色
				'st_entrytitleborder_undercolor'  => '', //記事タイトルのボーダー色（2色アンダーライン）
				'st_entrytitle_border_tb'         => '',        //記事タイトルのボーダー上下のみ
				'st_entrytitle_border_tb_sub'         => '',    //記事タイトルのボーダー上を太く下をサブカラーに
				'st_entrytitle_border_tb_dot'         => '',    //記事タイトルのボーダー上をドットに
				'st_entrytitle_designsetting'     => '',        //記事タイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_entrytitle_bgimg_side'        => 'left',  //記事タイトルの背景画像の横位置
				'st_entrytitle_bgimg_top'         => 'center',  //記事タイトルの背景画像の縦位置
				'st_entrytitle_bgimg_repeat'      => '',        //記事タイトルの背景画像の繰り返し
				'st_entrytitle_bgimg_leftpadding' => '',        //記事タイトルの背景画像の左の余白
				'st_entrytitle_bgimg_tupadding'   => '',        //記事タイトルの背景画像の上下の余白
				'st_entrytitle_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_entrytitle_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_entrytitle_gradient'            => '',        //グラデーションを横向きにする
				'st_entrytitle_text_center'            => '',        //テキストをセンタリング
				'st_entrytitle_design_wide'            => '',        //デザインを幅一杯にする

				//h2タグ
				'st_h2_color'           => $keycolor, //h2のテキスト色
				'st_h2_bgcolor'         => $keycolor,  //h2の背景色
				'st_h2_bgcolor_t'       => $subcolor,  //h2の背景色上部
				'st_h2border_color'       => $keycolor, //h2のボーダー色
				'st_h2border_undercolor'  => $subcolor,  //h2のボーダー色（2色アンダーライン）
				'st_h2_border_tb_sub'         => '',    //h2のボーダー上を太く下をサブカラーに
				'st_h2_border_tb_dot'         => '',    //h2のボーダー上をドットに
				'st_h2_designsetting'     => 'centerlinedesign',        //h2デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h2_bgimg_side'        => 'left',   //h2の背景画像の横位置
				'st_h2_bgimg_top'         => 'center',   //h2の背景画像の縦位置
				'st_h2_bgimg_repeat'      => '',         //h2の背景画像の繰り返し
				'st_h2_bgimg_leftpadding' => 0,         //h2の背景画像の左の余白
				'st_h2_bgimg_tupadding'   => 10,         //h2の背景画像の上下の余白
				'st_h2_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h2_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h2_gradient'            => '',        //グラデーションを横向きにする
				'st_h2_text_center'            => 'yes',        //テキストをセンタリング
				'st_h2_design_wide'            => '',        //デザインを幅一杯にする

				//h3タグ
				'st_h3_color'          => $textcolor, //h3のテキスト色
				'st_h3_bgcolor'        => $keycolor, //h3の背景色
				'st_h3_bgcolor_t'      => $keycolor, //h3の背景色上部
				'st_h3border_color'       => $keycolor, //h3のボーダー色
				'st_h3border_undercolor'  => $maincolor,  //h3のボーダー色（2色アンダーライン）
				'st_h3_border_tb'         => '',       //h3のボーダー上下のみ
				'st_h3_border_tb_sub'         => '',    //h3のボーダー上を太く下をサブカラーに
				'st_h3_border_tb_dot'         => '',    //h3のボーダー上をドットに
				'st_h3_designsetting'     => 'hukidasidesign',        //h3デザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）gradient_underlinedesign（グラデーションアンダーライン）centerlinedesign（センターラインに変更）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）underdotdesign（下線ドットデザイン）
				'st_h3_bgimg_side'        => 'left',  //h3の背景画像の横位置
				'st_h3_bgimg_top'         => 'center',  //h3の背景画像の縦位置
				'st_h3_bgimg_repeat'      => '',        //h3の背景画像の繰り返し
				'st_h3_bgimg_leftpadding' => 0,        //h3の背景画像の左の余白
				'st_h3_bgimg_tupadding'   => 10,        //h3の背景画像の上下の余白
				'st_h3_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h3_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h3_gradient'            => '',        //グラデーションを横向きにする
				'st_h3_text_center'            => 'yes',        //テキストをセンタリング
				'st_h3_design_wide'            => '',        //デザインを幅一杯にする

				//h4タグ
				'st_h4_textcolor'    => $keycolor, //h4の文字色
				'st_h4bordercolor'   => $keycolor,         //h4のボーダー色
				'st_h4bgcolor'       => $subcolor,  //h4の背景色
				'st_h4_design'            => 'yes',         //h4の左ボーダー
				'st_h4_top_border'        => '',         //h4の上ボーダー
				'st_h4_bottom_border'     => '',         //h4の下ボーダー
				'st_h4_bgimg_side'        => 'left',   //h4の背景画像の横位置
				'st_h4_bgimg_top'         => 'center',   //h4の背景画像の縦位置
				'st_h4_bgimg_repeat'      => '',         //h4の背景画像の繰り返し
				'st_h4_bgimg_leftpadding' => 20,         //h4の背景画像の左の余白
				'st_h4_bgimg_tupadding'   => 10,         //h4の背景画像の上下の余白
				'st_h4hukidasi_design'    => '',        //h4デザインをふきだしに変更
				'st_h4_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h4_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h4_husen_shadow'            => '',        //ふせん風の影をつける

				//h4（まとめ）タグ
				'st_h4_matome_textcolor'    => '', //h4（まとめ）の文字色
				'st_h4_matome_bordercolor'   => '',        //h4（まとめ）のボーダー色
				'st_h4_matome_bgcolor'       => '',        //h4（まとめ）の背景色
				'st_h4_matome_design'            => '',        //h4（まとめ）デザインの変更
				'st_h4_matome_top_border'        => '',        //h4（まとめ）の上ボーダー
				'st_h4_matome_bottom_border'     => '',        //h4（まとめ）の下ボーダー
				'st_h4_matome_bgimg_side'        => 'center',  //h4（まとめ）の背景画像の横位置
				'st_h4_matome_bgimg_top'         => 'center',  //h4（まとめ）の背景画像の縦位置
				'st_h4_matome_bgimg_repeat'      => '',        //h4（まとめ）の背景画像の繰り返し
				'st_h4_matome_bgimg_leftpadding' => 20,        //h4（まとめ）の背景画像の左の余白
				'st_h4_matome_bgimg_tupadding'   => 10,        //h4（まとめ）の背景画像の上下の余白
				'st_h4_matome_hukidasi_design'    => '',        //h4（まとめ）デザインをふきだしに変更
				'st_h4_matome_bg_radius'    => '',        //背景や吹き出しの角を丸くする
				'st_h4_matome_no_css'    => '',        //カスタマイザーのCSSを無効化

				//h5タグ
				'st_h5_textcolor'    => $keycolor, //h5の文字色
				'st_h5bordercolor'   => $maincolor,         //h5のボーダー色
				'st_h5bgcolor'       => $subcolor,  //h5の背景色
				'st_h5_design'            => '',         //h5デザインの変更
				'st_h5_top_border'        => '',         //h5の上ボーダー
				'st_h5_bottom_border'     => 'yes',         //h5の下ボーダー
				'st_h5_bgimg_side'        => 'center',   //h5の背景画像の横位置
				'st_h5_bgimg_top'         => 'center',   //h5の背景画像の縦位置
				'st_h5_bgimg_repeat'      => '',         //h5の背景画像の繰り返し
				'st_h5_bgimg_leftpadding' => '20',         //h5の背景画像の左の余白
				'st_h5_bgimg_tupadding'   => 10,         //h5の背景画像の上下の余白
				'st_h5hukidasi_design'    => '',        //h5デザインをふきだしに変更
				'st_h5_bg_radius'         => '',        //背景や吹き出しの角を丸くする
				'st_h5_no_css'            => '',        //カスタマイザーのCSSを無効化
				'st_h5_husen_shadow'            => '',        //ふせん風の影をつける

				'st_blockquote_color' => '', //引用部分の背景色

				'st_separator_color'   => $textcolor, //NEW ENTRYのテキスト色
				'st_separator_bgcolor' => $keycolor, //NEW ENTRYの背景色

				'st_catbg_color'   => $keycolor, //カテゴリーの背景色
				'st_cattext_color' => '#ffffff', //カテゴリーのテキスト色

				//お知らせ
				'st_news_datecolor'            => $keycolor, //お知らせ日付のテキスト色
				'st_news_text_color'           => '#333',  //お知らせのテキストと下線色
				'st_menu_newsbarcolor_t'       => $keycolor, //お知らせの背景色上
				'st_menu_newsbarcolor'         => $keycolor, //お知らせの背景色下
				'st_menu_newsbar_border_color' => $keycolor, //お知らせのボーダー色
				'st_menu_newsbartextcolor'     => $textcolor, //お知らせのテキスト色
				'st_menu_newsbgcolor'          => '',         //お知らせの全体背景色

				//メニュー
				'st_menu_navbar_topunder_color' => $maincolor, //メニューの上下ボーダー色
				'st_menu_navbar_side_color'     => $keycolor, //メニューの左右ボーダー色
				'st_menu_navbar_right_color'    => $maincolor, //メニューの右ボーダー色
				'st_menu_navbarcolor'           => $keycolor, //メニューの背景色下
				'st_menu_navbarcolor_t'         => $maincolor, //メニューの背景色上
				'st_menu_navbar_undercolor'         => $maincolor, //下層ドロップダウンメニュー背景色
				'st_menu_navbartextcolor'       => $textcolor, //PCメニューテキスト色
				'st_menu_bold'                  => '',         //第一階層メニューを太字にする
				'st_menu100'                    => 'yes',         //PCメニュー100%
				'st_menu_padding'               => '',         //PCメニューの上下に隙間(top10,bottom10)
				'st_navbarcolor_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_headermenu_bgimg_side'   => 'center', //ヘッダーメニューの背景画像の横位置
				'st_headermenu_bgimg_top'    => 'center', //ヘッダーメニューの背景画像の縦位置
				'st_headermenu_bgimg_repeat' => '',       //ヘッダーメニューの背景画像の繰り返し

				'st_sidemenu_bgimg_side'        => 'center', //サイドメニュー第一階層の背景画像の横位置
				'st_sidemenu_bgimg_top'         => 'center', //サイドメニュー第一階層の背景画像の縦位置
				'st_sidemenu_bgimg_repeat'      => '',       //サイドメニュー第一階層の背景画像の繰り返し
				'st_sidemenu_bgimg_leftpadding' => 15,       //サイドメニュー第一階層の背景画像の左の余白
				'st_sidemenu_bgimg_tupadding'   => 8,        //サイドメニュー第一階層の背景画像の上下の余白

				'st_sidebg_bgimg_side'   => 'center', //サイドメニューの背景画像の横位置
				'st_sidebg_bgimg_top'    => 'center', //サイドメニューの背景画像の縦位置
				'st_sidebg_bgimg_repeat' => '',       //サイドメニューの背景画像の繰り返し

				'st_headerimg100'             => '',    //ヘッダー画像100%
				'st_header_bgcolor'           => '',    //ヘッダー画像の背景色
				'st_topgabg_image_side'       => 'center', //ヘッダー画像の背景画像の横位置
				'st_topgabg_image_top'        => 'center', //ヘッダー画像の背景画像の縦位置
				'st_topgabg_image_repeat'     => '',    //ヘッダー画像の背景画像の繰り返し
				'st_topgabg_image_flex'       => '',    //ヘッダー画像の背景画像のレスポンシブ化
				'st_topgabg_image_sumahoonly' => '',    //ヘッダー画像の背景画像をスマホとタブレットのみに

				//サイドメニューウィジェット
				'st_menu_side_widgets_topunder_color' => '',        //サイドメニューウィジェットのボーダー色
				'st_menu_side_widgetscolor'           => $keycolor,        //サイドメニューウィジェットの背景色下
				'st_menu_side_widgetscolor_t'         => $maincolor,        //サイドメニューウィジェットの背景色上
				'st_menu_side_widgetstextcolor'       => '', //サイドメニューウィジェットテキスト色
				'st_menu_icon'              => 'f138', //メニュー第一階層のWebアイコン
				'st_undermenu_icon'         => 'f105', //メニュー第二階層のWebアイコン
				'st_menu_icon_color'        => '', //メニュー第一階層のWebアイコンカラー
				'st_undermenu_icon_color'   => '', //メニュー第二階層のWebアイコンカラー
				'st_sidemenu_fontsize'      => '', //第一階層メニューの文字サイズを大きくする
				'st_sidemenu_accordion'   => '', //第二階層以下をスライドメニューにする
				'st_sidemenu_gradient'            => 'yes',        //グラデーションを横向きにする

				'st_side_bgcolor' => '', //サイドバー（中部）エリアの背景色

				'st_menu_pagelist_childtextcolor'         => $keycolor, //サイドメニュー下層のテキスト色
				'st_menu_pagelist_bgcolor'                => $subcolor,  //サイドメニュー下層の背景色
				'st_menu_pagelist_childtext_border_color' => $maincolor, //サイドメニュー下層の下線色

				//ウィジェットタイトル
				'st_widgets_title_color'          => $keycolor, //ウィジェットタイトルのテキスト色
				'st_widgets_title_bgcolor'        => '',        //ウィジェットタイトルの背景色
				'st_widgets_title_bgcolor_t'      => '',        //ウィジェットタイトルの背景色上部
				'st_widgets_titleborder_color'       => $keycolor,        //ウィジェットタイトルのボーダー色
				'st_widgets_titleborder_undercolor'  => $maincolor, //ウィジェットタイトルのボーダー色（2色アンダーライン）
				'st_widgets_title_designsetting'     => 'gradient_underlinedesign',        //ウィジェットタイトルデザインの変更hukidasidesign（吹き出しデザイン）linedesign（囲み&左ラインデザイン）underlinedesign（2色アンダーライン）dotdesign（囲みドットデザイン）stripe_design（ストライプデザイン）
				'st_widgets_title_bgimg_side'        => 'left',  //ウィジェットタイトルの背景画像の横位置
				'st_widgets_title_bgimg_top'         => 'center',  //ウィジェットタイトルの背景画像の縦位置
				'st_widgets_title_bgimg_repeat'      => '',        //ウィジェットタイトルの背景画像の繰り返し
				'st_widgets_title_bgimg_leftpadding' => 10,       //ウィジェットタイトルの背景画像の左の余白
				'st_widgets_title_bgimg_tupadding'   => 7,       //ウィジェットタイトルの背景画像の上下の余白
				'st_widgets_title_bg_radius'         => '',        //背景や吹き出しの角を丸くする

				'st_tagcloud_color'       => $keycolor, //タグクラウド色
				'st_tagcloud_bordercolor' => $keycolor, //タグクラウドボーダー色
				'st_rss_color'            => $keycolor, //RSSボタン

				'st_sns_btn'     => '', //SNSボタン背景
				'st_sns_btntext' => '', //SNSボタンテキスト

				'st_formbtn_textcolor'   => $textcolor, //ウィジェット問合せフォームのテキスト色
				'st_formbtn_bordercolor' => '',         //ウィジェット問合せフォームのボーダー色
				'st_formbtn_bgcolor_t'   => '',         //ウィジェット問合せフォームの背景色上部
				'st_formbtn_bgcolor'     => $keycolor, //ウィジェット問合せフォームの背景色
				'st_formbtn_radius'      => 'yes',         //ウィジェット問合せフォームの角を丸くする

				'st_formbtn2_textcolor'   => $textcolor, //ウィジェッオリジナルボタンのテキスト色
				'st_formbtn2_bordercolor' => '',         //ウィジェットオリジナルボタンのボーダー色
				'st_formbtn2_bgcolor_t'   => '',         //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_bgcolor'     => $keycolor, //ウィジェッオリジナルボタンの背景色
				'st_formbtn2_radius'      => 'yes',         //ウィジェッオリジナルボタンの角を丸くする

				'st_contactform7btn_textcolor' => $textcolor, //コンタクトフォーム7の送信ボタンテキスト色
				'st_contactform7btn_bgcolor'   => $keycolor, //コンタクトフォーム7の送信ボタンの背景色

				//任意記事
				'st_menu_osusumemidasitextcolor' => $textcolor,   //任意記事の見出しテキスト色
				'st_menu_osusumemidasicolor'     => $keycolor, //任意記事の見出し背景色
				'st_menu_osusumemidasinocolor'   => $textcolor,   //任意記事のナンバー色
				'st_menu_osusumemidasinobgcolor' => $keycolor, //任意記事のナンバー背景色
				'st_menu_popbox_color'           => $subcolor,    //任意記事の背景色
				'st_menu_popbox_textcolor'       => '',           //任意記事のテキスト色
				'st_nohidden'                    => '',           //任意記事のナンバー削除

				//こんな方におすすめ（ver20240520で設定削除済み）
				'st_blackboard_textcolor'   => '', //枠線とタイトル下線
				'st_blackboard_bordercolor' => '', //ulリストの下線
				'st_blackboard_bgcolor'     => '', //背景色
				'st_blackboard_mokuzicolor'   => '', //タイトル色
				'st_blackboard_title_bgcolor'   => '', //タイトル背景色
				'st_blackboard_list3_fontweight'   => '', //タイトル下線を非表示
				'st_blackboard_underbordercolor'   => '', //ulリストのチェックアイコン
				'st_blackboard_webicon'   => 'f0f6', //Webアイコン（Font Awesome）

				//フリーボックスウィジェット
				'st_freebox_tittle_textcolor' => $textcolor,   //フリーボックスウィジェットの見出しテキスト色
				'st_freebox_tittle_color'     => $keycolor, //フリーボックスウィジェットの見出背景色
				'st_freebox_color'            => $subcolor,    //フリーボックスウィジェットの背景色
				'st_freebox_textcolor'        => '',           //フリーボックスウィジェットのテキスト色

				//メモボックス
				'st_memobox_color' => '', //文字・ボーダー色
				//スライドボックス
				'st_slidebox_color' => '', //背景色

				//スマホサイズ
				'st_menu_sumartmenutextcolor' => '', //スマホメニュー文字色
				'st_menu_sumartmenubordercolor' => $maincolor, //スマホメニューボーダー
				'st_menu_sumart_bg_color'     => '', //スマホメニュー背景色
				'st_menu_smartbar_bg_color_t'     => '', //スマホメニューバー背景色（グラデーション上部）
				'st_menu_smartbar_bg_color'     => '', //スマホメニューOPアイコン背景色
				'st_menu_sumartbar_bg_color'  => $subcolor,       //スマホメニューバーエリア内背景色
				'st_menu_sumartcolor'         => $textcolor, //スマホwebアイコン
				'st_menu_faicon'              => '',        //メニューのWebアイコンを非表示
				'st_sticky_menu'              => '',        //スマホメニューfix

				'st_menu_sumart_st_bg_color'  => $maincolor, //追加スマホメニュー背景色
				'st_menu_sumart_st_color'     => $textcolor, //追加スマホwebアイコン色
				'st_menu_sumart_st2_bg_color' => $maincolor, //追加スマホメニュー背景色2
				'st_menu_sumart_st2_color'    => $textcolor, //追加スマホwebアイコン色2
				'st_menu_sumart_footermenu_text_color'    => $textcolor, //スマホフッターメニューテキスト色
				'st_menu_sumart_footermenu_bg_color'    => $maincolor, //スマホフッターメニュー背景色

				//スマホミドルメニュー
				'st_middle_sumartmenutextcolor' => $textcolor, //文字色
				'st_middle_sumartmenubordercolor' => '', //ボーダー
				'st_middle_sumart_bg_color'     => $keycolor, //背景色
				'st_middle_sumart_bg_color_t'     => $maincolor, //背景色（グラデーション上部※向きはヘッダーナビゲーション連動）

				//Webアイコン
				'st_webicon_question'    => '', //はてな
				'st_webicon_check'       => '', //チェック
				'st_webicon_exclamation' => '#f44336', //エクステンション
				'st_webicon_memo'        => '', //メモ
				'st_webicon_user'        => '', //人物

				//一覧のサムネイル画像の枠線
				'st_thumbnail_bordercolor' => '',   //一覧のサムネイル画像の枠線

				//サイト管理者紹介
				'st_author_basecolor' => $keycolor,   //「サイト管理者紹介」の基本カラー
				'st_author_bg_color' => $subcolor,   //「サイト管理者紹介」の背景カラー

				//ページトップボタン
				'st_pagetop_up'          => '',   //TOPに戻るボタンの配置を上にする
				'st_pagetop_circle'      => 'yes', //ページトップボタンを丸くする
				'st_pagetop_bgcolor'     => $keycolor,     //背景色

				//すごいもくじ
				'st_toc_textcolor'           => '', //文字色
				'st_toc_text2color'          => '', //文字色2
				'st_toc_bordercolor'         => $subcolor, //ボーダー色
				'st_toc_bgcolor'             => '', //背景色
				'st_toc_list_icon_base'      => $keycolor, //リスト数字・アイコン
				'st_toc_mokuzicolor'         => $keycolor, //目次色
				'st_toc_mokuzi_border'       => '', //目次タイトル下の下線
				'st_toc_list1_left'          => '', //第1リンクをセンター寄せにする
				'st_toc_list1_icon'          => '', //数字をアイコンに変更
				'st_toc_list2_icon'          => '', //第2リンクのアイコン非表示
				'st_toc_list3_fontweight'    => '', //第2リンク太字
				'st_toc_list3_icon'          => '', //第3リンク以降の数字（アイコン）を非表示にして並列
				'st_toc_underbordercolor'    => '', //下線
				'st_toc_webicon'             => 'e91c', //目次アイコン
				'st_toc_radius'              => '', //背景を角丸にする
				'st_toc_list_style'          => _st_get_default_toc_list_style(), //リストスタイル
				'st_toc_only_toc_fontweight' => '', //第1階層のみの場合のリンクを太字にする
				'st_toc_border_width'        => '5', //ボーダーの太さ（px）

				//マル数字のカラー
				'st_maruno_textcolor'   => $textcolor, //ナンバー色
				'st_maruno_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruno_bordercolor' => '', //囲いボーダー色
				'st_maruno_bgcolor'     => '', //囲い背景色
				'st_maruno_radius'     => '', //背景色の角を丸くする

				//マルチェックのカラー
				'st_maruck_textcolor'   => $textcolor, //ナンバー色
				'st_maruck_nobgcolor'   => $keycolor, //ナンバー背景色
				'st_maruck_bordercolor' => '', //囲いボーダー色
				'st_maruck_bgcolor'     => '', //囲い背景
				'st_maruck_radius'     => '', //背景色の角を丸くする

				//チェックボックスのカラー
				'st_webicon_checkbox'          => $keycolor, //チェック色
				'st_webicon_checkbox_square'   => $subcolor, //チェックの枠色

				//タイムラインのカラー
				'st_timeline_list_color'         => $keycolor, //ラインカラー
				'st_timeline_list_color_count'   => $textcolor, //カウントカラー

				//テーブルのカラー
				'st_table_bordercolor'  => '', //表のボーダー色
				'st_table_cell_bgcolor' => '', //偶数行のセルの色
				'st_table_td_bgcolor'   => '', //縦一列目の背景色
				'st_table_td_textcolor' => '', //縦一列目の文字色
				'st_table_td_bold'      => '', //縦一列目の太字
				'st_table_tr_bgcolor'   => $keycolor, //横一列目の背景色
				'st_table_tr_textcolor' => $textcolor, //横一列目の文字色
				'st_table_tr_bold'      => '', //横一列目の太字

				//会話ふきだし
				'st_kaiwa_bgcolor'  => $subcolor, //会話統一ふきだし背景色
				'st_kaiwa2_bgcolor'  => '', //会話2ふきだし背景色
				'st_kaiwa3_bgcolor'  => '', //会話3ふきだし背景色
				'st_kaiwa4_bgcolor'  => '', //会話4ふきだし背景色
				'st_kaiwa5_bgcolor'  => '', //会話5ふきだし背景色
				'st_kaiwa6_bgcolor'  => '', //会話6ふきだし背景色
				'st_kaiwa7_bgcolor'  => '', //会話7ふきだし背景色
				'st_kaiwa8_bgcolor'  => '', //会話8ふきだし背景色

				//ステップ
				'st_step_bgcolor'             => $subcolor, //ステップ数の背景色
				'st_step_color'               => $keycolor, //ステップ数の色
				'st_step_text_color'          => '', //テキスト色
				'st_step_text_bgcolor'        => '', //テキストの背景色
				'st_step_text_border_color'   => $keycolor, //ボーダー色
				'st_step_radius'              => 'yes', //角を丸くする

				//サイト管理者
				'st_author_profile'           => '', //プロフィールカードに変更
				'st_author_profile_shadow'    => 'yes', //影をつける（プロフィールカード）
			);
		}

		return array_merge($menuonly_overrides, $zentai_overrides);
	}
}

if ( !function_exists( 'st_create_default_theme_mod_diff' ) ) {
	/**
	 * theme_mod 配列から保存済み theme_mod の初期値のみを抽出
	 *
	 * @return array<string, string> theme_mod の初期値
	 */
	function st_create_default_theme_mod_diff( $theme_mod_defaults ) {
		$theme_mod_diff    = array();
		$previous_defaults = st_get_theme_mod_defaults( st_get_previous_kantan_setting() );

		foreach ($theme_mod_defaults as $theme_mod_name => $theme_mod_value) {
			if (!array_key_exists($theme_mod_name, $previous_defaults)) {
				$theme_mod_diff[$theme_mod_name] = $theme_mod_value;

				continue;
			}

			$current_theme_mod = get_theme_mod($theme_mod_name, $previous_defaults[$theme_mod_name]);

			//  リセット後は色設定が空文字になるので、空文字の場合も初期値で強制上書き
            //  if ($current_theme_mod === $previous_defaults[$theme_mod_name] || $current_theme_mod === '') {
            if ($current_theme_mod === $previous_defaults[$theme_mod_name]) { // 強制上書きしない
				$theme_mod_diff[$theme_mod_name] = $theme_mod_value;

				continue;
			}
		}

		return $theme_mod_diff;
	}
}

if ( !function_exists( 'st_get_var_theme_mod_maps' ) ) {
	/**
	 * 展開用の変数名と、それに対応する theme_mod 名の組み合わを取得
	 *
	 * 取得対象は `get_theme_mod()` で取得する値のみ
	 * `get_option()` で取得する値は **対象外**
	 *
	 * @return array<string, string> 変数名と theme_mod 名の組み合わせ
	 */
	function st_get_var_theme_mod_maps() {
		return array(
			// ほぼ、変数名 = theme_mod 名なものの、
			// CSS ファイル内で theme_mod 名と異なる変数を使用しているため、
			// 展開用の変数名と theme_mod 名を対応させるための組み合わせを定義する
			// (影響範囲が未確認のため、既存のコードに合わせるための処理)
			//
			// 変数名 => theme_mod 名
			'st_tilt_direction'        => 'st_tilt_direction',      //傾きの方向
			'st_tilt_height'           => 'st_tilt_height',         //傾きの高さ（%）
			'st_tilt_direction_btm'    => 'st_tilt_direction_btm',  //傾きの方向
			'st_tilt_height_btm'       => 'st_tilt_height_btm',     //傾きの高さ（%）
			'st_tilt_bgcolor'          => 'st_tilt_bgcolor',   //背景色
			'st_tilt_bgcolor_btm'      => 'st_tilt_bgcolor_btm', //背景色
			'st_tilt_brightness'       => 'st_tilt_brightness', //暗くする

			'st_header_footer_logo'    => 'st_header_footer_logo',   //ヘッダーロゴをフッターにも
			'st_pc_logo_height'        => 'st_pc_logo_height',       //PCロゴ画像の最大の高さ（px）
			'st_mobile_logo_height'    => 'st_mobile_logo_height',   //スマホロゴ画像の最大の高さ（px）
			'st_mobile_logo_center'    => 'st_mobile_logo_center',   //スマホロゴ（又はタイトル）をセンター寄せ
			'st_mobile_sitename'       => 'st_mobile_sitename',      //スマホタイトル使用時のテキスト色
			'st_icon_logo_width'       => 'st_icon_logo_width',      //アイコンロゴの最大の高さ（px）
			'st_icon_logo_width_sp'    => 'st_icon_logo_width_sp',   //スマホアイコンロゴの最大の高さ（px）
			'st_icon_logo_radius'      => 'st_icon_logo_radius',     //丸くする

			'st_area'                  => 'st_area',                 //記事エリアを広げる
			'st_main_top_bg_none'      => 'st_main_top_bg_none',     //トップページの背景色を無くす
			'st_main_archive_bg_none'  => 'st_main_archive_bg_none', //アーカイブの背景色を無くす

			'st_top_bordercolor' => 'st_top_bordercolor', //サイト上部にボーダー
			'st_line100'         => 'st_line100',         //サイト上部ボーダーを100%に
			'st_line_height'     => 'st_line_height',     //サイト上部ボーダーの高さ

			'st_headbox_bgcolor_t'          => 'st_headbox_bgcolor_t',   //ヘッダーの背景色上部
			'st_headbox_bgcolor'            => 'st_headbox_bgcolor',     //ヘッダーの背景色下部
			'st_front_page_bgcolor'  		=> 'st_front_page_bgcolor',  //サブ背景色
			'st_body_sub_bgcolor'  		    => 'st_body_sub_bgcolor',  //背景のスタイル
			'st_body_alpha_bgcolor'  		=> 'st_body_alpha_bgcolor',  //透過背景色
			'st_body_bg_alpha'  		    => 'st_body_bg_alpha',       //透過レベル
			'st_body_bg_designsetting'  	=> 'st_body_bg_designsetting',  //フロントページの背景色
			'st_wrapper_bgcolor'            => 'st_wrapper_bgcolor',     //Wrapperの背景色
			'st_header100'                  => 'st_header100',           //ヘッダーの背景画像の幅100%
			'st_header_image_side'          => 'st_header_image_side',   //ヘッダーの背景画像の横位置
			'st_header_image_top'           => 'st_header_image_top',    //ヘッダーの背景画像の縦位置
			'st_header_image_repeat'        => 'st_header_image_repeat', //ヘッダーの背景画像の繰り返し
			'st_header_bg_image_flex'       => 'st_header_bg_image_flex', //背景画像を幅100%のレスポンシブにする
			'st_header_front_exclusion_set' => 'st_header_front_exclusion_set',    //背景色及び画像をトップページのみ除外する
			'st_header_gradient'            => 'st_header_gradient',        //グラデーションを横向きにする

			'st_headerunder_bgcolor'      => 'st_headerunder_bgcolor',      //ヘッダー以下の背景色
			'st_headerunder_image_side'   => 'st_headerunder_image_side',   //ヘッダー以下の背景画像の横位置
			'st_headerunder_image_top'    => 'st_headerunder_image_top',    //ヘッダー以下の背景画像の縦位置
			'st_headerunder_image_repeat' => 'st_headerunder_image_repeat', //ヘッダー以下の背景画像の繰り返し

			'st_headerarea_bgcolor'        => 'st_headerarea_bgcolor',    //headerの背景色
			'st_headerbg_image_area'       => 'st_headerbg_image_area',   //headerの背景画像の範囲
			'st_headerbg_image_side'       => 'st_headerbg_image_side',   //headerの背景画像の横位置
			'st_headerbg_image_top'        => 'st_headerbg_image_top',    //headerの背景画像の縦位置
			'st_headerbg_image_repeat'     => 'st_headerbg_image_repeat', //headerの背景画像の繰り返し
			'st_headerbg_image_flex'       => 'st_headerbg_image_flex',   //headerの背景画像のレスポンシブ化
			'st_headerbg_image_dark'       => 'st_headerbg_image_dark',   //背景画像を暗くする

			'menu_logocolor' => 'st_menu_logocolor', //サイトタイトル及びディスクリプション色

			'st_front_menu_maincolor'                 => 'st_front_menu_maincolor',                     //記事エリア背景色
			'st_front_menu_main_bordercolor'          => 'st_front_menu_main_bordercolor',              //記事エリアボーダー色
			'st_front_main_shadow'                    => 'st_front_main_shadow',                        //シャドウを適応する
			'st_front_main_opacity'                   => 'st_front_main_opacity',                       //記事エリア背景の透過
			'st_front_main_opacity_sp'                => 'st_front_main_opacity_sp',                    //スマホにも反映する
			'st_front_entry_content_bg_image_side'    => 'st_front_entry_content_bg_image_side',        //記事エリア背景画像の横位置
			'st_front_entry_content_bg_image_top'     => 'st_front_entry_content_bg_image_top',         //記事エリア背景画像の縦位置
			'st_front_entry_content_bg_image_repeat'  => 'st_front_entry_content_bg_image_repeat',      //記事エリア背景画像の繰り返し
			'st_front_entry_content_bg_image_flex'    => 'st_front_entry_content_bg_image_flex',        //背景画像を幅100%のレスポンシブにする

			'menu_maincolor'                    => 'st_menu_maincolor',                     //記事エリア背景色
			'menu_main_bordercolor'             => 'st_menu_main_bordercolor',              //記事エリアボーダー色
			'st_main_shadow'                    => 'st_main_shadow',                        //シャドウを適応する
			'st_main_opacity'                   => 'st_main_opacity',                       //記事エリア背景の透過
			'st_main_opacity_sp'                => 'st_main_opacity_sp',                    //スマホにも反映する
			'st_entry_content_bg_image_side'    => 'st_entry_content_bg_image_side',        //記事エリア背景画像の横位置
			'st_entry_content_bg_image_top'     => 'st_entry_content_bg_image_top',         //記事エリア背景画像の縦位置
			'st_entry_content_bg_image_repeat'  => 'st_entry_content_bg_image_repeat',      //記事エリア背景画像の繰り返し
			'st_entry_content_bg_image_flex'    => 'st_entry_content_bg_image_flex',        //背景画像を幅100%のレスポンシブにする

			'st_stdata275'    => 'st_stdata275',        //フロントメインエリア上部の余白を0にする（PCのみ※960px以上）
			'st_stdata382'    => 'st_stdata382',        //フロントメインエリア上部の余白を0にする（スマホ・タブレットのみ※959px以下）
			'st_stdata276'    => 'st_stdata276',        //記事エリア上部の余白を0にする（PCのみ※960px以上）
			'st_stdata383'    => 'st_stdata383',        //記事エリア上部の余白を0にする（スマホ・タブレットのみ※959px以下）

			'st_footer_widgets_bg_color' => 'st_footer_widgets_bg_color',       //フッターバナーエリア背景色
			'st_footer_widgets100'       => 'st_footer_widgets100',       //フッターバナーエリア幅を100%にする

			'st_footer_bg_text_color' => 'st_footer_bg_text_color', //フッターテキスト色
			'st_footer_bg_color_t'    => 'st_footer_bg_color_t',    //フッター背景色上部
			'st_footer_bg_color'      => 'st_footer_bg_color',      //フッター背景色下部
			'st_footer100'            => 'st_footer100',            //フッター背景幅100%
			'st_footer_image_side'    => 'st_footer_image_side',    //フッターの背景画像の横位置
			'st_footer_image_top'     => 'st_footer_image_top',     //フッターの背景画像の縦位置
			'st_footer_image_repeat'  => 'st_footer_image_repeat',  //フッターの背景画像の繰り返し
			'st_footerbg_image_flex'  => 'st_footerbg_image_flex',       //背景画像を幅100%のレスポンシブにする
			'st_footerbg_image_dark'  => 'st_footerbg_image_dark',       //背景画像を暗くする
			'st_footer_gradient'            => 'st_footer_gradient',        //グラデーションを横向きにする

			//一括カラー
			'st_main_textcolor'      => 'st_main_textcolor',      //記事の文字色
			'st_main_textcolor_sub'  => 'st_main_textcolor_sub', //範囲を広げる（記事タイトル・抜粋など）
			'st_side_textcolor'      => 'st_side_textcolor',      //サイドバーの文字色
			'st_link_textcolor'      => 'st_link_textcolor',      //記事のリンク色
			'st_link_hovertextcolor' => 'st_link_hovertextcolor', //記事のリンクマウスオーバー色
			'st_link_hoveropacity'   => 'st_link_hoveropacity',   //記事のリンクマウスオーバー時の透明度

			//オリジナルブロック
			'st_memo_block_icon_color'      => 'st_memo_block_icon_color', //メモブロックの文字色
			'st_memo_block_bg_color'        => 'st_memo_block_bg_color', //メモブロックの背景色
			'st_memo_block_border_color'    => 'st_memo_block_border_color', //メモブロックの枠線
			'st_mybox_block_icon_color'      => 'st_mybox_block_icon_color', //マイボックスブロックの文字色
			'st_mybox_block_bg_color'        => 'st_mybox_block_bg_color', //マイボックスブロックの背景色
			'st_mybox_block_border_color'    => 'st_mybox_block_border_color', //マイボックスブロックの枠線
			'st_freebox_block_icon_color'    => 'st_freebox_block_icon_color', //見出し付きフリーボックスブロックの文字色
			'st_freebox_block_bg_color'      => 'st_freebox_block_bg_color', //見出し付きフリーボックブロックの背景色
			'st_freebox_block_border_color'  => 'st_freebox_block_border_color', //見出し付きフリーボックブロックの枠線
			'st_banarbox_block_icon_color'    => 'st_banarbox_block_icon_color', //バナー風ボックスブロックの文字色
			'st_banarbox_block_bg_color'      => 'st_banarbox_block_bg_color', //バナー風ボックブロックの背景色

			//ヘッダー
			'menu_st_headerwidget_bgcolor'      => 'st_headerwidget_bgcolor',   //ヘッダーウィジェットの背景色
			'menu_st_headerwidget_textcolor'    => 'st_headerwidget_textcolor', //ヘッダーウィジェットのテキスト色
			'menu_st_header_tel_color'          => 'st_header_tel_color',       //ヘッダーの電話番号とリンク色
			'st_fixed_pc_header'                => 'st_fixed_pc_header',       //ヘッダーナビゲーションを固定する
			'st_pc_header_fixed_alpha_bgcolor'  => 'st_pc_header_fixed_alpha_bgcolor', //ヘッダーナビゲーション固定用カラーフィルター
			'st_pc_header_fixed_bg_alpha'       => 'st_pc_header_fixed_bg_alpha', //ヘッダーナビゲーション固定用カラーフィルター透過レベル

			//投稿及び固定記事
			'st_kuzu_color'      => 'st_kuzu_color', //投稿日時・ぱんくず・タグ
			'st_kuzu_b'          => 'st_kuzu_b', //投稿日時スタイルB（執筆者も表示）にする
			'st_kuzu_b_color'    => 'st_kuzu_b_color', //スタイルBのテキスト色
			'st_kuzu_b_bg_color' => 'st_kuzu_b_bg_color', //スタイルBの背景色に
			'st_kuzu_b_color_writer'    => 'st_kuzu_b_color_writer', //スタイルBの執筆者テキスト色
			'st_kuzu_b_bg_color_writer' => 'st_kuzu_b_bg_color_writer', //スタイルBの執筆者背景色

			//記事タイトル
			'st_entrytitle_color'             => 'st_entrytitle_color',             //記事タイトルのテキスト色
			'st_entrytitle_bgcolor'           => 'st_entrytitle_bgcolor',           //記事タイトルの背景色
			'st_entrytitle_bgcolor_t'         => 'st_entrytitle_bgcolor_t',         //記事タイトルの背景色上部
			'st_entrytitleborder_color'       => 'st_entrytitleborder_color',       //記事タイトルのボーダー色
			'st_entrytitleborder_undercolor'  => 'st_entrytitleborder_undercolor',  //記事タイトルのボーダー色（2色アンダーライン）
			'st_entrytitle_border_tb'         => 'st_entrytitle_border_tb',         //記事タイトルのボーダー上下のみ
			'st_entrytitle_border_tb_sub'     => 'st_entrytitle_border_tb_sub',     //記事タイトルのボーダー上を太く下をサブカラーに
			'st_entrytitle_border_size'       => 'st_entrytitle_border_size',       //記事タイトルのボーダーの太さ
			'st_entrytitle_designsetting'     => 'st_entrytitle_designsetting',     //記事タイトルデザインの変更
			'st_entrytitle_bgimg_side'        => 'st_entrytitle_bgimg_side',        //記事タイトルの背景画像の横位置
			'st_entrytitle_bgimg_top'         => 'st_entrytitle_bgimg_top',         //記事タイトルの背景画像の縦位置
			'st_entrytitle_bgimg_repeat'      => 'st_entrytitle_bgimg_repeat',      //記事タイトルの背景画像の繰り返し
			'st_entrytitle_bgimg_leftpadding' => 'st_entrytitle_bgimg_leftpadding', //記事タイトルの背景画像の左の余白
			'st_entrytitle_bgimg_tupadding'   => 'st_entrytitle_bgimg_tupadding',   //記事タイトルの背景画像の上下の余白
			'st_entrytitle_bgimg_margin'      => 'st_entrytitle_bgimg_margin',      //記事タイトルの下のマージン
			'st_entrytitle_bg_radius'         => 'st_entrytitle_bg_radius',         //背景や吹き出しの角を丸くする
			'st_entrytitle_no_css'            => 'st_entrytitle_no_css',            //カスタマイザーのCSSを無効化
			'st_entrytitle_gradient'          => 'st_entrytitle_gradient',          //グラデーションを横向きにする
			'st_entrytitle_text_center'       => 'st_entrytitle_text_center',       //テキストをセンタリング
			'st_entrytitle_design_wide'       => 'st_entrytitle_design_wide',       //デザインを幅一杯にする

			//h2タグ
			'st_h2_color'             => 'st_h2_color',             //h2のテキスト色
			'st_h2_bgcolor'           => 'st_h2_bgcolor',           //h2の背景色
			'st_h2_bgcolor_t'         => 'st_h2_bgcolor_t',         //h2の背景色上部
			'st_h2border_color'       => 'st_h2border_color',       //h2のボーダー色
			'st_h2border_undercolor'  => 'st_h2border_undercolor',  //h2のボーダー色（2色アンダーライン）
			'st_h2_border_tb'         => 'st_h2_border_tb',         //h2のボーダー上下のみ
			'st_h2_border_tb_sub'     => 'st_h2_border_tb_sub',     //h2のボーダー上を太く下をサブカラーに
			'st_h2_border_size'       => 'st_h2_border_size',       //h2のボーダーの太さ
			'st_h2_designsetting'     => 'st_h2_designsetting',     //h2デザインの変更
			'st_h2_bgimg_side'        => 'st_h2_bgimg_side',        //h2の背景画像の横位置
			'st_h2_bgimg_top'         => 'st_h2_bgimg_top',         //h2の背景画像の縦位置
			'st_h2_bgimg_repeat'      => 'st_h2_bgimg_repeat',      //h2の背景画像の繰り返し
			'st_h2_bgimg_leftpadding' => 'st_h2_bgimg_leftpadding', //h2の背景画像の左の余白
			'st_h2_bgimg_tupadding'   => 'st_h2_bgimg_tupadding',   //h2の背景画像の上下の余白
			'st_h2_bgimg_tumargin'    => 'st_h2_bgimg_tumargin',    //h2の背景画像の上下のマージン
			'st_h2_bg_radius'         => 'st_h2_bg_radius',         //背景や吹き出しの角を丸くする
			'st_h2_no_css'            => 'st_h2_no_css',            //カスタマイザーのCSSを無効化
			'st_h2_gradient'          => 'st_h2_gradient',          //グラデーションを横向きにする
			'st_h2_text_center'       => 'st_h2_text_center',       //テキストをセンタリング
			'st_h2_design_wide'       => 'st_h2_design_wide',       //デザインを幅一杯にする

			//h3タグ
			'st_h3_color'             => 'st_h3_color',             //h3のテキスト色
			'st_h3_bgcolor'           => 'st_h3_bgcolor',           //h3の背景色
			'st_h3_bgcolor_t'         => 'st_h3_bgcolor_t',         //h3の背景色上部
			'st_h3border_color'       => 'st_h3border_color',       //h3のボーダー色
			'st_h3border_undercolor'  => 'st_h3border_undercolor',  //h3のボーダー色（2色アンダーライン）
			'st_h3_border_tb'         => 'st_h3_border_tb',         //h3のボーダー上下のみ
			'st_h3_border_tb_sub'     => 'st_h3_border_tb_sub',     //h3のボーダー上を太く下をサブカラーに
			'st_h3_border_size'       => 'st_h3_border_size',       //h3のボーダーの太さ
			'st_h3_designsetting'     => 'st_h3_designsetting',     //h3デザインの変更
			'st_h3_bgimg_side'        => 'st_h3_bgimg_side',        //h3の背景画像の横位置
			'st_h3_bgimg_top'         => 'st_h3_bgimg_top',         //h3の背景画像の縦位置
			'st_h3_bgimg_repeat'      => 'st_h3_bgimg_repeat',      //h3の背景画像の繰り返し
			'st_h3_bgimg_leftpadding' => 'st_h3_bgimg_leftpadding', //h3の背景画像の左の余白
			'st_h3_bgimg_tupadding'   => 'st_h3_bgimg_tupadding',   //h3の背景画像の上下の余白
			'st_h3_bgimg_tumargin'    => 'st_h3_bgimg_tumargin',    //h3の背景画像の上下のマージン
			'st_h3_bg_radius'         => 'st_h3_bg_radius',         //背景や吹き出しの角を丸くする
			'st_h3_no_css'            => 'st_h3_no_css',            //カスタマイザーのCSSを無効化
			'st_h3_gradient'          => 'st_h3_gradient',          //グラデーションを横向きにする
			'st_h3_text_center'       => 'st_h3_text_center',       //テキストをセンタリング
			'st_h3_design_wide'       => 'st_h3_design_wide',       //デザインを幅一杯にする

			//h4タグ
			'st_h4_textcolor'         => 'st_h4_textcolor',         //h4の文字色
			'st_h4bordercolor'        => 'st_h4bordercolor',        //h4のボーダー色
			'st_h4bgcolor'            => 'st_h4bgcolor',            //h4の背景色
			'st_h4_design'            => 'st_h4_design',            //h4デザインの変更
			'st_h4_top_border'        => 'st_h4_top_border',        //h4の上ボーダー
			'st_h4_bottom_border'     => 'st_h4_bottom_border',     //h4の下ボーダー
			'st_h4_border_size'       => 'st_h4_border_size',       //h4のボーダーの太さ
			'st_h4_bgimg_side'        => 'st_h4_bgimg_side',        //h4の背景画像の横位置
			'st_h4_bgimg_top'         => 'st_h4_bgimg_top',         //h4の背景画像の縦位置
			'st_h4_bgimg_repeat'      => 'st_h4_bgimg_repeat',      //h4の背景画像の繰り返し
			'st_h4_bgimg_leftpadding' => 'st_h4_bgimg_leftpadding', //h4の背景画像の左の余白
			'st_h4_bgimg_tupadding'   => 'st_h4_bgimg_tupadding',   //h4の背景画像の上下の余白
			'st_h4hukidasi_design'    => 'st_h4hukidasi_design',    //h4デザインをふきだしに変更
			'st_h4_bg_radius'         => 'st_h4_bg_radius',         //背景や吹き出しの角を丸くする
			'st_h4_no_css'            => 'st_h4_no_css',            //カスタマイザーのCSSを無効化
			'st_h4_husen_shadow'      => 'st_h4_husen_shadow',      //ふせん風の影をつける

			//h4（まとめ）タグ
			'st_h4_matome_textcolor'         => 'st_h4_matome_textcolor',    //h4の文字色
			'st_h4_matome_bordercolor'       => 'st_h4_matome_bordercolor',   //h4のボーダー色
			'st_h4_matome_bgcolor'           => 'st_h4_matome_bgcolor',       //h4の背景色
			'st_h4_matome_design'            => 'st_h4_matome_design',            //h4デザインの変更
			'st_h4_matome_top_border'        => 'st_h4_matome_top_border',        //h4の上ボーダー
			'st_h4_matome_bottom_border'     => 'st_h4_matome_bottom_border',     //h4の下ボーダー
			'st_h4_matome_bgimg_side'        => 'st_h4_matome_bgimg_side',        //h4の背景画像の横位置
			'st_h4_matome_bgimg_top'         => 'st_h4_matome_bgimg_top',         //h4の背景画像の縦位置
			'st_h4_matome_bgimg_repeat'      => 'st_h4_matome_bgimg_repeat',      //h4の背景画像の繰り返し
			'st_h4_matome_bgimg_leftpadding' => 'st_h4_matome_bgimg_leftpadding', //h4の背景画像の左の余白
			'st_h4_matome_bgimg_tupadding'   => 'st_h4_matome_bgimg_tupadding',   //h4の背景画像の上下の余白
			'st_h4_matome_hukidasi_design'   => 'st_h4_matome_hukidasi_design',        //h4デザインをふきだしに変更
			'st_h4_matome_bg_radius'         => 'st_h4_matome_bg_radius',        //背景や吹き出しの角を丸くする
			'st_h4_matome_no_css'            => 'st_h4_matome_no_css',        //カスタマイザーのCSSを無効化

			//h5タグ
			'st_h5_textcolor'         => 'st_h5_textcolor',         //h5の文字色
			'st_h5bordercolor'        => 'st_h5bordercolor',        //h5のボーダー色
			'st_h5bgcolor'            => 'st_h5bgcolor',            //h5の背景色
			'st_h5_design'            => 'st_h5_design',            //h5デザインの変更
			'st_h5_top_border'        => 'st_h5_top_border',        //h5の上ボーダー
			'st_h5_bottom_border'     => 'st_h5_bottom_border',     //h5の下ボーダー
			'st_h5_border_size'       => 'st_h5_border_size',       //h5のボーダーの太さ
			'st_h5_bgimg_side'        => 'st_h5_bgimg_side',        //h5の背景画像の横位置
			'st_h5_bgimg_top'         => 'st_h5_bgimg_top',         //h5の背景画像の縦位置
			'st_h5_bgimg_repeat'      => 'st_h5_bgimg_repeat',      //h5の背景画像の繰り返し
			'st_h5_bgimg_leftpadding' => 'st_h5_bgimg_leftpadding', //h5の背景画像の左の余白
			'st_h5_bgimg_tupadding'   => 'st_h5_bgimg_tupadding',   //h5の背景画像の上下の余白
			'st_h5hukidasi_design'    => 'st_h5hukidasi_design',    //h5デザインをふきだしに変更
			'st_h5_bg_radius'         => 'st_h5_bg_radius',         //背景や吹き出しの角を丸くする
			'st_h5_no_css'            => 'st_h5_no_css',            //カスタマイザーのCSSを無効化
			'st_h5_husen_shadow'            => 'st_h5_husen_shadow',        //ふせん風の影をつける

			'st_blockquote_color'      => 'st_blockquote_color',      //引用部分の背景色
			'st_blockquote_icon_color' => 'st_blockquote_icon_color', //引用部分のアイコン・ライン

			'menu_separator_color'     => 'st_separator_color',       //NEW ENTRYのテキスト色
			'menu_separator_bgcolor'   => 'st_separator_bgcolor',     //NEW ENTRYの背景色
			'st_separator_bordercolor' => 'st_separator_bordercolor', //NEW ENTRYのボーダー色
			'st_separator_type'        => 'st_separator_type',        //デザインパターン

			'st_catbg_color'   => 'st_catbg_color',   //カテゴリーの背景色
			'st_cattext_color' => 'st_cattext_color', //カテゴリーのテキスト色
			'st_cattext_radius' => 'st_cattext_radius', //角を丸くする

			// 広告
			'st_ad_display_bg_color'   => 'st_ad_display_bg_color', //広告の背景色
			'st_ad_display_text_color' => 'st_ad_display_text_color', //広告のテキスト色
			'st_ad_display_style'      => 'st_ad_display_style', //広告のスタイル

			//お知らせ
			'menu_news_datecolor'     => 'st_news_datecolor',            //お知らせ日付のテキスト色
			'menu_news_text_color'    => 'st_news_text_color',           //お知らせのテキストと下線色
			'menu_newsbarcolor_t'     => 'st_menu_newsbarcolor_t',       //お知らせの背景色上
			'menu_newsbarcolor'       => 'st_menu_newsbarcolor',         //お知らせの背景色下
			'menu_newsbarbordercolor' => 'st_menu_newsbar_border_color', //お知らせのボーダー色
			'menu_newsbartextcolor'   => 'st_menu_newsbartextcolor',     //お知らせのテキスト色
			'st_menu_newsbgcolor'     => 'st_menu_newsbgcolor',          //お知らせの全体背景色

			//メニュー
			'menu_navbar_topunder_color' => 'st_menu_navbar_topunder_color', //メニューの上下ボーダー色
			'menu_navbar_side_color'     => 'st_menu_navbar_side_color',     //メニューの左右ボーダー色
			'menu_navbar_right_color'    => 'st_menu_navbar_right_color',    //メニューの右ボーダー色
			'menu_navbarcolor'           => 'st_menu_navbarcolor',           //メニューの背景色下
			'menu_navbarcolor_t'         => 'st_menu_navbarcolor_t',         //メニューの背景色上
			'menu_navbartextcolor'       => 'st_menu_navbartextcolor',       //PCメニューテキスト色
			'st_menu_bold'               => 'st_menu_bold',                  //第一階層メニューを太字にする
			'st_menu100'                 => 'st_menu100',                    //PCメニュー100%
			'st_menu_center'             => 'st_menu_center',                //メニューをセンター寄せにする
			'st_menu_width'              => 'st_menu_width',                 //PCメニューの幅
			'st_menu_padding'            => 'st_menu_padding',               //PCメニューの上下に隙間
			'st_navbarcolor_gradient'    => 'st_navbarcolor_gradient',       //グラデーションを横向きにする

			'st_headermenu_bgimg_side'           => 'st_headermenu_bgimg_side',   //ヘッダーメニューの背景画像の横位置
			'st_headermenu_bgimg_top'            => 'st_headermenu_bgimg_top',    //ヘッダーメニューの背景画像の縦位置
			'st_headermenu_bgimg_repeat'         => 'st_headermenu_bgimg_repeat', //ヘッダーメニューの背景画像の繰り返し
			'st_menu_navbar_front_exclusion_set' => 'st_menu_navbar_front_exclusion_set',       //背景色及び画像をトップページのみ除外する（第一階層）

			'st_sidemenu_bgimg_side'        => 'st_sidemenu_bgimg_side',        //サイドメニュー第一階層の背景画像の横位置
			'st_sidemenu_bgimg_top'         => 'st_sidemenu_bgimg_top',         //サイドメニュー第一階層の背景画像の縦位置
			'st_sidemenu_bgimg_repeat'      => 'st_sidemenu_bgimg_repeat',      //サイドメニュー第一階層の背景画像の繰り返し
			'st_sidemenu_bgimg_leftpadding' => 'st_sidemenu_bgimg_leftpadding', //サイドメニュー第一階層の背景画像の左の余白
			'st_sidemenu_bgimg_tupadding'   => 'st_sidemenu_bgimg_tupadding',   //サイドメニュー第一階層の背景画像の上下の余白

			'st_sidebg_bgimg_side'   => 'st_sidebg_bgimg_side',   //サイドメニューの背景画像の横位置
			'st_sidebg_bgimg_top'    => 'st_sidebg_bgimg_top',    //サイドメニューの背景画像の縦位置
			'st_sidebg_bgimg_repeat' => 'st_sidebg_bgimg_repeat', //サイドメニューの背景画像の繰り返し

			'st_header_top_bgcolor'      => 'st_header_top_bgcolor',   //ヘッダー画像上の背景色
			'st_header_top_bgcolor_g'    => 'st_header_top_bgcolor_g', //ヘッダー画像上の背景色（右）
			'st_header_top_textcolor'    => 'st_header_top_textcolor', //ヘッダー画像上のテキスト色
			'st_header_top_stripe'       => 'st_header_top_stripe',    //ストライプデザインに変更（※要背景色）
			'st_header_info_100'         => 'st_header_info_100', //横幅を100%にする

			'st_header_under_bgcolor'       => 'st_header_under_bgcolor',      //ヘッダー画像下の背景色
			'st_header_under_image_side'    => 'st_header_under_image_side',   //ヘッダー画像下の背景画像の横位置
			'st_header_under_image_top'     => 'st_header_under_image_top',    //ヘッダー画像下の背景画像の縦位置
			'st_header_under_image_repeat'  => 'st_header_under_image_repeat', //ヘッダー画像下の背景画像の繰り返し
			'st_header_under_image_flex'    => 'st_header_under_image_flex',   //ヘッダー画像下の背景画像のレスポンシブ化
			'st_header_under_image_dark'    => 'st_header_under_image_dark',   //ヘッダー画像下の背景を暗くする
			'st_header_under_100'           => 'st_header_under_100',          //横幅を100%にする

			'st_header_card_bgcolor'       => 'st_header_card_bgcolor',      //ヘッダーバナーの背景色
			'st_header_card_image_side'    => 'st_header_card_image_side',   //ヘッダーバナーの背景画像の横位置
			'st_header_card_image_top'     => 'st_header_card_image_top',    //ヘッダーバナーの背景画像の縦位置
			'st_header_card_image_repeat'  => 'st_header_card_image_repeat', //ヘッダーバナーの背景画像を繰り返さない
			'st_header_card_image_flex'    => 'st_header_card_image_flex',   //ヘッダーバナー背景画像を幅100%のレスポンシブにする

			'st_headerimg100'             => 'st_headerimg100',             //ヘッダー画像100%
			'st_header_height'            => 'st_header_height',            //ヘッダー画像エリアの高さ
			'st_header_height_sp'         => 'st_header_height_sp',         //ヘッダー画像エリアの高さ（599px以下）
			'st_header_height_vh'         => 'st_header_height_vh',         //ヘッダー画像エリアの高さ（画面サイズ）
			'st_header_bgcolor'           => 'st_header_bgcolor',           //ヘッダー画像の背景色
			'st_topgabg_image_side'       => 'st_topgabg_image_side',       //ヘッダー画像の背景画像の横位置
			'st_topgabg_image_top'        => 'st_topgabg_image_top',        //ヘッダー画像の背景画像の縦位置
			'st_topgabg_image_repeat'     => 'st_topgabg_image_repeat',     //ヘッダー画像の背景画像の繰り返し
			'st_topgabg_image_flex'       => 'st_topgabg_image_flex',       //ヘッダー画像の背景画像のレスポンシブ化
			'st_topgabg_image_fix'        => 'st_topgabg_image_fix',        //パララックス効果
			'st_topgabg_image_sumahoonly' => 'st_topgabg_image_sumahoonly', //ヘッダー画像の背景画像をスマホとタブレットのみに

			'menu_navbar_undercolor'  => 'st_menu_navbar_undercolor', //PCドロップダウン下層メニュー背景

			//サイドメニューウィジェット
			'st_menu_side_widgets_topunder_color' => 'st_menu_side_widgets_topunder_color',        //サイドメニューウィジェットのボーダー色
			'st_menu_side_widgetscolor'           => 'st_menu_side_widgetscolor',        //サイドメニューウィジェットの背景色下
			'st_menu_side_widgetscolor_t'         => 'st_menu_side_widgetscolor_t',        //サイドメニューウィジェットの背景色上
			'st_menu_side_widgetstextcolor'       => 'st_menu_side_widgetstextcolor', //サイドメニューウィジェットテキスト色
			'st_menu_icon'            => 'st_menu_icon',            //メニュー第一階層のWebアイコン
			'st_undermenu_icon'       => 'st_undermenu_icon',       //メニュー第二階層のWebアイコン
			'st_menu_icon_color'      => 'st_menu_icon_color',      //メニュー第一階層のWebアイコンカラー
			'st_undermenu_icon_color' => 'st_undermenu_icon_color', //メニュー第二階層のWebアイコンカラー
			'st_sidemenu_fontsize'    => 'st_sidemenu_fontsize',    //第一階層メニューの文字サイズを大きくする
			'st_sidemenu_accordion'   => 'st_sidemenu_accordion',   //第二階層以下をスライドメニューにする
			'st_sidemenu_gradient'            => 'st_sidemenu_gradient',        //グラデーションを横向きにする

			'st_side_bgcolor' => 'st_side_bgcolor', //サイドバー（中部）エリアの背景色
			'st_stdata29'     => 'st_stdata29',     //サイドバーを左にする

			'menu_pagelist_childtextcolor'         => 'st_menu_pagelist_childtextcolor',         //サイドメニュー下層のテキスト色
			'menu_pagelist_bgcolor'                => 'st_menu_pagelist_bgcolor',                //サイドメニュー下層の背景色
			'menu_pagelist_childtext_border_color' => 'st_menu_pagelist_childtext_border_color', //サイドメニュー下層の下線色

			//ウィジェットタイトル
			'st_widgets_title_color'             => 'st_widgets_title_color',              //ウィジェットタイトルのテキスト色
			'st_widgets_title_bgcolor'           => 'st_widgets_title_bgcolor',            //ウィジェットタイトルの背景色
			'st_widgets_title_bgcolor_t'         => 'st_widgets_title_bgcolor_t',          //ウィジェットタイトルの背景色上部
			'st_widgets_titleborder_color'       => 'st_widgets_titleborder_color',        //ウィジェットタイトルのボーダー色
			'st_widgets_titleborder_undercolor'  => 'st_widgets_titleborder_undercolor',   //ウィジェットタイトルのボーダー色（2色アンダーライン）
			'st_widgets_titleborder_size'        => 'st_widgets_titleborder_size',         //ウィジェットタイトルの太さ
			'st_widgets_title_designsetting'     => 'st_widgets_title_designsetting',      //ウィジェットタイトルデザインの変更
			'st_widgets_title_bgimg_side'        => 'st_widgets_title_bgimg_side',         //ウィジェットタイトルの背景画像の横位置
			'st_widgets_title_bgimg_top'         => 'st_widgets_title_bgimg_top',          //ウィジェットタイトルの背景画像の縦位置
			'st_widgets_title_bgimg_repeat'      => 'st_widgets_title_bgimg_repeat',       //ウィジェットタイトルの背景画像の繰り返し
			'st_widgets_title_bgimg_leftpadding' => 'st_widgets_title_bgimg_leftpadding',  //ウィジェットタイトルの背景画像の左の余白
			'st_widgets_title_bgimg_tupadding'   => 'st_widgets_title_bgimg_tupadding',    //ウィジェットタイトルの背景画像の上下の余白
			'st_widgets_title_bg_radius'         => 'st_widgets_title_bg_radius',          //背景や吹き出しの角を丸くする

			'st_tagcloud_color'        => 'st_tagcloud_color', //タグクラウドテキスト色
			'st_tagcloud_bordercolor'  => 'st_tagcloud_bordercolor', //タグクラウドボーダー色
			'st_tagcloud_bgcolor'      => 'st_tagcloud_bgcolor', //タグクラウド背景色
			'menu_rsscolor'            => 'st_rss_color',            //RSSボタン

			'st_search_form_text'            => 'st_search_form_text',          // 検索フォーム内のテキスト
			'st_search_form_border_color'    => 'st_search_form_border_color',  // 検索フォームの枠線
			'st_search_form_border_width'    => 'st_search_form_border_width',  // 検索フォームの枠線の太さ
			'st_search_form_bg_color'        => 'st_search_form_bg_color',      // 検索フォームの背景色
			'st_search_form_text_color'      => 'st_search_form_text_color',    // 検索フォーム内の文字色
			'st_search_form_icon_color'      => 'st_search_form_icon_color',    // 検索アイコンの色
			'st_search_form_icon_bg_color'   => 'st_search_form_icon_bg_color', // 検索アイコンの背景色
			'st_search_form_border_radius'   => 'st_search_form_border_radius', // 検索フォームの丸み（px）
			'st_search_form_font_size'       => 'st_search_form_font_size',     // 文字・アイコンサイズ（px）
			'st_search_form_padding_lr'      => 'st_search_form_padding_lr',    // 左右の余白（px）
			'st_search_form_padding_tb'      => 'st_search_form_padding_tb',    // 上下の余白（px）

			'st_search_form_btn_border_color'    => 'st_search_form_btn_border_color',  // 検索ボタンの枠線の色
			'st_search_form_btn_border_width'    => 'st_search_form_btn_border_width',  // 検索ボタンの枠線の太さ
			'st_search_form_btn_bg_color'        => 'st_search_form_btn_bg_color',      // 検索ボタンの背景色
			'st_search_form_btn_shadow_color'    => 'st_search_form_btn_shadow_color',  // 検索ボタンの影色
			'st_search_form_btn_text_color'      => 'st_search_form_btn_text_color',    // 検索ボタン内の文字色
			'st_search_form_btn_font_weight'     => 'st_search_form_btn_font_weight',   // 検索ボタン内の文字を太字
			'st_search_form_btn_border_radius'   => 'st_search_form_btn_border_radius', // 検索フォームの丸み（px）
			'st_search_form_btn_font_size'       => 'st_search_form_btn_font_size',     // 文字・アイコンサイズ（px）
			'st_search_form_btn_padding_lr'      => 'st_search_form_btn_padding_lr',    // 左右の余白（px）
			'st_search_form_btn_padding_tb'      => 'st_search_form_btn_padding_tb',    // 上下の余白（px）

			'st_sns_btn'     => 'st_sns_btn',     //SNSボタン背景
			'st_sns_btntext' => 'st_sns_btntext', //SNSボタンテキスト

			'st_formbtn_textcolor'   => 'st_formbtn_textcolor',   //ウィジェット問合せフォームのテキスト色
			'st_formbtn_bordercolor' => 'st_formbtn_bordercolor', //ウィジェット問合せフォームのボーダー色
			'st_formbtn_bgcolor_t'   => 'st_formbtn_bgcolor_t',   //ウィジェット問合せフォームの背景色上部
			'st_formbtn_bgcolor'     => 'st_formbtn_bgcolor',     //ウィジェット問合せフォームの背景色
			'st_formbtn_radius'      => 'st_formbtn_radius',      //ウィジェット問合せフォームの角を丸くする

			'st_formbtn2_textcolor'   => 'st_formbtn2_textcolor',   //ウィジェッオリジナルボタンのテキスト色
			'st_formbtn2_bordercolor' => 'st_formbtn2_bordercolor', //ウィジェットオリジナルボタンのボーダー色
			'st_formbtn2_bgcolor_t'   => 'st_formbtn2_bgcolor_t',   //ウィジェッオリジナルボタンの背景色
			'st_formbtn2_bgcolor'     => 'st_formbtn2_bgcolor',     //ウィジェッオリジナルボタンの背景色
			'st_formbtn2_radius'      => 'st_formbtn2_radius',      //ウィジェッオリジナルボタンの角を丸くする

			'st_contactform7btn_textcolor' => 'st_contactform7btn_textcolor', //コンタクトフォーム7の送信ボタンテキスト色
			'st_contactform7btn_bgcolor'   => 'st_contactform7btn_bgcolor',   //コンタクトフォーム7の送信ボタンの背景色

			//任意記事
			'menu_osusumemidasitextcolor' => 'st_menu_osusumemidasitextcolor', //任意記事の見出しテキスト色
			'menu_osusumemidasicolor'     => 'st_menu_osusumemidasicolor',     //任意記事の見出し背景色
			'menu_osusumemidasinocolor'   => 'st_menu_osusumemidasinocolor',   //任意記事のナンバー色
			'menu_osusumemidasinobgcolor' => 'st_menu_osusumemidasinobgcolor', //任意記事のナンバー背景色
			'menu_popbox_color'           => 'st_menu_popbox_color',           //任意記事の背景色
			'menu_popbox_textcolor'       => 'st_menu_popbox_textcolor',       //任意記事のテキスト色
			'st_nohidden'                 => 'st_nohidden',                    //任意記事のナンバー削除

			//こんな方におすすめ（ver20240520で設定削除済み）
			'st_blackboard_textcolor'   => 'st_blackboard_textcolor', //枠線とタイトル下線
			'st_blackboard_bordercolor' => 'st_blackboard_bordercolor', //ulリストの下線
			'st_blackboard_bgcolor'     => 'st_blackboard_bgcolor',     //背景色
			'st_blackboard_mokuzicolor'   => 'st_blackboard_mokuzicolor', //タイトル色
			'st_blackboard_title_bgcolor'   => 'st_blackboard_title_bgcolor', //タイトル背景色
			'st_blackboard_list3_fontweight'   => 'st_blackboard_list3_fontweight', //タイトル下線を非表示
			'st_blackboard_underbordercolor'   => 'st_blackboard_underbordercolor', //ulリストのチェックアイコン
			'st_blackboard_webicon'   => 'st_blackboard_webicon', //Webアイコン（Font Awesome）

			//フリーボックスウィジェット
			'freebox_tittle_textcolor' => 'st_freebox_tittle_textcolor', //フリーボックスウィジェットの見出しテキスト色
			'freebox_tittle_color'     => 'st_freebox_tittle_color',     //フリーボックスウィジェットの見出背景色
			'freebox_color'            => 'st_freebox_color',            //フリーボックスウィジェットの背景色
			'freebox_textcolor'        => 'st_freebox_textcolor',        //フリーボックスウィジェットのテキスト色

			//メモボックス
			'st_memobox_color' => 'st_memobox_color', //文字・ボーダー色
			//スライドボックス
			'st_slidebox_color' => 'st_slidebox_color', //背景色

			//スマホサイズ
			'menu_sumartmenutextcolor'             => 'st_menu_sumartmenutextcolor', //スマホメニュー文字色
			'st_menu_sumartmenubordercolor'        => 'st_menu_sumartmenubordercolor', //スマホメニューボーダー
			'st_menu_smartbar_bg_color'            => 'st_menu_smartbar_bg_color',     //スマホメニュー背景色
			'st_menu_smartbar_bg_color_t'          => 'st_menu_smartbar_bg_color_t', //スマホメニューバー背景色（グラデーション上部）
			'st_menu_smartbar_bg_image_side'       => 'st_menu_smartbar_bg_image_side', //スマホメニューバー背景画像の横位置
			'st_menu_smartbar_bg_image_top'        => 'st_menu_smartbar_bg_image_top', //スマホメニューバー背景画像の縦位置
			'st_menu_smartbar_bg_image_repeat'     => 'st_menu_smartbar_bg_image_repeat',    //スマホメニューバー背景画像の繰り返し
			'st_menu_smartbar_bg_image_cover'      => 'st_menu_smartbar_bg_image_cover',    //背景画像を幅100%のレスポンシブにする
			'st_menu_smartbar_front_exclusion_set' => 'st_menu_smartbar_front_exclusion_set',         //背景色及び画像をトップページのみ除外する

			'menu_sumart_bg_color'        => 'st_menu_sumart_bg_color',     //スマホメニューOPアイコン背景色
			'menu_sumartbar_bg_color'     => 'st_menu_sumartbar_bg_color',  //スマホメニューバーエリア内背景色
			'menu_sumartcolor'            => 'st_menu_sumartcolor',         //スマホwebアイコン
			'st_menu_faicon'              => 'st_menu_faicon',              //メニューのWebアイコンを非表示
			'st_search_slide_sumartbar_bg_color'   => 'st_search_slide_sumartbar_bg_color',        //スマホ検索メニュー背景色
			'st_sticky_menu'              => 'st_sticky_menu',              //スマホメニューfix
			'st_sticky_menu_alpha_bgcolor' => 'st_sticky_menu_alpha_bgcolor',   //スマホメニューカラーフィルター
			'st_sticky_menu_bg_alpha'      => 'st_sticky_menu_bg_alpha',        //スマホメニュー透過レベル
			'st_sticky_primary_menu_side' => 'st_sticky_primary_menu_side', //スクロールで内容対象をヘッダーメニュー（横列）に変更
 			'st_slidemenubg_image_side'   => 'st_slidemenubg_image_side',   //スライドメニューの背景画像の横位置
			'st_slidemenubg_image_top'    => 'st_slidemenubg_image_top',    //スライドメニューの背景画像の縦位置
			'st_slidemenubg_image_repeat' => 'st_slidemenubg_image_repeat', //スライドメニューの背景画像の繰り返し
			'st_slidemenubg_image_flex'   => 'st_slidemenubg_image_flex',   //スライドメニューの背景画像を幅100%のレスポンシブにする

			//スマホミドルメニュー
			'st_middle_sumartmenutextcolor' => 'st_middle_sumartmenutextcolor', //文字色
			'st_middle_sumartmenubordercolor' => 'st_middle_sumartmenubordercolor', //ボーダー
			'st_middle_sumart_bg_color'     => 'st_middle_sumart_bg_color', //背景色
			'st_middle_sumart_bg_color_t'     => 'st_middle_sumart_bg_color_t', //背景色（上部）
			'st_middle_sumartmenu_space'     => 'st_middle_sumartmenu_space', //周りに余白

			'menu_sumart_st_bg_color'  => 'st_menu_sumart_st_bg_color',  //追加スマホメニュー背景色
			'menu_sumart_st_color'     => 'st_menu_sumart_st_color',     //追加スマホwebアイコン色
			'menu_sumart_st2_bg_color' => 'st_menu_sumart_st2_bg_color', //追加スマホメニュー背景色2
			'menu_sumart_st2_color'    => 'st_menu_sumart_st2_color',    //追加スマホwebアイコン色2
			'st_menu_sumart_footermenu_text_color'    => 'st_menu_sumart_footermenu_text_color', //スマホフッターメニューテキスト色
			'st_menu_sumart_footermenu_bg_color'    => 'st_menu_sumart_footermenu_bg_color', //スマホフッターメニュー背景色
			'st_menu_sumart_footermenu_fontawesome'    => 'st_menu_sumart_footermenu_fontawesome', //アイコンサイズ(%)

			//ガイドメニュー
			'st_guidemenu_bg_color'     => 'st_guidemenu_bg_color', //背景色（第一階層）
			'st_guidemenu_radius'       => 'st_guidemenu_radius', //角を丸くする
			'st_guidemenutextcolor'     => 'st_guidemenutextcolor', //テキスト色（第一階層）
			'st_guidemenutextcolor2'    => 'st_guidemenutextcolor2', //テキスト色（第二階層以下）
			'st_guide_bg_color'         => 'st_guide_bg_color', //背景色（記事内用タグのみ）

			//ボックスメニュー
			'st_boxnavimenu_color'        => 'st_boxnavimenu_color', //テキスト色
			'st_boxnavimenu_bg_color'     => 'st_boxnavimenu_bg_color', //背景色
			'st_boxnavimenu_bordercolor'  => 'st_boxnavimenu_bordercolor', //ボーダー色
			'st_boxnavimenu_fontawesome'  => 'st_boxnavimenu_fontawesome', //アイコンサイズ（%）

			//Webアイコン
			'st_webicon_question'        => 'st_webicon_question',         //はてな
			'st_webicon_check'           => 'st_webicon_check',            //チェック
			'st_webicon_checkbox'        => 'st_webicon_checkbox',         //チェックボックス
			'st_webicon_checkbox_square' => 'st_webicon_checkbox_square',  //チェックボックス（枠）
			'st_webicon_checkbox_size'   => 'st_webicon_checkbox_size',    //チェックボックス（サイズ）
			'st_webicon_checkbox_simple' => 'st_webicon_checkbox_simple',  // チェックボックスのデザインをチェックのみにする
			'st_webicon_exclamation'     => 'st_webicon_exclamation',      //エクステンション
			'st_webicon_memo'            => 'st_webicon_memo',             //メモ
			'st_webicon_user'            => 'st_webicon_user',             //人物
			'st_webicon_oukan'           => 'st_webicon_oukan',            //王冠
			'st_webicon_bigginer'        => 'st_webicon_bigginer',         // 初心者マーク

			//サイト管理者紹介
			'st_author_basecolor'          => 'st_author_basecolor',   //「サイト管理者紹介」の基本カラー
			'st_author_bg_color'           => 'st_author_bg_color',   //「サイト管理者紹介」の背景カラー

			'st_author_profile'               => 'st_author_profile',   //「旧プロフィールカード」に変更
			'st_author_bg_color_profile'      => 'st_author_bg_color_profile',   //「プロフィールカード」の背景カラー
			'st_author_basecolor_profile'     => 'st_author_basecolor_profile',   //「プロフィールカード」のボーダーカラー
			'st_author_text_color_profile'    => 'st_author_text_color_profile',   //「プロフィールカード」のテキストカラー
			'st_author_profile_shadow'        => 'st_author_profile_shadow',   //「プロフィールカード」影をつける
			'st_author_profile_avatar_shadow' => 'st_author_profile_avatar_shadow',   //「プロフィールカード」アバター画像に影をつける
			'st_author_profile_radius'        => 'st_author_profile_radius',   //「プロフィールカード」角丸にする

			'st_author_profile_btn_url'    => 'st_author_profile_btn_url',   //「プロフィールカード」のボタンURL
			'st_author_profile_btn_text'   => 'st_author_profile_btn_text',   //「プロフィールカード」のボタンテキスト
			'st_author_profile_btn_text_color'    => 'st_author_profile_btn_text_color',   //「プロフィールカード」のボタンテキストカラー
			'st_author_profile_btn_top'    => 'st_author_profile_btn_top',   //「プロフィールカード」のボタン上部
			'st_author_profile_btn_bottom' => 'st_author_profile_btn_bottom',   //「プロフィールカード」のボタン下部
			'st_author_profile_btn_shadow' => 'st_author_profile_btn_shadow',   //「プロフィールカード」のボタン影

			//一覧のサムネイル画像の枠線
			'st_thumbnail_bordercolor'        => 'st_thumbnail_bordercolor',   //一覧のサムネイル画像の枠線
			//記事一覧の区切りボーダー
			'st_kanren_bordercolor' => 'st_kanren_bordercolor',   // ボーダーカラー
			'st_kanren_border_dashed' => 'st_kanren_border_dashed',   // 破線にするー
			//ページャーとPREV NEXTリンク
			'st_pagination_bordercolor' => 'st_pagination_bordercolor',   // カラー

			//ページトップボタン
			'st_pagetop_up'          => 'st_pagetop_up',   //TOPに戻るボタンの配置を上にする
			'st_pagetop_circle'      => 'st_pagetop_circle', //ページトップボタンを丸くする
			'st_pagetop_text'        => 'st_pagetop_text', //ページトップボタンをテキストにする
			'st_pagetop_bgcolor'     => 'st_pagetop_bgcolor',     //背景色
			'st_pagetop_arrow_color' => 'st_pagetop_arrow_color', //矢印色
			'st_pagetop_img_right'   => 'st_pagetop_img_right',     //right（px）
			'st_pagetop_img_bottom'  => 'st_pagetop_img_bottom',     //bottom（px）
			'st_pagetop_hidden'      => 'st_pagetop_hidden',     //ページトップボタンを非表示

			//すごいもくじ
			'st_toc_textcolor'           => 'st_toc_textcolor',   //文字色
			'st_toc_text2color'          => 'st_toc_text2color', //文字色2
			'st_toc_bordercolor'         => 'st_toc_bordercolor', //ボーダー色
			'st_toc_mokuzi_left'         => 'st_toc_mokuzi_left', //目次タイトルを左寄せにする
			'st_toc_bgcolor'             => 'st_toc_bgcolor',     //背景色
			'st_toc_list_icon_base'      => 'st_toc_list_icon_base', //リスト数字・アイコン
			'st_toc_mokuzicolor'         => 'st_toc_mokuzicolor', //目次色
			'st_toc_mokuzi_border'       => 'st_toc_mokuzi_border', //目次タイトル下の下線
			'st_toc_list1_left'          => 'st_toc_list1_left', //第1リンクをセンター寄せにする
			'st_toc_list1_icon'          => 'st_toc_list1_icon', //第3リンク以降をアイコンに変更
			'st_toc_list1_number'        => 'st_toc_list1_number', //第1リンクの数字を表示
			'st_toc_list2_icon'          => 'st_toc_list2_icon', //第2リンクのアイコン非表示
			'st_toc_list3_fontweight'    => 'st_toc_list3_fontweight', //第2リンク太字
			'st_toc_list3_icon'          => 'st_toc_list3_icon', //第3リンク以降の数字（アイコン）を非表示にして並列
			'st_toc_underbordercolor'    => 'st_toc_underbordercolor', //下線と第4リストアイコン
			'st_toc_webicon'             => 'st_toc_webicon', //Webアイコン（Font Awesome）
			'st_toc_radius'              => 'st_toc_radius', //背景を角丸にする
			'st_toc_list_style'          => 'st_toc_list_style', //リストスタイル
			'st_toc_only_toc_fontweight' => 'st_toc_only_toc_fontweight', //第1階層のみの場合のリンクを太字にする
			'st_toc_border_width'        => 'st_toc_border_width', //ボーダーの太さ（px）

			//マル数字のカラー
			'st_maruno_textcolor'   => 'st_maruno_textcolor',   //ナンバー色
			'st_maruno_nobgcolor'   => 'st_maruno_nobgcolor',   //ナンバー背景色
			'st_maruno_bordercolor' => 'st_maruno_bordercolor', //囲いボーダー色
			'st_maruno_bgcolor'     => 'st_maruno_bgcolor',     //囲い背景色
			'st_maruno_radius'     => 'st_maruno_radius',     //背景色の角を丸くする

			//マルチェックのカラー
			'st_maruck_textcolor'   => 'st_maruck_textcolor',   //ナンバー色
			'st_maruck_nobgcolor'   => 'st_maruck_nobgcolor',   //ナンバー背景色
			'st_maruck_bordercolor' => 'st_maruck_bordercolor', //囲いボーダー色
			'st_maruck_bgcolor'     => 'st_maruck_bgcolor',     //囲い背景色
			'st_maruck_radius'      => 'st_maruck_radius',      //背景色の角を丸くする

			//マル・バツ
			'st_correct_list'   => 'st_correct_list', //マル
			'st_wrong_list'   => 'st_wrong_list',   //バツ

			//タイムライン
			'st_timeline_list_color'       => 'st_timeline_list_color',       //ラインカラー
			'st_timeline_list_now_color'   => 'st_timeline_list_now_color',   //ラインカラー（nowクラス）
			'st_timeline_list_bg_color'    => 'st_timeline_list_bg_color',    //背景色
			'st_timeline_list_color_count' => 'st_timeline_list_color_count', //カウントカラー
			'st_timeline_list_now_blink'   => 'st_timeline_list_now_blink',   //nowクラスの点滅

			//ブログカード
			'st_card_border_color'        => 'st_card_border_color', //枠線
			'st_card_border_size'         => 'st_card_border_size', //枠線のカラー
			'st_card_label_bgcolor'       => 'st_card_label_bgcolor', //ラベル背景色
			'st_card_label_textcolor'     => 'st_card_label_textcolor', //ラベルテキスト色
			'st_card_label_designsetting' => 'st_card_label_designsetting', //ラベルデザイン

			//ステップ
			'st_step_bgcolor' => 'st_step_bgcolor', //ステップ数の背景色
			'st_step_color'     => 'st_step_color', //ステップ数の色
			'st_step_text_color'     => 'st_step_text_color', //テキスト色
			'st_step_text_bgcolor' => 'st_step_text_bgcolor', //テキストの背景色
			'st_step_text_border_color'   => 'st_step_text_border_color', //ボーダー色
			'st_step_radius'   => 'st_step_radius', //角を丸くする

			//テーブルのカラー
			'st_table_bordercolor'  => 'st_table_bordercolor',  //表のボーダー色
			'st_table_cell_bgcolor' => 'st_table_cell_bgcolor', //偶数行のセルの色
			'st_table_td_bgcolor'   => 'st_table_td_bgcolor',   //縦一列目の背景色
			'st_table_td_textcolor' => 'st_table_td_textcolor', //縦一列目の文字色
			'st_table_td_bold'      => 'st_table_td_bold',      //縦一列目の太字
			'st_table_tr_bgcolor'   => 'st_table_tr_bgcolor',   //横一列目の背景色
			'st_table_tr_textcolor' => 'st_table_tr_textcolor', //横一列目の文字色
			'st_table_tr_bold'      => 'st_table_tr_bold',      //横一列目の太字
			'st_table_tr_all'      => 'st_table_tr_all',        //ヘッダーセクション未設定時の横一列目に反映する
			'st_table_td_center'      => 'st_table_td_center',  //「カラムを中央配置」設定時は上下中央にする

			//会話ふきだし
			'st_kaiwa_bgcolor'        => 'st_kaiwa_bgcolor', //会話統一ふきだし背景色
			'st_kaiwa2_bgcolor'       => 'st_kaiwa2_bgcolor', //会話2ふきだし背景色
			'st_kaiwa3_bgcolor'       => 'st_kaiwa3_bgcolor', //会話3ふきだし背景色
			'st_kaiwa4_bgcolor'       => 'st_kaiwa4_bgcolor', //会話4ふきだし背景色
			'st_kaiwa5_bgcolor'       => 'st_kaiwa5_bgcolor', //会話5ふきだし背景色
			'st_kaiwa6_bgcolor'       => 'st_kaiwa6_bgcolor', //会話6ふきだし背景色
			'st_kaiwa7_bgcolor'       => 'st_kaiwa7_bgcolor', //会話7ふきだし背景色
			'st_kaiwa8_bgcolor'       => 'st_kaiwa8_bgcolor', //会話8ふきだし背景色
			'st_kaiwa_no_border'      => 'st_kaiwa_no_border', //ボーダーなし
			'st_kaiwa_borderradius'   => 'st_kaiwa_borderradius', //ふきだしを角丸にしない
			'st_kaiwa_change_border'  => 'st_kaiwa_change_border', //ふきだしのカラーをボーダー（2px）に変更
			'st_kaiwa_change_border_bgcolor'  => 'st_kaiwa_change_border_bgcolor', //ふきだしのカラーをボーダー（2px）に変更した時の背景色
		);
	}
}

if ( !function_exists( 'st_create_theme_mod_var_array' ) ) {
	/**
	 * 初期値の設定を元に `get_theme_mod()` を呼び出し、変数展開用の配列を生成
	 *
	 * $_theme_mods  = st_get_plain_theme_mod_defaults();
	 * // あるいは、 プリセットを初期値とする場合は:
	 * // $_theme_mods  = st_get_preset_theme_mod_overrides(プリセット名);
	 * $_maps        = st_get_var_theme_mod_maps();
	 *
	 * extract( st_create_theme_mod_var_array($_theme_mods, $_maps), EXTR_OVERWRITE );
	 *
	 * で変数へ展開可
	 *
	 * @param array <string, string> $theme_mods_defaults theme_mod 名と初期値の組み合わせ
	 * @param array <string, string> $maps 変数名と、それに対応する theme_mod 名の組み合わせ
	 * @param array <string, string> $theme_mod_overrides 強制的に上書きする theme_mod 名と値の組み合わせ
	 *
	 * @return array<string, string> 変数名と theme_mod 値
	 */
	function st_create_theme_mod_var_array( $theme_mod_defaults, $maps, $theme_mod_overrides = array() ) {
		$vars = array();

		foreach ( $maps as $var_name => $theme_mod_name ) {
			$in_defaults  = array_key_exists( $theme_mod_name, $theme_mod_defaults );
			$in_overrides = array_key_exists( $theme_mod_name, $theme_mod_overrides );

			if ( !$in_defaults && !$in_overrides ) {
				continue;
			}

			// 強制的に上書き
			if ($in_overrides) {
				$vars[$var_name] = $theme_mod_overrides[$theme_mod_name];

				continue;
			}

			$vars[$var_name] = get_theme_mod( $theme_mod_name, $theme_mod_defaults[$theme_mod_name] );
		}

		return $vars;
	}
}

if ( !function_exists( 'st_get_theme_mod_defaults' ) ) {
	/**
	 * theme_mod の初期値を取得
	 *
	 * @param string|null $kantan_setting 簡単設定の値
	 *
	 * @return string<string, string>
	 */
	function st_get_theme_mod_defaults($kantan_setting = null) {
		$kantan_setting = ( $kantan_setting !== null ) ? $kantan_setting : st_get_kantan_setting();
		$defaults       = st_get_plain_theme_mod_defaults(); //デフォルト(カラー未設定)

		if ( !st_is_customizer_enabled() ) { //オリジナルカスタマイザーを使用しない
			return $defaults;
		}

		$preset_overrides = st_get_preset_theme_mod_overrides( st_get_preset_name() );
		$defaults         = array_merge( $defaults, $preset_overrides);

		switch (true) {
			//初期値として設定: 通常の初期値を、簡単設定で上書きしたものが初期値
			case ($kantan_setting === 'defaultcolor'):
				//初期値を上書き
				$defaults = array_merge($defaults, st_get_zentai_theme_mod_overrides());

				break;

			//全体に反映、メニューのみに反映、リセット、その他
			default:
				break;
		}

		return $defaults;
	}
}

if ( ! function_exists( '_st_customize_setting' ) ) {
	function _st_customize_settings( $settings = null ) {
		static $store = [];

		if ( $settings === null ) {
			return $store;
		}

		$store = $settings;
	}
}

if (!function_exists('_st_customization_add_color_controls')) {
	/** カラー設定 (カスタマイザー間で共有) を追加 */
	function _st_customization_add_color_controls(
		WP_Customize_Manager $wp_customize,
		$section,
		$priority = 10,
		$label = ''
	) {
		static $id = 1;

		if ( $id === 1 ) {
			$preset_colors  = st_get_preset_colors( st_get_preset_name() );

			/**
			 * @var string $basecolor 一番濃い色
			 * @var string $maincolor 少し薄い色
			 * @var string $subcolor とても薄い色
			 * @var string $accentcolor アクセント
			 * @var string $textcolor テキスト
			 */
			extract( $preset_colors, EXTR_OVERWRITE );

			//カラー設定 (カスタマイザー間で共有)
			$wp_customize->add_setting( 'st_key_patterncolor',
				array(
					'default'              => '',
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );

			$wp_customize->add_setting( 'st_main_patterncolor',
				array(
					'default'              => '',
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );

			$wp_customize->add_setting( 'st_sub_patterncolor',
				array(
					'default'              => '',
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );

			$wp_customize->add_setting( 'st_text_patterncolor',
				array(
					'default'              => '',
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
		}

		$suffix   = '_' . $id;
		$priority = 0;

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'st_key_patterncolor' . $suffix,
			array(
				'label'       => __( $label, 'affinger' ),
				'section'     => $section,
				'description' => 'キーカラー（推奨：一番濃い色）',
				'settings'    => 'st_key_patterncolor',
				'priority'    => $priority,
			)
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'st_main_patterncolor' . $suffix,
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => $section,
				'description' => 'メインカラー（推奨：少し薄い色）',
				'settings'    => 'st_main_patterncolor',
				'priority'    => $priority,
			)
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'st_sub_patterncolor' . $suffix,
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => $section,
				'description' => 'サブカラー（推奨：とても薄い色）',
				'settings'    => 'st_sub_patterncolor',
				'priority'    => $priority,
			)
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'st_text_patterncolor' . $suffix,
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => $section,
				'description' => 'テキスト（一部）',
				'settings'    => 'st_text_patterncolor',
				'priority'    => $priority,
			)
		) );

		$id ++;
	}
}

/**
 * @param WP_Customize_Manager $wp_customize カスタマイザー
 */
function st_customize_register( $wp_customize ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // プラグインの使用状況を確認
	$kantan_setting = st_get_previous_kantan_setting();
	$defaults       = st_get_theme_mod_defaults( $kantan_setting );
	$preset_colors  = st_get_preset_colors( st_get_preset_name() );

	/**
	 * @var string $basecolor 一番濃い色
	 * @var string $maincolor 少し薄い色
	 * @var string $subcolor とても薄い色
	 * @var string $accentcolor アクセント
	 * @var string $textcolor テキスト
	 */
	extract( $preset_colors, EXTR_OVERWRITE );

	$default_settings = $wp_customize->settings();

	/*-------------------------------------------------------
	 ロゴ画像
	-------------------------------------------------------*/
	$wp_customize->add_section( 'st_logo_image',
		array(
			'title'       => 'ロゴ画像',
			'priority'    => 23,
			'description' => '',
		) );

	$wp_customize->add_setting( 'st_logo_image',
		array(
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'logo_Image',
		array(
			'label'    => 'ロゴ画像',
			'section'  => 'st_logo_image',
			'settings' => 'st_logo_image',
		)
	) );

	$wp_customize->add_setting( 'st_footer_logo',
		array(
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'footer_logo',
		array(
			'label'       => '',
			'section'     => 'st_logo_image',
			'description' => 'フッターロゴ画像',
			'settings'    => 'st_footer_logo',
		)
	) );

	$wp_customize->add_setting( 'st_header_footer_logo',
		array(
			'default'           => $defaults['st_header_footer_logo'],
			'sanitize_callback' => 'sanitize_checkbox',
		) );
	$wp_customize->add_control( 'st_header_footer_logo',
		array(
			'section'     => 'st_logo_image',
			'settings'    => 'st_header_footer_logo',
			'label'       => 'ヘッダーロゴ画像を使用する',
			'description' => '',
			'type'        => 'checkbox',
		) );

		$wp_customize->add_setting( 'st_pc_logo_height',
			array(
				'default'           => $defaults['st_pc_logo_height'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_pc_logo_height_c',
			array(
				'section'     => 'st_logo_image',
				'settings'    => 'st_pc_logo_height',
				'label'       => '',
				'description' => 'ロゴの最大の高さ（px）',
				'type'        => 'option',
			) );

	$wp_customize->add_setting( 'st_mobile_logo',
		array(
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'mobile_logo',
		array(
			'label'       => 'スマホ ロゴ画像',
			'section'     => 'st_logo_image',

			'description' => 'PHP分岐のためカスタマイザーには反映されない項目がございます',
			'settings'    => 'st_mobile_logo',
		)
	) );

	$wp_customize->add_setting( 'st_mobile_logo_height',
		array(
			'default'           => $defaults['st_mobile_logo_height'],
			'sanitize_callback' => 'sanitize_int',

		) );
	$wp_customize->add_control( 'st_mobile_logo_height_c',
		array(
			'section'     => 'st_logo_image',
			'settings'    => 'st_mobile_logo_height',
			'label'       => '',
			'description' => 'スマホロゴの最大の高さ（px）',
			'type'        => 'option',
		) );

	$wp_customize->add_setting( 'st_mobile_logo_center',
		array(
			'default'           => $defaults['st_mobile_logo_center'],
			'sanitize_callback' => 'sanitize_checkbox',
		) );
	$wp_customize->add_control( 'st_mobile_logo_center',
		array(
			'section'     => 'st_logo_image',
			'settings'    => 'st_mobile_logo_center',
			'label'       => 'スマホロゴ（又はタイトル）を左寄せ',
			'description' => '',
			'type'        => 'checkbox',
		) );

	$wp_customize->add_setting( 'st_icon_logo',
		array(
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'icon_logo',
		array(
			'label'       => 'アイコンロゴ画像',
			'section'     => 'st_logo_image',
			'description' => 'サイトのタイトルの前に画像を設置します※ロゴ画像未使用時のみ',
			'settings'    => 'st_icon_logo',
		)
	) );

	$wp_customize->add_setting( 'st_icon_logo_width',
		array(
			'default'           => $defaults['st_icon_logo_width'],
			'sanitize_callback' => 'sanitize_int',

		) );
	$wp_customize->add_control( 'st_icon_logo_width_c',
		array(
			'section'     => 'st_logo_image',
			'settings'    => 'st_icon_logo_width',
			'label'       => '',
			'description' => 'PCアイコンロゴの最大の高さ（px）',
			'type'        => 'option',
		) );

	$wp_customize->add_setting( 'st_icon_logo_width_sp',
		array(
			'default'           => $defaults['st_icon_logo_width_sp'],
			'sanitize_callback' => 'sanitize_int',

		) );
	$wp_customize->add_control( 'st_icon_logo_width_sp_c',
		array(
			'section'     => 'st_logo_image',
			'settings'    => 'st_icon_logo_width_sp',
			'label'       => '',
			'description' => 'スマホアイコンロゴの最大の高さ（px）',
			'type'        => 'option',
		) );

		$wp_customize->add_setting( 'st_icon_logo_radius',
			array(
				'default'           => $defaults['st_icon_logo_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_icon_logo_radius',
			array(
				'section'     => 'st_logo_image',
				'settings'    => 'st_icon_logo_radius',
				'label'       => '丸くする（※正方形推奨）',
				'description' => '',
				'type'        => 'checkbox',
		) );

	/*-------------------------------------------------------
	ヘッダー画像
	-------------------------------------------------------*/
	$wp_customize->add_section( 'header_image',
		array(
			'title'    => 'ヘッダー画像',
			'priority' => 29,
			'description' => 'ヘッダー画像 / ヘッダー画像エリア（高さ・背景色・背景画像）',
		) );

	if ( st_is_customizer_enabled() ) {
		// _st_customization_add_color_controls( $wp_customize, 'header_image' );
	}

		/*ヘッダー画像100%*/
		$wp_customize->add_setting( 'st_headerimg100',
			array(
				'default'           => $defaults['st_headerimg100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_headerimg100',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_headerimg100',
				'label'       => 'ヘッダー画像の横幅を100%にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

	/*スマホヘッダー画像*/
	$wp_customize->add_setting( 'st_mobile_header',
		array(
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'mobile_header',
		array(
			'label'       => '',
			'section'     => 'header_image',
			'description' => 'スマホヘッダー画像',
			'settings'    => 'st_mobile_header',
		)
	) );

	if ( st_is_customizer_enabled() ) {

		//ヘッダー画像エリア
		$wp_customize->add_setting( 'st_header_height',
			array(
				'default'           => $defaults['st_header_height'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_header_height_c',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_header_height',
				'label'       => __( 'ヘッダー画像エリア', 'affinger' ),
				'description' => 'ヘッダー画像エリア最低の高さ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_header_height_sp',
			array(
				'default'           => $defaults['st_header_height_sp'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_header_height_sp_c',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_header_height_sp',
				'label'       => '',
				'description' => 'スマホ（599px以下）※高さを分ける場合',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_header_height_vh',
			array(
				'default'           => $defaults['st_header_height_vh'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_height_vh',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_header_height_vh',
				'label'       => 'トップページのヘッダー画像エリアの高さを画面サイズに応じて最大にする（β）※優先',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//ヘッダーナビゲーション背景色
		$wp_customize->add_setting( 'st_header_bgcolor',
			array(
				'default'              => $defaults['st_header_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_bgcolor', array(
			'label'       => '',
			'description' => 'ヘッダー画像エリアの背景色',
			'section'     => 'header_image',
			'settings' => 'st_header_bgcolor',
		) ) );

		//ヘッダー画像エリア背景画像

		$wp_customize->add_setting( 'st_topgabg_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'topga_Image',
			array(
				'label'       => '',
				'section'     => 'header_image',
				'description' => 'ヘッダー画像の後ろに配置する背景画像です（ヘッダー画像にpngなど透過性のある素材を利用すると重ねることが出来ます）',
				'settings'    => 'st_topgabg_image',
			)
		) );

		$wp_customize->add_setting( 'st_topgabg_image_side',
			array(
				'default'           => $defaults['st_topgabg_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_topgabg_image_side',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_topgabg_image_side',
				'label'       => '',
				'description' => '背景画像の横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_topgabg_image_top',
			array(
				'default'           => $defaults['st_topgabg_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_topgabg_image_top',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_topgabg_image_top',
				'label'       => '',
				'description' => '背景画像の縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_topgabg_image_repeat',
			array(
				'default'           => $defaults['st_topgabg_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_topgabg_image_repeat',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_topgabg_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_topgabg_image_flex',
			array(
				'default'           => $defaults['st_topgabg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_topgabg_image_flex',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_topgabg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_topgabg_image_fix',
			array(
				'default'           => $defaults['st_topgabg_image_fix'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_topgabg_image_fix',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_topgabg_image_fix',
				'label'       => 'パララックス（視差効果）風にする ※PCのみ',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_topgabg_image_sumahoonly',
			array(
				'default'           => $defaults['st_topgabg_image_sumahoonly'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_topgabg_image_sumahoonly',
			array(
				'section'     => 'header_image',
				'settings'    => 'st_topgabg_image_sumahoonly',
				'label'       => '背景画像をスマホ・タブレットのみにする',
				'description' => '',
				'type'        => 'checkbox',
			) );
	}

	/*-------------------------------------------------------
	背景画像
	-------------------------------------------------------*/
	// カラーフィルター
	$wp_customize->add_setting( 'st_body_alpha_bgcolor',
		array(
			'default'              => $defaults['st_body_alpha_bgcolor'],
			'sanitize_callback'    => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_body_alpha_bgcolor', array(
		'label'       => __( '', 'affinger' ),
		'description' => 'カラーフィルター',
		'section'     => 'background_image',
		'settings' => 'st_body_alpha_bgcolor',
	) ) );

	$wp_customize->add_setting( 'st_body_bg_alpha', array(
		'default'           => $defaults['st_body_bg_alpha'],
		'sanitize_callback' => 'st_sanitize_float',
	) );

	$wp_customize->add_control( 'st_body_bg_alpha', array(
		'section'     => 'background_image',
		'settings'    => 'st_body_bg_alpha',
		'label'       => __( '', 'affinger' ),
		'description' => '透過レベル',
		'type'        => 'range',
		'input_attrs' => array(
			'min'   => 0, // 最小値
			'max'   => 1, // 最大値
			'step'  => 0.1, // ステップ
		),
	) );

	if ( st_is_ver_ex() ):
		/*-------------------------------------------------------
		斜め背景画像
		-------------------------------------------------------*/

		/* 斜め背景画像 */
		$wp_customize->add_setting( 'st_tilt_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'st_tilt_bgimage',
			array(
				'label'       => '斜め背景画像（上部）',
				'section'     => 'background_image',
				'description' => '',
				'settings'    => 'st_tilt_image',
			)
		) );

		/* スマホ斜め背景画像 */
		$wp_customize->add_setting( 'st_tilt_image_mobile',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'st_tilt_bgimage_mobile',
			array(
				'label'       => '',
				'section'     => 'background_image',
				'description' => 'スマホ用',
				'settings'    => 'st_tilt_image_mobile',
			)
		) );

		/* 傾きの方向 */
		$wp_customize->add_setting( 'st_tilt_direction',
			array(
				'default'           => $defaults['st_tilt_direction'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_tilt_direction',
			array(
				'section'     => 'background_image',
				'settings'    => 'st_tilt_direction',
				'label'       => '',
				'description' => '傾き',
				'type'        => 'radio',
				'choices'     => array(
					''        => __( '右上がり', 'affinger' ),
					'left'  => __( '左上がり', 'affinger' ),
				),
			) );

		//傾きの高さ
		$wp_customize->add_setting( 'st_tilt_height',
			array(
				'default'           => $defaults['st_tilt_height'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_tilt_height_c',
			array(
				'section'     => 'background_image',
				'settings'    => 'st_tilt_height',
				'label'       => '',
				'description' => '傾きの高さ（100～1%）',
				'type'        => 'option',
		) );

		/* 暗くする */
		$wp_customize->add_setting( 'st_tilt_brightness',
			array(
				'default'           => $defaults['st_tilt_brightness'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_tilt_brightness',
			array(
				'section'     => 'background_image',
				'settings'    => 'st_tilt_brightness',
				'label'       => '',
				'description' => '暗くする（下部共通）',
				'type'        => 'radio',
				'choices'     => array(
					''        => __( 'しない', 'affinger' ),
					'8'  => __( '20%', 'affinger' ),
					'5'        => __( '50%', 'affinger' ),
					'2'  => __( '80%', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_tilt_bgcolor',
			array(
				'default'              => $defaults['st_tilt_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_tilt_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'background_image',
			'settings' => 'st_tilt_bgcolor',
		) ) );

		/** 下部 */

		/* 斜め背景画像 */
		$wp_customize->add_setting( 'st_tilt_image_btm',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'st_tilt_bgimage_btm',
			array(
				'label'       => '斜め背景画像（下部）',
				'section'     => 'background_image',
				'description' => '',
				'settings'    => 'st_tilt_image_btm',
			)
		) );

		/* スマホ斜め背景画像 */
		$wp_customize->add_setting( 'st_tilt_image_mobile_btm',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'st_tilt_bgimage_mobile_btm',
			array(
				'label'       => '',
				'section'     => 'background_image',
				'description' => 'スマホ用',
				'settings'    => 'st_tilt_image_mobile_btm',
			)
		) );

		/* 傾きの方向 */
		$wp_customize->add_setting( 'st_tilt_direction_btm',
			array(
				'default'           => $defaults['st_tilt_direction_btm'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_tilt_direction_btm',
			array(
				'section'     => 'background_image',
				'settings'    => 'st_tilt_direction_btm',
				'label'       => '',
				'description' => '傾き',
				'type'        => 'radio',
				'choices'     => array(
					''        => __( '右上がり', 'affinger' ),
					'left'  => __( '左上がり', 'affinger' ),
				),
			) );

		//傾きの高さ
		$wp_customize->add_setting( 'st_tilt_height_btm',
			array(
				'default'           => $defaults['st_tilt_height_btm'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_tilt_height_btm_c',
			array(
				'section'     => 'background_image',
				'settings'    => 'st_tilt_height_btm',
				'label'       => '',
				'description' => '傾きの高さ（1～100%）',
				'type'        => 'option',
		) );

		$wp_customize->add_setting( 'st_tilt_bgcolor_btm',
			array(
				'default'              => $defaults['st_tilt_bgcolor_btm'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_tilt_bgcolor_btm', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'background_image',
			'settings' => 'st_tilt_bgcolor_btm',
		) ) );

	endif;

	/*-------------------------------------------------------
		背景
	-------------------------------------------------------*/
	if ( st_is_customizer_enabled() ) { // カスタマイザー有効化の有無

		$wp_customize->add_panel( 'st_panel_base_background', // 大パネル
			array(
				'title'       => __( '背景', 'affinger' ),
				'description' => '',
				'priority'    => 21,
			) );

		$wp_customize->add_section('color_controls_base_background', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_base_background',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_base_background' );

		$wp_customize->add_section('background_image', array( // 中パネル
			'title' => '背景画像',
			'panel' => 'st_panel_base_background',
		));

		$wp_customize->add_section('colors', array( // 中パネル
			'title' => '背景色',
			'panel' => 'st_panel_base_background',
		));

		// headerエリア
		$wp_customize->add_section('st_panel_header', array( // 中パネル
			'title' => 'headerエリア',
			'description' => 'header（ヘッダー～ヘッダー画像下エリア）全体のエリアです',
			'panel' => 'st_panel_base_background',
		));

		$wp_customize->add_setting( 'st_headerarea_bgcolor',
			array(
				'default'              => $defaults['st_headerarea_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerarea_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_header',
			'settings'    => 'st_headerarea_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_headerbg_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'header_Image',
			array(
				'label'       => __( '背景画像', 'affinger' ),
				'section'     => 'st_panel_header',
				'description' => '',
				'settings'    => 'st_headerbg_image',
			)
		) );

		$wp_customize->add_setting( 'st_headerbg_sp_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'header_sp_Image',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_header',
				'description' => 'スマホ（959px以下）',
				'settings'    => 'st_headerbg_sp_image',
			)
		) );

		$wp_customize->add_setting( 'st_headerbg_image_area',
			array(
				'default'           => $defaults['st_headerbg_image_area'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headerbg_image_area',
			array(
				'section'     => 'st_panel_header',
				'settings'    => 'st_headerbg_image_area',
				'label'       => '',
				'description' => '背景画像の範囲',
				'type'        => 'radio',
				'choices'     => array(
					''        => __( 'デフォルト', 'affinger' ),
					'middle'  => __( 'サムネイルスライドショーエリア', 'affinger' ),
					'bottom'  => __( 'ヘッダーバナーエリア', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headerbg_image_side',
			array(
				'default'           => $defaults['st_headerbg_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headerbg_image_side',
			array(
				'section'     => 'st_panel_header',
				'settings'    => 'st_headerbg_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headerbg_image_top',
			array(
				'default'           => $defaults['st_headerbg_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headerbg_image_top',
			array(
				'section'     => 'st_panel_header',
				'settings'    => 'st_headerbg_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headerbg_image_repeat',
			array(
				'default'           => $defaults['st_headerbg_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_headerbg_image_repeat',
			array(
				'section'     => 'st_panel_header',
				'settings'    => 'st_headerbg_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_headerbg_image_flex',
			array(
				'default'           => $defaults['st_headerbg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_headerbg_image_flex',
			array(
				'section'     => 'st_panel_header',
				'settings'    => 'st_headerbg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_headerbg_image_dark',
			array(
				'default'           => $defaults['st_headerbg_image_dark'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_headerbg_image_dark',
			array(
				'section'     => 'st_panel_header',
				'settings'    => 'st_headerbg_image_dark',
				'label'       => '背景画像を暗くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//ヘッダー以下の背景色
		$wp_customize->add_section('st_panel_header_area_under', array( // 中パネル
			'title' => 'header以下のエリア',
			'panel' => 'st_panel_base_background',
		));

		$wp_customize->add_setting( 'st_headerunder_bgcolor',
			array(
				'default'              => $defaults['st_headerunder_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerunder_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_header_area_under',

			'settings' => 'st_headerunder_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_headerunder_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'headerunder_Image',
			array(
				'label'       => __( '背景画像', 'affinger' ),
				'section'     => 'st_panel_header_area_under',
				'description' => '',
				'settings'    => 'st_headerunder_image',
			)
		) );

		$wp_customize->add_setting( 'st_headerunder_image_side',
			array(
				'default'           => $defaults['st_headerunder_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headerunder_image_side',
			array(
				'section'     => 'st_panel_header_area_under',
				'settings'    => 'st_headerunder_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headerunder_image_top',
			array(
				'default'           => $defaults['st_headerunder_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headerunder_image_top',
			array(
				'section'     => 'st_panel_header_area_under',
				'settings'    => 'st_headerunder_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headerunder_image_repeat',
			array(
				'default'           => $defaults['st_headerunder_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_headerunder_image_repeat',
			array(
				'section'     => 'st_panel_header_area_under',
				'settings'    => 'st_headerunder_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		// サブ背景色
		$wp_customize->add_setting( 'st_body_sub_bgcolor',
			array(
				'default'              => $defaults['st_body_sub_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_body_sub_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サブ背景色',
			'section'     => 'colors',
			'settings' => 'st_body_sub_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_body_bg_designsetting',
			array(
				'default'           => $defaults['st_body_bg_designsetting'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_body_bg_designsetting',
			array(
				'section'     => 'colors',
				'settings'    => 'st_body_bg_designsetting',
				'label'       => '',
				'description' => '背景のスタイル',
				'type'        => 'radio',
				'choices'     => array(
					'mizutama'           => __( '水玉', 'affinger' ),
					'mizutama_t'         => __( '水玉（斜）', 'affinger' ),
					'border'             => __( 'ボーダー', 'affinger' ),
					'border_t'           => __( 'ボーダー（斜）', 'affinger' ),
					'border_y'              => __( 'ボーダー（横）', 'affinger' ),
					'hougan'             => __( '方眼', 'affinger' ),
					''                   => __( 'なし', 'affinger' ),
				),
			) );

		// フロントページ限定の背景色

		$wp_customize->add_setting( 'st_front_page_bgcolor',
			array(
				'default'              => $defaults['st_front_page_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_front_page_bgcolor', array(
			'label'       => __( 'フロントページ背景色', 'affinger' ),
			'description' => 'フロントページ限定の背景色です',
			'section'     => 'colors',
			'settings' => 'st_front_page_bgcolor',
		) ) );

		//wrapperサイト全体背景

		$wp_customize->add_setting( 'st_wrapper_bgcolor',
			array(
				'default'              => $defaults['st_wrapper_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_wrapper_bgcolor', array(
			'label'       => __( 'サイト背景色', 'affinger' ),
			'description' => 'サイト全体を包括する背景色です※色を設定すると幅のMAX値は1100pxになります',
			'section'     => 'colors',
			'settings' => 'st_wrapper_bgcolor',
		) ) );

		/*-------------------------------------------------------------
		 * ヘッダー
		 * ----------------------------------------------------------*/
		$wp_customize->add_panel( 'st_panel_header_base', // 大パネル
			array(
				'title'       => __( 'ヘッダーナビゲーション', 'affinger' ),
				'description' => 'サイトのタイトルなどが表示される一番上のエリアです',
				'priority'    => 26,
			) );

		$wp_customize->add_section('color_controls_header_base', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_header_base',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_header_base' );

		// PC
		$wp_customize->add_section('st_panel_header_area', array( // 中パネル
			'title' => 'パソコン（PC）',
			'description' => 'サイトのタイトルなどが表示される一番上のエリアです',
			'panel' => 'st_panel_header_base',
		));

		$wp_customize->add_setting( 'st_menu_logocolor',
		array(
			'default'              => $defaults['st_menu_logocolor'],
			'sanitize_callback'    => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_logocolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サイトのタイトルとキャッチフレーズ',
			'section'     => 'st_panel_header_area',
			'settings'    => 'st_menu_logocolor',
		) ) );

		$wp_customize->add_setting( 'st_header100',
			array(
				'default'           => $defaults['st_header100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header100',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_header100',
				'label'       => '横幅を100%にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//サイト上部にラインを入れる
		$wp_customize->add_setting( 'st_top_bordercolor',
			array(
				'default'              => $defaults['st_top_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_top_bordercolor', array(
			'label'       => __( 'ライン', 'affinger' ),
			'description' => 'カラー',
			'section'     => 'st_panel_header_area',
			'settings'    => 'st_top_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_line_height',
			array(
				'default'           => $defaults['st_line_height'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_line_height',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_line_height',
				'label'       => '',
				'description' => '高さ（px）',
				'type'        => 'radio',
				'choices'     => array(
					'1px' => __( '1px', 'affinger' ),
					'5px' => __( '5px', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headbox_bgcolor',
			array(
				'default'              => $defaults['st_headbox_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headbox_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_header_area',
			'settings' => 'st_headbox_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_headbox_bgcolor_t',
			array(
				'default'              => $defaults['st_headbox_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headbox_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'グラデーション上部',
			'section'     => 'st_panel_header_area',

			'settings' => 'st_headbox_bgcolor_t',
		) ) );


		$wp_customize->add_setting( 'st_header_gradient',
			array(
				'default'           => $defaults['st_header_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_gradient',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_header_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//ヘッダーナビゲーション背景画像

		$wp_customize->add_setting( 'st_header_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'head_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_header_area',
				'description' => '',
				'settings'    => 'st_header_image',
			)
		) );

		$wp_customize->add_setting( 'st_header_image_side',
			array(
				'default'           => $defaults['st_header_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_header_image_side',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_header_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_header_image_top',
			array(
				'default'           => $defaults['st_header_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_header_image_top',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_header_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_header_image_repeat',
			array(
				'default'           => $defaults['st_header_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_image_repeat',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_header_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_header_bg_image_flex',
			array(
				'default'           => $defaults['st_header_bg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_bg_image_flex',
			array(
				'section'     => 'st_panel_header_area',
				'settings'    => 'st_header_bg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_header_front_exclusion_set',
				array(
					'default'           => $defaults['st_header_front_exclusion_set'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_header_front_exclusion_set',
				array(
					'section'     => 'st_panel_header_area',
					'settings'    => 'st_header_front_exclusion_set',
					'label'       => '背景色及び画像をトップページのみ除外する',
					'description' => '',
					'type'        => 'checkbox',
				) );
		endif;

		/*ヘッダーウィジェットの背景色*/
		$wp_customize->add_setting( 'st_headerwidget_bgcolor',
			array(
				'default'              => $defaults['st_headerwidget_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerwidget_bgcolor', array(
			'label'       => __( 'ヘッダーナビゲーション （右※PCのみ）', 'affinger' ),
			'section'     => 'st_panel_header_area',
			'description' => '背景色',
			'settings'    => 'st_headerwidget_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_headerwidget_textcolor',
			array(
				'default'              => $defaults['st_headerwidget_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerwidget_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_header_area',
			'description' => '文字色',
			'settings'    => 'st_headerwidget_textcolor',
		) ) );

		/*電話番号とヘッダーリンク*/

		$wp_customize->add_setting( 'st_header_tel_color',
			array(
				'default'              => $defaults['st_header_tel_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_tel_color', array(
			'label'       => __( '電話番号とヘッダーリンク', 'affinger' ),
			'section'     => 'st_panel_header_area',
			'description' => '',
			'settings'    => 'st_header_tel_color',
		) ) );

		if ( st_is_ver_af() ): // 通常版
			$wp_customize->add_setting( 'st_fixed_pc_header',
				array(
					'default'           => $defaults['st_fixed_pc_header'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_fixed_pc_header',
				array(
					'section'     => 'st_panel_header_area',
					'settings'    => 'st_fixed_pc_header',
					'label'       => '表示パターン',
					'description' => '',
					'type'        => 'radio',
					'choices'     => array(
						''      => '通常',
						'fixed' => '固定',
					),
				) );
		elseif ( st_is_ver_ex() ): // EX版
			$wp_customize->add_setting( 'st_fixed_pc_header',
				array(
					'default'           => $defaults['st_fixed_pc_header'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_fixed_pc_header',
				array(
					'section'     => 'st_panel_header_area',
					'settings'    => 'st_fixed_pc_header',
					'label'       => '表示パターン',
					'description' => '',
					'type'        => 'radio',
					'choices'     => array(
						''      => '通常',
						'fixed' => '固定',
						'fixed-pcmenu' => '固定（メニュー）',
						'fixed-headerinfo' => '固定（インフォメーション）',
					),
				) );
		endif;

		// カラーフィルター
		$wp_customize->add_setting( 'st_pc_header_fixed_alpha_bgcolor',
			array(
				'default'              => $defaults['st_pc_header_fixed_alpha_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_pc_header_fixed_alpha_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景カラーフィルター',
			'section'     => 'st_panel_header_area',
			'settings' => 'st_pc_header_fixed_alpha_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_pc_header_fixed_bg_alpha', array(
			'default'           => $defaults['st_pc_header_fixed_bg_alpha'],
			'sanitize_callback' => 'st_sanitize_float',
		) );

		$wp_customize->add_control( 'st_pc_header_fixed_bg_alpha', array(
			'section'     => 'st_panel_header_area',
			'settings'    => 'st_pc_header_fixed_bg_alpha',
			'label'       => __( '', 'affinger' ),
			'description' => '透過レベル',
			'type'        => 'range',
			'input_attrs' => array(
				'min'   => 0, // 最小値
				'max'   => 1, // 最大値
				'step'  => 0.1, // ステップ
			),
		) );

		//スマホ
		$wp_customize->add_section('st_panel_header_area_sp', array( // 中パネル
			'title' => 'スマホ（SP）',
			'description' => 'サイトのタイトルなどが表示される一番上のエリアです（※PHP分岐のためカスタマイザーには反映されません）',
			'panel' => 'st_panel_header_base',
		));

		$wp_customize->add_setting( 'st_mobile_sitename',
			array(
				'default'              => $defaults['st_mobile_sitename'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_mobile_sitename', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サイトのタイトルとキャッチフレーズ',
			'section'     => 'st_panel_header_area_sp',
			'settings' => 'st_mobile_sitename',
		) ) );

		$wp_customize->add_setting( 'st_menu_smartbar_bg_color',
			array(
				'default'              => $defaults['st_menu_smartbar_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_smartbar_bg_color', array(
			'label'       => __( '背景色' ),
			'description' => '',
			'section'     => 'st_panel_header_area_sp',
			'settings'    => 'st_menu_smartbar_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_smartbar_bg_color_t',
			array(
				'default'              => $defaults['st_menu_smartbar_bg_color_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_smartbar_bg_color_t', array(
			'label'       => __( '' ),
			'description' => 'グラデーション上部※向きはPC設定と連動',
			'section'     => 'st_panel_header_area_sp',
			'settings'    => 'st_menu_smartbar_bg_color_t',
		) ) );

		//スライドメニューバー背景画像

		$wp_customize->add_setting( 'st_menu_smartbar_bg_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'sp_menubar_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_header_area_sp',
				'description' => '',
				'settings'    => 'st_menu_smartbar_bg_image',
			)
		) );

		$wp_customize->add_setting( 'st_menu_smartbar_bg_image_side',
			array(
				'default'           => $defaults['st_menu_smartbar_bg_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_menu_smartbar_bg_image_side',
			array(
				'section'     => 'st_panel_header_area_sp',
				'settings'    => 'st_menu_smartbar_bg_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_menu_smartbar_bg_image_top',
			array(
				'default'           => $defaults['st_menu_smartbar_bg_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_menu_smartbar_bg_image_top',
			array(
				'section'     => 'st_panel_header_area_sp',
				'settings'    => 'st_menu_smartbar_bg_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_menu_smartbar_bg_image_repeat',
			array(
				'default'           => $defaults['st_menu_smartbar_bg_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_menu_smartbar_bg_image_repeat',
			array(
				'section'     => 'st_panel_header_area_sp',
				'settings'    => 'st_menu_smartbar_bg_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_menu_smartbar_bg_image_cover',
			array(
				'default'           => $defaults['st_menu_smartbar_bg_image_cover'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_menu_smartbar_bg_image_cover',
			array(
				'section'     => 'st_panel_header_area_sp',
				'settings'    => 'st_menu_smartbar_bg_image_cover',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_menu_smartbar_front_exclusion_set',
				array(
					'default'           => $defaults['st_menu_smartbar_front_exclusion_set'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_menu_smartbar_front_exclusion_set',
				array(
					'section'     => 'st_panel_header_area_sp',
					'settings'    => 'st_menu_smartbar_front_exclusion_set',
					'label'       => '背景色及び画像をトップページのみ除外する',
					'description' => '',
					'type'        => 'checkbox',
				) );
		endif;

		/*スライドメニューのfix*/
		$wp_customize->add_setting( 'st_sticky_menu',
			array(
				'default'           => $defaults['st_sticky_menu'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_sticky_menu',
			array(
				'section'     => 'st_panel_header_area_sp',
				'settings'    => 'st_sticky_menu',
				'label'       => '表示パターン',
				'description' => '',
				'type'        => 'radio',
				'choices'     => array(
					''      => '通常',
					'fixed' => '固定',
					'1'     => 'スクロール追尾',
					'fixed-info' => '固定（インフォメーション）',
				),
			) );

			// カラーフィルター
			$wp_customize->add_setting( 'st_sticky_menu_alpha_bgcolor',
				array(
					'default'              => $defaults['st_sticky_menu_alpha_bgcolor'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_sticky_menu_alpha_bgcolor', array(
				'label'       => __( '', 'affinger' ),
				'description' => 'カラーフィルター',
				'section'     => 'st_panel_header_area_sp',
				'settings' => 'st_sticky_menu_alpha_bgcolor',
			) ) );

			$wp_customize->add_setting( 'st_sticky_menu_bg_alpha', array(
				'default'           => $defaults['st_sticky_menu_bg_alpha'],
				'sanitize_callback' => 'st_sanitize_float',
			) );

			$wp_customize->add_control( 'st_sticky_menu_bg_alpha', array(
				'section'     => 'st_panel_header_area_sp',
				'settings'    => 'st_sticky_menu_bg_alpha',
				'label'       => __( '', 'affinger' ),
				'description' => '透過レベル',
				'type'        => 'range',
				'input_attrs' => array(
					'min'   => 0, // 最小値
					'max'   => 1, // 最大値
					'step'  => 0.1, // ステップ
				),
			) );

		/*-------------------------------------------------------------
		 * サブエリア
		 * ----------------------------------------------------------*/
		$wp_customize->add_panel( 'st_panel_sub_area', // 大パネル
			array(
				'title'       => __( 'サブエリア', 'affinger' ),
				'description' => '',
				'priority'    => 30,
			) );

		$wp_customize->add_section('color_controls_sub_area', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_sub_area',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_sub_area' );

		//ヘッダーインフォメーション
		$wp_customize->add_section('st_panel_header_area_top', array( // 中パネル
				'title' => 'インフォメーションエリア',
				'description' => 'ヘッダーインフォメーションウィジェットで挿入されたコンテンツのエリアです。',
				'panel' => 'st_panel_sub_area',
		));

		$wp_customize->add_setting( 'st_header_top_bgcolor',
			array(
				'default'              => $defaults['st_header_top_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_top_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_header_area_top',
			'settings' => 'st_header_top_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_header_top_bgcolor_g',
			array(
				'default'              => $defaults['st_header_top_bgcolor_g'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_top_bgcolor_g', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色（右）',
			'section'     => 'st_panel_header_area_top',
			'settings' => 'st_header_top_bgcolor_g',
		) ) );

		$wp_customize->add_setting( 'st_header_top_textcolor',
			array(
				'default'              => $defaults['st_header_top_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_top_textcolor', array(
			'label'       => '',
			'description' => '文字色',
			'section'     => 'st_panel_header_area_top',
			'settings' => 'st_header_top_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_header_top_stripe',
			array(
				'default'           => $defaults['st_header_top_stripe'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_top_stripe',
			array(
				'section'     => 'st_panel_header_area_top',
				'settings'    => 'st_header_top_stripe',
				'label'       => 'ストライプデザインに変更（※要背景色）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_header_info_100',
			array(
				'default'           => $defaults['st_header_info_100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_info_100',
			array(
				'section'     => 'st_panel_header_area_top',
				'settings'    => 'st_header_info_100',
				'label'       => '横幅を100%にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//サムネイルスライドショーエリア
		$wp_customize->add_section('st_panel_header_area_bottom', array( // 中パネル
			'title' => 'サムネイルスライドショー',
			'description' => 'ヘッダー画像の下に挿入されるサムネイルスライドショー（ウィジェット含む）のエリアです。',
			'panel' => 'st_panel_sub_area',
		));

		$wp_customize->add_setting( 'st_header_under_100',
			array(
				'default'           => $defaults['st_header_under_100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_under_100',
			array(
				'section'     => 'st_panel_header_area_bottom',
				'settings'    => 'st_header_under_100',
				'label'       => '横幅を100%にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_header_under_bgcolor',
			array(
				'default'              => $defaults['st_header_under_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_under_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_header_area_bottom',
			'settings' => 'st_header_under_bgcolor',
		) ) );

		//ヘッダー画像エリア背景画像

		$wp_customize->add_setting( 'st_header_under_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'header_under_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_header_area_bottom',
				'description' => '',
				'settings'    => 'st_header_under_image',
			)
		) );

		$wp_customize->add_setting( 'st_header_under_image_side',
			array(
				'default'           => $defaults['st_header_under_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_header_under_image_side',
			array(
				'section'     => 'st_panel_header_area_bottom',
				'settings'    => 'st_header_under_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_header_under_image_top',
			array(
				'default'           => $defaults['st_header_under_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_header_under_image_top',
			array(
				'section'     => 'st_panel_header_area_bottom',
				'settings'    => 'st_header_under_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_header_under_image_repeat',
			array(
				'default'           => $defaults['st_header_under_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_under_image_repeat',
			array(
				'section'     => 'st_panel_header_area_bottom',
				'settings'    => 'st_header_under_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_header_under_image_flex',
			array(
				'default'           => $defaults['st_header_under_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_under_image_flex',
			array(
				'section'     => 'st_panel_header_area_bottom',
				'settings'    => 'st_header_under_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_header_under_image_dark',
			array(
				'default'           => $defaults['st_header_under_image_dark'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_header_under_image_dark',
			array(
				'section'     => 'st_panel_header_area_bottom',
				'settings'    => 'st_header_under_image_dark',
				'label'       => '背景画像を暗くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		if ( st_is_ver_ex_af() ):
			// おすすめヘッダーバナー
			$wp_customize->add_section('st_panel_header_card_area', array( // 中パネル
				'title' => 'ヘッダーバナーエリア',
				'description' => 'AFFINGER管理の「ヘッダー下 / おすすめ」で設定できます',
				'panel' => 'st_panel_sub_area',
			));

			$wp_customize->add_setting( 'st_header_card_bgcolor',
				array(
					'default'              => $defaults['st_header_card_bgcolor'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_card_bgcolor', array(
				'label'       => __( '背景色', 'affinger' ),
				'description' => '',
				'section'     => 'st_panel_header_card_area',
				'settings' => 'st_header_card_bgcolor',
			) ) );

			$wp_customize->add_setting( 'st_header_card_image',
				array(
					'default'           => '',
					'type'              => 'option',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw',
				) );

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'header_card_Image',
				array(
					'label'       => __( '背景画像', 'affinger' ),
					'section'     => 'st_panel_header_card_area',
					'description' => '',
					'settings'    => 'st_header_card_image',
				)
			) );

			$wp_customize->add_setting( 'st_header_card_image_side',
				array(
					'default'           => $defaults['st_header_card_image_side'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_header_card_image_side',
				array(
					'section'     => 'st_panel_header_card_area',
					'settings'    => 'st_header_card_image_side',
					'label'       => '',
					'description' => '横位置',
					'type'        => 'radio',
					'choices'     => array(
						'left'   => __( '左', 'affinger' ),
						'center' => __( '真ん中', 'affinger' ),
						'right'  => __( '右', 'affinger' ),
					),
				) );

			$wp_customize->add_setting( 'st_header_card_image_top',
				array(
					'default'           => $defaults['st_header_card_image_top'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_header_card_image_top',
				array(
					'section'     => 'st_panel_header_card_area',
					'settings'    => 'st_header_card_image_top',
					'label'       => '',
					'description' => '縦位置',
					'type'        => 'radio',
					'choices'     => array(
						'top'    => __( '上', 'affinger' ),
						'center' => __( '真ん中', 'affinger' ),
						'bottom' => __( '下', 'affinger' ),
					),
				) );

			$wp_customize->add_setting( 'st_header_card_image_repeat',
				array(
					'default'           => $defaults['st_header_card_image_repeat'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_header_card_image_repeat',
				array(
					'section'     => 'st_panel_header_card_area',
					'settings'    => 'st_header_card_image_repeat',
					'label'       => '背景画像を繰り返さない',
					'description' => '',
					'type'        => 'checkbox',
				) );

			$wp_customize->add_setting( 'st_header_card_image_flex',
				array(
					'default'           => $defaults['st_header_card_image_flex'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_header_card_image_flex',
				array(
					'section'     => 'st_panel_header_card_area',
					'settings'    => 'st_header_card_image_flex',
					'label'       => '背景画像を幅100%のレスポンシブにする',
					'description' => '',
					'type'        => 'checkbox',
				) );
		endif;

		/*-------------------------------------------------------------
		 * mainエリア
		 * ----------------------------------------------------------*/
		$wp_customize->add_panel( 'st_panel_main_area', // 大パネル
		array(
			'title'=> __( 'メインエリア', 'affinger' ),
				'description' => '',
				'priority'    => 31,
			) );

		$wp_customize->add_section('color_controls_main_area', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_main_area',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_main_area' );

		$wp_customize->add_section('st_panel_post_area_front', array( // 中パネル
			'title' => 'フロントページ',
			'panel' => 'st_panel_main_area',
		));

		$wp_customize->add_setting( 'st_front_menu_maincolor',
			array(
				'default'              => $defaults['st_front_menu_maincolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_front_menu_maincolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_area_front',
			'settings' => 'st_front_menu_maincolor',
		) ) );

		//記事背景の透過

		$wp_customize->add_setting( 'st_front_main_opacity',
			array(
				'default'           => $defaults['st_front_main_opacity'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_front_main_opacity',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_main_opacity',
				'label'       => '',
				'description' => '透過 ※白色になります',
				'type'        => 'select',
				'choices'     => array(
					''    => __( '透過しない', 'affinger' ),
					'20'  => __( '20%', 'affinger' ),
					'50'  => __( '50%', 'affinger' ),
					'80'  => __( '80%', 'affinger' ),
					'100' => __( '100%', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_front_menu_main_bordercolor',
			array(
				'default'              => $defaults['st_front_menu_main_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_front_menu_main_bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_area_front',
			'settings'    => 'st_front_menu_main_bordercolor',
		) ) );

		//記事エリア背景画像

		$wp_customize->add_setting( 'st_front_entry_content_bg_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'front_content_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_post_area_front',
				'description' => '',
				'settings'    => 'st_front_entry_content_bg_image',
			)
		) );

		$wp_customize->add_setting( 'st_front_entry_content_bg_image_side',
			array(
				'default'           => $defaults['st_front_entry_content_bg_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_front_entry_content_bg_image_side',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_entry_content_bg_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_front_entry_content_bg_image_top',
			array(
				'default'           => $defaults['st_front_entry_content_bg_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_front_entry_content_bg_image_top',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_entry_content_bg_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_front_entry_content_bg_image_repeat',
			array(
				'default'           => $defaults['st_front_entry_content_bg_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_front_entry_content_bg_image_repeat',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_entry_content_bg_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_front_entry_content_bg_image_flex',
			array(
				'default'           => $defaults['st_front_entry_content_bg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_front_entry_content_bg_image_flex',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_entry_content_bg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_front_main_opacity_sp',
			array(
				'default'           => $defaults['st_front_main_opacity_sp'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_front_main_opacity_sp',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_main_opacity_sp',
				'label'       => 'スマホにも反映する',
				'description' => '',
				'type'        => 'checkbox',
		) );

		$wp_customize->add_setting( 'st_adjustment_label_post_area_front',
			array(
				'default'              => $defaults['st_adjustment_label_post_area_front'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_adjustment_label_post_area_front', array(
			'label'       => __( '調整', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_area_front',
			'settings' => 'st_adjustment_label_post_area_front',
		) ) );

		$wp_customize->add_setting( 'st_front_main_shadow',
			array(
				'default'           => $defaults['st_front_main_shadow'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_front_main_shadow',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_front_main_shadow',
				'label'       => 'シャドウを適応する（959px以上のみ※LPワイドを除く）',
				'description' => '',
				'type'        => 'checkbox',
		) );

		/* ワイド */
		$wp_customize->add_setting( 'st_main_top_bg_none',
			array(
				'default'           => $defaults['st_main_top_bg_none'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_main_top_bg_none',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_main_top_bg_none',
				'label'       => '左右の余白をなくす',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/* アーカイブ除外 */
		$wp_customize->add_setting( 'st_main_archive_bg_none',
			array(
				'default'           => $defaults['st_main_archive_bg_none'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_panel_post_area_front',
			array(
				'section'     => 'st_panel_post_area_front',
				'settings'    => 'st_main_archive_bg_none',
				'label'       => 'アーカイブページの左右の余白をなくす',
				'description' => '',
				'type'        => 'checkbox',
			) );

			$wp_customize->add_setting( 'st_stdata275',
				array(
					'default'           => $defaults['st_stdata275'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_stdata275',
				array(
					'section'     => 'st_panel_post_area_front',
					'settings'    => 'st_stdata275',
					'label'       => '上部の余白を0にする',
					'description' => 'PCのみ※960px以上',
					'type'        => 'checkbox',
				) );

			$wp_customize->add_setting( 'st_stdata382',
				array(
					'default'           => $defaults['st_stdata382'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_stdata382',
				array(
					'section'     => 'st_panel_post_area_front',
					'settings'    => 'st_stdata382',
					'label'       => '上部の余白を0にする',
					'description' => 'スマホ・タブレットのみ※959px以下',
					'type'        => 'checkbox',
				) );

		/* 
		 * mainエリア（記事）
		 */
		$wp_customize->add_section('st_panel_post_area', array( // 中パネル
			'title' => '記事ページ',
			'panel' => 'st_panel_main_area',
		));

		$wp_customize->add_setting( 'st_menu_maincolor',
			array(
				'default'              => $defaults['st_menu_maincolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_maincolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_area',

			'settings' => 'st_menu_maincolor',
		) ) );

		//記事背景の透過

		$wp_customize->add_setting( 'st_main_opacity',
			array(
				'default'           => $defaults['st_main_opacity'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_main_opacity',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_main_opacity',
				'label'       => '',
				'description' => '透過 ※白色になります',
				'type'        => 'select',
				'choices'     => array(
					''    => __( '透過しない', 'affinger' ),
					'20'  => __( '20%', 'affinger' ),
					'50'  => __( '50%', 'affinger' ),
					'80'  => __( '80%', 'affinger' ),
					'100' => __( '100%', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_menu_main_bordercolor',
			array(
				'default'              => $defaults['st_menu_main_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_main_bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_area',
			'settings'    => 'st_menu_main_bordercolor',
		) ) );

		//記事エリア背景画像

		$wp_customize->add_setting( 'st_entry_content_bg_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'entry_content_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_post_area',
				'description' => '',
				'settings'    => 'st_entry_content_bg_image',
			)
		) );

		$wp_customize->add_setting( 'st_entry_content_bg_image_side',
			array(
				'default'           => $defaults['st_entry_content_bg_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_entry_content_bg_image_side',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_entry_content_bg_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_entry_content_bg_image_top',
			array(
				'default'           => $defaults['st_entry_content_bg_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_entry_content_bg_image_top',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_entry_content_bg_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_entry_content_bg_image_repeat',
			array(
				'default'           => $defaults['st_entry_content_bg_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entry_content_bg_image_repeat',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_entry_content_bg_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entry_content_bg_image_flex',
			array(
				'default'           => $defaults['st_entry_content_bg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entry_content_bg_image_flex',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_entry_content_bg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_main_opacity_sp',
			array(
				'default'           => $defaults['st_main_opacity_sp'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_main_opacity_sp',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_main_opacity_sp',
				'label'       => 'スマホにも反映する',
				'description' => '',
				'type'        => 'checkbox',
		) );

		$wp_customize->add_setting( 'st_adjustment_label_post_area',
			array(
				'default'              => $defaults['st_adjustment_label_post_area'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_adjustment_label_post_area', array(
			'label'       => __( '調整', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_area',
			'settings' => 'st_adjustment_label_post_area',
		) ) );

		$wp_customize->add_setting( 'st_main_shadow',
			array(
				'default'           => $defaults['st_main_shadow'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_main_shadow',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_main_shadow',
				'label'       => 'シャドウを適応する（959px以上のみ※LPワイドを除く）',
				'description' => '',
				'type'        => 'checkbox',
		) );

		/*記事エリアの幅*/
		$wp_customize->add_setting( 'st_area',
			array(
				'default'           => $defaults['st_area'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_area',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_area',
				'label'       => 'PC時の記事エリアの幅を広げる（640→700px）※全共通',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_stdata276',
			array(
				'default'           => $defaults['st_stdata276'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_stdata276',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_stdata276',
				'label'       => '上部の余白を0にする',
				'description' => 'PCのみ※960px以上',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_stdata383',
			array(
				'default'           => $defaults['st_stdata383'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_stdata383',
			array(
				'section'     => 'st_panel_post_area',
				'settings'    => 'st_stdata383',
				'label'       => '上部の余白を0にする',
				'description' => 'スマホ・タブレットのみ※959px以下',
				'type'        => 'checkbox',
			) );

		/*-------------------------------------------------------------
		 * サイドバー
		 * ----------------------------------------------------------*/
		$wp_customize->add_section('st_panel_sidebar', array( // 中パネル
			'title' => 'サイドバー',
			'priority'    => 33,
			'description' => '挿入コンテンツによっては反映されない場合があります。',
		));

		$wp_customize->add_setting( 'st_side_textcolor',
			array(
				'default'              => $defaults['st_side_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_side_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サイドの文字色（一部カラーの強制変更）',
			'section'     => 'st_panel_sidebar',
			'settings'    => 'st_side_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_side_bgcolor',
			array(
				'default'              => $defaults['st_side_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_side_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サイドバー（中部）エリアの背景色',
			'section'     => 'st_panel_sidebar',
			'settings' => 'st_side_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_stdata29',
			array(
				'default'           => $defaults['st_stdata29'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_stdata29',
			array(
				'section'     => 'st_panel_sidebar',
				'settings'    => 'st_stdata29',
				'label'       => 'サイドバーを左にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*-------------------------------------------------------------
		 * フッター
		 * ----------------------------------------------------------*/
		$wp_customize->add_panel('st_panel_footer', array( // 中パネル
			'title'       => __( 'フッター', 'affinger' ),
			'priority'    => 35,
			'description' => '',
		));

		// フッターバナーエリア
		$wp_customize->add_section('st_panel_footer_banar_area', array( // 中パネル
			'title' => 'フッターバナーエリア',
			'description' => 'コンテンツは「フッターバナーエリア」ウィジェットエリアに挿入してください',
			'panel' => 'st_panel_footer',
		));

		$wp_customize->add_setting( 'st_footer_widgets_bg_color',
			array(
				'default'              => $defaults['st_footer_widgets_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_widgets_bg_color', array(
			'label'       => __( '背景色', 'affinger' ),
			'section'     => 'st_panel_footer_banar_area',
			'description' => '',
			'settings'    => 'st_footer_widgets_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_footer_widgets100',
			array(
				'default'           => $defaults['st_footer_widgets100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_footer_widgets100',
			array(
				'section'     => 'st_panel_footer_banar_area',
				'settings'    => 'st_footer_widgets100',
				'label'       => '左右の余白を「0」にする',
				'description' => '※横幅はフッターエリア「横幅を100%にする」と連動',
				'type'        => 'checkbox',
			) );

		// フッターエリア
		$wp_customize->add_section('st_panel_footer_area', array( // 中パネル
			'title' => 'フッターエリア',
			'description' => 'フッター文字色は挿入コンテンツによっては反映されない場合があります。',
			'panel' => 'st_panel_footer',
		));

		$wp_customize->add_setting( 'st_footer100',
			array(
				'default'           => $defaults['st_footer100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_footer100',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footer100',
				'label'       => '横幅を100%にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_footer_bg_text_color',
			array(
				'default'              => $defaults['st_footer_bg_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_bg_text_color', array(
			'label'       => __( '文字色', 'affinger' ),
			'section'     => 'st_panel_footer_area',
			'description' => '',
			'settings'    => 'st_footer_bg_text_color',
		) ) );

		$wp_customize->add_setting( 'st_footer_bg_color',
			array(
				'default'              => $defaults['st_footer_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_bg_color', array(
			'label'       => __( '背景色', 'affinger' ),
			'section'     => 'st_panel_footer_area',
			'description' => '',
			'settings'    => 'st_footer_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_footer_bg_color_t',
			array(
				'default'              => $defaults['st_footer_bg_color_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_bg_color_t', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_footer_area',
			'description' => 'グラデーション上部',
			'settings'    => 'st_footer_bg_color_t',
		) ) );

		$wp_customize->add_setting( 'st_footer_gradient',
			array(
				'default'           => $defaults['st_footer_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_footer_gradient',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footer_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_footer_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'footer_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_footer_area',
				'description' => '',
				'settings'    => 'st_footer_image',
			)
		) );

		$wp_customize->add_setting( 'st_footer_image_side',
			array(
				'default'           => $defaults['st_footer_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_footer_image_side',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footer_image_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_footer_image_top',
			array(
				'default'           => $defaults['st_footer_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_footer_image_top',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footer_image_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_footer_image_repeat',
			array(
				'default'           => $defaults['st_footer_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_footer_image_repeat',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footer_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_footerbg_image_flex',
			array(
				'default'           => $defaults['st_footerbg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_footerbg_image_flex',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footerbg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_footerbg_image_dark',
			array(
				'default'           => $defaults['st_footerbg_image_dark'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_footerbg_image_dark',
			array(
				'section'     => 'st_panel_footer_area',
				'settings'    => 'st_footerbg_image_dark',
				'label'       => '背景画像を暗くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*記事一覧*/
		$wp_customize->add_section('st_panel_post_border', array( // 中パネル
			'title' => '記事一覧 / ページャーとPREV NEXTリンク',
			'panel' => 'st_panel_main_area',
		));

		$wp_customize->add_setting( 'st_thumbnail_bordercolor',
			array(
				'default'              => $defaults['st_thumbnail_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_thumbnail_bordercolor', array(
			'label'       => __( 'サムネイル画像', 'affinger' ),
			'section'     => 'st_panel_post_border',
			'description' => '枠線',
			'settings'    => 'st_thumbnail_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_kanren_bordercolor',
			array(
				'default'              => $defaults['st_kanren_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kanren_bordercolor', array(
			'label'       => __( '区切りボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_border',
			'settings'    => 'st_kanren_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_kanren_border_dashed',
			array(
				'default'           => $defaults['st_kanren_border_dashed'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_kanren_border_dashed',
			array(
				'section'     => 'st_panel_post_border',
				'settings'    => 'st_kanren_border_dashed',
				'label'       => '破線にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_pagination_bordercolor',
			array(
				'default'              => $defaults['st_pagination_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_pagination_bordercolor', array(
			'label'       => __( 'ページャーとPREV NEXTリンク', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_post_border',
			'settings'    => 'st_pagination_bordercolor',
		) ) );


		/*-------------------------------------------------------
		メニュー
		-------------------------------------------------------*/

		$wp_customize->add_panel( 'st_panel_stmenus',
			array(
				'title'       => __( 'メニュー', 'affinger' ),
				'priority'    => 24,
			) );

		$wp_customize->add_section('color_controls_stmenus', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_stmenus',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_stmenus' );

		$wp_customize->add_section('st_panel_header_menu', array( // 中パネル
			'title' => 'PC ヘッダーメニュー',
			'description' => '600px以上で表示されるメニューです。位置は「テーマ管理」＞「メニュー」で変更できます。予め「メニュー設定」にて「ヘッダーメニュー」を設定してください。',
			'panel' => 'st_panel_stmenus',
		));

		$wp_customize->add_setting( 'st_menu_center',
			array(
				'default'           => $defaults['st_menu_center'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_menu_center',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_menu_center',
				'label'       => 'メニューをセンター寄せにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_menu100',
			array(
				'default'           => $defaults['st_menu100'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_menu100',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_menu100',
				'label'       => 'メニューの横幅を100%にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_menu_width',
			array(
				'default'           => $defaults['st_menu_width'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_menu_width_c',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_menu_width',
				'label'       => '',
				'description' => 'メニューの幅（px）',
				'type'        => 'option',
			) );

		//メニューのパディング

		$wp_customize->add_setting( 'st_menu_padding',
			array(
				'default'           => $defaults['st_menu_padding'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_menu_padding',
			array(
				'section'     => 'st_panel_header_menu',
				'label'       => '',
				'description' => 'メニューの上下に隙間を作る',
				'type'        => 'select',
				'choices'     => array(
					''         => __( '設定しない', 'affinger' ),
					'top10'    => __( '上に10pxの隙間', 'affinger' ),
					'bottom10' => __( '下に10pxの隙間', 'affinger' ),
				),
			) );


		$wp_customize->add_setting( 'st_menu_navbarcolor',
			array(
				'default'              => $defaults['st_menu_navbarcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbarcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'section'     => 'st_panel_header_menu',
			'description' => '',
			'settings'    => 'st_menu_navbarcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_navbarcolor_t',
			array(
				'default'              => $defaults['st_menu_navbarcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbarcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_header_menu',
			'description' => 'グラデーション上部',
			'settings'    => 'st_menu_navbarcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_menu_navbar_topunder_color',
			array(
				'default'              => $defaults['st_menu_navbar_topunder_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_setting( 'st_navbarcolor_gradient',
			array(
				'default'           => $defaults['st_navbarcolor_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_navbarcolor_gradient',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_navbarcolor_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );		//ドロップダウンメニュー背景

		$wp_customize->add_setting( 'st_menu_navbar_undercolor',
			array(
				'default'              => $defaults['st_menu_navbar_undercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbar_undercolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_header_menu',
			'description' => '下層ドロップダウンメニュー背景色',
			'settings'    => 'st_menu_navbar_undercolor',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_navbar_topunder_color',
			array(
				'label'       => __( 'ボーダー', 'affinger' ),
				'section'     => 'st_panel_header_menu',
				'description' => '上下',
				'settings'    => 'st_menu_navbar_topunder_color',
			) ) );

		$wp_customize->add_setting( 'st_menu_navbar_side_color',
			array(
				'default'              => $defaults['st_menu_navbar_side_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbar_side_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_header_menu',
			'description' => '左右',
			'settings'    => 'st_menu_navbar_side_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_navbar_right_color',
			array(
				'default'              => $defaults['st_menu_navbar_right_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbar_right_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_header_menu',
			'description' => 'セパレート',
			'settings'    => 'st_menu_navbar_right_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_navbartextcolor',
			array(
				'default'              => $defaults['st_menu_navbartextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbartextcolor', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_header_menu',
			'settings'    => 'st_menu_navbartextcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_bold',
			array(
				'default'           => $defaults['st_menu_bold'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_menu_bold',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_menu_bold',
				'label'       => '第一階層メニューを太字にする（サイドメニュー連動）',
				'description' => '',
				'type'        => 'checkbox',
			) );
		//背景画像

		$wp_customize->add_setting( 'st_headermenu_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'headermenu_Image',
			array(
				'label'       => __( '背景画像', 'affinger' ),
				'section'     => 'st_panel_header_menu',
				'description' => '',
				'settings'    => 'st_headermenu_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_headermenu_bgimg_side',
			array(
				'default'           => $defaults['st_headermenu_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headermenu_bgimg_side',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_headermenu_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headermenu_bgimg_top',
			array(
				'default'           => $defaults['st_headermenu_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_headermenu_bgimg_top',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_headermenu_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_headermenu_bgimg_repeat',
			array(
				'default'           => $defaults['st_headermenu_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_headermenu_bgimg_repeat',
			array(
				'section'     => 'st_panel_header_menu',
				'settings'    => 'st_headermenu_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_menu_navbar_front_exclusion_set',
				array(
					'default'           => $defaults['st_menu_navbar_front_exclusion_set'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_menu_navbar_front_exclusion_set',
				array(
					'section'     => 'st_panel_header_menu',
					'settings'    => 'st_menu_navbar_front_exclusion_set',
					'label'       => '背景色及び画像をトップページのみ除外する（第一階層）',
					'description' => '',
					'type'        => 'checkbox',
				) );
		endif;

		//固定ページサイドメニュー
		$wp_customize->add_section('st_panel_side_menu_widgets', array( // 中パネル
			'title' => 'サイドメニュー（ウィジェット）',
			'description' => 'ウィジェットにて「01_STINGERサイドバーメニュー」を挿入して表示されるメニューです。予め「メニュー」にて「サイドメニュー」を設定してください。',
			'panel' => 'st_panel_stmenus',
		));

		$wp_customize->add_setting( 'st_menu_side_widgetscolor',
			array(
				'default'              => $defaults['st_menu_side_widgetscolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_side_widgetscolor', array(
			'label'       => __( '第一階層', 'affinger' ),
			'section'     => 'st_panel_side_menu_widgets',
			'description' => '背景色',
			'settings'    => 'st_menu_side_widgetscolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_side_widgetscolor_t',
			array(
				'default'              => $defaults['st_menu_side_widgetscolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_side_widgetscolor_t', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_side_menu_widgets',
			'description' => '背景色（グラデーション上部）',
			'settings'    => 'st_menu_side_widgetscolor_t',
		) ) );

		$wp_customize->add_setting( 'st_sidemenu_gradient',
			array(
				'default'           => $defaults['st_sidemenu_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_sidemenu_gradient',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_menu_side_widgets_topunder_color',
			array(
				'default'              => $defaults['st_menu_side_widgets_topunder_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_side_widgets_topunder_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_side_menu_widgets',
				'description' => 'ボーダー色',
				'settings'    => 'st_menu_side_widgets_topunder_color',
			) ) );

		$wp_customize->add_setting( 'st_menu_side_widgetstextcolor',
			array(
				'default'              => $defaults['st_menu_side_widgetstextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_side_widgetstextcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => '文字色',
			'section'     => 'st_panel_side_menu_widgets',
			'settings'    => 'st_menu_side_widgetstextcolor',
		) ) );

		$wp_customize->add_setting( 'st_sidemenu_fontsize',
			array(
				'default'           => $defaults['st_sidemenu_fontsize'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_sidemenu_fontsize',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_fontsize',
				'label'       => '第一階層メニューの文字サイズを大きくする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//Webアイコン

		$wp_customize->add_setting( 'st_menu_icon',
			array(
				'default'           => $defaults['st_menu_icon'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_menu_icon',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_menu_icon',
				'label'       => __( '', 'affinger' ),
				'description' => 'Webアイコン',
				'type'        => 'select',
				'choices'     => array(
					''     => __( '設定しない', 'affinger' ),
					'f054' => __( '矢印1', 'affinger' ),
					'f105' => __( '矢印2', 'affinger' ),
					'f138' => __( '矢印3', 'affinger' ),
					'f0a9' => __( '矢印4', 'affinger' ),
					'f0da' => __( '矢印5', 'affinger' ),
					'f152' => __( '矢印6', 'affinger' ),
					'f18e' => __( '矢印7', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_menu_icon_color',
			array(
				'default'              => $defaults['st_menu_icon_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_icon_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'アイコン色',
			'section'     => 'st_panel_side_menu_widgets',
			'settings'    => 'st_menu_icon_color',
		) ) );

		//背景画像

		$wp_customize->add_setting( 'st_sidemenu_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'sidemenu_Image',
			array(
				'label'       => '',
				'section'     => 'st_panel_side_menu_widgets',
				'description' => '背景画像',
				'settings'    => 'st_sidemenu_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_sidemenu_bgimg_side',
			array(
				'default'           => $defaults['st_sidemenu_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_sidemenu_bgimg_side',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_sidemenu_bgimg_top',
			array(
				'default'           => $defaults['st_sidemenu_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_sidemenu_bgimg_top',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_sidemenu_bgimg_repeat',
			array(
				'default'           => $defaults['st_sidemenu_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_sidemenu_bgimg_repeat',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//第二階層以下		
		$wp_customize->add_setting( 'st_menu_pagelist_bgcolor',
			array(
				'default'              => $defaults['st_menu_pagelist_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_pagelist_bgcolor', array(
			'label'       => __( '第二階層（以下）', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_side_menu_widgets',
			'settings'    => 'st_menu_pagelist_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_pagelist_childtextcolor',
			array(
				'default'              => $defaults['st_menu_pagelist_childtextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_pagelist_childtextcolor',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_side_menu_widgets',
				'description' => '文字色',
				'settings'    => 'st_menu_pagelist_childtextcolor',
			) ) );

		$wp_customize->add_setting( 'st_menu_pagelist_childtext_border_color',
			array(
				'default'              => $defaults['st_menu_pagelist_childtext_border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_pagelist_childtext_border_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_side_menu_widgets',
				'description' => '下線色',
				'settings'    => 'st_menu_pagelist_childtext_border_color',
			) ) );

		$wp_customize->add_setting( 'st_undermenu_icon',
			array(
				'default'           => $defaults['st_undermenu_icon'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_undermenu_icon',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_undermenu_icon',
				'label'       => '',
				'description' => 'Webアイコン',
				'type'        => 'select',
				'choices'     => array(
					''     => __( '設定しない', 'affinger' ),
					'f054' => __( '矢印1', 'affinger' ),
					'f105' => __( '矢印2', 'affinger' ),
					'f138' => __( '矢印3', 'affinger' ),
					'f0a9' => __( '矢印4', 'affinger' ),
					'f0da' => __( '矢印5', 'affinger' ),
					'f152' => __( '矢印6', 'affinger' ),
					'f18e' => __( '矢印7', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_undermenu_icon_color',
			array(
				'default'              => $defaults['st_undermenu_icon_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_undermenu_icon_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'アイコン色',
			'section'     => 'st_panel_side_menu_widgets',
			'settings'    => 'st_undermenu_icon_color',
		) ) );

		$wp_customize->add_setting( 'st_sidemenu_accordion',
			array(
				'default'           => $defaults['st_sidemenu_accordion'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_sidemenu_accordion',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_accordion',
				'label'       => 'スライドメニューにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		//サイドメニュー全体

		$wp_customize->add_setting( 'st_sidebg_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'sidebg_Image',
			array(
				'label'       => 'サイドメニュー全体',
				'section'     => 'st_panel_side_menu_widgets',
				'description' => '背景画像',
				'settings'    => 'st_sidebg_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_sidebg_bgimg_side',
			array(
				'default'           => $defaults['st_sidebg_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_sidebg_bgimg_side',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidebg_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_sidebg_bgimg_top',
			array(
				'default'           => $defaults['st_sidebg_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_sidebg_bgimg_top',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidebg_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_sidebg_bgimg_repeat',
			array(
				'default'           => $defaults['st_sidebg_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_sidebg_bgimg_repeat',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidebg_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_sidemenu_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_sidemenu_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_sidemenu_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_bgimg_leftpadding',
				'label'       => '',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_sidemenu_bgimg_tupadding',
			array(
				'default'           => $defaults['st_sidemenu_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_sidemenu_tupadding_c',
			array(
				'section'     => 'st_panel_side_menu_widgets',
				'settings'    => 'st_sidemenu_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		//スマホ基本色
		$wp_customize->add_section('st_panel_sp_menu_slide', array( // 中パネル
			'title' => 'スマホ スライドメニュー / 検索',
			'description' => '599px以下にて表示されるスライドメニューです。（スライドメニューバー背景色及び画像はカスタマイザーには反映されません※実機のみ確認できます）',
			'panel' => 'st_panel_stmenus',
		));


		$wp_customize->add_setting( 'st_menu_sumartcolor',
			array(
				'default'              => $defaults['st_menu_sumartcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumartcolor', array(
			'label'       => __( '開閉ボタン', 'affinger' ),
			'description' => 'アイコン色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumartcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumart_bg_color',
			array(
				'default'              => $defaults['st_menu_sumart_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumart_bg_color',
		) ) );

		//スマホメニュー文字色

		$wp_customize->add_setting( 'st_menu_sumartmenutextcolor',
			array(
				'default'              => $defaults['st_menu_sumartmenutextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumartmenutextcolor', array(
			'label'       => __( 'スライドメニュー', 'affinger' ),
			'description' => 'テキストリンク色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumartmenutextcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumartmenubordercolor',
			array(
				'default'              => $defaults['st_menu_sumartmenubordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumartmenubordercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'リンクのボーダー色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumartmenubordercolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumartbar_bg_color',
			array(
				'default'              => $defaults['st_menu_sumartbar_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumartbar_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumartbar_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_search_slide_sumartbar_bg_color',
			array(
				'default'              => $defaults['st_search_slide_sumartbar_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_search_slide_sumartbar_bg_color', array(
			'label'       => __( '検索メニュー（スライド）', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_search_slide_sumartbar_bg_color',
		) ) );

		//スライドメニュー内背景画像

		$wp_customize->add_setting( 'st_slidemenubg_image',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'slidemenu_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_sp_menu_slide',
				'description' => 'スマホメニュー及び検索（スライド）に反映',
				'settings'    => 'st_slidemenubg_image',
			)
		) );

		$wp_customize->add_setting( 'st_slidemenubg_image_side',
			array(
				'default'           => $defaults['st_slidemenubg_image_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_slidemenubg_image_side',
			array(
				'section'     => 'st_panel_sp_menu_slide',
				'settings'    => 'st_slidemenubg_image_side',
				'label'       => '',
				'description' => '背景画像の横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_slidemenubg_image_top',
			array(
				'default'           => $defaults['st_slidemenubg_image_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_slidemenubg_image_top',
			array(
				'section'     => 'st_panel_sp_menu_slide',
				'settings'    => 'st_slidemenubg_image_top',
				'label'       => '',
				'description' => '背景画像の縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_slidemenubg_image_repeat',
			array(
				'default'           => $defaults['st_slidemenubg_image_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_slidemenubg_image_repeat',
			array(
				'section'     => 'st_panel_sp_menu_slide',
				'settings'    => 'st_slidemenubg_image_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_slidemenubg_image_flex',
			array(
				'default'           => $defaults['st_slidemenubg_image_flex'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_slidemenubg_image_flex',
			array(
				'section'     => 'st_panel_sp_menu_slide',
				'settings'    => 'st_slidemenubg_image_flex',
				'label'       => '背景画像を幅100%のレスポンシブにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_menu_faicon',
			array(
				'default'           => $defaults['st_menu_faicon'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_menu_faicon',
			array(
				'section'     => 'st_panel_sp_menu_slide',
				'settings'    => 'st_menu_faicon',
				'label'       => 'メニューのWebアイコンを非表示',
				'description' => '',
				'type'        => 'checkbox',
			) );

		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_sticky_primary_menu_side',
				array(
					'default'           => $defaults['st_sticky_primary_menu_side'],
					'sanitize_callback' => 'sanitize_checkbox',
				) );
			$wp_customize->add_control( 'st_sticky_primary_menu_side',
				array(
					'section'         => 'st_panel_sp_menu_slide',
					'settings'        => 'st_sticky_primary_menu_side',
					'label'           => 'スクロールで内容対象をヘッダーメニュー（横列）に変更',
					'description'     => '',
					'type'            => 'checkbox',
					'active_callback' => '_st_is_sticky_primary_menu_side_setting_active',
				) );
		endif;

		/*追加メニュー1*/
		$wp_customize->add_setting( 'st_menu_sumart_st_color',
			array(
				'default'              => $defaults['st_menu_sumart_st_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_st_color', array(
			'label'       => __( 'スマホ追加メニュー', 'affinger' ),
			'description' => 'メニューアイコン色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumart_st_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumart_st_bg_color',
			array(
				'default'              => $defaults['st_menu_sumart_st_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_st_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumart_st_bg_color',
		) ) );

		/*追加メニュー2*/
		$wp_customize->add_setting( 'st_menu_sumart_st2_color',
			array(
				'default'              => $defaults['st_menu_sumart_st2_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_st2_color', array(
			'label'       => __( 'スマホ追加メニュー2', 'affinger' ),
			'description' => 'メニューアイコン色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumart_st2_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumart_st2_bg_color',
			array(
				'default'              => $defaults['st_menu_sumart_st2_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_st2_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_slide',
			'settings'    => 'st_menu_sumart_st2_bg_color',
		) ) );

		/*スマホミドルメニュー*/
		$wp_customize->add_section('st_panel_sp_menu_middle', array( // 中パネル
			'title' => 'スマホ ミドル / 横列メニュー',
			'description' => '※PHPによる分岐の為、カスタマイザーでは表示されません',
			'panel' => 'st_panel_stmenus',
		));

		$wp_customize->add_setting( 'st_middle_sumartmenutextcolor',
			array(
				'default'              => $defaults['st_middle_sumartmenutextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_middle_sumartmenutextcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => '文字色',
			'section'     => 'st_panel_sp_menu_middle',
			'settings'    => 'st_middle_sumartmenutextcolor',
		) ) );

		$wp_customize->add_setting( 'st_middle_sumart_bg_color',
			array(
				'default'              => $defaults['st_middle_sumart_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_middle_sumart_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_middle',
			'settings'    => 'st_middle_sumart_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_middle_sumart_bg_color_t',
			array(
				'default'              => $defaults['st_middle_sumart_bg_color_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_middle_sumart_bg_color_t', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色（グラデーション上部※向きはヘッダーナビゲーション連動）',
			'section'     => 'st_panel_sp_menu_middle',
			'settings'    => 'st_middle_sumart_bg_color_t',
		) ) );

		$wp_customize->add_setting( 'st_middle_sumartmenubordercolor',
			array(
				'default'              => $defaults['st_middle_sumartmenubordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_middle_sumartmenubordercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'ボーダー色（ミドルのみ）',
			'section'     => 'st_panel_sp_menu_middle',
			'settings'    => 'st_middle_sumartmenubordercolor',
		) ) );

		$wp_customize->add_setting( 'st_middle_sumartmenu_space',
			array(
				'default'           => $defaults['st_middle_sumartmenu_space'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_middle_sumartmenu_space',
			array(
				'section'     => 'st_panel_sp_menu_middle',
				'settings'    => 'st_middle_sumartmenu_space',
				'label'       => '周りに余白（ミドルのみ）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*スマホフッターメニュー*/
		$wp_customize->add_section('st_panel_sp_menu_footer', array( // 中パネル
			'title' => 'スマホ フッターメニュー',
			'description' => '※PHPによる分岐の為、カスタマイザーでは表示されません',
			'panel' => 'st_panel_stmenus',
		));

		$wp_customize->add_setting( 'st_menu_sumart_footermenu_text_color',
			array(
				'default'              => $defaults['st_menu_sumart_footermenu_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_footermenu_text_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '文字色',
			'section'     => 'st_panel_sp_menu_footer',
			'settings'    => 'st_menu_sumart_footermenu_text_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumart_footermenu_bg_color',
			array(
				'default'              => $defaults['st_menu_sumart_footermenu_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumart_footermenu_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_sp_menu_footer',
			'settings'    => 'st_menu_sumart_footermenu_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_sumart_footermenu_fontawesome',
			array(
				'default'           => $defaults['st_menu_sumart_footermenu_fontawesome'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_menu_sumart_footermenu_fontawesome_c',
			array(
				'section'     => 'st_panel_sp_menu_footer',
				'settings'    => 'st_menu_sumart_footermenu_fontawesome',
				'label'       => '',
				'description' => 'アイコンサイズ(%)',
				'type'        => 'option',
			) );

		if ( st_is_ver_ex_af() ):
		/*ガイドメニュー*/
		$wp_customize->add_section('st_panel_menu_guide', array( // 中パネル
			'title' => 'ガイドメニュー',
			'panel' => 'st_panel_stmenus',
		));

		$wp_customize->add_setting( 'st_guidemenu_bg_color',
			array(
				'default'              => $defaults['st_guidemenu_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_guidemenu_bg_color', array(
			'label'       => __( 'ガイドメニュー', 'affinger' ),
			'description' => '背景色（第一階層）',
			'section'     => 'st_panel_menu_guide',
			'settings'    => 'st_guidemenu_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_guidemenu_radius',
			array(
				'default'           => $defaults['st_guidemenu_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_guidemenu_radius',
			array(
				'section'     => 'st_panel_menu_guide',
				'settings'    => 'st_guidemenu_radius',
				'label'       => '角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_guidemenutextcolor',
			array(
				'default'              => $defaults['st_guidemenutextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_guidemenutextcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'テキスト色（第一階層）',
			'section'     => 'st_panel_menu_guide',
			'settings'    => 'st_guidemenutextcolor',
		) ) );

		$wp_customize->add_setting( 'st_guidemenutextcolor2',
			array(
				'default'              => $defaults['st_guidemenutextcolor2'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_guidemenutextcolor2', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'テキスト色（第二階層以下）',
			'section'     => 'st_panel_menu_guide',
			'settings'    => 'st_guidemenutextcolor2',
		) ) );

		$wp_customize->add_setting( 'st_guide_bg_color',
			array(
				'default'              => $defaults['st_guide_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_guide_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色（記事内用タグのみ）',
			'section'     => 'st_panel_menu_guide',
			'settings'    => 'st_guide_bg_color',
		) ) );
		endif;

		/*ボックスメニュー*/
		$wp_customize->add_section('st_panel_menu_boxnavi', array( // 中パネル
			'title' => 'ボックスメニュー',
			'panel' => 'st_panel_stmenus',
			'description' => 'ショートコードで作成するボックスメニュー',
		));

		$wp_customize->add_setting( 'st_boxnavimenu_color',
			array(
				'default'              => $defaults['st_boxnavimenu_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_boxnavimenu_color', array(
			'label'       => __( 'ボックスメニュー', 'affinger' ),
			'description' => 'テキスト色',
			'section'     => 'st_panel_menu_boxnavi',
			'settings'    => 'st_boxnavimenu_color',
		) ) );

		$wp_customize->add_setting( 'st_boxnavimenu_bg_color',
			array(
				'default'              => $defaults['st_boxnavimenu_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_boxnavimenu_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_menu_boxnavi',
			'settings'    => 'st_boxnavimenu_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_boxnavimenu_bordercolor',
			array(
				'default'              => $defaults['st_boxnavimenu_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_boxnavimenu_bordercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'ボーダー色',
			'section'     => 'st_panel_menu_boxnavi',
			'settings'    => 'st_boxnavimenu_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_boxnavimenu_fontawesome',
			array(
				'default'           => $defaults['st_boxnavimenu_fontawesome'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_boxnavimenu_fontawesome_c',
			array(
				'section'     => 'st_panel_menu_boxnavi',
				'settings'    => 'st_boxnavimenu_fontawesome',
				'label'       => '',
				'description' => 'アイコンサイズ(%)',
				'type'        => 'option',
			) );

		/*-------------------------------------------------------
		各見出し
		-------------------------------------------------------*/

		$wp_customize->add_panel( 'st_panel_tagcolors',
			array(
				'title'       => __( '見出しタグ（hx）/ テキスト', 'affinger' ),
				'priority'    => 101,
			) );

		$wp_customize->add_section('color_controls_tagcolors', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_tagcolors',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_tagcolors' );

		$wp_customize->add_section('st_panel_entrytitle', array( // 中パネル
			'title' => '記事タイトル',
			'panel' => 'st_panel_tagcolors',
		));

		/*記事タイトル*/

		$wp_customize->add_setting( 'st_entrytitle_color',
			array(
				'default'              => $defaults['st_entrytitle_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_entrytitle_color', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_entrytitle',
			'settings'    => 'st_entrytitle_color',
		) ) );

		$wp_customize->add_setting( 'st_entrytitle_bgcolor',
			array(
				'default'              => $defaults['st_entrytitle_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_entrytitle_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_entrytitle',
			'settings'    => 'st_entrytitle_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_entrytitle_bgcolor_t',
			array(
				'default'              => $defaults['st_entrytitle_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_entrytitle_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'グラデーション上部',
			'section'     => 'st_panel_entrytitle',
			'settings'    => 'st_entrytitle_bgcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_entrytitleborder_color',
			array(
				'default'              => $defaults['st_entrytitleborder_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_setting( 'st_entrytitle_gradient',
			array(
				'default'           => $defaults['st_entrytitle_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_gradient',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_entrytitleborder_color', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_entrytitle',
			'settings'    => 'st_entrytitleborder_color',
		) ) );

		$wp_customize->add_setting( 'st_entrytitleborder_undercolor',
			array(
				'default'              => $defaults['st_entrytitleborder_undercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_entrytitleborder_undercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サブ',
			'section'     => 'st_panel_entrytitle',
			'settings'    => 'st_entrytitleborder_undercolor',
		) ) );

		$wp_customize->add_setting( 'st_entrytitle_border_tb',
			array(
				'default'           => $defaults['st_entrytitle_border_tb'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_border_tb',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_border_tb',
				'label'       => '上下のみにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entrytitle_border_tb_sub',
			array(
				'default'           => $defaults['st_entrytitle_border_tb_sub'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_border_tb_sub',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_border_tb_sub',
				'label'       => '下をサブカラーにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entrytitle_border_size',
			array(
				'default'           => $defaults['st_entrytitle_border_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_entrytitle_border_size_c',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_border_size',
				'label'       => '',
				'description' => '太さ（px）',
				'type'        => 'option',
			) );


		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_entrytitle_designsetting',
				array(
					'default'           => $defaults['st_entrytitle_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_entrytitle_designsetting',
				array(
					'section'     => 'st_panel_entrytitle',
					'settings'    => 'st_entrytitle_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'           => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'hukidasidesign_under'     => __( '吹き出し下線デザインに変更', 'affinger' ),
						'linedesign'               => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'          => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign' => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'         => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'          => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'            => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'           => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'           => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						''                         => __( 'なし', 'affinger' ),
					),
				) );
		else:
			$wp_customize->add_setting( 'st_entrytitle_designsetting',
				array(
					'default'           => $defaults['st_entrytitle_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_entrytitle_designsetting',
				array(
					'section'     => 'st_panel_entrytitle',
					'settings'    => 'st_entrytitle_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'           => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'linedesign'               => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'          => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign' => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'         => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'          => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'            => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'           => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'           => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						''                         => __( 'なし', 'affinger' ),
					),
				) );
		endif;

		//背景画像

		$wp_customize->add_setting( 'st_entrytitle_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'entrytitle_Image',
			array(
				'label'       => __( '背景画像', 'affinger' ),
				'section'     => 'st_panel_entrytitle',
				'description' => '',
				'settings'    => 'st_entrytitle_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_entrytitle_bgimg_side',
			array(
				'default'           => $defaults['st_entrytitle_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_entrytitle_bgimg_side',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bgimg_side',
				'label'       => '',
				'description' => '背景画像の横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_entrytitle_bgimg_top',
			array(
				'default'           => $defaults['st_entrytitle_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_entrytitle_bgimg_top',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bgimg_top',
				'label'       => '',
				'description' => '背景画像の縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_entrytitle_bgimg_repeat',
			array(
				'default'           => $defaults['st_entrytitle_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_bgimg_repeat',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entrytitle_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_entrytitle_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_entrytitle_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_entrytitle_bgimg_tupadding',
			array(
				'default'           => $defaults['st_entrytitle_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_entrytitle_tupadding_c',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_entrytitle_bgimg_margin',
			array(
				'default'           => $defaults['st_entrytitle_bgimg_margin'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_entrytitle_bgimg_margin_c',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bgimg_margin',
				'label'       => '',
				'description' => '下のマージン（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_entrytitle_text_center',
			array(
				'default'           => $defaults['st_entrytitle_text_center'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_text_center',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_text_center',
				'label'       => 'テキストを中央寄せ',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entrytitle_design_wide',
			array(
				'default'           => $defaults['st_entrytitle_design_wide'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_design_wide',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_design_wide',
				'label'       => 'デザインを幅一杯に',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entrytitle_bg_radius',
			array(
				'default'           => $defaults['st_entrytitle_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_bg_radius',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_entrytitle_no_css',
			array(
				'default'           => $defaults['st_entrytitle_no_css'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_entrytitle_no_css',
			array(
				'section'     => 'st_panel_entrytitle',
				'settings'    => 'st_entrytitle_no_css',
				'label'       => 'カスタマイザーのCSSを無効化',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*h2タグ*/
		$wp_customize->add_section('st_panel_h2', array( // 中パネル
			'title' => '大見出し（H2タグ）',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_h2_color',
			array(
				'default'              => $defaults['st_h2_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h2_color', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h2',
			'settings'    => 'st_h2_color',
		) ) );

		$wp_customize->add_setting( 'st_h2_bgcolor',
			array(
				'default'              => $defaults['st_h2_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h2_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h2',
			'settings'    => 'st_h2_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_h2_bgcolor_t',
			array(
				'default'              => $defaults['st_h2_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h2_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'グラデーション上部',
			'section'     => 'st_panel_h2',
			'settings'    => 'st_h2_bgcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_h2_gradient',
			array(
				'default'           => $defaults['st_h2_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_gradient',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2border_color',
			array(
				'default'              => $defaults['st_h2border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h2border_color', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h2',
			'settings'    => 'st_h2border_color',
		) ) );

		$wp_customize->add_setting( 'st_h2border_undercolor',
			array(
				'default'              => $defaults['st_h2border_undercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h2border_undercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サブ',
			'section'     => 'st_panel_h2',
			'settings'    => 'st_h2border_undercolor',
		) ) );

		$wp_customize->add_setting( 'st_h2_border_tb',
			array(
				'default'           => $defaults['st_h2_border_tb'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_border_tb',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_border_tb',
				'label'       => '上下のみにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2_border_tb_sub',
			array(
				'default'           => $defaults['st_h2_border_tb_sub'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_border_tb_sub',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_border_tb_sub',
				'label'       => '下をサブカラーにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2_border_size',
			array(
				'default'           => $defaults['st_h2_border_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h2_border_size_c',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_border_size',
				'label'       => '',
				'description' => '太さ（px）',
				'type'        => 'option',
			) );

		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_h2_designsetting',
				array(
					'default'           => $defaults['st_h2_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_h2_designsetting',
				array(
					'section'     => 'st_panel_h2',
					'settings'    => 'st_h2_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'            => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'hukidasidesign_under'      => __( '吹き出し下線デザインに変更', 'affinger' ),
						'linedesign'                => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'           => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign'  => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'          => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'           => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                 => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'             => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'            => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'            => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'checkboxdesign'            => __( 'チェック（ボックスタイプ）デザインに変更', 'affinger' ),
						//'countdesign'               => __( 'カウントデザインに変更', 'affinger' ),
						''                          => __( 'なし', 'affinger' ),
					),
				) );
		elseif ( st_is_ver_af() ):
			$wp_customize->add_setting( 'st_h2_designsetting',
				array(
					'default'           => $defaults['st_h2_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_h2_designsetting',
				array(
					'section'     => 'st_panel_h2',
					'settings'    => 'st_h2_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'            => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'linedesign'                => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'           => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign'  => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'          => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'           => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                 => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'             => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'            => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'            => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'checkboxdesign'            => __( 'チェック（ボックスタイプ）デザインに変更', 'affinger' ),
						//'countdesign'               => __( 'カウントデザインに変更', 'affinger' ),
						''                          => __( 'なし', 'affinger' ),
					),
				) );
		else:
			$wp_customize->add_setting( 'st_h2_designsetting',
				array(
					'default'           => $defaults['st_h2_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_h2_designsetting',
				array(
					'section'     => 'st_panel_h2',
					'settings'    => 'st_h2_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'            => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'linedesign'                => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'           => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign'  => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'          => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'           => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                 => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'             => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'            => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'            => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						//'countdesign'               => __( 'カウントデザインに変更', 'affinger' ),
						''                          => __( 'なし', 'affinger' ),
					),
				) );
			endif;

		//背景画像

		$wp_customize->add_setting( 'st_h2_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'h2_Image',
			array(
				'label'       => __( '背景画像', 'affinger' ),
				'section'     => 'st_panel_h2',
				'description' => '',
				'settings'    => 'st_h2_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_h2_bgimg_side',
			array(
				'default'           => $defaults['st_h2_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h2_bgimg_side',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h2_bgimg_top',
			array(
				'default'           => $defaults['st_h2_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h2_bgimg_top',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h2_bgimg_repeat',
			array(
				'default'           => $defaults['st_h2_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_bgimg_repeat',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_h2_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h2_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h2_bgimg_tupadding',
			array(
				'default'           => $defaults['st_h2_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h2_tupadding_c',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h2_bgimg_tumargin',
			array(
				'default'           => $defaults['st_h2_bgimg_tumargin'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h2_bgimg_tumargin_c',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bgimg_tumargin',
				'label'       => '',
				'description' => '上下のマージン（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h2_text_center',
			array(
				'default'           => $defaults['st_h2_text_center'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_text_center',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_text_center',
				'label'       => 'テキストを中央寄せ',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2_design_wide',
			array(
				'default'           => $defaults['st_h2_design_wide'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_design_wide',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_design_wide',
				'label'       => 'デザインを幅一杯に',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2_bg_radius',
			array(
				'default'           => $defaults['st_h2_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_bg_radius',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h2_no_css',
			array(
				'default'           => $defaults['st_h2_no_css'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h2_no_css',
			array(
				'section'     => 'st_panel_h2',
				'settings'    => 'st_h2_no_css',
				'label'       => 'カスタマイザーのCSSを無効化',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*h3タグ*/
		$wp_customize->add_section('st_panel_h3', array( // 中パネル
			'title' => '中見出し（H3タグ）',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_h3_color',
			array(
				'default'              => $defaults['st_h3_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h3_color', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h3',
			'settings'    => 'st_h3_color',
		) ) );

		$wp_customize->add_setting( 'st_h3_bgcolor',
			array(
				'default'              => $defaults['st_h3_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h3_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h3',
			'settings'    => 'st_h3_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_h3_bgcolor_t',
			array(
				'default'              => $defaults['st_h3_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h3_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'グラデーション上部',
			'section'     => 'st_panel_h3',
			'settings'    => 'st_h3_bgcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_h3_gradient',
			array(
				'default'           => $defaults['st_h3_gradient'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_gradient',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_gradient',
				'label'       => 'グラデーションを横向きにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3border_color',
			array(
				'default'              => $defaults['st_h3border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h3border_color', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h3',
			'settings'    => 'st_h3border_color',
		) ) );

		$wp_customize->add_setting( 'st_h3border_undercolor',
			array(
				'default'              => $defaults['st_h3border_undercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h3border_undercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サブ',
			'section'     => 'st_panel_h3',
			'settings'    => 'st_h3border_undercolor',
		) ) );

		$wp_customize->add_setting( 'st_h3_border_tb',
			array(
				'default'           => $defaults['st_h3_border_tb'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_border_tb',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_border_tb',
				'label'       => ' 上下のみにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3_border_tb_sub',
			array(
				'default'           => $defaults['st_h3_border_tb_sub'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_border_tb_sub',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_border_tb_sub',
				'label'       => '下をサブカラーにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3_border_size',
			array(
				'default'           => $defaults['st_h3_border_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h3_border_size_c',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_border_size',
				'label'       => '',
				'description' => '太さ（px）',
				'type'        => 'option',
			) );

		if ( st_is_ver_ex() ):
			$wp_customize->add_setting( 'st_h3_designsetting',
				array(
					'default'           => $defaults['st_h3_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_h3_designsetting',
				array(
					'section'     => 'st_panel_h3',
					'settings'    => 'st_h3_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'            => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'hukidasidesign_under'      => __( '吹き出し下線デザインに変更', 'affinger' ),
						'linedesign'                => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'           => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign'  => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'          => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'           => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                 => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'             => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'            => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'            => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'checkboxdesign'            => __( 'チェック（ボックスタイプ）デザインに変更', 'affinger' ),
						//'countdesign'               => __( 'カウントデザインに変更', 'affinger' ),
						''                          => __( 'なし', 'affinger' ),
					),
				) );
		elseif ( st_is_ver_af() ):
			$wp_customize->add_setting( 'st_h3_designsetting',
				array(
					'default'           => $defaults['st_h3_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_h3_designsetting',
				array(
					'section'     => 'st_panel_h3',
					'settings'    => 'st_h3_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'            => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'linedesign'                => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'           => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign'  => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'          => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'           => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                 => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'             => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'            => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'            => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'checkboxdesign'            => __( 'チェック（ボックスタイプ）デザインに変更', 'affinger' ),
						//'countdesign'               => __( 'カウントデザインに変更', 'affinger' ),
						''                          => __( 'なし', 'affinger' ),
					),
				) );
		else:
			$wp_customize->add_setting( 'st_h3_designsetting',
				array(
					'default'           => $defaults['st_h3_designsetting'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_h3_designsetting',
				array(
					'section'     => 'st_panel_h3',
					'settings'    => 'st_h3_designsetting',
					'label'       => __( 'デザインスタイル', 'affinger' ),
					'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
					'type'        => 'radio',
					'choices'     => array(
						'hukidasidesign'            => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
						'linedesign'                => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						'underlinedesign'           => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'gradient_underlinedesign'  => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'centerlinedesign'          => __( 'センターラインに変更（※要ボーダー色）', 'affinger' ),
						'shortlinedesign'           => __( 'ショートラインに変更（※要ボーダー色）', 'affinger' ),
						'dotdesign'                 => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
						'stripe_design'             => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
						'underdotdesign'            => __( '破線アンダーラインに変更（※要ボーダー色）', 'affinger' ),
						'leftlinedesign'            => __( '左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
						//'countdesign'               => __( 'カウントデザインに変更', 'affinger' ),
						''                          => __( 'なし', 'affinger' ),
					),
				) );
		endif;

		//背景画像

		$wp_customize->add_setting( 'st_h3_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'h3_Image',
			array(
				'label'       => __( '背景画像', 'affinger' ),
				'section'     => 'st_panel_h3',
				'description' => '',
				'settings'    => 'st_h3_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_h3_bgimg_side',
			array(
				'default'           => $defaults['st_h3_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h3_bgimg_side',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h3_bgimg_top',
			array(
				'default'           => $defaults['st_h3_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h3_bgimg_top',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h3_bgimg_repeat',
			array(
				'default'           => $defaults['st_h3_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_bgimg_repeat',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_h3_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h3_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h3_bgimg_tupadding',
			array(
				'default'           => $defaults['st_h3_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h3_tupadding_c',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h3_bgimg_tumargin',
			array(
				'default'           => $defaults['st_h3_bgimg_tumargin'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h3_bgimg_tumargin_c',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bgimg_tumargin',
				'label'       => '',
				'description' => '上下のマージン（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h3_text_center',
			array(
				'default'           => $defaults['st_h3_text_center'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_text_center',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_text_center',
				'label'       => 'テキストを中央寄せ',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3_design_wide',
			array(
				'default'           => $defaults['st_h3_design_wide'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_design_wide',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_design_wide',
				'label'       => 'デザインを幅一杯に',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3_bg_radius',
			array(
				'default'           => $defaults['st_h3_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_bg_radius',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h3_no_css',
			array(
				'default'           => $defaults['st_h3_no_css'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h3_no_css',
			array(
				'section'     => 'st_panel_h3',
				'settings'    => 'st_h3_no_css',
				'label'       => 'カスタマイザーのCSSを無効化',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*h4タグ*/
		$wp_customize->add_section('st_panel_h4', array( // 中パネル
			'title' => '小見出し（H4タグ）',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_h4_textcolor',
			array(
				'default'              => $defaults['st_h4_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h4_textcolor', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h4',
			'settings'    => 'st_h4_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_h4bordercolor',
			array(
				'default'              => $defaults['st_h4bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h4bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h4',
			'settings'    => 'st_h4bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_h4_top_border',
			array(
				'default'           => $defaults['st_h4_top_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_top_border_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_top_border',
				'label'       => '上にボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_bottom_border',
			array(
				'default'           => $defaults['st_h4_bottom_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_bottom_border_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bottom_border',
				'label'       => '下にボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_design',
			array(
				'default'           => $defaults['st_h4_design'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_design_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_design',
				'label'       => '左ボーダーを付ける',
				'description' => '※上下も有効な場合は右ボーダーも追加',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_border_size',
			array(
				'default'           => $defaults['st_h4_border_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h4_border_size_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_border_size',
				'label'       => '',
				'description' => 'ボーダーの太さ（px）',
				'type'        => 'option',
			) );


		$wp_customize->add_setting( 'st_h4bgcolor',
			array(
				'default'              => $defaults['st_h4bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h4bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h4',
			'settings'    => 'st_h4bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_h4hukidasi_design',
			array(
				'default'           => $defaults['st_h4hukidasi_design'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h4hukidasi_design',
			array(
			'section'     => 'st_panel_h4',
			'settings'    => 'st_h4hukidasi_design',
			'label'       => 'デザインスタイル',
			'description' => '',
			'type'        => 'radio',
			'choices'     => array(
				'hukidasidesign'  => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
				'dogears'         => __( '耳折れデザインに変更（※要背景色）', 'affinger' ),
				'stripe'          => __( 'ストライプデザインに変更', 'affinger' ),
				''                => __( 'なし', 'affinger' ),
			),
		) );

		//背景画像

		$wp_customize->add_setting( 'st_h4_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'h4_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_h4',
				'description' => '',
				'settings'    => 'st_h4_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_h4_bgimg_side',
			array(
				'default'           => $defaults['st_h4_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h4_bgimg_side',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h4_bgimg_top',
			array(
				'default'           => $defaults['st_h4_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h4_bgimg_top',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h4_bgimg_repeat',
			array(
				'default'           => $defaults['st_h4_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_bgimg_repeat',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_h4_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h4_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h4_bgimg_tupadding',
			array(
				'default'           => $defaults['st_h4_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h4_tupadding_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h4_bg_radius',
			array(
				'default'           => $defaults['st_h4_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_bg_radius',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_husen_shadow',
			array(
				'default'           => $defaults['st_h4_husen_shadow'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_husen_shadow_c',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_husen_shadow',
				'label'       => 'ふせん風の影をつける（※要背景色）',

				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_no_css',
			array(
				'default'           => $defaults['st_h4_no_css'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_no_css',
			array(
				'section'     => 'st_panel_h4',
				'settings'    => 'st_h4_no_css',
				'label'       => 'カスタマイザーのCSSを無効化',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*h5タグ*/
		$wp_customize->add_section('st_panel_h5', array( // 中パネル
			'title' => '小見出し（H5タグ）',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_h5_textcolor',
			array(
				'default'              => $defaults['st_h5_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h5_textcolor', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h5',
			'settings'    => 'st_h5_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_h5bordercolor',
			array(
				'default'              => $defaults['st_h5bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h5bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h5',
			'settings'    => 'st_h5bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_h5_top_border',
			array(
				'default'           => $defaults['st_h5_top_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_top_border_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_top_border',
				'label'       => '上にボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h5_bottom_border',
			array(
				'default'           => $defaults['st_h5_bottom_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_bottom_border_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bottom_border',
				'label'       => '下にボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h5_design',
			array(
				'default'           => $defaults['st_h5_design'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_design_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_design',
				'label'       => '左ボーダーを付ける',
				'description' => '※上下も有効な場合は右ボーダーも追加',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h5bgcolor',
			array(
				'default'              => $defaults['st_h5bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h5bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h5',
			'settings'    => 'st_h5bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_h5_border_size',
			array(
				'default'           => $defaults['st_h5_border_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h5_border_size_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_border_size',
				'label'       => '',
				'description' => 'ボーダーの太さ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h5hukidasi_design',
			array(
				'default'           => $defaults['st_h5hukidasi_design'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h5hukidasi_design',
			array(
			'section'     => 'st_panel_h5',
			'settings'    => 'st_h5hukidasi_design',
			'label'       => 'デザインスタイル',
			'description' => '',
			'type'        => 'radio',
			'choices'     => array(
				'hukidasidesign'  => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
				'dogears'         => __( '耳折れデザインに変更（※要背景色）', 'affinger' ),
				'stripe'          => __( 'ストライプデザインに変更', 'affinger' ),
				''                => __( 'なし', 'affinger' ),
			),
		) );

		//背景画像

		$wp_customize->add_setting( 'st_h5_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'h5_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_h5',
				'description' => '',
				'settings'    => 'st_h5_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_h5_bgimg_side',
			array(
				'default'           => $defaults['st_h5_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h5_bgimg_side',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h5_bgimg_top',
			array(
				'default'           => $defaults['st_h5_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h5_bgimg_top',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h5_bgimg_repeat',
			array(
				'default'           => $defaults['st_h5_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_bgimg_repeat',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h5_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_h5_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h5_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h5_bgimg_tupadding',
			array(
				'default'           => $defaults['st_h5_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h5_tupadding_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h5_bg_radius',
			array(
				'default'           => $defaults['st_h5_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_bg_radius',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h5_husen_shadow',
			array(
				'default'           => $defaults['st_h5_husen_shadow'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_husen_shadow_c',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_husen_shadow',
				'label'       => 'ふせん風の影をつける（※要背景色）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h5_no_css',
			array(
				'default'           => $defaults['st_h5_no_css'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h5_no_css',
			array(
				'section'     => 'st_panel_h5',
				'settings'    => 'st_h5_no_css',
				'label'       => 'カスタマイザーのCSSを無効化',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*h4（まとめ）タグ*/
		$wp_customize->add_section('st_panel_h4_matome', array( // 中パネル
			'title' => 'まとめタグ',
			'panel' => 'st_panel_tagcolors',
		));


		$wp_customize->add_setting( 'st_h4_matome_textcolor',
			array(
				'default'              => $defaults['st_h4_matome_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h4_matome_textcolor', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h4_matome',
			'settings'    => 'st_h4_matome_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_h4_matome_bordercolor',
			array(
				'default'              => $defaults['st_h4_matome_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h4_matome_bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h4_matome',
			'settings'    => 'st_h4_matome_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_h4_matome_design',
			array(
				'default'           => $defaults['st_h4_matome_design'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_design_c',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_design',
				'label'       => '左ボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_matome_top_border',
			array(
				'default'           => $defaults['st_h4_matome_top_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_top_border_c',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_top_border',
				'label'       => '上にボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_matome_bottom_border',
			array(
				'default'           => $defaults['st_h4_matome_bottom_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_bottom_border_c',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bottom_border',
				'label'       => '下にボーダーを付ける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_matome_bgcolor',
			array(
				'default'              => $defaults['st_h4_matome_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_h4_matome_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_h4_matome',
			'settings'    => 'st_h4_matome_bgcolor',
		) ) );

		//背景画像

		$wp_customize->add_setting( 'st_h4_matome_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',


				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'h4_matome_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_h4_matome',
				'description' => '',
				'settings'    => 'st_h4_matome_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_h4_matome_bgimg_side',
			array(
				'default'           => $defaults['st_h4_matome_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h4_matome_bgimg_side',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h4_matome_bgimg_top',
			array(
				'default'           => $defaults['st_h4_matome_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_h4_matome_bgimg_top',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_h4_matome_bgimg_repeat',
			array(
				'default'           => $defaults['st_h4_matome_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_bgimg_repeat',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_matome_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_h4_matome_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h4_matome_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h4_matome_bgimg_tupadding',
			array(
				'default'           => $defaults['st_h4_matome_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_h4_matome_tupadding_c',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_h4_matome_hukidasi_design',
			array(
				'default'           => $defaults['st_h4_matome_hukidasi_design'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_hukidasi_design',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_hukidasi_design',
				'label'       => '吹き出しデザインに変更（※要背景色）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_matome_bg_radius',
			array(
				'default'           => $defaults['st_h4_matome_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_bg_radius',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_h4_matome_no_css',
			array(
				'default'           => $defaults['st_h4_matome_no_css'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_h4_matome_no_css',
			array(
				'section'     => 'st_panel_h4_matome',
				'settings'    => 'st_h4_matome_no_css',
				'label'       => 'カスタマイザーのCSSを無効化',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*ウィジェットタイトル（サイドバー）*/
		$wp_customize->add_section('st_panel_widgets_title', array( // 中パネル
			'title' => 'ウィジェットタイトル（サイドバー）',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_widgets_title_color',
			array(
				'default'              => $defaults['st_widgets_title_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_widgets_title_color', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_widgets_title',
			'settings'    => 'st_widgets_title_color',
		) ) );


		$wp_customize->add_setting( 'st_widgets_title_bgcolor',
			array(
				'default'              => $defaults['st_widgets_title_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_widgets_title_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_widgets_title',
			'settings'    => 'st_widgets_title_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_widgets_title_bgcolor_t',
			array(
				'default'              => $defaults['st_widgets_title_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_widgets_title_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'グラデーション上部',
			'section'     => 'st_panel_widgets_title',
			'settings'    => 'st_widgets_title_bgcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_widgets_titleborder_color',
			array(
				'default'              => $defaults['st_widgets_titleborder_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_widgets_titleborder_color', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_widgets_title',
			'settings'    => 'st_widgets_titleborder_color',
		) ) );

		$wp_customize->add_setting( 'st_widgets_titleborder_undercolor',
			array(
				'default'              => $defaults['st_widgets_titleborder_undercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_widgets_titleborder_undercolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'サブ',
			'section'     => 'st_panel_widgets_title',
			'settings'    => 'st_widgets_titleborder_undercolor',
		) ) );

		$wp_customize->add_setting( 'st_widgets_titleborder_size',
			array(
				'default'           => $defaults['st_widgets_titleborder_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_widgets_titleborder_size_c',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_titleborder_size',
				'label'       => '',
				'description' => 'ボーダーの太さ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_widgets_title_designsetting',
			array(
				'default'           => $defaults['st_widgets_title_designsetting'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_widgets_title_designsetting',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_designsetting',
				'label'       => 'デザインスタイル',
				'description' => '※スタイルにより文字、背景、ボーダー色の反映の有無は異なります',
				'type'        => 'radio',
				'choices'     => array(
					'hukidasidesign'       => __( '吹き出しデザインに変更（※要背景色）', 'affinger' ),
					'leftlinedesign' => __( '左ラインに変更（※要ボーダー色）', 'affinger' ),
					'linedesign'     => __( '囲み&左ラインデザインに変更（※要ボーダー色）', 'affinger' ),
					'underlinedesign'     => __( '2色アンダーラインに変更（※要ボーダー色）', 'affinger' ),
					'gradient_underlinedesign'     => __( 'グラデーションアンダーラインに変更（※要ボーダー色）', 'affinger' ),
					'dotdesign' => __( '囲みドットデザインに変更（※要ボーダー色）', 'affinger' ),
					'stripe_design' => __( 'ストライプデザインに変更（※要背景色）', 'affinger' ),
					''             => __( 'なし', 'affinger' ),
				),
			) );

		//背景画像

		$wp_customize->add_setting( 'st_widgets_title_bgimg',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'widgets_title_Image',
			array(
				'label'       => '背景画像',
				'section'     => 'st_panel_widgets_title',
				'description' => '',
				'settings'    => 'st_widgets_title_bgimg',
			)
		) );

		$wp_customize->add_setting( 'st_widgets_title_bgimg_side',
			array(
				'default'           => $defaults['st_widgets_title_bgimg_side'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_widgets_title_bgimg_side',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_bgimg_side',
				'label'       => '',
				'description' => '横位置',
				'type'        => 'radio',
				'choices'     => array(
					'left'   => __( '左', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'right'  => __( '右', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_widgets_title_bgimg_top',
			array(
				'default'           => $defaults['st_widgets_title_bgimg_top'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_widgets_title_bgimg_top',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_bgimg_top',
				'label'       => '',
				'description' => '縦位置',
				'type'        => 'radio',
				'choices'     => array(
					'top'    => __( '上', 'affinger' ),
					'center' => __( '真ん中', 'affinger' ),
					'bottom' => __( '下', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_widgets_title_bgimg_repeat',
			array(
				'default'           => $defaults['st_widgets_title_bgimg_repeat'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_widgets_title_bgimg_repeat',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_bgimg_repeat',
				'label'       => '背景画像を繰り返さない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_widgets_title_bgimg_leftpadding',
			array(
				'default'           => $defaults['st_widgets_title_bgimg_leftpadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_widgets_title_bgimg_leftpadding_c',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_bgimg_leftpadding',
				'label'       => '調整',
				'description' => '左の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_widgets_title_bgimg_tupadding',
			array(
				'default'           => $defaults['st_widgets_title_bgimg_tupadding'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_widgets_title_tupadding_c',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_bgimg_tupadding',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_widgets_title_bg_radius',
			array(
				'default'           => $defaults['st_widgets_title_bg_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_widgets_title_bg_radius',
			array(
				'section'     => 'st_panel_widgets_title',
				'settings'    => 'st_widgets_title_bg_radius',
				'label'       => '背景や吹き出しの角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );


		/*カテゴリー*/
		$wp_customize->add_section('st_panel_catlink', array( // 中パネル
			'title' => 'カテゴリー / 広告（PR）',
			'description' => '各カテゴリー編集ページで個別にも設定できます',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_catbg_color',
			array(
				'default'              => $defaults['st_catbg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_catbg_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '背景色',
			'section'     => 'st_panel_catlink',
			'settings'    => 'st_catbg_color',
		) ) );

		$wp_customize->add_setting( 'st_cattext_color',
			array(
				'default'              => $defaults['st_cattext_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_cattext_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '文字色',
			'section'     => 'st_panel_catlink',
			'settings'    => 'st_cattext_color',
		) ) );

		$wp_customize->add_setting( 'st_cattext_radius',
			array(
				'default'           => $defaults['st_cattext_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_cattext_radius',
			array(
				'section'     => 'st_panel_catlink',
				'settings'    => 'st_cattext_radius',
				'label'       => '角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_ad_display_bg_color',
			array(
				'default'              => $defaults['st_ad_display_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_ad_display_bg_color', array(
			'label'       => __( '広告（PR）', 'affinger' ),
			'description' => '背景色（アウトライン）',
			'section'     => 'st_panel_catlink',
			'settings'    => 'st_ad_display_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_ad_display_text_color',
			array(
				'default'              => $defaults['st_ad_display_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_ad_display_text_color', array(
			'label'       => __( '', 'affinger' ),
			'description' => '文字色（※画像非対応）',
			'section'     => 'st_panel_catlink',
			'settings'    => 'st_ad_display_text_color',
		) ) );

		$wp_customize->add_setting( 'st_ad_display_style',
			array(
				'default'           => $defaults['st_ad_display_style'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_ad_display_style',
			array(
				'section'     => 'st_panel_catlink',
				'settings'    => 'st_ad_display_style',
				'label'       => '',
				'description' => 'スタイル',
				'type'        => 'radio',
				'choices'     => array(
					''   => __( 'ノーマル', 'affinger' ),
					'solid' => __( 'アウトライン', 'affinger' ),
				),
			) );

		/*投稿日時・ぱんくず・タグ*/
		$wp_customize->add_section('st_panel_kuzu', array( // 中パネル
			'title' => '投稿日時・ぱんくず・タグ',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_kuzu_color',
			array(
				'default'              => $defaults['st_kuzu_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kuzu_color', array(
			'label'       => __( '投稿日時・ぱんくず・タグ', 'affinger' ),
			'description' => '基本テキスト色',
			'section'     => 'st_panel_kuzu',
			'settings'    => 'st_kuzu_color',
		) ) );

		$wp_customize->add_setting( 'st_kuzu_b_color',
			array(
				'default'              => $defaults['st_kuzu_b_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kuzu_b_color', array(
			'label'       => 'スタイルB',
			'description' => 'テキスト色',
			'section'     => 'st_panel_kuzu',
			'settings'    => 'st_kuzu_b_color',
		) ) );

		$wp_customize->add_setting( 'st_kuzu_b_bg_color',
			array(
				'default'              => $defaults['st_kuzu_b_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kuzu_b_bg_color', array(
			'label'       => '',
			'description' => '背景色',
			'section'     => 'st_panel_kuzu',
			'settings'    => 'st_kuzu_b_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_kuzu_b_color_writer',
			array(
				'default'              => $defaults['st_kuzu_b_color_writer'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kuzu_b_color_writer', array(
			'label'       => '',
			'description' => '執筆者 テキスト色',
			'section'     => 'st_panel_kuzu',
			'settings'    => 'st_kuzu_b_color_writer',
		) ) );

		$wp_customize->add_setting( 'st_kuzu_b_bg_color_writer',
			array(
				'default'              => $defaults['st_kuzu_b_bg_color_writer'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kuzu_b_bg_color_writer', array(
			'label'       => '',
			'description' => '執筆者 背景色',
			'section'     => 'st_panel_kuzu',
			'settings'    => 'st_kuzu_b_bg_color_writer',
		) ) );

		$wp_customize->add_setting( 'st_kuzu_b',
			array(
				'default'           => $defaults['st_kuzu_b'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_kuzu_b',
			array(
				'section'     => 'st_panel_kuzu',
				'settings'    => 'st_kuzu_b',
				'label'       => 'スタイルBに変更 （記事タイトル下に執筆者も表示する）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*引用*/
		$wp_customize->add_section('st_panel_blockquote', array( // 中パネル
			'title' => '引用',
			'description' => '',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_blockquote_color',
			array(
				'default'              => $defaults['st_blockquote_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_blockquote_color', array(
			'label'    => __( '背景色', 'affinger' ),
			'section'  => 'st_panel_blockquote',
			'settings' => 'st_blockquote_color',
		) ) );

		$wp_customize->add_setting( 'st_blockquote_icon_color',
			array(
				'default'              => $defaults['st_blockquote_icon_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_blockquote_icon_color', array(
			'label'    => __( 'アイコン / cite / ライン', 'affinger' ),
			'section'  => 'st_panel_blockquote',
			'settings' => 'st_blockquote_icon_color',
		) ) );

		/*NEW及び関連記事*/
		$wp_customize->add_section('st_panel_new_entry', array( // 中パネル
			'title' => 'NEW ENTRY & 関連記事',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_separator_bgcolor',
			array(
				'default'              => $defaults['st_separator_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_separator_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_new_entry',
			'settings'    => 'st_separator_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_separator_bordercolor',
			array(
				'default'              => $defaults['st_separator_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_separator_bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_new_entry',
			'settings'    => 'st_separator_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_separator_color',
			array(
				'default'              => $defaults['st_separator_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_separator_color', array(
			'label'       => __( '文字色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_new_entry',
			'settings'    => 'st_separator_color',
		) ) );

		$wp_customize->add_setting( 'st_separator_type',
			array(
				'default'           => $defaults['st_separator_type'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_separator_type',
			array(
				'section'     => 'st_panel_new_entry',
				'settings'    => 'st_separator_type',
				'label'       => 'デザインパターン',
				'description' => '',
				'type'        => 'radio',
				'choices'     => array(
				''            => __( 'ノーマル', 'affinger' ),
				'border'      => __( 'ボーダー', 'affinger' ),
				'round'      => __( 'ラウンド', 'affinger' ),
				),
			) );

		/*タグクラウド*/
		$wp_customize->add_section('st_panel_tagcloud', array( // 中パネル
			'title' => 'タグクラウド',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_tagcloud_color',
			array(
				'default'              => $defaults['st_tagcloud_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_tagcloud_color', array(
			'label'       => __( 'テキスト色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_tagcloud',
			'settings'    => 'st_tagcloud_color',
		) ) );

		$wp_customize->add_setting( 'st_tagcloud_bordercolor',
			array(
				'default'              => $defaults['st_tagcloud_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_tagcloud_bordercolor', array(
			'label'       => __( 'ボーダー色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_tagcloud',
			'settings'    => 'st_tagcloud_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_tagcloud_bgcolor',
			array(
				'default'              => $defaults['st_tagcloud_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_tagcloud_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_tagcloud',
			'settings'    => 'st_tagcloud_bgcolor',
		) ) );

		/*記事内テキスト*/
		$wp_customize->add_section('st_panel_main_textcolor', array( // 中パネル
			'title' => 'テキスト色一括変更',
			'panel' => 'st_panel_tagcolors',
		));

		$wp_customize->add_setting( 'st_main_textcolor',
			array(
				'default'              => $defaults['st_main_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_main_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'description' => '記事内のテキストなど※一括変更は注意して御利用下さい（白背景に白文字が適応されると読めなくなります）',
			'section'     => 'st_panel_main_textcolor',
			'settings'    => 'st_main_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_main_textcolor_sub',
			array(
				'default'           => $defaults['st_main_textcolor_sub'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_main_textcolor_sub',
			array(
				'section'     => 'st_panel_main_textcolor',
				'settings'    => 'st_main_textcolor_sub',
				'label'       => '範囲を広げる（記事タイトル・抜粋など）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*記事内リンク色*/

		$wp_customize->add_setting( 'st_link_textcolor',
			array(
				'default'              => $defaults['st_link_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_link_textcolor', array(
			'label'       => __( '記事内リンク色', 'affinger' ),
			'description' => '',
			'section'     => 'st_panel_main_textcolor',
			'settings'    => 'st_link_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_link_hovertextcolor',
			array(
				'default'              => $defaults['st_link_hovertextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_link_hovertextcolor', array(
			'label'       => __( '全てのリンクテキスト', 'affinger' ),
			'description' => 'マウスオーバー色',
			'section'     => 'st_panel_main_textcolor',
			'settings'    => 'st_link_hovertextcolor',
		) ) );

		$wp_customize->add_setting( 'st_link_hoveropacity',
			array(
				'default'           => $defaults['st_link_hoveropacity'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_link_hoveropacity',
			array(
				'section'     => 'st_panel_main_textcolor',
				'settings'    => 'st_link_hoveropacity',
				'label'       => 'マウスオーバー時に透明度を下げる',
				'description' => '',
				'type'        => 'checkbox',
			) );

		if ( _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) ): //AFFINGERブロック有効時のみ
			/*-------------------------------------------------------
			オリジナルブロック
			-------------------------------------------------------*/

			$wp_customize->add_panel( 'st_panel_af_blocks',
				array(
					'title'       => __( 'AFFINGERブロック', 'affinger' ),
					'description' => 'オリジナルブロックのデフォルトカラーを設定します。',
					'priority'    => 102,
				) );

			$wp_customize->add_section('color_controls_af_blocks', array( // カラー
				'title' => 'Color Pallet',
				'panel' => 'st_panel_af_blocks',
			));
			_st_customization_add_color_controls( $wp_customize, 'color_controls_af_blocks' );

			$wp_customize->add_section('st_panel_memo_block', array( // 中パネル
				'title' => 'メモ',
				'panel' => 'st_panel_af_blocks',
			));

			$wp_customize->add_setting( 'st_memo_block_icon_color',
				array(
					'default'              => $defaults['st_memo_block_icon_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_memo_block_icon_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_memo_block',
				'description' => 'アイコン色',
				'settings'    => 'st_memo_block_icon_color',
			) ) );

			$wp_customize->add_setting( 'st_memo_block_bg_color',
				array(
					'default'              => $defaults['st_memo_block_bg_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_memo_block_bg_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_memo_block',
				'description' => '背景色',
				'settings'    => 'st_memo_block_bg_color',
			) ) );

			$wp_customize->add_setting( 'st_memo_block_border_color',
				array(
					'default'              => $defaults['st_memo_block_border_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_memo_block_border_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_memo_block',
				'description' => '枠線',
				'settings'    => 'st_memo_block_border_color',
			) ) );

			$wp_customize->add_section('st_panel_mybox_block', array( // 中パネル
				'title' => 'マイボックス',
				'panel' => 'st_panel_af_blocks',
			));

			$wp_customize->add_setting( 'st_mybox_block_icon_color',
				array(
					'default'              => $defaults['st_mybox_block_icon_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_mybox_block_icon_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_mybox_block',
				'description' => 'アイコン色',
				'settings'    => 'st_mybox_block_icon_color',
			) ) );

			$wp_customize->add_setting( 'st_mybox_block_bg_color',
				array(
					'default'              => $defaults['st_mybox_block_bg_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_mybox_block_bg_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_mybox_block',
				'description' => '背景色',
				'settings'    => 'st_mybox_block_bg_color',
			) ) );

			$wp_customize->add_setting( 'st_mybox_block_border_color',
				array(
					'default'              => $defaults['st_mybox_block_border_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_mybox_block_border_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_mybox_block',
				'description' => '枠線',
				'settings'    => 'st_mybox_block_border_color',
			) ) );

			$wp_customize->add_section('st_panel_freebox_block', array( // 中パネル
				'title' => 'タイトル付きフリーボックス',
				'panel' => 'st_panel_af_blocks',
			));

			$wp_customize->add_setting( 'st_freebox_block_icon_color',
				array(
					'default'              => $defaults['st_freebox_block_icon_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_block_icon_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_freebox_block',
				'description' => 'アイコン色',
				'settings'    => 'st_freebox_block_icon_color',
			) ) );

			$wp_customize->add_setting( 'st_freebox_block_bg_color',
				array(
					'default'              => $defaults['st_freebox_block_bg_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_block_bg_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_freebox_block',
				'description' => '背景色',
				'settings'    => 'st_freebox_block_bg_color',
			) ) );

			$wp_customize->add_setting( 'st_freebox_block_border_color',
				array(
					'default'              => $defaults['st_freebox_block_border_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_block_border_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_freebox_block',
				'description' => '枠線',
				'settings'    => 'st_freebox_block_border_color',
			) ) );

			$wp_customize->add_section('st_panel_banarbox_block', array( // 中パネル
				'title' => 'バナー風ボックス',
				'panel' => 'st_panel_af_blocks',
			));

			$wp_customize->add_setting( 'st_banarbox_block_icon_color',
				array(
					'default'              => $defaults['st_banarbox_block_icon_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_banarbox_block_icon_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_banarbox_block',
				'description' => 'アイコン色',
				'settings'    => 'st_banarbox_block_icon_color',
			) ) );

			$wp_customize->add_setting( 'st_banarbox_block_bg_color',
				array(
					'default'              => $defaults['st_banarbox_block_bg_color'],
					'sanitize_callback'    => 'sanitize_hex_color',
					'sanitize_js_callback' => 'maybe_hash_hex_color',
				) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_banarbox_block_bg_color', array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_banarbox_block',
				'description' => '背景色',
				'settings'    => 'st_banarbox_block_bg_color',
			) ) );
		endif;

		/*-------------------------------------------------------
		オプションカラー
		-------------------------------------------------------*/

		$wp_customize->add_panel( 'st_panel_optioncolors',
			array(
				'title'       => __( 'オプション（その他）', 'affinger' ),
				'priority'    => 103,
			) );

		$wp_customize->add_section('color_controls_optioncolors', array( // カラー
    		'title' => 'Color Pallet',
    		'panel' => 'st_panel_optioncolors',
  		));
		_st_customization_add_color_controls( $wp_customize, 'color_controls_optioncolors' );

		/* プロフィールカード */
		$wp_customize->add_section('st_panel_author_profile', array( // 中パネル
			'title' => 'プロフィールカード',
			'panel' => 'st_panel_optioncolors',
			'description' => 'プロフィールカードはウィジェットにて挿入。内容は「ユーザー」&gt;「プロフィール」にて設定できます',
		));

		$wp_customize->add_setting( 'st_author_profile_header',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'st_author_profile_header_Image',
			array(
				'label'       => 'ヘッダー画像',
				'section'     => 'st_panel_author_profile',
				'description' => '',
				'settings'    => 'st_author_profile_header',
			)
		) );

		$wp_customize->add_setting( 'st_author_profile_avatar',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'st_author_profile_avatar_Image',
			array(
				'label'       => 'アバター画像',
				'section'     => 'st_panel_author_profile',
				'description' => '※150px以上の正方形の画像推奨',
				'settings'    => 'st_author_profile_avatar',
			)
		) );

		$wp_customize->add_setting( 'st_author_profile_avatar_shadow',
			array(
				'default'           => $defaults['st_author_profile_avatar_shadow'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_author_profile_avatar_shadow',
			array(
				'section'     => 'st_panel_author_profile',
				'settings'    => 'st_author_profile_avatar_shadow',
				'label'       => '影をつける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_author_basecolor_profile',
			array(
				'default'              => $defaults['st_author_basecolor_profile'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_basecolor_profile', array(
			'label'       => __( '全体', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => 'ボーダー',
			'settings'    => 'st_author_basecolor_profile',
		) ) );

		$wp_customize->add_setting( 'st_author_text_color_profile',
			array(
				'default'              => $defaults['st_author_text_color_profile'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_text_color_profile', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => 'テキスト色',
			'settings'    => 'st_author_text_color_profile',
		) ) );

		$wp_customize->add_setting( 'st_author_bg_color_profile',
			array(
				'default'              => $defaults['st_author_bg_color_profile'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_bg_color_profile', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => '背景色',
			'settings'    => 'st_author_bg_color_profile',
		) ) );

		$wp_customize->add_setting( 'st_author_profile_shadow',
			array(
				'default'           => $defaults['st_author_profile_shadow'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_author_profile_shadow',
			array(
				'section'     => 'st_panel_author_profile',
				'settings'    => 'st_author_profile_shadow',
				'label'       => '影をつける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_author_profile_radius',
			array(
				'default'           => $defaults['st_author_profile_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_author_profile_radius',
			array(
				'section'     => 'st_panel_author_profile',
				'settings'    => 'st_author_profile_radius',
				'label'       => '角丸にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_author_profile_btn_url',
			array(
				'default'           => $defaults['st_author_profile_btn_url'],
				'sanitize_callback' => 'esc_url_raw',
			) );
		$wp_customize->add_control( 'st_author_profile_btn_url_c',
			array(
				'section'     => 'st_panel_author_profile',
				'settings'    => 'st_author_profile_btn_url',
				'label'       => __( 'ボタン', 'affinger' ),
				'description' => 'URL（例：http://example.com）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_author_profile_btn_text',
			array(
				'default'           => $defaults['st_author_profile_btn_text'],
				'sanitize_callback' => 'sanitize_text_field',
			) );
		$wp_customize->add_control( 'st_author_profile_btn_text_c',
			array(
				'section'     => 'st_panel_author_profile',
				'settings'    => 'st_author_profile_btn_text',
				'label'       => __( '', 'affinger' ),
				'description' => 'テキスト',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_author_profile_btn_text_color',
			array(
				'default'              => $defaults['st_author_profile_btn_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_profile_btn_text_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => 'テキスト色',
			'settings'    => 'st_author_profile_btn_text_color',
		) ) );

		$wp_customize->add_setting( 'st_author_profile_btn_top',
			array(
				'default'              => $defaults['st_author_profile_btn_top'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_profile_btn_top', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => '背景色（上部）',
			'settings'    => 'st_author_profile_btn_top',
		) ) );

		$wp_customize->add_setting( 'st_author_profile_btn_bottom',
			array(
				'default'              => $defaults['st_author_profile_btn_bottom'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_profile_btn_bottom', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => '背景色（下部）',
			'settings'    => 'st_author_profile_btn_bottom',
		) ) );

		$wp_customize->add_setting( 'st_author_profile_btn_shadow',
			array(
				'default'              => $defaults['st_author_profile_btn_shadow'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_profile_btn_shadow', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => '影色',
			'settings'    => 'st_author_profile_btn_shadow',
		) ) );

		$wp_customize->add_setting( 'st_author_basecolor',
			array(
				'default'              => $defaults['st_author_basecolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_basecolor', array(
			'label'       => __( '旧プロフィールカード', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => 'ボーダー色',
			'settings'    => 'st_author_basecolor',
		) ) );

		$wp_customize->add_setting( 'st_author_bg_color',
			array(
				'default'              => $defaults['st_author_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_author_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_author_profile',
			'description' => '背景色',
			'settings'    => 'st_author_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_author_profile',
			array(
				'default'           => $defaults['st_author_profile'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_author_profile',
			array(
				'section'     => 'st_panel_author_profile',
				'settings'    => 'st_author_profile',
				'label'       => '旧プロフィールカードに変更',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*目次プラグイン（すごいもくじ）*/
		$wp_customize->add_section('st_panel_toc_sugoi', array( // 中パネル
			'title' => '目次プラグイン（すごいもくじ）',
			'panel' => 'st_panel_optioncolors',
			'description' => '「デフォルト」以外では反映されない項目があります。'
		));

		$wp_customize->add_setting( 'st_toc_bgcolor',
			array(
				'default'              => $defaults['st_toc_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => '',
			'settings'    => 'st_toc_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_toc_radius',
			array(
				'default'           => $defaults['st_toc_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_radius',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_radius',
				'label'       => '角丸にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_bordercolor',
			array(
				'default'              => $defaults['st_toc_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => '',
			'settings'    => 'st_toc_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_toc_border_width',
			array(
				'default'           => $defaults['st_toc_border_width'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_toc_border_width_c',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_border_width',
				'label'       => '',
				'description' => '太さ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_toc_mokuzicolor',
			array(
				'default'              => $defaults['st_toc_mokuzicolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_mokuzicolor', array(
			'label'       => __( '目次タイトル', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => 'テキスト色',
			'settings'    => 'st_toc_mokuzicolor',
		) ) );

		$wp_customize->add_setting( 'st_toc_mokuzi_border',
			array(
				'default'              => $defaults['st_toc_mokuzi_border'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_mokuzi_border', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => '下線',
			'settings'    => 'st_toc_mokuzi_border',
		) ) );

		$wp_customize->add_setting( 'st_toc_mokuzi_left',
			array(
				'default'           => $defaults['st_toc_mokuzi_left'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_mokuzi_left',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_mokuzi_left',
				'label'       => '目次タイトルを左寄せにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_webicon',
			array(
				'default'           => $defaults['st_toc_webicon'],
				'sanitize_callback' => 'sanitize_text_field',

			) );
		$wp_customize->add_control( 'st_toc_webicon',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_webicon',
				'label'       => __( '', 'affinger' ),
				'description' => '目次アイコン（※Unicode）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_toc_textcolor',
			array(
				'default'              => $defaults['st_toc_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_textcolor', array(
			'label'       => __( '第1階層リンク', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => '文字色',
			'settings'    => 'st_toc_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_toc_list1_left',
			array(
				'default'           => $defaults['st_toc_list1_left'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_list1_left',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_list1_left',
				'label'       => 'センター寄せにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_list1_number',
			array(
				'default'           => $defaults['st_toc_list1_number'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_list1_number',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_list1_number',
				'label'       => '数字を表示する',
				'description' => '',
				'type'        => 'checkbox',
			) );

		// 第1階層のみ
		$wp_customize->add_setting( 'st_toc_only_toc_fontweight',
			array(
				'default'           => $defaults['st_toc_only_toc_fontweight'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_only_toc_fontweight',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_only_toc_fontweight',
				'label'       => '第1階層のみの場合のリンクを太字にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_text2color',
			array(
				'default'              => $defaults['st_toc_text2color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_text2color', array(
			'label'       => __( '第2階層リンク以降', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => '文字色',
			'settings'    => 'st_toc_text2color',
		) ) );

		$wp_customize->add_setting( 'st_toc_list_icon_base',
			array(
				'default'              => $defaults['st_toc_list_icon_base'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_list_icon_base', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => 'リスト数字・アイコン',
			'settings'    => 'st_toc_list_icon_base',
		) ) );

		$wp_customize->add_setting( 'st_toc_underbordercolor',
			array(
				'default'              => $defaults['st_toc_underbordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_toc_underbordercolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_toc_sugoi',
			'description' => '下線',
			'settings'    => 'st_toc_underbordercolor',
		) ) );

		$wp_customize->add_setting( 'st_toc_list2_icon',
			array(
				'default'           => $defaults['st_toc_list2_icon'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_list2_icon',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_list2_icon',
				'label'       => '数字（アイコン）を非表示にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_list3_fontweight',
			array(
				'default'           => $defaults['st_toc_list3_fontweight'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_list3_fontweight',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_list3_fontweight',
				'label'       => '太字にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_list1_icon',
			array(
				'default'           => $defaults['st_toc_list1_icon'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_list1_icon',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_list1_icon',
				'label'       => '数字をアイコンに変更する',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_toc_list3_icon',
			array(
				'default'           => $defaults['st_toc_list3_icon'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_toc_list3_icon',
			array(
				'section'     => 'st_panel_toc_sugoi',
				'settings'    => 'st_toc_list3_icon',
				'label'       => '第3リンク以降の数字（アイコン）を非表示にして並列にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		// 目次プラグイン
		if ( st_is_st_toc_enabled() ) {
			$wp_customize->add_setting( 'st_toc_list_style',
				array(
					'default'           => $defaults['st_toc_list_style'],
					'sanitize_callback' => 'st_sanitize_choices',
				) );
			$wp_customize->add_control( 'st_toc_list_style',
				array(
					'section'     => 'st_panel_toc_sugoi',
					'settings'    => 'st_toc_list_style',
					'label'       => 'デザインスタイル',
					'description' => '※投稿ごとの設定が優先されます<br>※タイムラインチェックはてなは各カラー設定が反映されます',
					'type'        => 'radio',
					'choices'     => array(
						'default'        => 'デフォルト',
						'timeline'       => 'タイムライン',
						'timeline-count' => 'タイムライン（カウント）',
						'check'          => 'チェック',
						'question'       => 'はてな',
					),
				) );
		}

		/*会話ふきだしのカラー*/
		$wp_customize->add_section('st_panel_kaiwa', array( // 中パネル
			'title' => '会話ふきだし',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_kaiwa_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa_bgcolor', array(
			'label'       => __( '背景色', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '全体又は会話1',
			'settings'    => 'st_kaiwa_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_kaiwa2_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa2_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa2_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話2',
			'settings'    => 'st_kaiwa2_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_kaiwa3_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa3_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa3_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話3',
			'settings'    => 'st_kaiwa3_bgcolor',
		) ) );
		$wp_customize->add_setting( 'st_kaiwa4_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa4_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa4_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話4',
			'settings'    => 'st_kaiwa4_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_kaiwa5_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa5_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa5_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話5',
			'settings'    => 'st_kaiwa5_bgcolor',
		) ) );		$wp_customize->add_setting( 'st_kaiwa6_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa6_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa6_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話6',
			'settings'    => 'st_kaiwa6_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_kaiwa7_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa7_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa7_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話7',
			'settings'    => 'st_kaiwa7_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_kaiwa8_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa8_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa8_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => '会話8',
			'settings'    => 'st_kaiwa8_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_kaiwa_no_border',
			array(
				'default'           => $defaults['st_kaiwa_no_border'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_kaiwa_no_border',
			array(
				'section'     => 'st_panel_kaiwa',
				'settings'    => 'st_kaiwa_no_border',
				'label'       => 'アイコンに枠線をつける',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_kaiwa_borderradius',
			array(
				'default'           => $defaults['st_kaiwa_borderradius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_kaiwa_borderradius',
			array(
				'section'     => 'st_panel_kaiwa',
				'settings'    => 'st_kaiwa_borderradius',
				'label'       => 'ふきだしを角丸にしない',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_kaiwa_change_border',
			array(
				'default'           => $defaults['st_kaiwa_change_border'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_kaiwa_change_border',
			array(
				'section'     => 'st_panel_kaiwa',
				'settings'    => 'st_kaiwa_change_border',
				'label'       => 'ボーダーデザイン',
				'description' => 'ボーダーデザインタイプ（枠線のみ）に変更',
				'type'        => 'radio',
				'choices'     => array(
					'normal'     => __( '普通（2px）', 'affinger' ),
					'thick'      => __( '太め（3px）', 'affinger' ),
					''           => __( '変更しない', 'affinger' ),
				),
			) );

		$wp_customize->add_setting( 'st_kaiwa_change_border_bgcolor',
			array(
				'default'              => $defaults['st_kaiwa_change_border_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_kaiwa_change_border_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_kaiwa',
			'description' => 'ボーダーデザイン適応時の背景色※一括',
			'settings'    => 'st_kaiwa_change_border_bgcolor',
		) ) );

		/* リストまとめ */
		$wp_customize->add_section('st_panel_maruno', array( // 中パネル
			'title' => 'リスト（連番・チェック・他）',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_maruno_textcolor',
			array(
				'default'              => $defaults['st_maruno_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruno_textcolor', array(
			'label'       => __( '数字リスト', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => 'ナンバー色',
			'settings'    => 'st_maruno_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_maruno_nobgcolor',
			array(
				'default'              => $defaults['st_maruno_nobgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruno_nobgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => 'ナンバー背景色',
			'settings'    => 'st_maruno_nobgcolor',
		) ) );

		$wp_customize->add_setting( 'st_maruno_bordercolor',
			array(
				'default'              => $defaults['st_maruno_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruno_bordercolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => '囲いボーダー色',
			'settings'    => 'st_maruno_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_maruno_bgcolor',
			array(
				'default'              => $defaults['st_maruno_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruno_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => '囲い背景色',
			'settings'    => 'st_maruno_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_maruno_radius',
			array(
				'default'           => $defaults['st_maruno_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_maruno_radius',
			array(
				'section'     => 'st_panel_maruno',
				'settings'    => 'st_maruno_radius',
				'label'       => '背景色の角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*マルチェックのカラー*/
		$wp_customize->add_setting( 'st_maruck_textcolor',
			array(
				'default'              => $defaults['st_maruck_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruck_textcolor', array(
			'label'       => __( 'チェック（サークル）リスト', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => 'チェック色',
			'settings'    => 'st_maruck_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_maruck_nobgcolor',
			array(
				'default'              => $defaults['st_maruck_nobgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruck_nobgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => 'チェック（サークル）背景色',
			'settings'    => 'st_maruck_nobgcolor',
		) ) );

		$wp_customize->add_setting( 'st_maruck_bordercolor',
			array(
				'default'              => $defaults['st_maruck_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruck_bordercolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => '囲いボーダー色',
			'settings'    => 'st_maruck_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_maruck_bgcolor',
			array(
				'default'              => $defaults['st_maruck_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_maruck_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_maruno',
			'description' => '囲い背景色',
			'settings'    => 'st_maruck_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_maruck_radius',
			array(
				'default'           => $defaults['st_maruck_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_maruck_radius',
			array(
				'section'     => 'st_panel_maruno',
				'settings'    => 'st_maruck_radius',
				'label'       => '背景色の角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/* [v] チェックボックス */
		$wp_customize->add_setting( 'st_webicon_checkbox',
			array(
				'default'              => $defaults['st_webicon_checkbox'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_checkbox', array(
			'label'       => __( 'チェック（簡易 / ボックスタイプ）', 'affinger' ),
			'description' => 'チェック色',
			'section'     => 'st_panel_maruno',
			'settings'    => 'st_webicon_checkbox',
		) ) );

		$wp_customize->add_setting( 'st_webicon_checkbox_square',
			array(
				'default'              => $defaults['st_webicon_checkbox_square'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_checkbox_square', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'チェックの枠色',
			'section'     => 'st_panel_maruno',
			'settings'    => 'st_webicon_checkbox_square',
		) ) );

		$wp_customize->add_setting( 'st_webicon_checkbox_simple',
			array(
				'default'           => $defaults['st_webicon_checkbox_simple'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_webicon_checkbox_simple',
			array(
				'section'     => 'st_panel_maruno',
				'settings'    => 'st_webicon_checkbox_simple',
				'label'       => 'チェック（ボックスタイプ）のデザインをチェックのみにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_webicon_checkbox_size',
			array(
				'default'           => $defaults['st_webicon_checkbox_size'],
				'sanitize_callback' => 'sanitize_int',

			) );
		$wp_customize->add_control( 'st_webicon_checkbox_size_c',
			array(
				'section'     => 'st_panel_maruno',
				'settings'    => 'st_webicon_checkbox_size',
				'label'       => '',
				'description' => 'チェックのみサイズ（%）※微調整用',
				'type'        => 'option',
			) );

		/* マル・バツ */
		$wp_customize->add_setting( 'st_correct_list',
			array(
				'default'              => $defaults['st_correct_list'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_correct_list', array(
			'label'       => __( 'マル・バツ', 'affinger' ),
			'description' => 'マル',
			'section'     => 'st_panel_maruno',
			'settings'    => 'st_correct_list',
		) ) );

		$wp_customize->add_setting( 'st_wrong_list',
			array(
				'default'              => $defaults['st_wrong_list'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_wrong_list', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'バツ',
			'section'     => 'st_panel_maruno',
			'settings'    => 'st_wrong_list',
		) ) );

		/*タイムライン*/
		$wp_customize->add_section('st_panel_timeline', array( // 中パネル
			'title' => 'タイムライン',
			'panel' => 'st_panel_optioncolors',
			'description' => 'st-timelineショートコードのカラー設定',
		));

		$wp_customize->add_setting( 'st_timeline_list_color',
			array(
				'default'              => $defaults['st_timeline_list_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_timeline_list_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_timeline',
			'description' => 'ラインカラー',
			'settings'    => 'st_timeline_list_color',
		) ) );

		$wp_customize->add_setting( 'st_timeline_list_color_count',
			array(
				'default'              => $defaults['st_timeline_list_color_count'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_timeline_list_color_count', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_timeline',
			'description' => 'カウントカラー',
			'settings'    => 'st_timeline_list_color_count',
		) ) );

		$wp_customize->add_setting( 'st_timeline_list_now_color',
			array(
				'default'              => $defaults['st_timeline_list_now_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_timeline_list_now_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_timeline',
			'description' => 'nowカラー',
			'settings'    => 'st_timeline_list_now_color',
		) ) );

		$wp_customize->add_setting( 'st_timeline_list_now_blink',
			array(
				'default'           => $defaults['st_timeline_list_now_blink'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_timeline_list_now_blink',
			array(
				'section'     => 'st_panel_timeline',
				'settings'    => 'st_timeline_list_now_blink',
				'label'       => 'nowクラスの点滅',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_timeline_list_bg_color',
			array(
				'default'              => $defaults['st_timeline_list_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_timeline_list_bg_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_timeline',
			'description' => '背景色（※一括）',
			'settings'    => 'st_timeline_list_bg_color',
		) ) );
		/*ブログカード*/
		$wp_customize->add_section('st_panel_blogcard', array( // 中パネル
			'title' => 'ブログカード / ラベル',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_card_border_color',
			array(
				'default'              => $defaults['st_card_border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_card_border_color', array(
			'label'       => __( '枠線', 'affinger' ),
			'section'     => 'st_panel_blogcard',
			'description' => '',
			'settings'    => 'st_card_border_color',
		) ) );

		$wp_customize->add_setting( 'st_card_border_size',
			array(
				'default'           => $defaults['st_card_border_size'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_card_border_size',
			array(
				'section'     => 'st_panel_blogcard',
				'settings'    => 'st_card_border_size',
				'label'       => '太くする（3px）',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_card_label_bgcolor',
			array(
				'default'              => $defaults['st_card_label_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_card_label_bgcolor', array(
			'label'       => __( 'ラベル', 'affinger' ),
			'section'     => 'st_panel_blogcard',
			'description' => '背景色',
			'settings'    => 'st_card_label_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_card_label_textcolor',
			array(
				'default'              => $defaults['st_card_label_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_card_label_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_blogcard',
			'description' => 'テキスト色',
			'settings'    => 'st_card_label_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_card_label_designsetting',
			array(
				'default'           => $defaults['st_card_label_designsetting'],
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_card_label_designsetting',
			array(
				'section'     => 'st_panel_blogcard',
				'settings'    => 'st_card_label_designsetting',
				'label'       => '',
				'description' => '',
				'type'        => 'radio',
				'choices'     => array(
					'ribondesign' => __( 'リボンデザイン', 'affinger' ),
					''               => __( 'デフォルト（たすき掛け）', 'affinger' ),
				),
			) );

		/*-------------------------
		テーブルカラー
		--------------------------*/
		$wp_customize->add_section('st_panel_table', array( // 中パネル
			'title' => 'table（表）',
			'panel' => 'st_panel_optioncolors',
		));

		/*テーブル全体*/

		$wp_customize->add_setting( 'st_table_td_center',
			array(
				'default'           => $defaults['st_table_td_center'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_table_td_center',
			array(
				'section'     => 'st_panel_table',
				'settings'    => 'st_table_td_center',
				'label'       => '「カラムを中央配置」設定時は上下中央にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_table_bordercolor',
			array(
				'default'              => $defaults['st_table_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_table_bordercolor', array(
			'label'       => __( 'ボーダー', 'affinger' ),
			'section'     => 'st_panel_table',
			'description' => '',
			'settings'    => 'st_table_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_table_cell_bgcolor',
			array(
				'default'              => $defaults['st_table_cell_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_table_cell_bgcolor', array(
			'label'       => __( '偶数行のセル', 'affinger' ),
			'section'     => 'st_panel_table',
			'description' => '',
			'settings'    => 'st_table_cell_bgcolor',
		) ) );

		/*縦一列目*/

		$wp_customize->add_setting( 'st_table_td_bgcolor',
			array(
				'default'              => $defaults['st_table_td_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_table_td_bgcolor', array(
			'label'       => __( '縦一列目', 'affinger' ),
			'section'     => 'st_panel_table',
			'description' => '',
			'settings'    => 'st_table_td_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_table_td_textcolor',
			array(
				'default'              => $defaults['st_table_td_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_table_td_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_table',
			'description' => '文字色',
			'settings'    => 'st_table_td_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_table_td_bold',
			array(
				'default'           => $defaults['st_table_td_bold'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_table_td_bold',
			array(
				'section'     => 'st_panel_table',
				'settings'    => 'st_table_td_bold',
				'label'       => '太字にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*横一列目*/

		$wp_customize->add_setting( 'st_table_tr_bgcolor',
			array(
				'default'              => $defaults['st_table_tr_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_table_tr_bgcolor', array(
			'label'       => __( 'ヘッダーセクション', 'affinger' ),
			'section'     => 'st_panel_table',
			'description' => '背景色',
			'settings'    => 'st_table_tr_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_table_tr_textcolor',
			array(
				'default'              => $defaults['st_table_tr_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_table_tr_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_table',
			'description' => '文字色',
			'settings'    => 'st_table_tr_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_table_tr_bold',
			array(
				'default'           => $defaults['st_table_tr_bold'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_table_tr_bold',
			array(
				'section'     => 'st_panel_table',
				'settings'    => 'st_table_tr_bold',
				'label'       => '太字にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_table_tr_all',
			array(
				'default'           => $defaults['st_table_tr_all'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_table_tr_all',
			array(
				'section'     => 'st_panel_table',
				'settings'    => 'st_table_tr_all',
				'label'       => 'ヘッダーセクション未設定時の横一列目に反映する',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/* 検索フォーム */
		$wp_customize->add_section('st_search_form', array( // 中パネル
			'title'       => '検索フォーム',
			'panel'       => 'st_panel_optioncolors',
			'description' => '数値は微調整用です（1～20）。極端な設定はデザインが破綻する場合があります',
		));

		$wp_customize->add_setting( 'st_search_form_text',
			array(
				'default'              => $defaults['st_search_form_text'],
				'sanitize_callback' => 'sanitize_text_field',

			) );
		$wp_customize->add_control( 'st_search_form_text_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_text',
				'label'       => '',
				'description' => '検索フォームのplaceholder',
				'type'        => 'text',
			) );

		$wp_customize->add_setting( 'st_search_form_font_size',
			array(
				'default'           => $defaults['st_search_form_font_size'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_font_size_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_font_size',
				'label'       => '',
				'description' => '文字・アイコンサイズ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_bg_color',
			array(
				'default'              => $defaults['st_search_form_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_bg_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索フォームの背景色',
				'settings'    => 'st_search_form_bg_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_text_color',
			array(
				'default'              => $defaults['st_search_form_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_text_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索フォーム内の文字色',
				'settings'    => 'st_search_form_text_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_border_color',
			array(
				'default'              => $defaults['st_search_form_border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_border_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索フォームの枠線',
				'settings'    => 'st_search_form_border_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_border_width',
			array(
				'default'           => $defaults['st_search_form_border_width'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_border_width_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_border_width',
				'label'       => '',
				'description' => '検索フォーム枠線の太さ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_border_radius',
			array(
				'default'           => $defaults['st_search_form_border_radius'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_border_radius_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_border_radius',
				'label'       => '',
				'description' => '検索フォームの丸み（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_icon_color',
			array(
				'default'              => $defaults['st_search_form_icon_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_icon_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索アイコンの色',
				'settings'    => 'st_search_form_icon_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_icon_bg_color',
			array(
				'default'              => $defaults['st_search_form_icon_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_icon_bg_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索アイコンの背景色',
				'settings'    => 'st_search_form_icon_bg_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_padding_lr',
			array(
				'default'           => $defaults['st_search_form_padding_lr'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_padding_lr_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_padding_lr',
				'label'       => '',
				'description' => '左右の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_padding_tb',
			array(
				'default'           => $defaults['st_search_form_padding_tb'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_padding_tb_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_padding_tb',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );

if(is_plugin_active( 'st-custom-search/st-custom-search.php' )):  // カスタム検索プラグインが有効

		/* カスタム検索のボタン */
		$wp_customize->add_setting( 'st_search_form_btn_font_size',
			array(
				'default'           => $defaults['st_search_form_btn_font_size'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_btn_font_size_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_btn_font_size',
				'label'       => 'カスタム検索（ボタン）',
				'description' => '文字・アイコンサイズ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_btn_text_color',
			array(
				'default'              => $defaults['st_search_form_btn_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_btn_text_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索ボタンの文字色',
				'settings'    => 'st_search_form_btn_text_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_btn_font_weight',
			array(
				'default'           => $defaults['st_search_form_btn_font_weight'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_search_form_btn_font_weight_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_btn_font_weight',
				'label'       => '太字にする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_search_form_btn_bg_color',
			array(
				'default'              => $defaults['st_search_form_btn_bg_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_btn_bg_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索ボタンの背景色',
				'settings'    => 'st_search_form_btn_bg_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_btn_shadow_color',
			array(
				'default'              => $defaults['st_search_form_btn_shadow_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_btn_shadow_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索ボタンの影色',
				'settings'    => 'st_search_form_btn_shadow_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_btn_border_color',
			array(
				'default'              => $defaults['st_search_form_btn_border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_search_form_btn_border_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_search_form',
				'description' => '検索ボタンの枠線',
				'settings'    => 'st_search_form_btn_border_color',
			) ) );

		$wp_customize->add_setting( 'st_search_form_btn_border_width',
			array(
				'default'           => $defaults['st_search_form_btn_border_width'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_btn_border_width_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_btn_border_width',
				'label'       => '',
				'description' => '検索ボタンの枠線 / 影の太さ（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_btn_border_radius',
			array(
				'default'           => $defaults['st_search_form_btn_border_radius'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_btn_border_radius_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_btn_border_radius',
				'label'       => '',
				'description' => '検索ボタンの丸み（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_btn_padding_lr',
			array(
				'default'           => $defaults['st_search_form_btn_padding_lr'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_btn_padding_lr_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_btn_padding_lr',
				'label'       => '',
				'description' => '左右の余白（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_search_form_btn_padding_tb',
			array(
				'default'           => $defaults['st_search_form_btn_padding_tb'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_search_form_btn_padding_tb_c',
			array(
				'section'     => 'st_search_form',
				'settings'    => 'st_search_form_btn_padding_tb',
				'label'       => '',
				'description' => '上下の余白（px）',
				'type'        => 'option',
			) );
endif;

		/*RSS（購読する）ボタン*/
		$wp_customize->add_section('st_panel_rss_button', array( // 中パネル
			'title' => 'RSSボタン',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_rss_color',
			array(
				'default'              => $defaults['st_rss_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_rss_color', array(
			'label'    => __( '', 'affinger' ),
			'section'  => 'st_panel_rss_button',
			'settings' => 'st_rss_color',
		) ) );

		/*SNSボタン*/
		$wp_customize->add_section('st_panel_sns_button', array( // 中パネル
			'title' => 'SNSボタン',
			'description' => '※一括反映',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_sns_btn',
			array(
				'default'              => $defaults['st_sns_btn'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_sns_btn', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_sns_button',
			'description' => 'ボタン背景色',
			'settings'    => 'st_sns_btn',
		) ) );

		$wp_customize->add_setting( 'st_sns_btntext',
			array(
				'default'              => $defaults['st_sns_btntext'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_sns_btntext', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_sns_button',
			'description' => 'アイコンと文字色',
			'settings'    => 'st_sns_btntext',
		) ) );

		//お知らせ
		$wp_customize->add_section('st_panel_news', array( // 中パネル
			'title' => 'お知らせ',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_menu_newsbarcolor_t',
			array(
				'default'              => $defaults['st_menu_newsbarcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbarcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_news',
			'description' => '見出し背景色上部（※上下共に設定）',
			'settings'    => 'st_menu_newsbarcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_menu_newsbarcolor',
			array(
				'default'              => $defaults['st_menu_newsbarcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbarcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_news',
			'description' => '見出し背景色下部',
			'settings'    => 'st_menu_newsbarcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_newsbar_border_color',
			array(
				'default'              => $defaults['st_menu_newsbar_border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_newsbar_border_color',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_news',
				'description' => '見出しボーダー色',
				'settings'    => 'st_menu_newsbar_border_color',
			) ) );

		$wp_customize->add_setting( 'st_menu_newsbartextcolor',
			array(
				'default'              => $defaults['st_menu_newsbartextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbartextcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_news',
			'description' => '見出し文字色',
			'settings'    => 'st_menu_newsbartextcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_newsbgcolor',
			array(
				'default'              => $defaults['st_menu_newsbgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_news',
			'description' => '全体背景色',
			'settings'    => 'st_menu_newsbgcolor',
		) ) );

		/*日付の文字色*/

		$wp_customize->add_setting( 'st_news_datecolor',
			array(
				'default'              => $defaults['st_news_datecolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_news_datecolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_news',
			'description' => '日付の文字と下線色',
			'settings'    => 'st_news_datecolor',
		) ) );

		/*文字と下線色*/

		$wp_customize->add_setting( 'st_news_text_color',
			array(
				'default'              => $defaults['st_news_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_news_text_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_news',
			'description' => 'お知らせ文字',
			'settings'    => 'st_news_text_color',
		) ) );

		/*任意お薦め記事*/
		$wp_customize->add_section('st_panel_popular_post', array( // 中パネル
			'title' => 'おすすめ記事',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_menu_popbox_color',
			array(
				'default'              => $defaults['st_menu_popbox_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_popbox_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_popular_post',
			'description' => '背景色',
			'settings'    => 'st_menu_popbox_color',
		) ) );

		$wp_customize->add_setting( 'st_menu_popbox_textcolor',
			array(
				'default'              => $defaults['st_menu_popbox_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_popbox_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_popular_post',
			'description' => '文字色',
			'settings'    => 'st_menu_popbox_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_osusumemidasitextcolor',
			array(
				'default'              => $defaults['st_menu_osusumemidasitextcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_osusumemidasitextcolor',
			array(
				'label'       => __( 'ラベル', 'affinger' ),
				'section'     => 'st_panel_popular_post',
				'description' => '文字色',
				'settings'    => 'st_menu_osusumemidasitextcolor',
			) ) );

		$wp_customize->add_setting( 'st_menu_osusumemidasicolor',
			array(
				'default'              => $defaults['st_menu_osusumemidasicolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_osusumemidasicolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_popular_post',
			'description' => '背景色',
			'settings'    => 'st_menu_osusumemidasicolor',
		) ) );

		/*任意お薦め記事No*/

		$wp_customize->add_setting( 'st_menu_osusumemidasinocolor',
			array(
				'default'              => $defaults['st_menu_osusumemidasinocolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_osusumemidasinocolor',
			array(
				'label'       => __( 'ランキング', 'affinger' ),
				'section'     => 'st_panel_popular_post',
				'description' => '数字',
				'settings'    => 'st_menu_osusumemidasinocolor',
			) ) );

		$wp_customize->add_setting( 'st_menu_osusumemidasinobgcolor',
			array(
				'default'              => $defaults['st_menu_osusumemidasinobgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_menu_osusumemidasinobgcolor',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_popular_post',
				'description' => '背景色',
				'settings'    => 'st_menu_osusumemidasinobgcolor',
			) ) );

		$wp_customize->add_setting( 'st_nohidden',
			array(
				'default'           => $defaults['st_nohidden'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_nohidden',
			array(
				'section'     => 'st_panel_popular_post',
				'settings'    => 'st_nohidden',
				'label'       => 'ナンバーを非表示',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*ページトップボタン*/
		$wp_customize->add_section('st_panel_pagetop', array( // 中パネル
			'title' => 'TOPに戻るボタン',
			'priority'    => 105,
			'description' => '「すごいもくじ（PRO）」プラグイン使用時は目次ボタンにも設定内容が一部（*）反映されます。',
		));

		$wp_customize->add_setting( 'st_pagetop_bgcolor',
			array(
				'default'              => $defaults['st_pagetop_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_pagetop_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_pagetop',
			'description' => '背景色（テキスト）*',
			'settings'    => 'st_pagetop_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_pagetop_arrow_color',
			array(
				'default'              => $defaults['st_pagetop_arrow_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_pagetop_arrow_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_pagetop',
			'description' => 'アイコンの色',
			'settings'    => 'st_pagetop_arrow_color',
		) ) );

		/*ページトップボタンの位置*/
		$wp_customize->add_setting( 'st_pagetop_up',
			array(
				'default'           => $defaults['st_pagetop_up'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_pagetop_up',
			array(
				'label'       => 'ボタンの位置を少し上にする*',
				'section'     => 'st_panel_pagetop',
				'settings'    => 'st_pagetop_up',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*ページトップボタンを丸くする*/
		$wp_customize->add_setting( 'st_pagetop_circle',
			array(
				'default'           => $defaults['st_pagetop_circle'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_pagetop_circle',
			array(
				'section'     => 'st_panel_pagetop',
				'settings'    => 'st_pagetop_circle',
				'label'       => 'ボタンを丸くする*',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*ページトップボタンをテキストにする*/
		$wp_customize->add_setting( 'st_pagetop_text',
			array(
				'default'           => $defaults['st_pagetop_text'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_pagetop_text',
			array(
				'section'     => 'st_panel_pagetop',
				'settings'    => 'st_pagetop_text',
				'label'       => 'ボタンをテキストにする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*ページトップボタンを非表示*/
		$wp_customize->add_setting( 'st_pagetop_hidden',
			array(
				'default'           => $defaults['st_pagetop_hidden'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_pagetop_hidden',
			array(
				'section'     => 'st_panel_pagetop',
				'settings'    => 'st_pagetop_hidden',
				'label'       => 'ボタンを非表示にする',
				'description' => '',
				'type'        => 'checkbox',
			) );		$wp_customize->add_setting( 'st_pagetop_img',
			array(
				'default'           => '',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'pagetop_Image',
			array(
				'label'       => 'オリジナル画像',
				'section'     => 'st_panel_pagetop',
				'description' => '',
				'settings'    => 'st_pagetop_img',
			)
		) );

		$wp_customize->add_setting( 'st_pagetop_img_right',
			array(
				'default'           => $defaults['st_pagetop_img_right'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_pagetop_img_right_c',
			array(
				'section'     => 'st_panel_pagetop',
				'settings'    => 'st_pagetop_img_right',
				'label'       => '',
				'description' => 'right（px）',
				'type'        => 'option',
			) );

		$wp_customize->add_setting( 'st_pagetop_img_bottom',
			array(
				'default'           => $defaults['st_pagetop_img_bottom'],
				'sanitize_callback' => 'sanitize_int',
			) );
		$wp_customize->add_control( 'st_pagetop_img_bottom_c',
			array(
				'section'     => 'st_panel_pagetop',
				'settings'    => 'st_pagetop_img_bottom',
				'label'       => '',
				'description' => 'bottom（px）',
				'type'        => 'option',
			) );

		/*ウィジェット問合せフォームボタン*/
		$wp_customize->add_section('st_panel_widgets_form_btn', array( // 中パネル
			'title' => '問合せボタン（ウィジェット）',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_formbtn_textcolor',
			array(
				'default'              => $defaults['st_formbtn_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_widgets_form_btn',
			'description' => '文字色',
			'settings'    => 'st_formbtn_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_formbtn_bordercolor',
			array(
				'default'              => $defaults['st_formbtn_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn_bordercolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_widgets_form_btn',
			'description' => 'ボーダー色',
			'settings'    => 'st_formbtn_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_formbtn_radius',
			array(
				'default'           => $defaults['st_formbtn_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_formbtn_radius',
			array(
				'section'     => 'st_panel_widgets_form_btn',
				'settings'    => 'st_formbtn_radius',
				'label'       => '角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_formbtn_bgcolor',
			array(
				'default'              => $defaults['st_formbtn_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_widgets_form_btn',
			'description' => '背景色',
			'settings'    => 'st_formbtn_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_formbtn_bgcolor_t',
			array(
				'default'              => $defaults['st_formbtn_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_widgets_form_btn',
			'description' => '背景色上部',
			'settings'    => 'st_formbtn_bgcolor_t',
		) ) );

		/*オリジナルウィジェットボタン*/
		$wp_customize->add_section('st_panel_original_widgets_btn', array( // 中パネル
			'title' => 'オリジナルボタン（ウィジェット）',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_formbtn2_textcolor',
			array(
				'default'              => $defaults['st_formbtn2_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn2_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_original_widgets_btn',
			'description' => '文字色',
			'settings'    => 'st_formbtn2_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_formbtn2_bordercolor',
			array(
				'default'              => $defaults['st_formbtn2_bordercolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn2_bordercolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_original_widgets_btn',
			'description' => 'ボーダー色',
			'settings'    => 'st_formbtn2_bordercolor',
		) ) );

		$wp_customize->add_setting( 'st_formbtn2_radius',
			array(
				'default'           => $defaults['st_formbtn2_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_formbtn2_radius',
			array(
				'section'     => 'st_panel_original_widgets_btn',
				'settings'    => 'st_formbtn2_radius',
				'label'       => '角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		$wp_customize->add_setting( 'st_formbtn2_bgcolor',
			array(
				'default'              => $defaults['st_formbtn2_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn2_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_original_widgets_btn',
			'description' => '背景色',
			'settings'    => 'st_formbtn2_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_formbtn2_bgcolor_t',
			array(
				'default'              => $defaults['st_formbtn2_bgcolor_t'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_formbtn2_bgcolor_t', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_original_widgets_btn',
			'description' => '背景色上部',
			'settings'    => 'st_formbtn2_bgcolor_t',
		) ) );

		/*フリーボックスウィジェット*/
		$wp_customize->add_section('st_panel_freebox_widgets', array( // 中パネル
			'title' => 'フリーボックス（ウィジェット）',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_freebox_tittle_textcolor',
			array(
				'default'              => $defaults['st_freebox_tittle_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_tittle_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_freebox_widgets',
			'description' => '見出し文字色',
			'settings'    => 'st_freebox_tittle_textcolor',
		) ) );

		$wp_customize->add_setting( 'st_freebox_tittle_color',
			array(
				'default'              => $defaults['st_freebox_tittle_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_tittle_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_freebox_widgets',
			'description' => '見出し背景色',
			'settings'    => 'st_freebox_tittle_color',
		) ) );

		$wp_customize->add_setting( 'st_freebox_color',
			array(
				'default'              => $defaults['st_freebox_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_freebox_widgets',
			'description' => 'コンテンツ背景色',
			'settings'    => 'st_freebox_color',
		) ) );

		$wp_customize->add_setting( 'st_freebox_textcolor',
			array(
				'default'              => $defaults['st_freebox_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_freebox_textcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_freebox_widgets',
			'description' => '文字色',
			'settings'    => 'st_freebox_textcolor',
		) ) );

		/*メモボックス*/
		$wp_customize->add_section('st_panel_memobox', array( // 中パネル
			'title' => 'メモボックス（SC）',
			'description' => '旧クイックタグ（ショートコード用）の設定です。※Gutenbergブロック利用推奨',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_memobox_color',
			array(
				'default'              => $defaults['st_memobox_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_memobox_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_memobox',
			'description' => '文字・ボーダー色',
			'settings'    => 'st_memobox_color',
		) ) );

		/*スライドボックス*/
		$wp_customize->add_section('st_panel_slidebox', array( // 中パネル
			'title' => 'スライドボックス（SC）',
			'description' => '旧クイックタグ（ショートコード用）の設定です。※Gutenbergブロック利用推奨',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_slidebox_color',
			array(
				'default'              => $defaults['st_slidebox_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_slidebox_color', array(
			'label'       => __( 'スライドボックス', 'affinger' ),
			'section'     => 'st_panel_slidebox',
			'description' => '背景色',
			'settings'    => 'st_slidebox_color',
		) ) );

		/* ステップ */
		$wp_customize->add_section('st_panel_step', array( // 中パネル
			'title' => 'ステップ・カウント / ポイント（SC）',
			'description' => 'SC: ショートコード用の設定です。',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_step_bgcolor',
			array(
				'default'              => $defaults['st_step_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_step_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_step',
			'description' => 'ステップ数・ポイントの背景色（SC）',
			'settings'    => 'st_step_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_step_color',
			array(
				'default'              => $defaults['st_step_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_step_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_step',
			'description' => 'ステップ数・ポイントの色',
			'settings'    => 'st_step_color',
		) ) );

        $wp_customize->add_setting( 'st_step_text_color',
			array(
				'default'              => $defaults['st_step_text_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_step_text_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_step',
			'description' => 'テキスト色（SC）',
			'settings'    => 'st_step_text_color',
		) ) );

        $wp_customize->add_setting( 'st_step_text_bgcolor',
			array(
				'default'              => $defaults['st_step_text_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_step_text_bgcolor', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_step',
			'description' => 'テキストの背景色（SC）',
			'settings'    => 'st_step_text_bgcolor',
		) ) );

        $wp_customize->add_setting( 'st_step_text_border_color',
			array(
				'default'              => $defaults['st_step_text_border_color'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_step_text_border_color', array(
			'label'       => __( '', 'affinger' ),
			'section'     => 'st_panel_step',
			'description' => 'ボーダー色（SC）',
			'settings'    => 'st_step_text_border_color',
		) ) );

		$wp_customize->add_setting( 'st_step_radius',
			array(
				'default'           => $defaults['st_step_radius'],
				'sanitize_callback' => 'sanitize_checkbox',
			) );
		$wp_customize->add_control( 'st_step_radius',
			array(
				'section'     => 'st_panel_step',
				'settings'    => 'st_step_radius',
				'label'       => '角を丸くする',
				'description' => '',
				'type'        => 'checkbox',
			) );

		/*コンタクトフォーム7送信ボタン*/
		$wp_customize->add_section('st_panel_contactform7btn', array( // 中パネル
			'title' => 'コンタクトフォーム7送信ボタン',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_contactform7btn_textcolor',
			array(
				'default'              => $defaults['st_contactform7btn_textcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'st_contactform7btn_textcolor',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_contactform7btn',
				'description' => '文字色',
				'settings'    => 'st_contactform7btn_textcolor',
			) ) );

		$wp_customize->add_setting( 'st_contactform7btn_bgcolor',
			array(
				'default'              => $defaults['st_contactform7btn_bgcolor'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_contactform7btn_bgcolor',
			array(
				'label'       => __( '', 'affinger' ),
				'section'     => 'st_panel_contactform7btn',
				'description' => '背景色',
				'settings'    => 'st_contactform7btn_bgcolor',
			) ) );

		/*記事内のWebアイコン*/
		$wp_customize->add_section('st_panel_webicon', array( // 中パネル
			'title' => '記事内のWebアイコン（スタイル）',
			'panel' => 'st_panel_optioncolors',
		));

		$wp_customize->add_setting( 'st_webicon_question',
			array(
				'default'              => $defaults['st_webicon_question'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_question', array(
			'label'       => __( '', 'affinger' ),
			'description' => '[？] はてなマーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_question',
		) ) );

		$wp_customize->add_setting( 'st_webicon_check',
			array(
				'default'              => $defaults['st_webicon_check'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_check', array(
			'label'       => __( '', 'affinger' ),
			'description' => '(v) チェックマーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_check',
		) ) );

		$wp_customize->add_setting( 'st_webicon_exclamation',
			array(
				'default'              => $defaults['st_webicon_exclamation'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_exclamation', array(
			'label'       => __( '', 'affinger' ),
			'description' => '[！] エクステンションマーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_exclamation',
		) ) );

		$wp_customize->add_setting( 'st_webicon_memo',
			array(
				'default'              => $defaults['st_webicon_memo'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_memo', array(
			'label'       => __( '', 'affinger' ),
			'description' => 'メモマーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_memo',
		) ) );

		$wp_customize->add_setting( 'st_webicon_user',
			array(
				'default'              => $defaults['st_webicon_user'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_user', array(
			'label'       => __( '', 'affinger' ),
			'description' => '人物マーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_user',
		) ) );

		$wp_customize->add_setting( 'st_webicon_oukan',
			array(
				'default'              => $defaults['st_webicon_oukan'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_oukan', array(
			'label'       => __( '', 'affinger' ),
			'description' => '王冠マーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_oukan',
		) ) );

		$wp_customize->add_setting( 'st_webicon_bigginer',
			array(
				'default'              => $defaults['st_webicon_bigginer'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_webicon_bigginer', array(
			'label'       => __( '', 'affinger' ),
			'description' => '初心者マーク',
			'section'     => 'st_panel_webicon',
			'settings'    => 'st_webicon_bigginer',
		) ) );

		/*-------------------------------------------------------
		簡単設定
		-------------------------------------------------------*/

		$wp_customize->add_section( 'stpattern',
			array(
				'title'       => __( '全体カラー設定', 'affinger' ),
				'description' => '',
				'priority'    => 0,
			) );

		_st_customization_add_color_controls( $wp_customize, 'stpattern', '' );

		$wp_customize->add_setting( 'st_theme_setting',
			array(
				'default'           => '',
				'sanitize_callback' => 'st_sanitize_choices',
			) );
		$wp_customize->add_control( 'st_theme_setting',
			array(
				'section'     => 'stpattern',
				'settings'    => 'st_theme_setting',
				'label'       => '簡単設定を使用する',
				'description' => '※公開後、ブラウザを更新してください。',
				'type'        => 'radio',
				'choices'     => array(
					'defaultcolor' => __( '使用する', 'affinger' ),
					''             => __( '使用しない', 'affinger' ),
				),
			) );
		$wp_customize->add_setting( 'st_customizer_reset',
			array(
				'default' => '',
				'sanitize_callback' => '__return_null',
			) );
		$wp_customize->add_control( new St_Customize_Button_Control( $wp_customize, 'st_customizer_reset', array(
			'label'        => 'カスターマイザーをリセットする',
			'section'      => 'stpattern',
			'description'  => '',
			'button_label' => 'リセット',
			'settings'     => 'st_customizer_reset',
		) ) );
		/*-------------------------------------------------------
		追加 CSS
		-------------------------------------------------------*/

		if ( st_is_customizer_enabled() ) {
			//_st_customization_add_color_controls( $wp_customize, 'custom_css' );
		}
	}

	$st_settings = [];

	// WP 標準の設定、テーマ外で登録された設定でリセット対象とする設定の ID
	$other_settings = [
		'header_text',
		'site_icon',
		'custom_logo',
		'header_textcolor',
		'background_color',
		'header_video',
		'external_header_video',
		'header_image',
		'header_image_data',
		'background_image',
		'background_image_thumb',
		'background_preset',
		'background_position_x',
		'background_position_y',
		'background_size',
		'background_repeat',
		'background_attachment',
	];

	foreach ( $wp_customize->settings() as $id => $setting ) {
		if ( array_key_exists( $id, $default_settings ) && ! in_array( $id, $other_settings, true ) ) {
			continue;
		}

		$st_settings[] = $setting;
	}

	_st_customize_settings( $st_settings );
}

add_action( 'customize_register', 'st_customize_register' );

add_action( 'customize_register', 'st_headerfooter_logo' );

if (!function_exists('_st_customize_save_after')) {
    function _st_customize_save_after() {
    	set_theme_mod('_st_current_theme_setting', st_get_kantan_setting());
    }
}
add_action('customize_save_after', '_st_customize_save_after');

function st_headerfooter_logo() {
	return get_theme_mod( 'st_header_footer_logo' );
}

if ( ! function_exists( 'st_get_search_form_placeholder' ) ) {
	/**
	 * 検索フォームの placeholder を取得する。
	 *
	 * @return string
	 */
	function st_get_search_form_placeholder() {
		$text = (string) get_theme_mod( 'st_search_form_text' );
		$text = ( $text !== '' ) ? $text : '';

		return $text;
	}
}

/**
 * 「スクロールで内容対象をヘッダーメニュー（横列）に変更」設定が利用可能かどうかを返す
 *
 * @return bool
 */
function _st_is_sticky_primary_menu_side_setting_active() {
	// 「ヘッダーメニュー（横列）」メニューがある場合のみ
	return has_nav_menu( 'primary-menu-side' );
}

/**
 * スマホスライドメニューの表示パターンを取得する
 *
 * @return string `'normal'`|`'tracked'`|`'fixed'`
 */
function _st_get_sticky_menu_type() {
	$default = 'normal';

	if ( ! st_is_customizer_enabled() ) {    // カスタマイザーの使用可否
		return $default;
	}

	// スマホスライドメニューの「表示パターン」: 「固定」 (`'fixed'`), 「スクロール追尾」 (`'1'`)
	$st_sticky_menu = get_theme_mod( 'st_sticky_menu' );

	if ( $st_sticky_menu === '1' ) {
		return 'tracked';
	}

	if ( $st_sticky_menu === 'fixed' ) {
		return 'fixed';
	}

	return $default;
}

/**
 * スマホ「ヘッダーメニュー（横列）」メニューの固定表示が可能かどうかを返す
 *
 * @return bool
 */
function _st_is_sticky_mobile_link_design_available() {
	if ( ! st_is_customizer_enabled() ) {    // カスタマイザーの使用可否
		return false;
	}

	// 「スクロールで内容対象をヘッダーメニュー（横列）に変更」カスタマイザー設定の利用可否
	if ( ! _st_is_sticky_primary_menu_side_setting_active() ) {
		return false;
	}

	if ( ! has_nav_menu( 'primary-menu-side' ) ) {    // 「ヘッダーメニュー（横列）」メニューの有無
		return false;
	}

	// スマホスライドメニューの「表示パターン」
	if ( ! in_array( _st_get_sticky_menu_type(), array( 'fixed', 'tracked' ), true ) ) {
		return false;
	}

	// 「スクロールで内容対象をヘッダーメニュー（横列）に変更」カスタマイザー設定
	$is_sticky_primary_menu_side_enabled = (bool) get_theme_mod( 'st_sticky_primary_menu_side' );

	return ( wp_is_mobile() && $is_sticky_primary_menu_side_enabled );
}

if ( ! function_exists( '_st_get_default_toc_list_style' ) ) {
	/**
	 * 目次のデフォルトリストスタイルを返す
	 *
	 * @return string
	 */
	function _st_get_default_toc_list_style() {
		$list_style = get_theme_mod( 'st_toc_list_style' );

		if ( $list_style === false ) {
			// 旧ペーパー風デザイン設定 (`st_toc_paper_style`) の後方互換
			$paper_style = get_theme_mod( 'st_toc_paper_style' );

			return ( $paper_style ) ? 'paper' : 'default';
		}

		return 'default';
	}
}

if ( ! function_exists( '_st_get_global_toc_list_style' ) ) {
	/**
	 * 目次のリストスタイル (全体設定) を返す
	 *
	 * @return string
	 */
	function _st_get_global_toc_list_style() {
		return get_theme_mod( 'st_toc_list_style', _st_get_default_toc_list_style() );
	}
}

if ( st_is_customizer_enabled() ) {    // カスタマイザーを使用
	function st_customize_css() {
		require( dirname( __FILE__ ) . '/st-themecss-variables.php' ); // カスタマイザー用CSS設定読み込み

		?>
		<style type="text/css">
			<?php include( dirname( __FILE__ ) . '/st-themecss.php' ); ?>
		</style>
		<?php
	}

	function st_enqueue_customize_css() {
		wp_enqueue_style(
			'st-themecss',
			get_template_directory_uri() . '/st-themecss-loader.php',
			array( 'style' ),
			false,
			'all'
		);
	}

	function st_customize_js() {
		// 表示パターンが「スクロール追尾」、またはスマホ「ヘッダーメニュー（横列）」メニューの固定表示の場合
		if ( _st_get_sticky_menu_type() === 'tracked' || _st_is_sticky_mobile_link_design_available() ) {
			wp_enqueue_script( 'ac-fixmenu', get_template_directory_uri() . '/js/ac-fixmenu.js', array() );
		}
	}

	if ( is_customize_preview() ||    // カスタマイザープレビュー
	     st_should_output_style_element()    // カスタマイザー用CSSを<style>で出力
	) {
		add_action( 'wp_head', 'st_customize_css' );
	} else {    // カスタマイザー用CSSを<link>で出力
		add_action( 'wp_enqueue_scripts', 'st_enqueue_customize_css', PHP_INT_MAX );
	}

	add_action( 'wp_footer', 'st_customize_js' );

	function st_ajax_customizer_reset() {
		global $wp_customize;

		if ( ! $wp_customize->is_preview() ) {
			wp_send_json_error( new WP_Error( 'not_in_preview', 'Not in preview.' ) );
		}

		if ( ! check_ajax_referer( 'st_customizer_reset', 'nonce', false ) ) {
			wp_send_json_error( new WP_Error( 'invalid_nonce', 'Invalid Nonce.' ) );
		}

		foreach ( _st_customize_settings() as $setting ) {
			if ( $setting->type === 'theme_mod' ) {
				remove_theme_mod( $setting->id );
			} elseif ( $setting->type === 'option' ) {
				delete_option( $setting->id );
			}
		}

		// カスタマイザー簡単設定のカラーを取得
		$patterncolors     = st_get_kantan_colors();
		// AFFINGER管理のカラーパターンを取得
		// カスタマイザー”簡単設定を使用する” 有効時のみ簡単設定のカラーを優先する
		$preset_colors = st_get_preset_colors( st_get_preset_name() );

		$key_patterncolor      = ( $patterncolors['keycolor'] ) ? $patterncolors['keycolor'] : $preset_colors['basecolor'];
		$main_patterncolor     = ( $patterncolors['maincolor'] ) ? $patterncolors['maincolor'] : $preset_colors['maincolor'];
		$sub_patterncolor      = ( $patterncolors['subcolor'] ) ? $patterncolors['subcolor'] : $preset_colors['subcolor'];
		$text_patterncolor     = ( $patterncolors['textcolor'] ) ? $patterncolors['textcolor'] : $preset_colors['textcolor'];
		
		//全体カラーにカラーパターンの値を反映させる
		set_theme_mod('st_key_patterncolor', $key_patterncolor);
		set_theme_mod('st_main_patterncolor', $main_patterncolor);
		set_theme_mod('st_sub_patterncolor', $sub_patterncolor);
		set_theme_mod('st_text_patterncolor', $text_patterncolor);

		// 過去のヘッダー画像を削除
		$stylesheet = get_stylesheet();
		$headers    = get_posts(
			array(
				'post_type'  => 'attachment',
				'meta_key'   => '_wp_attachment_is_custom_header',
				'meta_value' => $stylesheet,
				'orderby'    => 'none',
				'nopaging'   => true,
			)
		);

		$lastUsedKey = '_wp_attachment_custom_header_last_used_' . $stylesheet;

		foreach ( $headers as $header ) {
			delete_post_meta( $header->ID, $lastUsedKey );
			delete_post_meta( $header->ID, '_wp_attachment_is_custom_header', $stylesheet );
		}

		wp_send_json_success();
	}

	add_action( 'wp_ajax_st_customizer_reset', 'st_ajax_customizer_reset' );
}
