<?php


class Breaking_News_Ticker_ShortCode
{
    /**
     * returns the html for the public side of the site
     * 
     * @since   1.0.0
     */
    public static function print($id)
    {
        global $wpdb;

        $query1 = "SELECT * FROM " . TICKERS_TABLE . " WHERE ID = " . $id["id"] . "";
        $query2 = "SELECT * FROM " . NEWS_TABLE . " WHERE ticker_id = " . $id["id"] . "";

        $ticker = $wpdb->get_results($query1)[0];

        $news = $wpdb->get_results($query2, ARRAY_A);

        $show_top_label = $ticker->top_label == '' ? 'display:none' : '';

        $news_text = '';

        $html = '<div class="ticker-container ' . $ticker->ticker_style . '">';

        $html .= '<div class="heading"><div style="' . $show_top_label . '" class="over-label">'. $ticker->top_label .'</div><div class="main-text"><span></span><span class="label">' . $ticker->ticker_label . '</span></div></div>';

        foreach ($news as $value) {
            $news_text .= $value['news'] . '   //   ';
        }

        $html .= '<div class="scroller"><marquee scrollamount="' . $ticker->scroll_speed . '" direction="" height="100%" vspace="50%">' . $news_text . '</marquee></div>';

        $html .= '</div>';

        return $html;
    }
}
