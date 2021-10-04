<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>

    <body>

        <link rel="stylesheet" href="loginstyle.css">
        <main id="main-holder">
            <div id="login-error-msg-holder">
                <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
            </div>

            <div id="welcome-text">
                Welcome!
            </div>

            <form action="loginService.php" method="GET" id="login-form">
                <div class="login-label">
                    <input type="Text" placeholder="username" name="username">
                    <input type="Text" placeholder="password" name="password">
                    <p></p>
                    <button type="submit" name="confirm" class="button-style">Confirm</button>
                    <p></p>
                    <button type="submit" name="register" class="button-style">Go To Register</button>
                </div>
            </form>
        </main>


    </body>

</html>
