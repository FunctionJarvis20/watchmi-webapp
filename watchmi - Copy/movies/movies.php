<?php include_once("../database/connection.php");

$query1 = "SELECT * FROM `moviecategories` where category = 'Thriller' LIMIT 8;";
$result1  = mysqli_query($connection,$query1);

$query2 = "SELECT * FROM `moviecategories` where category = 'Adventure' LIMIT 8;";
$result2  = mysqli_query($connection,$query2);

$query3 = "SELECT * FROM `moviecategories` where category = 'Family' LIMIT 8;";
$result3  = mysqli_query($connection,$query3);

$query4 = "SELECT * FROM `movieratings` where imdb_ratings > 7 LIMIT 3;";
$result4  = mysqli_query($connection,$query4);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d696af1192.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text|Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="../default.css">
    <link rel="stylesheet" href="movies.css">
</head>
<body>
    <header>  
        <div class="container-header">
            <div class="box" id="menu">
                <img id="menu-icon" src="../images/icons/menu4.png" alt="menu">
            </div>
            <div class="box" id="banner">
               <a href="../index.html"> Watch<span class="mi">Mi</span></a>
            </div>
            <div class="box buttons">
                <button  id="register-but">
                    <a class='white-link' href="../register/register.html">Register</a>
                </button>
            </div>
            <div class="box buttons">
                <button  id="signin-but">
                        <a class='white-link' href="../signin/sign-in.html">Sign in</a>
                    </button>
                </div>
                
            </div>
        </header>
        <!--side navbar-->
        <div  id="sidenav">
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
                    <div id="search-container" >
                    <input type="text" id="search-input" class="input" placeholder="search here..">
                    <i class="fas fa-search" id="search-icon"></i>
                    </div>
                </form> 
            </div>
            <div id="catagories">
                <ul id="list">
                    <li><a href="../index.html" id='active'>Home</a></li>
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
        
        <section id="movies-two">
        <div class="catagory-container">

            <div class="catagory">Thriller <span class="view-more"><a href="../catagory/catagory.php?category=Thriller">view more</a></span></div>
            <div class="slider-container">
            <ul class="movie-list">
                <?php 
                    while($row = mysqli_fetch_assoc($result1)){
                        


                        $q = "select * from moviebackgrounds where imdb_code = '".$row['imdb_code']."';";

                        $r = mysqli_query($connection,$q);

                        while($rr = mysqli_fetch_assoc($r)){

                        
                
                ?>




                <li>
                    <a href="../movie/movie.php?code=<?= $rr['imdb_code'];?>">
                        <div class="flex-container">
                            <img src="<?= $rr['medium_cover_image']; ?>" alt="">
                            <div class="movie-name"><?= $rr['title_long']; ?></div>
                        </div>
                    </a>
                </li>
               

                <?php  
                        }

                    
                    }
                
                ?>


            </ul>
            </div>
        </div>
        <div class="catagory-container">
            <div class="catagory">Adventure<span class="view-more"><a href="../catagory/catagory.php?category=Adventure">view more</a></span></div>
            <div class="slider-container">
            <ul class="movie-list">
            <?php 
                    while($row = mysqli_fetch_assoc($result2)){
                        


                        $q = "select * from moviebackgrounds where imdb_code = '".$row['imdb_code']."';";

                        $r = mysqli_query($connection,$q);

                        while($rr = mysqli_fetch_assoc($r)){

                        
                
                ?>




                <li>
                    <a href="../movie/movie.php?code=<?= $rr['imdb_code'];?>">
                        <div class="flex-container">
                            <img src="<?= $rr['medium_cover_image']; ?>" alt="">
                            <div class="movie-name"><?= $rr['title_long']; ?></div>
                        </div>
                    </a>
                </li>
               

                <?php  
                        }

                    
                    }
                
                ?>
            </ul>
            </div>
        </div>
        <div class="catagory-container">
            <div class="catagory">Family<span class="view-more"><a href="../catagory/catagory.php?category=Family">view more</a></span></div>
            <div class="slider-container">
            <ul class="movie-list"> 
            <?php 
                    while($row = mysqli_fetch_assoc($result3)){
                        


                        $q = "select * from moviebackgrounds where imdb_code = '".$row['imdb_code']."';";

                        $r = mysqli_query($connection,$q);

                        while($rr = mysqli_fetch_assoc($r)){

                        
                
                ?>




                <li>
                    <a href="../movie/movie.php?code=<?= $rr['imdb_code'];?>">
                        <div class="flex-container">
                            <img src="<?= $rr['medium_cover_image']; ?>" alt="">
                            <div class="movie-name"><?= $rr['title_long']; ?></div>
                        </div>
                    </a>
                </li>
               

                <?php  
                        }

                    
                    }
                
                ?>
            </ul>
            </div>
        </div>
        </section>
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
        <script src="../main.js"></script>


</body>
</html>