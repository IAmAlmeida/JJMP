<?php
$sql="SELECT COUNT(idtutorial) AS num FROM tutoriais WHERE 1=1";
$sqlconn=mysqli_query($jjmpconn,$sql);
while($row=$sqlconn->fetch_assoc()){
    $count=$row['num'];
}
if($sqlconn->num_rows>0){
    $sql="SELECT * FROM tutoriais";
    $sqlconn=mysqli_query($jjmpconn,$sql);
    $ia=1;
    while($row=$sqlconn->fetch_assoc()){
        $imgpath[$ia] = $row['tutorialimgpath'];
        $imgname[$ia] = $row['tutorialname'];
        $imgurl[$ia] = $row['tutorialurl'];
    }
}
$i=1;
$html='
<div class="container-fluid bg-3 text-center" style="padding: 3%">
    <div class="row">
';
do{

        echo $imgpath[$i];

    $html=$html.'
        <div class="col-sm-3">
            <p>Image '.$i.'</p>
            <img src="https://placehold.it/150x80?text=IMAGE '.$i.'" class="img-responsive" style="width:100%" alt="Image">
        </div>
    ';
    if($i % 4 == 0){
        $html=$html.'
        </div> </div> 
        <div class="container-fluid bg-3 text-center " style="padding: 3%">
            <div class="row">
        ';
    }
$i++;}while($i<=$count);
$html=$html.'</div>';
?>

<div class="bg-1">
    <div class="container text-center">
        <h1>Instruções</h1>
        <p>Tutoriais</p>
    </div>
</div>
<br>

<?php echo $html; ?>

<!--<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-3">
            <p>Image 1</p>
            <img src="https://placehold.it/150x80?text=IMAGE 1" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Image 2</p>
            <img src="https://placehold.it/150x80?text=IMAGE 2" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Image 3</p>
            <img src="https://placehold.it/150x80?text=IMAGE 3" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Image 4</p>
            <img src="https://placehold.it/150x80?text=IMAGE 4" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div><br>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-3">
            <p>Image 5</p>
            <img src="https://placehold.it/150x80?text=IMAGE 5" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Image 6</p>
            <img src="https://placehold.it/150x80?text=IMAGE 6" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Image 7</p>
            <img src="https://placehold.it/150x80?text=IMAGE 7" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Image 8</p>
            <img src="https://placehold.it/150x80?text=IMAGE 8" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div><br>