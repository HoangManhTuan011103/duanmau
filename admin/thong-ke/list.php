<div class="header listsp">
    <div class="title-small">
        <div class="icon-menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </div>
        <p>Đơn hàng</p>
    </div>
    <div class="name-setting-admin">
        <?php
            if(isset($_SESSION['user'])){
                $admin = $_SESSION['user']['user'];
            }
        ?>
        <p><?= $admin ?><i class="fa-solid fa-caret-down"></i></p>
        <ul class="nav">
            <li><a href="">Đăng Xuất</a></li>
        </ul>
    </div>
</div>

<div class="table-manager listsp">
    <table border="1">
        <h2>Thống kê số liệu theo danh mục</h2>
        <tr>
            <!-- <th><input type="checkbox"></th> -->
            <th>STT</th>
            <th class="idProduct">Mã danh mục</th>
            <th class="nameProduct">Tên danh mục</th>
            <th>Số lượng</th>
            <th class="priceProduct">Giá cao nhất</th>
            <th class="nameCategory">Giá thấp nhất</th>
            <th class="priceProduct">Giá trung bình</th>
        </tr>
        <?php foreach($listThongKe as $index => $value): ?>
            <?php 
                extract($value);
            ?>
            <tr>
                <!-- <td><input type="checkbox"></td> -->
                <td><?= $index+1 ?></td>
                <td>DM00<?= $madm ?></td>
                <td><?= $tendm ?></td>
                <td><?= $countsp ?></td>
                <td><?= $maxprice ?>$</td>
                <td><?= $minprice ?>$</td>
                <td><?= $avgprice ?>$</td>
            </tr>
        <?php endforeach ?>
    </table>
    <a href="index.php?act=bieudo">
        <button style="margin-top: 20px">
            Xem biểu đồ
        </button>
    </a>
    <div class="btn-list">

    </div>
    
</div>