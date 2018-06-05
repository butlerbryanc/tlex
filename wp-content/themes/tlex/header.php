<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TLEX
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-md">
			<div class="container">

				<div class="tlex-table">
					<div class="tlex-table-cell">

						<div class="navbar-brand">
							<a href="<?php echo get_home_url(); ?>" class="navbar-logo">
								<?php  
									echo tlex_get_main_logo();
								?>
							</a>
							<a class="navbar-caption" href="<?php echo get_home_url(); ?>">TLEX</a>
						</div>

					</div>
					<div class="tlex-table-cell">

						<button class="navbar-toggler float-right d-md-none" type="button" data-toggle="collapse" data-target="#primary-menu">
							<div class="hamburger-icon"></div>
						</button>

						<?php
							wp_nav_menu( array(
								'container'		 => false,
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'	 => 'navbar-collapse collapse float-right nav navbar-toggleable-sm',
								'walker'		 => new Tlex_Nav_Walker
							));
							?>
						<button class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#primary-menu">
							<div class="close-icon"></div>
						</button>

					</div>
				</div>

			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
