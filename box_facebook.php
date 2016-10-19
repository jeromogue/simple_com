<?php

//ecriture de la box
function box_share_facebook(){
	
	$val_fb = get_post_meta($post->ID,'_box_share_facebook', true);
	echo '<label for="text_share"> Share text :</label>';
	echo '<input id="text_share" type="text" name="text_share" /><br />';
	echo '<button id="shareBtn">Share</button>';

}
?>