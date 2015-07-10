<?php
/*
   Plugin Name: MS Login Redirector
   Plugin URI: http://www.StephenBurns.net/
   Description: Multisite ONLY - Redirects user to their primary blog after logging in. 
   Version: 1.0
   Author: Stephen Burns
   Author URI: http://www.StephenBurns.net/
   License: GPL2
*/
?>

<?php
function login_site_redirect ( $redirect_to ) {
	global $user;
	$primary_blog_id = get_usermeta($user->ID, 'primary_blog');
	$blog_details = get_blog_details($primary_blog_id);
	$redirect_url = $blog_details->siteurl;
	return $redirect_url;
}

add_filter ( 'login_redirect', 'login_site_redirect', 10, 3 ) ;
?>
