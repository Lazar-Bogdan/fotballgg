<!DOCTYPE html>

<html>


    <head>
        <meta charset="UTF-8">
        <title>You re profile</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    </head>


    <body>


        <?php
            session_start();
        ?>

        <style> 
            header {
                background: #131313;
                height: 66px;
            }

            header * {
                color: white;
            }

            header .logo {
                float: left;
                height: inherit;
                margin-left: 2em;
            }

            header .logo-text {
                margin: 9px;
                font-family: 'Candal', serif;
            }

            header .logo-text span {
                color: #05f7ff;
            }

            header ul {
                float: right;
                margin: 0px;
                padding: 0px;
                list-style: none;
            }

            header ul li {
                float: left;
                position: relative;
            }

            header ul li ul {
                position: absolute;
                top: 66px;
                right: 0px;
                width: 180px;
                display: none;
                z-index: 88888;
            }

            header ul li:hover ul {
                display: block;
            }

            header ul li ul li {
                width: 100%;
            }

            header ul li ul li a {
                padding: 10px;
                background: white;
                color: #444;
            }

            header ul li ul li a.logout {
                color: red;
            }

            header ul li ul li a:hover {
                background: #d5d6d6;
            }

            header ul li a {
                display: block;
                padding: 21px;
                font-size: 1.1em;
                text-decoration: none;
            }

            header ul li a:hover {
                background: #006669;
                transition: 0.5s;
            }

            header .menu-toggle {
                display: none;
            }

            .page-wrapper {
                min-height: 100%;
            }

            .page-wrapper a:hover {
                color: #006669;
            }

        </style>

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
                                                echo '<li><a href="dashboard/dashboard.php">Dashboard</a></li>';
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
            <style> 
                .column {
                    float: left;
                    width: 33.3%;
                    margin-bottom: 16px;
                    padding: 0 8px;
                }

                .card {
                    text-align: center;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    margin: 8px;
                }

                .about-section {
                    padding: 50px;
                    text-align: center;
                    background-color: #474e5d;
                    color: white;
                }

                .container {
                    padding: 0 16px;
                }

                .container::after, .row::after {
                    content: "";
                    clear: both;
                    display: table;
                }

                .title {
                    color: grey;
                }
                
            </style>
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
                            <p><?php echo "Name : ".$row['nume'];?></p>
                            <p><?php echo "Country : ".$row['country'];?></p>
                            <p><?php echo "State : ".$row['state'];?></p>
                            <p><?php echo "Gmail : ".$row['gmail'];?></p>
                        </div>
                    </div>
                </div>
            </div>

            <style> 
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

            <div class="footer__container">
                <div class="footer__links">
                    <div class="footer__link--wrapper">
                        <div class="footer__link--items">
                        <h2>About Us</h2>
                        <a href="/">How it works</a>
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
                            <a href="../mainPageOfSesons.php" id="footer__logo"><i class="fas fa-futbol"></i>FOTBALGG</a>
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