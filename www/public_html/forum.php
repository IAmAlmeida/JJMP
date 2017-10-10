

<div style="margin-top: 50px; width: 100%;height: 400px">
<center>
    <div style="width: 70%; background-color: gainsboro; height: 400px">
        <left>
            <input style="float: left; margin-left: 10px; margin-top: 20px" class="col-sm-9"><button  class="col-sm-2" style="float: left; margin-top: 20px; margin-left: 5px;">Publicar</button>
        </left>
        <br>
        <br>
        <div style="float: left">
        <?php
        $query = "Select * from forum";
        $querygot = mysqli_query($jjmpconn,$query);

        if ($querygot->num_rows > 0) {
            while($row = $querygot->fetch_assoc()) {
                $btnid = $row["idpergunta"];
                echo "<br><div>  ". $row["nickname"]. " Perguntou: " . $row["pergunta"] . "<input type='text'><button id='$btnid'>Responde</button></div><br>";
                $querya = "Select * from respostas Where idpergunta = $btnid";
                $queryagot = mysqli_query($jjmpconn, $querya);
                if ($queryagot->num_rows > 0){
                    while ($row = $queryagot->fetch_assoc()){
                        echo "<br><div>  ". $row["nickname"]. " Respondeu: " . $row["resposta"]."<br>";

                    }
                }
            }
        } else {

        }
        ?>
    </div>
    </div>
</center>
</div>
