<?php

$bnr_admin = new Breaking_News_Roller_Admin( PLUGIN_NAME , BREAKING_NEWS_ROLLER_VERSION);

$rollers = $bnr_admin->get_rollers();

?>

<div class="warp">
    <h2>Breaking News Rollers</h2>
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
        foreach ($rollers as $key => $roller) {
            
            $html .= '<tr>';
            $html .= '<td>'.$roller['title'].'<td>';
            $html .= '<td>'.get_userdata( $roller['author_id'] ) -> user_login.'</td>';
            $html .= '<td>'.$roller['shortcode'].'<td>';
            $html .= '<td>'.$roller['date'].'<td>';
            $html .= '<td><input type="button" value="Remove" class="remove-slider"><td>';
            $html .= '</tr>';
            echo $html;
            $html = '';
        }
    ?>
</div>