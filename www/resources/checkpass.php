<?php

include(realpath(dirname(__FILE__) . "/../resources/config.php"));

$conn = new mysqli($host, $username, $password, $dbname);;

$pass = $_POST['pass'];

$checkpass = "SELECT email FROM info WHERE pass = '$pass'";

$nickresult = $conn->query($checkpass);

If ($pass == "") {
    echo('');
}else if ($nickresult->num_rows > 0) {
    while ($row = $nickresult->fetch_assoc()) {
        echo('<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"></i> Nickname em uso!</span>');
    }
} else {
    echo('<span style="color:green;"><i class="fa fa-check" aria-hidden="true"></i> Nickname Valido!</span>');
}
?>