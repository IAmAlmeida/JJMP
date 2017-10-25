





<!--/*$logincheckq=mysqli_multi_query($jjmpconn,$logincheck);
$check = $result=mysqli_store_result($jjmpconn);
var_dump($logincheckq);
var_dump($check);
$row = $check->fetch_assoc();
var_dump($row);*/


/*$email = $_POST['email'];
$password = $_POST['password'];

$login = 4m SELECT email FROM info WHERE email = '$email' AND pass ='$password'";
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
*/-->