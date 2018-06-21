
    <?php
    require_once("../resources/config.php");

    require_once("../resources/templates/header.php");
    require_once("../resources/templates/rightPanel.php");


    ?>

    <base href="<?php echo $baseUrl ?>">
    
    <div id="register" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Registar</h4>
                </div>
                <div class="modal-body">

                    <?php require ("../resources/library/forms/register.php"); ?>
                    
                 

                </div>
                <button type="button" style="background-color: black" class="btn btn-primary btn-block close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>

    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title" style="float: right;">Login</h4>
                </div>
                <div class="modal-body">
                    <?php require ("../resources/library/forms/login.php"); ?>
                </div>
                <button type="button" style="background-color: black" class="btn btn-primary btn-block close" data-dismiss="modal">&times;</button>
                </div>
            </div>
        </div>
    </div>
<?php 

if(isset($_SESSION['loggedin'])==1){
 unset( $_SESSION['loggedin']);
  echo '<script>swal("Login", "Efetuou o login com sucesso!", "success");</script>';
}

if(isset($_SESSION['logged2'])==2){
   unset( $_SESSION['logged2']);
  echo '<script>swal("Login", "Email/Nickname ou Password estão errados, tente novamente!", "error");</script>';
}

if(isset($_SESSION['logged3'])==3){
   unset( $_SESSION['logged3']);
  echo '<script>swal("Login", "Erro da Base de Dados!", "error");</script>';
}

if(isset($_SESSION['registar'])==1){
   unset( $_SESSION['registar']);
  echo '<script>swal("Registo", "Foi registado com sucesso!", "success");</script>';
}
if(isset($_SESSION['registar2'])==2){
   unset( $_SESSION['registar2']);
  echo '<script>swal("Registo", "Erro no registo, veirifique todos os campos!", "error");</script>';
}
if (isset($_SESSION['loggedmodals'])){
    echo $_SESSION['loggedmodals'];

}
require_once("../resources/templates/footer.php");
?>
