<?php
session_destroy(); //destroy the session
header("location:/public_html/?link=".$_SESSION['link']); //to redirect back to "index.php" after logging out
exit();

?>