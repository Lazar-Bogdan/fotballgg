<?php
    session_start();
    if(isset($_POST['goBack'])){
        $_SESSION['loggedUser']=true;
        header("location:../mainPageOfSesons.php");
    }

?>