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
            for($i = 0; $i < sizeof($listComment); $i++){
                $sum++;
            }
        ?>
        <label for="">Số lượng bình luận của khách hàng: <span><?= $sum ?></span> </label> <br> <br>
        <input type="text" name="nameFind" placeholder="Nhập tên khách muốn tìm">
        <button type="submit" name="btn-findPr" >Tìm kiếm</button>
    </form>

</div>
<div class="table-manager listsp">
    <table border="1">
        <?php
            $imagePath = "../imageProduct/".$getInforBasic['image'];
            if(is_file($imagePath)){
                $hinh = "<img src='".$imagePath."' alt='' width='150px' height='150px'>";
            }else{
                $hinh = "<h3>Không có hình ảnh</h3>";
            }
        ?>
        <div class="detailInforProduct">
            <h2>Sản phẩm bình luận: <span><?= $getInforBasic['name'] ?></span> </h2>
            <?= $hinh ?>
        </div>
        <a href="index.php?act=dsbl">
            <button style="margin: 10px 0 15px 0;">Quay lại trang tổng hợp</button>
        </a>
      
        
        
        <?php if(isset($thongbao)): ?>
            <div class="alert alert-success deleteComment" id="deleteComment">
                <?= $thongbao ?>
            </div>
        <?php endif ?>

        <tr>
            <th><input type="checkbox"></th>
            <th>STT</th>
            <th class="idProduct">Tên khách hàng</th>
            <th class="nameProduct">Email</th>
            <th class="nameCategory">Nội dung bình luận</th>
            <th class="priceProduct">Ngày bình luận</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($listComment as $index => $value): ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?= $index+1 ?></td>
                    <td><?= $value['user'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['noidung'] ?></td>
                    <td><?= $value['date_create'] ?></td>
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
                        <div class="btn listsp listspbl">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận của <?= $value['user'] ?> không?')" href="index.php?act=xoabl&id=<?= $value['id'] ?>&idPr=<?= $value['id_pr'] ?>"><button class="delete">Xóa</button></a>
                        </div>
                    </td>
                </tr>
        <?php endforeach ?>
        <?php if(sizeof($listComment) == 0): ?>
            <tr>
                <td colspan="8" ><h3 style="padding: 10px 0;">Không tồn tại bình luận cho sản phẩm này</h3></td>   
            </tr>
            
        <?php endif ?>
    </table>
    <div class="btn-list">

    </div>
</div>