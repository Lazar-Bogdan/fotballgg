<?php
    session_start();
    if($_SESSION['userlogged']!=true){
        session_destroy();
        header("location: mainPageOfSesons.php");
    }


?>