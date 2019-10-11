<?php

/*
*   Ajout d'une metabox qui contiendras, les informations suivantes au sujet des artistes:
*       -   Nom et Prénom
*       -   Date de passage au spectacle
*       -   Une image le représentant
*/
function informations_artists()
{
    // Où est-ce-qu'il va s'afficher
    $screens = [
        'artist'
    ];

    foreach ($screens as $screen) {
        add_meta_box(
            'info_people',                  // Unique ID
            'Informations des artistes',    // Box title
            'callback_informations',                // Content callback, must be of type callable
            $screen                         // Post type
        );
    }
}
add_action('add_meta_boxes', 'informations_artists');

/*
*   Callback qui contiendras les fields
*/
function callback_informations($post)
{

    ?>

    <label for="name_people">
        Nom et Prénom :
    </label>

    <input
        type="text"
        id="name_people"
        name="name_people"
        value="<?php echo get_post_meta( $post->ID, '_nom_artiste', true ); ?>"
        minlength="6"
        maxlength="30"
        size="20"
        required
    >
    
    <br>

    <label for="date_people">
        Date de représentation :
    </label>

    <input
        type="date"
        id="date_people"
        value="<?php echo get_post_meta( $post->ID, '_date_artiste', true ); ?>"
        name="date_people"
        size="20"
        required
    >

    <br>

    <label for="statut_people">
        Visible dans la liste des artistes :
    </label>

    <input
        required
        type="radio"
        id="statut_people"
        name="statut_people"
        value="oui"
        <?php
            if(get_post_meta( $post->ID, '_statut_artiste', true ) === 'oui')
            {
                echo 'checked';
            }
        ?>
    > Oui

    <input
        type="radio"
        id="statut_people"
        name="statut_people"
        value="non"
        <?php
            if(get_post_meta( $post->ID, '_statut_artiste', true ) === 'non')
            {
                echo 'checked';
            }
        ?>
    > Non

    <?php
}

// Save du field
function save_informations_artists($post_id)
{
    // Si ont reçoit bien les deux champs dans la mise à jour du post
    if (
        array_key_exists('name_people', $_POST) &&
        array_key_exists('date_people', $_POST)   
    )
    {
        // Alors ont le mets à jour
        update_post_meta(
            $post_id,
            '_nom_artiste',
            $_POST['name_people']
        );

        update_post_meta(
            $post_id,
            '_date_artiste',
            $_POST['date_people']
        );

        update_post_meta(
            $post_id,
            '_statut_artiste',
            $_POST['statut_people']
        );
    }
}
add_action('save_post', 'save_informations_artists');