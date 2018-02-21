<?php

$id = $_GET['id'];

$sql = "SELECT role,nickname,email FROM info WHERE id = $id";

$result = $jjmpconn->query($sql);


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        if ($row["role"] == 1) {
            $roll = "User";
        } else if ($row["role"] == 2) {
            $roll = "Admin";
        } else
            $roll = "Erro";

            $nickname = $row['nickname'];
            $email = $row['email'];


        }

}
;



?>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span id="notify"></span>
                    <form role="form" method="POST" >
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="Nickname" id="Nickname" value="<?php echo $nickname ?>"class="form-control input-sm" placeholder="nickname">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select class="form-control input-sm" name="opcao">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" value="<?php echo $email ?>" class="form-control input-sm" placeholder="Email Address">
                        </div>

                        <input type="submit" value="Editar" name="submit" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit']) ) {
    if (isset($_POST['opcao'])) {

        $select =$_POST['opcao'];

        if ($select == "user") {
            $select = 1;
        } else if ($select == "admin") {
            $select = 2;
        } else
            $select = 1;

        $nicknameupd = $_POST['Nickname'];
        $emailupd = $_POST['email'];
        $sql = "UPDATE info SET nickname = '$nicknameupd' , role = $select , email = '$emailupd' WHERE id = $id";
        $sqlresult = mysqli_query($jjmpconn,$sql);
        if($sqlresult == boolval(true)){
?>
            <meta http-equiv='refresh' content='2;usersconfig.php' />
          <script>
              document.getElementById("notify").innerHTML='<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Utilizador atualizado com sucesso</div>';
          </script>
            <?php

        }else{
            ?>
            <meta http-equiv="refresh" content="1;editusers.php?id=<?php echo $id ?>">
            <script>
                document.getElementById("notify").innerHTML='<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Erro ao atualizar, veriique os campos todos</div>';
            </script>
<?php
}


    }

}

?>