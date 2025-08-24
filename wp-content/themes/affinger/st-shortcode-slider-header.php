<?php
/**
 * st-shortcode-slider.php から派生
 * 
 * @var WP_Query $slide_query WP_Query
 * @var int[] $slides_to_show 1 ページあたりのスライド件数 (大、中、小画面)
 * @var bool $slide_date 日付を表示する
 * @var string $slide_more 続きを見るボタンのテキスト
 * @var bool $slide_center センターモードにする
 * @var bool $is_rank ランキング表示
 * @var bool $show_category カテゴリー表示
 * @var string $fullsize_type フルサイズ表示 (text = フルサイズのサムネイル画像 + タイトル, card = フルサイズのサムネイル画像のみ)
 */
$st_is_ex = st_is_ver_ex();
// 画像をフルサイズにする
$st_fullsize_class = get_option( 'st-data605', '' ) !== '' ? '-header' : '';

if ( ! function_exists( '_st_kanren_slider_create_options' ) ) {
	function _st_kanren_slider_create_options( $slides_to_show, $slide_center ) {
		return array(
			'slidesToShow' => $slides_to_show[0], // 大: 960px 以上 (960px 〜)
			'responsive'   => array(
				array(
					'breakpoint' => 960, // 中: 960px 未満 (〜 959px)
					'settings'   => array(
						'slidesToShow' => $slides_to_show[1],
					),
				),
				array(
					'breakpoint' => 560, // 小: 560px 未満 (〜 559px)
					'settings'   => array(
						'slidesToShow'  => $slides_to_show[2],
						'centerMode'    => $slide_center,
						'centerPadding' => '80px',
					),
				),
			),
		);
	}
}

if ( ! function_exists( '_st_kanren_slider_get_options' ) ) {
	function _st_kanren_slider_get_options( $options = array() ) {
		$defaults = array(
			'slidesToShow'   => 3,
			'adaptiveHeight' => true,
			'autoplay'       => true,
			'dots'           => true,
			'responsive'     => array(),
			'centerMode'     => false,
		);

		$options = array_replace_recursive( $defaults, $options );

		// 画面幅が広い順に並べ替え
		usort(
			$options['responsive'],
			function ( $a, $b ) {
				if ( $a['breakpoint'] === $b['breakpoint'] ) {
					return 0;
				}

				return ( $a['breakpoint'] < $b['breakpoint'] ) ? 1 : - 1;
			}
		);

		// スライド数の下限 (1 件) /上限 (3 件) に調整 / より狭い画面幅では 'slidesToShow' を一つ前の画面幅の設定以下にする
		$options['responsive'] = array_reduce(
			$options['responsive'],
			function ( $responsive, $current ) use ( $options ) {
				static $MAX_SLIDES_TO_SHOW = 3;

				$count                   = count( $responsive );
				$previous_slides_to_show = ( $count > 0 ) ? $responsive[ $count - 1 ]['settings']['slidesToShow'] : $options['slidesToShow'];
				$previous_slides_to_show = min( max( $previous_slides_to_show, 1 ), $MAX_SLIDES_TO_SHOW );
				$slides_to_show          = min( $current['settings']['slidesToShow'], $MAX_SLIDES_TO_SHOW );

				if ( $slides_to_show > $previous_slides_to_show ) {
					$current['settings']['slidesToShow'] = $previous_slides_to_show;
				}

				$responsive[] = $current;

				return $responsive;
			},
			array()
		);

		return $options;
	}
}

// 設定
$is_rank          = ( isset( $is_rank ) && $is_rank );
$show_category    = ( isset( $show_category ) && $show_category );
$is_fullsize      = ( $fullsize_type !== '' );
$is_fullsize_card = ( $fullsize_type === 'card' );
$is_fullsize_text = ( $fullsize_type === 'text' );

// Slick の設定
$options = _st_kanren_slider_get_options( _st_kanren_slider_create_options( $slides_to_show, $slide_center ) );
$slick   = json_encode( $options, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT );

// クラス
$show_published_date = ( get_option( 'st-data140', '' ) === 'yes' ); // 更新日がある場合も投稿日を表示する
$excerpt_class       = ! $is_fullsize ? ' has-excerpt' : '';
$date_class          = $slide_date ? ' has-date' : '';
$more_class          = ( $slide_more !== '' ) ? ' has-more' : '';
$rank_class          = $is_rank ? ' is-ranking' : '';
$center_mode_class   = $slide_center ? ' is-center-mode' : '';
$fullsize_class      = $is_fullsize ? ' is-fullsize' : '';
$fullsize_card_class = $is_fullsize_card ? ' is-fullsize-card' : '';
$fullsize_text_class = $is_fullsize_text ? ' is-fullsize-text' : '';
$class               = $excerpt_class . $date_class . $more_class . $rank_class . $center_mode_class .
                       $fullsize_class . $fullsize_card_class . $fullsize_text_class;
?>

<?php if ( $slide_query->have_posts() ): ?>
	<div class="slider post-slider content-post-slider<?php echo esc_attr( $class ); ?>"
	     data-slick="<?php echo esc_attr( $slick ); ?>">
		<?php while ( $slide_query->have_posts() ): $slide_query->the_post(); ?>

			<?php
			// Youtubeサムネイル画像の取得
			$postID = get_the_ID();
			$st_youtube_thumbnail_info = st_youtube_thumbnail_info( $postID );
			$youtube_thum_img          = $st_youtube_thumbnail_info['youtube_thumb_img'];
			?>

			<div class="slider-item post-slide">
				<div class="post-slide-image<?php echo esc_attr($st_fullsize_class) ?>">
					<?php if ( $is_rank ): $rank = $slide_query->current_post + 1; ?>
						<span
							class="post-slide-rank post-slide-rank-<?php echo esc_attr( $rank ); ?>"><?php echo esc_html( $rank ); ?></span>
					<?php endif; ?>

					<?php if ( $youtube_thum_img ): // YouTubeサムネイルを使用 ?>
						<a href="<?php the_permalink(); ?>"><?php echo $youtube_thum_img; ?></a>
					<?php else: ?>
						<a href="<?php the_permalink(); ?>">
							<?php echo _st_get_the_responsive_post_thumbnail( $slides_to_show, null, ! $is_fullsize ); ?>
						</a>
					<?php endif; ?>

				</div>
				<?php if ( ! $is_fullsize_card ): ?>
					<div class="post-slide-body">
						<div class="post-slide-text">
							<p class="post-slide-title"><a href="<?php the_permalink(); ?>"><?php st_title_limit( $is_fullsize_text ); ?></a></p>
						</div>

						<?php if ( ! $is_fullsize_text && $slide_more !== '' ): ?>
							<p class="post-slide-more">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html( $slide_more ); ?></a>
							</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php else: ?>
<?php endif; ?>
