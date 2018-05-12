    <?php
	require_once("../../config.php");
	if(isset($_POST['private'])){
	    $private = 1;
    }else{
	    $private = 0;
    }

$target_dir = "public_html/img/user_photos/";
$name = basename($_FILES["fileToUpload"]["name"]);
$name = explode(".",$name);
$target_file = $target_dir . $_SESSION['email_user'].".jpg" ; echo $target_file."<br>";

function changeimage($targetfile,$emaill){

    $photo=$targetfile;
    $email=$emaill;
    
    $_SESSION['log_in_info']=logininfo($photo);
    $_SESSION['loggedmodals']=loggedinmodal($photo,$_SESSION['email_user'],$email);
}

$SQL="SELECT email from info where nickname='".$_SESSION['email_user']."'";
$result = mysqli_query($jjmpconn,$SQL);
foreach ($result as $row){
        $email = $row['email'];
}
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        header("location: ../../../public_html/?l=userinformation");
        exit();
        $uploadOk = 0;
    }
}
if (file_exists($target_file) && $uploadOk != 0) {
    $uploadOk = 1;
    $alreadyexists=0;
    echo "exists <br>";
    unlink($target_file);
    unset($_SESSION['log_in_info'],$_SESSION['loggedmodals']);
    changeimage($target_file,$email);
    $SQL = "UPDATE info SET photo ='".$target_file."', privatephotograph = ".$private." WHERE id= ".$_POST['submit'];
	mysqli_query($jjmpconn,$SQL);
}else{ echo "doesn't exist <br>";
$alreadyexists=1;
}
if ($_FILES["fileToUpload"]["size"] > 8000000  && $uploadOk != 0) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif"  && $uploadOk != 0) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../../../".$target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>"; $uploadOk = 1;
    } else {
        echo "Sorry, there was an error uploading your file.<br>"; $uploadOk = 0;
    }
}
if($alreadyexists==1){
    unset($_SESSION['log_in_info'],$_SESSION['loggedmodals']);
    changeimage($target_file,$email);
    $SQL = "UPDATE info SET photo ='".$target_file."', privatephotograph = ".$private." WHERE id= ".$_POST['submit'];
	mysqli_query($jjmpconn,$SQL);
}

header("location: ../../../public_html/?l=userinformation");
?>