<?php //ショートコード出力用
if ( trim( stripslashes( $GLOBALS["myaf"] ) ) !== '' ) {
	echo '<h3 class="rankh3"><span class="rankh3-in">' . st_esc_html_i( _st_do_shortcodes( stripslashes( $GLOBALS["myaf"] ), array( 'st-date' ) ) ) . '</span></h3>';
}
if ( trim( $GLOBALS["myaf22"] ) !== '' ) {
	echo '<div class="rank-guide">' . apply_filters( 'st_af_kanri_rank_description', stripslashes( $GLOBALS["myaf22"] ), 'description_0', 'my-af22' ) . '</div>';
}
//ショートコードのランキングを表示
$myafs_no = '';
for($i = 1; $i<11 ; $i++ ){
	$myafs = 'myafsc'.$i;
	if ( trim( $GLOBALS[$myafs] ) !== '' ) {
		$myafsc_id = '[st_af id="'.$GLOBALS[$myafs].'"]';
		echo '<div class="rankid'.$i.'">'.do_shortcode("$myafsc_id").'</div>';
		$myafs_no = 1;
	}
}
//通常のランキングを表示
if( $myafs_no !== '' ): //ショートコードのランキングが1つでもあれば
	echo do_shortcode( '[rank]' );
else: //ショートコードのランキングが1つもなければアイコンを分ける
	echo '<div class="rankid1">'.do_shortcode( '[rank1]' ).'</div>';
	echo '<div class="rankid2">'.do_shortcode( '[rank2]' ).'</div>';
	echo '<div class="rankid3">'.do_shortcode( '[rank3]' ).'</div>';
endif;
