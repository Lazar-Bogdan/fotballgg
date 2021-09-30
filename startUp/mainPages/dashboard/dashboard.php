<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>dashboard</title>
    </head>

    <body>
        <?php require_once 'dashboardService.php'?>

        <?php

            if(isset($_SESSION['message'])):?>

            <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
            </div>


        <?php endif ?>

        <form method="POST" action="dashboardService.php">

            <?php

            $mysqli = new mysqli('localhost','root','','user_database') or die("unable to connect");
            $result = $mysqli->query("SELECT * FROM teams") or die($mysqli->error);
            //pre_r($result->fetch_assoc());

            //function pre_r($array){
            //    echo '<pre>';
            //    print_r($array);
            //    echo '</pre>';
            //}

            ?>


            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>nameSeason</th>
                            <th>teamName</th>
                            <th>matches</th>
                            <th>wins</th>
                            <th>loses</th>
                            <th>ties</th>
                            <th>goals</th>
                            <th>points</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
            <?php
                while($row= $result->fetch_assoc()) :
            ?>
                <tr>
                    <td><?php echo $row['nameSeason']; ?></td>
                    <td><?php echo $row['teamName']; ?></td>
                    <td><?php echo $row['matches']; ?></td>
                    <td><?php echo $row['wins']; ?></td>
                    <td><?php echo $row['loses']; ?></td>
                    <td><?php echo $row['ties']; ?></td>
                    <td><?php echo $row['goals']; ?></td>
                    <td><?php echo $row['points']; ?></td>
                    <td>
                        <a href="dashboard.php?edit= <?php echo $row['position'];?>"
                            class="btn btn-danger">Edit</a>
                        <a href="dashboardService.php?delete=<?php echo $row['position'];?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
                </table>
            </div>


            <p> Welcome ! </p>
            <input type="hidden" name="position" value="<?php echo $position; ?>">
            <input type="text" value="<?php echo $nameSeason?>" placeholder="Season Name" name="nameSeason">
            <input type="text" value="<?php echo $teamName?>" placeholder="Team Name" name="teamName">
            <input type="text" value="<?php echo $matches?>" placeholder="Matches" name="matches">
            <input type="text" value="<?php echo $wins?>" placeholder="Wins" name="wins">
            <input type="text" value="<?php echo $loses?>" placeholder="Loses" name="loses">
            <input type="text" value="<?php echo $ties?>" placeholder="Ties" name="ties">
            <input type="text" value="<?php echo $goals?>" placeholder="Goals" name="goals">
            <input type="text" value="<?php echo $points?>" placeholder="Points" name="points">
            <?php
                if($update==true):
            ?>
            <button type="submit" name="update">Update</button>
            <?php else: ?>
            <button type="submit" name="confirm">Confirm</button>
            <?php endif;?>
            

            <button type="submit" name="goBack">Go Back</button>


        </form>


        
        
        

        <?php

        ?>


    </body>

</html>
