<?php
/**
 * ヘッダー画像下 カテゴリー記事一覧
 *
 */

$category_a_id   = get_option( 'st-data594', '' ) !== '' ? get_option( 'st-data594' ) : '0';     // カテゴリーID
$post_number     = get_option( 'st-data595', '' ) !== '' ? get_option( 'st-data595' ) : '10';    // 表示数
$post_order      = get_option( 'st-data596', '' ) !== '' ? get_option( 'st-data596' ) : 'desc';  // order
$post_orderby    = get_option( 'st-data597', '' ) !== '' ? get_option( 'st-data597' ) : 'id';    // order by
$cat_child       = get_option( 'st-data598', '' ) !== '' ? 'off' : 'on';                         // 子カテゴリーを除外する
$slides_to_show  = get_option( 'st-data599', '' ) !== '' ? get_option( 'st-data599' ) : '5,3,2'; // slides_to_show
$slide_date      = get_option( 'st-data600', '' ) !== '' ? 'off' : 'on';                         // slide_date
$slide_center    = get_option( 'st-data601', '' ) !== '' ? 'on' : '';      // slide_center
$fullsize_type   = get_option( 'st-data602', '' ) !== '' ? get_option( 'st-data602' ) : 'text';  // fullsize_type
?>

<?php
$tag = '[st-catgroup-header cat="'. $category_a_id .'" page="'. $post_number .'" order="'. $post_order .'" orderby="'. $post_orderby .'" child="'. $cat_child .'" slide="on" slides_to_show="'. $slides_to_show .'" slide_date="'. $slide_date .'" slide_more="ReadMore" slide_center="'. $slide_center .'" fullsize_type="'. $fullsize_type .'"]';

echo do_shortcode( $tag );
?>
