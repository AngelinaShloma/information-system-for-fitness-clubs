<?php

require_once 'connect.php';

$client_id = $_POST['id'];
$type = $_POST['type'];
$date_start = date('Y-m-d',strtotime($_POST['date_start']));
$number = substr($type, -2);
$date_end = date('Y-m-d', strtotime('+' .$number. 'MONTH', strtotime($date_start)));
if ($date_start == date("Y-m-d")){
    $status = 'активен';
} else {
    $status = 'не активен';
}
$today = date('Y-m-d');
$way = $_POST['way'];

mysqli_query($connect, "INSERT INTO season_ticket (status, date_start, date_end, client_id, type_season_ticket_id, payment_method, date_of_payment) VALUES ('$status', '$date_start', '$date_end', '$client_id', '$type', '$way', '$today') ");

header('Location: all_tickets_of_client.php?id=' .$client_id);

?>