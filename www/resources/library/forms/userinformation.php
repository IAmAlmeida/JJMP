<?php

$SQL = "SELECT
    i.email,
    i.nickname,
	i.photo,
    (
    SELECT
        COUNT(f.idutilizador)
    FROM
        forum f
    WHERE
        idutilizador = i.id
) AS n_perguntas,
(
    SELECT
        COUNT(r.idutilizador)
    FROM
        respostas r
    WHERE
        idutilizador = i.id
) AS n_respostas,
(
    SELECT
    	COUNT(r.resposta)
    FROM 
    	respostas r
    inner join forum f on r.idpergunta=f.idpergunta
    
	WHERE
    	f.idpergunta=r.idpergunta AND f.idutilizador=i.id
) AS n_respostas_r,
(
    SELECT
    	COUNT(r.resposta)
    FROM 
    	respostas r
    inner join forum f on r.idpergunta=f.idpergunta
    
	WHERE
    	r.idutilizador<>i.id AND f.idpergunta=r.idpergunta AND f.idutilizador=i.id
) AS n_respostas_user
FROM
    info i
WHERE
    i.id = ".$_SESSION['id_user'];
$SQLQUERY = mysqli_query($jjmpconn,$SQL);

if($SQLQUERY->num_rows > 0){
    while($row = $SQLQUERY->fetch_assoc()){
        $email = $row['email'];
        $nickname = $row['nickname'];
		$photo=$row['photo'];
        $qnt_questions =$row['n_perguntas'];
        $qnt_answers = $row["n_respostas"];
        $total_qnt_answers_recived = $row['n_respostas_r'];
        $qnt_answers_recived = $row['n_respostas_user'];
    }

}

if(isset($_POST['btnacc'])){
    $sqldel="DELETE FROM info WHERE id=".$_SESSION['id_user'];
    $sqlconndel = mysqli_query($jjmpconn,$sqldel);
    unset($_SESSION['email_user'],$_SESSION['id_user']);
    //USAR ALERT PARA ERRO e ALERTT PARA SUCESSO
    $_SESSION['alertt'] = '
    
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading">Conta apagada com sucesso</h5>
                <hr>
                <p>A sua conta foi agora apagada, inclusive todos os seus feitos prévios</p>
            </div>
 
    ';
    header("location:/public_html/?l=home");
}
if(isset($_POST['btnmp'])){
    $sql = "SELECT pass FROM info WHERE id = ".$_SESSION['id_user'];
    $sqlconn = mysqli_query($jjmpconn,$sql);
    if($sqlconn->num_rows>0){
        $passwordenc = $_POST['mptr'];
        $passwordenc = base64_encode($passwordenc);
        $passwordenc = str_rot13($passwordenc);
        while($row = $sqlconn->fetch_assoc()){
            $userpassword = $row['pass'];
        }
        if($passwordenc==$userpassword){
//USAR ALERT PARA ERRO e ALERTT PARA SUCESSO
            $_SESSION['alertt'] = '
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Password mudada!</h5>
                <hr>
                <p>A sua conta está segura!</p>
            </div>
            ';

            $newpass=$_POST['mptrn'];
            $newpass = base64_encode($newpass);
            $newpass = str_rot13($newpass);
            $sqlpasschange = "UPDATE info SET pass = '$newpass' WHERE id =".$_SESSION['id_user'];
            $sqlpasschangeconn = mysqli_query($jjmpconn,$sqlpasschange);
            unset($_SESSION['email_user'],$_SESSION['id_user']);
            header("location:/public_html/?l=home");
        }else{
            //USAR ALERT PARA ERRO e ALERTT PARA SUCESSO
            $_SESSION['alert'] = '
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading">Password antiga não correspondente!</h5>
                <hr>
                <p>A password antiga inserida não corresponde à sua password atual</p>
            </div>
            ';
        }
    }
}

