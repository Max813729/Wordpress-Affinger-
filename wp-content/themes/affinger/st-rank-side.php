<?php
	if ( trim( $GLOBALS["myaf0c"] ) !== '' ) {
		if ( trim( stripslashes( $GLOBALS["myaf"] ) ) !== '' ) {
			echo '<h4 class="rankh3">' . st_esc_html_i( stripslashes( $GLOBALS["myaf"] ) ) . '</h4>';
		}

		//ショートコードのランキングを表示
			$myafs_no = '';
			for($i = 1; $i<11 ; $i++ ){
			$myafs = 'myafsc'.$i;
			if ( trim( $GLOBALS[$myafs] ) !== '' ) {
				$myafsc = '[st_af id="'.$GLOBALS[$myafs].'"]';
				echo '<div class="rankid'.$i.'">'.do_shortcode("$myafsc").'</div>';
				$myafs_no = 1;
			}
		}
		//通常のランキングを表示
		if( $myafs_no !== '' ): //ショートコードのランキングが1つでもあれば
			echo do_shortcode( '[rank]' ); //ボタンと説明非表示にする場合はrank-side
		else: //ショートコードのランキングが1つもなければアイコンを分ける
			echo '<div class="rankid1">'.do_shortcode( '[rank1]' ).'</div>';
			echo '<div class="rankid2">'.do_shortcode( '[rank2]' ).'</div>';
			echo '<div class="rankid3">'.do_shortcode( '[rank3]' ).'</div>';
		endif;
	}
