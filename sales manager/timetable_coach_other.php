<?php

require_once 'connect.php';
$coach_id = $_GET['id'];
$day = $_GET['date'];
$time_now = date('Y-m-d H:i:s');
$time = date('H:i', strtotime('+10 minute', strtotime($time_now)));
$days = array(
);
for($i = 0; $i < 8; $i++){
     $days[$i] = date('Y-m-d', strtotime('+' .$i. 'days', strtotime(date('Y-m-d'))));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/pageStyle.scss"/>
    <style>
  .time-btn {
  text-decoration: none;
  display: inline-block;
  width: 140px;
  height: 45px;
  line-height: 45px;
  border-radius: 45px;
  margin: 10px 20px;
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 3px;
  font-weight: 600;
  color: white;
  background: rgb(88, 160, 66);
  box-shadow: 0 8px 15px rgba(0, 0, 0, .1);
  transition: .3s;
}
  .time-late-btn{
  text-decoration: none;
  display: inline-block;
  width: 140px;
  height: 45px;
  line-height: 45px;
  border-radius: 45px;
  margin: 10px 20px;
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 3px;
  font-weight: 600;
  color: white;
  background: #A9A9A9;
  box-shadow: 0 8px 15px rgba(0, 0, 0, .1);
  transition: .3s;
  cursor: default;
}
.time-btn:hover {
  background: rgb(88, 160, 66);
  box-shadow: 0 15px 20px rgba(88, 160, 66, .4);
  color: white;
  transform: translateY(-7px);
}
    </style>
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
<label for="start">Выберите дату: </label>
<a class="date_t" href="timetable_coach.php?id=<?=$coach_id ?>"><i><?= date('d.m', strtotime($days[0])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[1] ?>"><i><?= date('d.m', strtotime($days[1])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[2] ?>"><i><?= date('d.m', strtotime($days[2])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[3] ?>"><i><?= date('d.m', strtotime($days[3])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[4] ?>"><i><?= date('d.m', strtotime($days[4])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[5] ?>"><i><?= date('d.m', strtotime($days[5])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[6] ?>"><i><?= date('d.m', strtotime($days[6])) ?></i></a>
<a class="date_t" href="timetable_coach_other.php?id=<?=$coach_id ?>&date=<?= $days[7] ?>"><i><?= date('d.m', strtotime($days[7])) ?></i></a><br><br>
<?php
            $type = mysqli_query($connect, "SELECT time_format(`time_start`, '%H-%i') FROM timetable_coach WHERE date = '$day' AND coach_id = '$coach_id'");
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                ?>
    <a href="add_person_to_class.phpid=<?= $coach_id ?>&date=<?= $day ?>$time=<?= $t[0] ?>" class="time-btn"><?= $t[0] ?></a>
    <?php
            }
    ?>
</div>
</body>
</html>