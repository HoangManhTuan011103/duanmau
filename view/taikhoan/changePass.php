<div class="header">
    <div class="logo">
        <a href="index.php"><img src="./content/image/index/logo-website.png" alt=""></a>
    </div>
    <div class="title-small signup">
        <h3>Welcome to Portland</h3>
    </div>
    <div class="title-big">
        <h1>Change password</h1>
    </div>
</div>


<div class="main">
    <form action="index.php?actlogin=changePass" method="post">
        <div class="content-input">
            <label>Password</label> <br>
            <input type="password" value="<?= $pass ?? ""  ?>" name="pass" placeholder="*********" id="pass1"> <br>
            <p id="errorPass1">
                <?= $errors['pass'] ?? "" ?>
            </p>

            <label>New Password</label> <br>
            <input type="password" name="newPass" value="<?= $newPass ?? ""  ?>" placeholder="*********" id="pass1"> <br>
            <p id="errorUser1">
                <?= $errors['newPass'] ?? "" ?>
            </p>

            <label>Re-New Password</label> <br>
            <input type="password" name="reNewPass" value="<?= $reNewPass ?? ""  ?>" placeholder="*********" id="repass1"> <br>
            <p id="errorRePass1">
                <?= $errors['reNewPass'] ?? "" ?>
            </p>

        </div>
        <div class="button-login">
            <button type="submit" class="button-lg" name="btn-forgot" type="submit" id="btnUP">Change Password</button>
        </div>
       
    </form>
  
</div>
</div>
</div>
</body>

</html>