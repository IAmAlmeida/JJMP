<html>
<head>
    <meta charset="UTF-8">
    <title>Admin - Instal BD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <center><H1>Install BD</H1></center>
            <hr>

<div class="login">

    <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">

        <?php

        if (isset($_POST['login'])) {
            $user = $_POST['user'];
            $pass = $_POST['password'];
            if($user == "admin" && $pass == "admin2018"){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $conn = new mysqli($servername, $username, $password);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $SQL = file_get_contents("jjmp.sql");
                $boom = explode(";",$SQL);
                foreach ($boom as $SQL){
                   $SQL=$SQL.";";
                    if ($conn->query($SQL) === TRUE) {
                    } else {
                        echo "Error creating database: " . $conn->error."<br><br> FAILED TO :<br>".$SQL;
                        $i=1;
                    }}

                $conn->close();
                if(!isset($i)) {
                    echo '<div class="alert alert-success" role="alert">Base de dados instalada com sucesso<br>Será rederecionado</div>';
                    sleep(2);
                    header("location:public_html/");
                }
            }
            else{
                echo '<div class="alert alert-danger" role="alert">Erro no login</div>';
            }

        }
        ?>

        <input id="user" type="text"  style="margin-top: 10px" class="form-control" name="user" value="" placeholder="" required>
        <input id="password" type="password"  style="margin-top: 10px" class="form-control" name="password" placeholder=""required  >
        <button type="submit" style="margin-top: 10px" id="login" name="login" class="btn btn-primary btn-block btn-large"><i class="glyphicon glyphicon-log-in"></i> Log in</button>
    </form>
</div>
        </div>
        <div class="col">
            
        </div>
    </div>

</div>
</body>

</html>
<?php
