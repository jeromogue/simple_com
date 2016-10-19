<?php
//initialisation
add_action('add_meta_boxes','initialisation_metaboxes');
function initialisation_metaboxes(){

	add_meta_box('1', 'Share Facebook', 'box_share_facebook', 'post');
	add_meta_box('2', 'Mail', 'box_mail', 'post');
}

include("box_facebook.php");
include("box_mail.php");

?>