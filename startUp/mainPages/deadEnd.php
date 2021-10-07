<?php
    session_start();
    if($_SESSION['userlogged']!=true){
        session_destroy();
        session_start();
        $_SESSION['nullField']="logout";
        header("location: mainPageOfSesons.php");
    }


?>