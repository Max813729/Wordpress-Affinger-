<?php
$is_rakuten = $this->is_search_from_rakuten( $this->array_get( $meta_datas, self::SEARCH_SHOP_VALUE, '') );

$image_class = $this->getImageClass( $atts[ 'size' ] );
$attention = $this->array_get($atts, 'attention_text', '');
$attention_design = $this->array_get($atts, 'attention_design', '');

$class_name = strlen($atts['classname']) > 0 ? ' ' . esc_attr($atts['classname']) : '';
$class_name = $class_name . ' ' . $this->each_design_class_attr($atts);
if (strlen($attention_design) > 0 ) {
    $class_name = $class_name . ' ' . 'yyi-rinker-use-' . $attention_design;
}
$cat_ids = get_the_terms($post_id, 'yyi_rinker_cat');
if ( is_array( $cat_ids )) {
	foreach ($cat_ids as $cat_id) {
		$class_name .= ' yyi-rinker-tagid-' . intval($cat_id->term_id);
	}
}

?>
<div id="rinkerid<?php echo esc_attr( $post_id )?>" class="yyi-rinker-contents<?php echo $class_name ?> yyi-rinker-postid-<?php echo esc_attr( $post_id )?> <?php echo esc_attr( $image_class ) ?> <?php foreach($category_classes AS $category_class ) { echo esc_attr( $category_class ) . ' '; } ?>">
	<div class="yyi-rinker-box">
		<div class="yyi-rinker-image">
			<?php if ( $is_rakuten ) { ?>
				<?php echo  isset( $rakuten_image_link ) ? $rakuten_image_link : '';?>
			<?php } else { ?>
				<?php echo  isset( $amazon_image_link ) ? $amazon_image_link : '';?>
			<?php } ?>
		</div>
		<div class="yyi-rinker-info">
			<div class="yyi-rinker-title">
				<?php if ( $is_rakuten ) { ?>
					<?php echo  isset( $rakuten_title_link ) ? $rakuten_title_link : '';?>
				<?php } else { ?>
					<?php echo  isset( $amazon_title_link ) ? $amazon_title_link : '';?>
				<?php } ?>
			</div>
			<div class="yyi-rinker-detail">
			<?php if ( isset( $credit) ) { ?>
				<div class="credit-box"><?php echo $credit ?></div>
			<?php } ?>
			<?php if ( strlen( $meta_datas[ 'brand' ] ) > 0 ) { ?>
				<div class="brand"><?php echo esc_html( $meta_datas[ 'brand' ] ); ?></div>
			<?php } ?>
				<div class="price-box">
			<?php if ( strlen( $meta_datas[ 'price' ] ) > 0 && intval( $meta_datas[ 'price' ] ) > 0) { ?>
				<span title="" class="price"><?php echo esc_html( '¥' . number_format( intval( $meta_datas[ 'price' ] ) ) ); ?></span>
				<?php if ( strlen( $meta_datas[ 'price_at' ] ) > 0 ) { ?>
					<?php if ( $is_rakuten ) { ?>
						<span class="price_at">(<?php echo esc_html( $meta_datas[ 'price_at' ] ); ?>時点&nbsp;楽天市場調べ-</span><span title="このサイトで掲載されている情報は当サイトの作成者により運営されています。価格、販売可能情報は、変更される場合があります。購入時に楽天市場店舗（www.rakuten.co.jp）に表示されている価格がその商品の販売に適用されます。">詳細)</span>
						<?php } else { ?>
						<span class="price_at">(<?php echo esc_html( $meta_datas[ 'price_at' ] ); ?>時点&nbsp;Amazon調べ-</span><span title="価格および発送可能時期は表示された日付/時刻の時点のものであり、変更される場合があります。本商品の購入においては、購入の時点でAmazon.co.jpに表示されている価格および発送可能時期の情報が適用されます。">詳細)</span>
						<?php } ?>
				<?php } ?>
			<?php } ?>
				</div>
			<?php if( isset( $meta_datas[ self::FREE_COMMENT_COLUMN ] ) && strlen( $meta_datas[ self::FREE_COMMENT_COLUMN ] ) > 0 ) { ?>
				<div class="free-text">
					<?php echo wp_kses_post( $meta_datas[ self::FREE_COMMENT_COLUMN ] ) ?>
				</div>
			<?php } ?>
			</div>
			<?php if(!$this->is_links_hidden($atts)) { ?>
			<ul class="yyi-rinker-links">
				<?php if( isset( $meta_datas[ self::FREE_URL_1_COLUMN ] ) &&  strlen( $meta_datas[ self::FREE_URL_1_COLUMN ] ) > 0 ) { ?>
					<li class="freelink1">
						<?php echo ($meta_datas[ self::FREE_URL_1_COLUMN ]) ?>
					</li>
				<?php } ?>
				<?php if( isset( $meta_datas[ self::FREE_URL_3_COLUMN ] ) &&  strlen( $meta_datas[ self::FREE_URL_3_COLUMN ] ) > 0 ) { ?>
					<li class="freelink3">
						<?php echo ($meta_datas[ self::FREE_URL_3_COLUMN ]) ?>
					</li>
				<?php } ?>
				<?php if ( isset( $meta_datas[ 'amazon_kindle_url' ] ) &&  strlen( $meta_datas[ 'amazon_kindle_url' ] ) > 0 ) { ?>
					<li class="amazonkindlelink">
						<?php echo isset( $amazon_kindle_link ) ? $amazon_kindle_link : ''; ?>
					</li>
				<?php } ?>
				<?php if ( isset( $meta_datas[ 'amazon_url' ] ) &&  strlen( $meta_datas[ 'amazon_url' ] ) > 0 && isset( $amazon_link ) && strlen( $amazon_link ) > 0 ) { ?>
                    <li class="amazonlink">
						<?php echo $amazon_link; ?>
					</li>
				<?php } ?>
				<?php if ( isset( $meta_datas[ 'rakuten_url' ] ) &&  strlen( $meta_datas[ 'rakuten_url' ] ) > 0  && isset( $rakuten_link ) && strlen( $rakuten_link ) > 0 ) { ?>
					<li class="rakutenlink">
						<?php echo  $rakuten_link;?>
					</li>
				<?php } ?>
				<?php if ( isset( $meta_datas[ 'yahoo_url' ] ) && strlen( $meta_datas[ 'yahoo_url' ] ) > 0 && isset( $yahoo_link ) && strlen( $yahoo_link ) > 0 ) { ?>
					<li class="yahoolink">
						<?php echo $yahoo_link;?>
					</li>
				<?php } ?>
                <?php if ( isset( $meta_datas[ 'mercari_url' ] ) && strlen( $meta_datas[ 'mercari_url' ] ) > 0 && isset( $mercari_link ) && strlen( $mercari_link ) > 0 ) { ?>
                    <li class="mercarilink">
                        <?php echo $mercari_link;?>
                    </li>
                <?php } ?>
				<?php if ( isset( $meta_datas[ self::FREE_URL_2_COLUMN ] ) &&  strlen( $meta_datas[  self::FREE_URL_2_COLUMN ] ) > 0 ) { ?>
					<li class="freelink2">
						<?php echo $meta_datas[ self::FREE_URL_2_COLUMN ] ?>
					</li>
				<?php } ?>
				<?php if( isset( $meta_datas[ self::FREE_URL_4_COLUMN ] ) &&  strlen( $meta_datas[ self::FREE_URL_4_COLUMN ] ) > 0 ) { ?>
					<li class="freelink4">
						<?php echo ($meta_datas[ self::FREE_URL_4_COLUMN ]) ?>
					</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
	</div>
<?php if (strlen($attention) > 0) { ?>
	<?php
	if (strlen($attention_color) === 0 ) {
		$attention_color = '#FEA724';
	}

	$attention_style = 'background-color:' . $attention_color . '; border-color:' . $attention_color . ';';

	if (isset($attention_design) && strlen($attention_design) > 0 ) {
		$attention_class = 'attention_desing_' . $attention_design;
	} else {
		$attention_class = '';
	}
		?>
    <div class="yyi-rinker-attention <?php echo esc_attr($attention_class) ?>" style="<?php echo $attention_class !== 'attention_desing_right_ribbon' ?  esc_attr($attention_style) : '' ?>">
        <div class="yyi-rinker-attention-before"></div>
        <span class="yyi-rinker-attention-text" style="<?php echo $attention_class === 'attention_desing_right_ribbon' ?  esc_attr($attention_style) : '' ?>"><?php echo esc_html($attention) ?></span>
        <div class="yyi-rinker-attention-after"></div>
    </div>
<?php } ?>
</div>
