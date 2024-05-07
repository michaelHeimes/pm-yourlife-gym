<?php

function register_acf_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Block: Accordion'),
            'description'       => __('Block: Accordion'),
            'render_template'   => 'template-parts/blocks/accordion.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'custom', 'block', 'accordion', 'pmi' ),
        ));
        
        acf_register_block_type(array(
            'name'              => 'button-group',
            'title'             => __('Block: Button Group'),
            'description'       => __('Block: Button Group'),
            'render_template'   => 'template-parts/blocks/button-group.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'custom', 'block', 'button', 'buttons', 'group', 'pmi' ),
        ));
        
        acf_register_block_type(array(
            'name'              => 'testimonial-slider',
            'title'             => __('Block: Testimonial Slider'),
            'description'       => __('Block: Testimonial Slider'),
            'render_template'   => 'template-parts/blocks/testimonial-slider.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'custom', 'block', 'testimonial', 'slider', 'pmi' ),
        ));
        
        
    }
        
}

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}