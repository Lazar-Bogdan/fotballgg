<?php

    session_start();

    $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gmail = $_POST['gmail'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $functie = "user";

    if(isset($_POST['register'])){
        if(!is_null($username) && !is_null($password)){

            $var = "SELECT nume FROM users WHERE username = '$username'";

            $test = substr($username,1);
            
            $password = $test.$password;

            $findOrNot = mysqli_query($connect,$var);

            $row = mysqli_num_rows($findOrNot);
            $_SESSION['loggedUser']=true;
            $_SESSION['username']=$username;

            if($row == 0){
                $mysql = "insert into users (nume,parola,gmail,functie,country,state,username) values ('$name','$password','$gmail','$functie','$country','$state','$username') ";


                $query=mysqli_query($connect,$mysql);

                header("Location:../mainPages/mainPageOfSesons.php");
            }else{
                echo "nu s a adaugat";
            }
        }
    }


?>


<?php

    if(isset($_POST['login'])){
        header("Location:../login/login.php");
    }

?>