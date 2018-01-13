<?php

$SQL = "SELECT email,nickname FROM info WHERE '".$_SESSION['id_user']."' = id";
$SQLQUERY = mysqli_query($jjmpconn,$SQL);

if($SQLQUERY->num_rows > 0){
    while($row = $SQLQUERY->fetch_assoc()){
        $email = $row['email'];
        $nickname = $row['nickname'];
    }

}

if(isset($_POST['btnacc'])){
    $sqldel="DELETE FROM info WHERE id=".$_SESSION['id_user'];
    $sqlconndel = mysqli_query($jjmpconn,$sqldel);
    unset($_SESSION['email_user'],$_SESSION['id_user']);
    //USAR ALERT PARA ERRO e ALERTT PARA SUCESSO
    $_SESSION['alertt'] = '
    
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading">Conta apagada com sucesso</h5>
                <hr>
                <p>A sua conta foi agora apagada, inclusive todos os seus feitos prévios</p>
            </div>
 
    ';
    header("location:/public_html/?l=home");
}
if(isset($_POST['btnmp'])){
    $sql = "SELECT pass FROM info WHERE id = ".$_SESSION['id_user'];
    $sqlconn = mysqli_query($jjmpconn,$sql);
    if($sqlconn->num_rows>0){
        $passwordenc = $_POST['mptr'];
        $passwordenc = base64_encode($passwordenc);
        $passwordenc = str_rot13($passwordenc);
        while($row = $sqlconn->fetch_assoc()){
            $userpassword = $row['pass'];
        }
        if($passwordenc==$userpassword){
//USAR ALERT PARA ERRO e ALERTT PARA SUCESSO
            $_SESSION['alertt'] = '
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Password mudada!</h5>
                <hr>
                <p>A sua conta está segura!</p>
            </div>
            ';

            $newpass=$_POST['mptrn'];
            $newpass = base64_encode($newpass);
            $newpass = str_rot13($newpass);
            $sqlpasschange = "UPDATE info SET pass = '$newpass' WHERE id =".$_SESSION['id_user'];
            $sqlpasschangeconn = mysqli_query($jjmpconn,$sqlpasschange);
            unset($_SESSION['email_user'],$_SESSION['id_user']);
            header("location:/public_html/?l=home");
        }else{
            //USAR ALERT PARA ERRO e ALERTT PARA SUCESSO
            $_SESSION['alert'] = '
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading">Password antiga não correspondente!</h5>
                <hr>
                <p>A password antiga inserida não corresponde à sua password atual</p>
            </div>
            ';
        }
    }
}

if(isset($_POST['btnme'])){
    $sql = "SELECT email FROM info WHERE id = ".$_SESSION['id_user'];
    $sqlconn = mysqli_query($jjmpconn,$sql);
    if($sqlconn->num_rows>0){
        $email_post = $_POST['metr'];

        while($row = $sqlconn->fetch_assoc()){
            $email_db = $row['email'];
        }


        if($email_db==$email_post){
           $newemail=$_POST['metrn'];
           $sqlemailvalid="SELECT email FROM info WHERE email ='$newemail'";
           $sqlemailvalidconn=mysqli_query($jjmpconn,$sqlemailvalid);
            

           if($sqlemailvalidconn->num_rows == 0) {

               $sqlupdate = "UPDATE info SET email='$newemail' WHERE id=" . $_SESSION['id_user'];
               $sqlupdateconn = mysqli_query($jjmpconn, $sqlupdate);
               $_SESSION['alertt'] = '
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading">Email mudado!</h5>
                        <hr>
                        <p>A sua conta está segura!</p>
                    </div>
                ';
               unset($_SESSION['id_user'], $_SESSION['email_user']);
               header("location:/public_html/?l=home");

            }else{
               $_SESSION['alert'] = '
                    <div class="alert alert-danger" role="alert">
                        <h5 class="alert-heading">Email já em uso!</h5>
                        <hr>
                        <p>O Email inserido já se encontra em uso!</p>
                    </div>
                ';
            }
            }else{
                $_SESSION['alert'] = '
                    <div class="alert alert-danger" role="alert">
                        <h5 class="alert-heading">Email antigo não correspondente!</h5>
                        <hr>
                        <p>O Email antigo inserido não corresponde ao seu email atual</p>
                    </div>
                ';

            }
        }
}
/*USAR ALERT PARA ERRO e ALERTT PARA SUCESSO

            $_SESSION['alert'] = '
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading">Email antigo não correspondente!</h5>
                    <hr>
                    <p>O Email antigo inserido não corresponde ao seu email atual</p>
                </div>
            ';

            $_SESSION['alertt'] = '
                <div class="alert alert-success" role="alert">
                    <h5 class="alert-heading">Email mudado!</h5>
                    <hr>
                    <p>A sua conta está segura!</p>
                </div>
            ';
            */
