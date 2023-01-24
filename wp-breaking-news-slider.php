<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wirenomads.com
 * @since             1.0.0
 * @package           Breaking_News_Ticker
 *
 * @wordpress-plugin
 * Plugin Name:       Breaking News Ticker
 * Plugin URI:        https://wirenomads.com
 * Description:       Survey Maker plugin allows you to create unlimited surveys with unlimited sections and unlimited questions.
 * Version:           0.1.0
 * Author:            Javier Barroso
 * Author URI:        https://wirenomads.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       breaking-news-ticker
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('BREAKING_NEWS_TICKER_VERSION', '1.0.0');
define('PLUGIN_NAME', 'breaking_news_ticker');


defined('ABSPATH') or die('Hey, Hands off this file!!!!');

/* Define Constant */
if (!defined('BREAKING_NEWS_TICKER')) {
	define('BREAKING_NEWS_TICKER', plugin_dir_path(__FILE__));
}
global $wpdb;
define('TICKERS_TABLE', $wpdb->prefix . 'breaking_news_ticker');
define('NEWS_TABLE', $wpdb->prefix . 'breaking_news_ticker_news');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_breaking_news_ticker()
{
	require_once BREAKING_NEWS_TICKER . 'includes/class-breaking-news-ticker-activator.php';
	Breaking_News_Ticker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_breaking_news_ticker()
{
	require_once BREAKING_NEWS_TICKER . 'includes/class-breaking-news-ticker-deactivator.php';
	Breaking_News_Ticker_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_breaking_news_ticker');
register_deactivation_hook(__FILE__, 'deactivate_breaking_news_ticker');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require BREAKING_NEWS_TICKER . 'includes/class-breaking-news-ticker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_breaking_news_ticker()
{

	$plugin = new Breaking_News_Ticker();
	$plugin->run();
}
run_breaking_news_ticker();


// class BreakingNewsSlider{

//     function register(){

        

//         add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue') );

//         add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue') );

//     }

//     //activate plugin
//     function activate(){
//         require_once BREAKING_NEWS_TICKER . 'admin/classes/activate.php';
        
//         BreakingNewsSliderActivate::activate();
//     }


//     //deactivate plugin
//     function deactivate(){
        
//         flush_rewrite_rules();
        
//     }

//     function add_admin_menu(){

//         add_menu_page( 
//             'Breaking News Slider', 
//             'Breaking News Slider', 
//             'manage_options', 
//             BREAKING_NEWS_TICKER . 'admin/page-template/slider-list.php', 
//             null, 
//             null,
//             //plugins_url('admin/media/icon/list-check.svg', __FILE__), 
//             3 
//         );
//         add_submenu_page( 
//             BREAKING_NEWS_TICKER . 'admin/page-template/slider-list.php', 
//             'Add New Slider', 
//             'Add New', 
//             'manage_options', 
//             BREAKING_NEWS_TICKER . 'admin/page-template/slider-add.php', 
//             null
//         );
//         add_submenu_page( 
//             BREAKING_NEWS_TICKER . 'admin/page-template/slider-list.php', 
//             'Settings', 
//             'Settings', 
//             'manage_options', 
//             BREAKING_NEWS_TICKER . 'admin/page-template/slider-settings.php', 
//             null
//         );

//     }

//     function admin_enqueue(){

//         wp_enqueue_script('breaking-news-slider', plugins_url('admin/js/breaking-news-slider.js', __FILE__));
        
//     }

//     function frontend_enqueue(){

//         wp_enqueue_style( 'wn-news-slider-style', plugins_url('admin/css/breacking-news-slider.css', __FILE__));
        

//     }
// }


// if(class_exists('BreakingNewsSlider')){

//     $newsslider = new BreakingNewsSlider();
//     $newsslider -> register();

// }



// //activation
// register_activation_hook( __FILE__, array( $newsslider, 'activate' ) );

// //deactivation
// register_deactivation_hook( __FILE__, array( $newsslider, 'deactivate' ) );


// require_once dirname(__FILE__).'/admin/classes/shortcode.php';

// add_shortcode('NEWSTICKER', 'printNewsSlider');

// function printNewsSlider($id){

//     if(class_exists('printNewsSliderShortCode')){
//         $shortcode = new printNewsSliderShortCode();
//     }
	
//     return $shortcode->print($id);
    
// }