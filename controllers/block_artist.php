<?php

/*
*   Register a block
*/
function register_block_artists() {
    
    wp_register_script(
        'block_artists',
        plugins_url( '../block.js', __FILE__ ),
        array(
            'wp-blocks',
            'wp-element',
            'wp-editor',
        ),
        filemtime( plugin_dir_path( __FILE__ ) . '../block.js' )
    );
 
    register_block_type(
        'comedy-festival/artists',
        array(
            'style'         => 'gutenberg-front-end-css',
            'editor_style'  => 'gutenberg-editor-css',
            'editor_script' => 'block_artists',
        )
    );
 
}
add_action( 'init', 'register_block_artists' );