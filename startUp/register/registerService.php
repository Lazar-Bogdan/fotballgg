<?php

    $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $gmail = $_POST['gmail'];

    if(isset($_POST['register'])){
        if(!is_null($username) && !is_null($password)){
            $mysql = "insert into users (nume,parola,gmail,functie) values ('$username','$password','$gmail',user) ";


            $query=mysqli_query($connect,$mysql);

            if($query){
                echo "s a facut";
            }
        }else{
            echo "nu s a facut";
        }
    }


?>