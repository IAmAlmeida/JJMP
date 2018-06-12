<?php
require_once("../../config.php");
if(isset($_POST['deleteQF'])){
    $boom = explode("!%!",$_POST['deleteQF']);
    $name = $boom[0];
    $date = $boom[1];
    echo $name . $date;
    $SQL = "DELETE FROM forum WHERE $nickname = '$name' AND datapos = '$date'";
    mysqli_query($SQL);
} ;
if(isset($_POST['deleteRD'])){

    $name = $_POST['deleteRD'];
    echo $name . $date;
} ;
header('Location: ' . $_SERVER['HTTP_REFERER']);