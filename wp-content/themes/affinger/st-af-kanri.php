<?php
// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

////////////////////////////////////////////
// 設定
///////////////////////////////////////////

// ASPコード専用管理画面ページ
$myaf0  = get_option( 'my-af0', '' );
$myaf0a = get_option( 'my-af0a', '' );
$myaf0b = get_option( 'my-af0b', '' );
$myaf0c = get_option( 'my-af0c', '' );
$myaf0d = get_option( 'my-af0d', '' );
$myaf   = get_option( 'my-af', '' );
$myaf1  = get_option( 'my-af1', '' );
// ランキングコード
$myaf2   = get_option( 'my-af2', '' );
$myaf3   = get_option( 'my-af3', '' );
$myaf4   = get_option( 'my-af4', '' );
$myaf4b  = get_option( 'my-af4b', '' );
$myaf5   = get_option( 'my-af5', '' );
$myaf5b  = get_option( 'my-af5b', '' );
$myaf6   = get_option( 'my-af6', '' );
$myaf7   = get_option( 'my-af7', '' );
$myaf8   = get_option( 'my-af8', '' );
$myaf8b  = get_option( 'my-af8b', '' );
$myaf9   = get_option( 'my-af9', '' );
$myaf9b  = get_option( 'my-af9b', '' );
$myaf10  = get_option( 'my-af10', '' );
$myaf11  = get_option( 'my-af11', '' );
$myaf12  = get_option( 'my-af12', '' );
$myaf12b = get_option( 'my-af12b', '' );
$myaf13  = get_option( 'my-af13', '' );
$myaf13b = get_option( 'my-af13b', '' );
$myaf14  = get_option( 'my-af14', '' );
$myaf15  = get_option( 'my-af15', '' ); //ランク1スター
$myaf16  = get_option( 'my-af16', '' ); //ランク2スター
$myaf17  = get_option( 'my-af17', '' ); //ランク3スター
$myaf18  = get_option( 'my-af18', '' ); //ランキングアイコン
$myaf19  = get_option( 'my-af19', '' ); //ランキングアイコン1位（※ショートコード）
$myaf20  = get_option( 'my-af20', '' ); //ランキングアイコン2位（※ショートコード）
$myaf21  = get_option( 'my-af21', '' ); //ランキングアイコン3位（※ショートコード）
$myaf22  = get_option( 'my-af22', '' ); //ランキング説明
$myaf23  = get_option( 'my-af23', '' ); //nofollow 1位
$myaf24  = get_option( 'my-af24', '' ); //nofollow 2位
$myaf25  = get_option( 'my-af25', '' ); //nofollow 3位
$myaf26  = get_option( 'my-af26', '' ); //バナーサイズを大きくする
$myaf27  = get_option( 'my-af27', '' ); //ランキングアイコンを非表示

$myaf28  = get_option( 'my-af28', '' ); //ボタンAのグラデーションを横方向に
$myaf29  = get_option( 'my-af29', '' ); //ボタンBのグラデーションを横方向に
$myaf30  = get_option( 'my-af30', '' ); //ボタンのマウスオーバーで光る演出をを入れる
$myaf31  = get_option( 'my-af31', '' ); //ランキング見出し角丸
$myaf32  = get_option( 'my-af32', '' ); //ボタンを丸いデザインにする

$myafsc1  = get_option( 'my-afsc1', '' ); //ショートコード
$myafsc2  = get_option( 'my-afsc2', '' ); //ショートコード
$myafsc3  = get_option( 'my-afsc3', '' ); //ショートコード
$myafsc4  = get_option( 'my-afsc4', '' ); //ショートコード
$myafsc5  = get_option( 'my-afsc5', '' ); //ショートコード
$myafsc6  = get_option( 'my-afsc6', '' ); //ショートコード
$myafsc7  = get_option( 'my-afsc7', '' ); //ショートコード
$myafsc8  = get_option( 'my-afsc8', '' ); //ショートコード
$myafsc9  = get_option( 'my-afsc9', '' ); //ショートコード
$myafsc10 = get_option( 'my-afsc10', '' ); //ショートコード

if ( trim( $GLOBALS["myaf14"] ) === '' ) {
	$myaf14 = '詳細ページへ';
}

////////////////////////////////////////////
// 設定: CSS
///////////////////////////////////////////

//リンク文字
if ( trim( get_option( 'st-cssdata1' ) ) === '' ) {
	$stcssdata1 = '#ffffff';
} else {
	$stcssdata1 = st_force_to_hex_color( get_option( 'st-cssdata1' ) );
}

//オリジナルリンク背景色（※クイックボタンB）
if ( trim( get_option( 'st-cssdata3' ) ) === '' ) {
	$stcssdata3 = '#4FC3F7';
} else {
	$stcssdata3 = st_force_to_hex_color( get_option( 'st-cssdata3' ) );
}

if ( trim( get_option( 'st-cssdata9' ) ) === '' ) {
	$stcssdata9 = '#29B6F6';
} else {
	$stcssdata9 = st_force_to_hex_color( get_option( 'st-cssdata9' ) );
}

if ( trim( get_option( 'st-cssdata7' ) ) === '' ) {
	$stcssdata7 = '#039BE5';
} else {
	$stcssdata7 = st_force_to_hex_color( get_option( 'st-cssdata7' ) );
}

//アフィリエイトリンクボタン背景色（※クイックボタンA）
if ( trim( get_option( 'st-cssdata2' ) ) === '' ) {
	$stcssdata2 = '#ef5350';
} else {
	$stcssdata2 = st_force_to_hex_color( get_option( 'st-cssdata2' ) );
}

if ( trim( get_option( 'st-cssdata10' ) ) === '' ) {
	$stcssdata10 = '#e53935';
} else {
	$stcssdata10 = st_force_to_hex_color( get_option( 'st-cssdata10' ) );
}

if ( trim( get_option( 'st-cssdata8' ) ) === '' ) {
	$stcssdata8 = '#b61b17';
} else {
	$stcssdata8 = st_force_to_hex_color( get_option( 'st-cssdata8' ) );
}

//ランキングタイトル吹き出し背景色
if ( trim( get_option( 'st-cssdata4' ) ) === '' ) {
	$stcssdata4 = '#c5bf3b';
} else {
	$stcssdata4 = st_force_to_hex_color( get_option( 'st-cssdata4' ) );
}

//ランキング総タイトル文字色
if ( trim( get_option( 'st-cssdata5' ) ) === '' ) {
	$stcssdata5 = '#ffffff';
} else {
	$stcssdata5 = st_force_to_hex_color( get_option( 'st-cssdata5' ) );
}

//ランキング一覧背景色
if ( trim( get_option( 'st-cssdata6' ) ) === '' ) {
	$stcssdata6 = '';
} else {
	$stcssdata6 = st_force_to_hex_color( get_option( 'st-cssdata6' ) );
}

//ランキング見出しテキスト色
if ( trim( get_option( 'st-cssdata11' ) ) === '' ) {
	$stcssdata11 = '';
} else {
	$stcssdata11 = st_force_to_hex_color( get_option( 'st-cssdata11' ) );
}

//ランキング見出し背景色
if ( trim( get_option( 'st-cssdata12' ) ) === '' ) {
	$stcssdata12 = '';
} else {
	$stcssdata12 = st_force_to_hex_color( get_option( 'st-cssdata12' ) );
}

//ランキング見出しボーダー色
if ( trim( get_option( 'st-cssdata13' ) ) === '' ) {
	$stcssdata13 = '';
} else {
	$stcssdata13 = st_force_to_hex_color( get_option( 'st-cssdata13' ) );
}

////////////////////////////////////////////
// 関数
///////////////////////////////////////////

if ( !function_exists( 'st_admin_ranking_get_menu_slug' ) ) {
	/**
	 * メニュースラッグを取得
	 *
	 * @return string メニュースラッグ
	 */
	function st_admin_ranking_get_menu_slug() {
		return 'my-custom-admin-af';
	}
}

if ( !function_exists( 'st_admin_ranking_get_reset_menu_slug' ) ) {
	/**
	 * メニュースラッグ (リセット) を取得
	 *
	 * @return string メニュースラッグ
	 */
	function st_admin_ranking_get_reset_menu_slug() {
		return 'my-custom-submenu-af';
	}
}

if ( !function_exists( 'st_admin_ranking_is_admin_screen' ) ) {
	/**
	 * 現在の画面が管理画面かどうかを取得
	 *
	 * @return bool 管理画面の場合は true
	 */
	function st_admin_ranking_is_admin_screen() {
		$screen          = get_current_screen();
		$admin_screen_id = 'toplevel_page_' . st_admin_ranking_get_menu_slug();

		return ( $screen->id === $admin_screen_id );
	}
}

////////////////////////////////////////////
// 管理画面
///////////////////////////////////////////

add_action( 'load-toplevel_page_' . st_admin_ranking_get_menu_slug(),
	function () {
		add_filter( 'screen_options_show_screen', '__return_false' );
	} );

if ( ! function_exists( 'st_admin_ranking_enqueue_scripts' ) ) {
	/** スクリプト/スタイルを登録 */
	function st_admin_ranking_enqueue_scripts() {
		if ( ! st_admin_ranking_is_admin_screen() ) {
			return;
		}

		// カラーピッカー
		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_script(
			'st-color-picker',
			get_template_directory_uri() . '/js/st-color-picker.js',
			array( 'wp-color-picker' ),
			false,
			false
		);

		// Tabs
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script(
			'st-admin-tabs',
			get_template_directory_uri() . '/js/st-admin-tabs.js',
			array( 'jquery-ui-tabs' )
		);
	}
}

add_action( 'admin_enqueue_scripts', 'st_admin_ranking_enqueue_scripts' );

if ( ! function_exists( 'st_admin_ranking_add_menu_pages' ) ) {
	/** メニューを追加 */
	function st_admin_ranking_add_menu_pages() {
		add_menu_page(
			__( 'ランキング管理', 'affinger' ),
			__( 'ランキング管理', 'affinger' ),
			'manage_options',
			st_admin_ranking_get_menu_slug(),
			'st_admin_ranking_display_settings_page'
		);

		add_submenu_page(
			st_admin_ranking_get_menu_slug(),
			__( 'ランキング管理リセット', 'affinger' ),
			__( 'ランキング管理リセット', 'affinger' ),
			'manage_options',
			st_admin_ranking_get_reset_menu_slug(),
			'st_admin_ranking_display_reset_page'
		);
	}
}

add_action( 'admin_menu', 'st_admin_ranking_add_menu_pages' );

