<?php
/**
 * @package Comedy Festival
 * @version 1.0.0
 */
/*
Plugin Name: Comedy Festival
Description: Comedy Festival est le plugin du thème du même nom.
Author: Labrak Yanis
Version: 1.0.0
*/

/**
 * Enqueue scripts
 */
function LoadBackEndScripts() {   
    wp_enqueue_script(
        'my_custom_script',
        plugin_dir_url( __FILE__ ) . 'assets/js/comedy_festival_script.js',
        array('jquery'),
        '1.0'
    );
}
add_action('admin_enqueue_scripts', 'LoadBackEndScripts');

/*
*	CSS stylesheet for the editor side
*/
wp_register_style(
    'gutenberg-editor-css',
    plugins_url( 'editor.css', __FILE__ ),
    array( 'wp-edit-blocks' ),
    filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
);

/*
*	CSS stylesheet for the front end
*/
wp_register_style(
    'gutenberg-front-end-css',
    plugins_url( 'style.css', __FILE__ ),
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
);

/*
*	Register a category for blocks
*/
function comedy_festival_custom_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'comedy-festival',
                'title' => __( 'Comedy Festival', 'comedy-festival' ),
                'icon'  => '',
            ),
        )
    );
}
add_filter( 'block_categories', 'comedy_festival_custom_block_categories', 10, 2 );

/**
 * Artist
 */

// Custom post type pour les artistes
require plugin_dir_path( __FILE__ ) . 'controllers/custom_post_type_artist.php';

// Champs informations sur les artistes
require plugin_dir_path( __FILE__ ) . 'controllers/field_informations.php';

// Le shortcode pour les artistes
require plugin_dir_path( __FILE__ ) . 'controllers/shortcode_artist.php';

// Block artist
require plugin_dir_path( __FILE__ ) . 'controllers/block_artist.php';

// Getters artistes
require plugin_dir_path( __FILE__ ) . 'controllers/getters_artist.php';

/**
 * Jury
 */

// Custom post type pour les jurés
require plugin_dir_path( __FILE__ ) . 'controllers/custom_post_type_jury.php';

// Champs informations pour le jury
require plugin_dir_path( __FILE__ ) . 'controllers/field_informations_jury.php';

// Le shortcode pour les jurés
require plugin_dir_path( __FILE__ ) . 'controllers/shortcode_jury.php';

// Block jury
require plugin_dir_path( __FILE__ ) . 'controllers/block_jury.php';

// Getters jurés
require plugin_dir_path( __FILE__ ) . 'controllers/getters_jury.php';