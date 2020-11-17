<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FITNESS</title>
    <style>
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
            font-family: Georgia, serif;
            background-color: darkseagreen;
        }
        p {
            margin-top: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 250px;
        }
        
        input {
            margin: 10px 0;
            padding: 10px;
            border: unset;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }
        button {
            padding: 10px;
            background: #e3e3e3;
            border: unset;
            cursor: pointer;
        }
        .msg {
            background-color: #e3e3e3;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <form action="/validation/signon.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <?php
            if ($_SESSION['message']){
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
    
</body>
</html>