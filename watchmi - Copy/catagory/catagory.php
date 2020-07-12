<?php include_once("../database/connection.php"); 
$category = $_GET['category'];
$query = "SELECT * FROM `moviecategories` where category = '$category' LIMIT 200;";
$result  = mysqli_query($connection,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
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
            href="../default.css"
        />
        <link
        rel="stylesheet"
        type="text/css"
        media="screen"
        href="catagory.css"
    />
</head>
<body>
        <header>
                <div class="container-header">
                    <div class="box" id="menu">
                        <img
                            id="menu-icon"
                            src="../images/icons/menu4.png"
                            alt="menu"
                        />
                    </div>
                    <div class="box" id="banner">
                        <a href="../index.html"> Watch<span class="mi">Mi</span></a>
                    </div>
                    <div class="box buttons">
                        <button id="register-but">
                            <a class="white-link" href="../register/register.html"
                                >Register</a
                            >
                        </button>
                    </div>
                    <div class="box buttons">
                        <button id="signin-but">
                            <a class="white-link" href="../signin/sign-in.html"
                                >Sign in</a
                            >
                        </button>
                    </div>
                </div>
            </header>
            <!--side navbar-->
            <div id="sidenav">
                <div class="side-nav-header">
                    <div id="side-nav-branding" class="branding">
                        Watch<span class="mi">Mi</span>
                    </div>
                    <div id="close-btn">close</div>
                    <!--
                    <img src="images/icons/close.png" id="close-btn">
                    -->
                </div>
                <div id="search-box">
                    <form action="">
                        <div id="search-container">
                            <input
                                type="text"
                                id="search-input"
                                class="input"
                                placeholder="search here.."
                            />
                            <i class="fas fa-search" id="search-icon"></i>
                        </div>
                    </form>
                </div>
                <div id="catagories">
                    <ul id="list">
                        <li><a href="../index.html" id="active">Home</a></li>
                        <li><a href="#">Featured</a></li>
                        <li><a href="#">Horror</a></li>
                        <li><a href="#">Romantic</a></li>
                        <li><a href="#">Action</a></li>
                    </ul>
                </div>
                <div class="side-nav-footer">
                    copyrights &copy; 2019
                    <div class="side-nav-footer-sub">
                        Made with <i class="fas fa-heart"></i> in India
                    </div>
                </div>
            </div>
        <div class="_container">
            <div class="catagory-heading">
               <h1><?=$_GET['category']?></h1> 
            </div>
            <div class="catagory-info">
                
            </div>
            <section class="two">
                    <ul class="movie-list">
                    <?php 
                    while($row = mysqli_fetch_assoc($result)){
                        


                        $q = "select * from moviebackgrounds where imdb_code = '".$row['imdb_code']."';";

                        $r = mysqli_query($connection,$q);

                        while($rr = mysqli_fetch_assoc($r)){

                        
                
                ?>




                <li>
                    <div class="flex-container">
                        <img src="<?= $rr['medium_cover_image']; ?>" alt="">
                        <div class="movie-name"><?= $rr['title_long']; ?></div>
                    </div>
                </li>
               

                <?php  
                        }

                    
                    }
                
                ?>
                            
                        </ul>
            </section>
        </div>
        
       
    <script src="../main.js"></script>
</body>
</html>