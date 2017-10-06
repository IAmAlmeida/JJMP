<?php

$emailuser=$_POST['email_user'];
$pass=$_POST['pass'];
/*
$logincheck="SELECT nickname, pass, email from info where nickname like '$emailuser';";
$logincheck .="SELECT nickname, pass, email from info where email like '$emailuser';";
if($check=mysqli_multi_query($jjmpconn,$logincheck)){
    do{
        if(mysqli_store_result($jjmpconn)){
            if($row=$check->fetch_assoc()){
                var_dump($logincheckq);
                var_dump($check);
                var_dump($row);
            }
        }


    }while($jjmpconn->next_result());

}*/

$query  = "SELECT nickname, pass, email from info where nickname like '$emailuser';";
$query .= "SELECT nickname, pass, email from info where email like '$emailuser';";

/* execute multi query */
if (mysqli_multi_query($jjmpconn, $query)) {
    do {
        /* store first result set */
        if ($check = mysqli_store_result($jjmpconn)) {
            while ($row = mysqli_fetch_row($check)) {
                printf("%s\n", $row[0]);
            }
            mysqli_free_result($check);
        }

    } while (mysqli_next_result($jjmpconn));
    mysqli_close($jjmpconn);
}

/*$logincheckq=mysqli_multi_query($jjmpconn,$logincheck);
$check = $result=mysqli_store_result($jjmpconn);
var_dump($logincheckq);
var_dump($check);
$row = $check->fetch_assoc();
var_dump($row);*/


/*$email = $_POST['email'];
$password = $_POST['password'];

$login = "SELECT email FROM info WHERE email = '$email' AND pass ='$password'";
$loginresult = $jjmpconn->query($login);


if ($loginresult->num_rows > 0) {


    $getid = "SELECT id FROM info WHERE email = '$email'";
    $idresult = $jjmpconn->query($getid);
    $idrow = mysqli_fetch_row($idresult);
    $id = $idrow[0];

    $getinfo = "SELECT * FROM info WHERE id = '$id'";
    $getresult = $jjmpconn->query($getinfo);

    if ($getresult->num_rows > 0) {

        while ($row = $getresult->fetch_assoc()) {

            echo('      
                <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Succesfully! You will be redirected in 3 seconds...</div>');

            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $nick = $row["nickname"];
            setcookie("username", "John Carter", time()+30*24*60*60);



            echo $_COOKIE["username"];
            if(isset($_COOKIE["username"])){
                echo "Hi " . $_COOKIE["username"];
            } else{
                echo "Welcome Guest!";
            }



        }
    } else {
        echo('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Invalid Email or Password.</div>');
    }
    $jjmpconn->close();
    session_abort();
    return false;

} else {
    echo('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Invalid Email or Password.</div>');

    return false;

}
*/
?>
