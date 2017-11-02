
<?php

require_once "../../config.php";

if (isset($_POST['login'])) {

    $emailuser=$_POST['email_user'];
    $password=$_POST['pass'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $query  = "SELECT nickname, pass from info where nickname like '$emailuser' and pass like '$password';";
    $getresult = mysqli_query($jjmpconn,$query);
    if($getresult){
        if($getresult->num_rows >0){
            echo"Nickname correto<br><br>";
            if($row=mysqli_fetch_assoc($getresult)) {
                $_SESSION['email_user'] = $row['nickname'];

            }

        }else{
            $query2  = "SELECT nickname, pass from info where email like '$emailuser' and pass like '$password';";
            $getresult2 = mysqli_query($jjmpconn,$query2);

            if($getresult2){
                if($getresult2->num_rows >0){
                    echo"Email correto<br><br>";
                    if($row=mysqli_fetch_assoc($getresult2)) {
                        $_SESSION['email_user'] = $row['nickname'];
                        $_SESSION['count']= 0 ;
                    }

                }else{

                    echo"Email/Nickname ou Password estão errados tente novamente<br><br>";
                }
            }else{

                echo"Database connection error<br><br>";

            }
        }

    }else{

        echo"Database connection error 2<br><br>";

    }


}
if(isset($_SESSION['email_user'])&&$_SESSION['email_user']!=""){
    $_SESSION['log_in_info']= "
    User  : ".$_SESSION["email_user"]."
    <a style='margin-left: 20px' href='../../public_html/logout.php' class='btn btn-info' role='button'>Sair</a>";
}

header("location:http://localhost/public_html/");

?>