<!DOCTYPE html>


<html>


    <head>
        <meta charset="UTF-8">
        <title>SEASON</title>
        <link rel="stylesheet" href="onlyPageStyle.css">
    </head>

    <link rel="stylesheet" href="onlyPageStyle.css">

    <body>
        <?php
            require_once 'onlyPageService.php';
            session_start();
        ?>
        <p> WELCOME to <?php echo $_SESSION['nameSeason'] ?> </p>
        <form action="onlyPageService.php" method="POST">
            <div class="row">
                <div class="column">
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
                            </tr>
                        </thead>
                    <?php
                        $connect = new mysqli('localhost','root','','user_database') or die ("unable to connect");
                        $seasonName = $_SESSION['nameSeason'];
                        echo $seasonName;
                        $result = mysqli_query($connect,"SELECT * from teams WHERE nameSeason='$seasonName'");
                        while($row = $result->fetch_assoc()) :
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
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
                
                <?php

                    $mysqli=new mysqli('localhost','root','','user_database') or die ("unable to connect");
                    $season = $_SESSION['nameSeason'];
                    $result = $mysqli->query("SELECT username,comment FROM comments WHERE season='$season'");

                ?>

                <div class="column">
                    
                    <table class="table-comments">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <?php 

                        while($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo $row['username'].":"; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                        </tr>
                    <?php endwhile;?>
                    </table>        

                    

                    <input type="text" name="addComment" placeholder="add comment">
                    <button type="submit" name="comment">Comment</button>
                    <button type="submit" name="goBack">go back</button>
                </div>
            </div>
        </form>

    </body>

</html>