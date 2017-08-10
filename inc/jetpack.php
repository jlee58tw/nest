<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function nest_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'nest_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function nest_jetpack_setup
add_action( 'after_setup_theme', 'nest_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function nest_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function nest_infinite_scroll_render
