<main class="main-cart">
    <div class="title-cart">
        <i class="fa-solid fa-cart-shopping"></i>
        <h2>Order Placed</h2>
    </div>
    <div class="my-cart order-Cart">
        <div class="cart-left orderPlaced">
            <table class="orderPlaced" border="1">
                <thead>
                    <tr>
                        <th>Code orders</th>
                        <th>Order date</th>
                        <!-- <th>Số lượng mặt hàng</th> -->
                        <th>Total order value</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php if (is_array($listorderPlaced) && $listorderPlaced != []) { ?>
                    <tbody>
                        <?php
                            $flag = 0;
                        ?>
                        <?php foreach ($listorderPlaced as $value) : ?>
                            <?php
                            $statusName = get_status_order($value['bill_status']);
                            $countBill = cart_selectAll($value['id']);
                            $amount = sizeof($countBill);
                            $flag++;
                            ?>
                            <tr>
                                <td>DH000<?= $value['id'] ?></td>
                                <td><?= $value['date_create'] ?></td>
                                <!-- <td><?= $amount ?></td> -->
                                <td><?= $value['total'] ?>$</td>
                                <td><?= $statusName ?></td>
                                <td class="label">
                                    <label for="viewDetail<?= $flag ?>" class="viewDetail">
                                    View order details
                                    </label>  
                                    <input name="checkbox" type="checkbox" value="" id="viewDetail<?= $flag ?>" hidden>
                                    <label for="viewDetail<?= $flag ?>" class="overlay">
                                    </label>
                                    
                                    <div class="viewDetailProductClient<?= $flag ?>">
                                        <?php
                                            $detailOnePage = cart_selectAll($value['id']);
                                        ?>
                                        <table class="tableClone" border="1">
                                            <tr>
                                                <th>Code orders</th>
                                                <th>Product</th>
                                                <th>Product name</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php foreach ($detailOnePage as $value) : ?>
                                                <?php
                                                $hinh = $image_path . $value['img'];
                                                ?>
                                                <tr>
                                                    <td>DH000<?= $value['id_bill']  ?></td>
                                                    <td><img width="130px" src="<?= $hinh  ?>" alt=""> </td>
                                                    <td><?= $value['name']  ?></td>
                                                    <td><?= $value['price']  ?>$</td>
                                                    <td><?= $value['soluong']  ?></td>
                                                    <td><?= $value['thanhtien']  ?>$</td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <span><i class="fa-sharp fa-solid fa-cart-plus"></i></span>
                                <p class="myinforCart orderPlaced">Your item is empty</p>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>

            </table>


        </div>
    </div>
</main>