<?php
$class_name = '';
$cat_ids = get_the_terms($post_id, 'yyi_rinker_cat');
if ( is_array( $cat_ids )) {
	foreach ($cat_ids as $cat_id) {
		$class_name .= ' yyi-rinker-tagid-' . intval($cat_id->term_id);
	}
}
$class_name = $class_name . ' ' . $this->each_design_class_attr($atts);
$attention = $atts[ 'attention_text' ];
$attention_color = $atts[ 'attention_color' ];
$attention_design = $this->array_get($atts, 'attention_design', '');
if (strlen($attention_design) > 0 ) {
    $class_name = $class_name . ' ' . 'yyi-rinker-use-' . $attention_design;
}

?>
<div id="rinkerid<?php echo esc_attr( $post_id )?>" class="yyi-rinker-contents <?php echo $class_name ?> yyi-rinker-postid-<?php echo esc_attr( $post_id )?> yyi-rinker-no-item">
	<div class="yyi-rinker-box">
		<div class="yyi-rinker-image"></div>
		<div class="yyi-rinker-info">
			<div class="yyi-rinker-title">
				<?php if ( strlen( $meta_datas[ 'title' ] ) > 0 ) { ?>
				<?php echo esc_html( $meta_datas[ 'title' ] ) ?>
				<?php } ?>
			</div>

			<div class="yyi-rinker-detail">
				<?php if ( isset( $credit) ) { ?>
					<div class="credit-box"><?php echo $credit ?></div>
				<?php } ?>
				<?php if ( strlen( $meta_datas[ 'brand' ] ) > 0 ) { ?>
					<div class="brand"><?php echo esc_html( $meta_datas[ 'brand' ] ); ?></div>
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
				<?php if ( isset( $meta_datas[ 'amazon_url' ] ) &&  strlen( $meta_datas[ 'amazon_url' ] ) > 0 ) { ?>
					<li class="amazonlink">
						<?php echo  isset( $meta_datas[ 'amazon_link' ] ) ?  $meta_datas[ 'amazon_link' ] : '';?>
					</li>
				<?php } ?>
				<?php if ( isset( $meta_datas[ 'rakuten_url' ] ) &&  strlen( $meta_datas[ 'rakuten_url' ] ) > 0 ) { ?>
					<li class="rakutenlink">
						<?php echo  isset( $meta_datas[ 'rakuten_link' ] ) ?  $meta_datas[ 'rakuten_link' ] : '';?>
					</li>
				<?php } ?>
				<?php if ( isset( $meta_datas[ 'yahoo_url' ] ) && strlen( $meta_datas[ 'yahoo_url' ] ) > 0 ) { ?>
					<li class="yahoolink">
						<?php echo  isset( $meta_datas[ 'yahoo_link' ] ) ?  $meta_datas[ 'yahoo_link' ] : '';?>
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

		if (strlen($attention_design) > 0 ) {
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