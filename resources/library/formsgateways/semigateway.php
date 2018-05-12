<?php

require_once "../../config.php";

if (isset($_POST['login'])) {

    $emailuser =$_POST['email_user'];
    $emailuser = str_replace("'", '', $emailuser);
    $password = $_POST['pass'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $query = "SELECT id, nickname, pass, email, photo from info where nickname like '$emailuser' and pass like '$password';";
    $getresult = mysqli_query($jjmpconn, $query);
    if ($getresult) {
        if ($getresult->num_rows > 0) {
            echo "Nickname correto<br><br>";
            if ($row = mysqli_fetch_assoc($getresult)) {
                $_SESSION['email_user'] = $row['nickname'];
                $_SESSION['id_user'] = $row['id'];
                $email = $row['email'];
				$photo = $row['photo'];
            }

        } else {
            $query2 = "SELECT id, nickname, pass, email, photo from info where email like '$emailuser' and pass like '$password';";
            $getresult2 = mysqli_query($jjmpconn, $query2);

            if ($getresult2) {
                if ($getresult2->num_rows > 0) {
                    echo "Email correto<br><br>";
                    if ($row = mysqli_fetch_assoc($getresult2)) {
                        $_SESSION['email_user'] = $row['nickname'];
                        $_SESSION['id_user'] = $row['id'];
                        $email = $row['email'];
						$photo = $row['photo'];
                    }

                } else {

                    echo "Email/Nickname ou Password estão errados tente novamente<br><br>";
                }
            } else {

                echo "Database connection error<br><br>";

            }
        }

    } else {

        echo "Database connection error 2<br><br>";

    }

    header("location: ../../../public_html/?l=" . $_POST['login']);
}
    if (isset($_SESSION['id_user']) && $_SESSION['id_user'] != "") {
   
    
    //loggedmodal
    $_SESSION['log_in_info']=logininfo($photo);
    $_SESSION['loggedmodals']=loggedinmodal($photo,$_SESSION['email_user'],$email);
}
if (isset($_POST['reg'])){


    if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['pass'])){
       
        $name= $_POST['name'];
        $name = str_replace("'", '', $name);
        $email=$_POST['email'];
        $email = str_replace("'", '', $email);
        $password=$_POST['pass'];

        $password = base64_encode($password);
        $password = str_rot13($password);

        $register="INSERT INTO `info` (`role`,`nickname`, `pass`, `email`) VALUES ('1','$name', '$password', '$email');";
        $registerq=mysqli_query($jjmpconn,$register);

        if($registerq){
          
                    
            $_SESSION['email_user'] = $name;
            $selectuserid="select id,role,photo from info where nickname='$name'";
            $selectuseridconn=mysqli_query($jjmpconn,$selectuserid);
            if($selectuseridconn->num_rows>0){
                while($row=$selectuseridconn->fetch_assoc()){
                    $_SESSION['id_user']=$row['id'];
					$photo=$row['photo'];
                }
              
                
    //loggedmodal
    $_SESSION['log_in_info']=logininfo($photo);
    $_SESSION['loggedmodals']=loggedinmodal($photo,$_SESSION['email_user'],$email);
                $_SESSION['plsreload'];
            }

        }else{
            echo"Erro";

        }
    }

    header("location:../../../public_html/?l=".$_POST['reg']);
}

?>
