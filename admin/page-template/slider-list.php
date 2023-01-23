<?php

global $wpdb;

$bns_sliders_table = $wpdb -> prefix . 'breaking_news_slider';

$query = "SELECT * FROM $bns_sliders_table";

$sliders = $wpdb -> get_results($query, ARRAY_A);

if(empty($sliders)){
    $sliders = array();
}

?>


<h1>Breaking News Slider</h1>

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

            foreach ($sliders as $key => $slider) {
                echo "<tr>
                            <td>".$slider['Title']."</td>
                            <td>".get_userdata( $slider['Author_Id'] ) -> user_login."</td>
                            <td>".$slider['Shortcode']."</td>
                            <td>".$slider['Date']."</td>
                            <td><input type='button' value='Remove' class='remove-slider'></td>
                        </tr>";
            }
            ?>
            
            
        </tbody>
    </table>
    <br><br>

 