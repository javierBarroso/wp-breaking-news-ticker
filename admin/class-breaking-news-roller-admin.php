<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Breaking_News_Roller
 * @subpackage Breaking_News_Roller/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Breaking_News_Roller
 * @subpackage Breaking_News_Roller/admin
 * @author     Javier Barroso <abby.javi.infox@gmail.com>
 */
class Breaking_News_Roller_Admin {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_menu', array($this, 'add_admin_menu') );

	}


	/* Create admin menu pages */
	function add_admin_menu(){
        add_menu_page( 
            'Breaking News Roller', 
            'Breaking News Roller', 
            'manage_options', 
            BREAKING_NEWS_ROLLER . 'admin/partials/page-rollers-list.php', 
            null, 
            null,
            //plugins_url('admin/media/icon/list-check.svg', __FILE__), 
            3 
        );
        add_submenu_page( 
            BREAKING_NEWS_ROLLER . 'admin/partials/page-rollers-list.php', 
            'Add New Slider', 
            'Add New', 
            'manage_options', 
            BREAKING_NEWS_ROLLER . 'admin/partials/page-roller-add.php', 
            null
        );
        add_submenu_page( 
            BREAKING_NEWS_ROLLER . 'admin/partials/page-rollers-list.php', 
            'Settings', 
            'Settings', 
            'manage_options', 
            BREAKING_NEWS_ROLLER . 'admin/partials/page-rollers-settings.php', 
            null
        );

    }

	/**
	 * get the stored rollers
	 * 
	 * @since 1.0.0
	 */

	public function get_rollers(){

		global $wpdb;

		$query_get_rollers = "SELECT * FROM " . ROLLERS_TABLE;

		$rollers = $wpdb -> get_results($query_get_rollers, ARRAY_A);

		if(empty($rollers)){
			$rollers = array();
		}

		return $rollers;
	}

	/**
	 * Save new roller
	 * 
	 * @since 1.0.0
	 */
	public function store_roller($data){
		global $wpdb;

		if(isset($data['save'])){

			$current_date = current_time( 'Y-m-d' );
			$author = wp_get_current_user(  ) -> ID;

			$roller_data = [
				'title' => $data['title'],
				'roller_label' => $data['roller_label'],
				'author_id' => $author,
				'date' => $current_date,
				'top_label' => $data['top_label'],
				'scroll_speed' => $data['scroll_speed'],
			];

			$wpdb->insert(ROLLERS_TABLE, $roller_data);

			$query = "SELECT * FROM ".ROLLERS_TABLE." ORDER BY ID DESC limit 1";
			$roller = $wpdb->get_results($query, ARRAY_A);
			$currentRollertId = $roller[0]['ID'];
			$shortcode = "[NEWSROLLER id='$currentRollertId']";

			$wpdb->update(ROLLERS_TABLE, array('shortcode' => $shortcode), array('ID' => $currentRollertId));

			foreach ($data['news'] as $key => $news) {
        
				$news_data = [
					'roller_id' => $currentRollertId,
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
	public function enqueue_styles() {
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/breaking-news-roller-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/breaking-news-roller-admin.js', array( 'jquery' ), $this->version, false );

	}

}
