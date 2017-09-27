<?php
/**
 * Created by PhpStorm.
 * User: João Almeida
 * Date: 27-09-2017
 * Time: 19:33
 */
for($i=1;$i<=4;$i++){
$result = $jjmpconn->query("SELECT * FROM info where id like $i");
$row=mysqli_fetch_row($result);
echo"<li>$row[0] : ";
echo"$row[1]</li>";
}

?>