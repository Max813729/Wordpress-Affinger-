<!-- フッターのメインコンテンツ -->
<?php
// アイコンロゴが設定
if ( get_option( 'st_icon_logo' ) ): // サイトのタイトル又はキャッチフレーズが表示
	$st_icon_logo_url = esc_url( get_option( 'st_icon_logo' ) );
	$st_icon_logo_size_output = st_image_size_output($st_icon_logo_url, 'footer-icon-size', false);
else:
	$st_icon_logo_size_output = '';
endif;


// フッター用ロゴ画像の有無
$footer_logo_check = get_option( 'st_footer_logo' ) || ( get_option( 'st_logo_image' ) && ( st_headerfooter_logo() ) ) ? true : false;

// ロゴ画像
if ( get_option( 'st_footer_logo' ) ): // フッター用ロゴ画像あり
	$site_logo = get_option( 'st_footer_logo' ); // ヘッダー用ロゴ画像あり + 併用
elseif( get_option( 'st_logo_image' ) && ( st_headerfooter_logo() ) ):
	$site_logo = get_option( 'st_logo_image' );
else:
	$site_logo = '';
endif;

if ( ! $footer_logo_check && get_option( 'st_icon_logo' ) ): // フッター用ロゴ画像なし + アイコンロゴ画像がある時 ?>
	<div id="st-footer-logo">
		<div id="st-icon-logo">
			<?php if ( is_front_page() ): ?>
				<?php echo $st_icon_logo_size_output; // アイコンロゴ ?>
			<?php else: ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $st_icon_logo_size_output; // アイコンロゴ ?></a>
			<?php endif; ?>
		</div>
<?php endif; ?>

	<div id="st-text-logo">

		<?php if( isset( $GLOBALS['stdata127'] ) && $GLOBALS['stdata127'] === 'yes' ): // サイト名とキャッチフレーズを上下反対にする ?>

			<h3 class="footerlogo st-text-logo-top">
				<!-- ロゴ又はブログ名 -->
				<?php if ( !is_home() || !is_front_page() ): ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php endif; ?>

					<?php if  ( $site_logo ) : //ロゴ画像がある時 ?>
						<?php echo st_image_size_output($site_logo); // ロゴ ?>
					<?php else: //フッター用ロゴ画像が無い時 ?>
						<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
					<?php endif; ?>

				<?php if ( !is_home() || !is_front_page() ): ?>
					</a>
				<?php endif; ?>
			</h3>

			<?php if(trim($GLOBALS['stdata102']) === ''): ?>
				<p class="footer-description st-text-logo-bottom">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a>
				</p>
			<?php endif; ?>

		<?php else: ?>

			<?php if(trim($GLOBALS['stdata102']) === ''): ?>
				<p class="footer-description st-text-logo-top">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a>
				</p>
			<?php endif; ?>

			<h3 class="footerlogo st-text-logo-bottom">
				<!-- ロゴ又はブログ名 -->
				<?php if ( !is_home() || !is_front_page() ): ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php endif; ?>

					<?php if  ( $site_logo ) : //ロゴ画像がある時 ?>
						<?php echo st_image_size_output($site_logo); // ロゴ ?>
					<?php else: //フッター用ロゴ画像が無い時 ?>
						<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
					<?php endif; ?>

				<?php if ( !is_home() || !is_front_page() ): ?>
					</a>
				<?php endif; ?>
			</h3>

		<?php endif; ?>

	</div>

<?php if ( ! $footer_logo_check && get_option( 'st_icon_logo' ) ): // フッター用ロゴ画像なし + アイコンロゴ画像がある時 ?>
	</div><!-- /#st-footer-logo -->
<?php endif; ?>

<?php if(trim($GLOBALS['stdata206']) === ''): ?>
	<div class="st-footer-tel">
		<?php get_template_part( 'st-header-widget' ); //電話番号とヘッダー用ウィジェット ?>
	</div>
<?php endif; ?>
