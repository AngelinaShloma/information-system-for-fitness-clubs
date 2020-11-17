<?php
$connect = mysqli_connect("127.0.0.1", "mysql", "mysql", "users");

if (!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
