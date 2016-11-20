<?php
   /*
   Plugin Name: Log Horn
   Plugin URI: http://localhost
   Description: a plugin to customize the login experience in WordPress.
   Version: 0.2
   Author: shazic
   Author URI: https://github.com/shazic
   License: GPLv3
   License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
   */

/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
	defined( 'ABSPATH' ) or die ;
   
	
	require_once __DIR__.DIRECTORY_SEPARATOR.'initialize-loghorn.php' ;
	
	require_once LOGHORN_DIR.'includes/class-log-horn-display.php' ;
?>