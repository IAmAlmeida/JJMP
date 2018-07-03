
<?php
header('Content-Type: text/html; charset=UTF-8');
$servername = "sql110.epizy.com";
$username = "epiz_22330907";
$password = "v9dtwzx0";
$database  = "epiz_22330907_jjmp";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$body = "

<base href=\"<?php echo $baseUrl ?>\">
<div style=\"text-align:;padding: 5%\">

    <div style=\"background-color: #333;color:whitesmoke;padding: 1%\">
        <center>
            <strong><h2>Alterar password</h2></strong>
        </center>
    </div>
    <div style=\"padding: 3%;background-color:#333;\">
        <div style=\"background-color: ghostwhite;padding: 1%\">
            <form method=\"post\">
                <div class=\"form-group\">
                    <label class=\"control-label col-sm-6\" id=\"passlabel\" for=\"pass\">* Password:</label>
                    <div class=\"col-sm-12 \">
                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-prepend\">  <span class=\"input-group-text\"><i class=\"fas fa-key\" aria-hidden=\"true\"></i></span></div>
                            <input required type=\"password\" oncopy=\"return false\" oncut=\"return false\" onpaste=\"return false\" class=\"form-control pwd\" name=\"pass\" value=\"\" id=\"pass\" placeholder=\"Enter password\" onkeyup=\"checkpass(),repeatpass();\"/>
                        </div>
                        <div class=\"progress\">
                            <div class=\"progress-bar progress-bar-danger-striped\" id=\"password-progress-bar\" role=\"progressbar\"
                                 aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0\">
                                <span id=\"showmsg\"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"control-label col-sm-6\" id=\"passlabel\" for=\"passlabel\">* Repetir Password:<label id=\"passvalid\"></label></label>
                    <div class=\"col-sm-12\">
                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-prepend\">  <span class=\"input-group-text\"><i class=\"fas fa-key\" aria-hidden=\"true\"></i></span></div>
                            <input required type=\"password\" id=\"confirmpass\" name=\"confirmpass\" class=\"form-control\" placeholder=\"Repetir Password\" onblur=\"\" onkeyup=\"repeatpass();\">
                        </div>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-sm-12\">
                        <button class=\"btn btn-primary btn-block\"   type=\"submit\" name=\"login\">Recuperar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>";




  if(isset($_GET['utilizador']) || isset($_GET['confirmacao']) ) {

      $user = trim($_GET['utilizador']);
      $hash = trim($_GET['confirmacao']);

      $q = "SELECT * FROM recuperacao WHERE utilizador = '$user' AND confirmacao = '$hash'";
      $result = $conn->query($q);


      if ($result->num_rows == 1) {
          // os dados estão corretos: eliminar o pedido e permitir alterar a password
          $d = "DELETE FROM recuperacao WHERE utilizador = '$user' AND confirmacao = '$hash'";
          $result2 = $conn->query($d);

          echo $body;


      } else {
         echo '<div style="text-align:;padding: 5%">
 <div style="background-color: #333;color:whitesmoke;padding: 1%">
        <center>
          <h4>Não é possível alterar a password: dados incorretos ou o link expirou</h4>
        </center>
    </div></div>';

      }
  }else{
      die("<div style=\"text-align:;padding: 5%\">
 <div style=\"background-color: #333;color:whitesmoke;padding: 1%\">
        <center>
          <h4>Ups! Você não deveria estar aqui</h4>
        </center>
    </div></div>");
  }

if(isset($_POST['pass']) || isset($_POST['confirmpass'])){
echo $user;
    $password = $_POST['pass'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $c = "UPDATE `jjmp`.`info` SET `pass` = '$password' WHERE `info`.`email` = '$user';";
    $resultc = $conn->query($c);

    if($resultc){
        echo '<script>swal("Recuperação da Password", "Alterada com sucesso!", "success");</script>   <meta http-equiv="refresh" content="1;url=?l=home" /';
    }else{
        echo '<script>swal("Recuperação da Password", "Erro ao alterar password, tente novamente mais tarde!", "error");</script>   <meta http-equiv="refresh" content="3;url=?l=home" /';
    }
}
?>




