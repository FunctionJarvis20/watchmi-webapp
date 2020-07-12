<?php include_once("database/connection.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Watch your favourite movies on watchMi.gq</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/d696af1192.js"></script>
        <link
            href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text|Nunito&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            type="text/css"
            media="screen"
            href="../assets/css/default.css"
        />
    </head>
    <body>
        <header>
            <div class="container-header">
                <div class="box" id="menu">
                    <img
                        id="menu-icon"
                        src="../assets/icons/menu4.png"
                        alt="menu"
                    />
                </div>
                <div class="box" id="banner">
                    <a href="index.php"> Watch<span class="mi">Mi</span></a>
                </div>
                <div class="box buttons">
                    <button id="register-but">
                        <a class="white-link" href="../views/register.php"
                            >Register</a
                        >
                    </button>
                </div>
                <div class="box buttons">
                    <button id="signin-but">
                        <a class="white-link" href="../views/sign-in.php"
                            >Sign in</a
                        >
                    </button>
                </div>
            </div>
        </header>
        <div class="container">
        <h1>You Are Not Connected To Internet</h1>
        </div>
        <footer>
            <div class="container footer-container">
                <div class="footer-branding">
                    <span id="watch">Watch</span><span class="mi">Mi</span>
                </div>
                <div class="footer-socialmedia-container">
                    <i class="fab fa-facebook-square facebook"></i>

                    <i class="fab fa-instagram insta"></i>

                    <i class="fab fa-twitter-square twitter"></i>
                </div>
                <div class="footer-bottem">
                    <ul>
                        <li><a href="#">Policy </a>|</li>
                        <li><a href="#">DMCA </a>|</li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                    <div class="copyright">
                        copyright &copy; WatchMi ,2019
                    </div>
                    Made with <i class="fas fa-heart"></i> in India
                </div>
            </div>
        </footer>
        <script src="../assets/js/main.js"></script>
    </body>
    <style>
        .container{
            margin-top: 100px;
        }
    </style>
</html>