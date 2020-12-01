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
            background: linear-gradient(-45deg, #FF8C00 10%, #FFA500 100%);
            color: aliceblue;
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
            margin: 5px 0;
            padding: 10px;
            border: unset;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }
        button {
            margin-top: 5px;
            padding: 10px;
            border: unset;
            cursor: pointer;
            background: white;
            color: #696969;
        }
        .msg {
            background-color: #e3e3e3;
            padding: 10px;
            text-align: center;
            background: white;
            color: #696969;
            font-size: 14px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    
    <form action="/validation/signon.php" method="post">
        
        <input type="text" name="login" placeholder="Введите логин">
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