<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLEX
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_rows('sections') ) {
			$section_id = 0;
			while ( have_rows('sections') ) { 
				the_row();
				set_query_var( 'section_id', $section_id );
				
				$layout = get_row_layout();
			
				echo '<section id="content-section-' . $section_id . '">';
				get_template_part( 'template-parts/' . $layout ); 
				echo '</section>';

			  $section_id++;
			}
		  }
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
