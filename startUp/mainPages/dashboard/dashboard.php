<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>dashboard</title>
    </head>

    <body>
        <style> 
            * {
                box-sizing: border-box;
                font-family: Ebrima;
            }

            /* Create two equal columns that floats next to each other */
            .column {
                float: left;
                width: 33.33%;
                padding: 50px;
                height: 1000px; 
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            table {
                border: 1px solid black;
                table-layout: fixed;
            }

            th,
            td {
                border: 1px solid black;
                width: 100px;
                overflow: hidden;
            }
        </style>
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
            <p> Welcome ! </p>
            <div class="row">
                <div class="column">
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

                    <input type="hidden" name="position" value="<?php echo $position; ?>">
                    <input type="text" value="<?php echo $nameSeason?>" placeholder="Season Name" name="nameSeason"><br>
                    <input type="text" value="<?php echo $teamName?>" placeholder="Team Name" name="teamName"><br>
                    <input type="text" value="<?php echo $matches?>" placeholder="Matches" name="matches"><br>
                    <input type="text" value="<?php echo $wins?>" placeholder="Wins" name="wins"><br>
                    <input type="text" value="<?php echo $loses?>" placeholder="Loses" name="loses"><br>
                    <input type="text" value="<?php echo $ties?>" placeholder="Ties" name="ties"><br>
                    <input type="text" value="<?php echo $goals?>" placeholder="Goals" name="goals"><br>
                    <input type="text" value="<?php echo $points?>" placeholder="Points" name="points"><br>
                    <?php
                        if($update==true):
                    ?>
                    <button type="submit" name="update">Update</button>
                    <?php else: ?>
                    <button type="submit" name="confirm">Confirm</button>
                    <?php endif;?>


                </div>

                <div class="column">
                    <?php

                        $mysqli = new mysqli('localhost','root','','user_database') or die("unable to connect");
                        $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
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
                                    <th>username</th>
                                    <th>name</th>
                                    <th>function</th>
                                    <th>gmail</th>
                                    <th>country</th>
                                    <th>state</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                        <?php
                            while($row= $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['nume']; ?></td>
                            <td><?php echo $row['functie']; ?></td>
                            <td><?php echo $row['gmail']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo $row['state']; ?></td>
                            <td>
                                <a href="dashboard.php?edit= <?php echo $row['position'];?>"
                                    class="btn btn-danger">Edit</a>
                                <a href="dashboardService.php?delete=<?php echo $row['position'];?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                        </table>
                        <input type="hidden" name="position-users" value="<?php echo $position; ?>">
                        <input type="text" value="<?php echo $nameSeason?>" placeholder="username-users" name="username-users"><br>
                        <input type="text" value="<?php echo $teamName?>" placeholder="name" name="name"><br>
                        <input type="text" value="<?php echo $matches?>" placeholder="function" name="function"><br>
                        <input type="text" value="<?php echo $wins?>" placeholder="gmail" name="gmail"><br>
                        <input type="text" value="<?php echo $loses?>" placeholder="country" name="country"><br>
                        <input type="text" value="<?php echo $ties?>" placeholder="state" name="state"><br>
                        
                        <?php
                        if($update==true):
                        ?>
                        <button type="submit" name="update-users">Update</button>
                        <?php else: ?>
                        <button type="submit" name="confirm-users">Confirm</button>
                        <?php endif;?>
                    </div>
                </div>

                <div class="column">
                    <?php

                        $mysqli = new mysqli('localhost','root','','user_database') or die("unable to connect");
                        $result = $mysqli->query("SELECT * FROM comments") or die($mysqli->error);
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
                                    <th>username</th>
                                    <th>comment</th>
                                    <th>season</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                        <?php
                            while($row= $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                            <td><?php echo $row['season']; ?></td>
                            <td>
                                <a href="dashboard.php?edit= <?php echo $row['position'];?>"
                                    class="btn btn-danger">Edit</a>
                                <a href="dashboardService.php?delete=<?php echo $row['position'];?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                        </table>

                        <input type="hidden" name="position-comments" value="<?php echo $position; ?>">
                        <input type="text" value="<?php echo $nameSeason?>" placeholder="username-comments" name="username-comments"><br>
                        <input type="text" value="<?php echo $teamName?>" placeholder="comment" name="comment"><br>
                        <input type="text" value="<?php echo $matches?>" placeholder="season-comment" name="season-comment"><br>
                        <?php
                        if($update==true):
                        ?>
                        <button type="submit" name="update-users">Update</button>
                        <?php else: ?>
                        <button type="submit" name="confirm-users">Confirm</button>
                        <?php endif;?>
                    </div>
                </div>
            </div>

            <button type="submit" name="goBack">Go Back</button>
        </form>


        
        
        

        <?php

        ?>


    </body>

</html>
