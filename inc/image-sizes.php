<?php
function add_custom_sizes() {
	// Team Photos
	add_image_size( 'post-card', 680, 680, true );
	add_image_size( 'blog-banner', 3200, 944, true );
}
add_action('after_setup_theme','add_custom_sizes');