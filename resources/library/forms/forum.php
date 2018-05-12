
    <?php
    $tipo = $_GET['tipo'];
    if(!isset($tipo)){
        header("location: ?l=topicos");
    }
    switch($tipo){
        case 'instvideos':$title = 'Instruções - Exclarecimento de Videos';break;
        case 'instoutros':$title = 'Instruções - Outros';break;
        case 'contafoto':$title = 'A minha conta - Foto de perfil';break;
        case 'contapass':$title = 'A minha conta - Password';break;
        case 'contaemail':$title = 'A minha conta - Mudar de email';break;
        case 'contaoutros':$title = 'A minha conta - Outros';break;
        case 'outrosbugs':$title = 'Outros - Reportar Bugs';break;
        case 'outros':$title = 'Outros';break;
    }
    ?>
    <center>  <h1 style="margin-top: 60px;color: #4c4c4c;"><i class="fas fa-caret-left"></i>  <?php echo $title ?> <i class="fas fa-caret-right"></i></h1></center>
    <?php
if (isset($_POST['samerix'])) {
    $sql = "DELETE FROM respostas WHERE idpergunta =" . $_POST['samerix'];
    $sqlconn = mysqli_query($jjmpconn, $sql);
    $sql = "DELETE FROM forum WHERE idpergunta =" . $_POST['samerix'];
    $sqlconn = mysqli_query($jjmpconn, $sql);
}
if (isset($_POST['samerixr'])) {

    $sql = "DELETE FROM respostas WHERE idresposta =" . $_POST['samerixr'];
    $sqlconn = mysqli_query($jjmpconn, $sql);

}
if (isset($_POST['btnvai'])) {

    $id = $_POST['btnvai'];
    $resposta1 = $_POST['txtresposta'];
    $queryr = "INSERT INTO respostas (idpergunta,idutilizador,resposta) VALUES ('$id','" . $_SESSION['id_user'] . "','$resposta1')";
    $queryr2 = mysqli_query($jjmpconn, $queryr);
    header("location:?l=forum&tipo=$tipo");

}
if (isset($_POST['pubq'])) {
    $perguntavai = "INSERT INTO   `forum` (`idpergunta`, `idutilizador`, `pergunta`,`tipo`) VALUES (NULL , '" . $_SESSION['id_user'] . "' , '" . $_POST['txtpergunta'] . "','" . $tipo . "');";
    $perguntago = mysqli_query($jjmpconn, $perguntavai);
    unset($_POST['pubq'], $_POST['publish']);
    header("refresh:0");
}

        $questions = "SELECT info.nickname,info.role, forum.pergunta, forum.idpergunta,forum.idutilizador,forum.tipo FROM forum INNER JOIN info on forum.idutilizador = info.id WHERE forum.tipo = '$tipo' ORDER BY idpergunta DESC";
        $questionsget = mysqli_query($jjmpconn, $questions);

        if($questionsget -> num_rows > 0){
            $questionhtml ='<div id="accordion" role="tablist" aria-multiselectable="true">';
            while($row=$questionsget->fetch_assoc()){
                $iduserdb = $row['idutilizador'];
                $questionid = $row['idpergunta'];


                if (isset($_SESSION['id_user'])) {
                    $sequel="SELECT role FROM `info` WHERE `id` = ".$_SESSION["id_user"];
                    $sequelget = mysqli_query($jjmpconn,$sequel);
                    while($rowa=$sequelget->fetch_assoc()){
                        $role = $rowa['role'];
                    }
                    if ($_SESSION['id_user'] == $iduserdb && $_SESSION['id_user'] != "") {

                        $questionhtml .=
                            '
                            <div class="card" style="margin-bottom: 2%;">
                                  
                                <div class="card-header" style="background-color: #333" role="tab" id="heading'.$questionid.'">
                                <button type="submit" name="samerix" id="samerix'.$questionid.'" value="'.$questionid.'" style="float: right;width: 25px;height: 25px;border: none; background: none;padding: 0;color:whitesmoke"><h6 class="fa fa-eraser" style="float: right;"></h6></button>
                                    <h5 class="mb-0" style="margin-right: 26px;margin-left: 1px">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$questionid.'" aria-expanded="true"
                                        aria-controls="collapse'.$questionid.'">
                                           <label class="user" style="display: block;color: white;" >'.$row['nickname'].'</label><hr>
                                           <label class="text" style="display: block;color: white;" >'.$row['pergunta'].'</label>
                                        </a>
                                    </h5>
                                </div>
                            ';
                    }else if($role!=2){
                        $questionhtml .=
                            '
                            <div class="card" style="margin-bottom: 2%;">
                    
                                <div class="card-header" style="background-color: #333" role="tab" id="heading'.$questionid.'">
                                    <h5 class="mb-0" style="margin-right: 26px;margin-left: 1px">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$questionid.'" aria-expanded="true"
                                        aria-controls="collapse'.$questionid.'">
                                           <label class="user" style="display: block;color: white;" >'.$row['nickname'].'</label><hr>
                                           <label class="text" style="display: block;color: white;" >'.$row['pergunta'].'</label>
                                        </a>
                                    </h5>
                                </div>
                            ';
                    }else{
                        $questionhtml .=
                            '

                            <div class="card" style="margin-bottom: 2%;">
                                    
                                <div class="card-header" style="background-color: #333" role="tab" id="heading'.$questionid.'">
                                <button type="submit" name="samerix" id="samerix'.$questionid.'" value="'.$questionid.'" style="float: right;width: 25px;height: 25px;border: none; background: none;padding: 0;color:whitesmoke"><h6 class="fa fa-eraser" style="float: right;"></h6></button>
                                    <h5 class="mb-0" style="margin-right: 26px;margin-left: 1px">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$questionid.'" aria-expanded="true"
                                        aria-controls="collapse'.$questionid.'">
                                           <label class="user" style="display: block;color: white;" >'.$row['nickname'].'</label><hr>
                                           <label class="text" style="display: block;color: white;" >'.$row['pergunta'].'</label>
                                        </a>
                                    </h5>
                                </div>
                       
                            ';
                    }
                }else{
                    $questionhtml .=
                        '
                            <div class="card" style="margin-bottom: 2%;">
                    
                                <div class="card-header" style="background-color: #333" role="tab" id="heading'.$questionid.'">
                                    <h5 class="mb-0" style="margin-right: 26px;margin-left: 1px">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$questionid.'" aria-expanded="true"
                                        aria-controls="collapse'.$questionid.'">
                                           <label class="user" style="display: block;color: white;" >'.$row['nickname'].'</label><hr>
                                           <label class="text" style="display: block;color: white;" >'.$row['pergunta'].'</label>
                                        </a>
                                    </h5>
                                </div>
                            ';
                }
                $answer = "SELECT info.nickname, respostas.resposta, respostas.idpergunta, respostas.idresposta , respostas.idutilizador FROM respostas INNER JOIN info on respostas.idutilizador = info.id WHERE respostas.idpergunta = $questionid";
                $answerget = mysqli_query($jjmpconn, $answer);
                if($answerget->num_rows>0){
                    $questionhtml.=
                        '
                            <div id="collapse'.$questionid.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$questionid.'">
                        ';
                    while($row=$answerget->fetch_assoc()){
                        $iduserdb = $row['idutilizador'];$answerid = $row['idresposta'];
                        if (isset($_SESSION['id_user'])) {

                            if ($_SESSION['id_user'] == $iduserdb && $_SESSION['id_user'] != "") {

                        $questionhtml.=
                            '
                                <div class="card-block">
                                    <button type="submit" name="samerixr" id="samerixr'.$answerid.'" value="'.$answerid.'" style="float: right;width: 25px;height: 25px;border: none; background: none;padding: 0;color:rgba(100,4,2,0.71);"><h6 class="fa fa-times"></h6></button>
                                    <label class="user" style="display: block;">'.$row['nickname'].'</label><hr>
                                    <label class="text" style="display: block;">'.$row['resposta'].'</label><hr style="background-color: #333">
                                </div>
                            ';
                            }else if($role==2){
                                $questionhtml.=
                                    '
                                <div class="card-block">
                                    <button type="submit" name="samerixr" id="samerixr'.$answerid.'" value="'.$answerid.'" style="float: right;width: 25px;height: 25px;border: none; background: none;padding: 0;color:rgba(100,4,2,0.71);"><h6 class="fa fa-times"></h6></button>
                                    <label class="user" style="display: block;">'.$row['nickname'].'</label><hr>
                                    <label class="text" style="display: block;">'.$row['resposta'].'</label><hr style="background-color: #333">
                                </div>
                                    ';

                            }else{
                                $questionhtml.=
                                    '
                                <div class="card-block">
                                   <label class="user" style="display: block;">'.$row['nickname'].'</label><hr>
                                    <label class="text" style="display: block;">'.$row['resposta'].'</label><hr style="background-color: #333">
                                </div>
                            ';
                            }
                        }else{
                            $questionhtml.=
                                '
                                <div class="card-block">
                                   <label class="user" style="display: block;">'.$row['nickname'].'</label><hr>
                                    <label class="text" style="display: block;">'.$row['resposta'].'</label><hr style="background-color: #333">
                                </div>
                            ';
                        }
                    }
                    if(isset($_SESSION['email_user'])){
                    $questionhtml.=
                        '
                       
                            <a name="'.$questionid.'" id="'.$questionid.'" class="nav-link active btn btn-primary" onclick="btngetid('.$questionid.')" style="margin-top:4%;background-color: #333; color: white"  data-toggle="modal" data-target="#forumR">Responder</a>
                        
                        ';}
                    $questionhtml.="</div>";
                    $questionhtml.="</div>";
                }else{
                    $questionhtml.=
                        '
                       <div id="collapse'.$questionid.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$questionid.'">
                            <center><p><h6><b>Seja o primeiro a responder!</b></h6></p></center>
                            <a name="'.$questionid.'" id="'.$questionid.'" class="nav-link active btn btn-primary" onclick="btngetid('.$questionid.')" style="margin-top:4%;background-color: #333; color: white"  data-toggle="modal" data-target="#forumR">Responder</a>
                       </div>
                        ';
                    $questionhtml.="</div>";
                }
            }

            $questionhtml .="</div>";

        }


if (isset($_SESSION["email_user"])&&$_SESSION["email_user"]!="") {
    $form = "              
                

               
                  
                   <textarea rows='3' name='txtpergunta' id='txtpergunta'  placeholder='Qual é a sua questão?' class='col-sm-12 form-control' style='min-height: 35px;margin-top: 5%; border-radius: 7px;text-align: center'></textarea>
                    <button onclick=\"return checknull('txtpergunta')\" type='submit' class='col-sm-12 btn btn-primary' name='pubq' style=' margin-top: 1%; margin-bottom: 5%; margin-left: 0.05%;'>Publicar</button>
              
                    <br><br>
                ";
}else{
    $form = "<div class='col-sm-8' style='margin-top: 5%;margin-bottom: 5%'>
        <label>Se pretende fazer alguma questão e ou responder a alguma questão, cadastre-se ou logue-se.</label>
        </div>";
}


?>

<div id="forumR" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style='background-image: url("../../../public_html/img/background.png");'>
            <div class="modal-header">
                <h4 class="modal-title">Responder</h4>
            </div>
            <div class="modal-body">

                <div id="labeltest"></div>

            </div>
            <button style="background-color: black" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    </div>
</div>

<div style="margin-top: 5%;">
    <center style="margin-right: 12.5%;margin-left: 12.5%;">
        <form class="form-horizontal" name="publish" method="POST">

            <?php echo $form; ?>


            <div id='accordionset'>

                <?php if (isset($questionhtml)) {
                    echo $questionhtml;
                } ?>

            </div>

        </form>
    </center>
</div>