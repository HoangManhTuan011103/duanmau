<footer>
    <div class="footer-up">
        <div class="title-footer-up">
            <h1>What Our Customers Have To Say</h1>
            <p>Couple Of Words About Stories Section</p>
        </div>
        <section class="account">
            <div class="cutomer-say">
                <div class="acount-customer">
                    <div class="image-acount">
                        <a href=""><img src="content/image/index/account-1.png" alt=""></a>
                    </div>
                    <div class="infor-account">
                        <a href="">
                            <h3>Celia Fields</h3>
                        </a>
                        <a href="">
                            <p>UX Expert</p>
                        </a>
                    </div>
                </div>
                <div class="conntent-say">
                    <p>This I have produced as a scantling of Jack's great eloquence and the force of his reasoning upon such abstruse matterrs.</p>
                </div>
            </div>
            <div class="cutomer-say">
                <div class="acount-customer">
                    <div class="image-acount">
                        <a href=""><img src="content/image/index/account-2.png" alt=""></a>
                    </div>
                    <div class="infor-account">
                        <a href="">
                            <h3>Alexander Lee</h3>
                        </a>
                        <a href="">
                            <p>Founder</p>
                        </a>
                    </div>
                </div>
                <div class="conntent-say">
                    <p>This sounded a very good reason, and Alice was quite pleased to know it. 'I never thought of that before!' she said.</p>
                </div>
            </div>
            <div class="cutomer-say">
                <div class="acount-customer">
                    <div class="image-acount">
                        <a href=""><img src="content/image/index/account-3.png" alt=""></a>
                    </div>
                    <div class="infor-account">
                        <a href="">
                            <h3>Lenova Sandoval</h3>
                        </a>
                        <a href="">
                            <p>Product Manager</p>
                        </a>
                    </div>
                </div>
                <div class="conntent-say">
                    <p>This I have produced as a scantling of Jack's great eloquence and the force of his reasoning upon such abstruse matterrs</p>
                </div>
            </div>
        </section>
    </div>
    <div class="footer-down">
        <div class="footer-navigation">
            <div class="logo-footer">
                <a href="#top"><img src="content/image/index/logo-white-footer.png" alt=""></a>
            </div>
            <nav class="sub-navigation">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?act=devices">Shop</a></li>
                    <li><a href="">Team</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contacts</a></li>
                </ul>
            </nav>
            <div class="icon-connect-outside">
                <div class="icon">
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                </div>
                <div class="icon">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <div class="icon">
                    <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-end">
            <div class="content-end">
                <p>She gave my mother such a turn, that I have always been convinced I am indebted to Miss Betsey for having been born on a Friday.</p>
            </div>
            <nav class="menu-footer-end">
                <ul>
                    <li>
                        <a href="">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="">Terms and Conditions</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    
</footer>
</div>
<!-- Start javascript slider -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.banner').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: '<span class="prevArrow" id="prevArrowLimited"><i class="fa-solid fa-chevron-left"></i></span>',
            nextArrow: '<span class="nextArrow" id="nextArrowLimited"><i class="fa-solid fa-chevron-right"></i></span',
            slidesToScroll: 1
        });
    });
</script>
<?php
    if (isset($thongbao)) {
        echo "<script>$thongbao</script>";
    }
?>
<!-- End javascript slider -->
</body>

</html>