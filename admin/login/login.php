    <?php include ("../resources/styles.php");
    require "../../resources/config.php";

    ?>

<!--
    <div id="particles">

    <div id="loginbox" class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-title text-center"><img src="../../public_html/img/logo.png" style="width:200px; height: 90px;margin-left: 15px;margin-right: 25px"</div>
-->
          <!--              <div class="panel-body" >

                            <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                <?php
/*                                if (isset($_POST['login'])) {
                                    require 'logintest.php';
                                }
                                */?>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <div class="form-group">-->
                                    <!-- Button -->
                 <!--                   <div class="col-sm-12 controls">
                                        <button type="submit" id="login" name="login" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

 </div>
-->


    <base href="<?php echo $baseUrl ?>">
    <html>

    <head>
        <meta charset="UTF-8">
        <title>JJMP BO LOGIN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="admin/css/style.css">
        <script src ="login.js"></script>


    </head>

    <body>

    <div class="login">

     <center>  <div class="panel-title text-center"><a href="login.php" ><img width="75%" src="public_html/img/logo.png"</div></a> <br><br></center>
        <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">

            <?php
                if (isset($_POST['login'])) {
                    require 'logintest.php';
                }
            ?>

            <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            <button type="submit" id="login" name="login" class="btn btn-primary btn-block btn-large"><i class="glyphicon glyphicon-log-in"></i> Log in</button>
        </form>
    </div>

    </body>

    </html>
