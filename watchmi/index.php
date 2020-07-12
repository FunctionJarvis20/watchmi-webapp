<?php include_once("header.php");?>
        <!-- side navbar goes here-->
        <?php 
            //  if the session id is already set then start the session and check the username
            //  variable is set or not if set then redirect the user to the movies page directly
            if(isset($_SESSION['username']) || isset($_COOKIE['uid'])){
                    header("Location: ../views/movies.php");
                    exit();
            }
        ?>
        <?php include_once("sidebar.php");?>
        <section id="one">
            <div id="hero-image">
                <div class="container">
                    <div id="hero-image-text">
                        <div id="main" class="display-4">
                            Watch Movies for Free
                        </div>
                        <div id="sub" class="display-5">
                            Watch for free, Sign up for download!.
                        </div>
                    </div>
                    <div class="button" id="watch-now">
                        <a class="white-link" href="views/movies.php">Watch Now</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="two">
            <div class="container">
                <div class="two-content">
                    <div id="main">
                        Get an Account Today!
                    </div>
                    <div id="p1">
                        WatchMi is a free movie streaming website that lets you
                        watch movies for free..
                    </div>
                </div>
                <div class="button" id="register">
                    <a class="white-link" href="views/register.php">Register Free</a>
                </div>
                <div id="p2">
                    Register with us to download movies.
                </div>
            </div>
        </section>

<?php include_once("footer.php") ?>