if ( ! function_exists( 'st_admin_ranking_add_settings_meta_boxes' ) ) {
	/** メタボックスを追加 */
	function st_admin_ranking_add_settings_meta_boxes() {
		add_meta_box(
			'submitdiv',
			'保存',
			'st_admin_display_submit_meta_box',
			'toplevel_page_' . st_admin_ranking_get_menu_slug(),
			'side'
		);
	}
}

add_action( 'admin_init', 'st_admin_ranking_add_settings_meta_boxes' );

if ( ! function_exists( 'st_admin_ranking_display_reset_page' ) ) {
	/** リセット画面 */
	function st_admin_ranking_display_reset_page() {
		?>

		<div class="wrap">
			<h2>ランキング管理リセット画面</h2>

			<form id="my-main-form" method="post" action="">
				<?php wp_nonce_field( 'my-nonce-key', st_admin_ranking_get_menu_slug() ); ?>

				<p style="color:#ff0000">※本画面は緊急用です。誤ったタグの挿入などで「ランキング管理画面」に不具合が生じた場合、こちらからリセットできます。</p>

				<p>
					<input type="hidden" name="my-af-reset" value="no">
					<input type="checkbox" name="my-af-reset" value="yes"
						   onclick="window.alert('※チェックを入れて保存するとランキングのアフィリエイトコード等が全てリセットされます');">
					リセットする</p>

				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
						   class="button button-primary button-large">
				</p>
				<hr/>
			</form>
		</div>
	<?php
	}
}

if (!function_exists('st_admin_ranking_display_settings_page')) {
	/** 管理画面 */
	function st_admin_ranking_display_settings_page() {
		global $hook_suffix;
		?>

		<div class="wrap">
			<h2 style="margin-bottom:20px;">ランキング管理画面</h2>

			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<form id="my-main-form" method="post" action="" data-st-tabs-form>
						<?php wp_nonce_field( 'my-nonce-key', st_admin_ranking_get_menu_slug() ); ?>

						<div id="post-body-content">
							<div id="st-tabs" class="st-tabs" data-st-tabs>
								<ul class="st-tabs-nav">
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#ranks"><i class="st-fa st-svg-cog"></i><span class="st-tabs-nav-item-label">基本設定</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#scrank"><i class="st-fa st-svg-code" aria-hidden="true"></i><span class="st-tabs-nav-item-label">ショートコード</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#icon"><i class="st-fa st-svg-eye" aria-hidden="true"></i><span class="st-tabs-nav-item-label">アイコン</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#rank1"><i class="st-fa st-svg-trophy" aria-hidden="true"></i><span class="st-tabs-nav-item-label">ランキング１位</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#rank2"><i class="st-fa st-svg-trophy" aria-hidden="true"></i><span class="st-tabs-nav-item-label">ランキング２位</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#rank3"><i class="st-fa st-svg-trophy" aria-hidden="true"></i><span class="st-tabs-nav-item-label">ランキング３位</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#css"><i class="st-fa st-svg-tachometer" aria-hidden="true"></i><span class="st-tabs-nav-item-label">CSS</span></a></li>
								</ul>

								<div class="st-tabs-contents" data-st-tabs-contents>
									<?php _st_admin_ranking_display_settings_section(); ?>
									<?php _st_admin_ranking_display_shortcode_section(); ?>
									<?php _st_admin_ranking_display_icon_section(); ?>
									<?php _st_admin_ranking_display_rank_1_section() ?>
									<?php _st_admin_ranking_display_rank_2_section() ?>
									<?php _st_admin_ranking_display_rank_3_section() ?>
									<?php _st_admin_ranking_display_css_sectioh(); ?>
								</div>
							</div>
						</div>

						<div id="postbox-container-1" class="postbox-container">
							<?php do_meta_boxes( $hook_suffix, 'side', null ); ?>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_ranking_display_settings_section' ) ) {
	/** 基本設定 */
	function _st_admin_ranking_display_settings_section() {
		?>

			<div id="ranks" class="st-tabs-content">
				<h3 class="h3tai"><i class="st-fa st-svg-cog"></i>基本設定</h3>

				<p style="text-align:center;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/guide/rankcss_cap_big.jpg"
						style="max-width:100%"></p>

				<h4>1) ランキングの大見出し（任意）</h4>

				<P>
					<input type="text" name="my-af" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf"] ) ); ?>"
						   style="width:100%" placeholder="大見出しテキスト">
				</p>

				<h4>2) オリジナルページへのリンクボタンに表示するテキスト</h4>

				<P>
					<input type="text" name="my-af14" value="<?php echo esc_attr( $GLOBALS["myaf14"] ); ?>"
						   style="width:100%">
				</p>

				<h4>ランキング全体の説明</h4>
				<p>大見出しとランキング一覧の間に説明を追加します</p>
				<p>
					<?php do_action( "st_af_kanri_editor",
						"description_0",
						"my-af22",
						stripslashes( $GLOBALS["myaf22"] ) ); ?>
				</p>

				<h4>ランキングの表示</h4>

				<p>
					<input type="checkbox" name="my-af0a" value="yes" <?php if ( $GLOBALS["myaf0a"] === 'yes' ) {
						echo 'checked';
					} ?>>
					トップページに表示</p>

				<p>
					<input type="checkbox" name="my-af0" value="yes" <?php if ( $GLOBALS["myaf0"] === 'yes' ) {
						echo 'checked';
					} ?>>
					固定ページの記事下に表示</p>

				<p>
					<input type="checkbox" name="my-af0b" value="yes" <?php if ( $GLOBALS["myaf0b"] === 'yes' ) {
						echo 'checked';
					} ?>>
					投稿ページの記事下に表示</p>

				<p>
					<input type="checkbox" name="my-af0c" value="yes" <?php if ( $GLOBALS["myaf0c"] === 'yes' ) {
						echo 'checked';
					} ?>>
					サイドバーに表示</p>

				<p>
					<input type="checkbox" name="my-af0d" value="yes" <?php if ( $GLOBALS["myaf0d"] === 'yes' ) {
						echo 'checked';
					} ?>>
					カテゴリー記事一覧に表示</p>

				<h4>バナーサイズ</h4>

				<p>
					<input type="checkbox" name="my-af26" value="yes" <?php if ( $GLOBALS["myaf26"] === 'yes' ) {
						echo 'checked';
					} ?>>
					バナーサイズを大きくする（300px）</p>

				<h4>演出</h4>

				<p>
					<input type="checkbox" name="my-af30" value="yes" <?php if ( $GLOBALS["myaf30"] === 'yes' ) {
						echo 'checked';
					} ?>>
					ボタンに光る演出を入れる</p>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>
			</div>

		<?php
	}
}

if (!function_exists('_st_admin_ranking_display_shortcode_section')) {
	/** ショートコード */
    function _st_admin_ranking_display_shortcode_section() {
    	?>

		<div id="scrank" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-code"></i>ショートコードでランキングを作成</h3>

			<p>※上記のランキング管理に入力した3つより上に生成されます。ショートコード生成には<a href="//on-store.net/stigertagkanri/" target="_blank">別途プラグイン（有料）</a>が必要です
				<br/>※id番号のみ入力して下さい（例：[st_af id="5"]の場合「5」のみ記入）
				<br/>※ランキング毎のアイコンの色分けは3位まで反映されます（上から順に詰めて記入して下さい）
				<br/>※ABテストプラグインのIDは反映されません
				<br/>※idの記入が1つでもあると「ランキング管理」で作成したランキングアイコンは色分けされません</p>

			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc1"
					   value="<?php echo esc_attr( $GLOBALS["myafsc1"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc2"
					   value="<?php echo esc_attr( $GLOBALS["myafsc2"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc3"
					   value="<?php echo esc_attr( $GLOBALS["myafsc3"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc4"
					   value="<?php echo esc_attr( $GLOBALS["myafsc4"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc5"
					   value="<?php echo esc_attr( $GLOBALS["myafsc5"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc6"
					   value="<?php echo esc_attr( $GLOBALS["myafsc6"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc7"
					   value="<?php echo esc_attr( $GLOBALS["myafsc7"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc8"
					   value="<?php echo esc_attr( $GLOBALS["myafsc8"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc9"
					   value="<?php echo esc_attr( $GLOBALS["myafsc9"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc10"
					   value="<?php echo esc_attr( $GLOBALS["myafsc10"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>

			<p>
				ショートコードは、各投稿に&nbsp;<code>[各ショートコード]</code>&nbsp;と記述したり<br/>
				phpに直接&nbsp;<code>&lt;?php echo do_shortcode('[各ショートコード]'); ?&gt;</code>&nbsp;と記述して表示も出来ます。
			</p>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>
		</div>

		<?php
    }
}

