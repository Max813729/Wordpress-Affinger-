<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>
<html class="i7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>
<html class="ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> <?php st_html_class(); ?>>
	<!--<![endif]-->
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
		<?php get_template_part( 'analyticstracking' ); //アナリティクスコード ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>" >
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,viewport-fit=cover">
		<meta name="format-detection" content="telephone=no" >
		<meta name="referrer" content="no-referrer-when-downgrade"/>

		<?php if ( is_front_page() && !is_paged() ): ?>
			<meta name="robots" content="index,follow">
		<?php elseif ( is_search() or is_404() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( !is_category() && !is_tag() && is_archive() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( is_paged() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( is_attachment() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( ! is_front_page() && is_page() && trim($GLOBALS["stdata9"]) !== '' &&  ($GLOBALS["stdata9"]) == $post->ID ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( is_category() && trim($GLOBALS["stdata15"]) !== ''): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( is_tag() && trim($GLOBALS["stdata420"]) !== ''): ?>
			<meta name="robots" content="noindex,follow">
		<?php endif; ?>

		<link rel="alternate" type="application/rss+xml" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/js/html5shiv.js"></script>
		<![endif]-->
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		<?php wp_head(); ?>
		<?php get_template_part( 'st-ogp' ); //OGP設定 ?>
		<?php get_template_part( 'st-richjs' ); //効果追加 ?>
		<?php get_template_part( 'a-header-code' ); //ヘッダーに挿入するコード ?>
	</head>
	<body ontouchstart="" <?php body_class(); ?> ><?php do_action( 'st/body_open' ); // body直後のフック ?>
	<?php if ( isset( $GLOBALS["stdata111"] ) && $GLOBALS["stdata111"] === 'yes' && st_is_background_video_available( 'raw' ) ): ?>
		<div class="video-player">
			<video class="video-player-video" src="<?php echo esc_url( st_get_background_video_url() ); ?>" muted autoplay playsinline
				<?php if ( isset( $GLOBALS['stdata114'] ) && $GLOBALS['stdata114'] === 'yes' ): ?> loop<?php endif; ?>></video>
		</div>
	<?php elseif ( isset( $GLOBALS["stdata111"] ) && $GLOBALS["stdata111"] === 'yes' && st_is_background_video_available( 'youtube' ) ): ?>
		<div class="video-player" data-st-youtube
		     data-st-youtube-options="<?php echo esc_attr( wp_json_encode( st_background_youtube_options() ) ); ?>">
			<div id="video-player-video" class="video-player-video" data-st-youtube-video></div>
		</div>
	<?php endif; ?>
			<div id="st-ami">
				<div id="wrapper" class="<?php st_wrap_class(); ?>" ontouchstart="">
				<div id="wrapper-in">

					<?php get_template_part( 'header-content' ); ?>

					<div id="content-w">

						<?php get_template_part( 'st-ad-smart-head' ); //スマホ上の広告 ?>

						<?php get_template_part( 'st-header-post-data' ); //記事ごとのヘッダーデザイン ?>
