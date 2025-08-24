<?php
if ( trim( $GLOBALS["stdata7"] ) !== '' ) {
	$analytics_id = $GLOBALS["stdata7"];
	$tag_check = substr( $analytics_id, 0, 2 );
	if ( $tag_check !== 'G-' && $tag_check !== 'UA' ) { // ページタグが無い場合
		// トラッキングIDのページタグを付与
		$analytics_id = 'UA-' . $analytics_id;
	}
	?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js( $analytics_id ) ;?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo esc_js( $analytics_id ) ;?>');
	</script>
	<?php
}
