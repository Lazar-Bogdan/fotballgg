<?php
    session_start();
    if($_SESSION['loggedUser']==null){
        $_SESSION['loggedUser']=false;
    }

    mainPageButtons();
    if($_SESSION['loggedUser']==false){
       # $_SESSION['loggedUser']=false;
        callingSeasons();
    }else{
       # $_SESSION['loggedUser']=true;
        callingSeasons();
    }

?>


<?php

    function callingSeasons(){
        if(isset($_POST['seriea'])){
            $_SESSION['nameSeason']="SERIE A";
            
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['serieb'])){
            $_SESSION['nameSeason']="SERIE B";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['liga1'])){
            $_SESSION['nameSeason']="LIGA 1";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['liga2'])){
            $_SESSION['nameSeason']="LIGA 2";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['ligue1'])){
            $_SESSION['nameSeason']="LIGUE 1";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['ligue2'])){
            $_SESSION['nameSeason']="LIGUE 2";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['bundesliga'])){
            $_SESSION['nameSeason']="Bundesliga";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['2bundesliga'])){
            $_SESSION['nameSeason']="2.Bundesliga";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['laliga'])){
            $_SESSION['nameSeason']="LA LIGA";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
        if(isset($_POST['segundaDivision'])){
            $_SESSION['nameSeason']="Segunda Division";
            header("location:Seasons/onlyPageOfSeasons.php");
        }
    }


    function mainPageButtons(){
        if(isset($_POST['dashboard'])){
            header("Location:dashboard/dashboard.php");
        }
    
        if(isset($_POST['logout'])){
            session_destroy();
            header("location:mainPageOfSesons.php");
        }
        if(isset($_POST['profile'])){
            header("location:profile/profile.php");
        }
        if(isset($_POST['settings'])){
            header("location:profile/settings.php");
        }
        if(isset($_POST['signUp'])){
            header("location:../login/login.php");
        }
    }

?>
