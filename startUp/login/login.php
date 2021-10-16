<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    
    <body>
        <?php require_once 'loginService.php'?>
        
        <style> 
        
            html{
                height: 100%;
            }

            body{
                height: 100%;
                margin:0;
                font-family: "Times New Roman";
                display: grid;
                justify-items: center;
                background-color: #3a3a3a;
                
            }

            #login-error-msg-holder {
                width: 100%;
                height: 100%;
                display: grid;
                justify-items: center;
                align-items: center;
            }

            #login-error-msg {
                width: 23%;
                text-align: center;
                margin: 0;
                padding: 5px;
                font-size: 12px;
                font-weight: bold;
                color: #8a0000;
                border: 1px solid #8a0000;
                background-color: #e58f8f;
                opacity: 0;
            }

            #login-form{
                align-self:flex-start;
                display: grid;
                justify-items: center;
                align-items: center;
                
            }

            #main-holder{
                width: 50%;
                height: 70%;
                display: grid;
                justify-items: center;
                align-items: center;
                background-color: white;
                border-radius: 7px;
                box-shadow: 0px 0px 5px 2px black;
            }

            .login-label{
                align-self: flex-start;
                display: grid;
                justify-items: center;
                align-items: center;
                
            }

            .button-style{
                width: 100%;
                padding: 7px;
                border: none;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                background-color: #3a3a3a;
                cursor: pointer;
                outline: none;
            }
        </style>


        <main id="main-holder">
            <?php if(isset($_SESSION['loginmessage'])):?>

            <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">

            <?php 
                echo $_SESSION['loginmessage'];
                unset($_SESSION['loginmessage']);
            ?>
            </div>

            <?php endif?>

            <div id="welcome-text">
                Welcome!
            </div>

            <form action="loginService.php" method="POST" id="login-form">
                <div class="login-label">
                    <p>Username:</p>
                    <input type="Text" placeholder="username" name="username" require>
                    <p>Password:</p>
                    <input type="password" placeholder="password" name="password" require>
                    <p></p>
                    <button type="submit" name="confirm" class="button-style">Confirm</button>
                    <p></p>
                    <button type="submit" name="register" class="button-style">Go To Register</button>
                </div>
            </form>
        </main>

        
    </body>

</html>
