<?php

/*
*   Shortcode pour afficher le front end des artistes
*/
function shortcode_artists()
{
    $h = '<div class="container">';

        $h .= '<div class="row profile" style="padding-bottom: 3%;">';

                $query = new WP_Query( array( 'post_type' => 'artist', 'posts_per_page' => '9999' ) );

                while ( $query->have_posts() ) : $query->the_post();

                    $post_id = get_the_ID();

                    // Vérifier si l'artiste doit être afficher ou non
                    if (get_statut_artist($post_id) === "oui")
                    {

                        $h .= "<div class='col-md-3 col-xs-12'>";

                            $h .= "<div class='profile-sidebar'>";

                                $h .= "<div class='profile-userpic'>";

                                    $h .= "<img src='" . get_image_url_artist($post_id) . "' class='img-responsive' style='width: 200px; height:200px; object-fit: cover; overflow: hidden;' alt=''>";

                                $h .= "</div>";

                                $h .= "<div class='profile-usertitle'>";

                                    $h .= "<div class='profile-usertitle-name' style='text-transform: capitalize; font-family: Merriweather, Helvetica Neue, Arial, sans-serif;'>";

                                        $h .= get_nom_artist($post_id );

                                    $h .= "</div>";

                                    $h .= "<div class='profile-usertitle-job' style='text-transform: uppercase; font-family: Merriweather, Helvetica Neue, Arial, sans-serif;'>";

                                        $h .= get_date_artist($post_id);

                                    $h .= "</div>";

                                $h .= "</div>";

                            $h .= "</div>";

                        $h .= "</div>";

                    }

                endwhile;

                wp_reset_query(); 

        $h .= "</div>";

    $h .= '</div>';

    return $h;
}
add_shortcode('artistes', 'shortcode_artists'); 