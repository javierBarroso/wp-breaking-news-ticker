<?php

$bnr_admin = new Breaking_News_Roller_Admin(PLUGIN_NAME, BREAKING_NEWS_ROLLER_VERSION);

$bnr_admin->store_roller($_POST);

?>

<h2>New Roller</h2>

<form method="post">
    <label for="title">Title</label>
    <br>
    <input type="text" name="title">
    <br>
    <br>
    <label for="side_label">Side Label</label>
    <br>
    <input type="text" name="roller_label">
    <br>
    <br>
    <label for="top-label">Top Label</label>
    <br>
    <input type="text" name="top_label">
    <br><br>
    <label for="roller-speed">Roller Speed</label>
    <br>
    <input type="number" name="scroll_speed">
    <h3>News List</h3>
    <br>
    <div class="news_container" id="news_container">
        <div class="news-input" id="news-1">
            <input type="text" name="news[]"><input type="button" value="X" onclick="delete_news('news-1')">
            <br><br>
        </div>
    </div>
    <br>
    <a id="add_news_button" onclick="add_news()">Add News</a>
    <br><br>
    <button type="submit" name="save">Save</button>
    <div>
        
    </div>
</form>