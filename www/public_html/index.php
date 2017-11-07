
    <?php
    require_once("../resources/config.php");

    require_once(TEMPLATES_PATH . "/header.php");
    require_once(TEMPLATES_PATH . "/rightPanel.php");
    require_once(TEMPLATES_PATH . "/footer.php");

    ?>
    <head>
<?php include_once (LIBRARY_PATH . "/scriptindexincluder/scripts.php")?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <div id="register" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Responder</h4>
                </div>
                <div class="modal-body">

                    <?php require (LIBRARY_PATH."/forms/register.php"); ?>

                </div>
                <button type="button" style="background-color: black" class="btn btn-primary btn-block close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>

    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title" style="float: right;">Login</h4>
                </div>
                <div class="modal-body">
                    <?php require (LIBRARY_PATH."/forms/login.php"); ?>
                </div>
                <button type="button" style="background-color: black" class="btn btn-primary btn-block close" data-dismiss="modal">&times;</button>
                </div>
            </div>
        </div>
    </div>

<?php if (isset($_SESSION['loggedmodals'])){
    echo $_SESSION['loggedmodals'];
}