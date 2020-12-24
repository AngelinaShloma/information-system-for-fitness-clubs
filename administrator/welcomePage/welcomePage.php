<?php
session_start();
require_once '../../validation/connect.php';
 if (!isset($_SESSION['user']['id']) || $_SESSION['user']['id'] == '') {
        echo '
        <script>
          alert("Вы не вошли в систему");
        </script>
        ';
     header('Location: ../../index.php');
    }
if ($_SESSION['user']['id'] != 1){
    echo '
        <script>
          alert("Вы не имеете доступа к этой странице");
        </script>
        ';
     header('Location: ../../index.php');
}
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
    <a class="exit" href="../../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  <nav class="site-nav">
      <ul>
        <li><a href="../menu-administrator-1.php"><i class="site-nav--icon"></i>Клиентская база/Продажа абонементов</a></li> 
        <li><a href="../menu-administrator-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
      </ul> 
  </nav>
</div>
</header>
<div class = "textBlock">
        <h2> Добрый день! </h2>
        <p> Вы осуществили вход в систему в качестве администратора. </p>
    </div>
</body>
</html>