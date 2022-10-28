<main class="main-devices">
    <div class="title-devices">
        <i class="fa-solid fa-hand-point-right"></i>
        <h2>Technology Devices</h2>
    </div>
    <!-- Start devices -->
    <!-- Start Smart Phone -->
    <section class="product-cat" id="2">

        <div class="title-cat">
            <?php
                if($namedm == "Smart Phone"){
                    $logo = '<i class="fa-solid fa-mobile-screen"></i>';
                }else if($namedm == "Accessory"){
                    $logo = '<i class="fa-solid fa-diagram-successor"></i>';
                }else if($namedm == "Watch"){
                    $logo = '<i class="fa-solid fa-circle-play"></i>';
                }else{
                    $logo = '<i class="fa-solid fa-circle-play"></i>';
                    $namedm = "Searched Product";
                }
            ?>
            <a href="">
                <h3><?= $logo . $namedm ?></h3>
            </a>
        </div>

        <div class="products-cat">
            <?php foreach ($spFollowId as $value) : ?>
                <?php
                extract($value);
                $hinh = $image_path . $image;
                $link = "index.php?act=spct&idsp=" . $value['id'];
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
                    <p>View: <?= $view ?></p>
                    <div class="price-catSc">
                        <h3 class="root">$<?= $price ?></h3>
                        <h3 class="discount">$<?= $value['discount'] ?></h3>
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
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li><a href="">6</a></li>
                <li><a href="">7</a></li>
                <li><a href="">8</a></li>
            </ul>
        </nav>
        <div class="arrow-right">
            <a href=""><i class="fa-solid fa-angle-right"></i></a>
        </div>
    </section>
</main>