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
    <h1 class="access">Администратор</h1>
    <a class="exit" href="../../validation/signon.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  <nav class="site-nav">
      <ul>
        <li><a href="menu-sales-manager-1.php"><i class="site-nav--icon"></i>Клиентская база/Продажа абонементов</a></li> 
        <li><a href="menu-sales-manager-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
        <li><a href="menu-sales-manager-3.php"><i class="site-nav--icon"></i>Запись</a></li>
      </ul> 
  </nav>
</div>
</header>
<div class = "textBlock">
        <p> Выберите тренера </p>
    <div class="column">
    <?php
            $type = mysqli_query($connect, "SELECT `FIO`, `coach_id` FROM coach");
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                ?>
<a href="timetable_coach.php?id=<?= $t[1] ?>"><i><?= $t[0] ?></i></a>
<br><br>
        
    <?php
            }
    ?>
    </div>
    </div>
</body>
</html>