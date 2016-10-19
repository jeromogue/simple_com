<?php

//ecriture de la box
function box_mail($post){

	$val_mail = get_post_meta($post->ID,'_box_mail', true);

	echo '<label for="subject_mail"> Mail\'s subject :</label>';
	echo '<input id="subject_mail" type="text" name="subject_mail" /><br />';
	echo '<label for="list_target">Send to :</label>';
	echo '<select id="liste_users" name="list_target">';
	echo '<option ' . selected( 'Target users', $users, false ) . ' value="target_users">Target</option>';
	echo '<option ' . selected( 'All', $users, false ) . ' value="all_users">All users</option>';
	echo '</select><br />';
	echo '<label for="text_mail">Corpus area</label>';
	echo '<textarea id="text_mail" name="text_mail" style="width:100%; height:200px;"></textarea><br />';
	echo '<button id="send_mail">Send</button>';


}

// Ressortir les values via une requete
// $vals= '';
// $sql = "SELECT m.meta_value FROM ".$wpdb->postmeta." m where m.meta_key = '_ma_valeur' and m.post_id = '".$post->ID."' order by m.meta_id";
// $results = $wpdb->get_results( $sql );
// foreach( $results as $result ){
//   $vals[] = $result->meta_value;
// }
?>