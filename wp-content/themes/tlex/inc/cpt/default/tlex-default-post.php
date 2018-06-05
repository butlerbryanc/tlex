<?php
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

    /**
     * Unregister Default Post Taxonomies
     */

    function tlex_unregister_taxonomies() {
        unregister_taxonomy_for_object_type('post_tag', 'post');
        unregister_taxonomy_for_object_type('category', 'post');
    }
    add_action('init', 'tlex_unregister_taxonomies');