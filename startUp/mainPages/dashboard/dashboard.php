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
                        <th>position</th>
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
            </tr>
            <?php endwhile;?>
            </table>
        </div>

        <?php

        ?>


    </body>

</html>
