<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Breaking_News_Ticker
 * @subpackage Breaking_News_Ticker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Breaking_News_Ticker
 * @subpackage Breaking_News_Ticker/admin
 * @author     Javier Barroso <abby.javi.infox@gmail.com>
 */
class Breaking_News_Ticker_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('admin_menu', array($this, 'add_admin_menu'));
	}


	/* Create admin menu pages */
	function add_admin_menu()
	{
		add_menu_page(
			'Breaking News Ticker',
			'Breaking News Ticker',
			'manage_options',
			BREAKING_NEWS_TICKER . 'admin/partials/page-tickers-list.php',
			null,
			null,
			//plugins_url('admin/media/icon/list-check.svg', __FILE__), 
			3
		);
		add_submenu_page(
			BREAKING_NEWS_TICKER . 'admin/partials/page-tickers-list.php',
			'Add New Slider',
			'Add New',
			'manage_options',
			BREAKING_NEWS_TICKER . 'admin/partials/page-ticker-add.php',
			null
		);
		add_submenu_page(
			BREAKING_NEWS_TICKER . 'admin/partials/page-tickers-list.php',
			'Settings',
			'Settings',
			'manage_options',
			BREAKING_NEWS_TICKER . 'admin/partials/page-ticker-settings.php',
			null
		);
	}

	/**
	 * get the stored tickers
	 * 
	 * @since 1.0.0
	 */

	public function get_tickers()
	{

		global $wpdb;

		$query_get_tickers = "SELECT * FROM " . TICKERS_TABLE;

		$tickers = $wpdb->get_results($query_get_tickers, ARRAY_A);

		if (empty($tickers)) {
			$tickers = array();
		}

		return $tickers;
	}

	/**
	 * Save new ticker
	 * 
	 * @since 1.0.0
	 */
	public function store_ticker($data)
	{
		global $wpdb;

		if (isset($data['save'])) {

			$current_date = current_time('Y-m-d');
			$author = wp_get_current_user()->ID;

			$ticker_data = [
				'title' => $data['title'],
				'ticker_label' => $data['ticker_label'],
				'author_id' => $author,
				'date' => $current_date,
				'top_label' => $data['top_label'],
				'scroll_speed' => $data['scroll_speed'],
			];

			$wpdb->insert(TICKERS_TABLE, $ticker_data);

			$query = "SELECT * FROM " . TICKERS_TABLE . " ORDER BY ID DESC limit 1";
			$ticker = $wpdb->get_results($query, ARRAY_A);
			$currentTickertId = $ticker[0]['ID'];
			$shortcode = "[NEWSTICKER id='$currentTickertId']";

			$wpdb->update(TICKERS_TABLE, array('shortcode' => $shortcode), array('ID' => $currentTickertId));

			foreach ($data['news'] as $key => $news) {

				$news_data = [
					'ticker_id' => $currentTickertId,
					'news' => $news,
				];

				$wpdb->insert(NEWS_TABLE, $news_data);
			}
		}

		return true;
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/breaking-news-ticker-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/breaking-news-ticker-admin.js', array('jquery'), $this->version, false);
		
	}
}
