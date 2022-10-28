<main class="main-cart">
    <div class="title-cart">
        <i class="fa-solid fa-cart-shopping"></i>
        <h2>My Cart</h2>
    </div>
    <div class="my-cart">
        <div class="cart-left">
            <div class="product-in-cart">
                <table class="table-product-incart" border="0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 
                        $totalAll = 0; 
                        $index = 0;
                    ?>
                    <?php if(sizeof($_SESSION['myCart']) > 0){?>
                        <tbody>
                            <?php foreach($_SESSION['myCart'] as $value): ?>
                                <?php 
                                    $image = $image_path.$value[1]; 
                                    $totalAnPr = $value[3] * $value[4];
                                    $totalAll += $totalAnPr;
                                ?>
                                <tr>
                                    <td class="product">
                                        <a href=""><img src="<?= $image ?>" alt=""></a>
                                        <p class="name-product"><?= $value[2] ?></p>
                                    </td>
                                    <td class="price">$<?= $value[3] ?></td>
                                    <td class="amount"><button>-</button><input type="text" min="0" value="<?= $value[4] ?>"><button>+</button></td>
                                    <td class="total">$<?= $totalAnPr ?></td>
                                    <td class="delete"><a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm <?= $value[2] ?> không')" href="index.php?act=deleteCart&idPrCart=<?= $index ?>"><button><i class="fa-solid fa-trash-can"></i></button></a></td>
                                </tr>
                                <?php
                                    $index++;
                                ?>
                            <?php endforeach ?>
                        </tbody>
                    <?php }else{ ?>
                        <div class="myCartEmty">
                            <a href="index.php?act=devices"><i class="fa-sharp fa-solid fa-cart-plus"></i></a>
                            <p class="myinforCart">Your cart is empty</p>
                        </div>
                    <?php } ?>
                    
                </table>
            </div>
            <!-- <div class="add-a-note">
                <div class="title-text-note">
                    <h2>add a note</h2>
                </div>
                <form action="">
                    <input type="text" placeholder="Some words to in Portland team">
                </form>
            </div> -->
        </div>
        <div class="cart-right">
            <div class="rows-border">
                <a href=""><img src="./content/image/index/logo-website.png" alt=""></a>
            </div>
            <div class="pay-with-money">
                <div class="form">
                    <label for="" class="total-money-text">Cart Total:</label><span class="total-money-cart">$<?= $totalAll ?></span>
                    <p class="term">Shipping & taxes calculated at checkout</p>

                    <div class="checkbox">
                        <input type="checkbox" id="agree" name="agree">
                        <label for="agree">I agree <span>Term & Condition</span></label>
                    </div>

                    <!-- Show Bill Product -->
                    <?php if($totalAll > 0 ):?>
                        <label for="showBill" class="btn-pay">
                            <!-- <button> -->
                                CheckOut<i class="fa-solid fa-lock"></i>
                            <!-- </button> -->
                        </label>
                        <input type="checkbox" id="showBill" hidden>
                        <label for="showBill" class="backgroundShowbill">

                        </label>
                        <div class="underShowBill">
                            <?php
                                $user = $_SESSION['user']['user'];
                                $email = $_SESSION['user']['email'];
                                $address = $_SESSION['user']['address'];
                                $telephone = $_SESSION['user']['telephone'];
                            ?>
                            <form action="index.php?act=billOrder" method="post" class="agreeMyCart">
                                <h2 class="informationOrder">Order Information</h2>
                                <div class="box-infor">
                                    <div class="informationBasic">
                                        <div class="user-Cart titleMyCart">
                                            <p>Name:</p>
                                            <input type="text" name="userOrder" class="informationClient" value="<?= $user ?>">
                                        </div>
                                        <div class="address-Cart titleMyCart">
                                            <p>Address:</p>
                                            <input type="text" name="addessOrder" class="informationClient" value="<?= $address ?>">
                                        </div>
                                        <div class="email-Cart titleMyCart">
                                            <p>Email:</p>
                                            <input type="text" name="emailOrder" class="informationClient" value="<?= $email ?>">
                                        </div>
                                        <div class="telephone-Cart titleMyCart">
                                                <p>Telephone Number:</p>
                                                <input type="text" name="telephoneOrder" class="informationClient" value="<?= $telephone ?>">
                                        </div>
                                        <div class="checkout-Cart titleMyCart">
                                            <p>Payment methods:</p>

                                            <div class="btn-radio">
                                                <div class="option-one">
                                                    <input type="radio" value="0" name="money" id="offline" checked>
                                                    <label for="offline"  class="radio">Pay on delivery</label>
                                                </div>

                                                <div class="option-two">
                                                    <input type="radio" value="1" name="money" id="oneline">
                                                    <label for="oneline" class="radio">Online payment</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orderItems">
                                        <table border="1">
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php foreach($_SESSION['myCart'] as $value): ?>
                                                <tr>
                                                    <td><?= $value[2] ?></td>
                                                    <td><?= $value[3] ?>$</td>
                                                    <td><?= $value[4] ?></td>
                                                    <td><?= $value[5] ?>$</td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                        <h4 style="padding: 20px 0 ; text-align: left "  >Total Money: <?= $totalAll ?>$</h4>
                                    </div>
                                </div>
                                <button type="submit" class="btn-dathang" name="btn-agreeOrder">
                                    Order
                                </button>
                            </form>
                        </div>
                        <div class="btn-pay-with-card">
                        <button>
                            <i class="fa-brands fa-paypal"></i>
                            <span class="pay">Pay</span><span class="pal">Pal</span>

                        </button>
                        </div>

                    <?php endif; ?>
                    
                    <!-- Show Bill Product -->
                    
                    
                </div>
            </div>
        </div>
    </div>
</main>