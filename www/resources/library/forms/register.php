<form class="form-horizontal " name="Register" method="POST" style="width: 500px;">
    <script src="../../../public_html/JS/ajaxdopedroedamia.js" ></script>
    <?php
    require_once("../resources/config.php");
    if (isset($_POST['reg'])){


        if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['pass'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['pass'];

           $password = base64_encode($password);
           $password = str_rot13($password);

            $register="INSERT INTO `info` (`nickname`, `pass`, `email`) VALUES ('$name', '$password', '$email');";
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

    <div class="form-group">
        <label class="control-label col-sm-6" id="namelabel" for="name">Nickname: <label id="validatenick"></label></label>
        <div class="col-sm-10 ">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input required type="text" name="name" class="form-control"  id="name" placeholder="Enter Nickname" onblur="" onkeyup="validatenick();" ;>
        </div>
    </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-6" id="emaillabel" for="email">Email: <label id="validateemail"></label></label>

        <div class="col-sm-10">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input required type="email"id="email" name="email" class="form-control" placeholder="Enter Email" onblur="" onkeyup="validateemail();";>
        </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" id="passlabel" for="pass">Password:</label>
        <div class="col-sm-10 ">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
<!--            <input required type="password" id="pass" name="pass" class="form-control" placeholder="Enter Password" onblur="" required data-toggle="popover" title="Password Strength" data-content="Enter Password...";>
-->        <input required type="password" oncopy="return false" oncut="return false" onpaste="return false"
                  class="form-control pwd" name="pass" value="" id="pass" placeholder="Enter password"
                  onkeyup="javascript:checkpass(),confirmvalidpassword()"/>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="progress">
            <div class="progress-bar progress-bar-danger-striped" id="password-progress-bar" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                <span id="showmsg"></span>
            </div>
        </div>
    </div>

            <div class="form-group">
                <label class="control-label col-sm-6" id="passlabel" for="pass">Repetir Password:<label id="passvalid"></label></label>
                <div class="col-sm-10">
                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input required type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="Repetir Password" onblur="" onkeyup="confirmvalidpassword()" ;>
                    </div>
                </div>
            </div>

        <br>
        <div class="form-group">
            <div class="col-sm-10 ">
                <button class="btn btn-primary btn-block" id="reg" name="reg" onclick="javascript:authenticate()" >Registar</button>
            </div>
        </div>
</form>


