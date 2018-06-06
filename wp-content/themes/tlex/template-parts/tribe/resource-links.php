<?php 
    $text = get_sub_field('link', $id)['title'];
    $href = get_sub_field('link', $id)['url'];
    echo '<li><a href="'.$href.'">' . $text . '</a></li>';
?>