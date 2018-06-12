    <?php

	require_once("../../config.php");
	$email=$_SESSION['id_user'];
	if(isset($_POST['private'])){
	    $private = 1;
    }else{
	    $private = 0;
    }

function changeimage($targetfile,$emaill){

    $photo=$targetfile;
    $email=$emaill;
    
    $_SESSION['log_in_info']=logininfo($photo);
    $_SESSION['loggedmodals']=loggedinmodal($photo,$_SESSION['email_user'],$email);
}
    if(!isset($_POST['changeyes'])){
    if(isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]))
    {
        $errors=array();
        $allowed_ext= array('jpg','jpeg','png','gif');
        $file_name =$_FILES["fileToUpload"]['name'];
        $file_size=$_FILES["fileToUpload"]['size'];
        $file_tmp= $_FILES["fileToUpload"]['tmp_name'];
        $type = pathinfo($file_name, PATHINFO_EXTENSION);
        if(intval($file_size) <= 21024){
            if(in_array($type,$allowed_ext)){
                $data = file_get_contents($file_tmp);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                if($private == 1) {
                    $SQL = "UPDATE info SET photo = '$base64' , privatephotograph = 1 WHERE id = '$email'";
                }else{
                    $SQL = "UPDATE info SET photo = '$base64' , privatephotograph = 0 WHERE id = '$email'";
                }
                mysqli_query($jjmpconn,$SQL);
                $sql = "SELECT email from info where id = $email";
                $result=mysqli_query($jjmpconn,$sql);
                foreach ($result as $row){
                    $email=$row['email'];
                }
                changeimage($base64,$email);
            }
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
	    $name=base64_decode($_POST['changeyes']);
	    $SQL = "SELECT photo from info where nickname ='$name'";
	    $result=mysqli_query($jjmpconn,$SQL);
	    foreach ($result as $row){
	        $photo=$row['photo'];
        }
        $SQL = "UPDATE info SET photo ='$photo' , privatephotograph = 1 WHERE id = ".$_SESSION['id_user'];
	    mysqli_query($jjmpconn,$SQL);

        $SQL = "SELECT email from info where id = ".$_SESSION['id_user'];
        $result=mysqli_query($jjmpconn,$sql);
        foreach ($result as $row){
            $email=$row['email'];
        }
        changeimage($photo,$email);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>


    