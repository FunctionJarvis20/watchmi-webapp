<?php 
    // this page will only show when imdb code is set in url
    if(isset($_GET['code'])){
?>
<head>
    <link rel="stylesheet" href="../assets/css/movie.css">
</head>
    <!-- header goes here -->
<?php include_once("../header.php"); ?>
            <?php
                // checking if session variable is set or not
                if(isset($_COOKIE['uid'])){
                    session_start();
                    if(isset($_SESSION['username'])){
                    } 
                }
            ?>
            <?php 
                include_once("../database/connection.php"); 
                $code = $_GET['code'];
                $query1 = "SELECT * FROM `moviecategories` where imdb_code = '$code';";
                $result1  = mysqli_query($connection,$query1);
                $query2 = "SELECT large_cover_image FROM `moviebackgrounds` where imdb_code = '$code' LIMIT 1;";
                $result2  = mysqli_query($connection,$query2);
                $img = mysqli_fetch_assoc($result2);

                $query3 = "SELECT * FROM `imdbinfo` where imdb_code = '$code' LIMIT 1;";
                $result3  = mysqli_query($connection,$query3);
                $info = mysqli_fetch_assoc($result3);
            ?>
            <!-- sidebar goes here -->
            <?php include_once("../sidebar.php"); ?>
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
            
            $videospider_ticket = file_get_contents('https://videospider.in/getticket.php?key=Cuyj8l6rIVq2dmTH&secret_key=2yha7sxjabkxi4we61w1qdecn8wmgq&video_id='.$code.'&ip='.getUserIpAddr());
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
                            <h3 id="movie-info">Movie Info: </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="movie-info-wrapper">
                                <div class="movie-image-container">
                                    <img src="<?=$img['large_cover_image'] ?>" height=500px alt="">
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
                                    <div class="movie-description">
                                        <p>
                                            <h5><?=$info['description_full']?></h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="movie-info">Youtube Trailer: </h3>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 100px">
                        <div class="col-md-12">
                            <?php
                                $movie_trailer_query = "SELECT * FROM `movietrailers` WHERE imdb_code ='".$info['imdb_code']."';";
                                $result_trailer = mysqli_query($connection,$movie_trailer_query);
                                $trailer = mysqli_fetch_assoc($result_trailer);
                                $trailer_code = explode("=",$trailer['trailer_link']);  
                            ?>
                            <iframe width="560" height="500" src="https://www.youtube.com/embed/<?=$trailer_code[1]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="movie-info">Download Links : Coming soon...</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer goes here -->
            <?php include_once("../footer.php"); ?>
<?php 
    }
    else{
        header("location:movies.php");
    }


?>