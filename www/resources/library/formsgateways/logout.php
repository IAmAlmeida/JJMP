<?php

if($_SESSION['l']!="userinformation"){header("location:/public_html/?l=".$_SESSION['l']);}else{header("location:/public_html/?l=home");} //to redirect back to "index.php" after logging out
session_destroy(); //destroy the session
exit();

?>