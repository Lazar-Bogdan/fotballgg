<?php
    session_start();

    $mysqli=new mysqli('localhost','root','','user_database') or die ("unable to connect");

    if(isset($_POST['goBack'])){
        unset($_SESSION['nameSeason']);
        header("location:../mainPageOfSesons.php");
    }

    if(isset($_POST['comment'])){
        $username = $_SESSION['username'];
        $comment = $_POST['addComment'];
        $season = $_SESSION['nameSeason'];
        $mysqli->query("INSERT into comments (unsername,comment,season) values ('$username','$comment','$season')");
        header("location:onlyPageOfSeasons.php");
    }

?>