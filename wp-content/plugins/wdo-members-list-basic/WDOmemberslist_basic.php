<?php
/*
Plugin Name: WDO Members List
Plugin URI: http://www.webdevsonline.com
Description: Displays a full list of members in alphabetical order using [WDO-memberlist]. Alternatively use a memberlist widget. You can also now use [WDO-memberlistsearch] to include a search for your memberlist, the function uses usernames to find a specific user. You can edit the look through the CSS file. Supports Multi-site. For more information, or if you need help with the plugin, or to request an update, email us at contact@webdevsonline.com.
Version: 1.2.4
Author: Web Devs Online
Author URI: http://www.webdevsonline.com

For more information, email us at contact@webdevsonline.com.

Copyright 2012 Web Devs Online

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
function format_phone($phone)
{
	$phone = preg_replace("/[^0-9]/", "", $phone);

	if(strlen($phone) == 7)
		return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
	elseif(strlen($phone) == 10)
		return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
	else
		return $phone;
}

function WDOmembersstyle(){

$pluginurl = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
echo '<link rel="stylesheet" type="text/css" href="'.$pluginurl.'WDOmembersstyle.css">';
}
add_action( 'wp_head', 'WDOmembersstyle' );

function list_members() {

	global $wpdb;
	
	$prefix = $wpdb->prefix;
	
	$result =  mysql_query("SELECT ".$prefix."users.ID, ".$prefix."users.user_email, ".$prefix."users.display_name, ".$prefix."users.user_registered, ".$prefix."usermeta.user_id, ".$prefix."usermeta.meta_key, ".$prefix."usermeta.meta_value,".$prefix."users.user_login,".$prefix."cimy_uef_data.VALUE as phone FROM ".$prefix."cimy_uef_data, ".$prefix."users, ".$prefix."usermeta WHERE ".$prefix."usermeta.user_id = ".$prefix."users.ID AND ".$prefix."usermeta.user_id = ".$prefix."cimy_uef_data.USER_ID AND (".$prefix."usermeta.meta_key = 'first_name' OR ".$prefix."usermeta.meta_key = 'last_name' OR ".$prefix."usermeta.meta_key = '".$prefix."capabilities') ORDER BY user_login ");
	
	//include('WDOsearch.php');
	//echo search_members();
	//echo '<br />';
	echo "<table id='memberstable'><tr>\n";
	echo "<td id='memberstitle'>Name</td><td id='memberstitle'>Nickname</td><td id='memberstitle'>Position</td><td id='memberstitle'>Phone Number</td><td id='memberstitle'>Email</td></tr>\n";
	while ($memberlist = mysql_fetch_array($result)) {
		include('userlevel.php');
		if($memberlist['meta_key']=="first_name"){
			echo  "<tr>";
			echo "<td id='membersname'><a href='/forums/user/".$memberlist['user_login']."'>" .$memberlist['meta_value'] . " ";
		} else if($memberlist['meta_key']=="last_name"){
			echo $memberlist['meta_value'] . "</a></td>";
			echo "<td id='membersname'>" .$memberlist['display_name'] . "</td>";
		} else if($memberlist['meta_key']=="wp_capabilities"){
			$user_role=explode("{", $memberlist['meta_value']);
			$user_role=explode(";", $user_role[1]);
			$user_role=explode('"', $user_role[0]);
			if($user_role[1]=="partner"){
				echo "<td id='membersrank'>Partner</td>";
			} else if($user_role[1]=="administrator"){
				echo "<td id='membersrank'>Administrator</td>";
			} else if($user_role[1]=="assistantmanager"){
				echo "<td id='membersrank'>Assistant Manager</td>";
			} else if($user_role[1]=="Supervisor"){
				echo "<td id='membersrank'>Supervisor</td>";
			} 			
			echo "<td id='membersjoined'>" . format_phone($memberlist['phone']) . "</td>";
			echo "<td><a href='mailto:".$memberlist['user_email']."'>" . $memberlist['user_email'] . "</a></td>";
			echo "</tr>\n";
		}
	}
	echo "</table>";

}
 function memberlist_shortcode($atts) 
{ 
	  echo list_members();
}
add_shortcode("WDO-memberlist","memberlist_shortcode");

add_action( 'wp_head', 'WDOmembersstyle' );

function list_members_search() {

	global $wpdb;
	
	$prefix = $wpdb->prefix;
	
	$result =  mysql_query("SELECT ".$prefix."users.ID, ".$prefix."users.user_email, ".$prefix."users.display_name, ".$prefix."users.user_registered, ".$prefix."usermeta.user_id, ".$prefix."usermeta.meta_key, ".$prefix."usermeta.meta_value,".$prefix."cimy_uef_data.VALUE as phone FROM ".$prefix."cimy_uef_data, ".$prefix."users, ".$prefix."usermeta WHERE ".$prefix."usermeta.user_id = ".$prefix."users.ID AND ".$prefix."usermeta.user_id = ".$prefix."cimy_uef_data.USER_ID AND (".$prefix."usermeta.meta_key = 'first_name' OR ".$prefix."usermeta.meta_key = 'last_name' OR ".$prefix."usermeta.meta_key = '".$prefix."capabilities') ORDER BY user_login ");
	
	//include('WDOsearch.php');
	//echo search_members();
	//echo '<br />';
	echo "<table id='memberstable'><tr>\n";
	echo "<td id='memberstitle'>Name</td><td id='memberstitle'>Nickname</td><td id='memberstitle'>Position</td><td id='memberstitle'>Phone Number</td><td id='memberstitle'>Email</td></tr>\n";
	while ($memberlist = mysql_fetch_array($result)) {
		include('userlevel.php');
		if($memberlist['meta_key']=="first_name"){
			echo  "<tr>";
			echo "<td id='membersname'>" .$memberlist['display_name'] . "</td>";
			echo "<td id='membersname'>" .$memberlist['meta_value'] . " ";
		} else if($memberlist['meta_key']=="last_name"){
			echo $memberlist['meta_value'] . "</td>";
		} else if($memberlist['meta_key']=="wp_capabilities"){
			$user_role=explode("{", $memberlist['meta_value']);
			$user_role=explode(";", $user_role[1]);
			$user_role=explode('"', $user_role[0]);
			if($user_role[1]=="partner"){
				echo "<td id='membersrank'>Partner</td>";
			} else if($user_role[1]=="administrator"){
				echo "<td id='membersrank'>Administrator</td>";
			} else if($user_role[1]=="assistantmanager"){
				echo "<td id='membersrank'>Assistant Manager</td>";
			} else if($user_role[1]=="Supervisor"){
				echo "<td id='membersrank'>Supervisor</td>";
			} 			
			echo "<td id='membersjoined'>" . format_phone($memberlist['phone']) . "</td>";
			echo "<td><a href='mailto:".$memberlist['user_email']."'>" . $memberlist['user_email'] . "</a></td>";
			echo "</tr>\n";
		}
	}
	echo "</table>";

}
 function memberlistsearch_shortcode($atts) 
{ 
	  echo list_members_search();
}
add_shortcode("WDO-memberlistsearch","memberlistsearch_shortcode");

function list_members_widget() {

	global $wpdb;
	
	$prefix = $wpdb->prefix;
	$resultw =  mysql_query("SELECT ".$prefix."users.ID, ".$prefix."users.user_login FROM ".$prefix."users ORDER BY user_login ");
	while ($memberlistw = mysql_fetch_array($resultw)) {
	echo  $memberlistw['user_login'] . "<br />";
	}
	echo "<br />";

}
function widget_mymemberlist($args) {
    extract($args);

echo $before_widget; 
echo $before_title . 'Members' . $after_title; 
echo list_members_widget();
echo $after_widget; 

}
register_sidebar_widget('Members List',
    'widget_mymemberlist');
?>