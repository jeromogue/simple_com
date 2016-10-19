<?php
//add_action('admin_init', 'initialisation_metaboxes');

//initialisation
add_action('add_meta_boxes','initialisation_metaboxes');
function initialisation_metaboxes(){

	add_meta_box('1', 'Share Facebook', 'box_share_facebook', 'post');
	add_meta_box('2', 'Mail', 'box_mail', 'post');

}

//ecriture de la box
function box_share_facebook(){
	
	$val_fb = get_post_meta($post->ID,'_box_share_facebook', true);
	echo '<label for="text_share"> Share text :</label>';
	echo '<input id="text_share" type="text" name="text_share" /><br />';
	echo '<button id="shareBtn">Share</button>';

}

//sauvegarde du post
add_action('save_post', 'save_metaboxes');

function save_metaboxes($post_ID){

	if(isset($_POST["text_share"])){
		update_post_meta($post_ID, '_box_share_facebook', esc_html($_POST['text_share']));
	}
}

function box_mail($post){

	$val_mail = get_post_meta($post->ID,'_box_mail', true);

	echo '<label for="subject_mail"> Mail\'subject :</label>';
	echo '<input id="subject_mail" type="text" name="subject_mail" /><br />';
	echo '<label for="list_target">Send to :</label>';
	echo '<select name="list_target">';
	echo '<option ' . selected( 'Target users', $users, false ) . ' value="target_users">Target</option>';
	echo '<option ' . selected( 'All', $users, false ) . ' value="all_users">All users</option>';
	echo '</select><br />';
	echo '<label for="text_mail">Corpus area</label>';
	echo '<textarea id="text_mail" name="text_mail" style="width:100%; height:200px;"></textarea><br />';
	echo '<button id="send_mail">Send</button>';


}

add_action('save_post','save_metabox');
function save_metabox($post_id){

	if(isset($_POST['box_mai'])){
		update_post_meta($post_id, '_box_mail', $_POST['subject_mail']);
		update_post_meta($post_id, '_box_mail', $_POST['list_target']);
	}

}
// Ressortir les values via une requete
// $vals= '';
// $sql = "SELECT m.meta_value FROM ".$wpdb->postmeta." m where m.meta_key = '_ma_valeur' and m.post_id = '".$post->ID."' order by m.meta_id";
// $results = $wpdb->get_results( $sql );
// foreach( $results as $result ){
//   $vals[] = $result->meta_value;
// }
?>