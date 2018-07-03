<?php

require_once("../../config.php");


$email = $_POST['email'];

$checkemail = "SELECT email FROM info WHERE email = '$email'";

$emailresult = mysqli_query($jjmpconn, $checkemail);

If ($email == "") {
    echo('');
}else if ($emailresult->num_rows > 0) {
    while ($row = $emailresult->fetch_assoc()) {
        echo('<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i> Indisponível</span>');
    }
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
    echo('<span style="color:green;"><i class="fa fa-check" aria-hidden="true"></i> Email Válido!</span>');
} else {
    echo('<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i> Email Inválido!</span>');
}
?>