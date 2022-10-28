<main class="main-detail">
    <div class="title-detail">
        <i class="fa-solid fa-hand-point-right"></i>
        <h2>Detail Product</h2>
    </div>
    <div class="detail-product">
        <?php
        extract($product);
        $hinh = $image_path . $image;
        ?>
        <div class="image-product">
            <a href=""><img src=" <?= $hinh ?>" alt=""></a>
        </div>
        <div class="infor-sumary-product">
            <div class="title-product">
                <h1>
                    <?= $name ?>
                </h1>
            </div>
            <div class="price-product">
                <span class="price-root">$<?= $price ?></span>
                <p class="price-discount">$<?= $discount ?></p>
            </div>
            <div class="quality-product">
                <span>100% <span class="bold-text">Quality</span> products with <span class="bold-text">Confidence</span></span>
            </div>
            <div class="color-product">
                <form action="">
                    <label for="">Choose Color:</label> <br>
                    <button class="color-first">0</button>
                    <button class="color-second">0</button>
                    <button class="color-third">0</button>
                </form>
            </div>
            <div class="description-product">
                <p>
                    <span>Description:</span>
                    <?= $describe ?>
                </p>
            </div>
            <div class="amount-product">
                <form action="index.php?act=addToCart" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="image" value="<?= $image ?>">
                    <input type="hidden" name="name" value="<?= $name ?>">
                    <input type="hidden" name="price" value="<?= $discount ?>">
                    <input type="number" min="1" value="1" name="amount" placeholder="Please select the number">
                    <a href=""><button type="submit" name="btn-addCart" >Add to cart</button></a>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#commentClient").load("view/binhluan/binhluan.php", {
                        idPr: <?= $id ?>,
                        // idPr is value get $_REQUEST['idPr'] to binhluan.php
                    });
                });
            </script>
        <div class="comment-customer" id="commentClient">

        </div>
    </div>
    <!-- Start Best seller -->
    <section class="product-related">
        <div class="title-relatedSC">
            <a href="">
                <h3>Product Related</h3>
            </a>
        </div>
        <div class="products-related">
            <?php foreach ($productRelated as $value) : ?>
                <?php
                extract($value);
                $hinh = $image_path . $image;
                $link = "index.php?act=spct&idsp=" . $value['id'];
                ?>
                <div class="product-relatedSC">
                    <div class="image-relatedSC">
                        <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                    </div>
                    <a href="<?= $link ?>">
                        <h4>
                            <?= $name ?>
                        </h4>
                    </a>
                    <!-- <p>Green</p> -->
                    <div class="price-relatedSC">
                        <h3 class="root">$<?= $price ?></h3>
                        <h3 class="discount">$<?= $discount ?></h3>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <!-- End Best seller -->
</main>