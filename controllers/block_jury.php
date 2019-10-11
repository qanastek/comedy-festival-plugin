<?php

/*
*   Register a block
*/
function register_block_jury() {
    
    wp_register_script(
        'block_jury',
        plugins_url( '../block_jury.js', __FILE__ ),
        array(
            'wp-blocks',
            'wp-element',
            'wp-editor',
        ),
        filemtime( plugin_dir_path( __FILE__ ) . '../block_jury.js' )
    );
 
    register_block_type(
        'comedy-festival/jury',
        array(
            'style'         => 'gutenberg-front-end-css',
            'editor_style'  => 'gutenberg-editor-css',
            'editor_script' => 'block_jury',
        )
    );
 
}
add_action( 'init', 'register_block_jury' );