<?php
/**
 * @var array{context?: ?string} $args
 */
$default_args = array(
	'context' => null,
);

$args = array_merge( $default_args, $args );

// ヘッダーバナーリンク
$cards = array(
	array(
		'img_url'    => trim( $GLOBALS["stdata337"] ),                 // ヘッダーバナー1（画像）
		'text'       => trim( stripslashes( $GLOBALS["stdata338"] ) ), // ヘッダーバナー1（テキスト）
		'subtext'    => trim( stripslashes( $GLOBALS["stdata630"] ) ), // ヘッダーバナー1（サブテキスト）
		'link_url'   => trim( $GLOBALS["stdata339"] ),                 // ヘッダーバナー1（リンクURL）
		'hide_on_pc' => trim( $GLOBALS["stdata350"] ),                 // ヘッダーバナー1（PC非表示）
		'hide_on_sp' => trim( $GLOBALS["stdata351"] ),                 // ヘッダーバナー1（SC非表示）
	),
	array(
		'img_url'    => trim( $GLOBALS["stdata340"] ),                 // ヘッダーバナー2（画像）
		'text'       => trim( stripslashes( $GLOBALS["stdata341"] ) ), // ヘッダーバナー2（テキスト）
		'subtext'    => trim( stripslashes( $GLOBALS["stdata631"] ) ), // ヘッダーバナー2（サブテキスト）
		'link_url'   => trim( $GLOBALS["stdata342"] ),                 // ヘッダーバナー2（リンクURL）
		'hide_on_pc' => trim( $GLOBALS["stdata352"] ),                 // ヘッダーバナー2（PC非表示）
		'hide_on_sp' => trim( $GLOBALS["stdata353"] ),                 // ヘッダーバナー2（SC非表示）
	),
	array(
		'img_url'    => trim( $GLOBALS["stdata343"] ),                 // ヘッダーバナー3（画像）
		'text'       => trim( stripslashes( $GLOBALS["stdata344"] ) ), // ヘッダーバナー3（テキスト）
		'subtext'    => trim( stripslashes( $GLOBALS["stdata632"] ) ), // ヘッダーバナー3（サブテキスト）
		'link_url'   => trim( $GLOBALS["stdata345"] ),                 // ヘッダーバナー3（リンクURL）
		'hide_on_pc' => trim( $GLOBALS["stdata354"] ),                 // ヘッダーバナー3（PC非表示）
		'hide_on_sp' => trim( $GLOBALS["stdata355"] ),                 // ヘッダーバナー3（SC非表示）
	),
	array(
		'img_url'    => trim( $GLOBALS["stdata346"] ),                 // ヘッダーバナー4（画像）
		'text'       => trim( stripslashes( $GLOBALS["stdata347"] ) ), // ヘッダーバナー4（テキスト）
		'subtext'    => trim( stripslashes( $GLOBALS["stdata633"] ) ), // ヘッダーバナー4（サブテキスト）
		'link_url'   => trim( $GLOBALS["stdata348"] ),                 // ヘッダーバナー4（リンクURL）
		'hide_on_pc' => trim( $GLOBALS["stdata356"] ),                 // ヘッダーバナー4（PC非表示）
		'hide_on_sp' => trim( $GLOBALS["stdata357"] ),                 // ヘッダーバナー4（SC非表示）
	),
);

$blur = ( $GLOBALS['stdata349'] === 'yes' );    // 画像が背景設定の場合にぼかす
$dark = ( $GLOBALS['stdata349'] === 'dark' );   // 画像が背景設定の場合に暗くする

$is_mobile = wp_is_mobile();

// PCの表示対象カードでのフィルター関数
$include_pc_cards = function ( $card ) {
	return ( $card['img_url'] !== '' && $card['hide_on_pc'] === '' );
};

// スマホ(スマホ/タブレット)での表示対象カードのフィルター関数
$include_mobile_cards = function ( $card ) {
	return ( $card['img_url'] !== '' && $card['hide_on_sp'] === '' );
};

$cards      = array_filter( $cards, $is_mobile ? $include_mobile_cards : $include_pc_cards );    // 表示対象カードリンク
$card_count = count( $cards );    // 表示数

$should_show = ( $card_count >= 1 );
$should_show = ( $args['context'] === 'shortcode' )
	? $should_show
	: $should_show && ( is_front_page() || trim( $GLOBALS["stdata358"] ) !== '' );
?>

<?php if ( $should_show ):    // 画像が 1 つ以上ある場合にリンクを表示 ?>
	<?php
	$column_count = $is_mobile
		? min( max( $card_count, 1 ), 2 )     // スマホ閲覧時のカラム数 (最大 2 カラム)
		: min( max( $card_count, 1 ), 4 );    // PC 閲覧時のカラム数 (最大 4 カラム)

	$column_class = 'st-cardlink-column-' . $column_count;    // カラムクラス
	?>
	<div id="st-header-cardlink-wrapper">
		<ul id="st-header-cardlink" class="st-cardlink-column-d <?php echo esc_attr( $column_class ); ?>">
			<?php foreach ( $cards as $card ): ?>
				<?php $card_class = ( $card['link_url'] !== '' ) ? ' has-link' : ''; ?>

				<?php if ( $card['text'] !== '' ): // ヘッダーバナー（テキスト）がある場合（画像は背景に設定） ?>
					<?php $card_class .= $blur ? ' is-blurable' : ''; ?>
					<?php $card_class .= $dark ? ' is-darkable' : ''; ?>

					<li class="st-cardlink-card has-bg<?php echo esc_attr( $card_class ); ?>"
						style="background-image: url(<?php echo esc_url( $card['img_url'] ); ?>);">
						<?php if ( $card['link_url'] !== '' ): ?>
							<a class="st-cardlink-card-link" href="<?php echo esc_url( $card['link_url'] ); ?>">
								<div class="st-cardlink-card-text">
									<?php echo $card['text']; ?><?php if( $card['subtext'] ): ?><br><span class="st-cardlink-subtext"><?php echo $card['subtext']; ?></span><?php endif; ?>
								</div>
							</a>
						<?php else: ?>
							<div class="st-cardlink-card-text">
								<?php echo $card['text']; ?><?php if( $card['subtext'] ): ?><br><span class="st-cardlink-subtext"><?php echo $card['subtext']; ?></span><?php endif; ?>
							</div>
						<?php endif; ?>
					</li>
				<?php else:    // ヘッダーバナー（テキスト）が無い場合 ?>
					<li class="st-cardlink-card<?php echo esc_attr( $card_class ); ?>">
						<?php
						$st_header_card_size_output = st_image_size_output($card['img_url'], "st-cardlink-img", false);
						if ( $card['link_url'] !== '' ): ?>
							<a class="st-cardlink-card-link" href="<?php echo esc_url( $card['link_url'] ); ?>">
								<?php echo $st_header_card_size_output; ?>
							</a>
						<?php else: ?>
							<?php echo $st_header_card_size_output; ?>
						<?php endif; ?>
					</li>
				<?php endif; ?>

			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
