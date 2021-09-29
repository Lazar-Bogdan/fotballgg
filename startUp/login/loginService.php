<?php

    include '../staticVariables/staticVariables.php';
    

    $connect = new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");

    $username = $_GET['username'];
    $password = $_GET['password'];

    $password = substr($username,1).$password;

    $varUsername = "SELECT nume FROM users WHERE nume='$username'";
    $varPassword = "SELECT parola FROM users WHERE parola='$password'";


    $findUsername = mysqli_query($connect,$varUsername);
    $findPassword = mysqli_query($connect,$varPassword);

    $rowUsername = mysqli_num_rows($findUsername);
    $rowPassword = mysqli_num_rows($findPassword);

    $result = mysqli_query($connect,"SELECT nume,functie FROM users WHERE nume='$username'");

    $row=mysqli_fetch_row($result);

    $userStatus=$row[1];
    #echo $userStatus;

    if($rowUsername!=0 && $rowPassword!=0){
        header("Location:../mainPages/mainPageOfSesons.php");
    }else{
        echo "nu s a gasit";
    }


?>

<?php

    if(isset($_GET['register'])){
        header("Location:../register/register.php");
    }

?>