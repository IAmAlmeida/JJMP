<?php
    if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['pass'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];

    $register="INSERT INTO `info` (`nickname`, `pass`, `email`) VALUES ('$name', '$pass', '$email');";
        $registerq=mysqli_query($jjmpconn,$register);
        if($registerq){
            echo"<div class=\"alert alert-success\" role=\"alert\">Succefully qqlcoisa</div>";
        }else{
            echo"<div class=\"alert alert-danger\" role=\"alert\">Could qqlcoisa Email or Username not unique</div>";
        }
    }

?>

<div>
    <form class="form-group" name="Register" method="POST">
    <label class="control-label col-sm-1" id="namelabel" for="name">Nome:</label>
    <input id="name" name="name" required type="text">
    <br>
    <label class="control-label col-sm-1" id="emaillabel" for="email">Email:</label>
    <input id="email" name="email" required type="email">
    <br>
    <label class="control-label col-sm-1" id="passlabel" for="pass">Password:</label>
    <input id="pass" name="pass" required type="password">
    <div>
        <center>
            <button onclick=" ">Registar</button>
        </center>
    </div>
    </form>
</div>


