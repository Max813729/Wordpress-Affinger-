<?php
// 表示設定「固定ページ」選択時の”投稿ページ”用テンプレート
$st_is_ex    = st_is_ver_ex();
$st_is_ex_af = st_is_ver_ex_af();
if ( st_is_home_check() ) { // 投稿ページ（メインページ）
	$post_id = get_option( 'page_for_posts' ); //記事ID
	if( get_post( $post_id ) ){
		$topin_type = get_post( $post_id )->post_type; //記事のタイプ
	}else{
		$topin_type = '';
	}
	$topin_query = new WP_Query( 'post_type=page&p=' . $post_id );
}else{
	return;
} ?>

<div id="st-top-page">

	<?php

	$show_ikkatu_widget = false;
	$show_post_info     = ( get_post_meta( $post_id, 'post_data_updatewidget_set', true ) === 'yes' );    // ヘッダーに記事データ挿入

	if ( $st_is_ex ):
		$show_youtube_id    = get_post_meta( $post_id, 'st_youtube_eyecatch', true );                     // YouTubeサムネイルを使用（動画ID）
		$show_youtube_thum  = ( get_post_meta( $post_id, 'st_youtube_eyecatch', true ) === 'yes' );       // アイキャッチを動画に変更

		// YouTubeサムネイルを使用（動画ID）+ アイキャッチを動画に変更の場合はヘッダーに記事データ挿入時もサムネイル動画を表示
		if ( $show_youtube_id && $show_youtube_thum ):
			$show_youtube_display = 'yes';
		else:
			$show_youtube_display = '';
		endif;
	else:
		$show_youtube_display = '';
	endif;

	$show_ikkatu_widget = ( get_post_meta( $post_id, 'ikkatuwidget_set', true ) !== 'yes' );    // 一括挿入ウィジェットの表示確認

	if ( trim( $GLOBALS['stdata423'] ) !== '' ) {    // 「記事ごとのヘッダーデザイン」一括設定が有効
			$show_post_info = true;
	}
	?>

	<?php if ( ! $show_post_info && ( trim( $GLOBALS['stdata423'] ) === '' && trim( $GLOBALS['stdata217'] ) === '' ) ): ?>
		<?php get_template_part( 'st-eyecatch' );    // アイキャッチ画像を挿入 ?>
	<?php endif; ?>

	<?php if ( $show_ikkatu_widget && is_active_sidebar( 17 ) ): ?>
		<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
			<?php dynamic_sidebar( 17 );    // 固定ページ上一括ウィジェット ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $topin_query->have_posts() ) : while ( $topin_query->have_posts() ) : $topin_query->the_post(); ?>

		<?php if ( ! $show_post_info ):    // 記事情報を表示が無効 ?>
			<?php if ( ! is_front_page() && ( trim( $GLOBALS['stdata234'] ) === '' ) ): ?>
				<?php // タイトル ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( ! is_front_page() && $show_ikkatu_widget && is_active_sidebar( 38 ) ): ?>
			<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
				<?php dynamic_sidebar( 38 );    // 固定記事（タイトル下） ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( isset( $GLOBALS['stdata231'] ) && $GLOBALS['stdata231'] === 'yes' ): ?>
			<?php get_template_part( 'sns-top' );    // トップ用ソーシャルボタン読み込み ?>
		<?php endif; ?>

		<?php if ( ! is_front_page() && $st_is_ex_af ): get_template_part( 'st-author-top' ); endif; // ライター情報を表示する ?>

		<div class="mainbox">
			<div id="nocopy" <?php st_text_copyck(); ?>><!-- コピー禁止エリアここから -->
				<div class="entry-content">
					<?php if ( ( $show_post_info && $show_youtube_id ) // YouTube動画アイキャッチ
							  || ! $show_post_info && ( trim( $GLOBALS['stdata423'] ) === '' && trim( $GLOBALS['stdata217'] ) !== '' ) ): ?>
						<?php get_template_part( 'st-eyecatch-under' ); ?>
					<?php endif;    // アイキャッチ画像を挿入 ?>

					<?php st_the_content( array( 'page', 'main' ) );    // 本文 ?>
				</div>
			</div><!-- コピー禁止エリアここまで -->

			<?php get_template_part( 'st-kai-page' );    // 改ページ ?>
			<?php get_template_part( 'st-ad-on' );    // 広告 ?>

			<?php if ( $show_ikkatu_widget && is_active_sidebar( 6 ) ): ?>
				<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
					<?php dynamic_sidebar( 6 );    // 固定ページ一括ウィジェット ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>

		<?php if ( isset( $GLOBALS['stplus'] ) && $GLOBALS['stplus'] === 'yes' ): ?>
			<?php get_template_part( 'st-rank' );    // ランキング ?>
		<?php endif; ?>

		<?php if ( $show_ikkatu_widget && st_is_st_reaction_buttons_enabled() ):    // 評価ボタンプラグイン ?>
			<?php echo do_shortcode( '[st-reaction-buttons]' ); ?>
		<?php endif; ?>

		<?php if ( $st_is_ex_af ): get_template_part( 'st-author' ); endif;    // 記事を書いた人 ?>

		<?php // 任意のエントリ ?>
		<?php if ( ( ! is_front_page() && ( is_page() || st_is_home_check() ) ) && ( isset( $GLOBALS['stdata41'] ) && $GLOBALS['stdata41'] === 'yes' ) ):    // 固定記事の場合 ?>
			<?php if ( isset( $GLOBALS['stdata5'] ) && $GLOBALS['stdata5'] === 'yes' ): ?>
				<?php get_template_part( 'popular-thumbnail-off' ); ?>
			<?php else: ?>
				<?php get_template_part( 'popular-thumbnail-on' ); ?>
			<?php endif; ?>
		<?php elseif (  is_front_page() && ( isset( $GLOBALS['stdata59'] ) && $GLOBALS['stdata59'] === 'yes' ) ):    // トップ記事の場合 ?>
			<?php if ( isset( $GLOBALS['stdata5'] ) && $GLOBALS['stdata5'] === 'yes' ): ?>
				<?php get_template_part( 'popular-thumbnail-off' ); ?>
			<?php else: ?>
				<?php get_template_part( 'popular-thumbnail-on' ); ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php get_template_part( 'st-childlink' );    // 子ページへのリンク ?>

		<?php // get_template_part( 'itiran-date-singular' );    // 投稿日 ?>

		<?php st_author();    // 著者リンク
		endwhile;
			wp_reset_postdata();
		endif; ?>
</div>
