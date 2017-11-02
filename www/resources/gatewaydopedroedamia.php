<?php

require_once("../resources/config.php");

$conn = new mysqli($host, $username, $password, $dbname);;

$email = $_POST['email'];

$checkemail = "SELECT email FROM info WHERE email = '$email'";

$emailresult = $conn->query($checkemail);

If ($email == "") {
    echo('');
}else if ($emailresult->num_rows > 0) {
    while ($row = $emailresult->fetch_assoc()) {
        echo('<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i> Email em uso!</span>');
    }
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
    echo('<span style="color:green;"><i class="fa fa-check" aria-hidden="true"></i> Email Valido!</span>');
} else {
    echo('<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i> Email Invalido!</span>');
}
?>