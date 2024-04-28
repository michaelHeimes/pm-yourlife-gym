<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'page-banner',
            'title'             => __('Block: Page Banner'),
            'description'       => __('Block: Page Banner'),
            'render_template'   => 'template-parts/blocks/page-banner.php',
            'category'          => 'formatting',
            'icon'              => 'header',
            'keywords'          => array( 'custom', 'block', 'page', 'banner', 'hero' ),
        ));

    }
}
