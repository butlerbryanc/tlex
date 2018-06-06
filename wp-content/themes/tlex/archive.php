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
		
		<div class="tlex-card-grid">
			<div class="row">
			<?php if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'teaser' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>
		</div>
		</main><!-- #main -->

		<?php 
			get_sidebar();
		?>
	</div><!-- #primary -->

<?php
get_footer();
