<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>MainPageOfSeasons</title>
        <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    </head>

    <body>
        <link rel="stylesheet" type="text/css" href="mainPageOfSesonstyle.css">
        <?php 
            session_start();
        ?>
        

        <form action="mainPageofSesonsService.php" method="POST">

            <header>
                <div class="logo">
                    <h1 class="logo-text"><span>Fotball</span>GG</h1>
                </div>
                <i class="fa fa-bars menu-toggle"></i>
                <ul class="nav">
                    <li><a href="/mainPageOfSesons.php">Home</a></li>
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
                                            echo '<li><a href="dashboard/dashboard.php">Dashboard</a></li>';
                                        }
                                        echo '
                                        <li><a href="profile/profile.php">Profile</a></li>
                                        <li><a href="profile/settings.php">Settings</a></li>
                                        <li><a href="deadEnd.php" class="logout">Logout</a></li>
                                    </ul>';
                            }else{
                                echo '<a href="../login/login.php">Sign in</a>';
                            }

                        ?>
                    </li>
                </ul>
            </header>
            
            <div class="content__home">
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
            </div>



            <div class="footer__container">
                <div class="footer__links">
                    <div class="footer__link--wrapper">
                        <div class="footer__link--items">
                        <h2>About Us</h2>
                        <a href="/sign__up">How it works</a>
                        <a href="/">Who are we ?</a>
                        <a href="/">Terms of Service</a>
                        </div>
                        <div class="footer__link--items">
                        <h2>Contact Us</h2>
                        <a href="/">Contact</a> <a href="/">Support</a>
                        </div>
                    </div>
                    <div class="footer__link--wrapper">
                        <div class="footer__link--items">
                        <h2>Social Media</h2>
                        <a href="https://www.instagram.com/lazarr.bogdan/">Instagram</a> <a href="https://www.facebook.com/bogdi.lazar.5/ ">Facebook</a>
                        </div>
                    </div>
                </div>
                <section class="social__media">
                    <div class="social__media--wrap">
                        <div class="footer__logo">
                            <a href="mainPageOfSesons.php" id="footer__logo"><i class="fas fa-futbol"></i>FOTBALGG</a>
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

    </body>

</html>