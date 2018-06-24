<?php
include "../resources/config.php";
$barsql = "SELECT `barvalue` FROM `settings`";
$barresult = $jjmpconn->query($barsql);
$barrow = mysqli_fetch_row($barresult);
$barvalue = $barrow[0];

if(!isset($_SESSION)) {
   include("index.php");


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JJMP ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/font-awesome/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            setInterval(function(){
                $('#users').load('ajax/countusers.php');
                $('#totalposts').load('ajax/totalposts.php');
                $('#perguntas').load('ajax/perguntas.php');
                $('#respostas').load('ajax/respostas.php');
                $('#bar').load('ajax/bar.php');
            }, 1000)



        </script>

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 550px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 166%;

        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {height: auto;}
        }

        .topright {
            position: absolute;
            top: 25px;
            right: 25px;
            font-size: 18px;
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #f67d03;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #f67d03;
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">

    <div class="container-fluid">

        <a style="margin-bottom: 15%" class="navbar-brand" href="#">
        <div class="navbar-header">
            <center><h2>    <img width="50%" src="img/logo.png"> </h2> <br></center></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span style="color: whitesmoke" class="glyphicon glyphicon-th-list"></span>
            </button>

 </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active">  <a href="status.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Status</a></li>
                <li>  <a href="usersconfig.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores</a></li>
                <li><a href="postsconfig.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Posts</a></li>
                   <li><a href="logsconfig.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Logs</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>
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
                <li class="active"> <a href="status.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Status</a></li>
                <li>  <a href="usersconfig.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores</a></li>
                <li><a href="postsconfig.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Posts</a></li>
                <li><a href="logsconfig.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Logs</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>

           </ul><br>
            <form action="login/logout.php">
                <center><button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</button></center>
            </form>

        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h2>Bem vindo <strong><?php echo $_SESSION['nick']; ?></strong><br><small><a href="../index.php"><i class="fa fa-globe" aria-hidden="true"></i> JJMP - Website <i class="fa fa-globe" aria-hidden="true"></i></small></h2></a>
            </div>



            <div class="row">
                <div class="col-sm-3">
                    <div class="well">
                        <center><h4  style="color:#2196f3"><i class="fa fa-users" aria-hidden="true"></i> Utilizadores</h4>
                            <p><h4><label id="users">0</label></h4></p></center>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">
                        <center><h4 style="color:#4cb050" ><i class="fa fa-comments" aria-hidden="true"></i> Posts</h4>
                            <p><h4><label id="totalposts">0</label></h4></p></center>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">
                      <center> <h4 style="color:#f67c01" ><i class="fa fa-comment" aria-hidden="true"></i> Perguntas</h4>
                        <p><h4><label id="perguntas">0</label></h4></p></center>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">
                        <center> <h4  style="color:#ff5353" ><i class="fa fa-commenting" aria-hidden="true"></i> Respostas</h4>
                        <p><h4><label id="respostas">0</label></h4></p></center>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <a data-toggle="modal"data-target="#myModal" class="topright" >   <i class="fa fa-pencil-square-o"  id="bar-enabled" aria-hidden="true"></i> </a> <center> <h4  style="color:#f67d03" ><i class="fa fa-line-chart" aria-hidden="true"></i> Projeto Completado</h4><br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $barvalue ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $barvalue ?>%;">
                                    <?php echo $barvalue ?>%
                                </div>

                            </div></center>
                    </div>
                </div>
               <!-- <div class="col-sm-6">
                    <div class="well">
                    <a  href="settings.php" class="topright" >   <i class="fa fa-pencil-square-o"  id="bar-enabled" aria-hidden="true"></i> </a> <center> <h4  style="color:#f67d03" ><i class="fa fa-line-chart" aria-hidden="true"></i> Projeto Completado</h4><br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php /*echo $barvalue */?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php /*echo $barvalue */?>%;">
                                    <?php /*echo $barvalue */?>%
                                </div>

                            </div></center>
                    </div>
                </div>-->

            </div>
        </div>


</body>
</html>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">   <h4  style="color:#f39450"><i class="fa fa-users" aria-hidden="true"></i> Projeto Completado</h4>
                </h4>
            </div>
            <div class="modal-body">
          <center>
                                <?php
                                if(isset($_POST['valor'])) {
                                    $valor = $_POST['valor'];
                                    $sql = "UPDATE settings SET barvalue = $valor";
                                    $sqlresult = $jjmpconn->query($sql);
                                    ?>    <script>window.location.href = "status.php";</script>
                                   <?php
                                }
                                ?>
                                <form method="POST">
                <h6><input type="number" id="valor" name="valor" class="form-control" value="<?php echo $barvalue ?>" min="1" max="100" ></h6
                </center>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button></center>

                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>