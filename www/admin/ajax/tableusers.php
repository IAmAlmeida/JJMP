<?php
require "../../resources/config.php";
?>


<form method="get" id="form1">

</form>

<div class="table responsive">
                    <thead>
                    <tr>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">Roll</th>
                        <th style="text-align:center">Username</th>
                        <th style="text-align:center">Email</th>
                        <th style="text-align:center">Editar</th>
                        <th style="text-align:center">Remover</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                $sql = "SELECT * FROM info";
                    $result = mysqli_query($jjmpconn, $sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            // check admin or user
                            if ($row["roll"] == 1) {
                                $roll = "User";
                            }else if($row["roll"] == 2){
                                $roll = "Admin";
                            }else{
                                $roll = "Erro";
                            }
                        $id =$row["id"];
                            $nick = $row["nickname"];

?>
                     <tr>
                  <td style="text-align:center" scope="row"><?php echo $id ?> </td>
                  <td style="text-align:center"><?php echo $roll ?></td>
                  <td style="text-align:center" > <?php echo $nick ?></td>
                  <td style="text-align:center"> <?php echo $row["email"] ?></td>
                   <td style="text-align:center;"><a href="/admin/editusers.php?id=<?php echo $id?>"><span class="glyphicon glyphicon-edit"></span></a></td>
             <td style="text-align:center;"><a onclick="return confirm('Isto é uma ação irreversível, tem a certeza que quer remover?')" href="deleteusers.php?id=<?php echo $id?>"><span class="glyphicon glyphicon-remove"></span></a></td>
               

            </td>

                </tr><?php
                            
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
</tbody>
</div>

