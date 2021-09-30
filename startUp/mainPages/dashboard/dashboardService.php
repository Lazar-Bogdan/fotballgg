<?php

    session_start();

    $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");
    #$update=true;

    if(isset($_POST['confirm'])){
        $nameSeason = $_POST['nameSeason'];
        $teamName = $_POST['teamName'];
        $matches=$_POST['matches'];
        $wins=$_POST['wins'];
        $loses=$_POST['loses'];
        $ties=$_POST['ties'];
        $goals=$_POST['goals'];
        $points=$_POST['points'];
        $mysql = "insert into teams (nameSeason,teamName,matches,wins,loses,ties,goals,points) values ('$nameSeason','$teamName','$matches','$wins','$loses','$ties','$goals','$points') ";
        $query=mysqli_query($connect,$mysql);
        $_SESSION['message']= "Record has been added";
        $_SESSION['msg_type']="succes";
        header("Location:dashboard.php");
    }



    if(isset($_GET['delete'])){
        $position=$_GET['delete'];
        $rez1=$connect->query("DELETE FROM teams WHERE position='$position'") or die("unable to connect");
        $_SESSION['message']= "Record has been removed";
        $_SESSION['msg_type']="danger";
        header("location:dashboard.php");   
    }


    if(isset($_GET['edit'])){
        $position=$_GET['edit'];
        $rez = $connect->query("SELECT * FROM teams WHERE position='$position'")or die("unable to connect");
        $update=true;
        if($rez->num_rows!=0){
            $row = $rez->fetch_array();
            $nameSeason=$row['nameSeason'];
            $teamName = $row['teamName'];
            $matches=$row['matches'];
            $wins=$row['wins'];
            $loses=$row['loses'];
            $ties=$row['ties'];
            $goals=$row['goals'];
            $points=$row['points'];
        }
    }

    if(isset($_POST['update'])){
        $position=$_POST['position'];
        $nameSeason = $_POST['nameSeason'];
        $teamName = $_POST['teamName'];
        $matches=$_POST['matches'];
        $wins=$_POST['wins'];
        $loses=$_POST['loses'];
        $ties=$_POST['ties'];
        $goals=$_POST['goals'];
        $points=$_POST['points'];

        $connect->query("UPDATE teams set nameSeason='$nameSeason', teamName='$teamName',
            matches='$matches', wins='$wins', loses='$loses',
            ties='$ties', goals='$goals', points='$points' WHERE position='$position'") or die ("unable to connect");
        
        $_SESSION['message']= "Record has been updated";
        $_SESSION['msg_type']="warning";
        
        header("location: dashboard.php");
    }

?>
