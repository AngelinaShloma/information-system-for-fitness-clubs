<?php

require_once 'connect.php';
$today = date("Y-m-d");
mysqli_query($connect, "UPDATE season_ticket SET status = 'не активен' WHERE date_end <= '$today' OR status = 'активен' WHERE date_start >= '$today'");
?>