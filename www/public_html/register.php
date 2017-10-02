<?php
require_once("../resources/config.php");
if (isset($_POST['reg'])){


if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['pass'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $register="INSERT INTO `info` (`nickname`, `pass`, `email`) VALUES ('$name', '$pass', '$email');";
    $registerq=mysqli_query($jjmpconn,$register);
    if($registerq){
       echo" Registado com Sucesso!";
        $_POST=array();
    }else{
      echo"Erro";
        $_POST=array();
    }
}
}
?>
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
            <button class="btn btn-success col-sm-7" onclick="tempAlert(2000);" id="reg" name="reg" style="margin-left: 10px">Registar</button>
            <br>
        </form>
    </div>
</div>