<?php
// Register Custom Taxonomy
function register_state_taxonomy() {

	$labels = array(
		'name'                       => _x( 'States', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'State', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'States', 'text_domain' ),
		'all_items'                  => __( 'All States', 'text_domain' ),
		'parent_item'                => __( 'Parent State', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent State:', 'text_domain' ),
		'new_item_name'              => __( 'New State Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New State', 'text_domain' ),
		'edit_item'                  => __( 'Edit State', 'text_domain' ),
		'update_item'                => __( 'Update States]', 'text_domain' ),
		'view_item'                  => __( 'View State', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate States with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove States', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular States', 'text_domain' ),
		'search_items'               => __( 'Search States', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No States', 'text_domain' ),
		'items_list'                 => __( 'States list', 'text_domain' ),
		'items_list_navigation'      => __( 'States list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => array( 'slug' => 'state', 'hierarchical' => true )
	);
	register_taxonomy( 'state', array( 'post' ), $args );

}
add_action( 'init', 'register_state_taxonomy', 0 );

// add_filter('post_link', 'state_permalink', 10, 3);
// add_filter('post_type_link', 'state_permalink', 10, 3);
// function state_permalink($permalink, $post_id, $leavename) {
//   if (strpos($permalink, '%state%') === FALSE) return $permalink;

//   // Get post
//   $post = get_post($post_id);
//   if (!$post || $post->post_type != 'post') return $permalink;

//   // Get taxonomy terms
//   $terms = wp_get_object_terms($post->ID, 'state');
//   if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) {
//      $taxonomy_slug = $terms[0]->slug;
//      if(is_object($terms[1])) {
//        $taxonomy_slug .= "/" . $terms[1]->slug;
//      }
//   } else {
//     $taxonomy_slug = 'other';
//   }

//   return str_replace('%state%', $taxonomy_slug, $permalink);
// }