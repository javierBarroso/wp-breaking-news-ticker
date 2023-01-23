<?php
class printNewsSliderShortCode{

    function print($id){
        global $wpdb;

        $bns_sliders_table = $wpdb -> prefix . 'breaking_news_slider';
        $bns_news_table = $wpdb -> prefix . 'breaking_news_news';

        $query1 = "SELECT * FROM $bns_sliders_table WHERE Id = '$id'";
        $query2 = "SELECT * FROM $bns_news_table WHERE Slider_Id = '$id'";

        $slider = $wpdb->get_results($query1, ARRAY_A);

        $news = $wpdb->get_results($query2, ARRAY_A);

        $news_text = '';

        $html = '<div class="breaking-news-slider-container">';
        
        $html .= '<div class="slider-label">'.$slider[0]['Side_Label'].'</div>';

        foreach ($news as $key => $value) {
            $news_text .= $value['News'] . ' // ';
        }

        $html .= '<marquee speed=10 class="slider" width="100%" behavior="" direction="">'.$news_text.'</marquee>';
        
        $html .= '</div>';

        return $html;
    }
}