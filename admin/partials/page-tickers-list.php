<?php

namespace adm;

$bnr_admin = new Breaking_News_Ticker_Admin(PLUGIN_NAME, BREAKING_NEWS_TICKER_VERSION);

$tickers = $bnr_admin->get_tickers();

$add_ticker = 'admin.php?page=bnt-add';

$edit_ticker = 'admin.php?page=bnt-add&ticker=';

?>

<div class="wrap">
    <h2>Breaking News Tickers</h2>
    <br>
    <a id="btn_nuevo" class="button button-primary" href="<?= $add_ticker ?>">Add New</a>

    <br>
    <br>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <td id="cb" class="manage-column column-cb check-column">
                    <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                    <input id="cb-select-all-1" type="checkbox">
                </td>
                <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                    <span>Title</span>
                </th>
                <th scope="col" id="author" class="manage-column column-author">Author</th>
                <th scope="col" id="shortcode" class="manage-column column-shortcode">Shortcode</th>
                <th scope="col" id="date" class="manage-column column-date sortable asc">
                    <a href="javascript:void(0)">
                        <span>Date</span><span class="sorting-indicator"></span>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody id="the-list">
            <?php
            $html = '';
            foreach ($tickers as $key => $ticker) {

                $html .= '<tr id="post-'.$key.'" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-Dummy category">';
                $html .= '<th scope="row" class="check-column">
                                <label class="screen-reader-text" for="cb-select-1">Select Post #1</label>
                                <input id="cb-select-1" type="checkbox" name="post[]" value="1">
                                <div class="locked-indicator">
                                    <span class="locked-indicator-icon" aria-hidden="true"></span>
                                    <span class="screen-reader-text">
                                        “Post #'.$key.'” is locked
                                    </span>
                                </div>
                            </th>';
                $html .= '<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">' . $ticker['title'] . ' <div class="row-actions">
                <span class="edit"><a href="'. $edit_ticker . $ticker['ID'] . '" aria-label="Edit “Post #1”">Edit</a> | </span>
                <span class="trash"><a href="javascript:void(0)" class="submitdelete" aria-label="Move “Post #1” to the Trash">Trash</a></div></td>';
                $html .= '<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">' . get_userdata($ticker['author_id'])->user_login . '</td>';
                $html .= '<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">' . $ticker['shortcode'] . '</td>';
                $html .= '<td>' . $ticker['date'] . '</td>';
                $html .= '</tr>';
                echo $html;
                $html = '';
            }
            ?>
            <tfoot>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column">
                        <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                        <input id="cb-select-all-1" type="checkbox">
                    </td>
                    <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                        <span>Title</span>
                    </th>
                    <th scope="col" id="author" class="manage-column column-author">Author</th>
                    <th scope="col" id="shortcode" class="manage-column column-shortcode">Shortcode</th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc">
                        <a href="javascript:void(0)">
                            <span>Date</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                </tr>
            </tfoot>
        </tbody>
    </table>
</div>