<?php
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
if(isset($count) && $count > 0){
$i=0;
$modal="";
$html='
<div class=" bg-3 text-center" style="padding: 5%">
    <div class="row">
';

do{
    if($imgpath[$i] != ""){
        if($imgurl[$i] != ""){
        $html=$html.'
            <div class="col-sm-3">
                <p>'.$imgname[$i].'</p>
                <a data-toggle="modal" data-target="#video'.$imgpath[$i].'"><img src="https://i.ytimg.com/vi/'.$imgpath[$i].'/hqdefault.jpg" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Image"></a>
            </div>
         ';
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
                                    src="'.$imgurl[$i].'">
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
        $html=$html.'
            <div class="col-sm-3">
                <p>'.$imgname[$i].'</p>
                <img src="https://i.ytimg.com/vi/'.$imgpath[$i].'/hqdefault.jpg" name="'.$imgname[$i].'" class="img-responsive" style="width:100%; max-height: 160px;max-width: 300px;" alt="Image">
            </div>
        
    ';}
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
}else{$html="<center style='padding: 6.4%;'><label >De momento ainda não temos tutoriais disponiveis, lamentamos a inconveniencia!</label></center>";}
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
}  echo $html?>
