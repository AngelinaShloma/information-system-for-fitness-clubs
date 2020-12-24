<?php
session_start();
require_once '../validation/connect.php';
if (!isset($_SESSION['user']['id']) || $_SESSION['user']['id'] == '') {
        echo '
        <script>
          alert("Вы не вошли в систему");
        </script>
        ';
     header('Location: ../index.php');
    }
if ($_SESSION['user']['id'] != 1){
    echo '
        <script>
          alert("Вы не имеете доступа к этой странице");
        </script>
        ';
     header('Location: ../index.php');
}
$client_id = $_POST['id'];
$fio = $_POST['FIO'];
$phone = $_POST['phone'];
$birth = date('Y-m-d',strtotime($_POST['birth']));
$gender = $_POST['gender'];

$query = mysqli_query($connect, "UPDATE client SET FIO = '$fio', phone = '$phone', date_of_birth = '$birth', sex = '$gender' WHERE client_id = '$client_id' ");
if(!$query) {
    echo 'Ошибка:' . mysqli_error($connect);
} else {
header('Location: menu-administrator-1.php');
}
?>