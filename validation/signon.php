<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$query = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login' AND password = '$password' ");

if (mysqli_num_rows($query) == 1) {
    $user = mysqli_fetch_assoc($query);
    
    $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login']
    ];
    
    if ($_SESSION['user']['id'] == 1) {
        header('Location: ../administrator/welcomePage.php');
    } else if ($_SESSION['user']['id'] == 2) {
        header('Location: ../mainManager/welcomePage.php');
   }   
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}



?>