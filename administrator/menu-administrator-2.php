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
    <!-- <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="Код" title="Type in a name"> -->
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Длительность" title="Type in a name">
    <!-- <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Время начала посещения" title="Type in a name"> -->
</div>
    <table id="myTable">
        <tr class="table-type-season-ticket">
            <th>Код</th>
            <th>Длительность (в месяцах)</th>
            <th colspan = "2">Время посещения</th>
            <th>Стоимость (в рублях)</th>
        </tr>
        <?php
            $type = mysqli_query($connect, "SELECT type_id, duration, time_format(`time_start`, '%H:%i'), time_format(`time_end`, '%H:%i'), 
            cost FROM type_season_ticket WHERE status = 1");
            if(!$type){
                echo 'Ошибка:' . mysqli_error($connect);
            } else {
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
        ?>
            <tr>
                <td><?= $t[0] ?></td>
                <td><?= $t[1] ?></td>
                <td><?= $t[2] ?></td>
                <td><?= $t[3] ?></td>
                <td><?= $t[4] ?></td>
            </tr>
        <?php
            }
            }
        ?>
    </table>
        </div>
        <script>
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









