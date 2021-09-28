<?php

    $connect = new mysqli('localhost','root','','user_database') or die("unable to connect");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $gmail = $_POST['gmail'];
    $functie = "user";

    if(isset($_POST['register'])){
        if(!is_null($username) && !is_null($password)){

            $var = "SELECT nume FROM users WHERE nume = '$username'";

            $test = substr($username,1);
            
            $password = $test.$password;

            $findOrNot = mysqli_query($connect,$var);

            $row = mysqli_num_rows($findOrNot);

            if($row == 0){
                $mysql = "insert into users (nume,parola,gmail,functie) values ('$username','$password','$gmail','$functie') ";


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