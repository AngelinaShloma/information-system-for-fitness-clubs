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
        <li><a href="menu-administrator-1.php"><i class="site-nav--icon"></i>Клиентская база/Абонементы</a></li> 
        <li><a href="menu-administrator-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
      </ul> 
  </nav>
</div>
</header>

    <table id="myTable">
        <tr class="table-type-season-ticket">
            <th>Код</th>
            <th>Длительность (в месяцах)</th>
            <th colspan = "2">Время посещения</th>
            <th>Стоимость</th>
        </tr>
        <?php
            $type = mysqli_query($connect, "SELECT type_season_ticket_id, duration, time_format(`time_start`, '%H-%i'), time_format(`time_end`, '%H-%i'), cost FROM type_season_ticket WHERE status_ticket = 1");
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
</body>
</html>