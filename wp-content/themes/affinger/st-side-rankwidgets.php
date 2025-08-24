<?php
/**
 * ランキングウィジェット
 *
 * @var WP_Widget $wp_widget WP_Widget
 * @var mixed[] $args ウィジェットの引数
 * @var mixed[] $instance ウィジェットの設定
 */

// タイトル
$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
$title = apply_filters( 'widget_title', $title, $instance, $wp_widget->id_base );

// アフィリエイトタグの ID
$tag_post_ids = isset( $instance['tag_post_ids'] ) ? $instance['tag_post_ids'] : '';
$tag_post_ids = array_map( 'intval', explode( ',', $tag_post_ids ) );

$tag_post_ids_count = count( $tag_post_ids );
?>

<?php if ( $tag_post_ids_count > 0 ):    // ID の指定ありの場合 ?>

	<div class="st_side_rankwidgets">
		<?php if ( $title ) :    // タイトル ?>
			<p class="rankh3 rankwidgets-title"><?php echo $title; ?></p>
		<?php endif; ?>

		<?php // 各アフィリエイトタグ ?>
		<?php for ( $i = 0, $rank = 0; $i < $tag_post_ids_count; $i ++ ): ?>
			<?php
			$tag_post = get_post( $tag_post_ids[ $i ] );    // アフィリエイトタグ投稿

			if ( ! $tag_post ) {    // 存在しないアフィリエイトタグは除外
				continue;
			}

			$rank ++;    // ランク (1〜)

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

			<div class="st_rankside st_rankside<?php echo esc_attr($rank); ?> clearfix">
				<?php if (st_tag_plugin_has_raw_html($tag_post)):    // D. 単発コードがある場合 (単発コードのみ表示9 ?>
					<?php st_tag_plugin_the_tag($raw_html, $tag_post, st_tag_plugin_get_tag_type_slug('raw'), $source);    // バナー (計測あり) ?>
					<?php st_tag_plugin_the_beacon($tag_post, st_tag_plugin_get_tag_type_slug('raw'));    // 表示計測タグ (バナー) ?>
				<?php elseif (!st_tag_plugin_has_nothing($tag_post) || $description_2 !== ''):    // A, B, C のいずれかあり、または説明 2 ありの場合 ?>
					<div class="rankst-box post">

						<?php if (st_tag_plugin_has_banner($tag_post)):    // A. バナーありの場合 ?>
						<div class="rankwidgets-poprank">
							<span class="rankwidgets-no rankwidgets-side-rank<?php echo esc_attr($rank); ?>"><?php echo esc_html($rank); // ランキングNO ?></span>
							<?php st_tag_plugin_the_tag($banner_html, $tag_post, st_tag_plugin_get_tag_type_slug('banner'), $source);    // バナー (計測あり) ?>
						</div>
						<div class="st_rankside_r">
						<?php else: ?>
							<div class="st_rankside_all">
						<?php endif; ?>

							<?php if (st_tag_plugin_has_text_link($tag_post)):  // アフィリエイト文字リンクありの場合 ?>
								<p class="rankwidgets-item"><?php st_tag_plugin_the_tag($text_link_html, $tag_post, st_tag_plugin_get_tag_type_slug('text'), $source);  // アフィリエイト文字リンク (計測あり) ?>
									<?php if ($star_html !== ''): // スターがある場合?>
										<br/><?php echo $star_html; ?>
									<?php endif; ?>
								</p>
							<?php endif; ?>

							<?php if ($description !== ''):    // 説明ありの場合 ?>
								<div class="rankwidgets-cont"><?php echo $description; ?>
									<?php if (st_tag_plugin_has_detail_link($tag_post)):    // 詳細ページへのリンクありの場合 ?>
										<span><?php st_tag_plugin_the_tag($detail_link_html, $tag_post, st_tag_plugin_get_tag_type_slug('raw'), $source);    // 詳細ページへのリンク (計測あり) ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if (!st_tag_plugin_has_nothing($tag_post)):    // A, B, C のいずれかありの場合 ?>
								<?php st_tag_plugin_the_beacon($tag_post, st_tag_plugin_get_the_tag_type($tag_post));    // 表示計測タグ ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

		<?php endfor; ?>

	</div>

<?php else:    // ID の指定なしの場合 ?>
<?php endif; ?>
