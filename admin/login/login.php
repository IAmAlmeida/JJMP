    <?php include ("../resources/styles.php");
    require "../../resources/config.php";

    ?>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="UTF-8">
        <title>JJMP BO LOGIN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src ="login.js"></script>


    </head>

    <body>

    <div class="login">

     <center>  <div class="panel-title text-center"><a href="login.php" ><img width="75%" src="../img/logo.png"</div></a> <br><br></center>
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
