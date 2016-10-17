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