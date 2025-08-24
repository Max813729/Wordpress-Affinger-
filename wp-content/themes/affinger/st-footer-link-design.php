<?php
/**
 * @var array<string, mixed>|string|object|null $nav_menu_args `wp_nav_menu()` の引数
 */

$nav_menu_args = isset( $nav_menu_args ) ? $nav_menu_args : array();
?>
<?php if ( has_nav_menu( 'primary-menu-side' ) ): // メニューセットあり ?>
	<?php
	$defaults = array(
		'theme_location'  => 'primary-menu-side',
		'container'       => 'div',
		'container_class' => 'footermenubox st-menu-side-box clearfix ',
		'menu_class'      => 'footermenust st-menu-side',
		'depth'           => 1,
	);

	$nav_menu_args = wp_parse_args( $nav_menu_args, $defaults );
	?>

	<?php wp_nav_menu( $nav_menu_args ); ?>
<?php endif; ?>