if (!function_exists('_st_admin_ranking_display_icon_section')) {
	/** アイコン */
    function _st_admin_ranking_display_icon_section() {
    	?>

		<div id="icon" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-eye" aria-hidden="true"></i>ランキングアイコン</h3>

			<div style="border:solid 1px #ccc;padding:10px;text-align:center;"><p style="padding:0;margin:0;">アイコンは<b>「各順位アイコン」＞「全体アイコン」</b>の優先度で表示されます。順位分けをしたい場合は1位から3位までのアイコンを設定して、全体アイコンには4位以下のアイコンを設定して下さい</p></div>

			<p>※アップロードボタンより画像をアップロード、または選択して「投稿に挿入」をクリックして下さい。（最後に「保存」が必要です）
				<br/>※画像は自動でリサイズされません。適切なサイズにしてアップロードして下さい※デフォルトアイコンは67px×38pxです
				<br/>※全てアイコンを設定すると「全体アイコン」が4位以降に反映されます</p>
			<h4>全体アイコン（又は4位以下）</h4>
			<p>ランキング画像のURL：<input type="text" name="my-af18"
								  value="<?php echo esc_attr( ( $GLOBALS["myaf18"] ) ); ?>" size="30"
								  style="ime-mode:disabled;" placeholder="http://example.com/hoge.ico"></p>
		    <?php st_admin_ranking_display_media_editor_button( 'my-af18', 'アップロード' ); ?>
		    <?php st_admin_ranking_display_media_reset_button( 'my-af18', '削除' ); ?>
		    <?php if ( ! empty( $GLOBALS["myaf18"] ) ): ?>
				<p>現在のアイコン<br/><img src="<?php echo esc_url( ( $GLOBALS["myaf18"] ) ); ?>" width="32px"></p>
		    <?php endif; ?>

			<h4>1位アイコン※ショートコードによるランキングのみ</h4>
			<p>ランキング画像のURL：<input type="text" name="my-af19"
								  value="<?php echo esc_attr( ( $GLOBALS["myaf19"] ) ); ?>" size="30"
								  style="ime-mode:disabled;" placeholder="http://example.com/hoge.ico"></p>
		    <?php st_admin_ranking_display_media_editor_button( 'my-af19', 'アップロード' ); ?>
		    <?php st_admin_ranking_display_media_reset_button( 'my-af19', '削除' ); ?>
		    <?php if ( ! empty( $GLOBALS["myaf19"] ) ): ?>
				<p>現在のアイコン<br/><img src="<?php echo esc_url( ( $GLOBALS["myaf19"] ) ); ?>" width="32px"></p>
		    <?php endif; ?>

			<h4>2位アイコン※ショートコードによるランキングのみ</h4>
			<p>ランキング画像のURL：<input type="text" name="my-af20"
								  value="<?php echo esc_attr( ( $GLOBALS["myaf20"] ) ); ?>" size="30"
								  style="ime-mode:disabled;" placeholder="http://example.com/hoge.ico"></p>
		    <?php st_admin_ranking_display_media_editor_button( 'my-af20', 'アップロード' ); ?>
		    <?php st_admin_ranking_display_media_reset_button( 'my-af20', '削除' ); ?>
		    <?php if ( ! empty( $GLOBALS["myaf20"] ) ): ?>
				<p>現在のアイコン<br/><img src="<?php echo esc_url( ( $GLOBALS["myaf20"] ) ); ?>" width="32px"></p>
		    <?php endif; ?>

			<h4>3位アイコン※ショートコードによるランキングのみ</h4>
			<p>ランキング画像のURL：<input type="text" name="my-af21"
								  value="<?php echo esc_attr( ( $GLOBALS["myaf21"] ) ); ?>" size="30"
								  style="ime-mode:disabled;" placeholder="http://example.com/hoge.ico"></p>
		    <?php st_admin_ranking_display_media_editor_button( 'my-af21', 'アップロード' ); ?>
		    <?php st_admin_ranking_display_media_reset_button( 'my-af21', '削除' ); ?>
		    <?php if ( ! empty( $GLOBALS["myaf21"] ) ): ?>
				<p>現在のアイコン<br/><img src="<?php echo esc_url( ( $GLOBALS["myaf21"] ) ); ?>" width="32px"></p>
		    <?php endif; ?>

			<hr/>

			<p>
				<input type="checkbox" name="my-af27" value="yes" <?php if ( $GLOBALS["myaf27"] === 'yes' ) {
				    echo 'checked';
			    } ?>>
				アイコンを表示しない</p>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>

		</div>


		<?php
    }
}

if (!function_exists('_st_admin_ranking_display_rank_1_section')) {
	/** ランキング 1 位 */
    function _st_admin_ranking_display_rank_1_section() {
    	?>

		<div id="rank1" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-trophy"></i>ランキング1位</h3>

			<p style="text-align:center;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/guide/rankcss_cap_mini.jpg" style="max-width:100%"></p>

			<h4>a) タイトル<span style="color:#ff0000;">※入力が無いと表示されません</span></h4>

			<p>
				<input type="text" name="my-af2" value="<?php echo esc_attr( $GLOBALS["myaf2"] ); ?>" style="width:100%"
					   placeholder="テキスト">
			</p>


			<h4>スター※任意</h4>

			<p>
				<input type="radio" name="my-af15" value="5" <?php if ( $GLOBALS["myaf15"] === '5' ) {
				    echo 'checked';
			    } ?>> 5
				<input type="radio" name="my-af15" value="4" <?php if ( $GLOBALS["myaf15"] === '4' ) {
				    echo 'checked';
			    } ?>> 4
				<input type="radio" name="my-af15" value="3" <?php if ( $GLOBALS["myaf15"] === '3' ) {
				    echo 'checked';
			    } ?>> 3
				<input type="radio" name="my-af15" value="2" <?php if ( $GLOBALS["myaf15"] === '2' ) {
				    echo 'checked';
			    } ?>> 2
				<input type="radio" name="my-af15" value="1" <?php if ( $GLOBALS["myaf15"] === '1' ) {
				    echo 'checked';
			    } ?>> 1
				<input type="radio" name="my-af15" value="" <?php if ( $GLOBALS["myaf15"] === '' ) {
				    echo 'checked';
			    } ?>> 非表示
			</p>

			<h4>b) アフィリエイトコード（バナー）※300px以上推奨</h4>

			<p>
				<input type="text" name="my-af3" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf3"] ) ); ?>"
					   style="width:100%" placeholder="&lt;a href=&quot;http://exsample.com/hoge/&quot;&gt;&lt;img src=&quot;http://exsample.com/hoge.jpg&quot;&gt;&lt;/a&gt;">
			</p>
			<p>
				画像リンク又はASPのバナーコードを記入して下さい。※iframe及びscriptタイプは非対応です<br/>
			</p>

			<h4>e) アフィリエイトコード（テキスト）</h4>

			<p>
				<input type="text" name="my-af5" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf5"] ) ); ?>"
					   style="width:100%" placeholder="&lt;a href=&quot;http://exsample.com/hoge/&quot;&gt;公式リンク&lt;/a&gt;">
			</p>
		    <?php if ( trim( $GLOBALS["myaf5"] ) !== '' ) {
			    echo '<p>現在のリンク：&nbsp;' . stripslashes( $GLOBALS["myaf5"] ) . '</p>';
		    } ?>

			<p style="color:#ff0000">タグは正確に入力して下さい。閉じ忘れなどがあるとレイアウトが崩れる場合があります。</p>
		    <?php
		    if ( trim( $GLOBALS["myaf3"] ) !== '' ) {
			    echo '<p>' . stripslashes( $GLOBALS["myaf3"] ) . '<br/>※バナーが正常に表示されない場合はコードに誤りがある可能性があります。</p>';
		    }
		    ?>
			<h4>c) 説明<span style="color: #ff0000">※1 つ目の説明は「アフィリエイトコード（バナー）」に入力が無い場合は表示されません</span></h4>

			<p>
			    <?php do_action( "st_af_kanri_editor", "description_1", "my-af4", stripslashes( $GLOBALS["myaf4"] ) ); ?>
			</p>

			<p>
			    <?php do_action( "st_af_kanri_editor", "description_1b", "my-af4b", stripslashes( $GLOBALS["myaf4b"] ) ); ?>
			</p>

			<h4>d) 詳細ページへのリンクURL</h4>

			<p>
				<input type="text" name="my-af5b" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf5b"] ) ); ?>"
					   style="width:100%" placeholder="http://example.com/example">
			</p>
		    <?php if ( trim( $GLOBALS["myaf5b"] ) !== '' ) {
			    echo '<p>現在のリンクURL：&nbsp;' . stripslashes( $GLOBALS["myaf5b"] ) . '</p>';
		    } ?>

			<p>
				<label>
					<input type="checkbox" name="my-af23" value="yes"<?php checked( $GLOBALS["myaf23"] === 'yes' ); ?>>
					nofollowを設定する
				</label>
			</p>

			<p>
				ショートコード：&nbsp;<code>[rank1]</code><br/>
				phpに直接記入する場合は<code>&lt;?php echo do_shortcode('[rank1]'); ?&gt;</code>
			</p>
			<p><a href="#scrank">ショートコードで作成する</a></p>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>

		</div>

		<?php
    }
}

if (!function_exists('_st_admin_ranking_display_rank_2_section')) {
	/** ランキング 2 位 */
    function _st_admin_ranking_display_rank_2_section() {
    	?>
		<div id="rank2" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-trophy"></i>ランキング2位</h3>

			<p style="text-align:center;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/guide/rankcss_cap_mini.jpg" style="max-width:100%"></p>

		<h4>a) タイトル<span style="color:#ff0000;">※入力が無いと表示されません</span></h4>

		<p>
			<input type="text" name="my-af6" value="<?php echo esc_attr( $GLOBALS["myaf6"] ); ?>" style="width:100%"
				   placeholder="テキスト">
		</p>

		<h4>スター※任意</h4>

		<p>
			<input type="radio" name="my-af16" value="5" <?php if ( $GLOBALS["myaf16"] === '5' ) {
			    echo 'checked';
		    } ?>> 5
			<input type="radio" name="my-af16" value="4" <?php if ( $GLOBALS["myaf16"] === '4' ) {
			    echo 'checked';
		    } ?>> 4
			<input type="radio" name="my-af16" value="3" <?php if ( $GLOBALS["myaf16"] === '3' ) {
			    echo 'checked';
		    } ?>> 3
			<input type="radio" name="my-af16" value="2" <?php if ( $GLOBALS["myaf16"] === '2' ) {
			    echo 'checked';
		    } ?>> 2
			<input type="radio" name="my-af16" value="1" <?php if ( $GLOBALS["myaf16"] === '1' ) {
			    echo 'checked';
		    } ?>> 1
			<input type="radio" name="my-af16" value="" <?php if ( $GLOBALS["myaf16"] === '' ) {
			    echo 'checked';
		    } ?>> 非表示
		</p>

		<h4>b) アフィリエイトコード（バナー）※300px以上推奨</h4>

		<p>
			<input type="text" name="my-af7" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf7"] ) ); ?>"
				   style="width:100%" placeholder="&lt;a href=&quot;http://exsample.com/hoge/&quot;&gt;&lt;img src=&quot;http://exsample.com/hoge.jpg&quot;&gt;&lt;/a&gt;">
		</p>
		<p>
			画像リンク又はASPのバナーコードを記入して下さい。※iframe及びscriptタイプは非対応です<br/>
		</p>

		<h4>e) アフィリエイトコード（テキスト）</h4>

		<p>
			<input type="text" name="my-af9" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf9"] ) ); ?>"
				   style="width:100%" placeholder="&lt;a href=&quot;http://exsample.com/hoge/&quot;&gt;公式リンク&lt;/a&gt;">
		</p>
	    <?php if ( trim( $GLOBALS["myaf9"] ) !== '' ) {
		    echo '<p>現在のリンク：&nbsp;' . stripslashes( $GLOBALS["myaf9"] ) . '</p>';
	    } ?>

		<p style="color:#ff0000">タグは正確に入力して下さい。閉じ忘れなどがあるとレイアウトが崩れる場合があります。</p>
	    <?php
	    if ( trim( $GLOBALS["myaf7"] ) !== '' ) {
		    echo '<p>' . stripslashes( $GLOBALS["myaf7"] ) . '<br/>※バナーが正常に表示されない場合はコードに誤りがある可能性があります。</p>';
	    }
	    ?>
		<h4>c) 説明</h4>

		<p>
		    <?php do_action( "st_af_kanri_editor", "description_2", "my-af8", stripslashes( $GLOBALS["myaf8"] ) ); ?>
		</p>

		<p>
		    <?php do_action( "st_af_kanri_editor", "description_2b", "my-af8b", stripslashes( $GLOBALS["myaf8b"] ) ); ?>
		</p>

		<h4>d) 詳細ページへのリンクURL</h4>

		<p>
			<input type="text" name="my-af9b" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf9b"] ) ); ?>"
				   style="width:100%" placeholder="http://example.com/example">
		</p>
	    <?php if ( trim( $GLOBALS["myaf9b"] ) !== '' ) {
		    echo '<p>現在のリンクURL：&nbsp;' . stripslashes( $GLOBALS["myaf9b"] ) . '</p>';
	    } ?>

		<p>
			<label>
				<input type="checkbox" name="my-af24" value="yes"<?php checked( $GLOBALS["myaf24"] === 'yes' ); ?>>
				nofollowを設定する
			</label>
		</p>

		<p>
			ショートコード：&nbsp;<code>[rank2]</code><br/>
			phpに直接記入する場合は<code>&lt;?php echo do_shortcode('[rank2]'); ?&gt;</code>
		</p>
			<p><a href="#scrank">ショートコードで作成する</a></p>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>

		</div>

    	<?php
    }
}

