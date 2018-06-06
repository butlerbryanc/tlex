<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLEX
 */

?>

<div class="col-sm-6 col-lg-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('tlex-card'); ?> style="background-image: url('<?php the_post_thumbnail_url( 'banner-sm' ); ?>')">
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				$taxonomies = get_the_terms($post->ID, get_queried_object()->taxonomy);
				foreach($taxonomies as $taxonomy):
					echo "<h5><a href=\"". get_term_link( $taxonomy->term_id ) . "\">" . $taxonomy->name . "</a></h5>";
				endforeach;
			?>
		</header><!-- .entry-header -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
