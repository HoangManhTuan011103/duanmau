<main class="main-cart">
    <div class="title-cart">
        <i class="fa-solid fa-cart-shopping"></i>
        <h2>My Order</h2>
    </div>
    <?php
        if(isset($bill) && (is_array($bill))){
            extract($bill);
        }
    ?>
    <div class="my-cart order-Cart">
        <div class="cart-left">
            <div class="buySuccess">
                <h3>You have successfully purchased!</h3>
            </div>
            <div class="title-yourCart">
                    <h2>Your order</h2>
                </div>
            <div class="information-Order-Client">
                <div class="information-detail-personal">
                    <p class="title">Information line</p>
                    <div class="detailPersonal">
                        <p>Code orders: <span>DH000<?= $id ?></span></p>
                        <p>Name: <span><?= $bill_name ?></span></p>
                        <p>Address: <span><?= $bill_address ?> </span></p>
                        <p>Telephone Number: <span><?= $bill_tel ?> </span></p> 
                        <p>Order date: <span><?= $date_create ?></span></p> 
                        <p>Payment methods: <span><?= $bill_pttt==0 ? "Pay on delivery" : "Online payment" ?></span></p>
                        <p class="totalMoney">Total order: <span class="totalMoneySpan"><?= $total ?>$</span></p>
                    </div>
                    <form action="index.php?act=orderPlaced" method="post" class="form-finished">
                        <button type="submit" class="btn-finished">
                        Completed
                        </button>
                    </form>
                </div>
                <div class="information-detail-prduct">
                    <p class="title">Order details</p>
                    <div class="detailProductClient">
                       <table border="1">
                        <tr>
                            <th>Image product</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Total</th>
                        </tr>
                            <?php foreach($billDetail as $value): ?>
                                <?php
                                    $hinh = $image_path . $value['img'];
                                ?>
                                <tr>
                                    <td><img width="130px" src="<?= $hinh  ?>" alt=""> </td>
                                    <td><?= $value['name']  ?></td>
                                    <td><?= $value['price']  ?>$</td>
                                    <td style="text-align: center;" ><?= $value['soluong']  ?></td>
                                    <td><?= $value['thanhtien']  ?>$</td>
                                </tr>
                            <?php endforeach ?>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>