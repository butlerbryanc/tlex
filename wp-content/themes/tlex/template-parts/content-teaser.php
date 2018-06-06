<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLEX
 */

?>


<div class="row tribe-teaser">
	<div class="col-sm-2">
		<img src="<?php the_post_thumbnail_url('thumbnail'); ?>" />
	</div>
	<div class="col-sm-10">
		<?php
			the_title( '<p><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' );
			$taxonomies = get_the_terms($post->ID, get_queried_object()->taxonomy);
			foreach($taxonomies as $taxonomy):
				echo "<span><a href=\"". get_term_link( $taxonomy->term_id ) . "\">" . $taxonomy->name . "</a></span>";
			endforeach;
		?>
	</div>
</div>
