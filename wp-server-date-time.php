<?php
/*
Plugin Name: WP Server Date Time
Plugin URI: http://www.dhruwal.com/wp-server-date-time/
Description: This plugin shows the server local current date time & timezone in the upper right of your admin screen on every page.
Author: Dhruwal Patel
Version: 0.3
Author URI: http://www.dhruwal.com/
*/

// This echoes the timestamp
function get_server_date_time() {

	$date_time_now = date("D dS M, Y h:i a");
	$timezone_now = date("e, (T P)");
	echo "<p id='server-date-time'><strong>Server Date/Time:</strong> $date_time_now<br/><strong>Server Timezone:</strong> $timezone_now</p>";
	
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_notices', 'get_server_date_time');

// We need some CSS to position the paragraph
function server_date_time_css() {

	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	
	echo "
	<style type='text/css'>
	#server-date-time {
		float: $x;padding-$x:15px;margin:0;font-size:10px;color:#458B00;
	}	
	</style>
	";
}

add_action('admin_head', 'server_date_time_css');

?>