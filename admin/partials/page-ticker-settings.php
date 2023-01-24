<?php

$bnr_admin = new Breaking_News_Ticker_Admin(PLUGIN_NAME, BREAKING_NEWS_TICKER_VERSION);

$ticker_data = $bnr_admin->get_ticker_and_news('1');

var_dump(admin_url( 'admin.php?page=page-ticker-add.php'));

?>

<h2>Ticker Settings</h2>