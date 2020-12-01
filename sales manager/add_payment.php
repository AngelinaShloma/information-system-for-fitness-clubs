<?php

require_once 'connect.php';

$season_ticket_id = $_GET['id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }  
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #FF8C00 10%, #FFA500 100%);
            color: aliceblue;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 250px;
        }
        
        input {
            margin: 5px 0;
            padding: 10px;
            border: unset;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }
        button, a.button {
            margin-top: 5px;
            padding: 10px;
            border: unset;
            cursor: pointer;
            background: white;
            color: #696969;
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>
<body>
  <form action="/sales manager/add_paymentphp.php" method="post">
    <input type="hidden" name="id" value="<?= $season_ticket_id ?>"/><br>
    <label id="icon">Сумма платежа</label><br>
    <input type="text" name="amount"/><br>
    <button type="submit">Добавить</button>
    <a href="menu-sales-manager-3.php" target="_self" class="button">Отмена</a>
    </form>
</body>