<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>MainPageOfSeasons</title>
    </head>

    <body>

        <?php 
            session_start();
           
        
        ?>
        <link rel="stylesheet" href="mainPageOfSesonstyle.css">
        <form action="mainPageofSesonsService.php" method="POST">
            <h1 id="test" >These are our season</h1>
            <div id="content" class="cointer__season">
                <details class="details-example">
                    <summary>Italia</summary>
                    <ul>   
                        <button type="submit" name="seriea">SERIE A</button>
                        <button type="submit" name="serieb">SERIE B</button>
                        </ul>
                </details>
                <details class="details-example">
                    <summary>Romania</summary>
                    <ul>
                        <button type="submit" name="liga1">LIGA 1</button>
                        <button type="submit" name="liga2">LIGA 2</button>
                    </ul>
                </details>
                <details class="details-example">
                    <summary>France</summary>
                    <ul>
                        <button type="submit" name="ligue1">LIGUE 1</button>
                        <button type="submit" name="ligue2">LIGUE 2</button>
                    </ul>
                </details>
                <details class="details-example">
                    <summary>Germany</summary>
                    <ul>
                        <button type="submit" name="bundesliga">Bundesliga</button>
                        <button type="submit" name="2bundesliga">2Bundesliga</button>
                    </ul>
                </details>
                <details class="details-example">
                    <summary>Spain</summary>
                    <ul>
                        <button type="submit" name="laliga">La liga</button>
                        <button type="submit" name="segundaDivision">Segunda Division</button>
                    </ul>
                </details>
            </div>



       

            <?php
                include '../staticVariables/staticVariables.php';
                session_start();
                
                $connect=new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");
                $username = $_SESSION['username'];

                $rez= mysqli_query($connect, "SELECT functie FROM users WHERE nume='$username'");
                $row = mysqli_fetch_row($rez);
                $userStatus=$row[0];

                if($userStatus != "user"){
                    echo '<button type="submit" name="dashboard" >dashboard1</button>';
                }
                

            ?>

            <button type="submit" name="profile">You re profile</button>
            <button type="submit" name="settings">Settings</button>

            <button type="submit" name="logout">Log out</button>

        </form>

    </body>

</html>