<?php

/**
 * Class Name: Log_Horn_Admin_Menu
 * This is the main class responsible for displaying Menu Options on the Admin Page (Network Admin only).
 */
 
/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
defined( 'ABSPATH' ) or die ;
   
/**
 *	Start by checking if the class Log_Horn_Admin_Menu is already defined somewhere else.
 *	Plugin will not provide any functionality and quit silently, if the class 'Log_Horn_Admin_Menu' is defined elsewhere.
 */	

if  ( ! class_exists ( 'Log_Horn_Admin_Menu' )  )  : 
  
	class Log_Horn_Admin_Menu	{
		
		private static $loghorn_custom_logo ;		// stores the name of the logo file.
		
		/**
		 * Constructor: All initializations occur here.
		 */
		function Log_Horn_Admin_Menu () 	{
			
			/**
			 * Latch on to action hooks here.
			 */
			 
			add_action( 'network_admin_menu', array ( $this,'loghorn_menu' ) ) ;
			//echo "..................................................loghorn menu constructor" ;
		}
		
		/**
		 * The Menu-builder for Log Horn.
		 */
		function loghorn_menu() {
			
			if ( is_super_admin () )
				add_menu_page ( 
								'Log Horn', 								// page title
								'Log Horn settings', 						// menu title
								'manage_options', 							// capability
								'class-log-horn-admin-menu.php', 			// menu-slug
								array ( $this, 'loghorn_plugin_options' ), 	// function
								'dashicons-layout'							// icon (used WordPress dashicons)
				);
		}
		
		function loghorn_plugin_options ()	{

			echo "<br>Log Horn menu options<br/>" ;
			
			
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			
			echo '<div class="wrap">';
			echo '<p>Here is where the form would go if I actually had options.</p>';
			echo '</div>';
		}
			
	} //class Log_Horn_Admin_Menu ends here.
	
	/**
	 * Instantiate an object of the class Log_Horn_Admin_Menu to call the class constructor.
	 */
	function start_log_horn_menu () 	{
		$start_plugin_log_horn_menu = new Log_Horn_Admin_Menu;
	}
	
	// Go ahead and trigger the plugin:
	start_log_horn_menu () ;
	
endif; // End of the 'if  ( class_exists ) ' block
  
?>