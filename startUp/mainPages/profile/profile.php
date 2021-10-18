<!DOCTYPE html>

<html>


    <head>
        <meta charset="UTF-8">
        <title>You re profile</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <link href="profile.css" rel="stylesheet">
    </head>


    <body>


        <?php
            session_start();
        ?>

        <form action="" method="POST">
            <header>
                    <div class="logo">
                        <h1 class="logo-text"><span>Fotball</span>GG</h1>
                    </div>
                    <i class="fa fa-bars menu-toggle"></i>
                    <ul class="nav">
                        <li><a href="../mainPageOfSesons.php">Home</a></li>
                        <li><a href="../mainPageOfSesons.php">Go Back</a></li>
                        <li>
                            <?php
                                session_start();
                                $connect=new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");
                                $username = $_SESSION['username'];

                                $rez= mysqli_query($connect, "SELECT functie FROM users WHERE username='$username'");
                                $row = mysqli_fetch_row($rez);
                                $userStatus=$row[0];
                                $userLogged=$_SESSION['loggedUser'];
                                if($userLogged!=false){
                                    echo '<a href="#">
                                            <i class="fa fa-user"></i>
                                            '.$_SESSION['username'].'
                                            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                                            </a>
                                        <ul>';
                                            if($userStatus=="administrator"){
                                                echo '<li><a href="../DASHBOARD/dashboard.php">Dashboard</a></li>';
                                            }
                                            echo '
                                            <li><a href="../profile/profile.php">Profile</a></li>
                                            <li><a href="../profile/settings.php">Settings</a></li>
                                            <li><a href="../deadEnd.php" class="logout">Logout</a></li>
                                        </ul>';
                                }else{
                                    echo '<a href="../../login/login.php">Sign in</a>';
                                }

                            ?>
                        </li>
                    </ul>
            </header>

            <div class="row">
                <?php
                    session_start();
                    $connect = new mysqli('localhost','root','','user_database') or die ("unable to connect");
                    $username = $_SESSION['username'];
                    $result = mysqli_query($connect,"SELECT * from users WHERE username='$username'");
                    $row=$result->fetch_assoc();
                ?>
                <div class="column">

                </div>
                <div class="column">
                    <div class="card">
                    <img src="profilepic.jpg" alt="Jane" style="width:50%">
                        <div class="container">
                            <h2><?php echo $row['username']?></h2>
                            <p class="title"><?php echo $row['functie'];?></p>
                            <div class="credentials">
                                <p><?php echo "Name : ".$row['nume'];?></p>
                                <p><?php echo "Country : ".$row['country'];?></p>
                                <p><?php echo "State : ".$row['state'];?></p>
                                <p><?php echo "Gmail : ".$row['gmail'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <div class="footer__container">
                    <div class="footer__links">
                        <div class="footer__link--wrapper">
                            <div class="footer__link--items">
                            <h2>About Us</h2>
                                <div class="popup" onclick="HowWork()">
                                    <a>How it works</a><span class="popuptext" id="HowWorks">Here you can find information about you're favorite team ! 
                                        If you are a guest, feel free to go through pages. If you are a users, don't forget to leave a commentary. Finally if
                                        you are a administrator, you are the boss!
                                    </span>
                                </div>
                                <div class="popup" onclick="TermsFunction()">  
                                <a>Terms of Service</a><span class="popuptext" id="Terms">We all know that if you are already a user 
                                    you should know about this. But, for everyone, do not spam on the commentary section, do not insult other users. If 
                                    things like this happens, you're account will be deleted
                                </span>
                                </div>
                                <div class="popup" onclick="ContactFunction()">  
                                <a>Contact us</a><span class="popuptext" id="Contact">For any support please contact : admin@gmail.com
                                </span>
                                </div>
                            </div>
                                
                            </div>
                    

                            <div class="footer__link--items">
                                <h2>Social Media</h2>
                                <a href="https://www.instagram.com/lazarr.bogdan/">Instagram</a> <a href="https://www.facebook.com/bogdi.lazar.5/ ">Facebook</a>
                            </div>
                            
                        
                        </div>
                    <section class="social__media">
                        <div class="social__media--wrap">
                            <div class="footer__logo">
                                <a href="../mainPageOfSesons.php" id="footer__logo"><i class="fas fa-futbol"></i>FOTBALLGG</a>
                            </div>
                            <p class="website__rights">© FOTBALGG 2021. All rights reserved</p>
                            <div class="social__icons">
                                <a
                                    class="social__icon--link"
                                    href="https://www.facebook.com/bogdi.lazar.5/ "
                                    target="_blank"
                                    aria-label="Facebook"
                                >
                                <i class="fab fa-facebook"></i>
                                </a>
                                <a
                                    class="social__icon--link"
                                    href="https://www.instagram.com/lazarr.bogdan/"
                                    target="_blank"
                                    aria-label="Instagram"
                                >
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a
                                    class="social__icon--link"
                                    href="https://www.linkedin.com/in/lazar-bogdan-b54952205/"
                                    target="_blank"
                                    aria-label="LinkedIn"
                                >
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </section>

            </div>
        </form>

        <script>
            function HowWork(){
                var popup=document.getElementById("HowWorks");
                popup.classList.toggle("show");
            }

            function TermsFunction(){
                var popup=document.getElementById("Terms");
                popup.classList.toggle("show");
            }
            function SupportFunction(){
                var popup=document.getElementById("Support");
                popup.classList.toggle("show");
            }
            function ContactFunction(){
                var popup=document.getElementById("Contact");
                popup.classList.toggle("show");
            }
        </script>
            
    </body>

</html>