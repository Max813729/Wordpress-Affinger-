<?php

// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
     exit;
}

define("WG_MB_FOOTER", "広告・フッター（固定） ※スマホのみ");
// カラーパレット
define("ST_COLOR_PALE_PINK",        "#f78da7");
define("ST_COLOR_SOFT_RED",         "#e92f3d");
define("ST_COLOR_LIGHT_G_RED",      "#fdf0f2");
define("ST_COLOR_VIVID_YELLOW",     "#ffc107");
define("ST_COLOR_VERY_PALE_YELLOW", "#fffde7");
define("ST_COLOR_LIGHT_GREEN_CYAN", "#eefaff");
define("ST_COLOR_PALE_CYAN_BLUE",   "#8ed1fc");
define("ST_COLOR_VIVID_CYAN_BLUE",  "#0693e3");
define("ST_COLOR_VERY_LIGHT_GRAY",  "#fafafa");
define("ST_COLOR_VERY_DARK_GRAY",   "#313131");
define("ST_COLOR_WHITE",            "#ffffff");

// テーマチェック
if ( ! function_exists( 'st_is_ver' ) ) {
	function st_is_ver( $prefix, $ver = null, $operator = null ) {
		$prefix      = strtolower( $prefix ); // 大文字を小文字に変換
		$current_ver = defined( 'AFFINGER_TYPE' ) ? strtolower( AFFINGER_TYPE ) : ''; // テーマの種類（ ST AF EX ）

		if ( strpos( $current_ver, $prefix ) !== 0 ) { // 引数にテーマの種類を含むか
			return false;
		}

		if ( $ver !== null ) {
			$ver      = (string) $ver; // 文字列に変換
			$operator = ( $operator !== null ) ? $operator : '==';
		} else {
			$ver      = '';
			$operator = ( $operator !== null ) ? $operator : '>=';
		}

		return (bool) version_compare( $current_ver, $prefix . $ver, $operator ); // ふたつの "PHP 標準" バージョン番号文字列を比較する
	}
}

if ( ! function_exists( 'st_is_ver_ex' ) ) {
	function st_is_ver_ex( $ver = null, $operator = null ) {
		return st_is_ver( 'EX', $ver, $operator );
	}
}

if ( ! function_exists( 'st_is_ver_af' ) ) {
	function st_is_ver_af( $ver = null, $operator = null ) {
		return st_is_ver( 'AF', $ver, $operator );
	}
}

if ( ! function_exists( 'st_is_ver_st' ) ) {
	function st_is_ver_st( $ver = null, $operator = null ) {
		return st_is_ver( 'ST', $ver, $operator );
	}
}

if ( ! function_exists( 'st_is_ver_ex_af' ) ) {
	function st_is_ver_ex_af( $ex_ver = null, $ex_operator = null, $af_ver = null, $af_operator = null ) {
		return ( st_is_ver_ex( $ex_ver, $ex_operator ) || st_is_ver_af( $af_ver, $af_operator ) );
	}
}

// Bizバージョン
if ( ! function_exists( 'st_is_ver_biz' ) ) {
	function st_is_ver_biz() {
		return false;
	}
}

add_filter('admin_footer_text', 'st_attention_admin_footer');
	function st_attention_admin_footer() {
	  echo '※当商品は「<a href="//on-store.net" rel="nofollow">STINGER STORE</a>」で正規購入されたご本人のみが使用いただけます。';
}

if ( ! function_exists( 'st_version_admin_enqueue_scripts' ) ) {
	function st_version_admin_enqueue_scripts() {
		wp_register_script(
			'st-version',
			get_template_directory_uri() . '/js/st-version.js',
			array( 'jquery' ),
			false,
			true
		);

		wp_enqueue_script( 'st-version' );
	}
}

add_action( 'admin_enqueue_scripts', 'st_version_admin_enqueue_scripts' );
