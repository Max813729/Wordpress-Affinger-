</div><!-- /contentw -->

<?php
$post_id            = get_queried_object_id();
if ( is_single() || is_page() ) :
	$show_ikkatu_widget = ( get_post_meta( $post_id, 'ikkatuwidget_set', true ) !== 'yes' );    // 一括挿入ウィジェットの表示確認
else:
	$show_ikkatu_widget = true;
endif;
?>

<?php if ( $show_ikkatu_widget && is_active_sidebar( 36) ) : // フッターバナーエリア ?>
	<div id="st-footer-under-widgets-box-wrap">
		<div id="st-footer-under-widgets-box">
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 36) ) : else : // ヘッダー画像下 ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>

<footer>
	<div id="footer">
		<div id="footer-wrapper">
			<div id="footer-in">
				<?php get_template_part( 'st-footer-link' ); //フッターリンク ?>

				<?php if ( is_active_sidebar( 11 ) ) { //フッターウィジェットがある場合 ?>
					<?php if ( is_active_sidebar( 30 ) ) { //フッターウィジェット3列目がある場合 ?>
						<div class="footer-wbox clearfix">
							<div class="footer-r footer-column3 clearfix">
								<div class="footer-r-2">
									<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 11 ) ) : else : //フッターウィジェット ?>
									<?php endif; ?>
								</div>
								<div class="footer-r-3">
									<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 30 ) ) : else : //フッターウィジェット3列目 ?>
									<?php endif; ?>
								</div>
							</div>
							<div class="footer-l">
								<?php get_template_part( 'st-footer-content' ); //フッターのメインコンテンツ ?>
							</div>
						</div>
					<?php }else{ //フッターウィジェット3列目がない場合 ?>
						<div class="footer-wbox clearfix">
							<div class="footer-r">
								<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 11 ) ) : else : //フッターウィジェット ?>
								<?php endif; ?>
							</div>
							<div class="footer-l">
								<?php get_template_part( 'st-footer-content' ); //フッターのメインコンテンツ ?>
							</div>
						</div>
					<?php } ?>
				<?php }else{ ?>
					<div id="st-footer-logo-wrapper">
						<?php get_template_part( 'st-footer-content' ); //フッターのメインコンテンツ ?>
					</div>
				<?php } ?>

				<?php // copyright
				if ( trim( $GLOBALS['stdata490']) !== '' ) {
					$copy_year = $GLOBALS['stdata490'];
				} else {
					$copy_year = date( 'Y' );
				}
				if ( trim( $GLOBALS['stdata491']) !== '' ) {
					$copy_name = $GLOBALS['stdata491'];
				} else {
					$copy_name = get_bloginfo( 'name', 'display' );
				}
				echo '<p class="copyr"><small>&copy; ' . $copy_year . ' ' . $copy_name . '</small></p>'; ?>
			</div>
		</div><!-- /#footer-wrapper -->
	</div><!-- /#footer -->
</footer>
</div>
<?php do_action( 'st/wrapper_in' ); // #wrapperinのフック ?>
<!-- /#wrapperin -->
</div>
<!-- /#wrapper -->
</div><!-- /#st-ami -->
<?php if ( ( is_single() || ( is_page() && ( trim($GLOBALS['stdata100']) !== '') ) ) && $show_ikkatu_widget && st_is_mobile() && is_active_sidebar( 18 ) ) { ?>
	<?php if( st_is_ver_ex() && isset( $GLOBALS["stdata593"] ) && $GLOBALS["stdata593"] === 'yes' ): // スマホフッターに固定ウィジェットをフロート化（EX） ?>
		<p class="footer-ad-btn"><a href="javascript:void(0)"><i aria-hidden="true" class="stsvg st-svg-angle-down"></i></a></p>
	<?php endif; ?>
	<div id="footer-ad-box">
		<?php if( st_is_ver_ex() && isset( $GLOBALS["stdata593"] ) && $GLOBALS["stdata593"] === 'yes' ): ?>
			<p class="close"><a href="javascript:void(0)"><i aria-hidden="true" class="stsvg st-svg-close_thin"></i></a></p>
		<?php endif; ?>
		<div id="footer-ad-box-content">
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 18 ) ) : else : //スマホフッターに固定ウィジェット ?>
			<?php endif; ?>
		</div>
	</div>
<?php } ?>
<?php wp_footer(); ?>
<?php get_template_part( 'st-smartfooter-menu' ); //スマホフッターメニュー ?>
<?php affinger_footer_action(); ?>
</body></html>
