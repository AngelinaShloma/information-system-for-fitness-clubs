<?php

require_once 'connect.php';

$client_id = $_POST['id'];
$type = $_POST['type'];
$date_start = date('Y-m-d',strtotime($_POST['date_start']));
if ($date_start == date("Y-m-d")){
    $status = 'активен';
} else {
    $status = 'не активен';
}
$query = "SELECT duration FROM type_season_ticket WHERE type_season_ticket_id = '$type';";
$query .= "INSERT INTO season_ticket (status, date_start, date_end, client_id, type_season_ticket_id) 
VALUES ('$status', '$date_start', '$date_end', '$client_id', '$type_season_ticket_id')";
if (mysqli_multi_query($connect, $query)) {
    do {
        if ($result = mysqli_use_result($connect)) {
            while ($row = mysqli_fetch_row($result)) {
                $date_end = $row[0];
            }
        }
    } while (mysqli_next_result($connect));
}

/* close connection */
mysqli_close($connect);

header('Location: menu-sales-manager-3.php');
?>