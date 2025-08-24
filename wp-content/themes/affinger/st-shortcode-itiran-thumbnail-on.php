<?php
/**
 * @var WP_Query $query WP_Query 投稿の WP_Post オブジェクト
 * @var string $html_class HTML クラス名
 * @var array<string, mixed> $attributes 正規化済み設定
 */
$st_is_ex = st_is_ver_ex();
$in_feed_ad_cycle = (int) trim( get_option( 'st-data214', '' ) ); // インフィード広告をトップページの記事一覧及びアーカイブに挿入
// $show_in_feed_ad  = ( $in_feed_ad_cycle > 0 );
$show_in_feed_ad = false;
$in_feed_ad_per  = false;
if( $st_is_ex ):
	// 計測リミット数
	$wpp_view_limit = trim( get_option( 'st-data223', '' ) );
	$wpp_view_limit = ( $wpp_view_limit !== '' ) ? (int) $wpp_view_limit : 9999;

	// リミット数を超えた場合に表示する文字
	$wpp_view_limit_label = trim( get_option( 'st-data224', '' ) );
	$wpp_view_limit_label = ( $wpp_view_limit_label !== '' ) ? $wpp_view_limit_label : '殿堂';

	$show_wpp_view_count      = (bool) trim( get_option( 'st-data225', '' ) ); // view数をトップページの記事一覧及びアーカイブに表示する
else:
	$show_wpp_view_count = false;
endif;
$default_thumbnail        = trim( get_option( 'st-data97', '' ) ); // デフォルトのサムネイル画像
$hide_excerpt_on_pc       = (bool) trim( get_option( 'st-data202', '' ) ); // 抜粋の非表示
$show_category_on_listing = (bool) trim( get_option( 'st-data125', '' ) ); // 記事一覧にカテゴリー表示

$is_rank = (bool) $attributes['is_rank'] ?: false;

$amp            = amp_is_amp() ? 'amp' : null;

$html_class = $attributes['html_class'] ?? '';
?>

<?php if ( $query->have_posts() ): $offset = 0; ?>
	<div class="kanren shortcode-kanren <?php st_marugazou_class(); // サムネイルを丸くする ?> <?php echo esc_attr( $html_class ); ?>">
		<?php while ( $query->have_posts() ): $query->the_post(); ?>

			<?php // Youtubeサムネイル画像の取得
			$postID = get_the_ID();
			$st_youtube_thumbnail_info = st_youtube_thumbnail_info( $postID );
			$youtube_thum_img          = $st_youtube_thumbnail_info['youtube_thumb_img'];
			?>

			<?php if ( $show_in_feed_ad && ( ( $offset + $query->current_post + 1 ) % $in_feed_ad_per === 0 ) ): ?>
				<div class="st-infeed-adunit">
					<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
						<?php dynamic_sidebar( 26 ); ?>
					<?php endif; ?>
				</div>
			<?php
			$offset ++;
			endif; ?>

			<dl class="clearfix">
				<dt><a href="<?php the_permalink(); ?>">
						<?php if ( $is_rank ): // ランキング風表示 ?>
							<div class="kanren-rank-label">
								<?php $rank = $query->current_post + 1; ?>

									<?php if ( $youtube_thum_img || has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
										<?php get_template_part( 'st-thumbnail' ); //アイキャッチ画像 ?><span class="kanren-no kanren-rank<?php echo esc_attr( $rank ); ?>"><?php echo esc_html( $rank ); ?></span>
									<?php else: ?>
										<?php if(trim($GLOBALS['stdata97']) !== ''){ ?>
											<img src="<?php echo esc_url( ($GLOBALS['stdata97']) ); ?>" alt="no image" title="no image" width="100" height="100" /><span class="kanren-no kanren-rank<?php echo esc_attr( $rank ); ?>"><?php echo esc_html( $rank ); ?></span>
										<?php }else{ ?>
											<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100" /><span class="kanren-no kanren-rank<?php echo esc_attr( $rank ); ?>"><?php echo esc_html( $rank ); ?></span>
										<?php } ?>
									<?php endif;  ?>

							</div>
							<?php if( $st_is_ex ): ?>
								<?php elseif ( $show_wpp_view_count && function_exists( 'wpp_get_views' ) && ! amp_is_amp() ): // 計測数表示 (AMP 以外) ?>
									<?php $wpp_view_count = max( 0, (int) wpp_get_views( get_the_ID(), null, false ) ); // 計測数 ?>
									<div class="st-wppviews-label">
										<div class="st-wppviews-text">
											<?php if ( $wpp_view_count > $wpp_view_limit ): ?>
												<span class="wpp-views-limit"><?php echo esc_html( $wpp_view_limit_label ); ?></span>
											<?php else: ?>
												<span class="wpp-views"><?php echo esc_html( number_format_i18n( $wpp_view_count ) ); ?><span class="wpp-text">view</span></span>
											<?php endif; ?>
										</div>

										<?php if ( $youtube_thum_img || has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
											<?php get_template_part( 'st-thumbnail' ); //アイキャッチ画像 ?>
										<?php else: ?>
											<?php if(trim($GLOBALS['stdata97']) !== ''){ ?>
												<img src="<?php echo esc_url( ($GLOBALS['stdata97']) ); ?>" alt="no image" title="no image" width="100" height="100" />
											<?php }else{ ?>
												<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100" />
											<?php } ?>
										<?php endif;  ?>
									</div>
							<?php endif; //$st_is_ex ?>

						<?php else: // その他 ?>

							<?php if ( $youtube_thum_img || has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
								<?php get_template_part( 'st-thumbnail' ); //アイキャッチ画像 ?>
							<?php else: ?>
								<?php if(trim($GLOBALS['stdata97']) !== ''){ ?>
									<img src="<?php echo esc_url( ($GLOBALS['stdata97']) ); ?>" alt="no image" title="no image" width="100" height="100" />
								<?php }else{ ?>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100" />
								<?php } ?>
							<?php endif;  ?>

						<?php endif; ?>
					</a></dt>
				<dd>
					<?php if ( trim( $GLOBALS['stdata465']) === '' ) : st_get_template_part( 'st-shortcode-single-category', $amp ); endif; //カテゴリー ?>

					<h5 class="kanren-t"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<?php get_template_part( 'itiran-date-tag' ); //投稿日 ?>

					<?php get_template_part( 'st-excerpt' );    //抜粋 ?>

					<?php if ( isset( $GLOBALS['stdata465']) && $GLOBALS['stdata465'] === 'yes' ) :
						echo '<div class="st-catgroup-under">';
						st_get_template_part( 'st-shortcode-single-category', $amp ); //カテゴリー
						echo '</div>';
					endif; //カテゴリー ?>

				</dd>
			</dl>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php else: ?>
<?php endif; ?>
