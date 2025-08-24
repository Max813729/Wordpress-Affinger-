<?php
/**
 * モバイルロゴ
 */

// サイト名表示チェック
$site_name = st_header_sitetitle();
// ロゴ画像
$site_logo = st_header_logo();
$size = st_get_image_size($site_logo);
?>

<div id="st-mobile-logo">

	<?php if( ! st_header_catchphrase() ): //キャッチフレーズが非表示の場合 ?>
		<!-- ロゴ又はブログ名 -->
        <?php if( $site_name ): //サイト名非表示でなければ ?>
			<?php if ( is_front_page() ): ?>
 				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></h1>
			<?php else: //下層ページ ?>
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></p>
            <?php endif; ?>
        <?php endif; ?>

	<?php elseif( ! $site_name ): //サイト名が非表示の場合 ?>

		<!-- ロゴ又はブログ名 -->
		<?php if ( is_front_page() ): ?>
 			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'description' ); ?></a></h1>
		<?php else: //下層ページ ?>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'description' ); ?></a></p>
		<?php endif; ?>

    <?php else: //キャッチフレーズあり ?>

        <?php if(trim($GLOBALS['stdata127']) !== ''): //サイト名とキャッチフレーズを反対に ?>

			<?php if(trim($GLOBALS['stdata209']) === ''): //h1タグをキャッチフレーズに（デフォルト） ?>

				<!-- ロゴ又はブログ名 -->
        		<?php if( $site_name ): //サイト名非表示でなければ ?>
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></p>
				<?php endif; ?>
          		<!-- ロゴ又はブログ名ここまで -->

           		<!-- キャプション -->
           		<?php if ( is_front_page() ): ?>
					<h1 class="descr">
						<?php bloginfo( 'description' ); ?>
					</h1>
           		 <?php else: ?>
					<p class="descr">
						<?php bloginfo( 'description' ); ?>
					</p>
				<?php endif; ?>

			<?php else: //h1タグをキャッチフレーズに ?>

				<!-- ロゴ又はブログ名 -->
        		<?php if( $site_name ): //サイト名非表示でなければ ?>
					<?php if ( is_front_page() ): ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></h1>
           			<?php else: ?>
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></p>
					<?php endif; ?>
				<?php endif; ?>
           		<!-- ロゴ又はブログ名ここまで -->

           		<!-- キャプション -->
				<p class="descr">
					<?php bloginfo( 'description' ); ?>
				</p>
			<?php endif; //h1タグをキャッチフレーズに ?>

		<?php else: //サイト名とキャッチフレーズを反対に ?>

			<?php if(trim($GLOBALS['stdata209']) === ''): //h1タグをキャッチフレーズに ?>

				<!-- キャプション -->
				<?php if ( is_front_page() ): ?>
					<h1 class="descr sitenametop">
             	       	<?php bloginfo( 'description' ); ?>
             	   	</h1>
				<?php else: ?>
              	 	 <p class="descr sitenametop">
               	    	<?php bloginfo( 'description' ); ?>
               		 </p>
				<?php endif; ?>

				<!-- ロゴ又はブログ名 -->
        		<?php if( $site_name ): //サイト名非表示でなければ ?>
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></p>
				<?php endif; ?>
				<!-- ロゴ又はブログ名ここまで -->

			<?php else: //h1タグをサイト名に ?>

 				<!-- キャプション -->
             	<p class="descr sitenametop">
					<?php bloginfo( 'description' ); ?>
  				</p>

 				<!-- ロゴ又はブログ名 -->
       			<?php if( $site_name ): //サイト名非表示でなければ ?>
					<?php if ( is_front_page() ): ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></h1>
					<?php else: ?>
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php echo st_image_size_output($site_logo); // ロゴ ?></a></p>
					<?php endif; ?>
				<?php endif; ?>
				<!-- ロゴ又はブログ名ここまで -->

			<?php endif; //h1タグをサイト名に ?>

		<?php endif; //サイト名とキャッチフレーズを反対に ?>

    <?php endif; //キャッチフレーズあり ?>
</div>
