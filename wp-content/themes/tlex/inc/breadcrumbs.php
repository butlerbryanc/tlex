<?php
function the_taxonomy() {
	$queried_object = get_queried_object();
	if($queried_object->term_id ) {
		$term = $queried_object;
		if($term->parent != 0) {
			echo "<li><a href=\"". get_term_link($term->parent)."\">" . get_term_by('id', $term->parent, 'state')->name . "</a></li>";
		}
		echo "<li><a href=\"". get_term_link($term->term_id)."\">" .$term->name . "</a></li>";
	} else {
		$terms = get_the_terms( $post->ID , 'state' );
		foreach ( $terms as $term ) {
			echo "<li><a href=\"". get_term_link($term)."\">" .$term->name . "</a></li>";
		}
	}
	
}

function the_breadcrumb() {
		echo '<ul class="breadcrumb">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo '<i class="fas fa-home"></i>';
		echo "</a></li>";
		if (is_archive() || is_single()) {
			the_taxonomy();
			if (is_single()) {
				echo "</li><li><a href='". get_the_permalink() ."'>";
				the_title();
				echo '</a></li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}
?>