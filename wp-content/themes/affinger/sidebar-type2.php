<?php
// スマホのサイドバーを非表示にする
if ( st_is_mobile() && isset( $GLOBALS['stdata627'] ) && $GLOBALS['stdata627'] === 'yes' ) {
	return;
}
?>

<?php global $wp_query; ?>

<?php if ( isset ( $wp_query ) ): ?>
	<?php
	if ( is_single() || is_page() ) {
		$postID  = get_the_ID();
		$column1 = get_post_meta( $postID, 'columnck', true );
	} else {
		$column1 = '';
	}

	$stdata11 = get_option( 'st-data11' );
	?>

	<?php if ( ( isset( $GLOBALS['stdata77'] ) && $GLOBALS['stdata77'] === 'yes' ) || ( is_front_page() && $stdata11 === 'yes' ) || ( $column1 === 'yes' && ! is_front_page() && ! is_archive() ) ): ?>
	<?php elseif ( ( isset( $GLOBALS['stdata77'] ) && $GLOBALS['stdata77'] === 'lp' ) || ( is_front_page() && $stdata11 === 'lp' ) || ( $column1 === 'lp' && ! is_front_page() && ! is_archive() ) ): ?>
	<?php else: ?>
		<div id="side">
			<aside>
				<?php if ( is_active_sidebar( 10 ) ): ?>
					<div class="side-topad">
						<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
							<?php dynamic_sidebar( 10 ); // サイドバー（上部）のみのウィジェット ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( ( is_front_page() && ( $GLOBALS['stdata57'] === '' ) ) || ( ! is_home() && ! is_front_page() ) ): ?>
					<?php get_template_part( 'newpost' ); // 最近のエントリ ?>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 1 ) ): ?>
					<div id="mybox">
						<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
							<?php dynamic_sidebar( 1 ); // サイドウイジェット読み込み ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div id="scrollad">
					<?php get_template_part( 'popular-thumbnail-sc' ); // 任意のエントリ ?>
					<?php get_template_part( 'scroll-ad' ); // 追尾式広告 ?>

					<?php if ( isset( $GLOBALS['stplus'] ) && $GLOBALS['stplus'] === 'yes' ): ?>
						<?php get_template_part( 'st-rank-side' ); // ランキング ?>
					<?php endif; ?>
				</div>
			</aside>
		</div>
		<!-- /#side -->
	<?php endif; ?>
<?php endif; ?>

<?php if ( ( is_single() || is_page() ) && ! is_front_page() ): // 投稿と固定ページ以外 ?>
	<?php
	$postID             = $wp_query->post->ID;
	$koukoku_set        = ( get_post_meta( $postID, 'koukoku_set', true ) === 'yes' );      // 設定内の広告を表示しない
	$show_ikkatu_widget = ( get_post_meta( $postID, 'ikkatuwidget_set', true ) === 'yes' ); // 一括表示を表示しない

	// 一括表示を表示しない + 設定内の広告を表示しない 有効時は非表示
	if ( $koukoku_set && $show_ikkatu_widget ) {
		return;
	}
	?>
<?php endif; ?>

<?php if ( ! st_is_mobile() ): ?>
	<?php if ( is_active_sidebar( 39 ) ): ?>
		<div id="side" class="side-add-widgets side-add-left">
			<aside>
				<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
					<?php dynamic_sidebar( 39 ) // 追加左サイドのウィジェット ?>
				<?php endif; ?>
			</aside>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 40 ) ): ?>
		<div id="side" class="side-add-widgets side-add-right">
			<aside>
				<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
					<?php dynamic_sidebar( 40 ); // 追加右サイドのウィジェット ?>
				<?php endif; ?>
			</aside>
		</div>
	<?php endif; ?>
<?php endif; ?>
