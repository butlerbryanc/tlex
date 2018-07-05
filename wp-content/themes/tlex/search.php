<?php
/**
 * The template for displaying search results page
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
		
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'tlex' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<ul>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile; ?>
			</ul>

			<div class="navigation">
				<?php if( get_previous_posts_link() ): ?>
					<div class="align-left"><?php previous_posts_link( '&laquo; Prev' ); ?></div>
				<?php endif; ?>
				<?php if( get_next_posts_link() ): ?>
					<div class="align-right"><?php next_posts_link( 'Next &raquo;', '' ); ?></div>
				<?php endif; ?>
			</div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
		</main><!-- #main -->

		<?php 
			get_sidebar();
		?>
	</div><!-- #primary -->

<?php
get_footer();
