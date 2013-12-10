<?php
/*
	Plugin Name: WMF Mobile Redirector
	Plugin URI: http://themeforest.net/user/Webbu
	Description: A mobile device redirection plugin by Webbu.
	Version: 1.0.2
	Author: Webbu
	Author URI: http://themeforest.net/user/Webbu
*/

//Define directories.
define("WER_THEME_URL", plugin_dir_url( __FILE__ ));
define("WER_PLUGIN_CSS_URL",WER_THEME_URL."css/");
define("WER_PLUGIN_JS_URL",WER_THEME_URL."js/");
define("WER_PLUGIN_IMAGE_URL",WER_THEME_URL."images/");
define("WER_PLUGIN_LANG_URL",WER_THEME_URL."languages/");

// Files
include 'includes/options-page.php'; 
require_once 'includes/mobile-detect.php';

//Localization
function wmf_remobile_translate() {
  load_plugin_textdomain( 'wmfrt2d', false, WER_PLUGIN_LANG_URL ); 
}
add_action('plugins_loaded', 'wmf_remobile_translate');


// Detection
if(!is_admin()){
	
	function wmf_redirector_action(){
		
		$options = get_option('wmf_reoptions'); 
		
		if(isset($options['tabletsite']) == NULL){$tabletsite = "";}else{$tabletsite = $options['tabletsite'];}
		if(isset($options['mobilesite']) == NULL){$mobilesite = "";}else{$mobilesite = $options['mobilesite'];}
		if(isset($options['mobileactive']) == NULL){$mobileactive = "false";}else{$mobileactive = $options['mobileactive'];}
		if(isset($options['tabletactive']) == NULL){$tabletactive = "false";}else{$tabletactive = $options['tabletactive'];}
		if(isset($options['backlink']) == NULL){$backlink = "false";}else{$backlink = $options['backlink'];}
		if(isset($options['onlyhome']) == NULL){$onlyhome = "false";}else{$onlyhome = $options['onlyhome'];}

		if($onlyhome == "true"){
			if(is_front_page() || is_home()){
				$wmfredirectw = "true";
			}else{
				$wmfredirectw = "false";
			}
		}else{
			$wmfredirectw = "true";
		}
		
		$wmf_mobileredirect = new wmf_Mobile_Detect();
				
		if($wmfredirectw == 'true'){
			if($backlink == "true"){
				if($_GET["desktop"] != 1){
					
					$deviceType = ($wmf_mobileredirect->isMobile() ? ($wmf_mobileredirect->isTablet() ? 'tablet' : 'phone') : 'computer');
					
					if($mobileactive == "true"){
						if ($deviceType == "phone" && $mobileactive == true){header('Location: '.$mobilesite.'');}
					}
					
					if($tabletactive == "true"){
						if ($deviceType == "tablet" && $tabletactive == true){header('Location: '.$tabletsite.'');}
					}
					
				}
			}else{
				
				$deviceType = ($wmf_mobileredirect->isMobile() ? ($wmf_mobileredirect->isTablet() ? 'tablet' : 'phone') : 'computer');
				
				if($mobileactive == "true"){
					if ($deviceType == "phone" && $mobileactive == true){header('Location: '.$mobilesite.'');}
				}
				
				if($tabletactive == "true"){
					if ($deviceType == "tablet" && $tabletactive == true){header('Location: '.$tabletsite.'');}
				}
				
			}
		}
	}
	
	add_action('wp', 'wmf_redirector_action');
}

//Enque Styles & Scripts.
function wmfr_enque()
{	

	
	if (!is_admin()) {
	
	}
	
	if (is_admin()) {
		
		
		wp_register_style('styles-re', WER_PLUGIN_CSS_URL . 'style.css', array(), '1.0', 'all');
		wp_enqueue_style('styles-re'); 
		
		wp_register_script('options-re', WER_PLUGIN_JS_URL . 'options.js', array('jquery'), '1.0',true);
		wp_enqueue_script('options-re');
		
	}
		
}
add_action('init', 'wmfr_enque');

?>
