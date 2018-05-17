<?php 
    $text = get_sub_field('link')['title'];
    $href = get_sub_field('link')['url'];
    echo '<li><a href="'.$href.'">' . $text . '</a></li>';
?>