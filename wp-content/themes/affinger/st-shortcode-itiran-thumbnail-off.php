<?php
/**
 * @var WP_Query $query WP_Query 投稿の WP_Post オブジェクト
 * @var array<string, mixed> $attributes 正規化済み設定
 */
$st_is_ex = st_is_ver_ex();
$in_feed_ad_cycle = (int) trim( get_option( 'st-data214', '' ) ); // インフィード広告をトップページの記事一覧及びアーカイブに挿入
// $show_in_feed_ad  = ( $in_feed_ad_cycle > 0 );
$show_in_feed_ad = false;
$in_feed_ad_per  = false;

$hide_excerpt_on_pc       = (bool) trim( get_option( 'st-data202', '' ) ); // 抜粋の非表示
$show_category_on_listing = (bool) trim( get_option( 'st-data125', '' ) ); // 記事一覧にカテゴリー表示

$amp = amp_is_amp() ? 'amp' : null;

$html_class = $attributes['html_class'] ?? '';
?>
<?php if ( $query->have_posts() ): $offset = 0; ?>
	<div class="kanren shortcode-kanren  <?php echo esc_attr( $html_class ); ?>">
		<?php while ( $query->have_posts() ): $query->the_post(); ?>
			<?php if ( $show_in_feed_ad && ( ( $offset + $query->current_post + 1 ) % $in_feed_ad_per === 0 ) ): ?>
				<div class="st-infeed-adunit">
					<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
						<?php dynamic_sidebar( 26 ); ?>
					<?php endif; ?>
				</div>
			<?php
			$offset ++;
			endif; ?>

			<div class="no-thumbitiran">
				<?php if ( trim( $GLOBALS['stdata465']) === '' ) : st_get_template_part( 'st-shortcode-single-category', $amp ); endif; //カテゴリー ?>

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<div class="blog_info <?php st_hidden_class(); ?>">
						<p>
							<?php if( $st_is_ex ): //更新日の表示確認
								$postID = $query->post->ID;
								$updatewidgetset = get_post_meta( $postID, 'updatewidget_set', true );
							else:
								$updatewidgetset = '';
							endif;

							if ( trim ( $updatewidgetset ) === '' && ( get_the_date() != get_the_modified_date() ) ) : //更新がある場合 ?>
								<i class="st-fa st-svg-refresh"></i><?php the_modified_date( 'Y/n/j' ); ?>
							<?php else: ?>
								<i class="st-fa st-svg-clock-o"></i><?php the_time( 'Y/n/j' ); ?>
							<?php endif; ?>
								&nbsp;<span class="pcone"><?php the_tags( '<i class="st-fa st-svg-tags"></i>&nbsp;', ', ' ); ?></span>
						</p>
				</div>

				<?php get_template_part( 'st-excerpt' );    //抜粋 ?>

				<?php if ( isset( $GLOBALS['stdata465']) && $GLOBALS['stdata465'] === 'yes' ) :
					echo '<div class="st-catgroup-under">';
					st_get_template_part( 'st-shortcode-single-category', $amp ); //カテゴリー
					echo '</div>';
				endif; //カテゴリー ?>
			</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php else: ?>
<?php endif; ?>
