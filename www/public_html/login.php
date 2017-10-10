<form class="form-horizontal " name='authlogin' method="POST" ">
<?php

if (isset($_POST['login'])) {

$emailuser=$_POST['email_user'];
$pass=$_POST['pass'];
$query  = "SELECT nickname, pass from info where nickname like '$emailuser' and pass like '$pass';";
$getresult = mysqli_query($jjmpconn,$query);
if($getresult){
    if($getresult->num_rows >0){
        echo"Nickname correto<br><br>";
        if($row=mysqli_fetch_assoc($getresult)) {
            $_SESSION['nickname'] = $row['nickname'];
        }
    }else{
        $query2  = "SELECT nickname, pass  from info where email like '$emailuser' and pass like '$pass';";
        $getresult2 = mysqli_query($jjmpconn,$query2);

        if($getresult2){
            if($getresult2->num_rows >0){
                echo"Email correto<br><br>";
                if($row=mysqli_fetch_assoc($getresult2)) {
                    $_SESSION['email_user'] = $row['nickname'];
                }
            }else{
                echo"Email/Nickname ou Password estão errados tente novamente<br><br>";
            }
        }else{

            echo"Database connection error<br><br>";

        }
    }

}else{

    echo"Database connection error<br><br>";

}


}
?>

<div class="row-fluid">
    <div class="span12 col-sm-3">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-6" for="email">Email or Username</label>
    <div class="col-sm-10 ">
        <input required type="text" name="email_user" class="form-control "  id="email_user" placeholder="Enter email or username" onblur="" ;>

    </div>
</div>
<div class="row-fluid">
    <div class="span12 col-sm-3">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-1 " for="pass">Password</label>
    <div class="col-sm-10">
        <input required type="password" oncopy="return false" oncut="return false" onpaste="return false"  class="form-control pwd" name="pass" value="" id="pass" placeholder="Enter password"  onkeyup="javascript:checkpass(),confirmvalidpassword()"/>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 col-sm-3">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4 ">
        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
    </div>
</div>
</div>

</form>
