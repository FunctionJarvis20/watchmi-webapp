
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
            <p  style="
                margin: 0;
                text-align: center;
                font-size: 20px;
                color: red;"
            ><?= isset($_GET['m'])?$_GET['m']:''?>
            </p>
            <div id="search-box">
                <form action="../search.php" method="get">
                    <div id="search-container">
                        <input
                            type="text"
                            id="search-input"
                            class="input"
                            placeholder="search here.."
                            name="search-input"
                        />
                        <i class="fas fa-search" id="search-icon"></i>
                    </div>
                </form>
            </div>
            <div id="catagories">
                <ul id="list">
                    <li><a href="../index.php" class="<?php echo isset($_GET['category'])?'':'active';?>">Home</a></li>
                    <?php 
                        // getting categories from allmoviecategories 
                        $get_categories_from_allmoviecategories = "SELECT * FROM `allmoviecategories`;";
                        $get_categories_result = mysqli_query($connection,$get_categories_from_allmoviecategories);
                        while($row = mysqli_fetch_assoc($get_categories_result)){
                    ?>
                        <li><a href="<?php echo "../views/category.php?category=".$row['category'];?>" class="" id="<?= $row['category']?>"><?=$row['category']?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="side-nav-footer">
                copyrights &copy; 2019
                <div class="side-nav-footer-sub">
                    Made with <i class="fas fa-heart"></i> in India
                </div>
            </div>
        </div>
        <!-- adding active class to the sidebar as per category selected -->
        <?php 
            if(isset($_GET['category'])){
                echo "<script>
                $('#".$_GET['category']."').addClass('active');
                </script>";
            }
        ?>