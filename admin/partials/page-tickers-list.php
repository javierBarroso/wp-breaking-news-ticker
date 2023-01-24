<?php

$bnr_admin = new Breaking_News_Ticker_Admin(PLUGIN_NAME, BREAKING_NEWS_TICKER_VERSION);

$tickers = $bnr_admin->get_tickers();

?>

<div class="wrap">
    <h2>Breaking News Tickers</h2>
    <br>
    <a id="btn_nuevo" class="page-title-action" href="?page=wp-breaking-news-slider%2Fadmin%2Fpage-template%2Fslider-add.php">Add New</a>

    <br>
    <table>
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Shortcode</th>
            <th>Date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $html = '';
            foreach ($tickers as $key => $ticker) {

                $html .= '<tr>';
                $html .= '<td>' . $ticker['title'] . '<td>';
                $html .= '<td>' . get_userdata($ticker['author_id'])->user_login . '</td>';
                $html .= '<td>' . $ticker['shortcode'] . '<td>';
                $html .= '<td>' . $ticker['date'] . '<td>';
                $html .= '<td><input type="button" value="Remove" class="remove-slider"><td>';
                $html .= '</tr>';
                echo $html;
                $html = '';
            }
            ?>



            <!-- <div class="container">

    <div class="box">
        <div>
            <h2>Hello World</h2>
        </div>
        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
</div>
</div>

<style>
    .container{
perspective: 500px;
width: fit-content;
height: fit-content;
    }
    .container:hover>.box{
        transform: rotate3d(0,1,0,180deg);
        transition-duration: 3s;
        transition-timing-function: ease-in-out;
    }
.box{
    border: solid 2px red;
    border-radius: 1rem;
    transform-style: preserve-3d;
    width: 200px;
    height: 200px;
    margin: auto;
    transition-duration: 3s;
    transition-timing-function: ease-in-out;
    background-color: #524162;
}

.box div{
    display: block;
    color: white;
transform: translate3d(0px,0px,100px);
text-align: center;

margin: 20%;
}
</style> -->
</div>