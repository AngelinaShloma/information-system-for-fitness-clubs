<?php

require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <style>
@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
body {
  background: #FFFFFF;
  margin: 0;
  padding: 0;
}

.container {
  width: 95%;
  max-width: 1000px;
  margin: 0 auto;
}

header {
  background: #FF8C00;
  color: #FFFFFF;
  padding: 1em 0;
  position: relative;
}

header::after {
  content: '';
  clear: both;
  display: block;
}

.logo {
  float: left;
  font-size: 1rem;
  margin: 0;
  font-weight: 400;
}

.site-nav {
  position: absolute;
  top: 100%;
  right: 0%;
  background: #464655;
  clip-path: circle(0px at top right);
  transition: clip-path ease-in-out 700ms;
/*   display: none; */
}
.site-nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.site-nav li {
  border-bottom: 1px solid #575766;
}

.site-nav li:last-child {
  border-bottom: none;
}

.site-nav a {
  color: #FFFFFF;
  display: block;
  padding: 2em 4em 2em 1.5em;
  text-transform: uppercase;
  text-decoration: none;
}

.site-nav a:hover,
.site-nav a:focus {
  background: #E4B363;
  color: #464655;
}

.site-nav--icon {
  display: inline-block;
  font-size: 1.5em;
  margin-right: 1em;
  width: 1.1em;
  text-align: right;
  color: rgba(255,255,255,.4);
}
  
  .site-nav {
    height: auto;
    position: relative;
    background: transparent;
    float: right;
    clip-path: initial;
  }
  
  .site-nav li {
    display: inline-block;
    border: none;
  }
  
  .site-nav a {
    padding: 0;
    margin-left: 3em;
  }
  
  .site-nav a:hover,
  .site-nav a:focus {
    background: transparent;
  }
  
  .site-nav--icon {
    display: none;
  }
  
}

th, td{
    padding: 10px;
}
th {
    background: #FFFFFF;
}
td{
    background: #FFE4B5;
}
.edit {
     color: black;
}
.edit:visited {
    color: black;
}
.edit:active {
    color: black;
}
        a.button {
  display: inline-block;
  padding: 5px 20px;
  text-decoration: none;
  cursor: pointer;
  background-color: #FFA500;
  border-radius: 10px;
  border: 1px solid #008; /* Добавляем синюю рамку */
  color: black;
}
    </style>
</head>
<body>
    <header>
<div class="container">
    <h1 class="logo">Менеджер по продажам</h1>
  <nav class="site-nav">
      <ul>
        <li><a href="menu-sales-manager-1.php"><i class="site-nav--icon"></i>Клиентская база/Продажа абонементов</a></li> 
        <li><a href="menu-sales-manager-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
        <li><a href="menu-sales-manager-3.php"><i class="site-nav--icon"></i>Абонементы</a></li>
      </ul> 
  </nav>
</div>
</header>
    <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="Длительность" title="Type in a name">
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Время посещения" title="Type in a name">
    <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Типы занятий" title="Type in a name">

<table id="myTable">
  <tr class="table-season-ticket">
    <th> </th>
    <th>Код</th>
    <th>ФИО клиента</th>
    <th>Дата начала</th>
    <th>Дата окончания</th>
    <th>Статус</th>
  </tr>
        <?php
            $type = mysqli_query($connect, "SELECT season_ticket.season_ticket_id, FIO, date_format(date_start, '%d-%m-%Y'), date_format(date_end, '%d-%m-%Y'), status FROM season_ticket, client WHERE season_ticket.client_id = client.client_id");
            $type = mysqli_fetch_all($type);
            foreach ($type as $t) {
                ?>
    <tr>
        <td><a class="edit" href="payment_history.php?id=<?= $t[0] ?>"><i class="fa fa-history" aria-hidden="true"></i></a></td>
        <td><?= $t[0] ?></td>
        <td><?= $t[1] ?></td>
        <td><?= $t[2] ?></td>
        <td><?= $t[3] ?></td>
        <td><?= $t[4] ?></td>
        <td><a class="edit" href="add_payment.php?id=<?= $t[0] ?>"><i class="fa fa-credit-card" aria-hidden="true"></i></a></td>
    </tr>
    <?php
            }
    ?>
    
</table>

<script>
function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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