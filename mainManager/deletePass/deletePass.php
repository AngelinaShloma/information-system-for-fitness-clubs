<?php

require_once 'connect.php';
$type_pass_id = $_GET['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../../styles/formStyle.scss"/>
</head>
<body>
    <form id = "form" action="/mainManager/deletePass/deletePassAction.php" method="post">
    <input type="hidden" name="id" value="<?= $type_pass_id ?>"/><br>
    <label id="icon"> Вы действительно хотите удалить этот тип абонементов?</label><br>
    <button type="submit">Да</button>
    <a href="../typesOfPasses.php" target="_self" class="button">Нет</a>
    </form>
</body>