<div class="content-manager managerShowView">
    <!-- <iframe src="home.html" name="self" frameborder="0"></iframe> -->
    <div class="header">
        <div class="title-small">
            <div class="icon-menu">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
            <p>Trang chủ quản trị</p>
        </div>
        <div class="name-setting-admin">
            <?php
                if(isset($_SESSION['user'])){
                    $admin = $_SESSION['user']['user'];
                }
            ?>
            <p><?= $admin ?><i class="fa-solid fa-caret-down"></i></p>
        </div>
    </div>
    <div class="find-home">
        <h1>Trang chủ</h1>
    </div>
    <div class="table-manager">
        <div class="total-product">
            <h2>Tổng số lượng sản phẩm</h2>
            <?php
                $sum = 0;
                for ($i = 0; $i < sizeof($soLuongSp); $i++) {
                    $sum++;
                }
            ?>
            <p>
                <?= $sum ?>
            </p>
            <div class="btn-pr">
                <a href="index.php?act=listsp"><button>Xem chi tiết thêm</button></a>
            </div>
        </div>
        <div class="total-category">
            <h2>Tổng số lượng danh mục</h2>
            <?php
                $sum = 0;
                for ($i = 0; $i < sizeof($soLuongDm); $i++) {
                    $sum++;
                }
            ?>
            <p>
                <?= $sum ?>
            </p>
            <div class="btn-cat">
                <a href="index.php?act=listdm"> <button>Xem chi tiết thêm</button></a>
            </div>
        </div>
        <div class="total-history">
            <h2>Danh sách bình luận</h2>
            <?php
                $sum = 0;
                for ($i = 0; $i < sizeof($soLuongBl); $i++) {
                    $sum++;
                }
            ?>
            <p><?= $sum ?></p>
            <div class="btn-cat">
                <a href="index.php?act=dsbl"> <button>Xem chi tiết thêm</button></a>
            </div>
        </div>
        <div class="total-wait">
            <h2>Danh sách đơn hàng</h2>
            <?php 
                $sum = 0;
                for($i = 0; $i < sizeof($soLuongBill); $i++){
                    $sum++;
                }
            ?>
            <p><?= $sum ?></p>
            <div class="btn-cat">
                <a href="index.php?act=order"> <button>Xem chi tiết thêm</button></a>
            </div>
        </div>
        <div class="total-user">
            <h2>Danh sách người dùng</h2>
            <?php
                $sum = 0;
                for ($i = 0; $i < sizeof($soLuongKh); $i++) {
                    $sum++;
                }
            ?>
            <p>
                <?= $sum ?>
            </p>
            <div class="btn-cat">
                <a href="index.php?act=dskh"> <button>Xem chi tiết thêm</button></a>
            </div>
        </div>
        <div class="total-database">
            <h2>Thống kê hệ thống</h2>
            <p><i class="fa-solid fa-database"></i></p>
            <div class="btn-cat">
                <a href="index.php?act=thongke"> <button>Xem chi tiết thêm</button></a>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>