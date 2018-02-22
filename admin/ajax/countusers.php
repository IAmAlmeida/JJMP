
<?php

require "../../resources/config.php";
$sql = "SELECT COUNT(ID) FROM info";
$sqlresult = $jjmpconn->query($sql);
$sqlrow = mysqli_fetch_row($sqlresult);
$count = $sqlrow[0];

echo $count;
?>