if(isset($_POST['btnme'])){
    $sql = "SELECT email FROM info WHERE id = ".$_SESSION['id_user'];
    $sqlconn = mysqli_query($jjmpconn,$sql);
    if($sqlconn->num_rows>0){
        $email_post = $_POST['metr'];

        while($row = $sqlconn->fetch_assoc()){
            $email_db = $row['email'];
        }


        if($email_db==$email_post){
           $newemail=$_POST['metrn'];
           $sqlemailvalid="SELECT email FROM info WHERE email ='$newemail'";
           $sqlemailvalidconn=mysqli_query($jjmpconn,$sqlemailvalid);
            

           if($sqlemailvalidconn->num_rows == 0) {

               $sqlupdate = "UPDATE info SET email='$newemail' WHERE id=" . $_SESSION['id_user'];
               $sqlupdateconn = mysqli_query($jjmpconn, $sqlupdate);
               $_SESSION['alertt'] = '
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading">Email mudado!</h5>
                        <hr>
                        <p>A sua conta está segura!</p>
                    </div>
                ';
               unset($_SESSION['id_user'], $_SESSION['email_user']);
               header("location:/public_html/?l=home");

            }else{
               $_SESSION['alert'] = '
                    <div class="alert alert-danger" role="alert">
                        <h5 class="alert-heading">Email já em uso!</h5>
                        <hr>
                        <p>O Email inserido já se encontra em uso!</p>
                    </div>
                ';
            }
            }else{
                $_SESSION['alert'] = '
                    <div class="alert alert-danger" role="alert">
                        <h5 class="alert-heading">Email antigo não correspondente!</h5>
                        <hr>
                        <p>O Email antigo inserido não corresponde ao seu email atual</p>
                    </div>
                ';

            }
        }
}
/*USAR ALERT PARA ERRO e ALERTT PARA SUCESSO

            $_SESSION['alert'] = '
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading">Email antigo não correspondente!</h5>
                    <hr>
                    <p>O Email antigo inserido não corresponde ao seu email atual</p>
                </div>
            ';

            $_SESSION['alertt'] = '
                <div class="alert alert-success" role="alert">
                    <h5 class="alert-heading">Email mudado!</h5>
                    <hr>
                    <p>A sua conta está segura!</p>
                </div>
            ';
            */
$content ='
    <div class="row">
        <label style="color: dodgerblue"  class="col" >Email:</label>
        <label style="text-decoration: underline;" class="col">'.$email.'</label>
        <hr>
        <label style="color: dodgerblue"  class="col" >Nickname:</label>
        <label style="text-decoration: underline" class="col">'.$nickname.'</label>
    </div>
    <hr>
    <div class="row">
        <label style="color: dodgerblue" class="col">Numero de posts feitos:</label>
        <label style="text-decoration: underline;"class="col">'.$qnt_questions.'</label>
        <label style="color: dodgerblue" class="col">Numero de respostas dadas:</label>
        <label style="text-decoration: underline;" class="col">'.$qnt_answers.'</label>
    </div>
    
    <hr>
    <div class="row">
        <label style="color: dodgerblue" class="col">Numero de respostas recebidas:</label>
        <label style="text-decoration: underline;" class="col">'.$qnt_answers_recived.'</label>
		<label class="col"></label>
		<label class="col"></label>
    </div>
    <div class="row">
        <button class="col btn btn-primary" id="md" name="md">Mostrar Detalhes</button>
    </div>
';

$buttons='
        <div class="row">
            <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col">Mudar password</button>
        </div>
        <div class="row">
            <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
        </div>
        <div class="row">
            <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
        </div>
';


