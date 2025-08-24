<?php
// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
     exit;
}

include_once( ABSPATH . WPINC . '/feed.php' );
$rss_pickup = fetch_feed( 'https://on-store.net/category/pickup/feed' ); // PICK UP ここにURLを入力する
$rss        = fetch_feed( 'https://on-store.net/category/news/feed' );   // ここにURLを入力する

if ( !is_wp_error( $rss_pickup ) ) :
	$maxitems_pickup  = $rss_pickup->get_item_quantity( 1 );
	$rss_items_pickup = $rss_pickup->get_items( 0, $maxitems_pickup );
endif;

if ( !is_wp_error( $rss ) ) :
	$maxitems = $rss->get_item_quantity( 5 );
	$rss_items = $rss->get_items( 0, $maxitems );
endif;
?>
<?php if ( !empty( $maxitems ) ) : ?>
	<ul class="st-news-feed">
	<?php if ($maxitems_pickup == 0) echo '';
else
	$count = 0;
	foreach ( $rss_items_pickup as $item_pickup ) : ?>
		<li class="rss-date">
			<span class="date">
				<?php echo $item_pickup->get_date('Y.m.d');// 日付 ?>
			</span>
			<?php echo '<span class="newmark-pickup">PickUp</span>'; ?>
		</li>
		<li>
			<a href="<?php echo $item_pickup->get_permalink(); ?>" target="_blank" rel="nofollow noopener">
				<?php echo $item_pickup->get_title();// タイトル ?>
			</a>
		</li>
	<?php  $count ++;
		endforeach; ?>

	<?php if ($maxitems == 0) echo '<li>No Data</li>';
else
	$count = 0;
	foreach ( $rss_items as $item ) : ?>
		<li class="rss-date">
			<span class="date">
				<?php echo $item->get_date('Y.m.d');// 日付 ?>
			</span>
			<?php if ( $count === 0 && $item->get_date('Y/m/d') >= date( 'Y/m/d', strtotime( '- 5 day' ) ) ) :
				echo '<span class="newmark-orange">NEW</span>';
			endif; ?>
		</li>
		<li>
			<a href="<?php echo $item->get_permalink(); ?>" target="_blank" rel="nofollow noopener">
				<?php echo $item->get_title();// タイトル ?>
			</a>
		</li>
	<?php  $count ++;
		endforeach; ?>
	</ul>
<?php endif; ?>
<p>
	<a href="//on-store.net/category/news/" target="_blank" rel="nofollow noopener">もっと見る &gt;&gt;</a>
</p>
