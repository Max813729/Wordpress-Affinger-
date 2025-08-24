<?php
/**
 * @var St\Plugin\Custom_Search\Plugin\Plugin_Meta $plugin_meta
 * @var St\Plugin\Custom_Search\Search\Search_Query $search_query
 * @var array<string, mixed> $atts
 */

$classes = [];

if ( $atts['layout'] !== '' ) {
	$classes[] = 'st-custom-search-box-' . $atts['layout'];
}

if ( $atts['template'] !== '' ) {
	$classes[] = 'st-custom-search-box-tpl-' . $atts['template'];
} else {
	$classes[] = 'st-custom-search-box-tpl-default';
}

$classes[] = 'st-custom-search-box-cat-' . $atts['cat_mode'];

$classes = array_unique( $classes );
$class   = ( count( $classes ) > 0 ) ? ' ' . implode( ' ', $classes ) : '';
?>

<div class="st-custom-search-box<?php echo esc_attr( $class ); ?>">
	<form class="cs-form" method="get" action="<?php echo esc_url( st_cs_get_search_url() ); ?>">
		<input type="hidden" name="<?php echo esc_attr( st_cs_get_query_var_name( 'keyword' ) ); ?>" value="">

		<div class="cs-order">
			<?php foreach ( st_cs_get_order_by_values() as $label => $value ): ?>
				<div class="cs-order-item">
					<label class="cs-order-label">
						<input class="cs-order-radio" type="radio" name="<?php echo esc_attr( st_cs_get_query_var_name( 'order_by' ) ); ?>"
						       value="<?php echo esc_attr( $value ); ?>"<?php checked( $value, $search_query->order_by() ); ?>>
						<?php echo esc_html( $label ); ?>
					</label>
				</div>
			<?php endforeach; ?>

			<button class="cs-order-button" type="submit">並べ替え</button>
		</div>

		<input type="hidden" name="<?php echo st_cs_get_query_var_name( 'custom_search' ) ?>" value="1">

		<?php if ( ! $atts['show_text_input'] && $search_query->has_keyword() ): ?>
			<input type="hidden" name="<?php echo esc_attr( st_cs_get_query_var_name( 'keyword' ) ); ?>"
			       value="<?php the_search_query(); ?>">
		<?php endif; ?>

		<?php if ( $search_query->has_categories() ): ?>
			<?php foreach ( $search_query->categories() as $category_id ): ?>
				<input type="hidden"
				       name="<?php echo esc_attr( st_cs_get_query_var_name( 'categories' ) ); ?>[]"
				       value="<?php echo esc_attr( $category_id ) ?>">
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if ( $search_query->has_tags() ): ?>
			<?php foreach ( $search_query->tags() as $tag_id ): ?>
				<input type="hidden"
				       name="<?php echo esc_attr( st_cs_get_query_var_name( 'tags' ) ); ?>[]"
				       value="<?php echo esc_attr( $tag_id ) ?>">
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if ( _st_plugin_support_is_enabled( 'ST_CUSTOM_SEARCH', 'st-custom-search' )
		           && _st_plugin_support_version_compare( 'ST_CUSTOM_SEARCH_API_VERSION', '1.1.0', '>=' ) ): ?>
			<?php if ( $search_query->has_operator() ): ?>
				<input type="hidden"
					   name="<?php echo esc_attr( st_cs_get_query_var_name( 'operator' ) ); ?>"
					   value="<?php echo esc_attr( $search_query->operator() ) ?>">
			<?php endif; ?>
		<?php endif; ?>
	</form>
</div>
