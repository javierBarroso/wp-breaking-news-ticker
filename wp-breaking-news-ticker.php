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
 * Description:       Easily create a news ticker to show your clients the latest news.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Javier Barroso
 * Author URI:        https://wirenomads.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       breaking-news-ticker
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
defined('ABSPATH') or die('Hey, Hands off this file!!!!');


/**require files */
require dirname(__FILE__) . '/includes/class-breaking-news-ticker.php';
require dirname(__FILE__) . '/includes/class-breaking-news-ticker-activator.php';
require dirname(__FILE__) . '/includes/class-breaking-news-ticker-deactivator.php';




/**
 * Define constants
 */

/**
 * plugin path
*/
if (!defined('BREAKING_NEWS_TICKER')) {
	define('BREAKING_NEWS_TICKER', plugin_dir_path(__FILE__));
}
/**
 * Currently plugin version.
 */
if (!defined('BREAKING_NEWS_TICKER_VERSION')) {
	define('BREAKING_NEWS_TICKER_VERSION', '1.0.0');
}
/**pugin name */
if (!defined('PLUGIN_NAME')) {
	define('PLUGIN_NAME', plugin_basename(__FILE__));
}
/**plugin path */
if (!defined('PLUGIN_PATH')) {
	define('PLUGIN_PATH', plugin_dir_path(__FILE__));
}
/**plugin url */
if (!defined('PLUGIN_URL')) {
	define('PLUGIN_URL', plugin_dir_url(__FILE__));
}

/**DB tables */
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
	$plugin = new Breaking_News_Ticker();
	$plugin->run();
}
run_breaking_news_ticker();
