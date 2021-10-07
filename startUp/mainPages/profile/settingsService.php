<?php
    session_start();
    $connect=new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");

    $name=$_POST['name'];
    $country=$_POST['Country'];
    $state=$_POST['State'];
    $gmail=$_POST['Gmail'];
    $username = $_SESSION['username'];

    if(isset($_POST['confirm'])){
        if(!is_null($_POST['name']) && !is_null($_POST['Country'])
            && !is_null($_POST['State']) && !is_null($_POST['Gmail'])){
                $connect->query("UPDATE users set nume='$name',gmail='$gmail',country='$country',state='$state' WHERE username='$username'");
            header("location: profile.php");
        }
    }


?>