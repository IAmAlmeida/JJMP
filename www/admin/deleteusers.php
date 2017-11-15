
<?php
require "../resources/config.php";

$id = $_GET['id'];


//delete table respostas

$drsql = "DELETE FROM respostas WHERE idutilizador = $id";

$resultdr = $jjmpconn->query($drsql);


//delete table forum

$dfsql = "DELETE FROM forum WHERE idutilizador = $id";

$resultdf = $jjmpconn->query($dfsql);


//delete table info
$disql = "DELETE FROM info WHERE id = $id";

$resultdi = $jjmpconn->query($disql);

header("Location: usersconfig.php");