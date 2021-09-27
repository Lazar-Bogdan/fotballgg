<?php

    

    $connect = new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");

    $username = $_GET['username'];
    $password = $_GET['password'];

    $rezUsername = sprintf("SELECT name FROM users 
        WHERE name = '%s'",
        mysqli_real_escape_string($connect,$username));

    $rezPassword = sprintf("SELECT name FROM users 
        WHERE parola = '%s'",
        mysqli_real_escape_string($connect,$password));

    if(!$rezUsername && !$rezPassword){
        echo "s a gasit";
    }else{
        echo "nu s a gasit";
    }

?>