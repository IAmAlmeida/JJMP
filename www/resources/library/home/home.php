<?php if(isset($_SESSION['alertt'])){echo $_SESSION['alertt']; unset($_SESSION['alertt']);}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JJMP</title>



</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../../../public_html/img/robot1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../../../public_html/img/robot2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../../../public_html/img/robot3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>

<!-- Container -->
<div id="band" class="container text-justify">

    <h3>JJMP</h3>
    <p><em>Robô controlado por dispositivo móvel</em></p>


    <p>Neste projeto será criado um website, uma aplicação de dispositivo móvel e um robô. O robô é controlado pela aplicação móvel e no website disponibilizará todas as informações sobre o robô entre as quais o link de download da aplicação para o telemóvel e vídeos tutoriais relacionados com a construção/programação do robô.</p>
    <br>

</div>

<div id="tour" class="bg-1">
    <div class="container">
        <h3 class="text-center">Algumaaaaa</h3>
        <p class="text-center">Shit!!</p>
    </div>
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container">
    <h3 class="text-center">Contact</h3>

<center>
    <img src="/public_html/img/j_jjmp.jpg" id="imageJ" style="height: 20%; width: 20%" class="img-thumbnail rounded-circle clearfix">
    <label for="imageJ" class="text-center col-sm-5"><strong class="col-sm-6">João Almeida : </strong><br><center>joao.paulo.almeidaaa@gmail.com</center></label><br>
    <hr>
    <label for="imageJJ" class="text-center col-sm-5"><strong class="col-sm-6">João Marques : </strong><br><center> filipejoao008@gmail.com</center></label>
    <img src="/public_html/img/jj_jjmp.jpg" id="imageJJ" style="height: 20%; width: 20%;" class="img-thumbnail rounded-circle"><br>
    <hr>
    <img src="/public_html/img/m_jjmp.jpg" id="imageM" style="height: 20%; width: 20%;" class="img-thumbnail rounded-circle">
    <label for="imageM" class="text-center col-sm-5"><strong class="col-sm-6">Maria Saraiva : </strong><br><center>obeybands@gmail.com</center></label><br>
    <hr>
    <label for="imageP" class="text-center col-sm-5"><strong class="col-sm-6">Pedro Grilo : </strong><br><center>xpereiragrilo@gmail.com</center></label>
    <img src="/public_html/img/p_jjmp.jpg" id="imageP" style=" height: 20%; width: 20%;" class="img-thumbnail rounded-circle">
</center>

</div>


</body>
</html>
