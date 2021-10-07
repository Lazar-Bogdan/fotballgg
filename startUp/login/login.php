<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>

    <body>
        <?php
            session_start();
            $status=$_SESSION['nullField'];
            if($status=="somerr"){
                echo '<script type="text/javascript">';
                echo ' alert("username/password are incorect")';  //not showing an alert box.
                echo '</script>';
            }
            if($status=="empty"){
                echo '<script type="text/javascript">';
                echo ' alert("Fields are empty!!")';  //not showing an alert box.
                echo '</script>';
            }
        ?>
        <style> 

        </style>
        <main id="main-holder">
            <div id="login-error-msg-holder">
                <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
            </div>

            <div id="welcome-text">
                Welcome!
            </div>

            <form action="loginService.php" method="GET" id="login-form">
                <div class="login-label">
                    <p>Username:</p>
                    <input type="Text" placeholder="username" name="username">
                    <p>Password:</p>
                    <input type="password" placeholder="password" name="password">
                    <p></p>
                    <button type="submit" name="confirm" class="button-style">Confirm</button>
                    <p></p>
                    <button type="submit" name="register" class="button-style">Go To Register</button>
                </div>
            </form>
        </main>


    </body>

</html>
