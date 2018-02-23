
<?php
require_once("../resources/config.php");
?>

<base href="<?php echo $baseUrl ?>">
<html lang="PT">
<head>
    <?php include_once ("../resources/library/scriptindexincluder/scripts.php")?>
</head>
<body>

  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark" >
    <img src="public_html/img/logo.png" style="width:120px; height: 50px;margin-left: 15px;margin-right: 25px">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link headerlink" href="public_html/?l=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link headerlink" href="public_html/?l=instructions">Instruções</a>
            </li>
            <li class="nav-item">
                <a class="nav-link headerlink" href="public_html/?l=aboutus">Sobre Nós</a>
            </li>
            <li class="nav-item">
                <a class="nav-link headerlink" href="public_html/?l=download">Download</a>
            </li>
            <li class="nav-item">
                <a class="nav-link headerlink" href="public_html/?l=forum">Forum</a>
            </li>
            <li class="nav-item" disabled hidden>
                <a class="nav-link headerlink" href="?l=HTMLtest">HTMLtest</a>
            </li>

        </ul>


            <?php
            if(isset($_SESSION["log_in_info"]) && isset($_SESSION['id_user'])){
                if(isset($_POST['logout'])){
                    require_once LIBRARY_PATH . "/formsgateways/logout.php";}

                    echo $_SESSION['log_in_info'];

            }else{
                    echo"

                    <form class='form-inline my-2 my-lg-0'>
                        <a><label class='nav-link active' style=' color:#4792ff' data-toggle='modal' data-target='#login'>Login</label></a>
                        <a><label class='nav-link nav-item active' style='color:#4792ff' data-toggle='modal' data-target='#register'>Registar</label></a>
                    </form>
                    
                    ";
                }
            ?>

</nav>

<?php

$link = (isset($_GET['l'])) ? $_GET['l'] : 'home';
$_SESSION['l'] = $link;
if ($link == 'aboutus') {
    include_once(LIBRARY_PATH . "/aboutus/aboutus.php");
}
if ($link == 'home') {
    include_once(LIBRARY_PATH . "/home/home.php");
}
if ($link == 'forum') {
    include_once(LIBRARY_PATH . "/forms/forum.php");
}
if ($link == 'instructions'){
    include_once(LIBRARY_PATH . "/instructions/instructions.php");
}
if ($link == 'HTMLtest'){
    include_once 'HTMLtestpage.php';
}
if ($link == 'download'){
    include_once(LIBRARY_PATH . "/download/download.php");
}
if ($link == 'userinformation'){
    include_once(LIBRARY_PATH . "/forms/userinformation.php");
}
?>

</body>
</html>

