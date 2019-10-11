<?php

/*
*   Shortcode pour afficher le front end des artistes
*/
function shortcode_jury()
{
    $h = '<div class="container">';

        $h .= '<div class="row profile" style="padding-bottom: 3%;">';

                $query = new WP_Query( array( 'post_type' => 'jury', 'posts_per_page' => '9999' ) );

                while ( $query->have_posts() ) : $query->the_post();

                    $post_id = get_the_ID();

                    // Vérifier si l'artiste doit être afficher ou non
                    if (
                        get_statut_jury($post_id)    === "oui" &&
                        get_image_url_jury($post_id) !=  null
                    )
                    {

                        $h .= "<div class='col-md-3 col-xs-12'>";

                            $h .= "<div class='team-members'>";

                                $h .= "<div class='team-avatar'>";

                                    $h .= "<img src='" . get_image_url_jury($post_id) . "' class='img-responsive ArtisteImg' style='width: 100%; object-fit: cover; overflow: hidden; height: 327.5px;' alt='Photo de " . get_nom_jury($post_id ) . "'>";

                                $h .= "</div>";

                                $h .= "<div class='team-desc'>";

                                    $h .= "<p style='text-transform: capitalize; font-family: Merriweather, Helvetica Neue, Arial, sans-serif;'>";

                                        $h .= get_nom_jury($post_id );

                                    $h .= "</p>";

                                    $h .= "<span style='text-transform: uppercase; font-family: Merriweather, Helvetica Neue, Arial, sans-serif;'>";

                                        $h .= get_job_jury($post_id);

                                    $h .= "</span>";

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
add_shortcode('jury', 'shortcode_jury'); 