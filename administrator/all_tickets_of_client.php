<?php
session_start();
require_once '../validation/connect.php';
$client_id = $_GET['id'];
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
        <li><a href="menu-administrator-1.php"><i class="site-nav--icon"></i>Клиентская база/Абонементы</a></li> 
        <li><a href="menu-administrator-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
      </ul> 
  </nav>
</div>
</header>
<table id="myTable">
  <tr class="table-season-ticket">
    <th>Период (в месяцах)</th>
    <th>Дата начала</th>
    <th>Дата окончания</th>
    <th colspan = "2">Время посещения</th>
    <th>Статус</th>
    </tr>
    <?php
            $type = mysqli_query($connect, "SELECT season_ticket.type_season_ticket_id, date_format(date_start, '%d-%m-%Y'), duration, time_format(`time_start`, '%H-%i'), time_format(`time_end`, '%H-%i') FROM season_ticket, type_season_ticket WHERE season_ticket.client_id = '$client_id' AND season_ticket.type_season_ticket_id = type_season_ticket.type_season_ticket_id");
            if(!$type){
                echo 'Ошибка:' . mysqli_error($connect);
            } else {
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                $status='';
                if((date('Y-m-d', strtotime('+' .$t[2]. 'MONTH', strtotime($t[1]))) > date('Y-m-d')) && (date('Y-m-d', strtotime($t[1])) <= date('Y-m-d'))){
                    $status = 'активен';
                }else{
                    $status = 'не акитвен';
                }
                ?>
    <tr>
        <td><?= $t[2] ?></td>
        <td><?= $t[1] ?></td>
        <td><?= date('d-m-Y', strtotime('+' .$t[2]. 'MONTH', strtotime($t[1]))) ?></td>
        <td><?= $t[3] ?></td>
        <td><?= $t[4] ?></td>
        <td><?= $status ?></td>
    </tr>
    <?php
            }
            }
    ?>
    
</table>
<form method="post" action="add_ticket.php">
<input type=hidden name="id" value="<?= $client_id ?>">
<button class="btn-sbmt" type="submit">+ Добавить абонемент</button>
</form>
</body>
</html>