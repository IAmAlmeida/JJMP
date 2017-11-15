<?php
require "../../resources/config.php";
?>
<div class="col-sm-9">
    <div class="well">
        <table id="tableposts" class="table table-striped">

<div class="table responsive">
    <thead>
    <tr>
        <th>Username</th>
        <th>Pergunta</th>

    </tr>
    </thead>
    <tbody>
    <?php


    $sql = "SELECT info.nickname,forum.pergunta FROM forum INNER JOIN info ON forum.idutilizador = info.id";

    $result = mysqli_query($jjmpconn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            echo '<tr>           
                 <td> '.$row["nickname"] .'</td>
                  <td> '.$row["pergunta"] .'</td>
                </tr>';
        }
    } else {
        echo "0 results";
    }
    ?>
    </tbody>
</div>
        </table>
    </div>
</div>

<div class="col-sm-9">
    <div class="well">
        <table id="tableposts" class="table table-striped">

            <div class="table responsive">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Resposta</th>

                </tr>
                </thead>
                <tbody>
                <?php


                $sql1 = "SELECT info.nickname , respostas.resposta FROM respostas INNER JOIN info ON respostas.idutilizador=info.id";


                $result1 = mysqli_query($jjmpconn, $sql1);

                if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {

                        echo '<tr>
                  <td scope="row">' . $row["nickname"]. '</td>               
                  <td> '.$row["resposta"] .'</td>
                </tr>';
                    }
                } else {

                }
                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>