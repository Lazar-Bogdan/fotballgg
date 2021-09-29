<?php

    $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");


    $nameSeason = $_POST['nameSeason'];
    $teamName = $_POST['teamName'];
    $matches=$_POST['matches'];
    $wins=$_POST['wins'];
    $loses=$_POST['loses'];
    $ties=$_POST['ties'];
    $goals=$_POST['goals'];
    $points=$_POST['points'];
    $positions=4;

    if(isset($_POST['confirm'])){
        $mysql = "insert into teams (nameSeason,teamName,matches,wins,loses,ties,goals,points,position) values ('$nameSeason','$teamName','$matches','$wins','$loses','$ties','$goals','$points', '$positions') ";
        $query=mysqli_query($connect,$mysql);
        header("Location:dashboard.php");
    }


?>