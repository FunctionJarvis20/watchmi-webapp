    <!-- header goes here -->
<?php include_once("../header.php"); ?>
    <!-- register.js -->
    <script src="../assets/js/register.js"></script>
    <?php
        // if session and cookies are already set then redirect user to movies page  
         if(isset($_COOKIE['uid']) && isset($_COOKIE['PHPSESSID'])){
            header("Location: movies.php");
             exit();
        }
    ?>
    <!-- sidebar goes here -->
    <?php include_once("../sidebar.php"); ?>
    <head>
        <link rel="stylesheet" href="../assets/css/register.css">
    </head>
    <section class="form" id="frm">
        <div class="form-container">
            <h3 class="form-heading">Register Here !!!</h3>
            <p style="text-align: left;
                            padding: 10px;
                            margin: 0;
                            padding-top: 0;
                            color: red;
                            font-weight: bold;
                            font-size: 20px;" id="error-message"></p>
            <form method="post" action="#">
                <div class="form-group">
                    <input type="text" class="form-control text-in form-control-lg" required placeholder="Username" id="username">
                </div>
                <div class="form-group">
                        <input type="email" class="form-control text-in form-control-lg" required id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                        <input type="password" class="form-control text-in form-control-lg" required id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control text-in form-control-lg" required id="confirm_password" placeholder="Confirm Password">
                </div>
                <div class="form-footer">
                    By clicking, you agree to
                    <a href="#" class="form-footer-links">Terms of Use</a> and <a href="#" class="form-footer-links">Privacy Policy</a>
                </div>
                <div class="form-group">
                    <input type="button" class="form-control" id="register-btn" value="Register">
                </div>
                <span class="text">Have an account ?</span><a href="sign-in.php" class="form-footer-links">Sign In</a>
            </form>
        </div>
    </section>
    <style>
        #register-but{
            display: none;
        }
    </style>
    <!-- footer goes here -->
<?php include_once("../footer.php"); ?>