<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLEX
 */

get_header();
?>
	<?php get_template_part( 'template-parts/jumbotron'); ?>

	<div class="breadcrumb-wrapper">
		<div class="container">
			<?php the_breadcrumb(); ?>
		</div>
	</div>

	<div id="primary" class="container content-area">
		<main id="main" class="site-main">
		
		<?php
			$term = get_queried_object();
			if ( have_rows('resource_sections', $term) ) {
				$resource_section_id = 0;
				echo '<div class="tlex-card-grid">';
				echo '<div class="row">';
				while ( have_rows('resource_sections', $term) ) { 
					the_row();
					set_query_var( 'resource_section_id', $resource_section_id );
					get_template_part( 'template-parts/tribe/resource', 'section'); 
					$resource_section_id++;
				}
				echo '</div></div>';
			}
		?>
		
		</main><!-- #main -->

		<?php 
			get_sidebar();
		?>
	</div><!-- #primary -->

<?php
get_footer();
