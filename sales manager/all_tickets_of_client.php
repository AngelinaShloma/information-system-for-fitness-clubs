<?php

require_once 'connect.php';
include_once 'update_status.php'; 
$client_id = $_GET['id'];
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
        <li><a href="menu-sales-manager-1.php"><i class="site-nav--icon"></i>Клиентская база/Абонементы</a></li> 
        <li><a href="menu-sales-manager-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
      </ul> 
  </nav>
</div>
</header>
<table id="myTable">
  <tr class="table-season-ticket">
    <th>Дата начала</th>
    <th>Дата окончания</th>
    <th>Статус</th>
    <th colspan = "2">Время посещения</th>
    </tr>
    <?php
            $type = mysqli_query($connect, "SELECT season_ticket.type_season_ticket_id, date_format(date_start, '%d-%m-%Y'), date_format(date_end, '%d-%m-%Y'), status, time_format(`time_start`, '%H-%i'), time_format(`time_end`, '%H-%i') FROM season_ticket, type_season_ticket WHERE season_ticket.client_id = '$client_id' AND season_ticket.type_season_ticket_id = type_season_ticket.type_season_ticket_id");
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                ?>
    <tr>
        <td><?= $t[1] ?></td>
        <td><?= $t[2] ?></td>
        <td><?= $t[3] ?></td>
        <td><?= $t[4] ?></td>
        <td><?= $t[5] ?></td>
    </tr>
    <?php
            }
    ?>
    
</table>
<form method="post" action="add_ticket.php">
<input type=hidden name="id" value="<?= $client_id ?>">
<button class="btn-sbmt" type="submit">+ Добавить абонемент</button>
</form>
</body>
</html>