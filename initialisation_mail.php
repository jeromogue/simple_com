<?php

$users   = $_POST["users"];
$subject = $_POST["subject"];
$message = $_POST["message"];

if ( $users == "target_users")
{
	$to = "essai"; //requete sql a faire
}
else
{
	$to = "essai"; // requete a faire
}

//add_action('admin_init', 'mail_to_users');

function mail_to_users() {
	/* function mail */

	$headers = array('Content-Type: text/html; charset=UTF-8');

	wp_mail( "jerome.mogue@eemi.com", $subject, $message, $headers);
/* end mail */
}
?>