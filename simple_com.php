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
// lancement js et jquery

function bbx_enqueue_scripts() {

	wp_enqueue_script( 'jquery' );

}
add_action( 'wp_enqueue_scripts', 'bbx_enqueue_scripts' );
wp_enqueue_script('simple_com.js', '/wp-content/plugins/simple_com/simple_com.js');

// fin js

// Création page dans le bo

add_action( 'admin_menu', 'simple_com_menu' );

function simple_com_menu() {
	add_options_page( 'My Plugin Options', 'Simple_com', 'manage_options', 'my-slug', 'simple_com_menu_callback' );
}

function simple_com_menu_callback() {
	echo '<div class="wrap">';
	echo '<h2>Simple com Settings</h2>';
	echo '</div>';

}

/* creation of the table options_simple_com */

global $create_options_table;
$create_options_table_version = '1.0';

// create options table in the bo

function create_options_table()
{
	global $wpdb;
	global $create_options_table_version;

	$table_name = $wpdb->prefix . "options_simple_com";
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  time datetime NOT NULL,
  option_name text() NOT NULL,
  option_state text() NOT NULL,
  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option('create_option_table_version', $create_options_table_version);
}

register_activation_hook( __FILE__, 'create_options_table' );

/* place for boxes */

include("initialisation_metaboxes.php");

/* end boxes */

// a faire demain
// passer le partage fb sur la liste d'article.
// faire les options du bo
// faire les tables pour les options du bo