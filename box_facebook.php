<?php



// $test = '<div id="shareBtn" class="fb-share-button" data-href="'.$url_share_state.'" data-layout="button" data-size="small" data-mobile-iframe="false">';
// $test2 = '<div id="shareBtn" class="fb-share-button" data-href="https://www.om.net/" data-layout="button" data-size="small" data-mobile-iframe="false">';
// var_dump($test);var_dump($test2);die;
//create pop_up
function box_share_facebook(){

	global $wpdb;

	// request to get url_share
	$url_share_result = $wpdb->get_results( "SELECT option_state FROM wp_options_simple_com WHERE option_name = 'url_share'" );
	$url_share_state = $url_share_result[0]->option_state;
	
	$val_fb = get_post_meta($post->ID,'_box_share_facebook', true);

	echo '<div>';
	echo '<label for="url_share" >Change URL :</label>';
	echo '<input type="text" name="url_share" id="url_share" value="'.$url_share_state.'"/>';
	echo '</div>';
	echo '<div id="shareBtn" class="fb-share-button" data-href="'.$url_share_state.'" data-layout="button" data-size="small" data-mobile-iframe="false">';
	echo '<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FEssai-199436430494197%2F&amp;src=sdkpreparse">';
	echo 'Partager';
	echo '</a>';
	echo '</div>';

}
?>