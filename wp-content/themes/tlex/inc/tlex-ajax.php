<?php

add_action( 'wp_ajax_tlex_state_search', 'tlex_state_search' );
add_action( 'wp_ajax_no_priv_tlex_state_search', 'tlex_state_search' );

function tlex_state_search() {
    $state = $_POST['state'];
    $state = str_replace(" ", "-", $state);
    $term = get_term_by('slug', $state, 'state');

    echo $term->name;

	wp_die(); // this is required to terminate immediately and return a proper response
}