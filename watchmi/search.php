<head>
    <link rel="stylesheet" href="assets/css/category.css">
</head>
    <?php include_once("header.php"); include_once("database/connection.php"); ?>
        <?php
            // checking if session variable is set or not
            if(isset($_COOKIE['uid'])){
                session_start();
                if(isset($_SESSION['username'])){
                } 
            }
        ?>
        <!--side navbar-->
        <?php include_once("sidebar.php"); ?>
        <?php 
            // checking if search-input is set or not
            if(isset($_GET['search-input']))
            {
                if($_GET['search-input'] == ""){
                    header("Location: /search.php?m=please enter something");
                }else{
                    $search_input = mysqli_real_escape_string($connection,$_GET['search-input'])
        ?>
                    <div class="_container">
                        <div class="catagory-heading">
                        <h1>Search Result For "<?= $search_input ?>"</h1> 
                        </div>
                        <section class="two">
                            <ul class="movie-list">
                                <?php 
                                    $search_query = "select * from moviebackgrounds where title_long LIKE '%".$search_input."%' LIMIT 50;";
                                    $r = mysqli_query($connection,$search_query);
                                        while($rr = mysqli_fetch_assoc($r)){
                                ?>
                                    <li>
                                        <a href="../views/movie.php?code=<?= $rr['imdb_code'];?>">
                                            <div class="flex-container">
                                                <img src="<?= $rr['medium_cover_image']; ?>" alt="">
                                                <div class="movie-name"><?= $rr['title_long']; ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php  
                                        }
                                ?>        
                            </ul>
                        </section>
                    </div>
        <?php
                }
            }else{
                header("location: /index.php");
            }
        ?>
    <!-- footer goes here -->
    <?php include_once("footer.php"); ?>