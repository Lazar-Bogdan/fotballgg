<?php

    if(isset($_POST['login'])){
        header("Location:login/login.php");
    }

    if(isset($_POST['register'])){
        header("Location:register/register.php");
    }

?>