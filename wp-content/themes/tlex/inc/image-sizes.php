<?php
//-----------------------------------------------------------------------------------
// Custom Image Sizes
// add_image_size( string $name, int $width, int $height, bool|array $crop = false )
//-----------------------------------------------------------------------------------

add_image_size( 'banner-xl', 1600, 1200, array('center', 'center') );
add_image_size( 'banner-lg', 1200, 800, array('center', 'center') );
add_image_size( 'banner-md', 800, 533, array('center', 'center') );
add_image_size( 'banner-sm', 600, 400, array('center', 'center') );

add_image_size( 'jumbotron-xl', 1600, 1200, array('center', 'top') );
add_image_size( 'jumbotron-lg', 1200, 800, array('center', 'top') );
add_image_size( 'jumbotron-md', 800, 533, array('center', 'top') );
add_image_size( 'jumbotron-sm', 425, 850, array('center', 'top') );




