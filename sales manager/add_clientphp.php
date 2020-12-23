<?php

require_once 'connect.php';
    
$fio = $_POST['FIO'];
$phone = $_POST['phone'];
$birth = date('Y-m-d',strtotime($_POST['birth']));
$gender = $_POST['gender'];

mysqli_query($connect, "INSERT INTO client (FIO, phone, date_of_birht, sex) VALUES ('$fio', '$phone', '$birth', '$gender')");
header('Location: menu-sales-manager-1.php');

?>