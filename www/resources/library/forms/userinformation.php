<?php
$SQL = "SELECT email,nickname FROM info WHERE '".$_SESSION['id_user']."' = id";
$SQLQUERY = mysqli_query($jjmpconn,$SQL);

if($SQLQUERY->num_rows > 0){
    while($row = $SQLQUERY->fetch_assoc()){
        $email = $row['email'];
        $nickname = $row['nickname'];
    }

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

            $_SESSION['alert'] = '
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
        <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
        <br>
        <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>

';


if(isset($_POST['mp'])){

    $content ='
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
        
    ';
    $buttons='
    <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
    <br>
    <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
    <br>
    <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
    ';
}
if(isset($_POST['ac'])){
    $content ='
    
        bbbbbbbbbbbbbb
    
    ';

    $buttons='
    <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
    <br>
    <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
    <br>
    <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
    ';

}
if(isset($_POST['me'])){
    $content ='
    
        ccccccccccccccc
    ';

    $buttons='
    <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
    <br>
    <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
    <br>
    <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
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
        <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
        <br>
        <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>

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
<?php if(isset($_SESSION['alert'])){echo $_SESSION['alert']; unset($_SESSION['alert']);}?>
<div class="container">
    <form method="post">
    <?php echo $content; ?>
    <hr style="background-color: black;">
    <?php echo $buttons; ?>
    </form>
</div>
