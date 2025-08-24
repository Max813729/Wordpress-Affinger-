<?php
/**
 * [st-rankgroup] ショートコード
 *
 * [st-rankgroup id="5,8,15,21" label="●●のランキング" name="これは説明のダミー"]
 *
 * @var string[] $atts ショートコード属性
 * @var string $content コンテンツ
 */

// アフィリエイトタグの ID
$tag_post_ids       = array_map( 'intval', explode( ',', $atts['id'] ) );
$tag_post_ids_count = count( $tag_post_ids );
?>

<?php if ( $tag_post_ids_count > 0 ):    // ID の指定ありの場合 ?>

	<?php if ( $atts['label'] !== '' ):   // ランキングの見出し ?>
		<h3 class="rankh3"><span class="rankh3-in"><?php echo esc_html( $atts['label'] ); ?></span></h3>
	<?php endif; ?>

	<?php if ( $atts['name'] !== '' ):    // ランキングの説明 ?>
		<div class="rank-guide"><?php echo esc_html( $atts['name'] ); ?></div>
	<?php endif; ?>

	<?php // 各アフィリエイトタグ ?>
	<?php for ( $i = 0, $rank = 0; $i < $tag_post_ids_count; $i ++ ): ?>
		<?php
		$tag_post = get_post( $tag_post_ids[ $i ] );    // アフィリエイトタグ投稿

		if ( ! $tag_post ) {    // 存在しないアフィリエイトタグは除外
			continue;
		}

		$rank ++;    // ランク (1〜)

		$editor_content = st_tag_plugin_get_the_editor_content( $tag_post );    // エディターのコンテンツ (st-affiliate-manager 4.3.0+)

		$heading   = st_tag_plugin_get_the_heading( $tag_post );    // 見出し
		$star_html = st_tag_plugin_get_the_star_html( $tag_post );    // スターの HTML

		// スターの HTML (手動生成する場合)
		// $star      = st_tag_plugin_get_the_star_rating( $tag_post );    // スター (1〜5)
		// $star_max  = 5;    // 最大点数
		// $star_html = '';
		//
		// if ($star > 0) {
		// 	// スターの HTML
		// 	$star_html = '<span class="st-star">';
		// 	$star_html .= str_repeat('<i class="st-fa st-svg-star"></i>', $star);
		// 	$star_html .= str_repeat('<i class="st-fa st-svg-star-o"></i>', $star_max - $star);
		// 	$star_html .= '</span>';
		// }

		$description   = st_tag_plugin_get_the_description( $tag_post );    // 説明
		$description_2 = st_tag_plugin_get_the_description_2( $tag_post );    // 説明 2

		$banner_html    = st_tag_plugin_get_the_raw_banner_html( $tag_post );    // A. アフィリエイトバナー HTML (計測なし)
		$text_link_html = st_tag_plugin_get_the_raw_text_link_html( $tag_post );    // B. アフィリエイト文字リンク HTML (計測なし)

		// $detail_link_uri       = st_tag_plugin_get_the_detail_link_uri( $tag_post );    // C. 詳細ページへのリンク URL
		// $detail_link_uri_title = st_tag_plugin_get_the_detail_link_label( $tag_post );    // 詳細ページへのリンクタイトル
		// $nofollow              = st_tag_plugin_get_the_nofollow( $tag_post );    // nofollow を設定する (0 = しない, 1 = する)
		$detail_link_html = st_tag_plugin_get_the_raw_detail_link_html( $tag_post );    // 詳細ページへのリンク HTML (自動生成)

		$raw_html = st_tag_plugin_get_the_raw_raw_html( $tag_post );    // D. 単発コード HTML (計測なし)

		$is_wysiwyg_editor_disabled = st_tag_plugin_is_wysiwyg_editor_disabled( $tag_post );    // ビジュアルエディタを停止する (0 = しない, 1 = する)

		$source = st_tag_plugin_get_the_source();    // アクセス元ページ
		?>

		<div class="rankid<?php echo esc_attr($rank); ?>">
			<?php if (st_tag_plugin_has_editor_content($tag_post)):    // エディターのコンテンツがある場合 (エディターのコンテンツのみ表示) ?>
				<?php st_tag_plugin_the_tag($editor_content, $tag_post, st_tag_plugin_get_tag_type_slug('editor'), $source);    // エディターのコンテンツ (計測あり) ?>
				<?php st_tag_plugin_the_beacon($tag_post, st_tag_plugin_get_tag_type_slug('editor'));    // 表示計測タグ (バナー) ?>
			<?php elseif (st_tag_plugin_has_raw_html($tag_post)):    // D. 単発コードがある場合 (単発コードのみ表示) ?>
				<?php st_tag_plugin_the_tag($raw_html, $tag_post, st_tag_plugin_get_tag_type_slug('raw'), $source);    // バナー (計測あり) ?>
				<?php st_tag_plugin_the_beacon($tag_post, st_tag_plugin_get_tag_type_slug('raw'));    // 表示計測タグ (バナー) ?>
			<?php elseif (!st_tag_plugin_has_nothing($tag_post) || $description_2 !== ''):    // A, B, C のいずれかあり、または説明 2 ありの場合 ?>
				<div class="rankst-box post">

					<?php if ($heading !== ''):    // 見出しありの場合 ?>
						<h4 class="rankh4"><?php echo esc_html($heading); ?><br><?php echo $star_html; ?></h4>
					<?php endif; ?>

					<?php // A. バナー + 説明 ?>
					<?php if (st_tag_plugin_has_banner($tag_post)):    // A. バナーありの場合 ?>
						<div class="clearfix rankst">
							<div class="rankst-l">
								<?php st_tag_plugin_the_tag($banner_html, $tag_post, st_tag_plugin_get_tag_type_slug('banner'), $source);    // バナー (計測あり) ?>
							</div>
							<?php if ($description !== ''):    // 説明ありの場合 ?>
								<div class="rankst-r">
									<div class="rankst-cont"><?php echo $description; ?></div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php // 説明 2 ?>
					<?php if ($description_2 !== ''):    // 説明ありの場合 ?>
						<div class="rankst-contb"><?php echo $description_2; ?></div>
					<?php endif; ?>

					<?php // 内容 ?>
					<?php if (st_tag_plugin_has_text_link($tag_post) && st_tag_plugin_has_detail_link($tag_post)):    // B + C の場合 ?>
						<div class="clearfix rankst">
							<div class="rankstlink-l">
								<p><?php st_tag_plugin_the_tag($detail_link_html, $tag_post, st_tag_plugin_get_tag_type_slug('raw'), $source);   // 詳細ページへのリンク (計測あり) ?></p>
							</div>
							<div class="rankstlink-r">
								<p><?php st_tag_plugin_the_tag($text_link_html, $tag_post, st_tag_plugin_get_tag_type_slug('text'), $source);    // アフィリエイト文字リンク (計測あり) ?></p>
							</div>
						</div>
					<?php elseif (st_tag_plugin_has_text_link($tag_post)):    // B. アフィリエイト文字リンクのみの場合 ?>
						<div class="clearfix rankst">
							<div class="rankstlink-a">
								<p><?php st_tag_plugin_the_tag($text_link_html, $tag_post, st_tag_plugin_get_tag_type_slug('text'), $source);   // アフィリエイト文字リンク (計測あり) ?></p>
							</div>
						</div>
					<?php elseif (st_tag_plugin_has_detail_link($tag_post)):    // C. 詳細ページへのリンク URL のみの場合 ?>
						<div class="clearfix rankst">
							<div class="rankstlink-b">
								<p><?php st_tag_plugin_the_tag($detail_link_html, $tag_post, st_tag_plugin_get_tag_type_slug('raw'), $source);   // 詳細ページへのリンク (計測あり) ?></p>
							</div>
						</div>
					<?php endif; ?>

					<?php if (!st_tag_plugin_has_nothing($tag_post)):    // A, B, C のいずれかありの場合 ?>
						<?php st_tag_plugin_the_beacon($tag_post, st_tag_plugin_get_the_tag_type($tag_post));    // 表示計測タグ ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

	<?php endfor; ?>

<?php else:    // ID の指定なしの場合 ?>
<?php endif; ?>
