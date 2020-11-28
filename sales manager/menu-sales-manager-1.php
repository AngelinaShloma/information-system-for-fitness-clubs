<?php

require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <style>

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

.access {
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
        
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.6);
    z-index: 1000;
}
.modal .modal_content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 25%;
    z-index: 99999;
}
.modal .modal_content .close_modal_window {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}
        .hello{
            margin-bottom: 10px;
        }
        
a.button {
  font-size: 14px;
  font-weight: 600;
  color: white;
  padding: 6px 20px 0px 10px;
  margin: 10px 8px 5px 0px;
  display: inline-block;
  text-decoration: none;
  width: 50px; height: 27px; 
  -webkit-border-radius: 5px; 
  -moz-border-radius: 5px; 
  border-radius: 5px; 
  background-color: #3a57af; 
  -webkit-box-shadow: 0 3px rgba(58,87,175,.75); 
  -moz-box-shadow: 0 3px rgba(58,87,175,.75); 
  box-shadow: 0 3px rgba(58,87,175,.75);
  transition: all 0.1s linear 0s; 
  top: 0px;
  position: relative;
}

a.button:hover {
  top: 3px;
  background-color:#2e458b;
  -webkit-box-shadow: none; 
  -moz-box-shadow: none; 
  box-shadow: none;
  
}
input[type=radio] {
  visibility: hidden;
}
label.radio {
  cursor: pointer;
  text-indent: 35px;
  overflow: visible;
  display: inline-block;
  position: relative;
  margin-bottom: 15px;
}

label.radio:before {
  background: #3a57af;
  content:'';
  position: absolute;
  top:2px;
  left: 0;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}

label.radio:after {
  opacity: 0;
  content: '';
  position: absolute;
  width: 0.5em;
  height: 0.25em;
  background: transparent;
  top: 7.5px;
  left: 4.5px;
  border: 3px solid #ffffff;
  border-top: none;
  border-right: none;

  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

input[type=radio]:checked + label:after {
  opacity: 1;
}
input[type=text],input[type=password]{
  width: 300px; 
  height: 39px; 
  -webkit-border-radius: 5px 4px 4px 4px/5px 5px 4px 4px; 
  -moz-border-radius: 4px 4px 4px 4px/4px 4px 4px 4px; 
  border-radius: 4px 4px 4px 4px/5px 5px 4px 4px; 
  background-color: #fff; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 1px #cbc9c9;
  margin-left: -5px;
  margin-bottom: 5px; 
  margin-top: 3px;
  padding-left: 10px;
}
    </style>
</head>
<body>
    <header>
<div class="container">
    <h1 class="access">Менеджер по продажам</h1>
  <nav class="site-nav">
      <ul>
        <li><a href="menu-sales-manager-1.php"><i class="site-nav--icon"></i>Клиентская база/Продажа абонементов</a></li> 
        <li><a href="menu-sales-manager-2.php"><i class="site-nav--icon"></i>Типы абонементов</a></li>
      </ul> 
  </nav>
</div>
</header>
    <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="ФИО" title="Type in a name">
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Номер телефона" title="Type in a name">

<table id="myTable">
  <tr class="table-type-season-ticket">
    <th>ФИО клиента</th>
    <th>Номер телефона</th>
    <th>Дата рождения</th>
    <th>Возраст</th>
    <th>Пол</th>
  </tr>
        <?php
            $type = mysqli_query($connect, "SELECT `FIO`, `phone`, date_format(`date_of_birht`, '%d-%m-%Y'), ((YEAR(CURRENT_DATE)-YEAR(`date_of_birht`))-(RIGHT(CURRENT_DATE,5)<RIGHT(`date_of_birht`,5)
  )) AS `age`, `sex` FROM client");
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
    ?>
    
</table>
    
<button id="btn_modal_window">Добавить нового клиента</button>
  <div id="my_modal" class="modal">
    <div class="modal_content">
      <span class="close_modal_window">×</span><br>
      <div class="testbox">

  <form action="/sales manager/add_client.php" method="post">
  <label id="icon">ФИО</label><br>
  <input type="text" name="FIO"/><br>
  <label id="icon">Номер телефона</label><br>
  <input type="text" name="phone"/><br>
  <label id="icon">Дата рождения</label><br>
  <input type="text" name="birth" placeholder="00-00-0000"/><br>
  <div class="gender">
    <label id="icon">Пол</label><br>
    <input type="radio" value="м" id="male" name="gender" checked/>
    <label for="male" class="radio" chec>М</label>
    <input type="radio" value="ж" id="female" name="gender" />
    <label for="female" class="radio">Ж</label>
   </div> 
      <button type="submit">Добавить</button>
  </form>
</div>
    </div>
  </div>
<script>
    
 var modal = document.getElementById("my_modal");
 var btn = document.getElementById("btn_modal_window");
 var span = document.getElementsByClassName("close_modal_window")[0];

 btn.onclick = function () {
    modal.style.display = "block";
 }

 span.onclick = function () {
    modal.style.display = "none";
 }

 window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
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