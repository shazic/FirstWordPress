<?php

/**
 * Class Name: Log_Horn_Display
 * This is the main class responsible for the display of the login page.
 */
 
/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
defined( 'ABSPATH' ) or die ;
   
/**
 *	Start by checking if the class Log_Horn_Display is already defined somewhere else.
 *	Plugin will not provide any functionality and quit silently, if the class 'Log_Horn_Display' is defined elsewhere.
 */	

if  ( ! class_exists ( 'Log_Horn_Display' )  )  : 
  
	class Log_Horn_Display	{
		
		/**
		 * Naming standard: All member and method names used in the plugin begin with the prefix '$loghorn_' 
		 */
		
		private static $loghorn_custom_logo ;		// stores the name of the logo file  ( after reading from the options table ) .
		
		private $loghorn_OS , 						// stores info whether the Operating System is 'Windows' or 'NonWindows'.
				$loghorn_dir_separator ;			// stores the Directory Separator - backslash for 'Windows', forward-slash for 'NonWindows'.
		
		/**
		 * Constructor: All initializations occur here.
		 */
		function Log_Horn_Display () 	{
			
			$this->loghorn_detect_OS () ;			// Kept for future use.
						
			/**
			 * Latch on to action hooks here.
			 */
			add_action ( 'login_enqueue_scripts', array (  $this,'loghorn_login_scripts' )  ) ;
		}
		
		/**
		 * Detect if the OS is Windows based or Non-Windows based platform:
		 */
		function loghorn_detect_OS () 	{
			
			if  ( strtoupper ( substr ( PHP_OS , 0 , 3 )  )  === 'WIN' )  {
				$this->loghorn_OS='Windows' ;		$this->loghorn_dir_separator='\\' ;
			} else {
				$this->loghorn_OS='NonWindows' ;	$this->loghorn_dir_separator='/' ;
			}
			//Note: $loghorn_dir_separator is not used in the program. Instead, the constant DIRECTORY_SEPARATOR is used.
			//		The function 'loghorn_detect_OS (  ) ' and the variables '$loghorn_OS' and '$loghorn_dir_separator' are only placeholders 
			//		These variables/function could be used in future versions.
		}
		
		/** 
		 * This function hooks into WP using the 'login_enqueue_scripts' tag in order to manipulate the WordPress logo through CSS scripts:
		 */
		function loghorn_login_scripts () 	{
	
			$loghorn_logo_file 	= $this->loghorn_get_login_logo ( 'Bull_GraphicMama_team_80x80.png' ) ;	// name of the image file to be used as the logo.
			
			$loghorn_css 		= $this->loghorn_get_css ( 'loghorn_enqueue_script' ) ;	// any additional stylesheets to manipulate the login logo  ( future use ) 
			
			?>
			
			<!-- The CSS included in the below code replaces the WordPress logo with the custom image. -->
			<style type="text/css" >
						#login h1 a, 
						.login h1 a{
							background-image: url(<?php echo esc_url(LOGHORN_IMAGES_URL.$loghorn_logo_file) ; ?>);
							padding-bottom: 30px;
						}
			
			<!-- For future use:
						<link rel="stylesheet" type="text/css" href=<?php echo "$loghorn_css"; ?> >
			-->
			</style> 
			
			<?php 
		}
		
		/**
		 * Get the name of the image that would replace the WordPress Login logo. 
		 * This should be present in the plugin's images directory.
		 */
		function loghorn_get_login_logo ( $loghorn_default_logo=LOGHORN_DEFAULT_LOGO_IMAGE ) 	{
	
			$this->loghorn_fetch_custom_logo (  ) ;	// Fetch the name of the file from the database.
			
			// Check if the options table returned a valid filename: 
			if  ( isset  ( self::$loghorn_custom_logo ) && self::$loghorn_custom_logo )
				// options table returned a valid name. Now, check if the file exists under the /images directory:
				if  ( file_exists ( LOGHORN_IMAGES_DIRNAME.self::$loghorn_custom_logo )  ) 
					return self::$loghorn_custom_logo;
			
			// We didn't get a valid filename from the database. Either the user did not set it, or the file no longer exists.
			// Let's check the default filenames.
			if  ( file_exists ( LOGHORN_IMAGES_DIRNAME.$loghorn_default_logo )  ) 
				return $loghorn_default_logo ;	// Return the default supplied by the user during function call.
			else 
				return LOGHORN_DEFAULT_LOGO_IMAGE ;	// Return the default image supplied by the plugin.
		}
		
		/**
		 * Query the database for the logo filename. 
		 */
		function loghorn_fetch_custom_logo () 	{
			
			//fetch the database to get the logo filename as set by the user and return the result
			
			self::$loghorn_custom_logo=
			get_option('loghorn_custom_logo')
			#'OPEN_Up_logo_green_180x80.png'				// Debug info
			#'Bull_GraphicMama_team_80x80.png'				// Debug info
			#'gnu_80x801.png'	//Default					// Debug info
			;
			echo self::$loghorn_custom_logo;
		}
		
		/**
		 * Get the URL of the CSS library.
		 */
		function loghorn_get_css ( $loghorn_current_script ) 	{
			return LOGHORN_CSS_DIRNAME.$loghorn_current_script.'.css' ;	// Currently no external CSS used. Placeholder for future use.
		}
		
	} //class Log_Horn_Display ends here.
	
	/**
	 * Instantiate an object of the class Log_Horn_Display to call the class constructor.
	 */
	function start_log_horn () 	{
		$start_plugin_log_horn = new Log_Horn_Display;
	}
	
	// Go ahead and trigger the plugin:
	start_log_horn () ;
	
endif; // End of the 'if  ( class_exists ) ' block
  
?>