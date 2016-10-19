<?php
/* place for mail */
/* end place mail */

/* request to find user with keywords */
function request_by_keyword($keyword)
{
	$articles = $wpdb->get_results("Select ID, post_title from wp_posts where post_title like %".$keywords."%");

	$users = $wpdb->get_results("Select ID, user_email, user, article from wp_user, wp_sold_user, wp_posts where ID.users = user and article = ID.wp_posts");
}
/* end user by keyword */

/* request to find all users */
function request_all_users()
{
	$users = $wpdb->get_results("Select user_email from wp_users");
}
/* end all users*/


?>