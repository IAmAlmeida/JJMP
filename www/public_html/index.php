<?php
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
require_once(TEMPLATES_PATH . "/rightPanel.php");
require_once(TEMPLATES_PATH . "/footer.php");
?>
<head>
    <link rel="stylesheet" type="text/css" href="../resources/back.css">
</head>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <?php require "register.php" ?>
            <div class="modal-footer">

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
                <?php
                require "login.php";
                ?>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>

