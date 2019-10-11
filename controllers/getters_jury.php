<?php

/*
* ------------------- JURY -------------------
*/

/**
 * Getter for jury URL image
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| The full URL
 */
function get_image_url_jury($post_id)
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
 * Getter for jury name
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| name
 */
function get_nom_jury($post_id)
{
    return get_post_meta( $post_id, '_nom_jury', true );
}

/**
 * Getter for jury job
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| Job description
 */
function get_job_jury($post_id)
{
    return get_post_meta( $post_id, '_job_jury', true );
}

/**
 * Getter for jury statut
 *	@param 	{integer} | post_id | The ID of the post
 *	@return {string}  | 		| Value oui / non
 */
function get_statut_jury($post_id)
{
    return get_post_meta( $post_id, '_statut_jury', true);
}