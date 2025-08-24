<?php
// Youtubeサムネイル画像の取得
$postID = get_the_ID();
$st_youtube_thumbnail_info = st_youtube_thumbnail_info( $postID );
$youtube_thum_img          = $st_youtube_thumbnail_info['youtube_thumb_img'];
$youtube_thum_img_s        = $st_youtube_thumbnail_info['youtube_thumb_s_img'];
$youtube_thum_s_url        = $st_youtube_thumbnail_info['youtube_thumb_s_url'];

if ( amp_is_amp() ): // AMP
	if ( $youtube_thum_s_url ):
		echo '<img src="' . esc_url( $youtube_thum_s_url ) . '" alt="" width="100" height="100" />';
	else:
		the_post_thumbnail( array( 100, 100 ) );
	endif;
elseif( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ): //サムネイルをマルに設定
	if ( $youtube_thum_img_s ):
		echo '<div class="youtube_thum_link_150">'. $youtube_thum_img_s . '</div>';
	else:
		the_post_thumbnail( 'st_thumb150' );
	endif;
elseif( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'original' ): //サムネイルをオリジナルに設定
	if ( $youtube_thum_img ):
		echo '<div class="youtube_thum_link_original">'. $youtube_thum_img . '</div>';
	else:
		the_post_thumbnail( 'thumbnail' );
	endif;
elseif( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'full' ): //サムネイルをフルサイズに設定
	if ( $youtube_thum_img ):
		echo '<div class="youtube_thum_link_full">'. $youtube_thum_img . '</div>';
	else:
		the_post_thumbnail( 'full' );
	endif;
else:
	if ( $youtube_thum_img_s ):
		echo '<div class="youtube_thum_link_150">'. $youtube_thum_img_s . '</div>';
	else:
		if ( ! st_is_mobile() && trim( $GLOBALS["stdata91"] ) !== ''  // PC（960px以上）のサムネイル画像を大きくする
		   || st_is_mobile() && trim( $GLOBALS["stdata405"] ) !== '' // スマホ（599px以下）でもサムネイル画像を大きくする
		   ):
			the_post_thumbnail( 'st_thumb150' ); //サムネイルを正方形に設定
		else: //サムネイル画像を大きくするが無効
			the_post_thumbnail( 'st_thumb150' );
		endif;
	endif;
endif;
