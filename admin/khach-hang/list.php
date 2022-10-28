<div class="header listsp">
    <div class="title-small">
        <div class="icon-menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </div>
        <p>Khách hàng</p>
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
<div class="find-pr-cat listsp">
    <form action="index.php?act=listsp" method="post">
        <?php 
            $sum = 0;
            for($i = 0; $i < sizeof($soLuongKh); $i++){
                $sum++;
            }
        ?>
        <label for="">Số lượng khách hàng đang hiển thị: <span><?= $sum ?></span> </label> <br> <br>
        <input type="text" name="nameFind" placeholder="Nhập tên khách muốn tìm">
        <button type="submit" name="btn-findPr" >Tìm kiếm</button>
    </form>

</div>
<div class="table-manager listsp">
    <table border="1">
        <h2>Quản lý tài khoản</h2>
        <div class="form listsp listkh">
            <select name="" id="" class="selection listsp">
                <option value="" hidden>Tìm Theo</option>
                <option value="">Theo A - Z</option>
                <option value="">Theo Z - A</option>
                <option value="">Theo mã tài khoản</option>
            </select>
            <button class="btn-see accountClient">Xem tất cả</button>
            <a href="index.php?act=addkh"><button class="btn-see"><i class="fa-solid fa-plus"></i>Thêm mới</button></a>
        </div>

        <?php if(isset($thongbao)): ?>
            <div class="alert alert-success">
                <?= $thongbao ?>
            </div>
        <?php endif ?>

        <tr>
            <th><input type="checkbox"></th>
            <th>STT</th>
            <th class="idProduct">Mã tài khoản</th>
            <th class="nameProduct">Tên khách hàng</th>
            <th class="nameCategory">Email</th>
            <th class="priceProduct">Mật khẩu</th>
            <th class="priceProduct">Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($listAccount as $index => $value): ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?= $index+1 ?></td>
                <td>KH00<?= $value['id'] ?></td>
                <td><?= $value['user'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['password'] ?></td>
                <td><?= $value['address'] ?></td>
                <td><?= $value['telephone'] ?></td>
                <td>
                    <?php 
                        if($value['role'] == 0){
                            $vaiTro = "Khách hàng";
                        }
                        if($value['role'] == 1){
                            $vaiTro = "Quản trị";
                        }
                    ?>
                    <?= $vaiTro ?>
                </td>
                <td>
                    <div class="btn listsp">
                        <a href="index.php?act=suakh&id=<?= $value['id'] ?>"><button class="repair">Sửa</button></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng <?= $value['user'] ?> không?')" href="index.php?act=xoakh&id=<?= $value['id'] ?>"><button class="delete">Xóa</button></a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <div class="btn-list">

    </div>
</div>