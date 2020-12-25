<?php

require_once 'connect.php';

$type_id = $_POST['id'];

mysqli_query($connect, "UPDATE `type_season_ticket` SET `status` = '0' WHERE `type_season_ticket`.`type_id` = '$type_id';");

/* close connection */
// mysqli_close($connect);

header('Location: ../typesOfPasses.php');
?>