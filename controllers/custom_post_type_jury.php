<?php

/*
*   My custom post type
*/
function jury_custom_post_type()
{
    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels_jury = array(
        // Le nom au pluriel
        'name'                => _x( 'Jurés', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( 'Juré', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( 'Jurés'),
        // Les différents libellés de l'administration
        'all_items'           => __( 'Tous les jurés'),
        'view_item'           => __( 'Voir les jurés'),
        'add_new_item'        => __( 'Ajouter un nouveau juré'),
        'add_new'             => __( 'Ajouter un juré'),
        'edit_item'           => __( 'Editer un juré'),
        'update_item'         => __( 'Modifier un juré'),
        'search_items'        => __( 'Rechercher un juré'),
        'not_found'           => __( 'Non trouvée'),
        'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
    );
    
    // On peut définir ici d'autres options pour notre custom post type
    $args_jury = array(
        'label'               => __( 'Liste des jurés'),
        'description'         => __( 'Tous les jurés'),
        'labels'              => $labels_jury,
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
        'rewrite'             => array( 'slug' => 'jury'),
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 7,

    );
    
    // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
    register_post_type( 'jury', $args_jury );

}
add_action( 'init', 'jury_custom_post_type', 0 );

/*
*   Remplace les labels des colonnes
*
*   manage_{$post_type}_posts_columns
*   https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns
*/
function colomns_jury($columns)
{
    return array(
        'cb' => '<input type="checkbox" />',
        'image_jury' => __('Image'),
        'name_jury' => __('Nom et Prénom'),
        'job_jury' => __('Profession'),
        'statut_jury' => __('Afficher'),
    );
}
add_filter('manage_jury_posts_columns' , 'colomns_jury');

/*
*   Les affichages de cette table
*
*   manage_{$post_type}_posts_custom_column
*   https://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
*/
add_action( 'manage_jury_posts_custom_column' , 'custom_columns_jury', 10, 2 );
function custom_columns_jury( $column, $post_id )
{
    switch ($column)
    {
        case 'image_jury':

            $url = get_image_url_jury($post_id);

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

        case 'name_jury':

            $name = get_nom_jury($post_id);

            if ($name)
            {
                echo $name;
            }
            else
            {
                echo __('Vide');
            }

            break;

        case 'job_jury':

            $job = get_job_jury($post_id);

            if ($job)
            {
                echo $job;
            }
            else
            {
                echo __('Vide');
            }

            break;

        case 'statut_jury':

            $statut = get_statut_jury($post_id);

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