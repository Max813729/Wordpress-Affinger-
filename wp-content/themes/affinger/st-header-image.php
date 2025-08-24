<?php

// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
     exit;
}?>

<?php
$show_on_all_pages = ( isset( $GLOBALS['stdata18'] ) && $GLOBALS['stdata18'] === 'yes' );
$show_as_slides    = ( isset( $GLOBALS['stdata30'] ) && $GLOBALS['stdata30'] === 'yes' );
if ( st_is_ver_ex() ) {
	$show_as_movie     = ( isset( $GLOBALS['stdata584'] ) && $GLOBALS['stdata584'] === 'yes' ); // ヘッダー画像エリアに動画を表示する
} else {
	$show_as_movie    = '';
}
$could_be_shown    = ( is_front_page() || $show_on_all_pages );

if ( trim($GLOBALS['stdata72']) !== '') {
	$header_img_link = esc_url($GLOBALS['stdata72']);
}else{
	$header_img_link = '';
}

/* スマホ用ヘッダー画像のsizeを取得 */
$st_mobile_header_url = get_option( 'st_mobile_header' );

if ( $st_mobile_header_url ) {
	$st_mobile_header_attachment_id = attachment_url_to_postid( $st_mobile_header_url );
	$st_mobile_header_alt           = ( $st_mobile_header_attachment_id !== 0 )
		? get_post_meta( $st_mobile_header_attachment_id, '_wp_attachment_image_alt', true )
		: false;
	$st_mobile_header_size_output   = st_image_size_output(
		$st_mobile_header_url,
		"st-mobile-header-img",
		$st_mobile_header_alt
	);
} else {
	$st_mobile_header_size_output = '';
}

if ( $show_as_movie ): // ヘッダー画像エリアに動画を表示する ?>

	<div id="gazou-wide">
		<?php if ( isset($GLOBALS['stdata35']) && $GLOBALS['stdata35'] === '' ) : //メニューを上に設定している場合
			get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
		endif; ?>
			<?php if ( $could_be_shown ): ?>
				<div id="st-headerbox">
					<div class="st-youtube-ami"></div>
					<div id="st-header" class="header-video-player">
						<?php if ( st_is_background_video_available( 'raw' ) ): ?>

						<?php elseif ( st_is_background_video_available( 'youtube' ) ): ?>
							<div class="video-player" data-st-youtube
								 data-st-youtube-options="<?php echo esc_attr( wp_json_encode( st_background_youtube_options() ) ); ?>">
								<div id="video-player-video" class="video-player-video" data-st-youtube-video></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		<?php if ( trim($GLOBALS['stdata35']) === 'bottom' ): //メニューを下に設定している場合
			get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
		endif; ?>
	</div>

