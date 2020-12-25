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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/pageStyle.scss"/>
</head>
<body>
    <header>
<div class="container">
    <h1 class="access">Администратор</h1>
    <a class="exit" href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  <nav class="site-nav">
      <ul>
        <li><a href="menu-administrator-1.php"><i class="site-nav--icon"></i>Клиентская база</a></li> 
        <li><a href="menu-administrator-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
      </ul> 
  </nav>
</div>
</header>
<div class="background">

<div class="options">
      <h1> Поиск </h1>
      <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="ФИО" title="Type in a name">
      <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Номер телефона" title="Type in a name">
      <p></p>
      <h1> Опции </h1>
      <a href="add_client.php" target="_self" class="button">Добавить нового клиента</a>
  </div>

<table id="myTable">
  <tr class="table-type-season-ticket">
    <!-- <th> </th> -->
    <th>ФИО клиента</th>
    <th>Номер телефона</th>
    <th>Дата рождения</th>
    <th>Возраст</th>
    <th>Пол</th>
  </tr>
        <?php
            $type = mysqli_query($connect, "SELECT `client_id`, `FIO`, `phone`, date_format(`date_of_birth`, '%d-%m-%Y'), ((YEAR(CURRENT_DATE)-YEAR(`date_of_birth`))-(RIGHT(CURRENT_DATE,5)<RIGHT(`date_of_birth`,5)
  )) AS `age`, `sex` FROM client");
            if(!$type){
                echo 'Ошибка:' . mysqli_error($connect);
            } else {
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                ?>
    <tr>
        <!-- <td style="display: none; visibility: hidden;"><?= $t[0] ?></td> -->
        <td><?= $t[1] ?></td>
        <td><?= $t[2] ?></td>
        <td><?= $t[3] ?></td>
        <td><?= $t[4] ?></td>
        <td><?= $t[5] ?></td>
        <td><a class="edit" href="update.php?id=<?= $t[0] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
        <td><a class="passIcon" href="all_tickets_of_client.php?id=<?= $t[0] ?>"><i class="fa fa-id-card-o" aria-hidden="true"></i></a></td>
    </tr>
    <?php
            }
            }
    ?>
    
</table>
          </div>

<script>
    
 var modal = document.getElementById("my_modal");
 var btn = document.getElementById("btn_modal_window");
 var span = document.getElementsByClassName("close_modal_window")[0];

 btn.onclick = function () {
    modal.style.display = "block";
 }

 span.onclick = function () {
    modal.style.display = "none";
 }

 window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
    function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>