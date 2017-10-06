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
