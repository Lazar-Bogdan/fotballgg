<!DOCTYPE html>


<html>


    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>


    <body>
        <?php
            require_once 'onlyPageService.php';
            session_start();
        ?>



        <p> WELCOME to <?php echo $_SESSION['nameSeason'] ?> </p>
        <form action="onlyPageService.php" method="POST">
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
            <button type="submit" name="goBack">go back</button>
        </form>

    </body>

</html>