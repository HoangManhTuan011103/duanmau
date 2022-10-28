<div class="header">
    <div class="logo">
        <a href="index.php"><img src="./content/image/index/logo-website.png" alt=""></a>
    </div>
    <div class="title-small signup">
        <h3>Welcome to Portland</h3>
    </div>
    <div class="title-big">
        <h1>Forgot password</h1>
    </div>
</div>


<div class="main">
    <form action="index.php?actlogin=forgetAcount" method="post">
        <div class="content-input">
            <label>Email</label> <br>
            <input type="text" value="<?= $email ?? "" ?>" name="email" placeholder="John.snow@gmail.com" id="gmail1"> <br>
            <p id="errorMail1">
                <?= $forgotPass ?? "" ?>
            </p>

            <!-- <label>Fullname</label> <br>
            <input type="text" name="fullName" placeholder="John.snow" id="user1"> <br>
            <p id="errorUser1"></p>

            <label>Password</label> <br>
            <input type="password" name="pass" placeholder="*********" id="pass1"> <br>
            <p id="errorPass1"></p> -->

            <!-- <label>Re-Password</label> <br>
            <input type="password" name="repasss" placeholder="*********" id="repass1"> <br>
            <p id="errorRePass1"></p> -->

        </div>
        <div class="button-login">
            <button type="submit" class="button-lg" name="btn-forgot" type="submit" id="btnUP">Send Email</button>
        </div>
       
    </form>
  
</div>
</div>
</div>
</body>

</html>