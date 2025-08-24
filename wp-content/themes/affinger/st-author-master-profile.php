<?php // 11_STINGERサイト管理者紹介（プロフィールカード） ?>

<?php
$user_id = trim( (string) get_option( 'st-data437' ) );
$st_author_id = ( $user_id !== '' ) ? (int) $user_id : 1;

//ヘッダー画像
$profile_header_url = (string) get_option( 'st_author_profile_header' );
$profile_header_id = attachment_url_to_postid( $profile_header_url );
$profile_header_alt = get_post_meta(  $profile_header_id, '_wp_attachment_image_alt', true );
$profile_header_image = st_image_size_output($profile_header_url, "st-profile-header", $profile_header_alt);
?>

<div class="st-author-profile">
	<?php if ( get_option( 'st_author_profile_header' ) ): ?>
		<div class="st-author-profile-header-card"><?php echo $profile_header_image; ?></div>
	<?php endif; ?>
	<div class="st-author-profile-avatar">
		<?php if ( get_option( 'st_author_profile_avatar' ) ): ?>
			<?php //画像のaltを取得する
				$url = esc_url( get_option( 'st_author_profile_avatar' ) );
				$image_id = attachment_url_to_postid( $url );
				$image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
			?>
			<img src="<?php echo $url; ?>" alt="<?php echo $image_alt; ?>" width="150px" height="150px">
		<?php else: ?>
			<?php echo get_avatar( $st_author_id, 150 ); ?>
		<?php endif; ?>
	</div>

	<div class="post st-author-profile-content">
		<p class="st-author-nickname"><?php the_author_meta( 'nickname', $st_author_id ); ?></p>
		<p class="st-author-description"><?php the_author_meta( 'description', $st_author_id ); ?></p>
		<div class="sns">
			<ul class="profile-sns clearfix">

				<?php if(get_the_author_meta('twitter', $st_author_id)): // Twitter ?>
					<li class="twitter"><a rel="nofollow" href="<?php esc_url( the_author_meta('twitter', $st_author_id) ); ?>" target="_blank" title="twitter"><i class="st-fa st-svg-twitter" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('facebook', $st_author_id)): // Facebook ?>
					<li class="facebook"><a rel="nofollow" href="<?php esc_url( the_author_meta('facebook', $st_author_id) ); ?>" target="_blank" title="facebook"><i class="st-fa st-svg-facebook" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('instagram', $st_author_id)): // instagram ?>
					<li class="instagram"><a rel="nofollow" href="<?php esc_url( the_author_meta('instagram', $st_author_id) ); ?>" target="_blank" title="instagram"><i class="st-fa st-svg-instagram" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('youtube', $st_author_id)): // YouTube ?>
					<li class="author-youtube"><a rel="nofollow" href="<?php esc_url( the_author_meta('youtube', $st_author_id) ); ?>" target="_blank" title="youtube"><i class="st-fa st-svg-youtube-play" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('amazon', $st_author_id)): // amazon ?>
					<li class="author-amazon"><a rel="nofollow" href="<?php the_author_meta('amazon', $st_author_id); ?>" target="_blank" title="amazon"><i class="st-fa st-svg-amazon" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('feed_url', $st_author_id)): // RSS ?>
					<li class="author-feed"><a rel="nofollow" href="<?php the_author_meta('feed_url', $st_author_id); ?>" target="_blank" title="rss"><i class="st-fa st-svg-rss" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('form_url', $st_author_id)): // フォーム ?>
					<li class="author-form"><a rel="nofollow" href="<?php the_author_meta('form_url', $st_author_id); ?>" target="_blank" title="formurl"><i class="st-fa st-svg-envelope" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('user_url', $st_author_id)): // HOME ?>
					<li class="author-homepage"><a rel="nofollow" href="<?php the_author_meta('user_url', $st_author_id); ?>" target="_blank" title="home"><i class="st-fa st-svg-home" aria-hidden="true"></i></a></li>
				<?php endif; ?>

			</ul>
		</div>
		<?php
		if ( get_theme_mod( 'st_author_profile_btn_url' ) ): // 「プロフィールカード」のURL入力の有無
			if ( get_theme_mod( 'st_author_profile_btn_text' ) ): // 「プロフィールカード」のテキスト入力の有無
				$btn_text = get_theme_mod( 'st_author_profile_btn_text' );
			else:
				$btn_text = '詳しくはコチラ';
			endif;
		?>
			<div class="rankstlink-r2">
				<p class="no-reflection"><a href="<?php echo esc_url( get_theme_mod( 'st_author_profile_btn_url' ) ); ?>"><?php echo esc_html( $btn_text ); ?></a></p>
			</div>
		<?php endif; ?>
	</div>
</div>