if (!function_exists('_st_admin_ranking_display_rank_3_section')) {
	/** ランキング 3 位 */
    function _st_admin_ranking_display_rank_3_section() {
    	?>
		<div id="rank3" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-trophy"></i>ランキング3位</h3>

			<p style="text-align:center;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/guide/rankcss_cap_mini.jpg" style="max-width:100%"></p>

		<h4>a) タイトル<span style="color:#ff0000;">※入力が無いと表示されません</span></h4>

		<p>
			<input type="text" name="my-af10" value="<?php echo esc_attr( $GLOBALS["myaf10"] ); ?>" style="width:100%"
				   placeholder="テキスト">
		</p>

		<h4>スター※任意</h4>

		<p>
			<input type="radio" name="my-af17" value="5" <?php if ( $GLOBALS["myaf17"] === '5' ) {
			    echo 'checked';
		    } ?>> 5
			<input type="radio" name="my-af17" value="4" <?php if ( $GLOBALS["myaf17"] === '4' ) {
			    echo 'checked';
		    } ?>> 4
			<input type="radio" name="my-af17" value="3" <?php if ( $GLOBALS["myaf17"] === '3' ) {
			    echo 'checked';
		    } ?>> 3
			<input type="radio" name="my-af17" value="2" <?php if ( $GLOBALS["myaf17"] === '2' ) {
			    echo 'checked';
		    } ?>> 2
			<input type="radio" name="my-af17" value="1" <?php if ( $GLOBALS["myaf17"] === '1' ) {
			    echo 'checked';
		    } ?>> 1
			<input type="radio" name="my-af17" value="" <?php if ( $GLOBALS["myaf17"] === '' ) {
			    echo 'checked';
		    } ?>> 非表示
		</p>

		<h4>b) アフィリエイトコード（バナー）※300px以上推奨</h4>

		<p>
			<input type="text" name="my-af11" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf11"] ) ); ?>"
				   style="width:100%" placeholder="&lt;a href=&quot;http://exsample.com/hoge/&quot;&gt;&lt;img src=&quot;http://exsample.com/hoge.jpg&quot;&gt;&lt;/a&gt;">
		</p>
		<p>
			画像リンク又はASPのバナーコードを記入して下さい。※iframe及びscriptタイプは非対応です<br/>
		</p>

		<h4>e) アフィリエイトコード（テキスト）</h4>

		<p>
			<input type="text" name="my-af13" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf13"] ) ); ?>"
				   style="width:100%" placeholder="&lt;a href=&quot;http://exsample.com/hoge/&quot;&gt;公式リンク&lt;/a&gt;">
		</p>
	    <?php if ( trim( $GLOBALS["myaf13"] ) !== '' ) {
		    echo '<p>現在のリンク：&nbsp;' . stripslashes( $GLOBALS["myaf13"] ) . '</p>';
	    } ?>

		<p style="color:#ff0000">タグは正確に入力して下さい。閉じ忘れなどがあるとレイアウトが崩れる場合があります。</p>
	    <?php
	    if ( trim( $GLOBALS["myaf11"] ) !== '' ) {
		    echo '<p>' . stripslashes( $GLOBALS["myaf11"] ) . '<br/>※バナーが正常に表示されない場合はコードに誤りがある可能性があります。</p>';
	    }
	    ?>
		<h4>c) 説明</h4>

		<p>
		    <?php do_action( "st_af_kanri_editor", "description_3", "my-af12", stripslashes( $GLOBALS["myaf12"] ) ); ?>
		</p>

		<p>
		    <?php do_action( "st_af_kanri_editor",
			    "description_3b",
			    "my-af12b",
			    stripslashes( $GLOBALS["myaf12b"] ) ); ?>
		</p>

		<h4>d) 詳細ページへのリンクURL</h4>

		<p>
			<input type="text" name="my-af13b" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf13b"] ) ); ?>"
				   style="width:100%" placeholder="http://example.com/example">
		</p>
	    <?php if ( trim( $GLOBALS["myaf13b"] ) !== '' ) {
		    echo '<p>現在のリンクURL：&nbsp;' . stripslashes( $GLOBALS["myaf13b"] ) . '</p>';
	    } ?>

		<p>
			<label>
				<input type="checkbox" name="my-af25" value="yes"<?php checked( $GLOBALS["myaf25"] === 'yes' ); ?>>
				nofollowを設定する
			</label>
		</p>


		<p>
			ショートコード：&nbsp;<code>[rank3]</code><br/>
			phpに直接記入する場合は<code>&lt;?php echo do_shortcode('[rank3]'); ?&gt;</code>
		</p>
			<p><a href="#scrank">ショートコードで作成する</a></p>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>

		</div>

		<?php
    }
}

