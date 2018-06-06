<?php

add_action( 'wp_ajax_tlex_state_search', 'tlex_state_search' );
add_action( 'wp_ajax_no_priv_tlex_state_search', 'tlex_state_search' );


function tlex_ajax_get_resource_links() {
    $text = get_sub_field('link')['title'];
    $href = get_sub_field('link')['url'];
    return '<li><a href="'.$href.'">' . $text . '</a></li>';
}

function tlex_ajax_get_resource_list() {
    $response = '';
    if( get_sub_field('resourcelist_subheadline') ):
        $response .= '<h5>' . get_sub_field('resourcelist_subheadline') . '</h5>';
    endif;

    if ( have_rows('links') ) {
        $response .= '<ul>';
        while ( have_rows('links') ) { 
            the_row();

            $response .= tlex_ajax_get_resource_links();
        }
        $response .= '</ul>';
    }

    return $response;
}

function tlex_ajax_get_resource_section() {
    $response .= '<div>';
    $response .= '<h3>'. get_sub_field('resource_headline') .'</h3>';
    if ( have_rows('resource_list') ) {
        while ( have_rows('resource_list') ) { 
            the_row();
            $response .= tlex_ajax_get_resource_list();
        }
    }

    $response .= '</div>';
    return $response;
}

function tlex_ajax_get_resources($term) {
    $response = '';
    if ( have_rows('resource_sections', $term) ) {
        $resource_section_id = 0;
        $response .= '<div class="tlex-card-grid">';
        while ( have_rows('resource_sections', $term) ) { 
            the_row();
            set_query_var( 'resource_section_id', $resource_section_id );
            $response .= tlex_ajax_get_resource_section(); 
            $resource_section_id++;
        }
        $response .= '</div>';
    }
    return $response;
}

function tlex_state_search() {
    $state = $_POST['state'];
    $state = str_replace(" ", "-", $state);
    $term = get_term_by('slug', $state, 'state');
    $response = '<div>';

    if($term) {
        $response .= '<h2><a href="'. get_term_link($term->term_id).'">' .$term->name . '</a></h2>';
        $response .= '<h6>Tribes: ' . $term->count .'</h6><br/>';
    } else {
        $response .= '<h3>Our Apologies</h4><h6>We could not find any information associated with the state you clicked on.';
    }

    $response .= tlex_ajax_get_resources($term);

    $response .= '<a class="btn btn-primary btn-full" href="'. get_term_link($term->term_id)."\">View " . $term->name . '</a>';

    $response .= '</div>';

    echo $response;

	wp_die(); // this is required to terminate immediately and return a proper response
}