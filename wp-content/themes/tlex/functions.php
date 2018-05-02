<?php
/**
 * TLEX functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TLEX
 */

/**
 * Enqueue scripts and styles.
 */
function tlex_scripts() {
	wp_enqueue_style( 'tlex-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tlex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tlex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tlex_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Remove Admin Menu Buttons
 */
function remove_menus(){
  
//   remove_menu_page( 'index.php' );                  //Dashboard
//   remove_menu_page( 'jetpack' );                    //Jetpack* 
//   remove_menu_page( 'edit.php' );                   //Posts
//   remove_menu_page( 'upload.php' );                 //Media
//   remove_menu_page( 'edit.php?post_type=page' );    //Pages
//   remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
//   remove_menu_page( 'plugins.php' );                //Plugins
//   remove_menu_page( 'users.php' );                  //Users
//   remove_menu_page( 'tools.php' );                  //Tools
//   remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );

/**
 * Rename Default Posts
 */
function tlex_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Tribes';
    $submenu['edit.php'][5][0] = 'Tribes';
    $submenu['edit.php'][10][0] = 'Add Tribes';
    $submenu['edit.php'][16][0] = 'Tribes Tags';
}
function tlex_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Tribes';
    $labels->singular_name = 'Tribe';
    $labels->add_new = 'Add Tribe';
    $labels->add_new_item = 'Add Tribe';
    $labels->edit_item = 'Edit Tribe';
    $labels->new_item = 'Tribe';
    $labels->view_item = 'View Tribe';
    $labels->search_items = 'Search Tribes';
    $labels->not_found = 'No Tribes found';
    $labels->not_found_in_trash = 'No Tribes found in Trash';
    $labels->all_items = 'All Tribes';
    $labels->menu_name = 'Tribes';
    $labels->name_admin_bar = 'Tribes';
}
 
add_action( 'admin_menu', 'tlex_change_post_label' );
add_action( 'init', 'tlex_change_post_object' );

