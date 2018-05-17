<?php 

    if( get_sub_field('resourcelist_subheadline') ):
        echo '<h5>' . get_sub_field('resourcelist_subheadline') . '</h5>';
    endif;

    if ( have_rows('links') ) {
        echo '<ul>';
        while ( have_rows('links') ) { 
            the_row();

            get_template_part( 'template-parts/tribe/resource', 'links'); 
        }
        echo '</ul>';
    }
?>