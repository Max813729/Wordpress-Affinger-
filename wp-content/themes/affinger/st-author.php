<?php // この記事を書いた人（記事下）
if (( isset($GLOBALS['stdata210']) && $GLOBALS['stdata210'] === 'yes' )
&& ( is_single() || ( is_page() && ( isset($GLOBALS['stdata212']) && $GLOBALS['stdata212'] === 'yes' )))) :
	$change_user_id = intval( trim( get_option( 'st-data437' ) ) ); // 表示する管理者IDの変更
	$user_info = get_userdata($post->post_author); //ユーザーID
	$st_users_id = $user_info->ID;
?>
<div class="st-author-box">
	<ul id="st-tab-menu">
		<li class="active"><i class="st-fa st-svg-user st-css-no" aria-hidden="true"></i>この記事を書いた人</li>
		<?php if ( isset($GLOBALS['stdata211']) && $GLOBALS['stdata211'] === 'yes' ) : //最新記事を表示する ?>
			<li><i class="st-fa st-svg-file-text" aria-hidden="true"></i>最新記事</li>
		<?php endif; ?>
	</ul>

	<div id="st-tab-box" class="clearfix">
		<div class="active">
			<dl>
			<dt>
				<a rel="nofollow" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
					<?php if ( ( $st_users_id === 1 || $st_users_id === $change_user_id ) && get_option( 'st_author_profile_avatar' ) ): ?>
						<?php //画像のaltを取得する
							$url = esc_url( get_option( 'st_author_profile_avatar' ) );
							$image_id = attachment_url_to_postid( $url );
							$image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
						?>
						<img src="<?php echo $url; ?>" alt="<?php echo $image_alt; ?>" width="80px" height="80px">
					<?php else: ?>
						<?php echo get_avatar( $st_users_id, 80 ); ?>
					<?php endif; ?>
				</a>
			</dt>
			<dd>
				<p class="st-author-nickname"><?php the_author_meta( 'nickname',$st_users_id ); ?></p>
				<p class="st-author-description"><?php the_author_meta( 'description',$st_users_id ); ?></p>
				<p class="st-author-sns">
					<?php if(get_the_author_meta('twitter',$st_users_id)): ?>
						<a rel="nofollow" class="st-author-twitter" href="<?php the_author_meta('twitter',$st_users_id); ?>" title="twitter"><i class="st-fa st-svg-twitter" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('facebook',$st_users_id)): ?>
						<a rel="nofollow" class="st-author-facebook" href="<?php the_author_meta('facebook',$st_users_id); ?>" title="facebook"><i class="st-fa st-svg-facebook-square" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('instagram',$st_users_id)): ?>
						<a rel="nofollow" class="st-author-instagram" href="<?php the_author_meta('instagram',$st_users_id); ?>" title="instagram"><i class="st-fa st-svg-instagram" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('youtube',$st_users_id)): ?>
						<a rel="nofollow" class="st-author-youtube" href="<?php the_author_meta('youtube',$st_users_id); ?>" title="youtube"><i class="st-fa st-svg-youtube-play" aria-hidden="true"></i></a>
					<?php endif; ?>
					<?php if(get_the_author_meta('user_url',$st_users_id)): ?>
						<a rel="nofollow" class="st-author-homepage" href="<?php the_author_meta('user_url',$st_users_id); ?>" title="home"><i class="st-fa st-svg-home" aria-hidden="true"></i></a>
					<?php endif; ?>
				</p>
			</dd>
			</dl>
		</div>

		<?php if ( isset($GLOBALS['stdata211']) && $GLOBALS['stdata211'] === 'yes' ) : ?>
			<div>
				<?php
				$my_query = new WP_Query( array(
				'author' => $st_users_id,
				'posts_per_page' => 3,
				));
				if($my_query->have_posts()) : ?>
					<?php while ($my_query->have_posts())  : $my_query->the_post();  ?>
						<p class="st-author-date"><?php the_time( 'Y/m/d' ); ?></p><p class="st-author-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p>投稿がありません</p>
				<?php endif; ?>
				<p class="st-author-archive"><a rel="nofollow" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="st-fa st-svg-angle-double-right" aria-hidden="true"></i><?php the_author_meta( 'nickname',$st_users_id ); ?>の記事をもっと見る</a></p>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif;
