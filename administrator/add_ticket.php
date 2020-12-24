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
$client_id = $_POST['id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/formStyle.scss"/>
     <style>
        select {
            border-radius: 10px;
            margin: 5px 0;
            padding: 10px;
            border: unset;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }
         option {
            border-radius: 2px;
            padding: 5px;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
         }
    </style>
</head>
<body>
  <form action="/administrator/add_ticketphp.php" method="post">
    <label id="icon">Тип абонемента</label><br>
    <?php
$query = mysqli_query($connect, "SELECT type_season_ticket_id FROM type_season_ticket WHERE status_ticket = 1");
echo "<select name = 'type'>";
while($object = mysqli_fetch_object($query)){
echo "<option value = '$object->type_season_ticket_id' > $object->type_season_ticket_id </option>";
}
echo "</select>";
?>
    
    <input type="hidden" name="id" value="<?= $client_id ?>"/><br>
    <label id="icon">Дата начала</label><br>
    <input id="datefield" type="date" name="date_start" min=""/><br>
    <label id="icon">Способ оплаты</label><br>
      <div class="gender">
          <input type="radio" value="Карта" id="card" name="way" checked/>
          <label for="male" class="radio" chec>Карта</label>
          <input type="radio" value="Наличные" id="cash" name="way" />
          <label for="female" class="radio">Наличные</label>
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
document.getElementById("datefield").setAttribute("min", today);
    </script>
</body>