if ( ! function_exists( '_st_admin_ranking_display_css_section' ) ) {
	/** CSS */
	function _st_admin_ranking_display_css_sectioh() {
		?>

		<div id="css" class="st-tabs-content">
				<h3 class="h3tai"><i class="st-fa st-svg-tachometer"></i>ランキングCSS</h3>

					<p style="text-align:center;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/guide/rankcss_cap.jpg" style="max-width:100%"></p>

					<p>
						<input type="checkbox" name="my-af1" value="yes" <?php if ( $GLOBALS["myaf1"] === 'yes' ) {
							echo 'checked';
						} ?>>
						ランキング管理用のCSS（デザイン）を使用しない
					</p>

					<h4>ランキング見出しテキスト色</h4>

					<?php if ( trim( $GLOBALS["stcssdata11"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata11"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata11"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata11"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata11"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata11"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata11"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata11"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata11"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } ?>

					<h4>ランキング見出し背景色</h4>

					<?php if ( trim( $GLOBALS["stcssdata12"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata12"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata12"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata12"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata12"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata12"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata12"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata12"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata12"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } ?>

					<h4>ランキング見出しボーダー色</h4>

					<?php if ( trim( $GLOBALS["stcssdata13"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata13"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata13"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata13"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata13"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata13"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata13"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata13"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata13"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } ?>

					<p>
						<input type="checkbox" name="my-af31" value="yes" <?php if ( $GLOBALS["myaf31"] === 'yes' ) {
							echo 'checked';
						} ?>>
						ランキング見出しの背景を丸くする
					</p>

					<h3 class="h3tai">リンクボタン</h3>

					<h4>1）リンク文字カラー</h4>

					<?php if ( trim( $GLOBALS["stcssdata1"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>;
									margin-right:10px;"></span><?php echo esc_html( $GLOBALS["stcssdata1"] ); ?></p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata1"
									  value="<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>" size="6" maxlength="6"
									  style="ime-mode:disabled;" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>;
									margin-right:10px;"></span><?php echo esc_html( $GLOBALS["stcssdata1"] ); ?></p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata1"
									  value="<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<div class="kaiwa-formbox">
					<div class="kaiwa-formbox-in">
					<h4>2）オリジナルリンク背景色（※クイックボタンB）</h4>

					<?php if ( trim( $GLOBALS["stcssdata3"] ) === '' ) { ?>
						<p>現在の上カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata3"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在の上カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>
						</p>
						<P>上カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata3"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<?php if ( trim( $GLOBALS["stcssdata9"] ) === '' ) { ?>
						<p>現在の下カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata9"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata9"] ) ); ?>
						</p>
						<P>下カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata9"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata9"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在の下カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata9"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata9"] ) ); ?>
						</p>
						<P>下カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata9"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata9"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<h5>シャドウカラー</h5>

					<?php if ( trim( $GLOBALS["stcssdata7"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata7"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata7"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata7"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata7"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata7"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata7"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata7"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata7"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<p>
					<input type="checkbox" name="my-af28" value="yes" <?php if ( $GLOBALS["myaf28"] === 'yes' ) {
						echo 'checked';
					} ?>>
					グラデーションを横方向にする</p>

					<p>
					<input type="checkbox" name="my-af32" value="yes" <?php if ( $GLOBALS["myaf32"] === 'yes' ) {
						echo 'checked';
					} ?>>
						ボタンを丸いデザインにする</p>

					</div>
					<div class="kaiwa-formbox-in">

					<h4>3）アフィリエイトリンクボタン背景色（※クイックボタンA）</h4>

					<?php if ( trim( $GLOBALS["stcssdata2"] ) === '' ) { ?>
						<p>現在の上カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>
						</p>
						<P>上カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata2" value="28222" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在の上カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>;margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>
						</p>
						<P>上カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata2"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<?php if ( trim( $GLOBALS["stcssdata10"] ) === '' ) { ?>
						<p>現在の下カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata10"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata10"] ) ); ?>
						</p>
						<P>下カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata10"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata10"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在の下カラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata10"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata10"] ) ); ?>
						</p>
						<P>下カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata10"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata10"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<h5>シャドウカラー</h5>

					<?php if ( trim( $GLOBALS["stcssdata8"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata8"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata8"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata8"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata8"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata8"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata8"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata8"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata8"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<p>
					<input type="checkbox" name="my-af29" value="yes" <?php if ( $GLOBALS["myaf29"] === 'yes' ) {
						echo 'checked';
					} ?>>
					グラデーションを横方向に</p>

					</div>
					</div><!-- /kaiwa-formbox -->

					<h3 class="h3tai">トップ以外に表示されるランキング一覧</h3>

					<h4>ランキングタイトル吹き出し背景色</h4>

					<?php if ( trim( $GLOBALS["stcssdata4"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata4"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata4"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<h4>ランキング総タイトル文字色</h4>

					<?php if ( trim( $GLOBALS["stcssdata5"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata5"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata5"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

					<h4>ランキング一覧背景色</h4>

					<?php if ( trim( $GLOBALS["stcssdata6"] ) === '' ) { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata6"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
					<?php } else { ?>
						<p>現在のカラー：<span
								style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>;
									margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>
						</p>
						<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata6"
									  value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>" size="6"
									  style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

					<?php } ?>

				<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
				<hr/>
				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>

			</div>
	<?php }
}

////////////////////////////////////////////
// データベース登録
///////////////////////////////////////////

if (!function_exists( '_st_admin_ranking_handle_update' )) {
	/** 設定を更新 */
	function _st_admin_ranking_handle_update() {
		if ( isset( $_POST['my-af'] ) && $_POST['my-af'] ) {
			update_option( 'my-af', $_POST['my-af'] );
		} else {
			update_option( 'my-af', '' );
		}

		if ( isset( $_POST['my-af1'] ) && $_POST['my-af1'] ) {
			update_option( 'my-af1', $_POST['my-af1'] );
		} else {
			update_option( 'my-af1', '' );
		}

		if ( isset( $_POST['my-af0'] ) && $_POST['my-af0'] ) {
			update_option( 'my-af0', $_POST['my-af0'] );
		} else {
			update_option( 'my-af0', '' );
		}

		if ( isset( $_POST['my-af0a'] ) && $_POST['my-af0a'] ) {
			update_option( 'my-af0a', $_POST['my-af0a'] );
		} else {
			update_option( 'my-af0a', '' );
		}

		if ( isset( $_POST['my-af0b'] ) && $_POST['my-af0b'] ) {
			update_option( 'my-af0b', $_POST['my-af0b'] );
		} else {
			update_option( 'my-af0b', '' );
		}

		if ( isset( $_POST['my-af0c'] ) && $_POST['my-af0c'] ) {
			update_option( 'my-af0c', $_POST['my-af0c'] );
		} else {
			update_option( 'my-af0c', '' );
		}

		if ( isset( $_POST['my-af0d'] ) && $_POST['my-af0d'] ) {
			update_option( 'my-af0d', $_POST['my-af0d'] );
		} else {
			update_option( 'my-af0d', '' );
		}

		if ( isset( $_POST['my-af2'] ) && $_POST['my-af2'] ) {
			update_option( 'my-af2', $_POST['my-af2'] );
		} else {
			update_option( 'my-af2', '' );
		}

		if ( isset( $_POST['my-af3'] ) && $_POST['my-af3'] ) {
			update_option( 'my-af3', $_POST['my-af3'] );
		} else {
			update_option( 'my-af3', '' );
		}

		if ( isset( $_POST['my-af4'] ) && $_POST['my-af4'] ) {
			update_option( 'my-af4', $_POST['my-af4'] );
		} else {
			update_option( 'my-af4', '' );
		}

		if ( isset( $_POST['my-af4b'] ) && $_POST['my-af4b'] ) {
			update_option( 'my-af4b', $_POST['my-af4b'] );
		} else {
			update_option( 'my-af4b', '' );
		}

		if ( isset( $_POST['my-af5'] ) && $_POST['my-af5'] ) {
			update_option( 'my-af5', $_POST['my-af5'] );
		} else {
			update_option( 'my-af5', '' );
		}

		if ( isset( $_POST['my-af5b'] ) && $_POST['my-af5b'] ) {
			update_option( 'my-af5b', $_POST['my-af5b'] );
		} else {
			update_option( 'my-af5b', '' );
		}

		//ランク2

		if ( isset( $_POST['my-af6'] ) && $_POST['my-af6'] ) {
			update_option( 'my-af6', $_POST['my-af6'] );
		} else {
			update_option( 'my-af6', '' );
		}

		if ( isset( $_POST['my-af7'] ) && $_POST['my-af7'] ) {
			update_option( 'my-af7', $_POST['my-af7'] );
		} else {
			update_option( 'my-af7', '' );
		}

		if ( isset( $_POST['my-af8'] ) && $_POST['my-af8'] ) {
			update_option( 'my-af8', $_POST['my-af8'] );
		} else {
			update_option( 'my-af8', '' );
		}

		if ( isset( $_POST['my-af8b'] ) && $_POST['my-af8b'] ) {
			update_option( 'my-af8b', $_POST['my-af8b'] );
		} else {
			update_option( 'my-af8b', '' );
		}

		if ( isset( $_POST['my-af9'] ) && $_POST['my-af9'] ) {
			update_option( 'my-af9', $_POST['my-af9'] );
		} else {
			update_option( 'my-af9', '' );
		}

		if ( isset( $_POST['my-af9b'] ) && $_POST['my-af9b'] ) {
			update_option( 'my-af9b', $_POST['my-af9b'] );
		} else {
			update_option( 'my-af9b', '' );
		}

		//ランク3

		if ( isset( $_POST['my-af10'] ) && $_POST['my-af10'] ) {
			update_option( 'my-af10', $_POST['my-af10'] );
		} else {
			update_option( 'my-af10', '' );
		}

		if ( isset( $_POST['my-af11'] ) && $_POST['my-af11'] ) {
			update_option( 'my-af11', $_POST['my-af11'] );
		} else {
			update_option( 'my-af11', '' );
		}

		if ( isset( $_POST['my-af12'] ) && $_POST['my-af12'] ) {
			update_option( 'my-af12', $_POST['my-af12'] );
		} else {
			update_option( 'my-af12', '' );
		}

		if ( isset( $_POST['my-af12b'] ) && $_POST['my-af12b'] ) {
			update_option( 'my-af12b', $_POST['my-af12b'] );
		} else {
			update_option( 'my-af12b', '' );
		}

		if ( isset( $_POST['my-af13'] ) && $_POST['my-af13'] ) {
			update_option( 'my-af13', $_POST['my-af13'] );
		} else {
			update_option( 'my-af13', '' );
		}

		if ( isset( $_POST['my-af13b'] ) && $_POST['my-af13b'] ) {
			update_option( 'my-af13b', $_POST['my-af13b'] );
		} else {
			update_option( 'my-af13b', '' );
		}

		if ( isset( $_POST['my-af14'] ) && $_POST['my-af14'] ) {
			update_option( 'my-af14', $_POST['my-af14'] );
		} else {
			update_option( 'my-af14', '' );
		}

		if ( isset( $_POST['my-af15'] ) && $_POST['my-af15'] ) {
			update_option( 'my-af15', $_POST['my-af15'] );
		} else {
			update_option( 'my-af15', '' );
		}

		if ( isset( $_POST['my-af16'] ) && $_POST['my-af16'] ) {
			update_option( 'my-af16', $_POST['my-af16'] );
		} else {
			update_option( 'my-af16', '' );
		}

		if ( isset( $_POST['my-af17'] ) && $_POST['my-af17'] ) {
			update_option( 'my-af17', $_POST['my-af17'] );
		} else {
			update_option( 'my-af17', '' );
		}

		if ( isset( $_POST['my-af18'] ) ) { //これは保存方法が他と異なっているので注意
			update_option( 'my-af18', $_POST['my-af18'] );
		}

		if ( isset( $_POST['my-af19'] ) ) { //これは保存方法が他と異なっているので注意
			update_option( 'my-af19', $_POST['my-af19'] );
		}

		if ( isset( $_POST['my-af20'] ) ) { //これは保存方法が他と異なっているので注意
			update_option( 'my-af20', $_POST['my-af20'] );
		}

		if ( isset( $_POST['my-af21'] ) ) { //これは保存方法が他と異なっているので注意
			update_option( 'my-af21', $_POST['my-af21'] );
		}

		if ( isset( $_POST['my-af22'] ) && $_POST['my-af22'] ) {
			update_option( 'my-af22', $_POST['my-af22'] );
		} else {
			update_option( 'my-af22', '' );
		}

		if ( isset( $_POST['my-af23'] ) && $_POST['my-af23'] ) {
			update_option( 'my-af23', $_POST['my-af23'] );
		} else {
			update_option( 'my-af23', '' );
		}

		if ( isset( $_POST['my-af24'] ) && $_POST['my-af24'] ) {
			update_option( 'my-af24', $_POST['my-af24'] );
		} else {
			update_option( 'my-af24', '' );
		}

		if ( isset( $_POST['my-af25'] ) && $_POST['my-af25'] ) {
			update_option( 'my-af25', $_POST['my-af25'] );
		} else {
			update_option( 'my-af25', '' );
		}

		if ( isset( $_POST['my-af26'] ) && $_POST['my-af26'] ) {
			update_option( 'my-af26', $_POST['my-af26'] );
		} else {
			update_option( 'my-af26', '' );
		}

		if ( isset( $_POST['my-af27'] ) && $_POST['my-af27'] ) {
			update_option( 'my-af27', $_POST['my-af27'] );
		} else {
			update_option( 'my-af27', '' );
		}

		if ( isset( $_POST['my-af28'] ) && $_POST['my-af28'] ) {
			update_option( 'my-af28', $_POST['my-af28'] );
		} else {
			update_option( 'my-af28', '' );
		}

		if ( isset( $_POST['my-af29'] ) && $_POST['my-af29'] ) {
			update_option( 'my-af29', $_POST['my-af29'] );
		} else {
			update_option( 'my-af29', '' );
		}

		if ( isset( $_POST['my-af30'] ) && $_POST['my-af30'] ) {
			update_option( 'my-af30', $_POST['my-af30'] );
		} else {
			update_option( 'my-af30', '' );
		}

		if ( isset( $_POST['my-af31'] ) && $_POST['my-af31'] ) {
			update_option( 'my-af31', $_POST['my-af31'] );
		} else {
			update_option( 'my-af31', '' );
		}

		if ( isset( $_POST['my-af32'] ) && $_POST['my-af32'] ) {
			update_option( 'my-af32', $_POST['my-af32'] );
		} else {
			update_option( 'my-af32', '' );
		}

		if ( isset( $_POST['my-af33'] ) && $_POST['my-af33'] ) {
			update_option( 'my-af33', $_POST['my-af33'] );
		} else {
			update_option( 'my-af33', '' );
		}

		if ( isset( $_POST['my-afsc1'] ) && $_POST['my-afsc1'] ) {
			update_option( 'my-afsc1', $_POST['my-afsc1'] );
		} else {
			update_option( 'my-afsc1', '' );
		}

		if ( isset( $_POST['my-afsc2'] ) && $_POST['my-afsc2'] ) {
			update_option( 'my-afsc2', $_POST['my-afsc2'] );
		} else {
			update_option( 'my-afsc2', '' );
		}

		if ( isset( $_POST['my-afsc3'] ) && $_POST['my-afsc3'] ) {
			update_option( 'my-afsc3', $_POST['my-afsc3'] );
		} else {
			update_option( 'my-afsc3', '' );
		}
		if ( isset( $_POST['my-afsc4'] ) && $_POST['my-afsc4'] ) {
			update_option( 'my-afsc4', $_POST['my-afsc4'] );
		} else {
			update_option( 'my-afsc4', '' );
		}
		if ( isset( $_POST['my-afsc5'] ) && $_POST['my-afsc5'] ) {
			update_option( 'my-afsc5', $_POST['my-afsc5'] );
		} else {
			update_option( 'my-afsc5', '' );
		}
		if ( isset( $_POST['my-afsc6'] ) && $_POST['my-afsc6'] ) {
			update_option( 'my-afsc6', $_POST['my-afsc6'] );
		} else {
			update_option( 'my-afsc6', '' );
		}
		if ( isset( $_POST['my-afsc7'] ) && $_POST['my-afsc7'] ) {
			update_option( 'my-afsc7', $_POST['my-afsc7'] );
		} else {
			update_option( 'my-afsc7', '' );
		}
		if ( isset( $_POST['my-afsc8'] ) && $_POST['my-afsc8'] ) {
			update_option( 'my-afsc8', $_POST['my-afsc8'] );
		} else {
			update_option( 'my-afsc8', '' );
		}
		if ( isset( $_POST['my-afsc9'] ) && $_POST['my-afsc9'] ) {
			update_option( 'my-afsc9', $_POST['my-afsc9'] );
		} else {
			update_option( 'my-afsc9', '' );
		}
		if ( isset( $_POST['my-afsc10'] ) && $_POST['my-afsc10'] ) {
			update_option( 'my-afsc10', $_POST['my-afsc10'] );
		} else {
			update_option( 'my-afsc10', '' );
		}

		// CSS 設定
		if ( isset( $_POST['st-cssdata1'] ) && $_POST['st-cssdata1'] ) {
			update_option( 'st-cssdata1', sanitize_hex_color( $_POST['st-cssdata1'] ) );
		} else {
			update_option( 'st-cssdata1', '' );
		}

		if ( isset( $_POST['st-cssdata2'] ) && $_POST['st-cssdata2'] ) {
			update_option( 'st-cssdata2', sanitize_hex_color( $_POST['st-cssdata2'] ) );
		} else {
			update_option( 'st-cssdata2', '' );
		}

		if ( isset( $_POST['st-cssdata3'] ) && $_POST['st-cssdata3'] ) {
			update_option( 'st-cssdata3', sanitize_hex_color( $_POST['st-cssdata3'] ) );
		} else {
			update_option( 'st-cssdata3', '' );
		}

		if ( isset( $_POST['st-cssdata4'] ) && $_POST['st-cssdata4'] ) {
			update_option( 'st-cssdata4', sanitize_hex_color( $_POST['st-cssdata4'] ) );
		} else {
			update_option( 'st-cssdata4', '' );
		}

		if ( isset( $_POST['st-cssdata5'] ) && $_POST['st-cssdata5'] ) {
			update_option( 'st-cssdata5', sanitize_hex_color( $_POST['st-cssdata5'] ) );
		} else {
			update_option( 'st-cssdata5', '' );
		}

		if ( isset( $_POST['st-cssdata6'] ) && $_POST['st-cssdata6'] ) {
			update_option( 'st-cssdata6', sanitize_hex_color( $_POST['st-cssdata6'] ) );
		} else {
			update_option( 'st-cssdata6', '' );
		}

		if ( isset( $_POST['st-cssdata7'] ) && $_POST['st-cssdata7'] ) {
			update_option( 'st-cssdata7', sanitize_hex_color( $_POST['st-cssdata7'] ) );
		} else {
			update_option( 'st-cssdata7', '' );
		}

		if ( isset( $_POST['st-cssdata8'] ) && $_POST['st-cssdata8'] ) {
			update_option( 'st-cssdata8', sanitize_hex_color( $_POST['st-cssdata8'] ) );
		} else {
			update_option( 'st-cssdata8', '' );
		}

		if ( isset( $_POST['st-cssdata9'] ) && $_POST['st-cssdata9'] ) {
			update_option( 'st-cssdata9', sanitize_hex_color( $_POST['st-cssdata9'] ) );
		} else {
			update_option( 'st-cssdata9', '' );
		}

		if ( isset( $_POST['st-cssdata10'] ) && $_POST['st-cssdata10'] ) {
			update_option( 'st-cssdata10', sanitize_hex_color( $_POST['st-cssdata10'] ) );
		} else {
			update_option( 'st-cssdata10', '' );
		}

		if ( isset( $_POST['st-cssdata11'] ) && $_POST['st-cssdata11'] ) {
			update_option( 'st-cssdata11', sanitize_hex_color( $_POST['st-cssdata11'] ) );
		} else {
			update_option( 'st-cssdata11', '' );
		}

		if ( isset( $_POST['st-cssdata12'] ) && $_POST['st-cssdata12'] ) {
			update_option( 'st-cssdata12', sanitize_hex_color( $_POST['st-cssdata12'] ) );
		} else {
			update_option( 'st-cssdata12', '' );
		}

		if ( isset( $_POST['st-cssdata13'] ) && $_POST['st-cssdata13'] ) {
			update_option( 'st-cssdata13', sanitize_hex_color( $_POST['st-cssdata13'] ) );
		} else {
			update_option( 'st-cssdata13', '' );
		}

	}
}

if ( ! function_exists( 'st_ranking_reset_settings' ) ) {
	/** 設定をリセット */
	function st_ranking_reset_settings() {
		// リセット処理
		for ( $i = 0; $i <= 33; $i ++ ) {
			$af_delete_no = 'my-af' . $i;
			update_option( $af_delete_no, '' );
		}

		for ( $i = 1; $i <= 10; $i ++ ) {
			$afsc_delete_no = 'my-afsc' . $i;
			update_option( $afsc_delete_no, '' );
		}

		update_option( 'my-af', '' );
		update_option( 'my-af0a', '' );
		update_option( 'my-af0b', '' );
		update_option( 'my-af0c', '' );
		update_option( 'my-af0d', '' );
		update_option( 'my-af4b', '' );
		update_option( 'my-af5b', '' );
		update_option( 'my-af8b', '' );
		update_option( 'my-af9b', '' );
		update_option( 'my-af12b', '' );
		update_option( 'my-af13b', '' );

		// CSS 設定
		for ( $i = 1; $i <= 8; $i ++ ) {
			$afsc_delete_no = 'st-cssdata' . $i;
			update_option( $afsc_delete_no, '' );
		}
	}
}

if (!function_exists('st_admin_ranking_handle_submit')) {
	/** POST をハンドリング */
    function st_admin_ranking_handle_submit() {
	    $menu_slug = st_admin_ranking_get_menu_slug();

	    if ( !isset( $_POST[ $menu_slug ] ) || !$_POST[ $menu_slug ] ) {
	    	return;
	    }

		if ( !check_admin_referer( 'my-nonce-key', $menu_slug ) ) {
	    	return;
		}

	    if ( isset( $_POST['my-af-reset'] ) ) {
		    // リセット
		    if ( $_POST['my-af-reset'] === 'yes' ) {
			    st_ranking_reset_settings();
		    }
	    } else {
		    // 更新
		    _st_admin_ranking_handle_update();
	    }

	    wp_safe_redirect( menu_page_url( $menu_slug, false ) );
    }
}

add_action( 'admin_init', 'st_admin_ranking_handle_submit' );

////////////////////////////////////////////
// エディタ
///////////////////////////////////////////

if ( !function_exists( 'st_af_kanri_default_editor' ) ) {
	/**
	 * 説明エディタのデフォルトアクション
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $name コントロール名 (name 属性値)
	 * @param string $content 内容
	 */
	function st_af_kanri_editor($location = null, $name = null, $content = '') {
		if ($location === null || $name === null) {
			return;
		}

		// 場所別アクションフック `st_af_kanri_<location>_editor` をトリガー
		do_action('st_af_kanri_' . $location . '_editor', $location, $name, $content);
	}

	add_action('st_af_kanri_editor', 'st_af_kanri_editor', 10, 6);
}

if (!function_exists('st_af_kanri_output_default_editor')) {
	/**
	 * 説明のデフォルトエディタ (テキストエリア) を出力
	 *
	 * @param string $location エディタの場所名
	 * @param string $name コントロール名 (name 属性値)
	 * @param string $content 内容
	 */
	function st_af_kanri_default_editor($location, $name, $content = '') {
		?>
		<textarea name="<?php echo esc_attr( $name ); ?>" cols="50" rows="10"><?php echo esc_html( $content ); ?></textarea>
		<?php
	}

	add_action('st_af_kanri_description_1_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_2_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_3_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_1b_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_2b_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_3b_editor', 'st_af_kanri_default_editor', 10, 6);

	add_action('st_af_kanri_description_0_editor', 'st_af_kanri_default_editor', 10, 6);

}

////////////////////////////////////////////
// スター
///////////////////////////////////////////

if ( !function_exists( 'st_admin_ranking_display_rank_1' ) ) {
	/**
	 * ランク1のスター
	 */
	function st_admin_ranking_display_rank_1(){
		if ( trim( $GLOBALS["myaf15"] ) !== '' ) {
		  $mystar = $GLOBALS["myaf15"];
			if ( $mystar == '5' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				</span>';
    			} elseif ( $mystar == '4' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '3' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '2' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i></span>';
    			} elseif ( $mystar == '1' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
			} else {
			}
		  return $mystarno ;
		}
	}
}

if ( !function_exists( 'st_admin_ranking_display_rank_2' ) ) {
	/**
	 * ランク2のスター
	 */
	function st_admin_ranking_display_rank_2(){
		if ( trim( $GLOBALS["myaf16"] ) !== '' ) {
		  $mystar = $GLOBALS["myaf16"];
			if ( $mystar == '5' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				</span>';
    			} elseif ( $mystar == '4' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '3' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '2' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '1' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
			} else {
			}
		  return $mystarno ;
		}
	}
}


if ( !function_exists( 'st_admin_ranking_display_rank_3' ) ) {
	/**
	 * ランク3のスター
	 */
	function st_admin_ranking_display_rank_3(){
		if ( trim( $GLOBALS["myaf17"] ) !== '' ) {
		  $mystar = $GLOBALS["myaf17"];
			if ( $mystar == '5' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				</span>';
    			} elseif ( $mystar == '4' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '3' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
    			} elseif ( $mystar == '2' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i></span>';
    			} elseif ( $mystar == '1' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="st-fa st-svg-star"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				<i class="st-fa st-svg-star-o"></i>
				</span>';
			} else {
			}
		  return $mystarno ;
		}
	}
}

////////////////////////////////////////////
// ランキングショートコード
///////////////////////////////////////////

// ランキングショートコード1
if ( ! function_exists( 'st_ranking_rank1_shortcode' ) ) {
	function st_ranking_rank1_shortcode() {
		$button_text          = $GLOBALS['myaf14'];
		$button_text_esc_html = esc_html( $button_text );
		$title                = $GLOBALS['myaf2'];
		$title_esc_html       = esc_html( $title );
		$banner_html          = trim( stripslashes( $GLOBALS['myaf3'] ) );
		$description          = apply_filters(
			'st_af_kanri_rank1_description',
			trim( stripslashes( $GLOBALS['myaf4'] ) ),
			'description_1',
			'my-af4'
		);
		$description_2        = apply_filters(
			'st_af_kanri_rank1b_description',
			trim( stripslashes( $GLOBALS['myaf4b'] ) ),
			'description_1b',
			'my-af4b'
		);
		$text_html            = trim( stripslashes( $GLOBALS['myaf5'] ) );
		$text_uri             = trim( stripslashes( $GLOBALS['myaf5b'] ) );
		$rel                  = ( get_option( 'my-af23', '' ) === 'yes' ) ? ' rel="nofollow"' : '';
		$mystarno             = st_admin_ranking_display_rank_1();
		$html                 = '';

		// 無限ループを回避する。
		$cache_key = hash( 'sha256',
			serialize( array(
				$button_text,
				$title,
				$banner_html,
				$description,
				$description_2,
				$text_html,
				$text_uri,
				$rel,
				$mystarno,
			) ) );

		$cache_value = wp_cache_get( $cache_key );

		if ( $cache_value !== false ) {
			return $cache_value;
		}

		if ( $title === '' ) {
			wp_cache_set( $cache_key, $html );

			return $html;
		}

		$html .= <<<HTML
<div class="rankid1">
<div class="rankst-box post">
	<h4 class="rankh4">{$title_esc_html}{$mystarno}</h4>
HTML;
		if ( $banner_html !== '' ) {
			$html .= <<< HTML
	<div class="clearfix rankst">
		<div class="rankst-l">{$banner_html}</div>
HTML;

			if ( $description !== '' ) {
				$html .= <<< HTML
		<div class="rankst-r"><div class="rankst-cont">{$description}</div></div>
HTML;
			}

			$html .= <<< HTML
	</div>
HTML;
		}

		if ( $description_2 !== '' ) {
			$html .= <<<HTML
	<div class="rankst-contb">{$description_2}</div>
HTML;
		}

		if ( $text_uri !== '' && $text_html !== '' ) { //両方あり
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-l">
			<p><a href="{$text_uri}"{$rel}>{$button_text_esc_html}</a></p>
		</div>
		<div class="rankstlink-r">
			<p>{$text_html}</p>
		</div>
	</div>
HTML;
		} elseif ( $text_uri !== '' && $text_html === '' ) { //詳細ページのみ
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-b">
			<p><a href="{$text_uri}"{$rel}>{$button_text_esc_html}</a></p>
		</div>
	</div>
HTML;
		} elseif ( $text_uri === '' && $text_html !== '' ) { //公式リンクのみ
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-a">
			<p>{$text_html}</p>
		</div>
	</div>
HTML;
		}

		$html .= <<<HTML
</div>
</div>
HTML;

		wp_cache_set( $cache_key, $html );

		return $html;
	}
}

add_shortcode( 'rank1', 'st_ranking_rank1_shortcode' );

// ランキングショートコード2

if ( ! function_exists( 'st_ranking_rank2_shortcode' ) ) {
	function st_ranking_rank2_shortcode() {
		$button_text          = $GLOBALS['myaf14'];
		$button_text_esc_html = esc_html( $button_text );
		$title                = $GLOBALS['myaf6'];
		$title_esc_html       = esc_html( $title );
		$banner_html          = trim( stripslashes( $GLOBALS['myaf7'] ) );
		$description          = apply_filters(
			'st_af_kanri_rank2_description',
			trim( stripslashes( $GLOBALS['myaf8'] ) ),
			'description_1',
			'my-af4'
		);
		$description_2        = apply_filters(
			'st_af_kanri_rank2b_description',
			trim( stripslashes( $GLOBALS['myaf8b'] ) ),
			'description_1b',
			'my-af4b'
		);
		$text_html            = trim( stripslashes( $GLOBALS['myaf9'] ) );
		$text_uri             = trim( stripslashes( $GLOBALS['myaf9b'] ) );
		$rel                  = ( get_option( 'my-af24', '' ) === 'yes' ) ? ' rel="nofollow"' : '';
		$mystarno             = st_admin_ranking_display_rank_2();
		$html                 = '';

		// 無限ループを回避する。
		$cache_key = hash( 'sha256',
			serialize( array(
				$button_text,
				$title,
				$banner_html,
				$description,
				$description_2,
				$text_html,
				$text_uri,
				$rel,
				$mystarno,
			) ) );

		$cache_value = wp_cache_get( $cache_key );

		if ( $cache_value !== false ) {
			return $cache_value;
		}

		if ( $title === '' ) {
			wp_cache_set( $cache_key, $html );

			return $html;
		}

		$html .= <<<HTML
<div class="rankid2">
<div class="rankst-box post">
	<h4 class="rankh4">{$title_esc_html}{$mystarno}</h4>
HTML;

		if ( $banner_html !== '' ) {
			$html .= <<< HTML
	<div class="clearfix rankst">
		<div class="rankst-l">{$banner_html}</div>
HTML;

			if ( $description !== '' ) {
				$html .= <<< HTML
		<div class="rankst-r"><div class="rankst-cont">{$description}</div></div>
HTML;
			}

			$html .= <<< HTML
	</div>
HTML;
		}

		if ( $description_2 !== '' ) {
			$html .= <<<HTML
	<div class="rankst-contb">{$description_2}</div>
HTML;
		}

		if ( $text_uri !== '' && $text_html !== '' ) { //両方あり
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-l">
			<p><a href="{$text_uri}"{$rel}>{$button_text_esc_html}</a></p>
		</div>
		<div class="rankstlink-r">
			<p>{$text_html}</p>
		</div>
	</div>
HTML;
		} elseif ( $text_uri !== '' && $text_html === '' ) { //詳細ページのみ
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-b">
			<p><a href="{$text_uri}"{$rel}>{$button_text_esc_html}</a></p>
		</div>
	</div>
HTML;
		} elseif ( $text_uri === '' && $text_html !== '' ) { //公式リンクのみ
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-a">
			<p>{$text_html}</p>
		</div>
	</div>
HTML;
		}

		$html .= <<<HTML
</div>
</div>
HTML;

		wp_cache_set( $cache_key, $html );

		return $html;
	}
}

add_shortcode( 'rank2', 'st_ranking_rank2_shortcode' );

// ランキングショートコード3

if ( ! function_exists( 'st_ranking_rank3_shortcode' ) ) {
	function st_ranking_rank3_shortcode() {
		$button_text          = $GLOBALS['myaf14'];
		$button_text_esc_html = esc_html( $button_text );
		$title                = $GLOBALS['myaf10'];
		$title_esc_html       = esc_html( $title );
		$banner_html          = trim( stripslashes( $GLOBALS['myaf11'] ) );
		$description          = apply_filters(
			'st_af_kanri_rank3_description',
			trim( stripslashes( $GLOBALS['myaf12'] ) ),
			'description_1',
			'my-af4'
		);
		$description_2        = apply_filters(
			'st_af_kanri_rank3b_description',
			trim( stripslashes( $GLOBALS['myaf12b'] ) ),
			'description_1b',
			'my-af4b'
		);
		$text_html            = trim( stripslashes( $GLOBALS['myaf13'] ) );
		$text_uri             = trim( stripslashes( $GLOBALS['myaf13b'] ) );
		$rel                  = ( get_option( 'my-af25', '' ) === 'yes' ) ? ' rel="nofollow"' : '';
		$mystarno             = st_admin_ranking_display_rank_3();
		$html                 = '';

		// 無限ループを回避する。
		$cache_key = hash( 'sha256',
			serialize( array(
				$button_text,
				$title,
				$banner_html,
				$description,
				$description_2,
				$text_html,
				$text_uri,
				$rel,
				$mystarno,
			) ) );

		$cache_value = wp_cache_get( $cache_key );

		if ( $cache_value !== false ) {
			return $cache_value;
		}

		if ( $title === '' ) {
			wp_cache_set( $cache_key, $html );

			return $html;
		}

		$html .= <<<HTML
<div class="rankid3">
<div class="rankst-box post">
	<h4 class="rankh4">{$title_esc_html}{$mystarno}</h4>
HTML;

		if ( $banner_html !== '' ) {
			$html .= <<< HTML
	<div class="clearfix rankst">
		<div class="rankst-l">{$banner_html}</div>
HTML;

			if ( $description !== '' ) {
				$html .= <<< HTML
		<div class="rankst-r"><div class="rankst-cont">{$description}</div></div>
HTML;
			}

			$html .= <<< HTML
	</div>
HTML;
		}

		if ( $description_2 !== '' ) {
			$html .= <<<HTML
	<div class="rankst-contb">{$description_2}</div>
HTML;
		}

		if ( $text_uri !== '' && $text_html !== '' ) { //両方あり
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-l">
			<p><a href="{$text_uri}"{$rel}>{$button_text_esc_html}</a></p>
		</div>
		<div class="rankstlink-r">
			<p>{$text_html}</p>
		</div>
	</div>
HTML;
		} elseif ( $text_uri !== '' && $text_html === '' ) { //詳細ページのみ
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-b">
			<p><a href="{$text_uri}"{$rel}>{$button_text_esc_html}</a></p>
		</div>
	</div>
HTML;
		} elseif ( $text_uri === '' && $text_html !== '' ) { //公式リンクのみ
			$html .= <<<HTML
	<div class="clearfix rankst">
		<div class="rankstlink-a">
			<p>{$text_html}</p>
		</div>
	</div>
HTML;
		}

		$html .= <<<HTML
</div>
</div>
HTML;

		wp_cache_set( $cache_key, $html );

		return $html;
	}
}

add_shortcode( 'rank3', 'st_ranking_rank3_shortcode' );

// ランキングショートコード全て

if ( ! function_exists( 'st_ranking_rank_shortcode' ) ) {
	function st_ranking_rank_shortcode() {
		$ranks1 = st_ranking_rank1_shortcode();
		$ranks2 = st_ranking_rank2_shortcode();
		$ranks3 = st_ranking_rank3_shortcode();

		$html4 = '';
		if ( trim( $GLOBALS["myaf2"] ) !== '' ) {
			$html4 .= $ranks1;
		}
		if ( trim( $GLOBALS["myaf6"] ) !== '' ) {
			$html4 .= $ranks2;
		}
		if ( trim( $GLOBALS["myaf10"] ) !== '' ) {
			$html4 .= $ranks3;
		}
		return $html4;
	}
}

add_shortcode( 'rank', 'st_ranking_rank_shortcode' );

// ランキングショートコード全てサイド用

$rankside1 = '<h4 class="rankh4">' . esc_html( $GLOBALS["myaf2"] ) . '</h4><div class="rankst-ls">' . stripslashes( $GLOBALS["myaf3"] ) . '</div>';
$rankside2 = '<h4 class="rankh4">' . esc_html( $GLOBALS["myaf6"] ) . '</h4><div class="rankst-ls">' . stripslashes( $GLOBALS["myaf7"] ) . '</div>';
$rankside3 = '<h4 class="rankh4">' . esc_html( $GLOBALS["myaf10"] ) . '</h4><div class="rankst-ls">' . stripslashes( $GLOBALS["myaf11"] ) . '</div>';

if ( ! function_exists( 'st_ranking_rank_side_shortcode' ) ) {
	function st_ranking_rank_side_shortcode() {
		$html5 = '';

		if ( trim( $GLOBALS["myaf2"] ) !== '' ) {
			$html5 .= $GLOBALS["rankside1"];
		}
		if ( trim( $GLOBALS["myaf6"] ) !== '' ) {
			$html5 .= $GLOBALS["rankside2"];
		}
		if ( trim( $GLOBALS["myaf10"] ) !== '' ) {
			$html5 .= $GLOBALS["rankside3"];
		}

		return $html5;
	}
}

add_shortcode( 'rank-side', 'st_ranking_rank_side_shortcode' );

//////////////////////////////////
// ランキングの説明
//////////////////////////////////

if ( !function_exists( 'st_af_kanri_default_editor_content' ) ) {
	/**
	 * ランキングの説明を取得 (デフォルトフィルター: HTMLをエスケープ / 改行を <br> へ変換 / p要素とする)
	 *
	 * @param string $content 説明の内容
	 *
	 * @return string 説明の内容
	 */
	function st_af_kanri_default_editor_content( $content ) {
		return '<p>' . nl2br( esc_html( $content ) ) . '</p>';
	}
	add_filter( 'st_af_kanri_rank_description', 'st_af_kanri_default_editor_content' );

	add_filter( 'st_af_kanri_rank1_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank2_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank3_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank1b_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank2b_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank3b_description', 'st_af_kanri_default_editor_content' );
}

add_filter( 'st_af_kanri_rank_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank1_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank1b_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank2_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank2b_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank3_description', 'do_shortcode' );
add_filter( 'st_af_kanri_rank3b_description', 'do_shortcode' );

// ランキングオリジナルCSS読み込み
if ( $GLOBALS['myaf1'] === '' && ! function_exists( 'st_ranking_enqueue_stylesheets' ) ) {
	function st_ranking_enqueue_stylesheets() {
		wp_register_style( 'single', get_template_directory_uri() . '/st-rankcss.php', array(), null, 'all' );
		wp_enqueue_style( 'single' );
	}

	add_action( 'wp_enqueue_scripts', 'st_ranking_enqueue_stylesheets' );
}

//////////////////////////////////
// ランキング個別表示 (投稿変種画面)
//////////////////////////////////

if ( ! function_exists( 'st_admin_ranking_add_meta_boxes' ) ) {
	function st_admin_ranking_add_meta_boxes() {
		add_meta_box( 'rankingdisplay', 'ランキング表示', 'st_admin_ranking_display_meta_box', 'page', 'normal', 'high' );
		add_meta_box( 'rankingdisplay', 'ランキング表示', 'st_admin_ranking_display_meta_box', 'post', 'normal', 'high' );
	}
}

add_action( 'add_meta_boxes', 'st_admin_ranking_add_meta_boxes' );

if ( ! function_exists( 'st_admin_ranking_display_meta_box' ) ) {
	function st_admin_ranking_display_meta_box() {
		global $post;

		wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_rankdisplay' );

		$rankingdisplay = get_post_meta( $post->ID, 'rankdisplayck', true );

		if ( $rankingdisplay === 'yes' ) {
			$rankdisplaychecked  = 'checked';
			$rankdisplaychecked2 = '';
			$rankdisplaychecked3 = '';
		} elseif ( $rankingdisplay === 'no' ) {
			$rankdisplaychecked  = '';
			$rankdisplaychecked2 = 'checked';
			$rankdisplaychecked3 = '';
		} else {
			$rankdisplaychecked  = '';
			$rankdisplaychecked2 = '';
			$rankdisplaychecked3 = 'checked';
		}

		echo '<label class="hidden" for="rankdisplayck">ランキング表示</label><p>※管理設定を無視して制御します</p><input type="radio" name="rankdisplayck" value="yes" ' . $rankdisplaychecked . '/>ランキングを表示';
		echo '<br/><input type="radio" name="rankdisplayck" value="no" ' . $rankdisplaychecked2 . '/>ランキングを非表示';
		echo '<br/><input type="radio" name="rankdisplayck" value="" ' . $rankdisplaychecked3 . '/>管理設定に合わせる';
	}
}

if ( ! function_exists( 'st_admin_ranking_save_post' ) ) {
	function st_admin_ranking_save_post( $post_id ) {
		$my_nonce = isset( $_POST['st_rankdisplay'] ) ? $_POST['st_rankdisplay'] : null;

		if ( ! wp_verify_nonce( $my_nonce, wp_create_nonce( __FILE__ ) ) ) {
			return $post_id;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		$data = $_POST['rankdisplayck'];

		if ( get_post_meta( $post_id, 'rankdisplayck' ) == "" ) {
			add_post_meta( $post_id, 'rankdisplayck', $data, true );
		} elseif ( $data != get_post_meta( $post_id, 'rankdisplayck', true ) ) {
			update_post_meta( $post_id, 'rankdisplayck', $data );
		} elseif ( $data == "" ) {
			delete_post_meta( $post_id, 'rankdisplayck', get_post_meta( $post_id, 'rankdisplayck', true ) );
		}
	}
}

add_action( 'save_post', 'st_admin_ranking_save_post' );

//////////////////////////////////
// メディア
//////////////////////////////////
if ( ! function_exists( 'st_admin_ranking_display_media_editor_button' ) ) {
	/**
	 * メディアエディタボタンを表示
	 *
	 * @param string $name URLを設定する input 要素の name 属性値
	 * @param string $label ボタンのラベル
	 * @param mixed[] $options オプション
	 *                         array(
	 *                             // クラス名
	 *                             'class' => 'button button-secondary button-medium'
	 *                         )
	 */
	function st_admin_ranking_display_media_editor_button( $name, $label = 'アップロード', $options = array() ) {
		$default_options = array(
			'class' => 'button button-secondary button-medium',
		);

		$options = array_merge( $default_options, $options );

		$name             = esc_attr( $name );
		$label            = esc_html( $label );
		$options['class'] = esc_attr( $options['class'] );

		echo <<<HTML
<button class="{$options['class']}" data-st-media-editor-button data-st-media-target="{$name}">{$label}</button>
HTML;
	}
}

if ( ! function_exists( 'st_admin_ranking_display_media_reset_button' ) ) {
	/**
	 * リセットボタンを表示
	 *
	 * @param string $name URLを設定する input 要素の name 属性値
	 * @param string $label ボタンのラベル
	 * @param mixed[] $options オプション
	 *                         array(
	 *                             // クラス名
	 *                             'class' => 'button button-secondary button-medium'
	 *                         )
	 */
	function st_admin_ranking_display_media_reset_button( $name, $label = '削除', $options = array() ) {
		$default_options = array(
			'class' => 'button button-secondary button-medium',
		);
		$options         = array_merge( $default_options, $options );

		$name             = esc_attr( $name );
		$label            = esc_html( $label );
		$options['class'] = esc_attr( $options['class'] );

		echo <<<HTML
<button class="{$options['class']}" data-st-media-reset-button data-st-media-target="{$name}">{$label}</button>
HTML;
	}
}

if ( ! function_exists( 'st_admin_ranking_enqueue_media_script' ) ) {
	function st_admin_ranking_enqueue_media_script( $hook_suffix ) {
		$hook_suffixes = array(
			// メディアアップローダーを利用する管理画面のURLを元に、フックサッフィクスを追加する
			//
			// 例: 管理画面のURLが http://example.com/wp-admin/admin.php?page=フックサフィックス (トップレベルページ) の場合
			//     'フックサフィックス'
			'toplevel_page_' . st_admin_ranking_get_menu_slug(),
		);

		if ( ! in_array( $hook_suffix, $hook_suffixes, true ) ) {
			return;
		}

		wp_enqueue_media();
		wp_enqueue_script(
			'st-media-editor',
			get_stylesheet_directory_uri() . '/js/st-media-editor.js',
			array( 'media-editor' ),
			false,
			true
		);
	}
}

add_action( 'admin_enqueue_scripts', 'st_admin_ranking_enqueue_media_script' );
