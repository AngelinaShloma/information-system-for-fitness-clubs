<?php

require_once 'connect.php';
$season_ticket_id = $_POST['id'];
$amount = $_POST['amount'];
$date = date("Y-m-d");
mysqli_query($connect, "INSERT INTO payment (amount, date, season_ticket_id) VALUES ('$amount', '$date', '$season_ticket_id') ");


header('Location: menu-sales-manager-3.php');
?>