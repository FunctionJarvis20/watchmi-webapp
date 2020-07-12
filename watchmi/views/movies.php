<head>
    <link rel="stylesheet" href="../assets/css/movies.css">
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
        <?php include_once("../database/connection.php"); ?>
            <!-- side navbar goes here  -->
        <?php include_once("../sidebar.php"); ?>
        <section id="movies-two">
        <?php
            // this query is to get the all category id from allmoviecategories table
            $get_category_id_from_allmoviecategories = "SELECT * FROM `allmoviecategories` LIMIT 8";
            $get_categories_result = mysqli_query($connection,$get_category_id_from_allmoviecategories);
            while($rr = mysqli_fetch_assoc($get_categories_result))
            {
        ?>
            <div class="catagory-container">

                <div class="catagory">
                    <?= $rr['category']?>
                    <span class="view-more">
                        <a href="category.php?category=<?= $rr['category']?>">view more >>
                        </a>
                    </span>
                </div>
                <div class="slider-container">
                    <ul class="movie-list">
                        <?php 
                            // select imdb code from moviecategories table based on allmoviecategories table
                            $get_imdb_from_moviecategories = "SELECT imdb_code FROM `moviecategories` where `category id` =".$rr['id']." LIMIT 8;";
                            $get_imdb_result = mysqli_query($connection,$get_imdb_from_moviecategories);

                            // running through imdb code to get movie backgrounds and title 
                            while($imdb_codes = mysqli_fetch_assoc($get_imdb_result)){


                            // query to get movie backgrounds and titles
                            $get_info_from_moviebackgrounds = "SELECT * FROM `moviebackgrounds` WHERE imdb_code = '".$imdb_codes['imdb_code']."';";
                            $get_info_result = mysqli_query($connection,$get_info_from_moviebackgrounds);
                            $one_movie = mysqli_fetch_assoc($get_info_result);
                        ?>
                            <li>
                                <a href="movie.php?code=<?= $one_movie['imdb_code'];?>">
                                    <div class="flex-container">
                                        <img src="<?= $one_movie['medium_cover_image']; ?>" alt="">
                                        <div class="movie-name"><?= $one_movie['title_long']; ?></div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        </section>
        <!-- footer goes here -->
        <?php include_once("../footer.php"); ?>