<?php

require_once 'connect.php';

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
    <a class="exit" href="../validation/signon.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  <nav class="site-nav">
      <ul>
        <li><a href="menu-sales-manager-1.php"><i class="site-nav--icon"></i>Клиентская база/Продажа абонементов</a></li> 
        <li><a href="menu-sales-manager-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
        <li><a href="menu-sales-manager-3.php"><i class="site-nav--icon"></i>Абонементы</a></li>
      </ul> 
  </nav>
</div>
</header>
<div class="background">
  <div class="options">
    <h1> Поиск </h1>
    <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="Код" title="Type in a name">
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Длительность" title="Type in a name">
    <!-- <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Время начала посещения" title="Type in a name"> -->
</div>
    <table id="myTable">
        <tr class="table-type-season-ticket">
            <th>Код</th>
            <!-- <th>Наименование</th> -->
            <th>Длительность (в месяцах)</th>
            <th colspan = "2">Время посещения</th>
            <th>Стоимость</th>
        </tr>
        <?php
            $type = mysqli_query($connect, "SELECT type_pass_id, duration, time_format(`time_start`, '%H:%i'), time_format(`time_end`, '%H:%i'), 
            cost FROM type_pass WHERE `type_pass`.`status` = '1'");
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