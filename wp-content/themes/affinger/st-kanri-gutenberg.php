<?php
/**
 * 管理画面 > Gutenberg 設定
 */

if ( ! function_exists( 'st_admin_gutenberg_get_menu_slug' ) ) {
	/**
	 * メニュースラッグを取得する
	 *
	 * @return string
	 */
	function st_admin_gutenberg_get_menu_slug() {
		return 'st-gutenberg-settings';
	}
}

if ( ! function_exists( 'st_admin_gutenberg_is_admin_screen' ) ) {
	/**
	 * 現在の画面が管理画面かどうかを取得する
	 *
	 * @return bool 管理画面の場合は true
	 */
	function st_admin_gutenberg_is_admin_screen() {
		global $pagenow;

		if ( ! is_admin() ) {
			return false;
		}

		$menu_slug = st_admin_gutenberg_get_menu_slug();

		if ( function_exists( 'get_current_screen' ) ) {
			$screen          = get_current_screen();
			$admin_screen_id = 'toplevel_page_' . $menu_slug;

			if ( $screen && $screen->id === $admin_screen_id ) {
				return true;
			}
		}

		return ( $pagenow === 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] === $menu_slug );
	}
}

if ( ! function_exists( 'st_admin_gutenberg_enqueue_scripts' ) ) {
	/**
	 * スクリプトを登録する
	 *
	 * @param string $hook_suffix
	 *
	 * @return void
	 */
	function st_admin_gutenberg_enqueue_scripts( $hook_suffix ) {
		if ( ! st_admin_gutenberg_is_admin_screen() ) {
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
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script(
			'st-admin-tabs',
			get_template_directory_uri() . '/js/st-admin-tabs.js',
			array( 'jquery-ui-tabs' )
		);
	}
}

add_action( 'admin_enqueue_scripts', 'st_admin_gutenberg_enqueue_scripts' );

if ( ! function_exists( 'st_admin_gutenberg_add_menu_pages' ) ) {
	/**
	 * メニューを追加する
	 *
	 * @return void
	 */
	function st_admin_gutenberg_add_menu_pages() {
		add_submenu_page(
			st_admin_get_menu_slug(),
			__( 'Gutenberg 設定', 'affinger' ),
			__( 'Gutenberg 設定', 'affinger' ),
			'manage_options',
			st_admin_gutenberg_get_menu_slug(),
			'st_admin_gutenberg_display_page',
			1
		);
	}
}

add_action( 'admin_menu', 'st_admin_gutenberg_add_menu_pages' );

if ( ! function_exists( 'st_admin_gutenberg_add_admin_bar_menu' ) ) {
	/**
	 * 管理バーメニューを追加する
	 *
	 * @return void
	 */
	function st_admin_gutenberg_add_admin_bar_menu() {
		global $wp_admin_bar;

		$args = [
			'id'     => st_admin_gutenberg_get_menu_slug(),
			'title'  => __( 'Gutenberg 設定', 'affinger' ),
			'parent' => 'st_theme_menu',
			'href'   => admin_url( 'admin.php?page=' . st_admin_gutenberg_get_menu_slug() ),
		];

		$wp_admin_bar->add_node( $args );
	}
}

if ( current_user_can( 'administrator' ) ) { // 管理者のみ
	add_action( 'wp_before_admin_bar_render', 'st_admin_gutenberg_add_admin_bar_menu', 11 );
}

if ( ! function_exists( 'st_admin_gutenberg_handle_submit' ) ) {
	/**
	 * POST をハンドリングする
	 *
	 * @return void
	 */
	function st_admin_gutenberg_handle_submit() {
		$menu_slug = st_admin_gutenberg_get_menu_slug();

		if ( ! isset( $_POST[ $menu_slug ] ) || ! $_POST[ $menu_slug ] ) {
			return;
		}

		if ( ! check_admin_referer( 'update', $menu_slug ) ) {
			return;
		}

		_st_admin_gutenberg_handle_update();

		wp_safe_redirect( menu_page_url( $menu_slug, false ) );
	}
}

add_action( 'admin_init', 'st_admin_gutenberg_handle_submit' );

if ( ! function_exists( '_st_admin_gutenberg_handle_update' ) ) {
	/**
	 * 設定を更新する
	 *
	 * @return void
	 */
	function _st_admin_gutenberg_handle_update() {
		$suffixes = array_merge(
			array( 238 ),         // `st-data240`
			array( 240 ),         // `st-data240`
			range( 416, 418 ),    // `st-data416` - `st-data418`
			array( 433 ),         // `st-data433`
			range( 452, 463 ),    // `st-data452` - `st-data463`
			range( 501, 504 ),    // `st-data501` - `st-data504`
			range( 508, 521 ),    // `st-data508` - `st-data520`
			range( 523, 561 ),    // `st-data523` - `st-data561`
			range( 566, 568 ),    // `st-data566` - `st-data568`
			range( 589, 591 ) ,   // `st-data589` - `st-data591`
			array( 612 ),         // `st-data612`
			array( 621,623 ),     // `st-data621` - `st-data623`
			array( 648 ),         // `st-data648`
			array( 655 ),         // `st-data655`
			array( 657 ),         // `st-data657`
			range(659, 678)       // 'st-data659' - 'st-data678'
		);

		foreach ( $suffixes as $suffix ) {
			$post_key   = 'st-data' . $suffix;
			$option_key = $post_key;

			if ( isset( $_POST[ $post_key ] ) && trim( $_POST[ $post_key ] ) !== '' ) {
				update_option( $option_key, $_POST[ $post_key ] );
			} else {
				update_option( $option_key, '' );
			}
		}

		$dependencies = array(
			// $suffix => array(
			//     $value => array(
			//         $dependent_suffix => $dependent_value
			//         ...
			//     )
			// )
			621 => array(
				'yes' => array(
					623 => 'yes'
				)
			)
		);

		foreach ( $suffixes as $suffix ) {
			$post_key   = 'st-data' . $suffix;

			if ( !isset( $_POST[ $post_key ] ) || ! $_POST[ $post_key ] ) {
				continue;
			}

			$value = $_POST[ $post_key ];

			if (! isset( $dependencies[ $suffix ][ $value ] ) ) {
				continue;
			}

			foreach ( $dependencies[ $suffix ][$value] as $dependent_suffix => $dependent_value ) {
				$dependent_option_key = 'st-data' . $dependent_suffix;

				update_option( $dependent_option_key, $dependent_value );
			}
		}
	}
}

if ( ! function_exists( 'st_admin_gutenberg_add_meta_boxes' ) ) {
	/**
	 * メタボックスを追加
	 *
	 * @return void
	 */
	function st_admin_gutenberg_add_meta_boxes() {
		add_meta_box(
			'submitdiv',
			'保存',
			'st_admin_display_submit_meta_box',
			st_admin_gutenberg_get_menu_slug(),
			'side'
		);
	}
}

add_action( 'admin_init', 'st_admin_gutenberg_add_meta_boxes' );

if ( ! function_exists( 'st_admin_gutenberg_display_page' ) ) {
	function st_admin_gutenberg_display_page() {
		global $hook_suffix;
		?>

		<div class="wrap">
			<h2 style="margin-bottom: 0;">Gutenberg 設定</h2>

			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<form id="my-main-form" method="post" action="" data-st-tabs-form>
						<?php wp_nonce_field( 'update', st_admin_gutenberg_get_menu_slug() ); ?>

						<div id="post-body-content">
							<div id="st-tabs" class="st-tabs" data-st-tabs>
								<ul class="st-tabs-nav">
									<li class="st-tabs-nav-item" data-st-tabs-nav-item>
										<a href="#st-gutenberg-general">
											<i class="dashicons dashicons-layout" aria-hidden="true"
											   style="margin-right: 0;"></i>
											<span class="st-tabs-nav-item-label">全般</span>
										</a>
									</li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item>
										<a href="#st-gutenberg-group">
											<i class="dashicons dashicons-layout" aria-hidden="true"
											   style="margin-right: 0;"></i>
											<span class="st-tabs-nav-item-label">グループブロック</span>
										</a>
									</li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item>
										<a href="#st-gutenberg-paragraph">
											<i class="dashicons dashicons-layout" aria-hidden="true"
											   style="margin-right: 0;"></i>
											<span class="st-tabs-nav-item-label">段落ブロック</span>
										</a>
									</li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item>
										<a href="#st-gutenberg-st-tabs">
											<i class="dashicons dashicons-layout" aria-hidden="true"
											   style="margin-right: 0;"></i>
											<span class="st-tabs-nav-item-label">タブブロック</span>
										</a>
									</li>
								</ul>

								<div class="st-tabs-contents" data-st-tabs-contents>
									<?php _st_admin_gutenberg_display_general_section(); ?>
								</div>
							</div>
						</div>

						<div id="postbox-container-1" class="postbox-container">
							<?php do_meta_boxes( st_admin_gutenberg_get_menu_slug(), 'side', null ); ?>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_gutenberg_display_general_section' ) ) {
	/**
	 * 全般設定
	 *
	 * @return void
	 */
	function _st_admin_gutenberg_display_general_section() {

		$st_is_ex    = st_is_ver_ex();
		$st_is_af    = st_is_ver_af();
		$st_is_st    = st_is_ver_st();
		$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="st-gutenberg-general" class="st-tabs-content">
			<h3 class="h3tai">
				<i class="dashicons dashicons-layout" aria-hidden="true" style="margin-right: 0;"></i>
				全般設定
			</h3>

				<?php if ( ! _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) ): ?>
					<div style="padding:0px;text-align:center;"><p style="color:#555;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>「<a href="//affinger.com/action-manual/gutenberg-info/">AFFINGERブロックプラグイン</a>」が有効化されていません（閲覧パスワード: actionuser）</p></div>
				<?php endif; ?>

			<h4><i class="st-fa st-svg-cog" aria-hidden="true"></i>基本設定</h4>

			<?php if ( st_is_experimental_mode_enabled() ) { ?>
               <div style="border: solid 5px #f3f3f3;padding: 10px 20px;margin-bottom: 10px;">
                    <p><input type="checkbox" name="st-data240" value="yes" <?php if ( $GLOBALS["stdata240"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   ビジュアルエディタのデザインを実際に近づける（ClassicEditor兼用）</p>
				   <p>※処理速度が落ちる場合がございます。jsで表現している見出しタグのデザインやショートコードなどは表示されないため実際とは異なる場合がございます</p>
               </div>
			<?php } ?>

			<p>
				投稿画面の幅：
				<input type="number" name="st-data433" value="<?php echo esc_attr( $GLOBALS["stdata433"] ); ?>"
				       placeholder="900">
				px（空白の場合は100%）
			</p>

			<?php if ( isset( $GLOBALS["stdata542"] ) && $GLOBALS["stdata542"] < 10 ) {
			$GLOBALS["stdata542"] = 10;
			} ?>

			<p>
				自動保存間隔：
				<input type="text" pattern="^[0-9]+$" name="st-data542" value="<?php echo esc_attr( $GLOBALS["stdata542"] ); ?>"
				       placeholder="300">
				ms（※最低10）
			</p>

			<h5>ブロック設定</h5>

			<p>
				<input type="checkbox" name="st-data501"
				       value="yes"<?php checked( $GLOBALS["stdata501"] === 'yes' ); ?>>
				「ブロックタイプ又はスタイルを変更」の項目をシンプルにする
			</p>

			<p>
				<input type="checkbox" name="st-data655"
				       value="yes"<?php checked( $GLOBALS["stdata655"] === 'yes' ); ?>>
				ブロックエリアのホバー時に枠線を表示する
			</p>

			<p>
				<input type="checkbox" name="st-data452"
				       value="yes"<?php checked( $GLOBALS["stdata452"] === 'yes' ); ?>>
				Gutenbergブロック厳選モード
			</p>

			<p class="komozi">
				※Gutenbergブロック厳選モードでは使用頻度が低いと思われるブロックを非表示にしています。</p>

			<h4>マイブロック</h4>

			<p>
				<input type="checkbox" name="st-data591"
				       value="yes"<?php checked( $GLOBALS["stdata591"] === 'yes' ); ?>>
				マイブロックのショートコードに編集リンクを表示する
			</p>

			<h4>埋め込みURL</h4>

			<p>
				<input type="checkbox" name="st-data657" value="yes" <?php if ( $GLOBALS["stdata657"] === 'yes' ) {
					echo 'checked';
				} ?>>
				URLの自動ブログカード化をテキストリンクに変更する</p>

            <p>
                 <input type="checkbox" name="st-data238" value="yes" <?php if ( $GLOBALS["stdata238"] === 'yes' ) {
                     echo 'checked';
                 } ?>>
				URLの自動ブログカード化を停止する</p>

           <p>
                <input type="checkbox" name="st-data566" value="yes" <?php if ( $GLOBALS["stdata566"] === 'yes' ) {
                    echo 'checked';
                } ?>>
			   デフォルトの埋め込みURL（ブログカード）の変換を停止</p>

			<p>
				<input type="checkbox" name="st-data648" value="yes" <?php if ( $GLOBALS["stdata648"] === 'yes' ) {
					echo 'checked';
				} ?>>
				デフォルトの埋め込みURL（ブログカード）の変換を外部リンクのみ停止</p>

			<h4>カラー設定</h4>

			<h5 class="grid-bg">マイ細マーカー設定</h5>

			<table>
				<tr>
					<td><p style="margin-top:0;">マイ細マーカーA</p></td>
					<td><p style="margin-top:0;">：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data418" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata418"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>（テキスト）<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data417" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata417"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>（マーカー）</p></td>
				</tr>
				<tr>
					<td><p style="margin-top:0;">マイ細マーカーB</p></td>
					<td><p style="margin-top:0;">：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data590" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata590"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>（テキスト）<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data589" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata589"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>（マーカー）</p></td>
				</tr>
			</table>

			<p>
				<input type="checkbox" name="st-data612"
				       value="yes"<?php checked( $GLOBALS["stdata612"] === 'yes' ); ?>>
				ストライプにする
			</p>

			<p class="komozi">
				※ClassicEditor兼用
			</p>

			<h5 class="grid-bg">ボーダー設定</h5>

			<p>
				カラー：
				<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data502"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata502"] ) ); ?>" size="6"
				       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>

				角丸：
				<input type="number" name="st-data503"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata503"] ) ); ?>" placeholder="5">
				px
			</p>

			<h5 class="grid-bg">オリジナルカラーパレット</h5>

			<p>色設定のカラーパレットの最後の4つを任意の色に指定します。</p>

			<p>
				カラーA：
				<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data460"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata460"] ) ); ?>" size="6"
				       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>

				カラーB：
				<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data461"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata461"] ) ); ?>" size="6"
				       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>

				カラーC：
				<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data462"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata462"] ) ); ?>" size="6"
				       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>

				カラーD：
				<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data463"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata463"] ) ); ?>" size="6"
				       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></p>

				<p class="komozi">
					※値が空の場合はカスタマイザーの全体カラー（簡単カラー有効時）&gt; AFFINGER管理のカラーパターンの順に反映されます。
				</p>

			<?php $lock = '';
				if ( $lock && isset( $GLOBALS['wp_version'] ) && version_compare( $GLOBALS['wp_version'], '5.8-alpha', '>=' ) ) { // WP5.8以上 ?>

				<h4><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>非推奨設定の有効化</h4>

				<p class="komozi">※非対応の項目です。ご利用方法等によっては不具合が生じる可能性もございますのでご利用の場合は予めご了承ください。</p>

				<h5>Gutenbergブロック</h5>

				<p>
					<input type="checkbox" name="st-data623"
							   value="yes"<?php checked( $GLOBALS["stdata623"] === 'yes' ); ?>>
					非対応のGutenbergブロックを有効化する（主にFSEを念頭に5.8以降に追加されたブロック）
				</p>

				<h5>ウィジェットブロックエディター設定</h5>

				<p>
					<input type="checkbox" name="st-data621"
							   value="yes"<?php checked( $GLOBALS["stdata621"] === 'yes' ); ?>>
					ウィジェットブロックエディターを有効化する（※ご使用時は上記の「非対応のGutenbergブロック」も有効化されます。）
				</p>

			<?php } ?>

			<p class="kanri-page-top">
				<a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a>
			</p>

			<hr>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
				       class="button button-primary button-large">
			</p>
		</div>

		<div id="st-gutenberg-group" class="st-tabs-content">
			<h3 class="h3tai">
				<i class="dashicons dashicons-layout" aria-hidden="true" style="margin-right: 0;"></i>
				グループブロック
			</h3>

			<p class="komozi">
				<span class="aka"><i class="st-fa st-svg-exclamation-triangle" aria-hidden="true"></i></span>原則として変更された値は使用した箇所全てに反映されます
			</p>

			<h4>ブロック下の余白</h4>

			<p class="komozi">※[ 小 ]がデフォルト値となります。</p>

			<p><span class="st-block-margin-bottom-set"><span class="st-block-margin-bottom-set-txt">
				[ -大 ]：</span>
				<input type="number" name="st-data538"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata538"] ) ); ?>" placeholder="-20">
				px</span>
			<span class="st-block-margin-bottom-set"><span class="st-block-margin-bottom-set-txt">
				[ -小 ]：</span>
				<input type="number" name="st-data539"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata539"] ) ); ?>" placeholder="-10">
				px</span>

			<span class="st-block-margin-bottom-set"><span class="st-block-margin-bottom-set-txt">
				[ 大 ]：</span>
				<input type="number" name="st-data541"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata541"] ) ); ?>" placeholder="40">
				px</span>
			</p>
			<p>
				[固]（旧: 小）は全体に反映される固定値です。テーマ管理の<span class="st-code">「全体設定」＞フォントのサイズ＞段落（Pタグ）下の余白</span>で変更できます
			</p>
		</div>

		<div id="st-gutenberg-paragraph" class="st-tabs-content">
			<h3 class="h3tai">
				<i class="dashicons dashicons-layout" aria-hidden="true" style="margin-right: 0;"></i>
				段落ブロック
			</h3>

			<?php if( isset( $GLOBALS['wp_version'] ) && version_compare( $GLOBALS['wp_version'], '5.8-alpha', '<' ) ){ ?>
				<p><input type="checkbox" name="st-data622" value="yes" <?php if ( $GLOBALS["stdata622"] === 'yes' ) {
                         echo 'checked';
		} ?>>オリジナルの段落スタイルを使用する（注）</p>
			<p class="komozi">※WordPress5.7では上記有効化により再利用ブロックに関する一部不具合がございます。詳しくは<a href="#" target="_blank" rel="nofollow noopener">コチラ</a>をご確認下さい</p>
			
			<?php } ?>

			<h4>段落ブロックスタイル(アイコン)</h4>

			<p>段落ブロックスタイルに用意されたアイコンのカラー（前）と背景色（後）を指定します。（チェックを入れたスタイルは非表示になります）<br><span class="aka">※過去に使用したスタイルを非表示にすると再編集時に正常に編集できなくなりますのでご注意下さい</span></p>

			<p>
				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data543" value="yes"<?php checked( $GLOBALS["stdata543"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata543"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-pencil"></i>（カスタム）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data508"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata508"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data523"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata523"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data544" value="yes"<?php checked( $GLOBALS["stdata544"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata544"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-file-text-o"></i>（メモ）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data509"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata509"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data524"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata524"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data545" value="yes"<?php checked( $GLOBALS["stdata545"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata545"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-link"></i>（リンク）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data510"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata510"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data525"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata525"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data546" value="yes"<?php checked( $GLOBALS["stdata546"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata546"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-check"></i>（チェック）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data511"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata511"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data526"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata526"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data547" value="yes"<?php checked( $GLOBALS["stdata547"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata547"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-lightbulb-o"></i>（ポイント）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data512"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata512"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data527"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata527"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data548" value="yes"<?php checked( $GLOBALS["stdata548"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata548"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-info-circle"></i>（インフォ）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data513"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata513"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data528"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata528"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data549" value="yes"<?php checked( $GLOBALS["stdata549"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata549"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-bigginer_l"></i>（初心者）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data514"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata514"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data529"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata529"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data550" value="yes"<?php checked( $GLOBALS["stdata550"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata550"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-exclamation-circle"></i>（注意）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data515"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata515"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data530"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata530"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data551" value="yes"<?php checked( $GLOBALS["stdata551"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata551"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-circle-o"></i>（マル）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data516"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata516"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data531"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata531"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data552" value="yes"<?php checked( $GLOBALS["stdata552"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata552"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-times"></i>（バツ）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data517"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata517"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data532"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata532"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data553" value="yes"<?php checked( $GLOBALS["stdata553"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata553"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-thumbs-up"></i>（Like）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data518"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata518"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data533"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata533"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data554" value="yes"<?php checked( $GLOBALS["stdata554"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata554"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-thumbs-down"></i>（Bad）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data519"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata519"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data534"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata534"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data555" value="yes"<?php checked( $GLOBALS["stdata555"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata555"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-code"></i>（Code）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data520"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata520"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data535"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata535"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>

				<span class="st-svg-color-set">
					<input type="checkbox" name="st-data556" value="yes"<?php checked( $GLOBALS["stdata556"] === 'yes' ); ?>>
					<span class="st-svg-color-set-txt <?php if( trim( $GLOBALS["stdata556"] ) !== ''): echo 'st-admin-opacity'; endif; ?>"><i class="st-svg-chevron-right"></i>（ボタン）</span>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data521"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata521"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
					<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data536"
					       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata536"] ) ); ?>" size="6"
					       style="ime-mode: disabled;" maxlength="6" data-wp-color-picker></span>
			</p>

			<h5>その他の非表示設定</h5>

			<p>
				<input type="checkbox" name="st-data567" value="yes"<?php checked( $GLOBALS["stdata567"] === 'yes' ); ?>>簡易会話 <input type="checkbox" name="st-data568" value="yes"<?php checked( $GLOBALS["stdata568"] === 'yes' ); ?>>簡易会話B（※アイコン画像は「テーマ管理」＞「会話・ファビコン等」の会話風アイコン1と2が反映されます）
			</p>

			<p>
				<input type="checkbox" name="st-data558" value="yes"<?php checked( $GLOBALS["stdata558"] === 'yes' ); ?>>付箋 <input type="checkbox" name="st-data559" value="yes"<?php checked( $GLOBALS["stdata559"] === 'yes' ); ?>>囲みドット <input type="checkbox" name="st-data560" value="yes"<?php checked( $GLOBALS["stdata560"] === 'yes' ); ?>>ふきだし <input type="checkbox" name="st-data561" value="yes"<?php checked( $GLOBALS["stdata561"] === 'yes' ); ?>>まるもじ
			</p>

			<p class="komozi">
				※<i class="st-svg-code"></i>（Code）の背景色を指定するとテキスト色は白から黒に変わります。<br>
				※各テキスト及び背景色はブロックごとの色設定で変更できます。
			</p>

			<h4>角丸</h4>
			<p>
				段落スタイルに反映します（付箋・まるもじ・簡易ボタン・簡易会話を除く）
			</p>

			<p>
				<input type="number" name="st-data504"
				       value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata504"] ) ); ?>" placeholder="5">
				px
			</p>

			<p class="kanri-page-top">
				<a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a>
			</p>

			<hr>

			<p class="komozi">
				<span class="aka"><i class="st-fa st-svg-exclamation-triangle" aria-hidden="true"></i></span>原則として変更された値は使用した箇所全てに反映されます
			</p>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
				       class="button button-primary button-large">
			</p>

		</div>

		<div id="st-gutenberg-st-tabs" class="st-tabs-content">
			<h3 class="h3tai">
				<i class="dashicons dashicons-layout" aria-hidden="true" style="margin-right: 0;"></i>
				タブブロック
			</h3>

			<h4>デフォルト設定</h4>

			<p>「AFFINGER: タブ」ブロックの各スタイルごとに「タブリスト」ブロックのデフォルト値を設定します。設定が未設定の「タブリスト」ブロック全てに反映されます。</p>

			<div class="st-setting-set-group">
				<div class="st-setting-set">
					<span class="st-setting-set__name">
						デフォルト
					</span>

					<span class="st-setting-set__setting-group">
						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data659">
								テキスト
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data659" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data659"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata659"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data660">
								背景
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data660" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data660"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata660"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data661">
								枠線
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data661" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data661"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata661"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data662">
								枠線の幅
							</label>

							<span class="st-setting-set__setting-control">
								<input
									id="st-data662" class="small-text" type="number" name="st-data662"
									value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata662"] ) ); ?>"
									min="0"
									placeholder="1"
								> px
							</span>
						</span>
					</span>
				</div>

				<div class="st-setting-set">
					<span class="st-setting-set__name">
						スクエア
					</span>

					<span class="st-setting-set__setting-group">
						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data663">
								テキスト
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data663" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data663"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata663"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data664">
								背景
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data664" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data664"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata664"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data665">
								枠線
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data665" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data665"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata665"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data666">
								枠線の幅
							</label>

							<span class="st-setting-set__setting-control">
								<input
									id="st-data666" class="small-text" type="number" name="st-data666"
									value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata666"] ) ); ?>"
									min="0"
									placeholder="1"
								> px
							</span>
						</span>
					</span>
				</div>

				<div class="st-setting-set">
					<span class="st-setting-set__name">
						ふきだし
					</span>

					<span class="st-setting-set__setting-group">
						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data667">
								テキスト
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data667" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data667"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata667"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data668">
								背景
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data668" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data668"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata668"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data669">
								枠線
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data669" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data669"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata669"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data670">
								枠線の幅
							</label>

							<span class="st-setting-set__setting-control">
								<input
									id="st-data670" class="small-text" type="number" name="st-data670"
									value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata670"] ) ); ?>"
									min="0"
									placeholder="1"
								> px
							</span>
						</span>
					</span>
				</div>

				<div class="st-setting-set">
					<span class="st-setting-set__name">
						タブ
					</span>

					<span class="st-setting-set__setting-group">
						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data671">
								テキスト
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data671" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data671"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata671"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data672">
								背景
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data672" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data672"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata672"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data672">
								枠線
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data672" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data673"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata673"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data674">
								枠線の幅
							</label>

							<span class="st-setting-set__setting-control">
								<input
									id="st-data674" class="small-text" type="number" name="st-data674"
									value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata674"] ) ); ?>"
									min="0"
									placeholder="1"
								> px
							</span>
						</span>
					</span>
				</div>

				<div class="st-setting-set">
					<span class="st-setting-set__name">
						ボーダー
					</span>

					<span class="st-setting-set__setting-group">
						<dlabel class="st-setting-set__setting" for="st-data674">
							<span class="st-setting-set__setting-label">
								テキスト
							</span>

							<span class="st-setting-set__setting-control">
								<input id="st-data674" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data675"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata675"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</dlabel>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data675">
								背景
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data675" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data676"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata676"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data677">
								枠線
							</label>

							<span class="st-setting-set__setting-control">
								<input id="st-data677" type="text" pattern="^#[0-9A-Za-z]+$" name="st-data677"
									   value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata677"] ) ); ?>" size="6"
									   style="ime-mode: disabled;" maxlength="6" data-wp-color-picker>
							</span>
						</span>

						<span class="st-setting-set__setting">
							<label class="st-setting-set__setting-label" for="st-data678">
								枠線の幅
							</label>

							<span class="st-setting-set__setting-control">
								<input
									id="st-data678" class="small-text" type="number" name="st-data678"
									value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata678"] ) ); ?>"
									min="0"
									placeholder="1"
								> px
							</span>
						</span>
					</span>
				</div>
			</div>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
				       class="button button-primary button-large">
			</p>
		</div>
		<?php
	}
}
