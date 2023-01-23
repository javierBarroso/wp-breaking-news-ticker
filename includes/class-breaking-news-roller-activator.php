<?php
/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Breaking_News_Roller
 * @subpackage Breaking_News_Roller/includes
 */
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Breaking_News_Roller
 * @subpackage Breaking_News_Roller/includes
 * @author     Javier Barroso <abby.javi.infox@gmail.com>
 */
class Breaking_News_Roller_Activator {

	/**
	 * Activation function.
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wpdb;

        $query_create_rollers_table = "CREATE TABLE IF NOT EXISTS `".ROLLERS_TABLE."`(
            `ID` INT NOT NULL AUTO_INCREMENT,
            `title` TEXT NOT NULL, 
            `roller_label` TEXT, 
            `top_label` TEXT, 
            `scroll_speed` INT, 
            `author_id` INT NOT NULL ,
            `shortcode` VARCHAR(50) NOT NULL , 
            `date` DATE NOT NULL ,
            PRIMARY KEY (`ID`)
        );";
        $wpdb -> query($query_create_rollers_table);

        $query_create_news_table = "CREATE TABLE IF NOT EXISTS `".NEWS_TABLE."`(
            `ID` INT NOT NULL AUTO_INCREMENT, 
            `roller_id` INT NOT NULL ,  
            `news` TEXT NOT NULL ,  
            PRIMARY KEY (`ID`),
            FOREIGN KEY (roller_id) REFERENCES ".ROLLERS_TABLE."(ID)
        );";
        $wpdb -> query($query_create_news_table);

        
        flush_rewrite_rules();
	}

}