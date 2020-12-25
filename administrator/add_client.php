<?php
session_start();
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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/formStyle.scss"/>
</head>
<body>
  <form action="/administrator/add_clientphp.php" method="post">
    <label id="icon">ФИО</label><br>
    <input type="text" name="FIO" required = "required" pattern="^[А-Яа-яЁё\s]+$"/><br>
    <label id="icon">Номер телефона</label><br>
    <input type="tel" name="phone" required = "required" pattern="8[0-9]{10}"/><br>
    <label id="icon">Дата рождения</label><br>
    <input id="datefield" type="date" name="birth" required = "required" 
          min="1910-01-01" max=""/><br>
       <div class="gender">
          <label id="icon">Пол</label><br>
          <input type="radio" value="м" id="male" name="gender" checked/>
          <label for="male" class="radio" chec>М</label>
          <input type="radio" value="ж" id="female" name="gender" />
          <label for="female" class="radio">Ж</label>
       </div> 
    <button type="submit">Добавить</button>
    <a href="menu-administrator-1.php" target="_self" class="button">Отмена</a>
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
document.getElementById("datefield").setAttribute("max", today);
</script>
</body>