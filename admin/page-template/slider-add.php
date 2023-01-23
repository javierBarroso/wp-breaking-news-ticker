<h1>Add Breaking News Slider</h1>

<form method="post">
    <label for="title">Title</label>
    <br>
    <input type="text" name="title">
    <br>
    <br>
    <label for="side_label">Side Label</label>
    <br>
    <input type="text" name="side_label">
    <br>
    <br>
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


<?php

global $wpdb;

$bns_sliders_table = $wpdb -> prefix . 'breaking_news_slider';
$bns_news_table = $wpdb -> prefix . 'breaking_news_news';

if(isset($_POST['save'])){

    $current_date = current_time( 'Y-m-d' );
    $author = wp_get_current_user(  ) -> ID;

    $slider_data = [
        'Id' => null,
        'Title' => $_POST['title'],
        'Side_Label' => $_POST['side_label'],
        'Author_Id' => $author,
        'Date' => $current_date,
        'Shortcode' => '[]',
    ];
    
    $wpdb->insert($bns_sliders_table, $slider_data);

    $query = "SELECT * FROM $bns_sliders_table ORDER BY Id DESC limit 1";
    $sliders = $wpdb->get_results($query, ARRAY_A);
    $nextId = $sliders[0]['Id'];
    $shortcode = "[NEWSSLIDER id='$nextId']";
    
    $wpdb->update($bns_sliders_table, array('Shortcode' => $shortcode), array('Id' => $nextId));

    foreach ($_POST['news'] as $key => $value) {
        
        $news_data = [
            'Slider_Id' => $nextId,
            'News' => $value,
        ];

        $wpdb->insert($bns_news_table, $news_data);
    }

}