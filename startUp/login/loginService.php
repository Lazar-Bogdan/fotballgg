<?php
    session_start();
    
    $connect = new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['confirm'])){
        if($_POST['username']== ""){
            $_SESSION['msg_type']="danger";
            $_SESSION['loginmessage']="Fields are empty";
            header("Location: login.php");
        } 
        $hash = "$2y$10ZmQmueJLOe9bDZWhTR0BlOBgJwngffKqyuE9gDvtSbYuqYZ0ztsB2";
        $password = $hash.$password;

        $result = mysqli_query($connect,"SELECT nume,parola FROM users WHERE username='$username'");

        $row=$result->fetch_assoc();

        if($row['parola'] == $password){
            $_SESSION['username']=$username;
            $_SESSION['loggedUser']=true;
            header("Location:../mainPages/mainPageOfSesons.php");
        }else{
            $_SESSION['loginmessage']="User/Password incorect";
            $_SESSION['msg_type']="danger";
            header("Location:login.php");
        }
    }

    if(isset($_POST['register'])){
        header("Location:../register/register.php");
    }

?>
