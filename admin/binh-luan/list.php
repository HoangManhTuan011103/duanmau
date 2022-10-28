<div class="header listsp">
    <div class="title-small">
        <div class="icon-menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </div>
        <p>Bình Luận</p>
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
    <form action="index.php?act=dsbl" method="post">
        <?php 
            $sum = 0;
            foreach($listCommentPr as $value){
                $sum += number_format($value['COUNT(C.id_pr)']);
            }
        ?>
        <label for="">Số lượng bình luận của khách hàng: <span><?= $sum ?></span> </label> <br> <br>
        <input type="text" name="nameFind" placeholder="Nhập tên sản phẩm muốn tìm">
        <button type="submit" name="btn-findPr" >Tìm kiếm</button>
    </form>

</div>
<div class="table-manager listsp">
    <table border="1">
        <h2>Quản lý bình luận</h2>
        <div class="form listsp listkh">
            <select name="" id="" class="selection listsp">
                <option value="" hidden>Tìm Theo</option>
                <option value="">Theo A - Z</option>
                <option value="">Theo Z - A</option>
                <option value="">Theo mã tài khoản</option>
            </select>
            <button class="btn-see accountClient">Xem tất cả</button>
        </div>
        <tr>
            <!-- <th><input type="checkbox"></th> -->
            <th>STT</th>
            <th class="idProduct">Mã sản phẩm</th>
            <th class="nameProduct">Sản phẩm</th>
            <th class="nameCategory">Ảnh</th>
            <th class="priceProduct">Danh mục</th>
            <th class="priceProduct">Số lượng bình luận</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($listCommentPr as $index => $value): ?>
            <?php
                $imagePath = "../imageProduct/".$value['image'];
                if(is_file($imagePath)){
                    $hinh = "<img src='".$imagePath."' alt='' width='150px' height='150px'>";
                }else{
                    $hinh = "<h3>Không có hình ảnh</h3>";
                }
            ?>
            <tr>
                <!-- <td><input type="checkbox"></td> -->
                <td><?= $index+1 ?></td>
                <td>SP00<?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td>
                    <?= $hinh ?>
                </td>
                <td><?= $value['namedm'] ?></td>
                <td><?= $value['COUNT(C.id_pr)'] ?></td>
                <td>
                    <div class="btn listsp">
                        <a href="index.php?act=viewbl&id=<?= $value['id'] ?>"><button class="repair view_Detail">Xem chi tiết</button></a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <div class="btn-list">

    </div>
</div>