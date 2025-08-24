<?php
/**
 * [st-catgroup] の投稿一覧。
 *
 * @var WP_Query $query WP_Query 投稿の WP_Post オブジェクト
 * @var array<string, mixed> $attributes 正規化済み設定
 */

// 設定
// インフィード広告を関連記事に挿入
$in_feed_ad_per = max( 0, (int) trim( get_option( 'st-data216', '0' ) ) );

// インフィード広告を表示
// $show_in_feed_ad = ( ! amp_is_amp() && is_active_sidebar( 26 ) );
// $show_in_feed_ad = ( $show_in_feed_ad && $in_feed_ad_per > 0 );
$show_in_feed_ad = false;

// 抜粋の表示/非表示
$hide_excerpt_on_pc = ( trim( get_option( 'st-data202', '' ) ) === 'yes' );    // 抜粋の非表示

$amp = amp_is_amp() ? 'amp' : null;

// クラス
$html_class = $attributes['html_class'] ?? '';
?>

<?php if ( $query->have_posts() ): ?>
	<div class="kanren shortcode-kanren <?php echo esc_attr( $html_class ); ?>">
		<?php while ( $query->have_posts() ): $query->the_post(); ?>
			<?php // インフィード広告 ?>
			<?php if ( $show_in_feed_ad && ( $query->current_post + 1 ) % $in_feed_ad_per === 0 ): ?>
				<div class="st-infeed-adunit">
					<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
						<?php dynamic_sidebar( 26 ); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="no-thumbitiran">
				<?php if ( trim( $GLOBALS['stdata465']) === '' ) : st_get_template_part( 'st-shortcode-single-category', $amp ); endif; //カテゴリー ?>

				<h5 class="kanren-t"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

				<?php get_template_part( 'itiran-date' ); //投稿日 ?>

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
