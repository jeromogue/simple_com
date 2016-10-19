<?php

//initialisation
add_action('add_meta_boxes','initialisation_metaboxes');
function initialisation_metaboxes(){

	add_meta_box('id_meta', 'Partage Facebook', 'box_partage_facebook', 'post');
}

//ecriture de la box


//sauvegarde du post
add_action('save_post', 'save_metaboxes');
function save_metaboxes($post_ID){

	if(isset($_POST["titre_partage"])){
		update_post_meta($post_ID, '_ma_valeur', esc_html($_POST['titre_partage']));
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