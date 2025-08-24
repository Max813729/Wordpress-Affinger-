<?php
/**
* st-topin.phpにもアイキャッチに関する別記述あり
*/
$postID = get_queried_object_id();
if  ( st_is_home_check() ) { // 投稿ページ（メインページ）
	$postID = get_option( 'page_for_posts' );
}
$eyecatchset = get_post_meta( $postID, 'eyecatch_set', true );

// Youtubeサムネイル画像の取得
$st_youtube_thumbnail_info   = st_youtube_thumbnail_info( $postID );
$youtube_thum_img            = $st_youtube_thumbnail_info['youtube_thumb_img'];
$youtube_thum_url            = $st_youtube_thumbnail_info['youtube_thumb_url'];
$youtube_link                = $st_youtube_thumbnail_info['youtube_video_url'];
$st_youtube_eyecatch         = $st_youtube_thumbnail_info['use_youtube_video'];
$st_youtube_eyecatch_html    = apply_filters( 'the_content', "<div class='st-youtube-eyecatch'><div class='youtube-container'>[embed]" . esc_url( $youtube_link ) . "[/embed]</div></div>" );

$is_amp           = amp_is_amp();
$youtube_thum_img = ( $is_amp && $youtube_thum_url )
	? '<img src="' . esc_url( $youtube_thum_url ) . '" alt="" width="960" height="540" />'
	: $youtube_thum_img;

if ( st_has_post_thumbnail() && (( isset($GLOBALS['stdata53']) && $GLOBALS['stdata53'] === 'yes' ) || ( isset( $eyecatchset ) && $eyecatchset === 'yes' ))) { ?>
	<div class="st-eyecatch <?php if(trim($GLOBALS['stdata217']) !== ''){ echo 'st-eyecatch-under'; } //アイキャッチ画像がタイトル下の場合 ?>">

		<?php if ( $youtube_thum_img ){ ?>
			<?php if ( ! $is_amp && $st_youtube_eyecatch ){ ?>
				<?php echo $st_youtube_eyecatch_html; ?>
			<?php } else { ?>
				<?php echo '<div class="youtube_thum_link_full">'. $youtube_thum_img . '</div>'; ?>
			<?php } ?>
		<?php } else { ?>
			<?php
			// ID
			$thumbnail_id = get_post_thumbnail_id();
			// 代替テキスト
			$thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
			if ( st_is_ver_ex() && isset( $GLOBALS['stdata586'] ) && $GLOBALS['stdata586'] === 'yes' && ! $thumbnail_alt ) { // alt属性が空の場合に記事タイトルを設定
			// 代替テキストが無い場合はタイトルを設定
				$thumbnail_alt = get_the_title( $postID );
			}
			$default_attr = array(
				'alt'   => $thumbnail_alt
			);

			the_post_thumbnail('full' , $default_attr );
		} ?>

		<?php //クレジット表示
		if( is_single() or is_page() ){
			$stcopyurl = get_post_meta( $postID, 'st_copyurl', true );
			$stcopyright = get_post_meta( $postID, 'st_copyright', true );
		}else{
			$stcopyurl = '';
			$stcopyright = '';
		}

		if ( $youtube_thum_img ) {
			if( ! $st_youtube_eyecatch ) { ?>
				<p class="eyecatch-copyurl st-youtube-copyurl"><i class="st-fa st-svg-youtube-play" aria-hidden="true"></i><a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank" rel="nofollow">YouTube</a></p>
		<?php
			}
		} elseif( trim( $stcopyright ) !== '' ) { ?>
			<p class="eyecatch-copyurl"><i class="st-fa st-svg-copyright" aria-hidden="true"></i><?php echo esc_url( get_home_url()); ?></p>
		<?php
		} elseif( trim( $stcopyurl ) !== '' ) { ?>
			<p class="eyecatch-copyurl"><i class="st-fa st-svg-camera-retro" aria-hidden="true"></i><?php echo stripslashes( $stcopyurl ); ?></p>
		<?php
		}elseif((!empty(get_post(get_post_thumbnail_id())->post_excerpt)) && (trim($GLOBALS['stdata75']) !== '' && $GLOBALS['stdata75'] === 'yes')){ //キャプションがあり且つ表示にチェックが入っている場合 ?>
			<p class="eyecatch-copyurl"><i class="st-fa st-svg-camera-retro" aria-hidden="true"></i><?php echo get_post(get_post_thumbnail_id())->post_excerpt;?></p>
		<?php
		}else{
		}
		?>

	</div>
<?php
}
