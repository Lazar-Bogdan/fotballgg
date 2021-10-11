<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>dashboard</title>
        <link rel="stylesheet" href="dashboard.css">
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
            <p> Welcome ! </p>
            <button class="button_style" type="submit" name="goBack">Go Back</button>
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
                    <button class="button_style" type="submit" name="update">Update</button>
                    <?php else: ?>
                    <button class="button_style" type="submit" name="confirm">Confirm</button>
                    <?php endif;?>


                </div>
                <!---- started users_Table --> 
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
                                <a href="dashboard.php?edit-users= <?php echo $row['id'];?>"
                                    class="btn btn-danger">Edit</a>
                                <a href="dashboardService.php?delete-users=<?php echo $row['id'];?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                        </table>
                        <input type="hidden" name="id_users" value="<?php echo $id_users; ?>">
                        <input type="text" value="<?php echo $username?>" placeholder="username-users" name="username-users"><br>
                        <input type="text" value="<?php echo $nume?>" placeholder="name" name="name"><br>
                        <input type="text" value="<?php echo $functie?>" placeholder="function" name="function"><br>
                        <input type="text" value="<?php echo $gmail?>" placeholder="gmail" name="gmail"><br>
                        <input type="text" value="<?php echo $country?>" placeholder="country" name="country"><br>
                        <input type="text" value="<?php echo $state?>" placeholder="state" name="state"><br>
                        
                        <?php
                        if($update_users==true):
                        ?>
                        <button class="button_style" type="submit" name="update-users">Update</button>
                        <?php endif;?>
                    </div>
                </div>
                <!---- started users_comments --> 
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
                                <a href="dashboard.php?edit-comment= <?php echo $row['id'];?>"
                                    class="btn btn-danger">Edit</a>
                                <a href="dashboardService.php?delete-comment=<?php echo $row['id'];?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                        </table>

                        <input type="hidden" name="id-comment" value="<?php echo $id_comment; ?>">
                        <input type="text" value="<?php echo $username_comment?>" placeholder="username-comment" name="username-comments"><br>
                        <input type="text" value="<?php echo $comment?>" placeholder="comment" name="comment"><br>
                        <input type="text" value="<?php echo $season_comment?>" placeholder="season-comment" name="season-comment"><br>
                        <?php
                        if($update_comment==true):
                        ?>
                        <button class="button_style" type="submit" name="update-comments">Update</button>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </form>


        
        
        

        <?php

        ?>


    </body>

</html>
