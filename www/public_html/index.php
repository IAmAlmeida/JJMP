<?php
require_once("../resources/config.php");
if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['pass'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $register="INSERT INTO `info` (`nickname`, `pass`, `email`) VALUES ('$name', '$pass', '$email');";
    $registerq=mysqli_query($jjmpconn,$register);
    if($registerq){
        echo"<div class=\"alert alert-success\" id='mydiv' onload='fade_out();' role=\"alert\">Succefully qqlcoisa</div>";
        $_POST=array();
    }else{
        echo"<div class=\"alert alert-danger\" id='mydiv' onload='fade_out();' role=\"alert\">Couldn't qqlcoisa Email or Username not unique</div>";
    }
}
require_once(TEMPLATES_PATH . "/header.php");
require_once(TEMPLATES_PATH . "/rightPanel.php");
require_once(TEMPLATES_PATH . "/footer.php");
?>
<head>
    <link rel="stylesheet" type="text/css" href="../resources/back.css">
</head>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body">
                <div>
                    <form class="form-group" name="Register" method="POST" style="width: 500px;">
                        <label class="control-label col-sm-3" id="namelabel" for="name">Nickname:</label>
                        <input class="col-sm-4" id="name" name="name" required type="text">
                        <br>
                        <label class="control-label col-sm-3" id="emaillabel" for="email">Email:</label>
                        <input class="col-sm-4" id="email" name="email" required type="email">
                        <br>
                        <label class="control-label col-sm-3" id="passlabel" for="pass">Password:</label>
                        <input class="col-sm-4" id="pass" name="pass" required type="password">
                        <br>
                        <button class="btn btn-success col-sm-7" onclick="tempAlert(2000);" id="reg" style="margin-left: 10px">Registar</button>
                        <br>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log In</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>

