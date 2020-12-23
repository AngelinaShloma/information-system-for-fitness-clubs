<?php
$connect = mysqli_connect("127.0.0.1", "nata", "nata", "fitnessclub");

if (!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
