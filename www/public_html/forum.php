<div style="margin-top: 50px; width: 100%; height: 700px;">
    <center>
        <form class="form-horizontal" name="publish" method="POST">
            <?php

            if (isset($_POST['pubq'])) {
                $perguntavai ="INSERT INTO `forum` (`idpergunta`, `nickname`, `pergunta`) VALUES (NULL , '". $_SESSION['email_user'] ."' , '". $_POST['txtpergunta'] ."');";
                $perguntago =mysqli_query($jjmpconn,$perguntavai);
                unset($_POST['pubq'],$_POST['publish']);
                header("refresh:0");

            }
            ?>
            <div style="width: 70%; background-color: #d3d0d8; height: 75px">
                <left>
                    <input name="txtpergunta"
                           style="float: left; margin-left: 50px; margin-right: 50px ; margin-bottom:20px; margin-top: 20px"
                           class="col-sm-8">
                    <button class="col-sm-2" name="pubq" style="float: left; margin-top: 20px; margin-left: 5px;">Publicar</button>
                </left>

        <br>
        <div style="float: left; background-color: gainsboro;" class="container">
            <div id='accordion' role='tablist' style='margin-left: 50px; margin-right: 50px;'>

                <?php
                $query = "Select * from forum";
                $querygot = mysqli_query($jjmpconn, $query);

                if ($querygot->num_rows > 0) {
                    while ($row = $querygot->fetch_assoc()) {
                        $btnid = $row["idpergunta"];
                        echo "
                            <div class='card' >
                            <div   class='card-header' role='tab' id='heading" . $row['idpergunta'] . "'>
                                <h5 class='mb-0'>
                                    <a style='color: darkgrey;' data-toggle='collapse' href='#collapse" . $row['idpergunta'] . "' aria-expanded='true' aria-controls='collapse" . $row['idpergunta'] . "'>
                                      " . $row['nickname'] . " : " . $row['pergunta'] . "
                                    </a>
                                </h5>
                            </div>";
                        $querya = "Select * from respostas Where idpergunta = $btnid";
                        $queryagot = mysqli_query($jjmpconn, $querya);
                        if ($queryagot->num_rows > 0) {
                            echo "<div id='collapse" . $row['idpergunta'] . "' class='collapse' role='tabpanel' aria-labelledby='heading" . $row['idpergunta'] . "' data-parent='#accordion'>";
                            while ($row = $queryagot->fetch_assoc()) {
                                echo "
                        
                                <div class='card-body' style='text-align: right; color: darkgrey;'>
                                   " . $row['resposta'] . " : " . $row['nickname'] . "
                                </div>                     
                                
                        ";

                            }

                            echo "</div><br>";
                        }

                        echo "
                                <button name='". $btnid ."' =\"float: left; margin-top: 20px; margin-left: 5px;\">Responder</button>
                        
                    
                            ";
                        if (isset($_POST[$btnid])){
                            $perguntaresp ="INSERT INTO `respostas` (`idpergunta`, `nickname`, `resposta`) VALUES (NULL , '". $_SESSION['email_user'] ."' , '". $_POST['txtpergunta'] ."');";
                            $perguntarespgo =mysqli_query($jjmpconn,$perguntaresp);
                            header("refresh:0");
                        }
                    }
                    echo "</div>";
                } else {

                }

                ?>
            </div>
        </div>
</div>
        </form>
</center>

</div>
