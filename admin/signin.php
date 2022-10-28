<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Admin</title>
    <link rel="stylesheet" href="../content/css/signin-admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@400;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="container-form">
            <!-- Title form -->
            <div class="header">
                <div class="logo">
                    <a href="../index.php"><img src="../content/image/logo-white-footer.png" alt=""></a>
                </div>
                <div class="title-big">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <!-- Title form -->
            <!-- Start form sign in -->
            <div class="main">
                <form action="index.php?actLog=login" method="POST">
                    <div class="content-input">
                        <label>Email</label> <br>
                        <input type="text" value="<?= $email ?? "" ?>" placeholder="Laurasnow@gmail.com" id="gmail" autocomplete="off" name="gmail"> <br>
                        <p id="errorMail"></p>
                        <label>Mật khẩu</label> <br>
                        <input type="password" value="<?= $password ?? "" ?>" placeholder="*********" id="pass" name="password"> <br>
                        <div class="alert">
                        </div>
                        <label for="showFogort" class="forgot" style="cursor: pointer" >Quên mật khẩu</label>
                        
                        <p id="errorPass">
                            <?= $information ?? "" ?>
                        </p>
                    </div>
                    <div class="button-login">
                        <a href=""><button class="button-lg" id="btn-lg" name="btn-lg">Đăng nhập</button></a>
                        <p id="errorAll"></p>
                    </div>
                </form>
            </div>
            <p class="license">©︎ 2022 Bản quyền bởi HMT Group</p>
            <input type="checkbox" id="showFogort" hidden>
            <label class="overlayFogort" for="showFogort"></label>
            <?php
                
                if (isset($_POST['btn-forgotPass'])) {
                    $emailForgort = $_POST['emailForgort'];
                    $checkEmail = taikhoan_select_one($emailForgort);
                    if (is_array($checkEmail)) {
                        $forgotPass = "Mật khẩu của bạn: " . $checkEmail['password'];
                    } else {
                        $forgotPass = "Email của bạn không tồn tại";
                    }
                }
            ?>
            <form action="../admin/signin.php" id="formFogort" method="POST">
                <h3>Quên mật khẩu</h3>
                <div class="formFindPass">
                    <input type="text" value="<?= $forgotPass ?? "" ?>" placeholder="Mời bạn nhập email" name="emailForgort">
                    <p id="showPassFound">
                        <?= $forgotPass ?? "" ?>
                    </p>
                    <button class="btn-forgotPass">Tìm mật khẩu</button>
                </div>
            </form>
            <!-- End form sign in -->
        </div>
    </div>
</body>

</html>