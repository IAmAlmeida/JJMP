<h1>Perdi a password</h1>

<?php



$servername = "192.168.1.101";
$username = "jjmp";
$password = "PAP@jjmp2018";
$database  = "jjmp";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'resources/PHPMailer/src/Exception.php';
require 'resources/PHPMailer/src/PHPMailer.php';
require 'resources/PHPMailer/src/SMTP.php';

  if( !empty($_POST) ){
    // processar o pedido

    $user = trim($_POST['email']);

   $sql = "SELECT * FROM `info` WHERE email = '$user'";
$result = $conn->query($sql);


if ($result->num_rows==1 )  {
    while($row = $result->fetch_assoc()) {

        $chave = sha1(uniqid(mt_rand(), true));

        // guardar este par de valores na tabela para confirmar mais tarde

        $conf = "INSERT INTO recuperacao VALUES ('$user', '$chave','Recuperação de Password')";
        $result1 = $conn->query($conf);




        $link = "http://jjmp.zapto.org/public_html/?l=forget&utilizador=$user&confirmacao=$chave";


        $smtpUsername = "mailjjmp@gmail.com";
        $smtpPassword = "10a6e21b-9780-4fce-b581-8ac7eaf415b8";

        $emailFrom = $smtpUsername;
        $emailFromName = "JJMP";

        $emailTo = "$user";


        $body = '
<head>
<meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="emails.css" rel="stylesheet">
<title>JJMP</title>
</head>

<body>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action">
                    <tr>
                        <td class="content-wrap">
                       
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                       <center><img src="https://github.com/AfraidZac/JJMP/blob/serverweb/public_html/img/logo.png?raw=true" width="30%"></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>Olá ' .$user.'</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                  Para finalizar o processo de recuperação da password da sua Conta por favor clique na caixa abaixo para ser redirecionado para uma página de recuperação de password.</td>

                                </tr>
                                <br>
                                <tr>
                                    <td class="content-block aligncenter" itemprop="handler" >
                                        <a href="'.$link.'" class="btn-primary" style="" itemprop="url">Recuperar Password</a>
                                    </td>
                                </tr>

                                <br>
                                <tr>
                                    <td class="content-block">
                               Com os melhores cumprimentos,<br>JJMP<br><br> <b>ATENÇÃO!</b><br>Esta informação foi gerada automaticamente, por favor não responda.
                                    </td>
                                </tr>
                             
                            </table>
                        </td>
                    </tr>
                </table>
                </div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>

';



        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.elasticemail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 2525; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->setFrom($emailFrom, $emailFromName);
        $mail->addAddress($emailTo, $emailToName);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Recuperação Password';
        $mail->IsHTML(true);
        $mail->Body = "<center>".$body."</center>";

        if ($mail->send()) {
            echo 'Foi enviado um e-mail para o seu endereço, onde poderá encontrar um link único para alterar a sua password!<script>swal("Recuperação da Password", "Foi enviado um e-mail para o seu endereço, onde poderá encontrar um link único para alterar a sua password!", "success");</script>   <meta http-equiv="refresh" content="3;url=?l=home" />';

        } else {
            echo '<script>swal("Recuperação da Password", "Erro ao enviar email", "error");</script>   <meta http-equiv="refresh" content="1;url=?l=home" />';


            // Apenas para testar o link, no caso do e-mail falhar
           // echo '<p>Link: ' . $link . ' (apresentado apenas para testes; nunca expor a público!)</p>';
        }

    }
    } else {
    echo "Não existe nenhum utilizador com esse email  ";
}
$conn->close();

  } else {
    // mostrar formulário de recuperação
?>
<form method="post">
    <div class="form-group">
        <label class="control-label col-sm-6" for="email">Introduza o seu email</label>
        <div class="col-sm-12 ">
            <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-at" aria-hidden="true"></i></span></div>
                <input required type="email" name="email" class="form-control"  id="email" placeholder="Enter email" onblur="" ;>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button class="btn btn-primary btn-block"   type="submit" name="login">Recuperar</button>
        </div>
    </div>

</form>
<?php
  }
?>