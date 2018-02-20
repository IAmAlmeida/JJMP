<?php
	require_once("../../config.php");
$target_dir = "../../../public_html/img/";
$name = basename($_FILES["fileToUpload"]["name"]);
$name = explode(".",$name);
$target_file = $target_dir . $_SESSION['email_user'].".".$name[1] ; echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) {	
	unlink($target_file);
	unset($_SESSION['log_in_info'],$_SESSION['loggedmodals']);
	$_SESSION['log_in_info'] = "
    <div class='clearfix'>
    <a class='nav-link active' style=' color:#4792ff' data-toggle='modal' data-target='#userinf'>
    <img name='imguser' id='imguser' src='".$target_file."' style=\"float: left;height: 65px; width:65px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle\">
    </a>    
    ";
    $_SESSION['loggedmodals']="
    
     <div id=\"userinf\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog modal-lg\">
            <!-- Modal content-->
            <div class=\"modal-content\">

                <div class=\"modal-header\">

                    <h4 class=\"modal-title\" style=\"float: right;\">Perfil</h4>
                </div>
                <div class=\"modal-body\">
                <div class='clearfix' style='margin-left: 10px'>
                   Clicar na imagem para mais informação
                </div>
                <br>
                <div class='clearfix'>
                
                <a href='/public_html/?l=userinformation'><img name='imguser'  id='imguser' data-toggle='modal' src='".$target_file."' style=\"float: left;height: 100px; width:100px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle \"></a>
                <label id='nick'>Nickname : ".$_SESSION['email_user']."</label><hr style='background-color:#002049; width:78%;'>
                <label id='nick'>Email : ".$email."</label>
                
                </div>
         
                <form method='post'>
                    <button style='margin-left:45px;' type='submit' name='logout' class='btn' role='button'>Logout</button>
                 </form>
                </div>
                
                <button type=\"button\" style=\"background-color: black\" class=\"btn btn-primary btn-block close\"  data-dismiss=\"modal\">&times;</button>
                
                
                </div>
            </div>
        </div>
    </div>
 ";
		
    $SQL = "UPDATE info SET photo ='".$target_file."' WHERE id=".$_POST['submit'];
	mysqli_query($jjmpconn,$SQL);
}else{
$alreadyexists=0;
}
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}echo basename($_FILES["fileToUpload"]["name"])."<br><img src='$target_file'><br>";
if($alreadyexists==0){
	unset($_SESSION['log_in_info'],$_SESSION['loggedmodals']);
	$_SESSION['log_in_info'] = "
    <div class='clearfix'>
    <a class='nav-link active' style=' color:#4792ff' data-toggle='modal' data-target='#userinf'>
    <img name='imguser' id='imguser' src='".$target_file."' style=\"float: left;height: 65px; width:65px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle\">
    </a>    
    ";
    $_SESSION['loggedmodals']="
    
     <div id=\"userinf\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog modal-lg\">
            <!-- Modal content-->
            <div class=\"modal-content\">

                <div class=\"modal-header\">

                    <h4 class=\"modal-title\" style=\"float: right;\">Perfil</h4>
                </div>
                <div class=\"modal-body\">
                <div class='clearfix' style='margin-left: 10px'>
                   Clicar na imagem para mais informação
                </div>
                <br>
                <div class='clearfix'>
                
                <a href='/public_html/?l=userinformation'><img name='imguser'  id='imguser' data-toggle='modal' src='".$target_file."' style=\"float: left;height: 100px; width:100px;margin-left: 40px;margin-right: 40px\" class=\"rounded-circle \"></a>
                <label id='nick'>Nickname : ".$_SESSION['email_user']."</label><hr style='background-color:#002049; width:78%;'>
                <label id='nick'>Email : ".$email."</label>
                
                </div>
         
                <form method='post'>
                    <button style='margin-left:45px;' type='submit' name='logout' class='btn' role='button'>Logout</button>
                 </form>
                </div>
                
                <button type=\"button\" style=\"background-color: black\" class=\"btn btn-primary btn-block close\"  data-dismiss=\"modal\">&times;</button>
                
                
                </div>
            </div>
        </div>
    </div>
 ";
	
	
$SQL = "UPDATE info SET photo ='".$target_file."' WHERE id=".$_POST['submit'];
	mysqli_query($jjmpconn,$SQL);
} 


echo $_SESSION['loggedmodals']."<br><br><br><br>".$_SESSION['log_in_info'];
header("location:http://localhost/public_html/?l=userinformation");
?>