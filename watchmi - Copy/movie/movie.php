<?php include_once("../database/connection.php"); 
$connected = @fsockopen("www.google.com", 80);
if(!$connected){
    echo "you are not connected to internet";
}
else{
$code = $_GET['code'];
$query1 = "SELECT * FROM `moviecategories` where imdb_code = '$code';";
$result1  = mysqli_query($connection,$query1);
$query2 = "SELECT medium_cover_image FROM `moviebackgrounds` where imdb_code = '$code' LIMIT 1;";
$result2  = mysqli_query($connection,$query2);
$img = mysqli_fetch_assoc($result2);

$query3 = "SELECT * FROM `imdbinfo` where imdb_code = '$code' LIMIT 1;";
$result3  = mysqli_query($connection,$query3);
$info = mysqli_fetch_assoc($result3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-files/bootstrap.min.css">
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
        href="movie.css"
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


            <?php 
            function getUserIpAddr(){
                if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                    //ip from share internet
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    //ip pass from proxy
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                return $ip;
            }
            
            $videospider_ticket = file_get_contents('https://videospider.in/getticket.php?key=Cuyj8l6rIVq2dmTH&secret_key=2yha7sxjabkxi4we61w1qdecn8wmgq&video_id='.$code.'&ip=42.106.194.99');
            ?>
            <div class="main-movie-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe src="https://videospider.stream/getvideo?key=Cuyj8l6rIVq2dmTH&video_id=<?=$code;?>&ticket=<?php echo $videospider_ticket; ?>" width="600" height="400" frameborder="0" allowfullscreen="true" scrolling="yes"></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="movie-info-wrapper">
                                <div class="movie-image-container">
                                    <img src="<?=$img['medium_cover_image'] ?>" alt="">
                                </div>
                                <div class="movie-info-container">
                                    <div class="movie-name">
                                        <h1><?=$info['title_long']?></h1>
                                    </div>
                                    <div class="movie-date">
                                        <h3><?=$info['date_uploaded']?></h3>
                                    </div>
                                    <div class="movie-time">
                                        <span><?=$info['movie_runtime']?></span>
                                    </div>
                                    <div class="movie-genre">
                                    <?php 
                                        echo "<span>";
                                        while($row = mysqli_fetch_assoc($result1))
                                        {
                                    
                                            echo $row['category'].",";
                                        }
                                        echo "</span>";
                                    ?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
       
    <script src="../main.js"></script>
</body>
</html>


<?php }?>