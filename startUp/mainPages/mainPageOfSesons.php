<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>MainPageOfSeasons</title>
    </head>

    <body>
        <link rel="stylesheet" type="text/css" href="mainPageOfSesonstyle.css">
        <?php 
            session_start();
           
        
        ?>
        

        <form action="mainPageofSesonsService.php" method="POST">

            <style>
                #button-profile{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-decoration: none;
                    padding: 10px 20px;
                    height: 100%;
                    width: 100%;
                    border: none;
                    outline: none;
                    border-radius: 4px;
                    background: #f77062;
                    color: #fff;
                }
                #button-logout{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-decoration: none;
                    padding: 10px 20px;
                    height: 100%;
                    width: 400%;
                    border: none;
                    outline: none;
                    border-radius: 4px;
                    background: #f77062;
                    color: #fff;
                }

                .navbar__btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 0 1rem;
                    width: 1000%;
                }

            </style>
            
            <nav class="navbar">
                <div class="navbar__container">
                    <a href="mainPageOfSesons.php" id="navbar__logo"><i class="fas fa-futbol"></i>FOTBALGG</a>
                    <div class="navbar__toogle" id="mobile-menu">
                        <span class="bar"></span><span lcass="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <ul class="navbar__menu">
                        
                        <li class="navbar__btn">
                            <?php
                                include '../staticVariables/staticVariables.php';
                                session_start();
                                $connect=new mysqli('localhost', 'root','', 'user_database') or die("unable to connect");
                                $username = $_SESSION['username'];

                                $rez= mysqli_query($connect, "SELECT functie FROM users WHERE username='$username'");
                                $row = mysqli_fetch_row($rez);
                                $userStatus=$row[0];
                                $userLogged=$_SESSION['loggedUser'];

                                if($userLogged!=false){
                                    echo '<div class="dropdown>';
                                        echo 'button class="dropbtn">test</button>';
                                        echo '<div class="dropdown-content">';
                                            echo '<button id="button" type="submit" name="profile">profile</button>';
                                            echo '<button id="button" type="submit" name="settings">Settings</button>';
                                            echo '<button id="button" type="submit" name="logout">Log out</button>';
                                        echo '</div>';
                                    echo '</div>';
                                    

                                    if($userStatus != "user"){
                                        echo '<button id="button" type="submit" name="dashboard" >Dashboard</button>';
                                    }
                                }else{
                                    echo '<button id="button" type="submit" name="signUp">Sing in</button>';
                                }
                            ?>
                        </li>
                    </ul>

                </div>
            </nav>

            
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
                            <a href="mainPageOfSeasons.php" id="footer__logo"><i class="fas fa-futbol"></i>FOTBALGG</a>
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