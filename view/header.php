<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./content/css/style.css">
    <link rel="stylesheet" href="./content/css/cart.css">
    <link rel="stylesheet" href="./content/css/detail.css">
    <link rel="stylesheet" href="./content/css/devices.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- Stat header -->
        <header>
            <div class="header-container">
                <!-- Start header on -->
                <div class="header-container-on">
                    <!-- Stat header left -->
                    <div class="header-left">
                        <label class="icon-menu" for="do-subMenu">
                            <i class="fa-solid fa-bars"></i>
                        </label>
                        <div class="logo-header">
                            <a href="index.php"><img src="./content/image/index/logo-website.png" alt=""></a>
                        </div>
                    </div>
                    <!-- Stat header main -->
                    <div class="menu-main">
                        <nav>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="index.php?act=devices">Devices</a></li>
                                <li><a href="index.php?act=payment">Delivery & Payment</a></li>
                                <li><a href="index.php?act=guarantee">Guarantee</a></li>
                                <li><a href="index.php?act=about">About Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Stat header right -->
                    <div class="header-right">
                        <form action="index.php?act=cart" method="post">
                            <input type="hidden" name="valueCurrent" value="1">
                            <button type="submit" class="cart" style="border: none; outline: none; background-color: #ffffff;">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </form>
                            <a href="index.php?act=cart" >
                                <h4>Cart</h4>
                            </a>
                            
                            <div class="btn-amount-cart" >
                                <a href="index.php?act=cart" >
                                    <button>
                                        <h4>
                                            <?php
                                                if(isset($_SESSION['myCart'])){
                                                    $amountProductShow = sizeof($_SESSION['myCart']);
                                                    echo $amountProductShow;
                                                }else{
                                                    echo 0;
                                                }
                                            ?>
                                        </h4>
                                    </button>
                                </a>
                            </div>
                            
                       
                        
                        <?php if(isset($_SESSION['user'])):
                            extract($_SESSION['user']);
                            $imagePath = "./imageProduct/" . $image;
                            $showAccount = "<img class='imageAvatar' src='" . $imagePath . "' alt=''>";
                        ?>
                            <div class="avatar client">
                                <a href="">
                                    <h4>
                                        <?= $image == "" ? substr($user,0,1) : $showAccount ?>
                                    </h4>
                                </a>

                                <div class="information-account">
                                    <li>
                                        <a href="index.php?act=updateAccount">
                                            <?= $user ?> <br>
                                            <span class="emailAccountNew">(<?= $email ?>)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?actlogin=changePass">
                                        Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=updateAccount">
                                        Update my account
                                        </a>
                                    </li>
                                    <li class="myOrder">
                                        <a href="index.php?act=orderPlaced">
                                        My order
                                        </a>
                                    </li>
                                    <?php if($role == 1){ ?>
                                        <li>
                                            <a href="admin/index.php">
                                            Login with admin
                                            </a>
                                        </li> <br>
                                    <?php } ?>
                                    <li>
                                        <a onclick="return confirm('Do you want to sign out?')" href="index.php?act=logOut">
                                        Log out
                                        </a>
                                    </li>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="btn-submit">
                                <a href="index.php?actlogin=dangnhap"><button>Sign in</button></a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <!-- End header on -->
            </div>
        </header>
        <input type="checkbox" class="show-hiden-subMenu" id="do-subMenu" checked>
        <div class="sub-header">
            <div class="header-container-second">
                <nav class="sub-menu-second">
                    <ul>
                        <?php foreach ($categories as $value) : ?>
                            <?php
                            $link = "index.php?act=sp&iddm=" . $value['id'];
                            ?>
                            <li>
                                <a href="<?= $link ?>">
                                    <?= $value['namedm'] ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </nav>
                <div class="find-support">
                    <div class="text-support">
                        <ul>
                            <li><a href="">Support</a></li>
                        </ul>
                    </div>
                    <form action="index.php?act=sp" method="POST">
                        <div class="icon-find">
                            <label for="btn-searchSp"><i class="fa-solid fa-magnifying-glass"></i></label>
                            <input type="submit" id="btn-searchSp" name="btn-searchSp" value="" hidden>
                        </div>
                        <div class="input-find">
                            <input type="text" name="keyName" placeholder="I'm looking for">
                        </div>
                    </form>
                </div>
            </div>
        </div>