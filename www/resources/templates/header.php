<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>JJMP</title>
</head>

<body>
<div id="header"style="margin-left: 30px;width: 100%">
    <center>
    <img src="../../public_html/img/logo.png" style="center">

    </center>
    <ul class="nav global">
        <li><a class="btn" style="background-color: coral;color: white;width: 100px;margin-right: 20px" href="?link=1">Home</a></li>
        <li><a class="btn" style="background-color: coral;color: white;width: 100px;margin-right: 20px" href="?link=2">Instruções</a></li>
        <li><a class="btn" style="background-color: coral;color: white;width: 100px;margin-right: 20px" href="?link=3">Sobre Nós</a></li>
        <li><a class="btn" style="background-color: coral;color: white;width: 100px;margin-right: 20px" href="?link=4">Download</a></li>
    </ul>

</div>
<?php

$link = (isset($_GET['link'])) ? $_GET['link'] : 'home';
if ($link == 0) {

}
if ($link == '3') {
    include 'about.php';
}
if ($link == '1') {
    include 'index.php';
}
?>