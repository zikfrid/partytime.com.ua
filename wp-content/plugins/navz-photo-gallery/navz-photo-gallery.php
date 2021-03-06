<?php
/*
Plugin Name: Advanced Custom Fields: Photo Gallery
Plugin URI: http://www.navz.me/
Description: An extension for Advance Custom Fields which lets you add photo gallery functionality on your websites.
Version: 1.3.0
Author: Navneil Naicker
Author URI: http://www.navz.me/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_photo_gallery') ) :

class acf_plugin_photo_gallery {
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// vars
		$this->settings = array(
			'version'	=> '1.3.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// set text domain
		// https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
		load_plugin_textdomain( 'acf-photo_gallery', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field_types')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field_types')); // v4
		
	}
	
	
	/*
	*  include_field_types
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	n/a
	*/
	
	function include_field_types( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// include
		include_once('fields/acf-photo_gallery-v' . $version . '.php');
		
	}
	
}

// initialize
new acf_plugin_photo_gallery();

// class_exists check
endif;

//Helper function for pulling the images
function acf_photo_gallery($field = null, $post_id){
	$images = get_post_meta($post_id, $field, true);
	$images = explode(',', $images);
	$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post__in' => $images ); 
	$images = get_posts( $args );
	$images = array_filter($images);
	$array = array();
	if( count($images) ):
		foreach($images as $image):
			$title = $image->post_title;
			$content = $image->post_content;
			$full_url = wp_get_attachment_url($image->ID);
			$thumbnail_url = wp_get_attachment_thumb_url($image->ID);
			$url = get_post_meta($image->ID, $field . '_url', true);
			$target = get_post_meta($image->ID, $field . '_target', true);
			$array[] = [
				'title' => $title,
				'caption' => $content,
				'full_image_url' => $full_url,
				'thumbnail_image_url' => $thumbnail_url,
				'url' => $url,
				'target' => $target
			];
		endforeach;
	endif;
	return $array;
}

//Resizes the image
function acf_photo_gallery_resize_image( $img_url, $width = 150, $height = 150){
	if( !function_exists('aq_resize') ){
		require_once( dirname(__FILE__) . '/aq_resizer.php');
	}
	$image = aq_resize( $img_url, $width, $height, true, true, true);
	return $image;
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>