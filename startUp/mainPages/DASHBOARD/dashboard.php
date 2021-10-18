<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DashBoard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="dashboard.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
    <div class="tablink-self">DASHBOARD</div>

    <button class="tablink" onclick="openPage('Teams', this, 'red')"id="defaultOpen">Teams</button>
    <button class="tablink" onclick="openPage('Users', this, 'green')" >Users</button>
    <button class="tablink" onclick="openPage('Comments', this, 'blue')">Comments</button>
    <?php session_start() ?>
    <form method="POST" action="dashboardService.php">
        <div id="Teams" class="tabcontent">
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
                <div class="scrollbar">
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
                                <th>Action</th>
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
            </div>

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
            <button class="button_style" type="submit" name="update">Update</button>
            <?php else: ?>
            <button class="button_style" type="submit" name="confirm">Confirm</button>
            <?php endif;?>


        </div>

        <div id="Users" class="tabcontent" id="defaultOpen">
            
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
                <div class="scrollbar">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>username</th>
                                    <th>name</th>
                                    <th>function</th>
                                    <th>gmail</th>
                                    <th>country</th>
                                    <th>state</th>
                                    <th>Action</th>
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
                </div>
            </div>

            <input type="hidden" name="id_users" value="<?php echo $id_users; ?>">
            <input type="text" value="<?php echo $username?>" placeholder="username-users" name="username-users">
            <input type="text" value="<?php echo $nume?>" placeholder="name" name="name">
            <input type="text" value="<?php echo $functie?>" placeholder="function" name="function">
            <input type="text" value="<?php echo $gmail?>" placeholder="gmail" name="gmail">
            <input type="text" value="<?php echo $country?>" placeholder="country" name="country">
            <input type="text" value="<?php echo $state?>" placeholder="state" name="state">

            <?php
            if($update_users==true):
            ?>
            <button class="button_style" type="submit" name="update-users">Update</button>
            <?php endif;?>

        </div>

        <div id="Comments" class="tabcontent">
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
                <div class="scrollbar">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>username</th>
                                <th>comment</th>
                                <th>season</th>
                                <th>Action</th>
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
                </div>
            </div>
            
            <input type="hidden" name="id-comment" value="<?php echo $id_comment; ?>">
            <input type="text" value="<?php echo $username_comment?>" placeholder="username-comment" name="username-comments">
            <input type="text" value="<?php echo $comment?>" placeholder="comment" name="comment">
            <input type="text" value="<?php echo $season_comment?>" placeholder="season-comment" name="season-comment">
            <?php
            if($update_comment==true):
            ?>
            <button class="button_style" type="submit" name="update-comments">Update</button>
            <?php endif;?>

        </div>

        <button type="submit" name="goBack">Go back</button>

    </form>


    <script>
        function openPage(pageName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
        }
        document.getElementById("defaultOpen").click();
    </script>
   
</body>
</html> 
