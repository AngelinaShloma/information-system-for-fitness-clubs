<?php

require_once 'connect.php';
include_once 'update_status.php'; 

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
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ФИО" title="Type in a name">

<table id="myTable">
  <tr class="table-season-ticket">
    <th>Код</th>
    <th>ФИО клиента</th>
    <th>Дата начала</th>
    <th>Дата окончания</th>
    <th>Статус</th>
    <th>Сумма</th>
    <th>Дата оплаты</th>
    <th>Способ оплаты</th>
  </tr>
        <?php
            $type = mysqli_query($connect, "SELECT season_ticket.season_ticket_id, FIO, date_format(date_start, '%d-%m-%Y'), date_format(date_end, '%d-%m-%Y'), status, amount, date_format(date_of_amount, '%d-%m-%Y'), payment_method FROM season_ticket, client WHERE season_ticket.client_id = client.client_id");
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                ?>
    <tr>
        <td><?= $t[0] ?></td>
        <td><?= $t[1] ?></td>
        <td><?= $t[2] ?></td>
        <td><?= $t[3] ?></td>
        <td><?= $t[4] ?></td>
        <td><?= $t[5] ?></td>
        <td><?= $t[6] ?></td>
        <td><?= $t[7] ?></td>
    </tr>
    <?php
            }
    ?>
    
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
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