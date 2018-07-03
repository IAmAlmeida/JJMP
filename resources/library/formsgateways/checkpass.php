<?php

require_once("../../config.php");

$pass = $_POST['pass'];

$checkpass = "SELECT email FROM info WHERE pass = '$pass'";

$nickresult = mysqli_query($jjmpconn, $checkpass);

If ($pass == "") {
    echo('');
}else if ($nickresult->num_rows > 0) {
    while ($row = $nickresult->fetch_assoc()) {
        echo('<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i> Indisponível</span>');
    }
} else {
    echo('<span style="color:green;"><i class="fa fa-check" aria-hidden="true"></i> Disponível</span>');
}
?>