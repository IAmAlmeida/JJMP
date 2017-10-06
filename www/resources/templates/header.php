<?php
require_once("../resources/config.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">

<html lang="EN">
<head>
    <link rel="icon"
          type="image/png"
          href="../../public_html/img/icon.png"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>JJMP</title>
    <script src="/public_html/JS/JavaScript.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/dropdown.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="?link=home"> <img src="../../public_html/img/logo.png" style="width:120px; height: 50px;margin-left: 15px;margin-right: 25px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?link=home">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?link=instructions">Instruções</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?link=aboutus">Sobre Nós</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?link=download">Download</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?link=forum">Forum</a>
            </li>

        </ul>
        <div class="dropdown">

        <form class="form-inline my-2 my-lg-0">

            <a class="nav-link active" style=" color:#4792ff" data-toggle="modal" data-target="#login">Login</a>
            <a class="nav-link nav-item active" style="color:#4792ff" data-toggle="modal" data-target="#myModal">Registar</a>

        </form>
    </div>
</nav>
<div id="header" style="margin-left: 30px;width: 100%">

</div>
<?php

$link = (isset($_GET['link'])) ? $_GET['link'] : 'home';
if ($link == 'aboutus') {
    include 'aboutus.php';
}
if ($link == 'home') {
    include_once 'home.php';
}
if ($link == 'forum') {
    include_once 'forum.php';
}
if ($link == 'instructions'){
    include_once 'instructions.php';
}
if ($link == 'login'){
    include_once 'login.php';
}
?>



