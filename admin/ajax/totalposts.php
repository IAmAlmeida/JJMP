
<?php

require "../../resources/config.php";

$sql = "SELECT COUNT(resposta) FROM respostas";
$sqlresult = $jjmpconn->query($sql);
$sqlrow = mysqli_fetch_row($sqlresult);
$resposta = $sqlrow[0];

$sql = "SELECT COUNT(pergunta) FROM forum";
$sqlresult = $jjmpconn->query($sql);
$sqlrow = mysqli_fetch_row($sqlresult);
$pergunta = $sqlrow[0];

$count = $resposta + $pergunta;

echo $count;
?>


