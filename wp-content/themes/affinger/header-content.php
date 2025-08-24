<?php
if ( st_hide_header() ): // ヘッダーを表示しない
	return;
endif;

// アイコンロゴが設定
if ( get_option( 'st_icon_logo' ) ): // サイトのタイトル又はキャッチフレーズが表示
	$st_icon_logo_url = esc_url( get_option( 'st_icon_logo' ) );
	$st_icon_logo_size_output = st_image_size_output($st_icon_logo_url, "st-icon-logo-sp", false);
else:
	$st_icon_logo_size_output = '';
endif;
?>


<header id="<?php st_head_class(); ?>">
	<div id="header-full">
		<div id="headbox-bg-fixed">
			<div id="headbox-bg">
				<div id="headbox">

					<?php get_template_part( 'st-accordion-menu' ); //アコーディオンメニュー & スマホ「ヘッダーメニュー（横列）」メニューの固定表示 ?>

					<?php if( ! st_is_mobile() || ( st_is_mobile() && st_has_additional_mobile_menu() ) ): ?>
						<div id="header-l">
							<?php if ( get_option( 'st_icon_logo' ) && ! get_option( 'st_logo_image' ) && ( st_header_sitetitle() || st_header_catchphrase() ) ): //アイコンロゴ画像がある時 ?>
								<div id="st-icon-logo">
									<?php if ( is_front_page() ): ?>
										<?php echo $st_icon_logo_size_output; // アイコンロゴ ?>
									<?php else: ?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $st_icon_logo_size_output; // アイコンロゴ ?></a>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<div id="st-text-logo">
								<?php get_template_part( 'st-header-logo' ); //サイト名とディスクリプション ?>
							</div>
						</div><!-- /#header-l -->
					<?php endif; ?>

					<div id="header-r" class="smanone">
						<?php if ( has_nav_menu( 'primary-menu-side' ) && isset($GLOBALS['stdata428']) && $GLOBALS['stdata428'] === 'yes' ):
							get_template_part( 'st-footer-link-design' ); //ヘッダーメニュー（横列）
						else:
							if ( isset($GLOBALS['stdata43']) && $GLOBALS['stdata43'] === 'yes' ) : //ヘッダー上部にフッター用リンクと同じリンクを追加する
								get_template_part( 'st-footer-link' ); //フッターリンク
								get_template_part( 'st-header-widget' ); //電話番号とヘッダー用ウィジェット
							else:
								get_template_part( 'st-header-widget' ); //電話番号とヘッダー用ウィジェット
							endif;
						endif; ?>
					</div><!-- /#header-r -->

				</div><!-- /#headbox -->
			</div><!-- /#headbox-bg clearfix -->
		</div><!-- /#headbox-bg-fixed -->

		<?php if( is_single() or is_page() ){ //一括挿入ウィジェットの表示確認
			$postID = $wp_query->post->ID;
			$ikkatuwidgetset = get_post_meta( $postID, 'ikkatuwidget_set', true );
		}else{
			$ikkatuwidgetset = '';
		}
		?>

		<?php if (( is_active_sidebar( 31 ) ) && ( trim( $ikkatuwidgetset ) === '' )) : //ヘッダーインフォメーションウィジェットが設定されている場合 ?>
			<div id="st-header-top-widgets-box-wrapper">
				<div id="st-header-top-widgets-box">
					<div class="st-content-width">
						<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 31 ) ) : else : // ヘッダー画像上 ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( _st_is_mobile_link_design_available() ): ?>
			<div id="st-mobile-link-design">
				<?php get_template_part( 'st-footer-link-design' ); //スマホヘッダーメニュー（横列） ?>
			</div>
		<?php endif; ?>

		<?php if ( $GLOBALS['stdata250'] !== 'bottom' && ( isset($GLOBALS['stdata154']) && $GLOBALS['stdata154'] === 'yes' ) ) {
			get_template_part( 'st-smartmiddle-menu' ); //ミドルリンク上
		} ?>

	<?php if ( $GLOBALS['stdata266'] === 'yes' ): // 記事スライドショーが有効の場合 ?>
		<?php get_template_part( 'st-header-slider' ); ?>
	<?php else: ?>
		<?php get_template_part( 'st-header-image' ); //カスタムヘッダー画像 ?>
	<?php endif; ?>

<?php $header_full_area = get_theme_mod('st_headerbg_image_area'); //headerの背景画像の範囲
if ( ! $header_full_area ) { ?>
	</div><!-- #header-full -->
<?php } ?>

	<?php if ( ( isset($GLOBALS['stdata250']) && $GLOBALS['stdata250'] === 'bottom' ) && ( isset($GLOBALS['stdata154']) && $GLOBALS['stdata154'] === 'yes' ) ) {
		get_template_part( 'st-smartmiddle-menu' ); //ミドルリンク下
	} ?>

<?php if (
			( isset( $GLOBALS['stdata604'] ) && $GLOBALS['stdata604'] === 'all' ) // サムネイルスライドショーを全てに表示
		 || ( is_front_page() && isset( $GLOBALS['stdata604'] ) && $GLOBALS['stdata604'] === 'top' ) // サムネイルスライドショーをトップに表示
		 || is_active_sidebar( 28 ) //ウィジェットが設定されている場合
	) : ?>
	<div id="st-header-under-widgets-box-wrap">
		<div id="st-header-under-widgets-box">
			<?php if ( isset($GLOBALS['stdata604']) && $GLOBALS['stdata604'] === 'all' || ( is_front_page() && $GLOBALS['stdata604'] === 'top' ) ): ?>
				<div id="st-header-bottom-category">
					<?php get_template_part( 'st-header-bottom-category' ); //カテゴリースライドショー ?>
				</div>
			<?php endif; ?>
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 28 ) ) : else : // ヘッダー画像下 ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>

<?php if ( isset( $header_full_area ) && ( $header_full_area === 'middle' ) ) { ?>
	</div><!-- #header-full -->
<?php } ?>

<?php get_template_part( 'st-header-cardlink' ); //ヘッダーバナーリンク ?>

<?php if ( isset( $header_full_area ) && ( $header_full_area === 'bottom' ) ) { ?>
	</div><!-- #header-full -->
<?php } ?>

</header>
