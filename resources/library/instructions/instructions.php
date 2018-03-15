<?php
if(isset($_POST['buttonimagedeleter'])){
    $id=$_POST['buttonimagedeleter'];
    $sql = "DELETE FROM tutoriais WHERE tutorialimgpath = '". $id ."';";
    mysqli_query($jjmpconn,$sql);
}
if(isset($_POST['imgupload'])){
    $video = $_POST['videoid'];
    $videoname = $_POST['name'];
    $img="";
    if($video != "" && $img == ""){
        $img = $video;
    }

    $upload = "INSERT INTO tutoriais(tutorialimgpath,tutorialurl,tutorialname) VALUES('$img','$video','$videoname')";

    $uploadconn = mysqli_query($jjmpconn,$upload);
    unset($_POST);
}
$html="";
$modal="";
$sql="SELECT COUNT(idtutorial) AS num FROM tutoriais WHERE 1=1";
$sqlconn=mysqli_query($jjmpconn,$sql);
while($row=$sqlconn->fetch_assoc()){
    $count=$row['num'];
}
if($sqlconn->num_rows>0){
    $sql="SELECT * FROM tutoriais";
    $sqlconn=mysqli_query($jjmpconn,$sql);
    $i=1;

    while($row=$sqlconn->fetch_assoc()){
        $imgpath[] = $row['tutorialimgpath'];
        $imgname[] = $row['tutorialname'];
        $imgurl[] = $row['tutorialurl'];
    }
}
if(isset($_SESSION['id_user'])){
    $selectrole = "SELECT role from info where id = ".$_SESSION['id_user'];
    $selectroleconn = mysqli_query($jjmpconn,$selectrole);
    while($row= $selectroleconn->fetch_assoc()){
        $role = $row['role'];
    }
    if($role == 2){
        $html = $html."
    
        <form style='padding=5%' method='post'>
             <center>
                 <label class='col-sm-1' for='videoid' class=>Video ID:</label>
                 <input id='videoid' name='videoid' class='col-sm-2'>
                 <hr class='col-sm-3'>
                 <label class='col-sm-1' for='videoid' class=>Name:</label>
                 <input id='name' name='name' class='col-sm-2'>
                 <br>
                 <button class='btn btn-primary' id='imgupload' name='imgupload'>Upload</button>
             </center>
        
    
    ";
    }
}
if(isset($count) && $count > 0){
    $i=0;
    $html=$html.'
<div class=" bg-3 text-center" style="padding: 5%">
    <div class="row">
';

    do{
        if($imgpath[$i] != ""){
            if($imgurl[$i] != ""){

                if(isset($role) && $role==2){
                    $html=$html.'
            <div class="col-sm-3">
                <p>'.$imgname[$i].'<button style="float: right;width: 25px;height: 25px;border: none; background: none;padding: 0;color:rgba(100,4,2,0.71);" class="fa fa-times" id="'.$imgpath[$i].'" name ="buttonimagedeleter" value="'.$imgpath[$i].'"></button></p>
                <a data-toggle="modal" data-target="#video'.$imgpath[$i].'"><img src="https://i.ytimg.com/vi/'.$imgpath[$i].'/hqdefault.jpg" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Image"></a>
            </div>
         ';
                }else{
                    $html=$html.'
            <div class="col-sm-3">
                <p>'.$imgname[$i].'</p>
                <a data-toggle="modal" data-target="#video'.$imgpath[$i].'"><img src="https://i.ytimg.com/vi/'.$imgpath[$i].'/hqdefault.jpg" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Image"></a>
            </div>
         ';
                }

                $modal=$modal.'
        
        <div id="video'.$imgpath[$i].'" class="modal fade" role="dialog"">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div>
                        <h4 style="padding:10%;" class="modal-title">'.$imgname[$i].'</h4>
                    </div>
                    <div class="modal-body">
                        <center >
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe style="height: 100%;width: 100%;" class="embed-responsive-item" 
                                    allowfullscreen="allowfullscreen"
                                    mozallowfullscreen="mozallowfullscreen" 
                                    msallowfullscreen="msallowfullscreen" 
                                    oallowfullscreen="oallowfullscreen" 
                                    webkitallowfullscreen="webkitallowfullscreen" 
                                    src="https://www.youtube.com/embed/'.$imgurl[$i].'">
                                </iframe>
                            </div>
                        </center>
                    </div>
                    <button type="button" style="background-color: black" class="btn btn-primary btn-block close" data-dismiss="modal">&times;</button>
                </div>
            </div>
        </div>
        
        ';
            }else{
                if(isset($role) && $role==2){
                    $html=$html.'
            <div class="col-sm-3">
                <p>'.$imgname[$i].'<button style="float: right;width: 25px;height: 25px;border: none; background: none;padding: 0;color:rgba(100,4,2,0.71);" class="fa fa-times" id="'.$imgpath[$i].'" name="buttonimagedeleter" value="'.$imgpath[$i].'" ></button></p>
                <img src="https://i.ytimg.com/vi/'.$imgpath[$i].'/hqdefault.jpg" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Video">
            </div>
        
    ';}else{
                    $html=$html.'
            <div class="col-sm-3">
                <p>'.$imgname[$i].'</p>
                <img src="https://i.ytimg.com/vi/'.$imgpath[$i].'/hqdefault.jpg" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Video">
            </div>
        
    ';

                }}
        }else{
            $html=$html.'
        <div class="col-sm-3">
            <p>'.$imgname[$i].'</p>
            <img src="https://placehold.it/150x80?text='.$imgname[$i].'" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Image">
        </div>
    ';}
        if(($i+1) % 4 == 0){
            $html=$html.'
        </div> </div> 
        <div class="bg-3 text-center " style="padding: 5%">
            <div class="row">
        ';
        }
        $i++;}while($i<$count);
    $html=$html.'</div></div>';
}else{$html=$html."<center style='padding: 6.4%;'><label>De momento ainda não temos tutoriais disponiveis, lamentamos a inconveniencia!</label></center>";}
?>

<div class="bg-1" style="padding:5%;margin-top:1%">
    <div class="text-center">
        <h1>Instruções</h1>
        <p>Tutoriais</p>
    </div>
</div>
<br>

<?php if(isset($modal)){
    echo $modal;
}  echo $html;
if(isset($role) &&$role==2){
    echo"</form>";

}?>
