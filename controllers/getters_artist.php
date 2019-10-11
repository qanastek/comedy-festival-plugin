<?php

/*
* ------------------- ARTISTS -------------------
*/

/**
 * Getter for artist URL image
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| The full URL
 */
function get_image_url_artist($post_id)
{
    $url = get_the_post_thumbnail_url( $post = $post_id, $size = 'post-thumbnail' );

    if ($url)
	{
		return $url;
	}
	else
	{
		return null;
	}
}

/**
 * Getter for artist name
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| name
 */
function get_nom_artist($post_id)
{
    return get_post_meta( $post_id, '_nom_artiste', true );
}

/**
 * Getter for artist date of show
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| Date with a EU date format
 */
function get_date_artist($post_id)
{
    $date = get_post_meta( $post_id, '_date_artiste', true );
    $date = date_i18n( get_option( 'date_format' ), strtotime($date) );

    return $date;
}

/**
 * Getter for artist statut
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| Value oui / non
 */
function get_statut_artist($post_id)
{
    return get_post_meta( $post_id, '_statut_artiste', true);
}