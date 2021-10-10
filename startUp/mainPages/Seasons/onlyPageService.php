<?php
    session_start();

    $mysqli=new mysqli('localhost','root','','user_database') or die ("unable to connect");

    if(isset($_POST['comment'])){
        
        $username = $_SESSION['username'];
        $comment = $_POST['addComment'];
        $season = $_SESSION['nameSeason'];
        $time = date('H:i:s');
        $mysqli->query("INSERT into comments (username,comment,season,dhours) values ('$username','$comment','$season','$time')");
        header("location:onlyPageOfSeasons.php");
    }
    
    SeasonPageButtons();

?>


<?php

    function SeasonPageButtons(){
        if(isset($_POST['dashboard'])){
            header("Location:../dashboard/dashboard.php");
        }

        if(isset($_POST['logout'])){
            session_destroy();
            header("location:../mainPageOfSesons.php");
        }
        if(isset($_POST['profile'])){
            header("location:../profile/profile.php");
        }
        if(isset($_POST['settings'])){
            header("location:../profile/settings.php");
        }
        if(isset($_POST['signUp'])){
            header("location:../../login/login.php");
        }
    }

?>