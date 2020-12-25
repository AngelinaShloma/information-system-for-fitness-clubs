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
$type = $_POST['type'];
$date_start = date('Y-m-d',strtotime($_POST['date_start']));
$today = date('Y-m-d');
$way = $_POST['way'];

$query = mysqli_query($connect, "INSERT INTO season_ticket (date_start, client_id, type_id, payment_method, date_of_payment)
 VALUES ('$date_start', '$client_id', '$type', '$way', '$today') ");
if(!query){
    echo 'Ошибка:' . mysqli_error($connect);
}
header('Location: all_tickets_of_client.php?id=' .$client_id);

?>






