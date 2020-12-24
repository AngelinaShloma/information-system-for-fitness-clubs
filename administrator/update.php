<?php
session_start();
require_once '../validation/connect.php';
if (!isset($_SESSION['user']['id']) || $_SESSION['user']['id'] == '') {
        echo '
        <script>
          alert("Вы не вошли в систему");
        </script>
        ';
     header('Location: ../index.php');
    }
if ($_SESSION['user']['id'] != 1){
    echo '
        <script>
          alert("Вы не имеете доступа к этой странице");
        </script>
        ';
     header('Location: ../index.php');
}
$client_id = $_GET['id'];
$client = mysqli_query($connect, "SELECT `client_id`, `FIO`, `phone`, `date_of_birth`, `sex` FROM client WHERE client_id = '$client_id' ");
if(!$client){
    echo 'Ошибка:' .mysqli_error($connect);
}else{
$client = mysqli_fetch_assoc($client);
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/formStyle.scss"/>
</head>
<body>
  <form action="/administrator/updatephp.php" method="post">
    <input type="hidden" name="id" value="<?= $client['client_id'] ?>"/>
    <label id="icon">ФИО</label><br>
    <input type="text" name="FIO" value="<?= $client['FIO'] ?>"/><br>
    <label id="icon">Номер телефона</label><br>
    <input type="text" name="phone"value="<?= $client['phone'] ?>"/><br>
    <label id="icon">Дата рождения</label><br>
    <input type="text" name="birth" value="<?= date("d-m-Y", strtotime($client['date_of_birth'])) ?>"/><br>
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
    <a href="menu-administrator-1.php" target="_self" class="button">Отмена</a>
    </form>
</body>
</html>