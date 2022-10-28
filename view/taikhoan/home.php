<!-- Title form -->
<div class="header">
    <div class="logo">
        <a href="index.php"><img src="./content/image/index/logo-website.png" alt=""></a>
    </div>
    <div class="title-small signin">
        <h3>Welcome back</h3>
    </div>
    <div class="title-big">
        <h1>Login to your account</h1>
    </div>
</div>
<!-- Title form -->
<!-- Start form sign in -->
<div class="main">
    <form action="index.php?actlogin=dangnhap" method="post">
        <div class="content-input">

            <label>Email</label> <br>
            <input type="text" value="<?= $email ?? ""  ?>" name="email" placeholder="Laurasnow@gmail.com" id="gmail" autocomplete="off"> <br>
            <p id="errorMail"></p>

            <label>Password</label> <br>
            <input type="password" value="<?= $password ?? ""  ?>" name="password" placeholder="*********" id="pass"> <br>
            <div class="save-pass-check">
                <input type="checkbox" name="savePass" id="save">
                <label for="save">Remember account</label>
            </div>
            <p id="errorAll">
                <?= (isset($information)) ? $information : "" ?>
            </p>
        </div>
        <div class="button-login signin">
            <a href=""><button class="button-lg" id="btn-lg" name="btn-login">Login now</button></a>
          
        </div>
    </form>
</div>
<!-- End form sign in -->
<!-- Connect sign in -->
<div class="login-input">
    <a href="">
        <button class="button-lg one">
            <div class="changelg">
                <div class="img-button">
                    <img src="./content/image/index/google.png" alt="">
                </div>
                <div class="text-button">
                    <span>Or sign-in with google</span>
                </div>
            </div>
        </button>
    </a>
</div>

<div class="text-footer">
    <div class="title-footer">
        <a href="index.php?actlogin=forgetAcount"><span id="text">Forgot password?</span></a>
    </div>
    <div class="sub-title-footer">
        <a href="index.php?actlogin=dangky"><span>Don't have an account?</span></a>
        <a href="index.php?actlogin=dangky"><span id="text"> Join free today</span></a>
    </div>
</div>
<!-- Connect sign in -->
</div>
</div>
</body>

</html>