<<<<<<< HEAD
    <?php

    include("../resources/config.php");
    require_once(TEMPLATES_PATH . "/header.php");

    ?>

    <?php


        ?>
        <form class="form-horizontal " name='submit' method="POST" ">
    <div class="row-fluid">
        <div class="span12 col-sm-3">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-1" for="email">Email</label>
        <div class="col-sm-9">
            <input required type="email" name="email" value="" class="form-control "  id="emailvalid" placeholder="Enter email" onblur="" ;>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span12 col-sm-3">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-1 " for="pass">Password</label>
        <div class="col-sm-9">
            <input required type="password" oncopy="return false" oncut="return false" onpaste="return false"  class="form-control pwd" name="password" value="" id="pass" placeholder="Enter password"  onkeyup="javascript:checkpass(),confirmvalidpassword()"/>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12 col-sm-3">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <button class="btn btn-primary btn-block" type="submit1" value="Submit1" name="submit" >Login</button>

        </div>
    </div>
    </div>
    <legend></legend>
</form>




    ?>
=======
<?php
require_once("../resources/config.php");
if (isset($_POST['reg'])){


    if(isset($_POST['emailuser']) && isset($_POST['pass'])){
        $emailuser=$_POST['emailuser'];
        $pass=$_POST['pass'];
        $logincheck="SELECT nickname, pass from info where nickname like '$emailuser';";
        $logincheck .="SELECT email, pass from info where email like '$emailuser';";
        $logincheckq=mysqli_multi_query($jjmpconn,$logincheck);
        $check = $result=mysqli_store_result($jjmpconn);
            var_dump($logincheckq);
            var_dump($check);
        if ($logincheckq){

        }else{

        }
    }
}
?>
<div class="modal-body">
    <div>
        <form class="form-group" name="Register" method="POST" style="width: 500px;">
            <label class="control-label col-sm-3" id="emaillabel" for="email">Email ou Username:</label>
            <input class="col-sm-4" id="emailuser" name="emailuser" required >
            <br>
            <label class="control-label col-sm-3" id="passlabel" for="pass">Password:</label>
            <input class="col-sm-4" id="pass" name="pass" required type="password">
            <br>
            <button class="btn btn-success col-sm-7" onclick="tempAlert(2000);" id="reg" name="reg" style="margin-left: 10px">Registar</button>
            <br>
        </form>
    </div>
</div>
>>>>>>> origin/BeforeAcceptance
