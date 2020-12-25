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
                <h1 class="access">Главный менеджер</h1>
                <a class="exit" href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <nav class="site-nav">
                    <ul>
                        <!-- <li><a href=" timetable.php"><i class="site-nav--icon"></i>Расписание</a></li>  -->
                        <!-- <li><a href="../coach/coach.php"><i class="site-nav--icon"></i>Тренерский состав</a></li> -->
                        <li><a href="typesOfPasses.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
                    </ul> 
                </nav>
            </div>
        </header>
        <div class = "textBlock">
            <h2> Добрый день! </h2>
            <p> Вы осуществили вход в систему в качестве главного менеджера. </p>
        </div>
    </body>
</html>