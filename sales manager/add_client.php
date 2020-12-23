<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <link rel="stylesheet" type="text/css" href="../styles/formStyle.scss"/>

        <!-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }  
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #FF8C00 10%, #FFA500 100%);
            color: aliceblue;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 250px;
        }
        
        input {
            margin: 5px 0;
            padding: 10px;
            border: unset;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }
        button, a.button {
            margin-top: 5px;
            padding: 10px;
            border: unset;
            cursor: pointer;
            background: white;
            color: #696969;
            text-decoration: none;
            text-align: center;
        }
    </style> -->
</head>
<body>
  <form action="/sales manager/add_clientphp.php" method="post">
    <label id="icon">ФИО</label><br>
    <input type="text" name="FIO" required = "required"/><br>
    <label id="icon">Номер телефона</label><br>
    <input type="tel" name="phone" required = "required" pattern="8[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"/><br>
    <label id="icon">Дата рождения</label><br>
    <input id="datefield" type="date" name="birth" required = "required" 
          min="1910-01-01" max=""/><br>
       <div class="gender">
          <label id="icon">Пол</label><br>
          <input type="radio" value="м" id="male" name="gender" checked/>
          <label for="male" class="radio" chec>М</label>
          <input type="radio" value="ж" id="female" name="gender" />
          <label for="female" class="radio">Ж</label>
       </div> 
    <button type="submit">Добавить</button>
    <a href="menu-sales-manager-1.php" target="_self" class="button">Отмена</a>
    </form>
    <script>
        var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
    </script>
</body>