<div class="header">
    <div class="logo">
        <a href="index.php"><img src="./content/image/index/logo-website.png" alt=""></a>
    </div>
    <div class="title-small signup">
        <h3>Welcome to Portland</h3>
    </div>
    <div class="title-big">
        <h1>Create account</h1>
    </div>
</div>


<div class="main">
    <form action="index.php?actlogin=dangky" method="post">
        <div class="content-input">
            <label>Email</label> <br>
            <input type="text" autocomplete="off"  name="email" placeholder="John.snow@gmail.com" id="gmail1" value="<?= $email ?? ""  ?>" > <br>
            <p id="errorMail1">
                <?= $errors['email'] ?? "" ?>
            </p>

            <label>Fullname</label> <br>
            <input type="text" autocomplete="off"  name="fullName" placeholder="John.snow" id="user1" value="<?= $user ?? ""   ?>" > <br>
            <p id="errorUser1">
                <?= $errors['user'] ?? "" ?>
            </p>

            <label>Password</label> <br>
            <input type="password" autocomplete="off"  name="pass" placeholder="*********" id="pass1" value="<?= $password ?? ""   ?>" > <br>
            <p id="errorPass1">
                <?= $errors['pass'] ?? "" ?>
            </p>

            <label>Re-Password</label> <br>
            <input type="password" autocomplete="off" name="repass" placeholder="*********" id="repass1" value="<?= $rePassword ?? ""   ?>" > <br>
            <p id="errorRePass1">
                <?= $errors['rePassword'] ?? "" ?>
            </p>

        </div>
        <div class="button-login">
            <button type="submit" class="button-lg" name="btn-signup" type="submit" id="btnUP">Create Now</button>
        </div>
       
    </form>
  
</div>
</div>
</div>
</body>

</html>