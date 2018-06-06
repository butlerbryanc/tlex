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
		
		<div class="hero" style="background-image: url('https://images.unsplash.com/photo-1445262801997-d50c1f12cb4d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1c5eea68b09b03659193401c54300ac7&auto=format&fit=crop&w=1950&q=80')">
			<div class="hero-overlay">
				<div class="position-relative overflow-hidden p-3 p-md-5 text-center" >
					<div class="col-md-8 p-lg-5 mx-auto my-5">
						<h1 class="display-4 font-weight-normal">Tribal Law Exchange</h1>
						<p></p>
						<!-- <p class="lead font-weight-normal">The TLEX Online Library is a searchable collection of legal materials related to American Indian tribal justice systems. The library contains tribal case law, constitutions, and codes, and charters, as well as federal and state statues and case law affecting individual indians and tribal governments. </p> -->
						<button type="button" class="btn btn-primary">BROWSE THE LIBRARY</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid search">

			<?php 
				get_search_form( true );
			?>
		</div>
		<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">About</h2>
					<p class="lead">The TLEX Online Library is a searchable collection of legal materials related to American Indian tribal justice systems. The library contains tribal case law, constitutions, and codes, and charters, as well as federal and state statues and case law affecting individual indians and tribal governments.</p>
					<button type="button" class="btn btn-dark">Learn More</button>
        </div>
      </div>
      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Browse</h2>
					<p class="lead">Search the Library by State.</p>
					<img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/H1N1_USA_Map.svg" />
        </div>
      </div>
    </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
