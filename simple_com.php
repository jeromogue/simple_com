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
	
	global $wpdb;

	if(isset($_POST["save_settings_simple_com"])){

		$facebook_state = $_POST["share_facebook"];
		$mail_state     = $_POST["box_mail"];

		$wpdb->update( 
			'wp_options_simple_com', 
			array( 
				'option_state' => $facebook_state	// string
			), 
			array( 'option_name' => 'share_facebook' ), 
			array( 
				'%s'	// value1
			), 
			array( '%s' ) 
		);

		$wpdb->update( 
			'wp_options_simple_com', 
			array( 
				'option_state' => $mail_state	// string
			), 
			array( 'option_name' => 'box_mail' ), 
			array( 
				'%s'	// value1
			), 
			array( '%s' ) 
		);
	}

		$facebook_result = $wpdb->get_results( "SELECT option_state FROM wp_options_simple_com WHERE option_name = 'share_facebook'" );
		$facebook_state = $facebook_result[0]->option_state;
		$mail_result = $wpdb->get_results( "SELECT option_state FROM wp_options_simple_com WHERE option_name = 'box_mail'" );
		$mail_state = $mail_result[0]->option_state;

		echo '<div class="wrap">';
		echo '<h2>Simple com Settings</h2>';
		echo '</div>';
		echo '<form action="#" method="POST" name="option_simpl_com">';
		echo '<div>';
		echo '<label for="share_facebook">Share on Facebook :</label>';
		echo '<select id="share_facebook" name="share_facebook">';
		echo '<option ' . selected( 'yes', $users, false ) . ' value="yes"';
		if ( $facebook_state == 'yes'){
			echo 'selected';
		}
		echo '>Yes</option>';
		echo '<option ' . selected( 'no', $users, false ) . ' value="no"';
		if ( $facebook_state == 'no'){
			echo 'selected';
		}
		echo '>No</option>';
		echo '</select>';
		echo '</div>';
		echo '<div>';
		echo '<label for="box_mail">Place for mail :</label>';
		echo '<select id="box_mail" name="box_mail">';
		echo '<option ' . selected( 'yes', $users, false ) . ' value="yes"';
		if ( $mail_state == 'yes'){
			echo 'selected';
		}
		echo '>Yes</option>';
		echo '<option ' . selected( 'no', $users, false ) . ' value="no"';
		if ( $mail_state == 'no'){
			echo 'selected';
		}
		echo '>No</option>';
		echo '</select>';
		echo '</div>';
		echo '<div>';
		echo '<input type="submit" name="save_settings_simple_com" id="submit_options" class="options_bo_simple_com" value="Send" />';
		echo '</div>';
		echo '</form>';
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
  option_name text NOT NULL,
  option_state text NOT NULL,
  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option('create_option_table_version', $create_options_table_version);
}

function create_options_table_data_facebook() {
	global $wpdb;
	
	$option_name = 'share_facebook';
	$option_state = 'yes';
	
	$wp_options_simple_com = $wpdb->prefix . 'options_simple_com';
	
	$wpdb->insert( 
		$wp_options_simple_com, 
		array( 
			'time' => current_time( 'mysql' ), 
			'option_name' => $option_name, 
			'option_state' => $option_state,
		) 
	);
}

function create_options_table_data_mail() {
	global $wpdb;
	
	$option_name = 'box_mail';
	$option_state = 'yes';
	
	$wp_options_simple_com = $wpdb->prefix . 'options_simple_com';
	
	$wpdb->insert( 
		$wp_options_simple_com, 
		array( 
			'time' => current_time( 'mysql' ), 
			'option_name' => $option_name, 
			'option_state' => $option_state,
		) 
	);
}

register_activation_hook( __FILE__, 'create_options_table' );
register_activation_hook( __FILE__, 'create_options_table_data_facebook' );
register_activation_hook( __FILE__, 'create_options_table_data_mail' );


/* place for boxes */

include("initialisation_metaboxes.php");

/* end boxes */

// a faire demain
// passer le partage fb sur la liste d'article.
// faire les options du bo