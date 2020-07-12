        <!-- to check wether user is connected to internet or not -->
        <?php 
            $connected = @fsockopen("www.google.com", 80);
            if(!$connected){
                echo "you are not connected to internet";
            }
            else{
        ?>
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
        <?php }?>
        <script src="../assets/js/main.js"></script>
    </body>
</html>