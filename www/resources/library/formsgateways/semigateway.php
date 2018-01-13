<?php

require_once "../../config.php";

if (isset($_POST['login'])) {

    $emailuser = $_POST['email_user'];
    $password = $_POST['pass'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $query = "SELECT id, nickname, pass, email from info where nickname like '$emailuser' and pass like '$password';";
    $getresult = mysqli_query($jjmpconn, $query);
    if ($getresult) {
        if ($getresult->num_rows > 0) {
            echo "Nickname correto<br><br>";
            if ($row = mysqli_fetch_assoc($getresult)) {
                $_SESSION['email_user'] = $row['nickname'];
                $_SESSION['id_user'] = $row['id'];
                $email = $row['email'];
            }

        } else {
            $query2 = "SELECT id, nickname, pass, email from info where email like '$emailuser' and pass like '$password';";
            $getresult2 = mysqli_query($jjmpconn, $query2);

            if ($getresult2) {
                if ($getresult2->num_rows > 0) {
                    echo "Email correto<br><br>";
                    if ($row = mysqli_fetch_assoc($getresult2)) {
                        $_SESSION['email_user'] = $row['nickname'];
                        $_SESSION['id_user'] = $row['id'];
                        $email = $row['email'];
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

    header("location:/public_html/?l=" . $_POST['login']);
}
    if (isset($_SESSION['id_user']) && $_SESSION['id_user'] != "") {
    $_SESSION['log_in_info'] = "
    
    
    <div class='clearfix'>
    <a class='nav-link active' style=' color:#4792ff' data-toggle='modal' data-target='#userinf'>
    <img name='imguser' id='imguser' src=\"/public_html/img/download.png\" style=\"float: left;height: 65px; width:65px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle\">
    </a>    
    ";
    $_SESSION['loggedmodals']="
    
     <div id=\"userinf\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog modal-lg\">
            <!-- Modal content-->
            <div class=\"modal-content\">

                <div class=\"modal-header\">

                    <h4 class=\"modal-title\" style=\"float: right;\">Perfil</h4>
                </div>
                <div class=\"modal-body\">
                <div class='clearfix' style='margin-left: 10px'>
                   Clicar na imagem para mais informação
                </div>
                <br>
                <div class='clearfix'>
                
                <a href='/public_html/?l=userinformation'><img name='imguser'  id='imguser' data-toggle='modal' src=\"/public_html/img/download.png\" style=\"float: left;height: 100px; width:100px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle \"></a>
                <label id='nick'>Nickname : ".$_SESSION['email_user']."</label><hr style='background-color:#002049; width:78%;'>
                <label id='nick'>Email : ".$email."</label>
                
                </div>
         
                <form method='post'>
                    <button style='margin-left:45px;' type='submit' name='logout' class='btn' role='button'>Logout</button>
                 </form>
                </div>
                
                <button type=\"button\" style=\"background-color: black\" class=\"btn btn-primary btn-block close\"  data-dismiss=\"modal\">&times;</button>
                
                
                </div>
            </div>
        </div>
    </div>
    
    
    ";
}
if (isset($_POST['reg'])){


    if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['pass'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['pass'];

        $password = base64_encode($password);
        $password = str_rot13($password);

        $register="INSERT INTO `info` (`roll`,`nickname`, `pass`, `email`) VALUES ('1','$name', '$password', '$email');";
        $registerq=mysqli_query($jjmpconn,$register);

        if($registerq){
            echo" Registado com Sucesso!";
            $_SESSION['email_user'] = $name;
            $selectuserid="select id,roll from info where nickname='$name'";
            $selectuseridconn=mysqli_query($jjmpconn,$selectuserid);
            if($selectuseridconn->num_rows>0){
                while($row=$selectuseridconn->fetch_assoc()){
                    $_SESSION['id_user']=$row['id'];
                }
                $_SESSION['log_in_info'] = "
    
    
    <div class='clearfix'>
    <a class='nav-link active' style=' color:#4792ff' data-toggle='modal' data-target='#userinf'>
    <img name='imguser' id='imguser' src=\"/public_html/img/download.png\" style=\"float: left;height: 65px; width:65px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle\">
    </a>    
    ";
                $_SESSION['loggedmodals']="
    
     <div id=\"userinf\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog\">
            <!-- Modal content-->
            <div class=\"modal-content\">

                <div class=\"modal-header\">

                    <h4 class=\"modal-title\" style=\"float: right;\">Perfil</h4>
                </div>
                <div class=\"modal-body\">
                <div class='clearfix' style='margin-left: 10px'>
                   Clicar na imagem para mais informação
                </div>
                <br>
                <div class='clearfix'>
                
                <a href='/public_html/?l=userinformation'><img name='imguser'  id='imguser' data-toggle='modal' src=\"/public_html/img/download.png\" style=\"float: left;height: 100px; width:100px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle \"></a>
                <label id='nick'>Nickname : ".$_SESSION['email_user']."</label><hr style='background-color:#002049; width:78%;'>
                <label id='nick'>Email : ".$email."</label>
                
                </div>
         
                <form method='post'>
                    <button style='margin-left:45px;' type='submit' name='logout' class='btn' role='button'>Logout</button>
                 </form>
                </div>
                
                <button type=\"button\" style=\"background-color: black\" class=\"btn btn-primary btn-block close\"  data-dismiss=\"modal\">&times;</button>
                
                
                </div>
            </div>
        </div>
    </div>
    ";
                $_SESSION['plsreload'];
            }

        }else{
            echo"Erro";

        }
    }

    header("location:/public_html/?l=".$_POST['reg']);
}

?>