$content ='

    <label style="color: dodgerblue"  class="col-sm-5" >Email:</label>
    <label style="text-decoration: underline;" class="col-sm-5">'.$email.'</label>
    <hr>
    <label style="color: dodgerblue"  class="col-sm-5" >Nickname:</label>
    <label style="text-decoration: underline" class="col-sm-5">'.$nickname.'</label>
';

$buttons='

        <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
        <br>
       <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
        <br>
       <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>

';


if(isset($_POST['mp'])){

    $content ='
        <div>
        <div class="container-fluid" style="margin-bottom:5%">
            <label class="col-sm-4" for="mpt"> Password antiga : </label>
                <input type="password" id="mpt" name="mpt" class="col-sm-6" onkeyup="oldpasscheck()">
                <br>
            <label class="col-sm-4" for="mptr"> Repetir password antiga : </label>
                <input type="password" id="mptr" name="mptr" class="col-sm-6" onkeyup="oldpasscheck()">
                <hr>
            <label class="col-sm-4" for="mptn"> Password Nova : </label>
                <input type="password" id="mptn" disabled name="mpn" class="col-sm-6" onkeyup="oldpasscheck()">
                <br>
            <label class="col-sm-4" for="mptrn"> Repetir password nova : </label>
                <input type="password" id="mptrn" disabled name="mptrn" class="col-sm-6" onkeyup="oldpasscheck()">
                <hr>
                <button type="submit" id="btnmp" name="btnmp" class="btn col-sm-12" disabled>Confirmar</button>
        </div>
        </div>
        
    ';
    $buttons='
    <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
    <br>
    <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
    <br>
    <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
    ';
}
if(isset($_POST['ac'])){
    $content ='
        <div>
        <label for="deleteacc" class="col-sm-3">Escreva "<strong style="text-decoration: underline;color:darkred;">DELETE</strong>"</label>
        <input id="deleteacc" name="deleteacc" class="col-sm-6" onkeyup="del()" style="margin-bottom: 5%">
        <br>
        <div id="checkboxdel" hidden>
        <label for="deletebox" class="col-sm-5">Deseja mesmo <strong style="text-decoration: underline;color:darkred;">APAGAR</strong> a sua conta?</label>
        <input type="checkbox" id="deletebox" name="deletebox" onclick="del()" style="margin-bottom: 5%">
        </div>
        <button type="submit" id="btnacc" name="btnacc" class="btn col-sm-12" disabled>Confirmar</button>
        </div>
    ';

    $buttons='
    <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
    <br>
     <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
    <br>
    <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
    ';

}
if(isset($_POST['me'])){
    $content ='
    
        <div>
        <div class="container-fluid" style="margin-bottom:5%">
            <label class="col-sm-4" for="met"> Email atual : </label>
                <input id="met" name="met" class="col-sm-6" onkeyup="emailchange()">
                <br>
            <label class="col-sm-4" for="metr"> Repetir email atual : </label>
                <input  id="metr" name="metr" class="col-sm-6" onkeyup="emailchange()">
                <hr>
            <label class="col-sm-4" for="metn"> Email novo : </label>
                <input type="email" id="metn" disabled name="metn" class="col-sm-6" onkeyup="emailchange()">
                <br>
            <label class="col-sm-4" for="metrn"> Repetir email novo : </label>
                <input type="email" id="metrn" disabled name="metrn" class="col-sm-6" onkeyup="emailchange()">
                <hr>
                <button type="submit" id="btnme" name="btnme" class="btn col-sm-12" disabled>Confirmar</button>
        </div>
        </div>
        
    ';

    $buttons='
    <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
    <br>
    <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
    <br>
    <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
    ';
}
if(isset($_POST['def'])){
    $content ='
    
    <label style="color: dodgerblue"  class="col-sm-5" >Email:</label>
    <label style="text-decoration: underline;" class="col-sm-5">'.$email.'</label>
    <hr style="width: 95%">
    <label style="color: dodgerblue"  class="col-sm-5" >Nickname:</label>
    <label style="text-decoration: underline" class="col-sm-5">'.$nickname.'</label>
    
    ';

    $buttons='

        <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
        <br>
         <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
        <br>
           <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>

';
}

?>

<div class="clearfix">
    <div class="container-fluid" style="background-color: gainsboro;">
        <center>
            <hr style="background-color: dodgerblue">
           <img class="rounded-circle" src="/public_html/img/download.png">
            <hr style="background-color: dodgerblue">
        </center>
    </div>
</div>
<?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];unset($_SESSION['alert']);}?>
<div class="container">
    <form method="post">
    <?php echo $content; ?>
    <hr style="background-color: black;">
    <?php echo $buttons; ?>
    </form>
</div>
