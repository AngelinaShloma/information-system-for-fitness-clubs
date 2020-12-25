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
      <h1 class="access">Администратор</h1>
      <a class="exit" href="../validation/signon.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <nav class="site-nav">
        <ul>
          <li><a href="menu-sales-manager-1.php"><i class="site-nav--icon"></i>Клиентская база/Продажа абонементов</a></li> 
          <li><a href="menu-sales-manager-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
          <li><a href="menu-sales-manager-3.php"><i class="site-nav--icon"></i>Абонементы</a></li>
        </ul> 
    </nav>
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

  <div class="table">
    <table id="myTable">
      <tr class="table-type-season-ticket">
        <th> </th>
        <th>ФИО клиента</th>
        <th>Номер телефона</th>
        <th>Дата рождения</th>
        <th>Возраст</th>
        <th>Пол</th>
      </tr>
            <?php
                $type = mysqli_query($connect, "SELECT `client_id`, `FIO`, `phone`, date_format(`date_of_birth`, '%d-%m-%Y'), ((YEAR(CURRENT_DATE)-YEAR(`date_of_birth`))-(RIGHT(CURRENT_DATE,5)<RIGHT(`date_of_birth`,5)
      )) AS `age`, `sex` FROM client");
                $type = mysqli_fetch_all($type);
                foreach ($type as $t) {
                    ?>
        <tr>
            <td><a class="edit" href="update.php?id=<?= $t[0] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td style="display: none; visibility: hidden;"><?= $t[0] ?></td>
            <td><?= $t[1] ?></td>
            <td><?= $t[2] ?></td>
            <td><?= $t[3] ?></td>
            <td><?= $t[4] ?></td>
            <td><?= $t[5] ?></td>
            <td><a class="edit" href="add_ticket.php?id=<?= $t[0] ?>"><i class="fa fa-id-card-o" aria-hidden="true"></i></a></td>
        </tr>
        <?php
                }
        ?>
        
    </table>
  </div>
</div>

<script>
  function myFunction1() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
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
      td = tr[i].getElementsByTagName("td")[3];
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