<?php

$servername = "localhost";
$username = "id7929525_jjmp";
$password = "jjmppt";
$database  = "id7929525_jjmp";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['pass']) || isset($_POST['confirmpass'])){
    $user = trim($_GET['utilizador']);
    $password = $_POST['pass'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $c = "UPDATE `jjmp`.`info` SET `pass` = '$password' WHERE `info`.`email` = '$user';";
    $resultc = $conn->query($c);

    if($resultc){
        echo 'te';
    }else{
        echo 'asda';
    }
}
?>