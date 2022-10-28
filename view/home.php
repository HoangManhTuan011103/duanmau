<div class="banner">
    <!-- Slider -->
    
        <?php
        $link = "index.php?act=spct&idsp=".$value['id']; 
        ?>
         <div class="image-banner">
        <a href="index.php?act=spct&idsp=38"> <img src="content/image/index/banner1.jpg" alt=""></a>
        </div>
        <div class="image-banner" style="background-color: #000000;">
            <a href="index.php?act=spct&idsp=21"> <img src="content/image/index/banner2.png" alt=""></a>
        </div>
        <div class="image-banner" style="background-color: #000000;">
            <a href="index.php?act=spct&idsp=26"> <img src="content/image/index/banner3.png" alt=""></a>
        </div>
        <div class="image-banner">
            <a href="index.php?act=spct&idsp=15"><img src="content/image/index/banner4.jpg" alt=""></a>
        </div>
 
    
   
    <!-- Slider -->
</div>
<main>
    <!-- Start navigation rows -->
    <div class="navigation">
        <nav class="navigation-rows-left">
            <ul>
                <li><a href="">Sort By:</a></li>
                <li><a href="">Best Match <i class="fa-solid fa-angle-down"></i></a></li>
            </ul>
        </nav>
        <div class="navigation-rows-main">
            <div class="keywords">
                <form action="">
                    <label for="" class="title-key">Keywords</label>
                    <input type="text" placeholder="Tablet">
                </form>
            </div>
            <div class="price">
                <form action="">
                    <label for="" class="title-price">Price</label>
                    <input type="text" class="short"> -
                    <input type="text" class="height">
                </form>
            </div>
            <div class="free-ship">
                <div class="image-free-ship">
                    <a href=""><img src="content/image/index/free-ship.png" alt=""></a>
                </div>
                <p>Free Shipping</p>
            </div>
        </div>
        <nav class="navigation-rows-right">
            <ul>
                <li class="ship"><a href="">Ship to:</a></li>
                <li><a href="">USA <i class="fa-solid fa-angle-down"></i></a></li>
            </ul>
        </nav>
    </div>
    <!-- End navigation rows -->
    <article class="content-main">
        <div class="navigation-column-left">
            <nav class="menu-column-first">
                <ul>
                    <li>
                        <div class="text-menu-column">
                            <a href="">Technological</a>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </li>
                    <li>
                        <div class="text-menu-column">
                            <a href="">Smart Phone</a>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </li>
                    <li>
                        <div class="text-menu-column">
                            <a href="">Accessory</a>
                        </div>

                        <div class="icon">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>

                    </li>
                    <li>
                        <div class="text-menu-column">
                            <a href="">Fashion</a>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </li>
                    <li>
                        <div class="text-menu-column">
                            <a href="">Smart Watch</a>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="form-menu-column">
                <form action="">
                    <!-- Available -->
                    <div class="available-column">
                        <h3>Available</h3>
                        <!-- Storage -->
                        <div class="storage">
                            <div class="radio-fisrt">
                                <input type="radio" name="available" id="storage">
                                <label for="storage">In storage</label>
                            </div>
                            <span>45</span>
                        </div>
                        <!-- Online-shop -->
                        <div class="online-shop">
                            <div class="radio-second">
                                <input type="radio" name="available" id="online">
                                <label for="online">In Online-Shop</label>
                            </div>
                            <span>12</span>
                        </div>
                    </div>
                    <!-- Brand -->
                    <div class="brand-column">
                        <div class="brand-title">
                            <h3>Brand</h3> <a href=""><span>All</span></a>
                        </div>

                        <!-- Apple -->
                        <div class="apple">
                            <div class="check-box-first">
                                <input type="checkbox" name="brand" id="apple-brand">
                                <label for="apple-brand">Apple</label>
                            </div>
                            <span>32</span>
                        </div>
                        <!-- JBL -->
                        <div class="JBL">
                            <div class="check-box-second">
                                <input type="checkbox" name="brand" id="JBL-brand">
                                <label for="JBL-brand">JBL</label>
                            </div>
                            <span>14</span>
                        </div>
                        <!-- Bose -->
                        <div class="Bose">
                            <div class="check-box-third">
                                <input type="checkbox" name="brand" id="Bose-brand">
                                <label for="Bose-brand">Bose</label>
                            </div>
                            <span>3</span>
                        </div>
                        <!-- Nest -->
                        <div class="Nest">
                            <div class="check-box-fourth">
                                <input type="checkbox" name="brand" id="Nest-brand">
                                <label for="Nest-brand">Nest</label>
                            </div>
                            <span>5</span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="form-menu-column-second">
                <form action="">
                    <!-- Condition -->
                    <div class="condition-column">
                        <div class="condition-title">
                            <h3>condition</h3> <a href=""><span>See All</span></a>
                        </div>

                        <!-- New -->
                        <div class="New">
                            <div class="check-box-first">
                                <input type="checkbox" name="condition" id="New-condition">
                                <label for="New-condition">New</label>
                            </div>
                        </div>
                        <!-- Manufacturer Refurbished -->
                        <div class="Manufacturer">
                            <div class="check-box-second">
                                <input type="checkbox" name="condition" id="Manufacturer-condition">
                                <label for="Manufacturer-condition">Manufacturer Refurbished</label>
                            </div>
                        </div>
                        <!-- Seller Refurbished -->
                        <div class="Seller">
                            <div class="check-box-third">
                                <input type="checkbox" name="condition" id="Seller-condition">
                                <label for="Seller-condition">Seller Refurbished</label>
                            </div>
                        </div>
                        <!-- Used -->
                        <div class="Used">
                            <div class="check-box-fourth">
                                <input type="checkbox" name="condition" id="Used-condition">
                                <label for="Used-condition">Used</label>
                            </div>
                        </div>
                        <!-- For Parts or not Working -->
                        <div class="Parts">
                            <div class="check-box-fourth">
                                <input type="checkbox" name="condition" id="Parts-condition">
                                <label for="Parts-condition">For Parts or not Working</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-menu-column-third">
                <form action="">
                    <!-- Available -->
                    <div class="Delivery-column">
                        <h3>Delivery Options</h3>
                        <div class="delivery-options">
                            <div class="radio-fisrt-delivery">
                                <input type="radio" name="options" id="free">
                                <label for="free">Free</label>
                            </div>
                            <div class="radio-second-delivery">
                                <input type="radio" name="options" id="money">
                                <label for="money">$4.99</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="content-right">
            <!-- Product content -->
            <?php foreach ($productNew as $value) : ?>
                <?php
                    extract($value);
                    $hinh = $image_path . $image;
                    $link = "index.php?act=spct&idsp=".$value['id']; 
                ?>
                <div class="product-content">
                    <div class="image-product">
                        <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                    </div>
                    <div class="title-product">
                        <a href="<?= $link ?>">
                            <h3><?= $name ?></h3>
                        </a>
                    </div>
                    <div class="discount-product">
                        <p><?= $discount ?>$</p>
                    </div>
                    <div class="money-product">
                        <p><?= $price ?>$</p>
                    </div>
                </div>
            <?php endforeach ?>

            <!-- Product content -->
        </div>
    </article>
    <section class="navigation-rows-down">
        <div class="arrow-left">
            <?php if(isset($_GET['page']) && $_GET['page'] > 1){ $prevPage = $_GET['page'] - 1; ?>
                <li style="list-style: none;"><a href="index.php?act=listsp&page=<?= $prevPage ?>"><i class="fa-solid fa-angle-left"></i></a></li>
            <?php } ?>
        </div>
        <nav class="navigation-number">
            <ul>
                <?php if(ceil($countPage) <= 1){ $i = ""; ?>
                <?php }else{ $i = 0; ?>
                        <?php if(isset($_GET['page']) && $_GET['page'] > 2){ $fisrtPage = 1; ?>
                            <li><a href="index.php?act=listsp&page=<?= $fisrtPage ?>">First</a></li>
                        <?php } ?>
                        <?php for($i; $i <= $countPage; $i++): ?>
                            <?php if(isset($_GET['page'])): ?>
                                <?php if($i+1 != $_GET['page']): ?>
                                    <?php if($i+1 > $_GET['page']-2 && $i+1 < $_GET['page']+2): ?>
                                        <li><a href="index.php?act=listsp&page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li><a style="background-color: #0F172A; color: #ffffff; border-radius: 20px;" href="index.php?act=listsp&page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php   
                                    if($i+1 == 1){
                                        $backGround = "style=background-color:";
                                        $color = "#0F172A;";
                                        $Word = "color:";
                                        $colorWord =  "#ffffff;";
                                        $border =  "border-radius:";
                                        $pixel = "20px;";
                                    }else{
                                        $backGround = "";
                                        $color = "";
                                        $Word =  "";
                                        $colorWord =  "";
                                        $border =  "";
                                        $pixel =  "";
                                    } 
                                ?>
                                <?php if($i+1 > 1-2 && $i+1 < 1+2): ?>
                                    <li><a <?= $backGround . $color .  $Word . $colorWord . $border . $pixel ?> href="index.php?act=listsp&page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endfor ?>
                        
                        <?php if(isset($_GET['page']) && $_GET['page'] < ceil($countPage) - 1){ $endPage = ceil($countPage); ?>
                            <li><a href="index.php?act=listsp&page=<?= $endPage ?>">Last</a></li>
                        <?php } ?>
                <?php } ?>
            </ul>
        </nav>
        <div class="arrow-right">
        <?php if(isset($_GET['page']) && $_GET['page'] < ceil($countPage) - 1){ $nextPage = $_GET['page'] + 1; ?>
                <li style="list-style: none;" ><a href="index.php?act=listsp&page=<?= $nextPage ?>"><i class="fa-solid fa-angle-right"></i></a></li>
        <?php } ?>
        </div>
    </section>
    <!-- Start Best seller -->
    <section class="bestSellers">
        <div class="title-bestsellers">
            <a href="">
                <h3>Top 8 Best Sellers</h3>
            </a>
        </div>
        <div class="products-seller">
            <?php foreach ($productTop as $value) : ?>
                <?php
                    extract($value);
                    $hinh = $image_path . $image;
                    $link = "index.php?act=spct&idsp=".$value['id']; 
                ?>
                <div class="product-bestseller">
                    <div class="image-bestseller">
                        <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                    </div>
                    <a href="<?= $link ?>">
                        <h3><?= $name ?></h3>
                    </a>
                    <p class="view-product">View: <?= $view ?></p>
                    <div class="price-bestseller">
                        <h3 class="root"><?= $price ?>$</h3>
                        <h3 class="discount"><?= $discount ?>$</h3>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <!-- End Best seller -->
</main>