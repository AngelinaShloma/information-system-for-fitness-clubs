<?php

require_once 'connect.php';
    
// $id = $_POST['type_season_ticket_id'];
$duration = $_POST['duration'];
// $birth = date('Y-m-d',strtotime($_POST['birth']));
$start = time('hh:mm',strtotime($_POST['startTime']));
$end = time('hh:mm',strtotime($_POST['endTime']));
$cost = $_POST['cost'];

mysqli_query($connect, "INSERT INTO type_season_ticket ( duration, startTime, endTime, cost) VALUES ( '$duration', '$start', '$end', $cost)");
header('Location: ../typesOfPasses/typesOfPasses.php');

?>