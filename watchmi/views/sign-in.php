  <!-- header goes here -->
<?php include_once("../header.php"); ?>
        <!-- login.js -->
        <script src="../assets/js/login.js"></script>
        <?php
            // if session and cookies are already set then redirect user to movies page
            if(isset($_COOKIE['uid'])){
                session_start();
                if(isset($_COOKIE['uid']) && isset($_COOKIE['PHPSESSID']) && isset($_SESSION['username'])){
                    header("Location: movies.php");
                    exit();
                }
            }
        ?>
        <!-- sidebar goes here -->
        <?php include_once("../sidebar.php"); ?>
        <head>
            <link rel="stylesheet" href="../assets/css/sign-in.css">
            <link rel="stylesheet" href="../assets/css/register.css">
        </head>
        <section class="form" id="frm">
            <div class="form-container">
                <div class="user-image">
                    <img src="../assets/resources/images/user3.png" class="user" alt="user">
                </div>
                <p style="text-align: left;
                            padding: 10px;
                            margin: 0;
                            padding-top: 0;
                            color: red;
                            font-weight: bold;
                            font-size: 20px;" id="error-message"></p>
                <form method="post" action="#">
                    <div class="form-group">
                        <input type="text" class="form-control text-in form-control-lg" placeholder="Username" id="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control text-in form-control-lg" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control" id="signin-btn" value="Sign In">
                    </div>
                    <div class="wrapper">
                        Not a member?<a id="create-acc" href="register.php">Create account</a>
        
                    </div>
                </form>
            </div>
        </section>
        <!-- footer goes here -->
<?php include_once("../footer.php"); ?>