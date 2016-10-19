<?php
/**
 * @package Simple_com
 * @version 1.0
 */
/*
Plugin Name: Simple com
Description: This is a plugin that helps a lot to create a basic communication for e-commerce. It accompagnies the company in the creation of an post on Facebook in its facebook's page, and send e-mails to targets.
Author: Jérôme Mogué
Version: 1.0
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* creation of the table key_post_user */

global $create_key_post_user;
$create_key_post_user_version = '1.0';

function create_key_post_user()
{
	global $wpdb;
	global $create_key_post_user_version;

	$table_name = $wpdb->prefix . "key_post_user";
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  time datetime NOT NULL,
  user mediumint(10) NOT NULL,
  used mediumint(9) DEFAULT '0' NOT NULL,
  post mediumint(10) NOT NULL,
  key_user varchar(32) NOT NULL,
  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option('create_key_post_user_version', $create_key_post_user_version);
}

register_activation_hook( __FILE__, 'create_key_post_user' );

/* end key_post_user */

/* creation of the table sold_user */

global $create_sold_user;
$create_sold_user_version = '1.0';

function create_sold_user()
{
	global $wpdb;
	global $create_sold_user_version;

	$table_name = $wpdb->prefix . "sold_user";
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  time datetime NOT NULL,
  user mediumint(10) NOT NULL,
  article mediumint(10) NOT NULL,
  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option('create_sold_version', $create_sold_user_version);
}

register_activation_hook( __FILE__, 'create_sold_user' );

/* end key_post_user */

/* Get data's post */
/* Js to do */
/* end data */

/* place for facebook api */
//include("api_fb.html");
// add_action('wp_insert_post','wp_champs_perso');

// function wp_champs_perso($post_id){
// 	if ( get_post_type($post_id)=='post'){
// 		add_post_meta($post_id, 'champs1', '', true);
// 	}
// 	return true;
// }
function bbx_enqueue_scripts() { wp_enqueue_script( 'jquery' ); } add_action( 'wp_enqueue_scripts', 'bbx_enqueue_scripts' );
include("box_facebook_mail.php");
wp_enqueue_script('simple_com.js', '/wp-content/plugins/simple_com/simple_com.js');


/* end facebook */
add_action('admin_init', 'mail_to_users');


function mail_to_users() {
	/* function mail */
	$to      = "jerome.mogue@eemi.com";
	$subject = "objet";
	$message = "article";
	$headers = array('Content-Type: text/html; charset=UTF-8');

	wp_mail( $to, $subject, $message, $headers);
/* end mail */
} 
