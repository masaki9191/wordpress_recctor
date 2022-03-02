<?php

//サムネイル
add_theme_support('post-thumbnails'); 
add_filter('jpeg_quality', function($arg){return 100;});

if (function_exists('add_theme_support')) {
add_theme_support('post-thumbnails');
add_image_size( 'pc_single_thumbnails', 800, 500, true );
add_image_size( 'pc_list_thumbnails', 608, 380, true );
add_image_size( 'main_thumbnails', 480, 300, true );
add_image_size( 'mobile_list_thumbnails', 240, 180, true );
}

function new_excerpt_more( $more ) {
	return ' ...<span class="mc">Read More</span>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

?>