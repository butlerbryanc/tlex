<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package TLEX
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tlex_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'tlex_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tlex_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'tlex_pingback_header' );

/**
 * Checks if post has a parent category
 */
function tlex_has_parent() {
	$categories = get_the_category();
	foreach( $categories as $category ):
		if($category->parent !== 0) {
			return $category->parent;
		}
	endforeach;
	return false;
}

function tlex_get_subregion_links($cat) {
	$output = '<h3><a href="' . get_term_link($cat->term_id) . '">'. $cat->name .'\'s</a> Regions</h3>';

	$args = array(
		'parent' => $cat->term_id, 
		'taxonomy' => 'category',
		'orderby' => 'title' 
	);
	$sidebar_array = get_terms( $args );
	$output .= '<ul>';
	foreach($sidebar_array as $item) {
		$output .= '<li>';
		$output .= '<a href="' . get_term_link($item->term_id) . '">';
		$output .= $item->name;
		$output .= '</a></li>';
	}
	$output .= '</ul>';
	return $output;
}

function tlex_get_tribe_links($cat) {
	$output = '<h3>Tribes in ' . $cat->name .'</h3>';

	$args = array('category' => $cat->term_id, 'orderby' => 'title');
	$sidebar_array = get_posts( $args );
	$output .= '<ul>';
	foreach($sidebar_array as $item) {
		$output .= '<li>';
		$output .= '<a href="' . get_permalink($item->id) . '">';
		$output .= $item->post_title;
		$output .= '</a></li>';
	}
	$output .= '</ul>';
	return $output;
}

function tlex_tribes_sidebar_nav() { 
	$cat = tlex_has_parent();
	if( $cat ) {
		$output = tlex_get_subregion_links(get_term($cat));
	} else {
		$categories = get_the_category();
		foreach( $categories as $category ):
			$output .= tlex_get_tribe_links($category);
		endforeach;
	}
	return $output;
}

