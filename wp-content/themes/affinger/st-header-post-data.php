<?php
/**
 * 記事ごとのヘッダーデザイン
 *
 */
$st_is_ex    = st_is_ver_ex();
$st_is_ex_af = st_is_ver_ex_af();
?>

<?php if ( ! is_front_page() && ( is_single() || is_page() || st_is_home_check() ) ): ?>
	<?php
	$post_id = get_queried_object_id();

	//広告表記チェック
	$display_ad_mark = st_display_ad_mark();

	if ( st_is_home_check() ) { // 投稿ページ（メインページ）
		$post_id = get_option( 'page_for_posts' );
	}

	if ( trim( $GLOBALS['stdata423'] ) === 'yes' ) { //「記事ごとのヘッダーデザイン」一括設定が有効
		$show_post_info = true;
		$post_header_bg = 'thumbnail_dark'; // 「背景をアイキャッチ画像に（ダーク）」を有効化
	} else {
		$show_post_info = ( get_post_meta( $post_id, 'post_data_updatewidget_set', true ) === 'yes' ); // 記事情報を表示
		$post_header_bg = get_post_meta( $post_id, 'st_post_header_under_bg', true ); // 背景画像の指定
	};

	if ( st_is_mobile() ) {
		$st_topgabg_image_fix_set = ''; // スマホ時はパララックス効果を無効に
	} else {
		$st_topgabg_image_fix_set = get_theme_mod( 'st_topgabg_image_fix', '' ); // パララックス効果
	};

	$st_topgabg_image_url = get_option( 'st_topgabg_image', '' ); // ヘッダー画像の指定

	// Youtubeサムネイル画像の取得
	$st_youtube_thumbnail_info = st_youtube_thumbnail_info( $post_id );
	$youtube_thum_url    = $st_youtube_thumbnail_info['youtube_thumb_url'];

	if ( $youtube_thum_url ) { // YouTubeサムネイルを使用（ID）
		$thumbnail_url = esc_url( $youtube_thum_url );
	} elseif ( has_post_thumbnail() ) { // アイキャッチ画像の有無
		$thumbnail_url = get_the_post_thumbnail_url( $post_id, 'full' );
	} elseif ( $st_topgabg_image_url ) {
		$thumbnail_url = $st_topgabg_image_url; // ヘッダー画像の指定がある場合
	} else {
		$thumbnail_url = '';
	};

	if ( $st_topgabg_image_fix_set ) { // パララックス効果のCSS
		$st_topgabg_image_fix_css = '';
		// カスタマイザーのパララックス効果を反映する場合
		// $st_topgabg_image_fix_css = 'background-attachment:fixed;';
	} else {
		$st_topgabg_image_fix_css = '';
	};

	if ( $post_header_bg === 'thumbnail' && $thumbnail_url ) { // 「背景をアイキャッチ画像に」を有効化
		$post_header_bg_css   = 'background:url("' . $thumbnail_url . '");background-size:cover;background-position: center center;' . $st_topgabg_image_fix_css;
		$post_header_bg_class = '';
	} elseif ( $post_header_bg === 'thumbnail_dark' && $thumbnail_url ) { // 「背景をアイキャッチ画像に（ダーク）」を有効化
		$post_header_bg_css   = 'background:url("' . $thumbnail_url . '");background-size:cover;background-position: center center;' . $st_topgabg_image_fix_css;
		$post_header_bg_class = 'st-dark';
	} else {
		$post_header_bg_css   = '';
		$post_header_bg_class = '';
	};
	?>

	<?php if ( $show_post_info ): // 記事情報を表示 ?>
		<div id="st-header-post-under-box" class="st-header-post-data <?php echo esc_attr( $post_header_bg_class ); ?>"
		     style="<?php echo esc_attr( $post_header_bg_css ); ?>">
			<div class="st-content-width st-dark-cover">

				<?php if ( is_page() || ( is_single() && isset( $GLOBALS['stdata60'] ) && $GLOBALS['stdata60'] === 'yes' ) ): //カテゴリー非表示 ?>
					<?php if ( $display_ad_mark ): // 「広告」を明記する（投稿・固定記事） ?>
						<p class="st-catgroup"><span class="catname st-catid-ad"><?php replaceAdText(); ?></span></p>
					<?php endif; ?>
				<?php elseif ( is_single() && ! isset( $GLOBALS['stdata60'] ) || $GLOBALS['stdata60'] !== 'yes' ): //カテゴリー表示 ?>
					<?php
					$categories = get_the_category();
					$separator  = ' ';
					$output     = '';
					?>

					<p class="st-catgroup">
						<?php if ( $display_ad_mark ): // 「広告」を明記する（投稿・固定記事） ?>
							<span class="catname st-catid-ad"><?php replaceAdText(); ?></span>
						<?php endif; ?>
						<?php
						if ( $categories ) {
							foreach ( $categories as $category ) {
								$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="'
								           . esc_attr( sprintf( "View all posts in %s", $category->name ) )
								           . '" rel="category tag"><span class="catname st-catid' . $category->cat_ID . '">' . $category->cat_name . '</span></a>' . $separator;
							}

							echo trim( $output, $separator );
						}
						?>
					</p>

				<?php endif; //カテゴリー表示ここまで ?>

				<p class="entry-title heder-post-data-title"><?php if ( $st_is_ex ): st_the_title(); else: the_title(); endif;    // タイトル ?></p>

				<?php if ( is_single() && isset( $GLOBALS["stdata24"] ) && $GLOBALS["stdata24"] === 'yes' ): // 投稿に「投稿日」「更新日」を表示しない
	 ?>
					<span style="display:none;"><?php get_template_part( 'itiran-date-singular' ); ?></span>
				<?php elseif ( ( is_page() || st_is_home_check() ) && isset( $GLOBALS["stdata104"] ) && $GLOBALS["stdata104"] === 'yes' || ( is_page() && trim($GLOBALS["stdata646"]) === '' ) ): // 固定ページに「投稿日」「更新日」を表示しない +  固定記事の投稿日もタイトル下に表示する
 ?>
					<span style="display:none;"><?php get_template_part( 'itiran-date-singular' ); ?></span>
				<?php else: ?>
					<?php get_template_part( 'itiran-date-singular' ); ?>
				<?php endif; ?>
			</div>
		</div>
	<?php else: ?>
		<div id="st-header-post-under-box" class="st-header-post-no-data <?php echo $post_header_bg_class; ?>"
		     style="<?php echo esc_attr( $post_header_bg_css ); ?>">
			<div class="st-dark-cover">
				<?php st_post_header_under_code(); // ヘッダー下に出力するコード ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
