<?php



//initialisation
add_action('add_meta_boxes','initialisation_metaboxes');

function initialisation_metaboxes(){

global $wpdb;

$facebook_result = $wpdb->get_results( "SELECT option_state FROM wp_options_simple_com WHERE option_name = 'share_facebook'" );
$facebook_state = $facebook_result[0]->option_state;
$mail_result = $wpdb->get_results( "SELECT option_state FROM wp_options_simple_com WHERE option_name = 'box_mail'" );
$mail_state = $mail_result[0]->option_state;

	if ($facebook_state == 'yes'){
		add_meta_box('1', 'Share Facebook', 'box_share_facebook', 'post');
		wp_enqueue_script('simple_com_fb.js', '/wp-content/plugins/simple_com/simple_com_fb.js');
	}
	if ( $mail_state == 'yes'){
		add_meta_box('2', 'Mail', 'box_mail', 'post');
	}	
}

	include("box_facebook.php");
	include("box_mail.php");


?>