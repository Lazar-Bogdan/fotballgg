<?php

    include '../staticVariables/staticVariables.php';
    
    $connect = new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");

    $username = $_GET['username'];
    $password = $_GET['password'];
    
    if(!isset($username) || trim($username) == '' || trim($password)== '' || !isset($password)){
        session_start();
        $_SESSION['nullField1']=="empty";
        header("Location:login.php");
    }else{
        $password = substr($username,1).$password;

        $result = mysqli_query($connect,"SELECT nume,parola FROM users WHERE username='$username'");

        $row=$result->fetch_assoc();

        if($row['parola'] == $password){
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['loggedUser']=true;
            $_SESSION['nullField']="logged";
            header("Location:../mainPages/mainPageOfSesons.php");
        }else{
            session_start();
            $_SESSION['nullField1']=="somerr";
            header("Location:login.php");
        }
    }


?>

<?php

    if(isset($_GET['register'])){
        header("Location:../register/register.php");
    }

?>