<?php else: ?>

	<?php if ( !$could_be_shown || ( ( !st_is_mobile() && !has_header_image() || st_is_mobile() && !has_header_image() && !get_option( 'st_mobile_header' ) ) && !is_active_sidebar( 14 ) ) ) { //全て非表示の場合かヘッダーが無い且つウィジェットが無い場合
	?>
		<div id="gazou-wide">
			<?php if ( isset($GLOBALS['stdata35']) && $GLOBALS['stdata35'] === '' ) { //メニューを上に設定している場合
				get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
			} ?>
				<?php if ( $could_be_shown && ! is_paged() && trim ( $GLOBALS['stdata395'] ) !== '' ): ?>
					<div id="st-headerbox">
						<div id="st-header" class="post st-header-content">
							<?php get_template_part( 'st-header-content' ); //ヘッダー画像コンテンツ ?>
						</div>
					</div>
				<?php else: // ヘッダー画像エリア最低の高さ（px）反映用の空コンテンツ ?>
					<div id="st-headerbox">
						<div id="st-header">
						</div>
					</div>
				<?php endif; ?>
			<?php if ( trim($GLOBALS['stdata35']) === 'bottom' ) { //メニューを下に設定している場合
				get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
			} ?>
		</div>
	<?php
		return;
	}

	$header_images = get_uploaded_header_images();

	if ( trim($GLOBALS['stdata658']) === '' ) : //ヘッダー画像スライドショーの表示順
		shuffle($header_images);
	endif;

	$speed_ms    = (int) $GLOBALS['stdata32'];
	$is_fade     = ($GLOBALS['stdata31'] === 'fade');
	$is_rtl_lang = ($GLOBALS['stdata31'] === 'ltr');
	$dir         = $is_rtl_lang ? ' dir="rtl"' : '';

	$options = array(
		'slidesToShow'   => 1,
		'slidesToScroll' => 1,
		'autoplay'       => true,
		'autoplaySpeed'  => $speed_ms,
		'fade'           => $is_fade,
		'rtl'            => $is_rtl_lang,
	);
	?>

	<?php if ( $show_as_slides ) : // スライドショーがONの場合 ?>
		<div id="gazou-wide">
			<?php if ( isset($GLOBALS['stdata35']) && $GLOBALS['stdata35'] === '' ) { //メニューを上に設定している場合
				get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
			} ?>

			<?php if ( trim($GLOBALS['stdata76']) === '' ) { //ヘッダー非表示に値がなければ ?>
				<?php if( st_is_mobile() && trim($GLOBALS['stdata71']) !== '' ) { //スマホで且つ非表示にチェックがある場合 ?>
				<?php }else{ ?>
					<?php if ( is_active_sidebar( 14 ) ) : //ウィジェットが設定されている場合?>
						<div id="st-headerbox"><div id="st-header">
							<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 14 ) ) : else : //トップ下部のウィジェット ?>
							<?php endif; ?>
						</div></div>
					<?php else: ?>
						<div id="st-headerbox"><div id="st-header">
							<?php if($header_img_link){ //リンクが設定されている場合 ?>
									<?php if( get_option( 'st_mobile_header' ) && st_is_mobile() ) : //スマホ閲覧時でスマホヘッダー画像がある場合 ?>
										<a href="<?php echo $header_img_link; ?>"><?php echo $st_mobile_header_size_output; ?></a>
									<?php else: ?>
										<div id="header-slides"<?php echo $dir; ?> data-slick='<?php echo json_encode( $options, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP ); ?>'>
											<?php foreach ($header_images as $header) : ?>
												<div class="header-slides-slide">
													<a href="<?php echo $header_img_link; ?>">
														<img src="<?php echo esc_url($header['url']); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( $header['alt_text'] ); ?>" data-st-lazy-load="false" >
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
							<?php }else{ //リンクが設定されていない場合 ?>
									<?php if( get_option( 'st_mobile_header' ) && st_is_mobile() ) : //スマホ閲覧時でスマホヘッダー画像がある場合 ?>
										<?php echo $st_mobile_header_size_output; ?>
									<?php else: ?>
										<div id="header-slides"<?php echo $dir; ?> data-slick='<?php echo json_encode( $options, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP ); ?>'>
											<?php foreach ($header_images as $header) : ?>
												<div class="header-slides-slide">
														<img src="<?php echo esc_url($header['url']); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( $header['alt_text'] ); ?>" data-st-lazy-load="false" >
												</div>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
							<?php } ?>
						</div></div>
					<?php endif; ?>
				<?php } ?>
			<?php } ?>

			<?php if ( trim($GLOBALS['stdata35']) === 'bottom' ) { //メニューを下に設定している場合
				get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
			} ?>
		</div>

	<?php else : // スライド設定していないヘッダー画像 ?>

		<div id="gazou-wide">
			<?php if ( isset($GLOBALS['stdata35']) && $GLOBALS['stdata35'] === '' ) { //メニューを上に設定している場合
				get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
			} ?>

			<?php if ( trim($GLOBALS['stdata76']) === '' ) { //ヘッダー非表示に値がなければ ?>
				<?php if( st_is_mobile() && trim($GLOBALS['stdata71']) !== '' ) { //スマホで且つ非表示にチェックがある場合 ?>
				<?php }else{ ?>
					<?php if ( ! is_paged() && trim ( $GLOBALS['stdata395'] ) !== '' ): //ヘッダー画像コンテンツあり ?>
							<div id="st-headerbox">
								<div id="st-header" class="post st-header-content">
									<?php get_template_part( 'st-header-content' ); ?>
								</div>
							</div>
					<?php elseif ( is_active_sidebar( 14 ) ) : //ウィジェットが設定されている場合?>
						<div id="st-headerbox"><div id="st-header">
							<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 14 ) ) : else : //トップ下部のウィジェット ?>
							<?php endif; ?>
						</div></div>
					<?php else: ?>
						<?php if($header_img_link){ //リンクが設定されている場合 ?>
							<div id="st-headerbox">
								<a href="<?php echo $header_img_link; ?>">
									<div id="st-header">
										<?php if( get_option( 'st_mobile_header' ) && st_is_mobile() ) : //スマホ閲覧時でスマホヘッダー画像がある場合 ?>
												<?php echo $st_mobile_header_size_output; ?>
										<?php else: ?>
												<?php
												$header_url           = get_header_image();
												$header_attachment_id = attachment_url_to_postid( $header_url );
												$header_alt           = ( $header_attachment_id !== 0 ) ? get_post_meta( $header_attachment_id, '_wp_attachment_image_alt', true ) : '';
												?>
												<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( $header_alt ); ?>" data-st-lazy-load="false" >
										<?php endif; ?>
									</div>
								</a>
							</div>
						<?php }else{ //リンクが設定されていない場合 ?>
							<div id="st-headerbox">
								<div id="st-header">
										<?php if( get_option( 'st_mobile_header' ) && st_is_mobile() ) : //スマホ閲覧時でスマホヘッダー画像がある場合 ?>
												<?php echo $st_mobile_header_size_output; ?>
										<?php else: ?>
												<?php
												$header_url           = get_header_image();
												$header_attachment_id = attachment_url_to_postid( $header_url );
												$header_alt           = ( $header_attachment_id !== 0 ) ? get_post_meta( $header_attachment_id, '_wp_attachment_image_alt', true ) : '';
												?>
												<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( $header_alt ); ?>" data-st-lazy-load="false" >
										<?php endif; ?>
								</div>
							</div>
						<?php } ?>
					<?php endif; ?>


				<?php } ?>
			<?php } ?>

			<?php if ( trim($GLOBALS['stdata35']) === 'bottom' ) { //メニューを下に設定している場合
				get_template_part( 'st-header-menu' ); //カスタムヘッダーメニュー
			} ?>
		</div>
	<?php endif; ?>
	<!-- /gazou -->

<?php endif; ?>
