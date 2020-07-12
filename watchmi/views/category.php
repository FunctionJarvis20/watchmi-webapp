<head>
    <link rel="stylesheet" href="../assets/css/category.css">
</head>
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
            $category = $_GET['category'];
            $query = "SELECT * FROM `moviecategories` where category = '$category' LIMIT 200;";
            $result  = mysqli_query($connection,$query);
        ?>
        <!--side navbar-->
        <?php include_once("../sidebar.php"); ?>
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
                            <a href="movie.php?code=<?= $rr['imdb_code'];?>">
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
            </section>
        </div>
        <!-- footer goes here -->
        <?php include_once("../footer.php"); ?>