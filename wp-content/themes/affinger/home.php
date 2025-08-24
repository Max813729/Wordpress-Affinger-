<?php get_header();

// 挿入コンテンツのチェック
$entry_class = 'entry-content st-empty';
if ( st_is_home_check() || trim( $GLOBALS["stdata9"] ) !== '' || trim($GLOBALS['stdata89']) !== '' ):
	$entry_class = 'entry-content';
endif;
?>

<div id="content" class="clearfix">
	<div id="contentInner">
		<main <?php st_text_copyck(); ?>>
			<article>

				<div class="home-post post">

				<?php if (is_paged()): //2ページ目以降は表示しない ?>
				<?php else: ?>

						<?php if ( trim( $GLOBALS["stdata9"] ) !== '' ): //固定記事挿入している場合 ?>

						<?php else: ?>
							<?php if( is_front_page() && ( isset($GLOBALS['stdata54']) ) && ( $GLOBALS['stdata54'] === 'yes' ) ): //トップ記事上部表示にチェックがある場合 ?>
								<div class="nowhits <?php st_noheader_class(); ?>"><?php get_template_part( 'popular-thumbnail' ); //任意のエントリ ?></div>
							<?php endif; ?>

							<?php if ( is_front_page() && is_active_sidebar( 12 ) ) { ?>
								<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 12 ) ) : else : //トップ上部のウィジェット ?>
								<?php endif; ?>
							<?php } ?>
							<?php if ( is_front_page() ): get_template_part( 'news-st' ); endif; //お知らせ ?>

							<?php //広告表記チェック
							$display_ad_mark = st_display_ad_mark();
							$display_ad_mark_title = st_display_ad_mark_title();
							if ( $display_ad_mark ): // 「広告」を明記する ?>
								<p class="st-catgroup"><span class="catname st-catid-ad"><?php replaceAdText(); ?></span></p>
							<?php elseif ( $display_ad_mark_title ): // 「広告」タイトル下用 ?>
								<p id="display_ad_mark_title" class="is-style-st-paragraph-pen has-st-icon has-st-icon-info-circle has-small-font-size"><?php replaceAdText(); ?></p>
							<?php endif; ?>
						<?php endif; ?>

						<div class="<?php echo $entry_class; ?>">
							<?php if ( st_is_home_check() ): ?>
								<?php get_template_part( 'st-top-page' ); // 投稿ページ挿入 ?>
							<?php else: ?>
								<?php get_template_part( 'st-topin' );   // 固定記事挿入 ?>
								<?php if ( trim($GLOBALS['stdata89']) !== '' ): //管理画面の作成コンテンツ ?>
									<div class="st-topcontent">
										<?php st_the_editor_content( 'st-data89' ); ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php get_template_part( 'st-tab-category' ); // タブ記事一覧 ?>
						</div>

						<?php if ( is_front_page() && is_active_sidebar( 35 ) ) { ?>
							<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 35 ) ) : else : //トップ中部のウィジェット ?>
							<?php endif; ?>
						<?php } ?>

						<?php if ( st_is_ver_ex_af() && isset($GLOBALS['stplus']) && $GLOBALS['stplus'] === 'yes' ) {
							get_template_part( 'st-rank' ); //ランキング
						} ?>

						<?php //任意のエントリ
						if( is_front_page() && ( isset($GLOBALS['stdata59']) && $GLOBALS['stdata59'] === 'yes' ) ){ //トップ記事の場合 ?>
						<div class="nowhits-under">
							<?php if ( isset($GLOBALS['stdata5']) && $GLOBALS['stdata5'] === 'yes' ) {
								get_template_part( 'popular-thumbnail-off' );
							}else{
								get_template_part( 'popular-thumbnail-on' );
							} ?>
						</div>
						<?php }  //任意のエントリここまで ?>

				<?php endif; ?>

				</div>

				<aside>

					<?php //記事一覧
					if( $GLOBALS["stdata44"]  === '' ){ //新着一覧非表示で無い場合
						if( $GLOBALS["stdata66"]  !== '' ) {
							$new_entryname = st_esc_html_i( stripslashes( $GLOBALS["stdata66"] ) );
							echo '<p class="n-entry-t"><span class="n-entry">' . $new_entryname . '</span></p>';
						}
						?>

						<?php get_template_part( 'itiran' ); ?>
						<?php get_template_part( 'st-pagenavi' ); //ページナビ読み込み ?>
					<?php } ?>

				</aside>

					<?php get_template_part( 'sns-top' ); //ソーシャルボタン読み込み ?>

					<?php if ( is_front_page() && is_active_sidebar( 13 ) ) { ?>
						<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 13 ) ) : else : //トップ下部のウィジェット ?>
						<?php endif; ?>
					<?php } ?>

			</article>
		</main>
	</div>
	<!-- /#contentInner -->
	<?php get_sidebar(); ?>
</div>
<!--/#content -->
<?php get_footer(); ?>
