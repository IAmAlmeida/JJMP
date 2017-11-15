<?php
session_abort();

$email = $_POST['email'];

$password = $_POST['password'];
$password = base64_encode($password);
$password = str_rot13($password);

$login = "SELECT email FROM info WHERE email = '$email' AND pass = '$password'";
$loginresult = $jjmpconn->query($login);


if ($loginresult->num_rows > 0) {

    $getroll = "SELECT roll FROM info WHERE email = '$email'";
    $rollresult = $jjmpconn->query($getroll);
    $rollrow = mysqli_fetch_row($rollresult);
    $roll = $rollrow[0];

    $getnick = "SELECT nickname FROM info WHERE email = '$email'";
    $nickresult = $jjmpconn->query($getnick);

    $nickrow = mysqli_fetch_row($nickresult);
    $nick = $nickrow[0];
/*   */
    if ($roll == "2") {


            echo(' <meta http-equiv="refresh" content="2;../index.php" />
           <center> <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Succesfully! You will be redirected in 3 seconds...</div>');
              session_Start();
        $_SESSION['online']= "0";
        $_SESSION['email'] = $email;
            $_SESSION['roll'] = $roll;
        $_SESSION['nick'] =$nick;
             setcookie("login", $_SESSION['nick'], time() + (86400 * 30), "/");

    } else {
            echo('<center><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Não tem as devidas permissões</div>');
        $_SESSION['online']= "1";
        session_abort();
        }
        $jjmpconn->close();
        return false;
    } else {
        echo('<center><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Invalid Email or Password.</div>');
    $_SESSION['online']= "2";
    session_abort();
        return false;
    }

?>