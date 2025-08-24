<?php
/**
 * [st-catgroup] の投稿一覧。
 *
 * @var WP_Query $cat_group_query WP_Query 投稿の WP_Post オブジェクト
 * @var array<string, mixed> $attributes 正規化済み設定
 */

// 関連記事チイランの見出しを表示する場合ははずす
// $kanren_title = trim( stripslashes( get_option( 'st-data63', '' ) ) ); // 関連記事一覧の見出し
// $kanren_title = ( $kanren_title !== '' ) ? $kanren_title : '関連記事';

$hide_thumbnail = (bool) trim( get_option( 'st-data5', '' ) );

$vars = array(
	'query' => $cat_group_query,
);

$amp = amp_is_amp() ? 'amp' : null;
?>

<?php if ( false ): // 関連記事チイランの見出しを表示する場合ははずす ?>
	<h4 class='point'><span class='point-in'><?php echo esc_html( $kanren_title ); ?></span></h4>
<?php endif; ?>

<?php
if ( $hide_thumbnail ) {
	st_get_template_part( 'st-shortcode-kanren-thumbnail-off', $amp, $vars );
} else {
	st_get_template_part( 'st-shortcode-kanren-thumbnail-on', $amp, $vars );
}
