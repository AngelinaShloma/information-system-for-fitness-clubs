<?php

require_once 'connect.php';

$client_id = $_GET['id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/formStyle.scss"/>
     <!--   <style>
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
    </style>-->
</head>
<body>
  <form action="/sales manager/add_ticketphp.php" method="post">
    <label id="icon">Тип абонемента</label><br>
    <input type="text" name="type"/><br>
    <input type="hidden" name="id" value="<?= $client_id ?>"/><br>
    <label id="icon">Дата начала</label><br>
    <input id="datefield" type="date" name="date_start" min=""/><br>
    <label id="icon">Сумма</label><br>
    <input type="text" name="amount"/><br>
    <label id="icon">Способ оплаты</label><br>
      <div class="gender">
          <input type="radio" value="card" id="card" name="way" checked/>
          <label for="male" class="radio" chec>Карта</label>
          <input type="radio" value="cash" id="cash" name="way" />
          <label for="female" class="radio">Наличные</label>
      </div>
    <button type="submit">Добавить</button>
    <a href="menu-sales-manager-1.php" target="_self" class="button">Отмена</a>
    </form>
    <script>
        var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);
    </script>
</body>