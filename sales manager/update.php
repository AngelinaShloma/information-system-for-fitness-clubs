<?php

require_once 'connect.php';

$client_id = $_GET['id'];
$client = mysqli_query($connect, "SELECT `client_id`, `FIO`, `phone`, `date_of_birht`, `sex` FROM client WHERE client_id = '$client_id' ");
$client = mysqli_fetch_assoc($client);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/formStyle.scss"/>
       <!-- <style>
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
    </style> -->
</head>
<body>
  <form action="/sales manager/updatephp.php" method="post">
    <input type="hidden" name="id" value="<?= $client['client_id'] ?>"/>
    <label id="icon">ФИО</label><br>
    <input type="text" name="FIO" value="<?= $client['FIO'] ?>"/><br>
    <label id="icon">Номер телефона</label><br>
    <input type="text" name="phone"value="<?= $client['phone'] ?>"/><br>
    <label id="icon">Дата рождения</label><br>
    <input type="text" name="birth" value="<?= date("d-m-Y", strtotime($client['date_of_birht'])) ?>"/><br>
       <div class="gender">
          <label id="icon">Пол</label><br>
           <?php
    if($client['sex'] == 'м'){

	echo <<<HTML

		<input type="radio" value="м" id="male" name="gender" checked/>
          <label for="male" class="radio" >М</label>
          <input type="radio" value="ж" id="female" name="gender" />
          <label for="female" class="radio">Ж</label>

HTML;
    } else {
        echo <<<HTML

		  <input type="radio" value="м" id="male" name="gender"/>
          <label for="male" class="radio">М</label>
          <input type="radio" value="ж" id="female" name="gender" checked/>
          <label for="female" class="radio">Ж</label>

HTML;
    }

?>
       </div> 
    <button type="submit">Обновить</button>
    <a href="menu-sales-manager-1.php" target="_self" class="button">Отмена</a>
    </form>
</body>
</html>