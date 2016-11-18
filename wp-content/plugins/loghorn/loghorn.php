<?php
   /*
   Plugin Name: Log Horn
   Plugin URI: http://localhost
   Description: a plugin to customize the login experience in WordPress.
   Version: 1.0
   Author: shazic
   Author URI: https://github.com/shazic
   License: GPL3
   */

/**
 *	Start by checking if the class LogHorn is already defined somewhere else.
 *	Plugin will not provide any functionality and quit silently, if the class 'LogHorn' is defined elsewhere.
 */	
if (!class_exists('LogHorn')) : 
  
	class LogHorn	{
		
		private static $loghorn_member;				// a dummy member - for use in future versions.
		private $loghorn_OS, 						// stores info whether the Operating System is 'Windows' or 'NonWindows'.
				$loghorn_dir_separator;				// stores the Directory Separator - backslash for 'Windows', forward-slash for 'NonWindows'.
		public $loghorn_version='v1.0';
		
		//Constructor: All initializations occur here.
		function LogHorn()	{
			
			$this->loghorn_detect_OS();				// Kept for future use.
			$this->loghorn_define_constants();
			
			/**
			 * Latch on to action hooks here.
			 */
			add_action('login_enqueue_scripts', array( $this,'loghorn_login_scripts'));
		}
		
		/**
		 * Detect if the OS is Windows based or Non-Windows based platform:
		 */
		function loghorn_detect_OS()	{
			
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				$this->loghorn_OS='Windows';		$this->loghorn_dir_separator='\\';
			} else {
				$this->loghorn_OS='NonWindows';	$this->loghorn_dir_separator='/';
			}
			//Note: $loghorn_dir_separator is not used in the program. Instead, the constant DIRECTORY_SEPARATOR is used.
			//		The function 'loghorn_detect_OS()' and the variables '$loghorn_OS' and '$loghorn_dir_separator' are only placeholders 
			//		These variables/function could be used in future versions.
		}
		
		function loghorn_define_constants()	{
			
            // Set the version:
            if (!defined('LOGHORN_VERSION')) {
                define( 'LOGHORN_VERSION', $this->loghorn_version);
            }

            // Set the current file name:
            if (!defined('LOGHORN_FILE')) {
                define('LOGHORN_FILE', __FILE__);
            }

            // Set the directory path:
            if (!defined( 'LOGHORN_DIR')) {
                define('LOGHORN_DIR', plugin_dir_path(LOGHORN_FILE));
            }

            // Set the plugin folder's URL:
            if (!defined('LOGHORN_URL')) {
                define('LOGHORN_URL', plugin_dir_url(LOGHORN_FILE));
            }

            // Set the basename:
            if (!defined('LOGHORN_BASENAME')) {
                define( 'LOGHORN_BASENAME', plugin_basename(LOGHORN_FILE));
            }

            // Set the dirname:
            if (!defined('LOGHORN_DIRNAME')) {
                define('LOGHORN_DIRNAME',dirname(LOGHORN_BASENAME));
            }
			
            // Set the CSS directory name:
            if (!defined('LOGHORN_CSS_DIRNAME')) {
                define('LOGHORN_CSS_DIRNAME', LOGHORN_DIRNAME.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR);
            }
			
            // Set the image URL:
            if (!defined('LOGHORN_IMAGES_URL')) {
                define('LOGHORN_IMAGES_URL',LOGHORN_URL.'images/');
			}
			
			/* Debug info:
			echo "LOGHORN_VERSION=".LOGHORN_VERSION."<br/>";
			echo "LOGHORN_FILE=".LOGHORN_FILE."<br/>";
			echo "LOGHORN_DIR=".LOGHORN_DIR."<br/>";
			echo "LOGHORN_URL=".LOGHORN_URL."<br/>";
			echo "LOGHORN_BASENAME=".LOGHORN_BASENAME."<br/>";
			echo "LOGHORN_DIRNAME=".LOGHORN_DIRNAME."<br/>";
			echo "LOGHORN_IMAGES_URL=".LOGHORN_IMAGES_URL."<br/>";
			echo "LOGHORN_CSS_DIRNAME=".LOGHORN_CSS_DIRNAME."<br/>";
			*/
		}
		
		/** 
		 * This function hooks into WP using the 'login_enqueue_scripts' tag in order to manipulate the WordPress logo through CSS scripts:
		 */
		function loghorn_login_scripts()	{
	
			$loghorn_logo_file 	= $this->loghorn_get_login_logo('default_logo_blue_80x80.png');					// name of the image file to be used as the logo.
			$loghorn_css 		= $this->loghorn_get_css('loghorn_enqueue_script');	// any additional stylesheets to manipulate the login logo
			?>
			
			<!-- The CSS included in the below code replaces the WordPress logo with the custom image. -->
			<style type="text/css">
				#login h1 a, .login h1 a{
					background-image: url(<?php echo LOGHORN_IMAGES_URL.$loghorn_logo_file; ?>);
					padding-bottom: 30px;
				}
			</style>
			<?php 
		}
		
		/**
		 * Get the name of the image that would replace the WordPress Login logo. 
		 * This should be present in the plugin's images directory.
		 */
		function loghorn_get_login_logo($loghorn_default_logo='default_logo_80x80.png')	{
	
			global $loghorn_custom_logo ;
	
			if (isset ($loghorn_custom_logo))
				if (file_exists(LOGHORN_IMAGES_URL.$loghorn_custom_logo))
					return $loghorn_custom_logo;
	
			return $loghorn_default_logo;
		}

		/**
		 * Get the URL of the CSS library.
		 */
		function loghorn_get_css($loghorn_current_script)	{
			// Debug info:
			echo 'CSS dir: '.LOGHORN_CSS_DIRNAME.$loghorn_current_script.'.css';
			return LOGHORN_CSS_DIRNAME.$loghorn_current_script.'.css';
		}
		
	} //class LogHorn ends here.
	
	/**
	 * Instantiate an object of the class LogHorn to call the class' constructor.
	 */
	function startPluginLogHorn()	{
		$startPluginLogHorn = new LogHorn;
	}
	
	// Go ahead and trigger the plugin:
	startPluginLogHorn();
	
endif; // End of the 'if (class_exists)' block
  
?>