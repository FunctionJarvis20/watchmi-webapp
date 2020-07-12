<?php include_once("database/connection.php"); ?>
    <!-- checking if cookie is set or session is started for user -->
    <?php 
        $login_already=0;
        // if all cookies and sessions are set then display user there name instead of sign in and register btn
        if(isset($_COOKIE['uid']) &&  isset($_COOKIE['token']) && isset($_COOKIE['serial'])){
        
            $check_in_user_cookie_query = "SELECT * FROM `usersessions` where  uid = ".$_COOKIE['uid'].";";

            $result = mysqli_query($connection,$check_in_user_cookie_query);
            $row = mysqli_fetch_assoc($result);
            $token = $row['stoken'];
            $serial = $row['sserial'];
            if($serial == $_COOKIE['serial'] && $token == $_COOKIE['token']){
                $login_already =1;
            }else{
                echo "<script>
                console.log('something went wrong');
            </script>";
            }
           
        }else{
            $login_already = 0;
        }

    ?>
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
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    </head>
    <!-- to check wether user is connected to internet or not -->
    <?php 
        $connected = @fsockopen("www.google.com", 80);
        if(!$connected){
            include_once("error-page.php");
            die();
        }
        else{
    ?>
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
                    <a href="../index.php"> Watch<span class="mi">Mi</span></a>
                </div>
                <div class="box buttons">
                <p id="greeting-username"></p>
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
        <?php } ?>
        <div id="loading-screen">
            <img src="../assets/icons/loading-spin.gif" alt="" srcset="">
        </div>
        <?php 

            if($login_already == 1){
                $get_user_query = "SELECT username FROM `registereduser` WHERE id ='".$_COOKIE['uid']."';";
                $result = mysqli_query($connection,$get_user_query);

                $row = mysqli_fetch_assoc($result);

                echo "<script>
                    document.getElementById('register-but').style.display='none';
                    document.getElementById('signin-but').style.display='none';

                    document.getElementById('greeting-username').innerHTML ='Welcome, ".$row['username']."'
                </script>
                <style>
                    #greeting-username{
                        margin: 0;
                        padding: 30px;
                        padding-top: 0;
                        padding-bottom: 0;
                        background: #44318d;
                        height: 40px;
                        text-align: center;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        color: white;
                        font-size: 20px;
                    }
                </style>";

            }else{
                echo "<style>
                    #greeting-username{
                        display: none;
                    }
                </style>";
            }
        ?>
