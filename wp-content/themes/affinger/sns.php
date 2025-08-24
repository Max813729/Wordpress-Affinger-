<?php
if ( ( is_single() && (trim( $GLOBALS["stdata12"] ) === '') ) || ( is_page() && (trim( $GLOBALS["stdata69"]) ) !== '') ) {

	$st_is_ex    = st_is_ver_ex();

	if( $st_is_ex ){ // EXの場合
		$post_id = get_queried_object_id();
		$post_twitter_tag = get_post_meta( $post_id, 'st_twitter_tag', true ); // 投稿ごとのTwitterハッシュタグ
	} else {
		$post_twitter_tag = '';
	}

	if ( trim( $GLOBALS["stdata25"] ) !== '' ) { // Twitterアカウント
		$twitter_name = '&via='.esc_attr( $GLOBALS["stdata25"] );
	}else{
		$twitter_name = '';
	}

	if ( $post_twitter_tag ) { // 投稿ごとのTwitterハッシュタグ（EX）
		$twitter_tag = '&hashtags='.esc_attr( $post_twitter_tag );
	} elseif ( trim( $GLOBALS["stdata118"] ) !== '' ) { // Twitterハッシュタグ
		$twitter_tag = '&hashtags='.esc_attr( $GLOBALS["stdata118"] );
	}else{
		$twitter_tag = '';
	}

	$url          = get_permalink();
	$url_encode   = rawurlencode( $url );
	$title        = get_the_title();
	$title        = str_replace( '&', '&#038;', $title );                                   // 1. 文字参照の & をエンコードして保護する
	$title        = html_entity_decode( $title, ENT_QUOTES, get_bloginfo( 'charset' ) );    // 2. 文字参照をデコード
	$title        = preg_replace( '#</?[a-zA-Z][a-zA-Z0-9]*?>|<![^>]*>#', '', $title );     // 3. HTML タグを削除
	$title        = html_entity_decode( $title, ENT_QUOTES, get_bloginfo( 'charset' ) );    // 4. 文字参照を元に戻す
	$title_encode = rawurlencode( $title );

	if(function_exists('scc_get_share_twitter')){
		$plug = "smanone";
	}else{
		$plug = "";
	}

?>

	<?php if ( isset( $GLOBALS['stdata468'] ) && $GLOBALS['stdata468'] === 'yes' ): // この記事タイトルとURLをコピー ?>
		<div class="st-copyurl-btn">
			<a href="#" rel="nofollow" data-st-copy-text="<?php echo esc_attr( $title . ' / ' . $url ); ?>"><i class="st-fa st-svg-clipboard"></i>この記事タイトルとURLをコピー</a>
		</div>
	<?php endif; ?>

	<div class="sns st-sns-singular">
	<ul class="clearfix">
		<?php if ( trim( $GLOBALS['stdata410'] ) === '' ): ?>
			<!--ツイートボタン-->
			<li class="twitter">
			<a rel="nofollow" onclick="window.open('//twitter.com/intent/tweet?url=<?php echo $url_encode ?><?php echo $twitter_tag ?>&text=<?php echo $title_encode ?><?php echo $twitter_name ?>&tw_p=tweetbutton', '', 'width=500,height=450'); return false;" title="twitter"><i class="st-fa st-svg-twitter"></i><span class="snstext <?php echo $plug; ?>" >Post</span><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()=='0')?'<span class="snstext pcnone" >Twitter</span>':'<span class="snscount">'.scc_get_share_twitter().'</span>'; ?></a>
			</li>
		<?php endif; ?>

		<?php if ( trim( $GLOBALS['stdata411'] ) === '' ): ?>
			<!--シェアボタン-->
			<li class="facebook">
			<a href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" target="_blank" rel="nofollow noopener" title="facebook"><i class="st-fa st-svg-facebook"></i><span class="snstext <?php echo $plug; ?>" >Share</span>
			<?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'<span class="snstext pcnone" >Share</span>':'<span class="snscount">'.scc_get_share_facebook().'</span>'; ?></a>
			</li>
		<?php endif; ?>

		<?php if ( trim( $GLOBALS['stdata412'] ) === '' ): ?>
			<!--ポケットボタン-->
			<li class="pocket">
			<a rel="nofollow" onclick="window.open('//getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>', '', 'width=500,height=350'); return false;" title="pocket"><i class="st-fa st-svg-get-pocket"></i><span class="snstext <?php echo $plug; ?>" >Pocket</span><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'<span class="snstext pcnone" >Pocket</span>':'<span class="snscount">'.scc_get_share_pocket().'</span>'; ?></a></li>
		<?php endif; ?>

		<?php if ( trim( $GLOBALS['stdata413'] ) === '' ): ?>
			<!--はてブボタン-->
			<li class="hatebu">
				<a href="//b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple" title="<?php echo esc_attr( $title ); ?>" rel="nofollow" title="hatenabookmark"><i class="st-fa st-svg-hateb"></i><span class="snstext <?php echo $plug; ?>" >Hatena</span>
				<?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'<span class="snstext pcnone" >Hatena</span>':'<span class="snscount"><span class="hatebno">'.scc_get_share_hatebu().'</span></span>';
	 ?></a><script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

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
			<a href="//line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>" target="_blank" rel="nofollow noopener" title="line"><i class="st-fa st-svg-line" aria-hidden="true"></i><span class="snstext" >LINE</span></a>
			</li>
		<?php endif; ?>

		<?php if ( trim( $GLOBALS['stdata494'] ) === '' && st_comment_open() ): // コメントが有効 ?>
			<!--コメントリンクボタン-->
			<li class="sns-comment">
				<a href="#comments" title="comment"><i class="st-fa st-svg-commenting" aria-hidden="true"></i><span class="snstext" >コメント</span></a>
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
