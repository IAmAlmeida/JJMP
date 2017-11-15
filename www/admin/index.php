<?php
session_start();

if (isset($_SESSION["online"])){
    if($_SESSION["online"] == "0"){
        if(basename($_SERVER['PHP_SELF']) == "status.php"){
            include_once "status.php";
        }else if(basename($_SERVER['PHP_SELF']) == "usersconfig.php"){
            include_once "usersconfig.php";
        }else if(basename($_SERVER['PHP_SELF']) == "postsconfig.php"){
            include_once "postsconfig.php";
        }else if(basename($_SERVER['PHP_SELF']) == "settings.php"){
            include_once "settings.php";
        }else if(basename($_SERVER['PHP_SELF']) == "editusers.php"){
            include_once "editusers.php";
        }else{
            include_once "status.php";
        }



    }else if ($_SESSION["online"] == "1") {
        echo "Sem permissoes";
        return false;
    }
        else if ($_SESSION["online"] == "2"){
            echo "Email ou Password invalidos";
            header("Location: ../admin/login/login.php");
            return false;
        }else
            header("Location: ../admin/login/login.php");
    }else
    header("Location: ../admin/login/login.php");
