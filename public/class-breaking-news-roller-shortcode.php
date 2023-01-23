<?php
class Breaking_News_Roller_ShortCode{

    function print($id){
        global $wpdb;


        $query1 = "SELECT * FROM ".ROLLERS_TABLE." WHERE ID = ".$id["id"]."";
        $query2 = "SELECT * FROM ".NEWS_TABLE." WHERE roller_id = ".$id["id"]."";

        $roller = $wpdb->get_results($query1, ARRAY_A);

        $news = $wpdb->get_results($query2, ARRAY_A);

        $news_text = '';

        $html = '<div class="breaking-news-slider-container">';
        
        $html .= '<div class="slider-label">'.$roller[0]['roller_label'].'</div>';

        foreach ($news as $key => $value) {
            $news_text .= $value['news'] . ' // ';
        }

        $html .= '<marquee speed=10 class="slider" width="100%" behavior="" direction="">'.$news_text.'</marquee>';
        
        $html .= '</div>';

        return $html;
    }
}