<?php

require_once 'connect.php';

$client_id = $_POST['id'];
$fio = $_POST['FIO'];
$phone = $_POST['phone'];
$birth = date('Y-m-d',strtotime($_POST['birth']));
$gender = $_POST['gender'];

mysqli_query($connect, "UPDATE client SET FIO = '$fio', phone = '$phone', date_of_birht = '$birth', sex = '$gender' WHERE client_id = '$client_id' ");
header('Location: menu-sales-manager-1.php');

?>