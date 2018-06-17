<?php
header('Access-Control-Allow-Origin: *');
?>
<?php

$dbname = "jjmp";
$username = "jjmp";
$pass = "PAP@jjmp2018";
$host = "192.168.1.100";
$servername =$_SERVER['SERVER_NAME'];

$con = new mysqli($host, $username, $pass, $dbname);
if ($con->connect_error) {
  die();
}



if(isset($_POST['register']))
{
    $passwordr = $_POST['passwordr'];
    $passwordr = base64_encode($passwordr);
    $passwordr = str_rot13($passwordr);
    $usernamer= $_POST['userr'];
    $emailr= $_POST['emailr'];

    $checkemail = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `info` WHERE `email`='$emailr'"));

    if($checkemail == 0) {
        $checkuser = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `info` WHERE `nickname`='$usernamer'"));

        if ($checkuser == 0) {
            $insert = mysqli_query($con, "INSERT INTO `info` (`id`, `role`, `nickname`, `pass`, `email`, `photo`, `privatephotograph`) VALUES (NULL, '0', '$usernamer', '$passwordr', '$emailr', '', '0');");
            if ($insert)
                echo "success";
            else
                echo "error";
        }else if($checkuser != 0)
            echo "Este username ja existe";
    }
    else if($checkemail != 0)
        echo "Este email ja existe";
	
}else if(isset($_POST['user']))
{
    $password = $_POST['password'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $username= $_POST['user'];
    $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `info` WHERE `nickname`='$username' AND `pass`='$password'"));
    if($login != 0)
        echo "success";
    else
        echo "error";
}

?>