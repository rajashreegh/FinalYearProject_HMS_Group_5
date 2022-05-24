<?php

require 'db_config.php';

$filter_options=$_POST['filter_options'];

foreach ($filter_options as $fo) {
	echo '<b class="opt">'.$fo.'<i class="fas fa-times remove_filter"></i></b>';
}

?>