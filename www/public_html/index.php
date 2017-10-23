
    <?php
    require_once("../resources/config.php");

    require_once(TEMPLATES_PATH . "/header.php");
    require_once(TEMPLATES_PATH . "/rightPanel.php");
    require_once(TEMPLATES_PATH . "/footer.php");
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="../resources/back.css">
        <link rel="stylesheet" type="text/css" href="../resources/overlay.css">
        <link rel="stylesheet" type="text/css" href="../resources/accordion.css">
        <link rel="stylesheet" type="text/css" href="../resources/dropdown.css">
    </head>



    <div id="register" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registar</h4>
                </div>
                <div class="modal-body">
                    <?php require "register.php"; ?>
                </div>

            </div>
        </div>
    </div>

    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Log In</h4>
                </div>
                <div class="modal-body">
                    <?php require "login.php"; ?>
                </div>

                </div>
            </div>
        </div>
    </div>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../resources/homeandfooter.css">