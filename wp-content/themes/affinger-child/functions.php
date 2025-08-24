<?php
if ( !defined( 'ABSPATH' ) ) {
exit;
}

if ( !function_exists( 'st_chiled_js_enqueue_scripts' ) ) {
    function st_chiled_js_enqueue_scripts() {
        // wp_head()で読み込むJavaScriptファイル
        wp_enqueue_script('st-theme-head-js', get_stylesheet_directory_uri() . '/js/st_wp_head.js', array(), false, false);
        // wp_footer()で読み込むJavaScriptファイル
        wp_enqueue_script('st-theme-footer-js', get_stylesheet_directory_uri() . '/js/st_wp_footer.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'st_chiled_js_enqueue_scripts');

//PCでのみ表示するコンテンツ
function if_is_pc($atts, $content = null )
{
$content = do_shortcode( $content);
    if(!wp_is_mobile())
        {
        return $content;
        }
}
add_shortcode('pc', 'if_is_pc');
//スマートフォン・タブレットでのみ表示するコンテンツ
function if_is_nopc($atts, $content = null )
{
$content = do_shortcode( $content);
    if(wp_is_mobile())
        {
        return $content;
        }
}
add_shortcode('nopc', 'if_is_nopc');
