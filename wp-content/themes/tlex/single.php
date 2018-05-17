<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TLEX
 */

get_header();
?>

	<?php
		if(get_field('banner')) {
			get_template_part( 'template-parts/jumbotron'); 	
		}
	?>
	
	<div class="breadcrumb-wrapper">
		<div class="container">
			<?php the_breadcrumb(); ?>
		</div>
	</div>

	<div id="primary" class="content-area container">

		<main id="main" class="site-main">

		<?php
		if ( have_rows('resource_sections') ) {
			$resource_section_id = 0;
			echo '<div class="container resource-wrapper">';
			echo '<div class="row">';
			while ( have_rows('resource_sections') ) { 
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
