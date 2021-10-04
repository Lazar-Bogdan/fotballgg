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

        <style> 
            @import url('mainPageOfSesonstyle.css');
            .navbar {
                background: #131313;
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.2rem;
                position: sticky;
                top: 0;
                z-index: 999;
            }

            .navbar__container {
                display: flex;
                justify-content: space-between;
                height: 80px;
                z-index: 1;
                width: 100%;
                max-width: 1300px;
                margin-right: auto;
                margin-left: auto;
                padding-right: 50px;
                padding-left: 50px;
            }

            #navbar__logo {
                background-color: #ff8177;
                background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);
                background-size: 100%;
                -webkit-background-clip: text;
                -moz-background-clip: text;
                -webkit-text-fill-color: transparent;
                -moz-text-fill-color: transparent;
                display: flex;
                align-items: center;
                cursor: pointer;
                text-decoration: none;
                font-size: 2rem;
            }

            .fas fa-futbol {
                margin-right: 0.5rem;
            }

            .navbar__menu {
                display: flex;
                align-items: center;
                list-style: none;
                text-align: center;
            }

            .navbar__btn {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 1rem;
                width: 100%;
            }

            #button {
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

            .content__home{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .footer__container {
                background-color: #141414;
                padding: 5rem 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            #footer__logo {
                color: #fff;
                display: flex;
                align-items: center;
                cursor: pointer;
                text-decoration: none;
                font-size: 2rem;
            }

            .footer__links {
                width: 100%;
                max-width: 1000px;
                display: flex;
                justify-content: center;
            }

            .footer__link--wrapper {
                display: flex;
            }

            .footer__link--items {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                margin: 16px;
                text-align: left;
                width: 160px;
                box-sizing: border-box;
            }

            .footer__link--items h2 {
                margin-bottom: 16px;
            }

            .footer__link--items > h2 {
                color: #fff;
            }

            .footer__link--items a {
                color: #fff;
                text-decoration: none;
                margin-bottom: 0.5rem;
            }

            .footer__link--items a:hover {
                color: #e9e9e9;
                transition: 0.3s ease-out;
            }

            /* Social Icons */
            .social__icon--link {
                color: #fff;
                font-size: 24px;
            }

            .social__media {
                max-width: 1000px;
                width: 100%;
            }

            .social__media--wrap {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 90%;
                max-width: 1000px;
                margin: 40px auto 0 auto;
            }

            .social__icons {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 240px;
            }

            .social__logo {
                color: #fff;
                justify-self: start;
                margin-left: 20px;
                cursor: pointer;
                text-decoration: none;
                font-size: 2rem;
                display: flex;
                align-items: center;
                margin-bottom: 16px;
            }

            .website__rights {
                color: #fff;
            }

            @media screen and (max-width: 820px) {
                .footer__links {
                padding-top: 2rem;
                }

                #footer__logo {
                margin-bottom: 2rem;
                }

                .website__rights {
                margin-bottom: 2rem;
                }

                .footer__link--wrapper {
                flex-direction: column;
                }

                .social__media--wrap {
                flex-direction: column;
                }
            }

            @media screen and (max-width: 480px) {
                .footer__link--items {
                margin: 0;
                padding: 10px;
                width: 100%;
                }
            }
        </style>
        
        <form action="mainPageofSesonsService.php" method="POST">
            
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
                                echo '<button id="button" type="submit" name="profile">You re profile</button>';
                                echo '<button id="button" type="submit" name="settings">Settings</button>';
                                echo '<button id="button" type="submit" name="logout">Log out</button>';

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