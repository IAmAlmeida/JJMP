<?php
$SQL = "SELECT * FROM info WHERE '".$_SESSION['email_user']."' = nickname";
$SQLQUERY = mysqli_query($jjmpconn,$SQL);

if($SQLQUERY->num_rows > 0){
    while($row = $SQLQUERY->fetch_assoc()){
        $email = $row['email'];
        $nickname = $row['nickname'];
        $password = $row['pass'];
    }

}
?>
<div class="container">
    <label style="color: dodgerblue"  class="col-sm-5" >Email:</label>
    <label class="col-sm-5"> <?php echo $email; ?></label>
    <hr>
    <label style="color: dodgerblue"  class="col-sm-5" >Nickname:</label>
    <label  class="col-sm-5"> <?php echo $nickname; ?></label>
    <hr>
    <form method="post">
        <button type="submit" class="btn btn-primary col-sm-3">Mudar password</button>
        <button type="submit" class="btn btn-primary col-sm-3">Apagar Conta</button>
        <button type="submit" class="btn btn-primary col-sm-3">Mudar password</button>
    </form>
</div>