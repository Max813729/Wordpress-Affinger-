<?php
//スマホフッター追尾メニュー
if( st_is_mobile() && ! is_active_sidebar( 18 ) && ( trim($GLOBALS['stdata143']) === 'yes') ): // スマホ且つスマホフッター固定広告ウィジェットが空
	$footer_set_menu = array(
		'container' => 'nav',
		'container_class' => 'st-footer-ul',
		'theme_location' => 'smartphone-footermenu',
		'depth'           => 1,
	);
	$footer_none_menu = array(
		'container' => 'nav',
		'container_class' => 'st-footer-ul',
		'depth'           => 1,
	);

	if ( has_nav_menu( 'smartphone-footermenu' ) ) : //メニューセットあり ?>
		<div id="st-footermenubox">
				<?php wp_nav_menu( $footer_set_menu ); ?>
		</div>
	<?php endif;

else:

	//ページトップへ戻る
	if( get_theme_mod( 'st_pagetop_hidden' ) ): //ページトップへのボタンを表示しない
	elseif( get_theme_mod( 'st_pagetop_text' ) ): //ページトップへのボタンをテキストにする ?>
		<?php if ( get_option( 'st_pagetop_img' ) ): //ロゴ画像がある時 ?>
			<div id="page-top" class="page-top-img"><a href="#wrapper"><img src="<?php echo esc_url( get_option( 'st_pagetop_img' ) ); ?>" data-st-lazy-load="false"></a></div>
		<?php else: //ロゴ画像が無い時 ?>
			<a href="#wrapper" id="page-top" class="st-pagetop-text"><div>PAGE TOP</div></a>
		<?php endif; ?>
	<?php else: ?>
		<?php if ( get_option( 'st_pagetop_img' ) ): //ロゴ画像がある時 ?>
			<div id="page-top" class="page-top-img"><a href="#wrapper"><img src="<?php echo esc_url( get_option( 'st_pagetop_img' ) ); ?>" data-st-lazy-load="false"></a></div>
		<?php else: //ロゴ画像が無い時 ?>
			<div id="page-top"><a href="#wrapper" class="st-fa st-svg-angle-up"></a></div>
		<?php endif;
	endif;

endif;
