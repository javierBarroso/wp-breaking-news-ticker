<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Breaking_News_Ticker
 * @subpackage Breaking_News_Ticker/includes
 */
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Breaking_News_Ticker
 * @subpackage Breaking_News_Ticker/includes
 * @author     Javier Barroso <abby.javi.infox@gmail.com>
 */

namespace inc;


class Breaking_News_Ticker_Activator
{

    /**
     * Activation function.
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        global $wpdb;

        $query_create_tickers_table = "CREATE TABLE IF NOT EXISTS `" . TICKERS_TABLE . "`(
            `ID` INT NOT NULL AUTO_INCREMENT,
            `title` TEXT NOT NULL, 
            `ticker_label` TEXT, 
            `top_label` TEXT, 
            `scroll_speed` INT, 
            `author_id` INT NOT NULL ,
            `shortcode` VARCHAR(50) NOT NULL , 
            `date` DATE NOT NULL ,
            PRIMARY KEY (`ID`)
        );";
        $wpdb->query($query_create_tickers_table);

        $query_create_news_table = "CREATE TABLE IF NOT EXISTS `" . NEWS_TABLE . "`(
            `ID` INT NOT NULL AUTO_INCREMENT, 
            `ticker_id` INT NOT NULL ,  
            `news` TEXT NOT NULL ,  
            PRIMARY KEY (`ID`),
            FOREIGN KEY (ticker_id) REFERENCES " . TICKERS_TABLE . "(ID)
        );";
        $wpdb->query($query_create_news_table);


        flush_rewrite_rules();
    }
}
