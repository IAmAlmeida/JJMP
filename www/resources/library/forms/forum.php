<?php

if (isset($_POST['btnvai'])){

    $id = $_POST['btnvai'];
    $resposta1 = $_POST['txtresposta'];
    $queryr = "INSERT INTO respostas (idpergunta,idutilizador,resposta) VALUES ('$id','".$_SESSION['id_user']."','$resposta1')";
    $queryr2 =  mysqli_query($jjmpconn, $queryr);
    header("location:/public_html/?l=forum");

}
?>

    <div id="forumR" class="modal fade"role="dialog">
        <div class="modal-dialog" >
            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title">Responder</h4>
                </div>
                <div class="modal-body">

                    <div id="labeltest"></div>

                </div>
                <button  style="background-color: black"   type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>

    <div style="margin-top: 50px;">
        <center style="margin-right: 12.5%;margin-left: 12.5%;">
            <form class="form-horizontal" name="publish" method="POST" onsubmit="return checknull('txtpergunta')">
                <div>
                    <?php
                    if (isset($_SESSION["email_user"])) {
                        echo "              
                    <textarea rows='3' name=\"txtpergunta\" id=\"txtpergunta\"  placeholder='Qual é a sua questão?'
                           class=\"col-sm-12 form-control\" style='min-height: 35px'></textarea>
                    <button type='submit' class=\"col-sm-12 btn btn-primary\" name=\"pubq\" style=\" margin-top: 1%; margin-bottom: 5%; margin-left: 0.05%;\">
                        Publicar
                    </button>
                    <br><br>
                ";
                            if (isset($_POST['pubq'])) {
                                $perguntavai = "INSERT INTO   `forum` (`idpergunta`, `idutilizador`, `pergunta`) VALUES (NULL , '" . $_SESSION['id_user'] . "' , '" . $_POST['txtpergunta'] . "');";
                                $perguntago = mysqli_query($jjmpconn, $perguntavai);
                                unset($_POST['pubq'], $_POST['publish']);
                                header("refresh:0");
                            }
                        }
                    ?>
                        <div style="float: left;width: 100%">
                        <div id='accordion' role='tablist' style='margin-left: 1%; margin-right: 1%;'>
                            <?php
                            $query = "SELECT info.nickname, forum.pergunta, forum.idpergunta FROM forum INNER JOIN info on forum.idutilizador = info.id ORDER BY idpergunta DESC";
                            $querygot = mysqli_query($jjmpconn, $query);
                            if ($querygot->num_rows > 0) {
                                while ($row = $querygot->fetch_assoc()) {
                                    $btnid = $row["idpergunta"];
                                    echo "
                                     <div class='card' >
                                     <div   class='card-header' role='tab' id='heading" . $row['idpergunta'] . "'>
                                         <h5 class='mb-0'>
                                             <a style='color: darkgrey; ' data-toggle='collapse'  aria-expanded='true' aria-controls='collapse" . $row['idpergunta'] . "'>
                                               " . $row['nickname'] . " : " . $row['pergunta'] . "
                                             </a>
                                         </h5>
                                     </div>
                                     ";

                                    $querya = "SELECT info.nickname, respostas.resposta, respostas.idpergunta FROM respostas INNER JOIN info on respostas.idutilizador = info.id WHERE respostas.idpergunta=$btnid";
                                    $queryagot = mysqli_query($jjmpconn, $querya);
                                    if ($queryagot->num_rows > 0) {
                                        echo "<div id='collapse" . $row['idpergunta'] . "' class='collapse show' role='tabpanel' aria-labelledby='heading" . $row['idpergunta'] . "' data-parent='#accordion'>";
                                        while ($row = $queryagot->fetch_assoc()) {

                                            echo "
                          
                                 <div class='card-body' style='text-align: right; color: darkgrey;'>
                                    " . $row['resposta'] . " : " . $row['nickname'] . "
                                 </div>       
                                               
                                 
                          ";
                                        }

                                        echo "<br>";
                                    }
                                    if (isset($_SESSION["email_user"])) {
                                        echo "
                                
                                 <a name='.$btnid' id='.$btnid.' class='nav-link active btn btn-primary' onclick='btngetid($btnid)' style='margin-bottom:;background-color: #333; color: white'  data-toggle='modal' data-target='#forumR'>Responder</a>
                                 </div>
                                 </div>
                             ";
                                    }
                                }

                                echo "</div>";
                            }


                            ?>
                        </div>


                    </div>

                </div>

            </form>
        </center>

    </div>
