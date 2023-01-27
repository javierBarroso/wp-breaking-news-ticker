<?php

/**
 * 
 *
 * @link              https://wirenomads.com
 * @since             1.0.0
 * @package           Breaking_News_Ticker
 *
 * @wordpress-plugin
 * Plugin Name:       Breaking News Ticker
 * Plugin URI:        https://wirenomads.com
 * Description:       Easily create a news ticker to show your clients th elatest news.
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
defined('ABSPATH') or die('Hey, Hands off this file!!!!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}


use inc\BreakingNewsTicker;
use inc\Breaking_News_Ticker_Activator;
use inc\Breaking_News_Ticker_Deactivator;

//require dirname(__FILE__) . '/includes/class-breaking-news-ticker.php';
// require dirname(__FILE__) . '/includes/class-breaking-news-ticker-activator.php';
// require dirname(__FILE__) . '/includes/class-breaking-news-ticker-deactivator.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */



/**
 * Define constants
 */
if (!defined('BREAKING_NEWS_TICKER')) {
	define('BREAKING_NEWS_TICKER', plugin_dir_path(__FILE__));
}
if (!defined('BREAKING_NEWS_TICKER_VERSION')) {
	define('BREAKING_NEWS_TICKER_VERSION', '1.0.0');
}
if (!defined('PLUGIN_NAME')) {
	define('PLUGIN_NAME', plugin_basename(__FILE__));
}
if (!defined('PLUGIN_PATH')) {
	define('PLUGIN_PATH', plugin_dir_path(__FILE__));
}
if (!defined('PLUGIN_URL')) {
	define('PLUGIN_URL', plugin_dir_url(__FILE__));
}
global $wpdb;
if (!defined('TICKERS_TABLE')) {
	define('TICKERS_TABLE', $wpdb->prefix . 'breaking_news_ticker');
}
if (!defined('NEWS_TABLE')) {
	define('NEWS_TABLE', $wpdb->prefix . 'breaking_news_ticker_news');
}


/**
 * plugin activation
 */
function activate_breaking_news_ticker()
{
	Breaking_News_Ticker_Activator::activate();
}

/**
 * plugin deactivation
 */
function deactivate_breaking_news_ticker()
{
	Breaking_News_Ticker_Deactivator::deactivate();
}

/**Run activation */
register_activation_hook(__FILE__, 'activate_breaking_news_ticker');
/**run deactivation */
register_deactivation_hook(__FILE__, 'deactivate_breaking_news_ticker');


/**
 * Start pluging
 *
 * @since    1.0.0
 */
function run_breaking_news_ticker()
{
	$plugin = new BreakingNewsTicker();
	$plugin->run();
}
run_breaking_news_ticker();
