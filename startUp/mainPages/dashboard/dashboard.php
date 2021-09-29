<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>dashboard</title>
    </head>

    <body>

        <form method="POST" action="dashboardService.php">
            <p> Welcome ! </p>
            <input type="text" name="nameSeason">
            <input type="text" name="teamName">
            <input type="text" name="matches">
            <input type="text" name="wins">
            <input type="text" name="loses">
            <input type="text" name="ties">
            <input type="text" name="goals">
            <input type="text" name="points">
            <button type="submit" name="confirm">Add</button>


        </form>


        <?php

            $mysqli = new mysqli('localhost','root','','user_database') or die("unable to connect");
            


        ?>


    </body>

</html>
