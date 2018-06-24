<?php
require "../../resources/config.php";
?>
<div class="col-sm-9">
    <div class="well">
        <table id="tableposts" class="table table-striped">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Ação</th>
                    <th>IP</th>
                    <th>Ultimo Acesso</th>


                </tr>
                </thead>
                <tbody>
                <?php


                $sql = "SELECT * FROM logs ORDER BY ultimo_acesso DESC";

                $result = mysqli_query($jjmpconn, $sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      $id =  $row["id"];
                        echo '<tr>           
                 <td> '.$row["id"] .'</td>
                  <td> '.$row["username"] .'</td>
                    <td> '.$row["acao"] .'</td>
                    <td >' .$row["ip"].'</td>
                      <td> '.$row["ultimo_acesso"] .'</td>
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
