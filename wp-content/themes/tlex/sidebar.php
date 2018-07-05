<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TLEX
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php
		dynamic_sidebar( 'sidebar-1' );
	?>
	<?php if(!is_search()): ?>
	<section class="widget related-links">
		<?php 
			echo tlex_tribes_sidebar_nav();
		?>
	</section>
	<?php endif; ?>
</aside><!-- #secondary -->
