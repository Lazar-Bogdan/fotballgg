<?php
    session_start();

    if(isset($_POST['goBack'])){
        unset($_SESSION['nameSeason']);
        header("location:../mainPageOfSesons.php");
    }

?>