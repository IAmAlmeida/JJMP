
<?php

require "../../resources/config.php";
$sql = "SELECT COUNT(resposta) FROM respostas";
$sqlresult = $jjmpconn->query($sql);
$sqlrow = mysqli_fetch_row($sqlresult);
$count = $sqlrow[0];

echo $count;
?>