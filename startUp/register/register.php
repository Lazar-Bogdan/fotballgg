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

            <form action="registerService.php" method="POST" id="register-form">
                <div class="register-label">
                    <input type="text" placeholder="name" name="name">
                    <input type="text" placeholder="username" name="username">
                    <input type="text" placeholder="password" name="password">
                    <input type="text" placeholder="gmail" name="gmail">
                    <input type="text" placeholder="country" name="country">
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
