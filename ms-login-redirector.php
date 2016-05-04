<?php
	/*
	Plugin Name: SB - MS Login Redirect
	Plugin URI: www.StephenBurns.net
	Description: Redirects user in a multisite environment to their specific primary blog. Original code post from aecnu at wpmudev.org.
	Version: 1.0
	Author: Stephen Burns
	Author URI: http://www.StephenBurns.net/
	License: GPL2
	*/
   	
	/*  Copyright 2015 Stephen Burns  (email : Stephen@StephenBurns.net)
	
	 This program is free software; you can redistribute it and/or modify
    	it under the terms of the GNU General Public License, version 2, as 
    	published by the Free Software Foundation.
	
    	This program is distributed in the hope that it will be useful,
    	but WITHOUT ANY WARRANTY; without even the implied warranty of
    	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    	GNU General Public License for more details.
	
    	You should have received a copy of the GNU General Public License
    	along with this program; if not, write to the Free Software
    	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	
   	/* IMPORTANT NOTE: 
    	* Redirects user to their specific primary blog. Code from aecnu at wpmudev.org, made into a plugin by Stephen Burns.
    	* Full URL:
    	* http://premium.wpmudev.org/forums/topic/how-to-redirect-user-to-their-subdomain-dashboard-when-signin-at-the-main-website*/
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
