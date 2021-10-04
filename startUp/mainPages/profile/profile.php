<!DOCTYPE html>

<html>


    <head>
        <meta charset="UTF-8">
        <title>You re profile</title>
    </head>


    <body>

        <link rel="stylesheet" href="profile.css">
        

        <?php

            require_once 'profileService.php';
            session_start();
            $mysqli = new mysqli('localhost','root','','user_database') or die("unable to connect to the database");
            $username = $_SESSION['username'];
            $result = mysqli_query($mysqli,"SELECT * from users WHERE username='$username'");
            $row = $result->fetch_assoc();

        ?>
        
        <main id="main-holder">
            <form method="post" action="profileService.php" id="profile-form">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></span><span class="text-black-50"></span><span> </span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name: <?php echo $row['nume'];?></label>
                                    <div class="col-md-6"><label class="labels">Username: <?php echo $row['username'];?> </label>
                                    <div class="col-md-6"><label class="labels">Function: <?php echo $row['functie'];?></label>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Email: <?php echo $row['gmail'];?></label>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Country: <?php echo $row['country'];?></label>
                                    <div class="col-md-6"><label class="labels">State/Region: <?php echo $row['state'];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="goBack">Go back</button>
                <button type="submit" name="settings">Settings</button>
            </form>
        </main>
    </body>

</html>