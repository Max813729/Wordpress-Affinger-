<?php if ( trim( $GLOBALS["stdata103"] ) === '' ) {

$st_is_ex    = st_is_ver_ex();

if ( trim( $GLOBALS["stdata25"] ) !== '' ) { //Twitterアカウント
	$twitter_name = '&via='.esc_attr( $GLOBALS["stdata25"] );
}else{
	$twitter_name = '';
}

if ( is_front_page() ) {
	if ( trim( $GLOBALS["stdata118"] ) !== '' ) { //Twitterハッシュタグ
		$twitter_tag = '&hashtags='.esc_attr( $GLOBALS["stdata118"] );
	}else{
		$twitter_tag = '';
	}
} elseif ( st_is_home_check() ) { // 投稿ページ（メインページ）
	if( $st_is_ex ){ // EXの場合
		$post_id = get_option( 'page_for_posts' );
		$post_twitter_tag = get_post_meta( $post_id, 'st_twitter_tag', true ); // 投稿ごとのTwitterハッシュタグ
		$twitter_tag = '&hashtags='.esc_attr( $post_twitter_tag );
	} else {
		$twitter_tag = '';
	}
}

?>

<?php
	$url        = get_home_url();
	if  ( ! is_front_page() && is_home() ) {
		$post_id    = get_option( 'page_for_posts' );
		$url        = get_permalink( $post_id );
	}

	$url_encode = rawurlencode( $url );

	if ( trim( $GLOBALS["stdata95"] ) === '' ) {
		if ( trim( $GLOBALS['stdata33'] ) !== '' ) {
			$title = $GLOBALS['stdata33'];
		} else {
			$title = st_get_document_title();
		}
	} else {
		$title = wp_get_document_title();
	}

	$title        = html_entity_decode( $title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	if  ( ! is_front_page() && is_home() ) {
		$post_id      = get_option( 'page_for_posts' );
		$title        = get_the_title( $post_id );
	}
	$title_encode = rawurlencode( $title );

	if(function_exists('scc_get_share_twitter')){
		$plug = "smanone";
	}else{
		$plug = "";
	}
?>

<?php if ( isset( $GLOBALS['stdata468'] ) && $GLOBALS['stdata468'] === 'yes' ): // この記事タイトルとURLをコピー ?>
<div class="st-copyurl-btn">
	<a href="#" rel="nofollow" data-st-copy-text="<?php echo esc_attr( $title . ' / ' . $url ); ?>" title="urlcopy"><i class="st-fa st-svg-clipboard"></i>この記事タイトルとURLをコピー</a>
</div>
<?php endif; ?>

<div class="sns">
<ul class="clearfix">
	<?php if ( trim( $GLOBALS['stdata410'] ) === '' ): ?>
		<!--ツイートボタン-->
		<li class="twitter">
		<a rel="nofollow" onclick="window.open('//twitter.com/intent/tweet?url=<?php echo $url_encode ?><?php echo $twitter_tag ?>&text=<?php echo $title_encode ?><?php echo $twitter_name ?>&tw_p=tweetbutton', '', 'width=500,height=450'); return false;" title="twitter"><i class="st-fa st-svg-twitter"></i><span class="snstext <?php echo $plug; ?>" >Post</span>
		<?php
		if(function_exists('get_scc_twitter')) {
			if( scc_get_share_twitter( array( 'post_id' => 'home' ) ) !== 0){
				echo '<span class="snscount">'.scc_get_share_twitter( array( 'post_id' => 'home' ) ).'</span>';
			}else{
				echo '<span class="snstext pcnone" >Twitter</span>';
			}
		}?></a>
		</li>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata411'] ) === '' ): ?>
		<!--シェアボタン-->
		<li class="facebook">
		<a target="_blank" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" rel="nofollow noopener" title="facebook"><i class="st-fa st-svg-facebook"></i><span class="snstext <?php echo $plug; ?>" >Share</span>
		<?php
		if(function_exists('get_scc_facebook')) {
			if( scc_get_share_facebook( array( 'post_id' => 'home' ) ) !== 0){
				echo '<span class="snscount">'.scc_get_share_facebook( array( 'post_id' => 'home' ) ).'</span>';
			}else{
				echo '<span class="snstext pcnone" >Share</span>';
			}
		}?></a>
		</li>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata412'] ) === '' ): ?>
		<!--ポケットボタン-->
		<li class="pocket">
		<a rel="nofollow" onclick="window.open('//getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>', '', 'width=500,height=350'); return false;" title="pocket"><i class="st-fa st-svg-get-pocket"></i><span class="snstext <?php echo $plug; ?>" >Pocket</span>
		<?php
		if(function_exists('get_scc_pocket')) {
			if( scc_get_share_pocket( array( 'post_id' => 'home' ) ) !== 0){
				echo '<span class="snscount">'.scc_get_share_pocket( array( 'post_id' => 'home' ) ).'</span>';
			}else{
				echo '<span class="snstext pcnone" >Pocket</span>';
			}
		}?></a></li>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata413'] ) === '' ): ?>
		<!--はてブボタン-->
		<li class="hatebu">
			<a href="//b.hatena.ne.jp/entry/<?php home_url(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple" title="<?php echo esc_attr( $title ); ?>" rel="nofollow"><i class="st-fa st-svg-hateb"></i><span class="snstext <?php echo $plug; ?>" >Hatena</span>
<?php if(function_exists('get_scc_hatebu')) {
			if( scc_get_share_hatebu( array( 'post_id' => 'home' ) ) !== 0){
				echo '<span class="snscount">'.scc_get_share_hatebu( array( 'post_id' => 'home' ) ).'</span>';
			}else{
				echo '<span class="snstext pcnone" >Hatena</span>';
			}
		}?></a><script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

		</li>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata495'] ) === '' ): ?>
		<!--Pinterestボタン-->
		<li class="sns-pinterest">
			<a data-pin-do="buttonPin" data-pin-custom="true" data-pin-tall="true" data-pin-round="true" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode ?>&media=<?php st_og_image_attribute(); ?>&description=<?php st_og_description_attribute(); ?>" rel="nofollow" title="pinterest"><i class="st-fa st-svg-pinterest-p" aria-hidden="true"></i><span class="snstext" >Pinterest</span></a>
		</li>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata414'] ) === '' ): ?>
		<!--LINEボタン-->
		<li class="line">
			<a target="_blank" href="//line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>" rel="nofollow noopener" title="line"><i class="st-fa st-svg-line" aria-hidden="true"></i><span class="snstext" >LINE</span></a>
		</li>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata415'] ) === '' ): ?>
		<!--URLコピーボタン-->
		<li class="share-copy">
			<a href="#" rel="nofollow" data-st-copy-text="<?php echo esc_attr( $title . ' / ' . $url ); ?>" title="urlcopy"><i class="st-fa st-svg-clipboard"></i><span class="snstext" >URLコピー</span></a>
		</li>
	<?php endif; ?>
</ul>
</div> 

<?php
}
