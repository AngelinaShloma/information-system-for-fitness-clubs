<?php

require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../../styles/pageStyle.scss"/>
</head>
<body>
    <header>
    <div class="container">
        <h1 class="access">Главный менеджер</h1>
        <a class="exit" href="../../validation/signon.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <nav class="site-nav">
            <ul>
                <!-- <li><a href=" timetable.php"><i class="site-nav--icon"></i>Расписание</a></li>  -->
                <!-- <li><a href="../coach/coach.php"><i class="site-nav--icon"></i>Тренерский состав</a></li> -->
                <li><a href="../typesOfPasses/typesOfPasses.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
            </ul> 
        </nav>
    </div>
    </header>
    <!-- <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="ФИО" title="Type in a name">
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Номер телефона" title="Type in a name"> -->
    <a href="../addPass/AddPass.html" target="_self" class="button">+ Добавить абонемент</a>

    <table id="myTable">
        <tr class="table-type-season-ticket">
            <th>Код</th>
            <!-- <th>Наименование</th> -->
            <th>Длительность (в месяцах)</th>
            <th colspan = "2">Время посещения</th>
            <!-- <th> </th> -->
            <th>Стоимость (в рублях)</th>

        </tr>
        <?php
            $type = mysqli_query($connect, "SELECT * FROM type_season_ticket");
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
        ?>
            <tr>
                <td><?= $t[0] ?></td>
                <td><?= $t[1] ?></td>
                <td><?= $t[2] ?></td>
                <td><?= $t[3] ?></td>
                <td><?= $t[4] ?></td>
                <td><a class="delete" href="add_payment.php?id=<?= $t[0] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
        <?php
                }
        ?>
    </table>

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