if(isset($_POST['mp'])){

    $content ='
        <div>
        <div style="margin-bottom:5%">
            <label style="color: dodgerblue" class="col-sm-4" for="mpt"> Password antiga : </label>
                <input type="password" id="mpt" name="mpt" class="col-sm-6" onkeyup="oldpasscheck()">
                <br>
            <label style="color: dodgerblue" class="col-sm-4" for="mptr"> Repetir password antiga : </label>
                <input type="password" id="mptr" name="mptr" class="col-sm-6" onkeyup="oldpasscheck()">
                <hr>
            <label style="color: dodgerblue" class="col-sm-4" for="mptn"> Password Nova : </label>
                <input type="password" id="mptn" disabled name="mpn" class="col-sm-6" onkeyup="oldpasscheck()">
                <br>
            <label style="color: dodgerblue" class="col-sm-4" for="mptrn"> Repetir password nova : </label>
                <input type="password" id="mptrn" disabled name="mptrn" class="col-sm-6" onkeyup="oldpasscheck()">
                <hr>
                <button type="submit" id="btnmp" name="btnmp" class="btn col-sm-12" disabled>Confirmar</button>
        </div>
        </div>
        
    ';
    $buttons='
    <div class="row">
        <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col">Informação</button>
    </div>
    <div class="row">
        <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col">Mudar Email</button>
    </div>
    <div class="row">
        <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col">Apagar Conta</button>
    </div>
    ';
}
if(isset($_POST['ac'])){
    $content ='
        <div>
            <label style="color: dodgerblue" for="deleteacc" class="col-sm-3">Escreva "<strong style="text-decoration: underline;color:darkred;">DELETE</strong>"</label>
            <input id="deleteacc" name="deleteacc" class="col-sm-6" onkeyup="del()" style="margin-bottom: 5%">
            <br>
            <div id="checkboxdel" hidden>
                <label style="color: dodgerblue" for="deletebox" class="col-sm-5">Deseja mesmo <strong style="text-decoration: underline;color:darkred;">APAGAR</strong> a sua conta?</label>
                <input type="checkbox" id="deletebox" name="deletebox" onclick="del()" style="margin-bottom: 5%">
            </div>
            <button type="submit" id="btnacc" name="btnacc" class="btn col-sm-12" disabled>Confirmar</button>
        </div>
    ';

    $buttons='
        <div class="row">
            <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
        </div>
        <div class="row">
            <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
        </div>
        <div class="row">
            <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Informação</button>
        </div>
    ';

}
if(isset($_POST['me'])){
    $content ='
    
        <div>
        <div style="margin-bottom:5%">
            <label style="color: dodgerblue" class="col-sm-4" for="met"> Email atual : </label>
                <input id="met" name="met" class="col-sm-6" onkeyup="emailchange()">
                <br>
            <label style="color: dodgerblue" class="col-sm-4" for="metr"> Repetir email atual : </label>
                <input  id="metr" name="metr" class="col-sm-6" onkeyup="emailchange()">
                <hr>
            <label style="color: dodgerblue" class="col-sm-4" for="metn"> Email novo : </label>
                <input type="email" id="metn" disabled name="metn" class="col-sm-6" onkeyup="emailchange()">
                <br>
            <label style="color: dodgerblue" class="col-sm-4" for="metrn"> Repetir email novo : </label>
                <input type="email" id="metrn" disabled name="metrn" class="col-sm-6" onkeyup="emailchange()">
                <hr>
                <button type="submit" id="btnme" name="btnme" class="btn col-sm-12" disabled>Confirmar</button>
        </div>
        </div>
        
    ';

    $buttons='
    <div class="row">
        <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col">Mudar password</button>
    </div>
    <div class="row">
        <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col">Informação</button>
    </div>
    <div class="row">
        <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col">Apagar Conta</button>
    </div>
    ';
}
if(isset($_POST['def'])){
    $content ='
    <div class="row">
        <label style="color: dodgerblue"  class="col" >Email:</label>
        <label style="text-decoration: underline;" class="col">'.$email.'</label>
        <hr>
        <label style="color: dodgerblue"  class="col" >Nickname:</label>
        <label style="text-decoration: underline" class="col">'.$nickname.'</label>
    </div>
    <hr>
     <div class="row">
        <label style="color: dodgerblue" class="col">Numero de posts feitos:</label>
        <label style="text-decoration: underline;"class="col">'.$qnt_questions.'</label>
        <label style="color: dodgerblue" class="col">Numero de respostas dadas:</label>
        <label style="text-decoration: underline;" class="col">'.$qnt_answers.'</label>
    </div>
	
    <hr>
    <div class="row">
        <label style="color: dodgerblue" class="col">Numero de respostas recebidas:</label>
        <label style="text-decoration: underline;" class="col">'.$qnt_answers_recived.'</label>
		<label class="col"></label>
		<label class="col"></label>
    </div>
	<div class="row">
        <button class="col btn btn-primary" id="md" name="md">Mostrar Detalhes</button>
    </div>
';

    $buttons='
    <div class="row">
        <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
    </div>
    <div class="row">
        <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
    </div>
    <div class="row">
        <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
    </div>
';
}
  if(isset($_POST['md'])){
    $content = '
    <div class="row">
        <button type="submit" id="QF" name="QF" style="margin-bottom: 5px;margin-right:1%;" class="btn btn-primary col">Questões feitas</button>
        <button type="submit" id="RD" name="RD" style="margin-bottom: 5px;margin-right:1%;" class="btn btn-primary col">Respostas Dadas</button>
        <button type="submit" id="RR" name="RR" style="margin-bottom: 5px;" class="btn btn-primary col">Respostas Recebidas</button>
    </div>
    ';

    $buttons='
    <div class="row">
        <button type="submit" id="def" name="def" style="margin-bottom: 5px" class="btn btn-primary col">Informação</button>
    </div>
    <div class="row">
        <button type="submit" id="mp" name="mp" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar password</button>
    </div>
    <div class="row">
        <button type="submit" id="me" name="me" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Mudar Email</button>
    </div>
    <div class="row">
        <button type="submit" id="ac" name="ac" style="margin-bottom: 5px" class="btn btn-primary col-sm-12">Apagar Conta</button>
    </div>
';
  }
  if(isset($_POST['QF'])){
    $buttons='<div class="row">
        <button class="col btn btn-primary" id="md" name="md">Voltar</button>
    </div>';
      $SQL = "SELECT pergunta,datapost FROM forum WHERE idutilizador =".$_SESSION['id_user']." ORDER BY datapost DESC";
      $result=mysqli_query($jjmpconn,$SQL);


      $content="";
      foreach ($result as $row){
          $data = explode(" ",$row['datapost']);
          $content.=
              "<span style='display: inline-block;width: 100%;'>
                ".$_SESSION['email_user']."
              
              <span style='float:right;'>".$data[0]."<button type='submit' style='border: none;background: none;padding: 0;'><i style='margin-left:5px' class='fa fa-times'></i></button></span></span>
             <span style='margin-left: 2%'>".$row['pergunta']."<br><br></span>";
      }

  }
