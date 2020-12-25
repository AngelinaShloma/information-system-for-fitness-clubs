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
        <li><a href="menu-sales-manager-3.php"><i class="site-nav--icon"></i>Абонементы</a></li>
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