<?php
    session_start();
    $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");

    if(isset($_POST['confirm'])){
        $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");
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
        header("location:dashboard.php"); 
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

    if(isset($_POST['goBack'])){
        header("location: ../mainPageOfSesons.php");
    }

    if(isset($_GET['delete-users'])){
        $id_users=$_GET['delete-users'];
        $rez = $connect->query("DELETE FROM users WHERE id='$id_users'") or die("It s not deleted");
        $_SESSION['message']= "Record has been removed";
        $_SESSION['msg_type']="danger";
        header("location:dashboard.php");
    }
    if(isset($_GET['edit-users'])){
        $id_users=$_GET['edit-users'];
        $rez = $connect->query("SELECT * FROM users WHERE id='$id_users'") or die("unable to select");
        $update_users=true;
        if($rez->num_rows!=0){
            $row = $rez->fetch_array();
            $nume=$row['nume'];
            $gmail=$row['gmail'];
            $functie=$row['functie'];
            $country=$row['country'];
            $state=$row['state'];
            $username=$row['username'];
        }
    }

    if(isset($_POST['update-users'])){
        $id_users=$_POST['id_users'];
        $nume=$_POST['name'];
        $gmail=$_POST['gmail'];
        $functie=$_POST['function'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $username=$_POST['username-users'];
        $connect->query("UPDATE users set nume='$nume',
        gmail='$gmail',functie='$functie',country='$country',state='$state',username='$username' WHERE id='$id_users'");
        $_SESSION['message']= "Record has been updated";
        $_SESSION['msg_type']="warning";
        
        header("location: dashboard.php");
    }

    if(isset($_GET['delete-comment'])){
        $id_comment=$_GET['delete-comment'];
        $rez = $connect->query("DELETE FROM comments WHERE id='$id_comment'") or die("It s not deleted");
        $_SESSION['message']= "Record has been removed";
        $_SESSION['msg_type']="danger";
        header("location:dashboard.php");
    }

    if(isset($_GET['edit-comment'])){
        $id_comment=$_GET['edit-comment'];
        $rez = $connect->query("SELECT * FROM comments WHERE id='$id_comment'") or die("unable to select");
        $update_comment=true;
        if($rez->num_rows!=0){
            $row = $rez->fetch_array();
            $username_comment=$row['username'];
            $comment=$row['comment'];
            $season_comment=$row['season'];
        }
    }

    if(isset($_POST['update-comments'])){
        $id_comment=$_POST['id-comment'];
        $username_comment=$_POST['username-comment'];
        $comment=$_POST['comment'];
        $season_comment=$_POST['season-comment'];
        $connect->query("UPDATE comments set username='$username_comment', comment='$comment',
        season='$season_comment' WHERE id='$id_comment'");
        $_SESSION['message']= "Record has been updated";
        $_SESSION['msg_type']="warning";
        
        header("location: dashboard.php");

    }

    
?>
