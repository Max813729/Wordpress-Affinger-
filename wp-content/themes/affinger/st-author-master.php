<?php // 11_STINGERサイト管理者紹介 ?>

<?php
$user_id = trim( (string) get_option( 'st-data437' ) );
$st_author_id = ( $user_id !== '' ) ? (int) $user_id : 1;
?>

	<div id="st-tab-box" class="clearfix">
		<?php // 将来的な分岐
		if (
			isset( $GLOBALS['stdata210'] ) && $GLOBALS['stdata210'] === 'yes' && is_single() || // 投稿ページで「この記事を書いた人」を出力
			isset( $GLOBALS['stdata212'] ) && $GLOBALS['stdata212'] === 'yes' && is_page() // 固定ページで「この記事を書いた人」を出力
			):
		?>
			<div class="active">
		<?php else: ?>
			<div class="active">
		<?php endif; ?>
			<dl>
			<dt>
				<?php if ( get_option( 'st_author_profile_avatar' ) ): ?>
					<?php //画像のaltを取得する
						$url = esc_url( get_option( 'st_author_profile_avatar' ) );
						$image_id = attachment_url_to_postid( $url );
						$image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
					?>
					<img src="<?php echo $url; ?>" alt="<?php echo $image_alt; ?>" width="80px" height="80px">
				<?php else: ?>
					<?php echo get_avatar( $st_author_id, 80 ); ?>
				<?php endif; ?>
			</dt>
			<dd>
				<p class="st-author-nickname"><?php the_author_meta( 'nickname', $st_author_id ); ?></p>
				<p class="st-author-description"><?php the_author_meta( 'description', $st_author_id ); ?></p>
				<p class="st-author-sns">
					<?php if(get_the_author_meta('twitter', $st_author_id)): ?>
						<a rel="nofollow" class="st-author-twitter" href="<?php the_author_meta('twitter', $st_author_id); ?>" title="twitter"><i class="st-fa st-svg-twitter" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('facebook', $st_author_id)): ?>
						<a rel="nofollow" class="st-author-facebook" href="<?php the_author_meta('facebook', $st_author_id); ?>" title="facebook"><i class="st-fa st-svg-facebook-square" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('instagram', $st_author_id)): ?>
						<a rel="nofollow" class="st-author-instagram" href="<?php the_author_meta('instagram', $st_author_id); ?>" title="instagram"><i class="st-fa st-svg-instagram" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('youtube', $st_author_id)): ?>
						<a rel="nofollow" class="st-author-youtube" href="<?php the_author_meta('youtube', $st_author_id); ?>" title="youtube"><i class="st-fa st-svg-youtube-play" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('user_url', $st_author_id)): ?>
						<a rel="nofollow" class="st-author-homepage" href="<?php the_author_meta('user_url', $st_author_id); ?>" title="home"><i class="st-fa st-svg-home" aria-hidden="true"></i></a>
					<?php endif; ?>
				</p>
			</dd>
			</dl>
		</div>
	</div>
