<?php

/*
*   My custom post type
*/
function artist_custom_post_type()
{
    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels_artist = array(
        // Le nom au pluriel
        'name'                => _x( 'Artistes', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( 'Artiste', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( 'Artistes'),
        // Les différents libellés de l'administration
        'all_items'           => __( 'Tous les artistes'),
        'view_item'           => __( 'Voir les artistes'),
        'add_new_item'        => __( 'Ajouter nouveau artiste'),
        'add_new'             => __( 'Ajouter un artiste'),
        'edit_item'           => __( 'Editer un artiste'),
        'update_item'         => __( 'Modifier un artiste'),
        'search_items'        => __( 'Rechercher un artiste'),
        'not_found'           => __( 'Non trouvée'),
        'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
    );
    
    // On peut définir ici d'autres options pour notre custom post type
    $args_artist = array(
        'label'               => __( 'Liste des artistes'),
        'description'         => __( 'Tous les artistes'),
        'labels'              => $labels_artist,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports'            => array(
            'thumbnail',
        ),
        /* 
        * Différentes options supplémentaires
        */
        'show_in_rest'        => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => false,
        'rewrite'             => array( 'slug' => 'artist'),
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 6,

    );
    
    // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
    register_post_type( 'artist', $args_artist );

}
add_action( 'init', 'artist_custom_post_type', 0 );

/*
*   Remplace les labels des colonnes
*
*   manage_{$post_type}_posts_columns
*   https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns
*/
function colomns_artist($columns)
{
    return array(
        'cb' => '<input type="checkbox" />',
        'image_artist' => __('Image'),
        'name_artist' => __('Nom et Prénom'),
        'date_artist' => __('Date de passage'),
        'statut_artist' => __('Afficher'),
    );
}
add_filter('manage_artist_posts_columns' , 'colomns_artist');

/*
*   Les affichages de cette table
*
*   manage_{$post_type}_posts_custom_column
*   https://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
*/
add_action( 'manage_artist_posts_custom_column' , 'custom_columns_artist', 10, 2 );
function custom_columns_artist( $column, $post_id )
{
    switch ( $column )
    {
        case 'image_artist':

            $url = get_image_url_artist($post_id);

            if ($url)
            {
                echo (
                    "<img
                        class='ImgArtistWP'
                        src='${url}'
                        style='
                            overflow: hidden;
                            object-fit: cover;
                            height: 150px;
                            width: 50%;
                            border-radius: 50%;'
                    >"
                );
            }
            else
            {
                echo __("Pas d'image");
            }

            break;

        case 'name_artist':

            $name = get_nom_artist($post_id);

            if ($name)
            {
                echo $name;
            }
            else
            {
                echo __('Vide');
            }

            break;

        case 'date_artist':

            $date = get_date_artist($post_id);

            if ($date)
            {
                // Date francaise
                echo $date;
            }
            else
            {
                echo __('Vide');
            }

            break;

        case 'statut_artist':

            $statut = get_statut_artist($post_id);

            if ($statut)
            {
                echo $statut;
            }
            else
            {
                echo 'non';
            }

            break;
    }
}