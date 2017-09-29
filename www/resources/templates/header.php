<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">

<head>
    <link rel="icon"
          type="image/png"
          href="../../public_html/img/icon.png" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>JJMP</title>
    <script src="/public_html/JS/JavaScript.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../../public_html/img/P&Blogo.jpeg" style="width:100px; height: 40px;margin-left: -10px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <form class="form-inline my-2 my-lg-0">
            <a class="nav-item active">
                <a class="nav-link" href="#">Login</a>
            </a>
            <a class="nav-item active">
                <a class="nav-link" href="#">Registar</a>
            </a>
        </form>
    </div>
</nav>
<div id="header"style="margin-left: 30px;width: 100%">
    <center>
    <img src="../../public_html/img/logo.png" style="center">

    </center>


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

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

