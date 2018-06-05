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
	$taxonomies = get_the_terms($post->ID, 'state');
	foreach( $taxonomies as $taxonomy ):
		if($taxonomy->parent !== 0) {
			return $taxonomy->parent;
		}
	endforeach;
	return false;
}

function tlex_get_subregion_links($cat) {
	$output = '<h2><a href="' . get_term_link($cat->term_id) . '">'. $cat->name .'\'s</a> Regions</h2>';

	$args = array(
		'parent' => $cat->term_id, 
		'taxonomy' => 'state',
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
	$output = '<h2>Tribes in ' . $cat->name .'</h2>';

	$args = array(
		'orderby' => 'title',
		'tax_query' => array(array(
			'taxonomy' => $cat->taxonomy,
			'field' => 'slug',
			'terms' => array($cat->slug),
			'operator' => 'IN'
		))
	);
	$sidebar_array = get_posts( $args );
	$output .= '<ul>';
	foreach($sidebar_array as $item) {
		$output .= '<li>';
		$output .= '<a href="' . get_permalink($item->ID) . '">';
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
		$taxonomies = get_the_terms($post->ID, 'state');
		foreach($taxonomies as $taxonomy):
			$output .= tlex_get_tribe_links($taxonomy);
		endforeach;
	}
	return $output;
}

