<?php
if(!isset($_SESSION)) {
    include("index.php");
    require("../resources/config.php");

    $barsql  ="SELECT barvalue FROM settings";
    $barresult = $jjmpconn->query($barsql);
    $barrow = mysqli_fetch_row($barresult);
    $barvalue = $barrow[0];


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>JJMP ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylis.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        setInterval(function(){
            $('#totalposts').load('ajax/totalposts.php');
        }, 500)
    </script>

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 550px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 167%;

        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {height: auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">JJMP</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li> <a href="status.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Status</a></li>
                <li class="active"> <a href="usersconfig.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores</></li>
                <li>    <a href="postsconfig.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Posts</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav hidden-xs">
            <h2>JJMP</h2> <br> <br>
            <ul class="nav nav-pills nav-stacked">
                <li> <a href="status.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Status</a></li>
                <li class="active"> <a href="usersconfig.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores</></li>
                <li>    <a href="postsconfig.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Posts</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h3>Bem vindo</h3>
                <p><h4><?php echo $_SESSION['nick']; ?></h4>
                <form action="login/logout.php">
                    <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</button>
                </form>
                </p>
            </div>
        </div>
        <div class="col-sm-9">

            <div class="well">
                <?php
                include "ajax/editusers.php";
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
