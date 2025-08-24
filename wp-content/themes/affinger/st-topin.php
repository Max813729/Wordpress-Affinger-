<?php
if ( trim( $GLOBALS["stdata9"] ) !== '' ) { //記事挿入がある場合
	$topin_id = $GLOBALS["stdata9"]; //記事ID
	if(get_post($topin_id)){
		$topin_type = get_post($topin_id)->post_type; //記事のタイプ
	}else{
		$topin_type = '';
	}
}else{
	$topin_id = '';
	$topin_type = '';
}


if( ( trim( $topin_id ) !== '' ) && ( $topin_type === 'page' )){ //固定記事の挿入IDがあり固定記事に存在する場合
	$topin_query = new WP_Query( 'post_type=page&p=' . $topin_id );

	if ( $topin_query->post !== null ) {
?>

<div class="post st-topin">

	<?php //アイキャッチ画像
		$postID = $topin_query->post->ID;
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

		if ( $youtube_thum_img ){ ?>
				<?php if ( ! $is_amp && $st_youtube_eyecatch ){ ?>
					<?php echo '<div class="st-eyecatch"><div class="youtube_thum_link_full">'. $st_youtube_eyecatch_html . '</div></div>'; ?>
				<?php } else { ?>
					<?php echo '<div class="st-eyecatch"><div class="youtube_thum_link_full">'. $youtube_thum_img . '</div></div>'; ?>
				<?php } ?>
		<?php } elseif ( get_post_thumbnail_id( $postID ) && (( isset($GLOBALS['stdata53']) && $GLOBALS['stdata53'] === 'yes' ) || ( isset( $eyecatchset ) && $eyecatchset === 'yes' ))) { ?>
			<div class="st-eyecatch"><?php echo get_the_post_thumbnail( $postID,'full' ); ?>

				<?php //クレジット表示
				$stcopyurl = get_post_meta( $postID, 'st_copyurl', true );
				$stcopyright = get_post_meta( $postID, 'st_copyright', true );

				if( trim( $stcopyright ) !== '' ) { ?>
					<p class="eyecatch-copyurl"><i class="st-fa st-svg-copyright" aria-hidden="true"></i><?php echo esc_url( get_home_url()); ?></p>
				<?php
				} elseif( trim( $stcopyurl ) !== '' ) { ?>
					<p class="eyecatch-copyurl"><i class="st-fa st-svg-camera-retro" aria-hidden="true"></i><?php echo stripslashes( $stcopyurl ); ?></p>
				<?php
				}elseif((!empty(get_post(get_post_thumbnail_id($postID))->post_excerpt)) && (trim($GLOBALS['stdata75']) !== '' && $GLOBALS['stdata75'] === 'yes')){ //キャプションがあり且つ表示にチェックが入っている場合 ?>
					<p class="eyecatch-copyurl"><i class="st-fa st-svg-camera-retro" aria-hidden="true"></i><?php echo get_post(get_post_thumbnail_id($postID))->post_excerpt;?></p>
				<?php }	?>

			</div>

	<?php } //アイキャッチ画像を挿入ここまで

		if(!is_front_page() && is_home()){ //投稿ページ設定によるフロント
		}else{
			if ( get_post_thumbnail_id( $postID ) && (( isset($GLOBALS['stdata53']) && $GLOBALS['stdata53'] === 'yes' ) || ( isset( $eyecatchset ) && $eyecatchset === 'yes' ))) { //アイキャッチ画像がある場合 ?>
				<div class="nowhits-eye"><?php get_template_part( 'popular-thumbnail' ); //任意のエントリ ?></div>
			<?php }else{ //アイキャッチがない場合 ?>
				<div class="nowhits <?php st_noheader_class(); ?>"><?php get_template_part( 'popular-thumbnail' ); //任意のエントリ ?></div>
			<?php } ?>

			<?php if ( is_front_page() && is_active_sidebar( 12 ) ) { ?>
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 12 ) ) : else : //トップ上部のウィジェット ?>
					<?php endif; ?>
			<?php } ?>

			<?php get_template_part( 'news-st' ); //お知らせ ?>
		<?php } ?>

		<?php //広告表記チェック
		$display_ad_mark = st_display_ad_mark();
		$display_ad_mark_title = st_display_ad_mark_title();
		if ( $display_ad_mark ): // 「広告」を明記する ?>
			<p class="st-catgroup"><span class="catname st-catid-ad"><?php replaceAdText(); ?></span></p>
		<?php elseif ( $display_ad_mark_title ): // 「広告」タイトル下用 ?>
			<p id="display_ad_mark_title" class="is-style-st-paragraph-pen has-st-icon has-st-icon-info-circle has-small-font-size"><?php replaceAdText(); ?></p>
		<?php endif; ?>

		<?php //固定記事挿入
		if ( $topin_query->have_posts() ) : while ( $topin_query->have_posts() ) : $topin_query->the_post();
			st_the_content( 'topin' );
		endwhile;
			wp_reset_postdata();
		endif; ?>
</div>
<?php
	}
} else {

}
?>
