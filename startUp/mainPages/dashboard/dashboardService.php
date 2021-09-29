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

    if(isset($_POST['confirm'])){
        $mysql = "insert into teams (nameSeason,teamName,matches,wins,loses,ties,goals,points) values ('$nameSeason','$teamName','$matches','$wins','$loses','$ties','$goals','$points') ";
        $query=mysqli_query($connect,$mysql);
        header("Location:dashboard.php");
    }


?>