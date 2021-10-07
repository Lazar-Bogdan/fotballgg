<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>

    <body>
        <link rel="stylesheet" href="registerstyle.css">

        <main id="main-holder">
            <div id="register-error-msg-holder">
                <p id="register-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
            </div>

            <div id="welcome-text">
                Welcome!
            </div>

            <form action="registerService.php" method="POST" id="register-form">
                <div class="register-label">
                    <p>Name:</p>
                    <input type="text" placeholder="name" name="name">
                    <p>Username:</p>
                    <input type="text" placeholder="username" name="username">
                    <p>Password:</p>
                    <input type="password" placeholder="password" name="password">
                    <p>Gmail:</p>
                    <input type="text" placeholder="gmail" name="gmail">
                    <p>Country:</p>
                    <input type="text" placeholder="country" name="country">
                    <p>State:</p>
                    <input type="text" placeholder="state" name="state">

                </div>
                <p></p>
                <button type="submit" name="register" class="button-style">register</button>
                <p></p>
                <button type="submit" name="login" class="button-style">Go To Login</button>

            </form>
        </main>


    </body>

</html>
