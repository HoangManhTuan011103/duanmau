<main class="main-devices">
    <div class="title-devices">
        <i class="fa-solid fa-hand-point-right"></i>
        <h2>Technology Devices</h2>
    </div>
    <!-- Start devices -->
    <!-- Start Smart Phone -->
    <section class="product-cat" id="2">
        <div class="title-cat">
            <a href="">
                <h3>
                    <i class="fa-solid fa-mobile-screen"></i>
                    Smart Phone
                </h3>
            </a>
        </div>
        <div class="products-cat">
            <?php foreach($productFollowPhone as $value): ?>
                <?php
                    extract($value);
                    $hinh = $image_path . $image;
                    $link = "index.php?act=spct&idsp=".$value['id']; 
                ?>
                <div class="product-catSc">
                    <div class="image-catSc">
                        <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                    </div>
                    <a href="<?= $link ?>">
                        <h4>
                            <?= $name ?>
                        </h4>
                    </a>
                    <div class="price-catSc">
                        <h3 class="root">$<?= $price ?>
                        </h3>
                        <h3 class="discount">$<?= $discount ?>
                        </h3>
                    </div>
                    <div class="addTo-Cart">
                        <form action="index.php?act=addToCart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="price" value="<?= $discount ?>">
                            <input type="hidden" min="1" value="1" name="amount">
                            <a href=""><button type="submit" name="btn-addCart" >Add to cart</button></a>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="navigation-rows-down">
        <div class="arrow-left">
            <a href=""><i class="fa-solid fa-angle-left"></i></a>
        </div>
        <nav class="navigation-number">
            <ul>
                <?php if(ceil($countPagePhone) <= 1){ $i = ""; ?>
                    
                <?php }else{ $i = 0; ?>
                    <?php for($i; $i <= $countPagePhone; $i++): ?>
                        <li><a href="index.php?act=devices&pagePhone=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                    <?php endfor ?>
                <?php } ?>
               
            </ul>
        </nav>
        <div class="arrow-right">
            <a href=""><i class="fa-solid fa-angle-right"></i></a>
        </div>
    </section>
    <!-- End Smart Phone -->
    <!-- Start SmatWacth -->
    <section class="product-cat" id="3">
        <div class="title-cat">
            <a href="">
                <h3><i class="fa-solid fa-circle-play"></i>
                Watch
            </h3>
            </a>
        </div>
        <div class="products-cat">
            <?php foreach($productFollowWacth as $value): ?>
                <?php
                    extract($value);
                    $hinh = $image_path . $image;
                    $link = "index.php?act=spct&idsp=".$value['id']; 
                ?>
                <div class="product-catSc">
                    <div class="image-catSc">
                        <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                    </div>
                    <a href="<?= $link ?>">
                        <h4>
                            <?= $name ?>
                        </h4>
                    </a>
                    <div class="price-catSc">
                        <h3 class="root">$<?= $price ?>
                        </h3>
                        <h3 class="discount">$<?= $discount ?>
                        </h3>
                    </div>
                    <div class="addTo-Cart">
                        <form action="index.php?act=addToCart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="price" value="<?= $discount ?>">
                            <input type="hidden" min="1" value="1" name="amount">
                            <a href=""><button type="submit" name="btn-addCart" >Add to cart</button></a>
                        </form>
                    </div>
                </div>
              
            <?php endforeach ?>
        </div>
    </section>
    <section class="navigation-rows-down">
        <div class="arrow-left">
            <a href=""><i class="fa-solid fa-angle-left"></i></a>
        </div>
        <nav class="navigation-number">
            <ul>
                <?php if(ceil($countPageWatch) <= 1){ $i = ""; ?>
                
                <?php }else{ $i = 0; ?>
                    <?php for($i; $i <= $countPageWatch; $i++): ?>
                        <li><a href="index.php?act=devices&pageWatch=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                    <?php endfor ?>
                <?php } ?>
            </ul>
        </nav>
        <div class="arrow-right">
            <a href=""><i class="fa-solid fa-angle-right"></i></a>
        </div>
    </section>
    <!-- End SmatWacth -->
    <!-- Start Accessory -->
    <section class="product-cat" id="5">
        <div class="title-cat">
            <a href="">
                <h3><i class="fa-solid fa-diagram-successor"></i>Accessory</h3>
            </a>
        </div>
        <div class="products-cat">
            <?php foreach($productFollowAccessory as $value): ?>
                <?php
                    extract($value);
                    $hinh = $image_path . $image;
                    $link = "index.php?act=spct&idsp=".$value['id']; 
                ?>
                <div class="product-catSc">
                    <div class="image-catSc">
                        <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                    </div>
                    <a href="<?= $link ?>">
                        <h4>
                            <?= $name ?>
                        </h4>
                    </a>
                    <div class="price-catSc">
                        <h3 class="root">$<?= $price ?>
                        </h3>
                        <h3 class="discount">$<?= $discount ?>
                        </h3>
                    </div>
                    <div class="addTo-Cart">
                        <form action="index.php?act=addToCart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="price" value="<?= $discount ?>">
                            <input type="hidden" min="1" value="1" name="amount">
                            <a href=""><button type="submit" name="btn-addCart" >Add to cart</button></a>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="navigation-rows-down">
        <div class="arrow-left">
            <a href=""><i class="fa-solid fa-angle-left"></i></a>
        </div>
        <nav class="navigation-number">
            <ul>
                <?php if(ceil($countPageAccessory) <= 1){ $i = ""; ?>
                
                <?php }else{ $i = 0; ?>
                    <?php for($i; $i <= $countPageAccessory; $i++): ?>
                    <li><a href="index.php?act=devices&pageAccessory=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                    <?php endfor ?>
                <?php } ?>
            </ul>
        </nav>
        <div class="arrow-right">
            <a href=""><i class="fa-solid fa-angle-right"></i></a>
        </div>
    </section>
    <!-- End Accessory -->

    <!-- End devices -->
</main>