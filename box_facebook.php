<?php

//ecriture de la box
function box_share_facebook(){
	
	$val_fb = get_post_meta($post->ID,'_box_share_facebook', true);
	echo '<div id="shareBtn" class="fb-share-button" data-href="https://www.facebook.com/Essai-199436430494197/" data-layout="button" data-size="small" data-mobile-iframe="false">';
	echo '<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FEssai-199436430494197%2F&amp;src=sdkpreparse">';
	echo 'Partager';
	echo '</a>';
	echo '</div>';

}
?>