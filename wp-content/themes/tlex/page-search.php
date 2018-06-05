<?php
/**
 * Template Name: US Search Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLEX
 * 
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div id="state-search-wrapper" class="container">
                <?php get_template_part( 'template-parts/search', 'svg'); ?>
                <div id="state-info">
                    <h2>Tribes by State</h2>
                    <div id="states-container">
                    </div>
                </div>
                <div id="state-tooltip" class="tooltip"></div>
            </div>  
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
