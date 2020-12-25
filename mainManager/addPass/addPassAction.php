<?php

require_once 'connect.php';
    
$duration = $_POST['duration'];
$time_start = $_POST['time_start'];
$time_end = $_POST['time_end'];
$cost = $_POST['cost'];

mysqli_query($connect, "INSERT INTO type_season_ticket (duration, time_start, time_end, cost) VALUES ( '$duration', '$time_start', '$time_end', $cost)");
header('Location: ../typesOfPasses.php');

?>