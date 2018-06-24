
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JJMP ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        setInterval(function(){
            $('#logs').load('ajax/logs.php');
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
        <a  style="margin-bottom: 15%" class="navbar-brand" href="#">

            <center><h2>    <img width="50%" src="img/logo.png"> </h2> <br> <br></center></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span style="color: whitesmoke" class="glyphicon glyphicon-th-list"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li>  <a href="status.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Status</a></li>
                <li>  <a href="usersconfig.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores</a></li>
                <li >  <a href="postsconfig.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Posts</a></li>
                <li class="active"><a href="logsconfig.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Logs</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>
                <form action="login/logout.php">
                    <center>  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</button></center>
                </form>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav hidden-xs">

            <center><h2><img width="75%" src="img/logo.png"></h2> <br> <br></center>

            <ul class="nav nav-pills nav-stacked">
                <li>  <a href="status.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Status</a></li>
                <li>  <a href="usersconfig.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores</a></li>
                <li >  <a href="postsconfig.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Posts</a></li>
                <li class="active"><a href="logsconfig.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Logs</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>
            </ul><br>
            <form action="login/logout.php">
                <center>  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</button></center>
            </form>
        </div>
        <br>
        <div class="col-sm-9">
            <div class="well">
                <h2>Bem vindo <strong><?php echo $_SESSION['nick']; ?></strong><br><small><a href="../index.php"><i class="fa fa-globe" aria-hidden="true"></i> JJMP - Website <i class="fa fa-globe" aria-hidden="true"></i></small></h2></a>
            </div>
        </div>
        <div id="logs">

        </div>

    </div>
</div>



</body>
</html>

