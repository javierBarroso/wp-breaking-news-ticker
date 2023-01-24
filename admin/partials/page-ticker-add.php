<?php

$bnr_admin = new Breaking_News_Ticker_Admin(PLUGIN_NAME, BREAKING_NEWS_TICKER_VERSION);

$bnr_admin->store_ticker($_POST);

?>

<h3>New Ticker</h3>

<form method="post">


<table class="form-table">
    <tbody id="news-container">
        <tr>
            <th scope="row"><label for="title">Title</label></th>
            <td><input type="text" name="title" id="title" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="ticker_label">Ticker Label</label></th>
            <td><input type="text" name="ticker_label" id="ticker_label" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="top_label">Top Label</label></th>
            <td><input type="text" name="top_label" id="top_label" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="scroll_speed">Ticker Speed</label></th>
            <td><input min=0 type="number" name="scroll_speed" id="scroll_speed" class="regular-number"></td>
        </tr>
        <tr>
            <th>
                <h3>News list</h3>
            </th>
        </tr>
        <tr id="news-container-1">
            <th><label for="news-1">News 1</label></th>
            <td>
                <textarea class="regular-text" name="news[]" id="news-1" cols="30" rows="10"></textarea>
                <input class="button button-secondary" type="button" value="Delete" onclick="delete_news('news-container-1')">
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>
                <a id="add_news_button" class="button button-secondary" onclick="add_news()">Add News</a>
            </th>
        </tr>
        <tr>
            <th>
                <button type="submit" class="button button-primary" name="save">Save Ticker</button>
            </th>
        </tr>
    </tfoot>
</table>