if(isset($_POST['RD'])){
    $buttons='<div class="row">
        <button class="col btn btn-primary" id="md" name="md">Voltar</button>
    </div>';
    $SQL = "SELECT pergunta,datapost FROM forum WHERE idutilizador =".$_SESSION['id_user']." ORDER BY datapost DESC";
    $result=mysqli_query($jjmpconn,$SQL);


    $content="";
    foreach ($result as $row){
        $data = explode(" ",$row['datapost']);
        $content.=
            "<span style='display: inline-block;width: 100%;'>
                ".$_SESSION['email_user']."
              
              <span style='float:right;'>".$data[0]."<button><i style='margin-left:5px' class='fa fa-times'></i></button></span></span>
             <span style='margin-left: 2%'>".$row['pergunta']."<br><br></span>";
    }

}
?>

<div class="clearfix">
    <div class="container-fluid" style="background-color: gainsboro;">
        <center>
            <hr style="background-color: dodgerblue">
            <img style="height: 250px; width:250px;" class="rounded-circle"src="<?php echo $photo;?>">
            <hr style="background-color: dodgerblue">
        </center>
    </div>
</div>
	<div>
		<center>
			<form method="POST">
				<button type="submit" id="ImageChange" name="ImageChange" class="btn btn-primary col-sm-2">Mudar Imagem</button>
			</form>
		</center>
	</div>
<?php 
	if(!isset($_POST['ImageChange'])){
	?>
<?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];unset($_SESSION['alert']);}?>
<div class="container">
    <form method="post">
    <?php echo $content; ?>
    <?php if($buttons!=""){echo '<hr style="background-color: black; width: 100%">'.$buttons;}?>
    </form>
</div>
<?php 
	}else{

	    ?>

        <form method='POST'>
            <div class="row">
                <div class="col">
                    <center>
                        <button id='goback' name='goback' class='btn btn-primary col-sm-2'>VOLTAR</button><br>
                    </center>
                </div>
            </div>
        </form>

		<form action="/resources/library/formsgateways/upload.php" method="post" enctype="multipart/form-data">
            <center>
                <div class="row">
                    <div class="col">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary" type="submit" value="<?php echo $_SESSION['id_user'];?>" name="submit">Upload</button>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="private" name="private" value="private">
                            <label class="form-check-label" for="private">Privada</label>
                        </div>
                    </div>
                </div>
            </center>
		</form>
        <?php
        $SQL = "SELECT DISTINCT (photo) FROM info WHERE privatephotograph = 0";
        $result = mysqli_query($jjmpconn,$SQL);
        $i=0;
        foreach ($result as $row){

            foreach($row as $rowr){


                if($i==0 || $i % 4 == 0){
                    echo "<center><div class='container-fluid row'>";
                }
                echo "
                <div class='col'>
                    <img src='$rowr' class='img-thumbnail' style='max-height: 250px;max-width: 250px'>
                </div>
                ";
                $i+=1;
                if($i % 4 == 0){
                    echo "</div></center>";
                }
            }

        }
        if($i % 4 != 0){
            if($i % 2 == 0){
                echo "<div class='col'></div><div class='col'></div></div></center>";
            }elseif ($i % 3 == 0){
                echo "<div class='col'></div></div></center>";
            }else{
                echo "<div class='col'></div><div class='col'></div><div class='col'></div></div></center>";
            }
        }
        ?>
	<?php }
	