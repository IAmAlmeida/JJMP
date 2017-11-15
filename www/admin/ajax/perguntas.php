
<?php

require "../../resources/config.php";
$sql = "SELECT COUNT(pergunta) FROM forum";
$sqlresult = $jjmpconn->query($sql);
$sqlrow = mysqli_fetch_row($sqlresult);
$count = $sqlrow[0];

echo $count;
?>