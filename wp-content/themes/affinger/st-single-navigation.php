<?php
/**
 * PREV NEXT
 *
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

if ( st_is_ver_ex() ):
	// YouTubeサムネイルを使用（ID）
	if ( ! empty( $prev_post ) ): // 前の記事
		$st_youtube_prev_thum = get_post_meta( $prev_post->ID, 'st_youtube_url', true );
		if ( $st_youtube_prev_thum ):
			$youtube_thum_prev = '//img.youtube.com/vi/'. $st_youtube_prev_thum .'/mqdefault.jpg';
			$youtube_prev_img = '<span class="youtube_thum_link_60"><img src="'. esc_url( $youtube_thum_prev ) .'" alt="" /></span>';
		else:
			$youtube_prev_img = '';
		endif;
	endif;

	if ( ! empty( $next_post ) ): // 次の記事
		$st_youtube_next_thum = get_post_meta( $next_post->ID, 'st_youtube_url', true );
		if ( $st_youtube_next_thum ):
			$youtube_thum_next = '//img.youtube.com/vi/'. $st_youtube_next_thum .'/mqdefault.jpg';
			$youtube_next_img = '<span class="youtube_thum_link_60"><img src="'. esc_url( $youtube_thum_next ) .'" alt="" /></span>';
		else:
			$youtube_next_img = '';
		endif;
	endif;

else:

	$youtube_prev_img = '';
	$youtube_next_img = '';

endif;
?>

<div class="p-navi clearfix">

	<?php if ( ! empty( $prev_post ) ): ?>
		<a class="st-prev-link" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
			<p class="st-prev">
				<i class="st-svg st-svg-angle-right"></i>
				<?php if ( $youtube_prev_img ): ?>
					<?php if( trim( $GLOBALS["stdata5"] ) === '' ): echo $youtube_prev_img; endif; ?>
				<?php else: ?>
					<?php if( trim( $GLOBALS["stdata5"] ) === '' ): echo get_the_post_thumbnail( $prev_post->ID, array(60,60) ); endif; ?>
				<?php endif; ?>
				<span class="st-prev-title"><?php echo get_the_title( $prev_post ); ?></span>
			</p>
		</a>
	<?php endif; ?>

	<?php if ( ! empty( $next_post ) ): ?>
		<a class="st-next-link" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
			<p class="st-next">
				<span class="st-prev-title"><?php echo get_the_title( $next_post ); ?></span>
				<?php if ( $youtube_next_img ): ?>
					<?php if( trim( $GLOBALS["stdata5"] ) === '' ): echo $youtube_next_img; endif; ?>
				<?php else: ?>
					<?php if( trim( $GLOBALS["stdata5"] ) === '' ): echo get_the_post_thumbnail( $next_post->ID, array(60,60) ); endif; ?>
				<?php endif; ?>
				<i class="st-svg st-svg-angle-right"></i>
			</p>
		</a>
	<?php endif; ?>
</div>
