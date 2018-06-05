<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TLEX
 */

?>

	</div><!-- #content -->

	
<!--Footer-->
<footer>
<?php 
	$hero = get_field('footer_background', 'option'); 
?>
<div id="footer-bg">
	<picture>
		<source 
			media="(min-width: 1200px)"
			srcset="<?php echo $hero['sizes']['banner-xl']; ?>">
		<source 
			media="(min-width: 768px)"
			srcset="<?php echo $hero['sizes']['banner-lg']; ?>">
		<source 
			media="(min-width: 576px)"
			srcset="<?php echo $hero['sizes']['banner-md']; ?>">
		<img 
			src="<?php echo $hero['sizes']['banner-sm']; ?>" 
			alt="<?php echo $hero['title']; ?>">
	</picture>
</div>
<!--Footer Links-->
<div class="container text-center text-md-left">
	<div class="row">
		<!--First column-->
		<div class="col-md-4">
			<a href="<?php echo get_home_url(); ?>" class="navbar-logo">
				<?php  
					echo tlex_get_main_logo();
				?>
			</a>
		</div>
		<!--/.First column-->

		<!--Second column-->
		<div class="col-md-3">
			<h5 class="text-uppercase font-weight-bold">Quick Links</h5>
			<?php wp_nav_menu( array(
				'container'		 => false,
				'theme_location' => 'footer',
				'menu_id'        => 'footer-menu',
				'menu_class'	 => 'list-unstyled',
			)); ?>
		</div>
		<!--/.Second column-->

		<!--Third column-->
		<div class="col-md-3 mx-auto">
			<h5 class="text-uppercase font-weight-bold">Contact Us</h5>
			<ul class="list-unstyled">
				<li>
					<a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode(wp_strip_all_tags( get_field('contact_us', 'option')['address'], true )); ?>">
						<?php echo get_field('contact_us', 'option')['address']; ?>
					</a>
				</li>
				<li>
					<a href="mailto:<?php echo get_field('contact_us', 'option')['email'] ?>">
						<?php echo get_field('contact_us', 'option')['email']; ?>
					</a>
				</li>
				<li>
					<a href="tel:<?php echo get_field('contact_us', 'option')['phone'] ?>">
						<?php echo get_field('contact_us', 'option')['phone']; ?>
					</a>
				</li>
			</ul>
		</div>
		<!--/.Third column-->
	</div>
</div>
<!--/.Footer Links-->
<hr>
<!--Copyright-->
<div class="footer-copyright text-center">
	© 2018 Copyright: Tribal Law Exchange. <br/> All rights reserved.
</div>
<!--/.Copyright-->

</footer>
<!--/.Footer-->
				  
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
