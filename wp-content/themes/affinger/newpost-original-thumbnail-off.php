<div class="kanren">
	<?php // サイドバーの新着一覧サムネイルなし（カテゴリーID指定）
	if ( trim( $GLOBALS["stdata67"] ) !== '' ) {
		$newentrypost_no = $GLOBALS["stdata67"];
	} else {
		$newentrypost_no = 5;
	}

	if ( trim( $GLOBALS["stdata99"] ) !== '' ) {
		$category_ID = esc_attr( $GLOBALS["stdata99"] );
	} else {
		$category_ID = 0 ;
	}

	$args = array(
		'posts_per_page' => $newentrypost_no,
		'cat' => array($category_ID)
	);
	// インフィード広告を関連記事に挿入
	$in_feed_ad_per = max( 0, (int) trim( get_option( 'st-data215', '0' ) ) );
	// インフィード広告を表示
	$show_in_feed_ad = ( ! is_404() && is_active_sidebar( 26 ) );
	$show_in_feed_ad = ( $show_in_feed_ad && $in_feed_ad_per > 0 );

	$st_query = new WP_Query( $args );
	?>
	<?php if ( $st_query->have_posts() ): $offset = 0; ?>
		<?php while ( $st_query->have_posts() ) : $st_query->the_post(); ?>
			<?php //インフィード広告 ?>
			<?php if ( $show_in_feed_ad && ( ( $offset + $st_query->current_post + 1 ) % $in_feed_ad_per === 0 ) ): ?>
				<div class="st-infeed-adunit">
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 26 ) ) : else : ?>
					<?php endif; ?>
				</div>
			<?php
			$offset ++;
			endif; ?>

		<div class="no-thumbitiran">
			<?php if ( trim( $GLOBALS['stdata465']) === '' ) : get_template_part( 'st-single-category' ); endif; //カテゴリー ?>
			<h5 class="kanren-t"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<?php get_template_part( 'itiran-date' ); //投稿日 ?>
			<?php get_template_part( 'st-excerpt-side' ); //サイド抜粋 ?>

			<?php if ( isset( $GLOBALS['stdata465']) && $GLOBALS['stdata465'] === 'yes' ) :
				echo '<div class="st-catgroup-under">';
				get_template_part( 'st-single-category' ); //カテゴリー
				echo '</div>';
			endif; //カテゴリー ?>

		</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>
		<p>新しい記事はありません</p>
	<?php endif; ?>
</div>
