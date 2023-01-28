<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Breaking_News_Ticker
 * @subpackage Breaking_News_Ticker/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Breaking_News_Ticker
 * @subpackage Breaking_News_Ticker/includes
 * @author     Your Name <email@example.com>
 */



class Breaking_News_Ticker_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		flush_rewrite_rules();
	}
}
