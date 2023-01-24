<?php
class Breaking_News_Ticker_ShortCode
{

    function print($id)
    {
        global $wpdb;


        $query1 = "SELECT * FROM " . TICKERS_TABLE . " WHERE ID = " . $id["id"] . "";
        $query2 = "SELECT * FROM " . NEWS_TABLE . " WHERE ticker_id = " . $id["id"] . "";

        $ticker = $wpdb->get_results($query1, ARRAY_A);

        $news = $wpdb->get_results($query2, ARRAY_A);

        $news_text = '';

        $html = '<div class="ticker-container">';

        $html .= '<div class="heading"><div class="over-label">'. $ticker[0]['top_label'] .'</div><div class="main-text"><span></span><span class="label">' . $ticker[0]['ticker_label'] . '</span></div></div>';

        foreach ($news as $key => $value) {
            $news_text .= $value['news'] . ' // ';
        }

        $html .= '<div class="scroller"><marquee behavior="" direction="" height="100%" vspace="50%">' . $news_text . '</marquee></div>';

        $html .= '</div>';

        return $html;
    }
}
