<div class="header listsp">
    <div class="title-small">
        <div class="icon-menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </div>
        <p>Sản phẩm</p>
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
            for($i = 0; $i < sizeof($soLuongSp); $i++){
                $sum++;
            }
        ?>
        <label for="">Số lượng sản phẩm đang có: <span><?= $sum ?></span> </label> <br> <br>
        <input type="text" name="nameFind" value="<?= isset($namePr) ? $namePr : "" ?>" placeholder="Nhập tên sản phẩm muốn tìm">
        <button type="submit" name="btn-findPr" >Tìm kiếm</button>
    </form>

</div>
<div class="table-manager listsp">
    <table border="1">
        <h2>Quản lý sản phẩm</h2>
        <div class="form listsp">
            <select name="" id="" class="selection listsp">
                <option value="" hidden>Tìm Theo</option>
                <option value="">Theo A - Z</option>
                <option value="">Theo Z - A</option>
                <option value="">Số lượng thấp đến cao</option>
            </select>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm không?')" href=""><button class="btn-see accountClient btn-deleteAll" disabled>Xóa tất cả</button></a>
            <button id="Allproduct" style="padding: 11px 10px; border-radius: 5px;" >Chọn tất cả</button>
            <form action="index.php?act=listsp" method="post">
                <select name="iddm" id="" class="selection one">
                    <option value="0" selected >Tất Cả</option>
                    <?php foreach($listdm as $value): ?>
                        <option value="<?= $value['id'] ?>" <?= ($iddm == $value['id'] ) ? "selected" : "" ?>><?= $value['namedm'] ?></option>
                    <?php endforeach ?>
                </select>
                <button type="submit" name="btn-finDm" class="btn-see find">Tìm theo danh mục</button>
            </form>
            <a href="index.php?act=addsp"><button class="btn-see"><i class="fa-solid fa-plus"></i>Thêm mới</button></a>
        </div>
        <div class="btn-list">
            <ul class="menu-list">
                    <!-- Start Pagination -->
                    <?php if(ceil($countPage) <= 1){ $i = ""; ?>
                    <?php }else{ $i = 0; ?>
                            <?php if(isset($_GET['page']) && $_GET['page'] > 2){ $fisrtPage = 1; ?>
                                <li><a href="index.php?act=listsp&page=<?= $fisrtPage ?>">First</a></li>
                            <?php } ?>
                            <?php if(isset($_GET['page']) && $_GET['page'] > 1){ $prevPage = $_GET['page'] - 1; ?>
                                <li><a href="index.php?act=listsp&page=<?= $prevPage ?>">Prev</a></li>
                            <?php } ?>
                            <?php for($i; $i <= $countPage; $i++): ?>
                                <?php if(isset($_GET['page'])): ?>
                                    <?php if($i+1 != $_GET['page']): ?>
                                        <?php if($i+1 > $_GET['page']-2 && $i+1 < $_GET['page']+2): ?>
                                            <li><a href="index.php?act=listsp&page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <li><a style="background-color: #0F172A;" href="index.php?act=listsp&page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php   
                                        if($i+1 == 1){
                                            $backGround = "style=background-color:";
                                            $color = "#0F172A";
                                        }else{
                                            $backGround = "";
                                            $color = "";
                                        } 
                                    ?>
                                    <?php if($i+1 > 1-2 && $i+1 < 1+2): ?>
                                        <li><a <?= $backGround.$color ?> href="index.php?act=listsp&page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endfor ?>
                            <?php if(isset($_GET['page']) && $_GET['page'] < ceil($countPage) - 1){ $nextPage = $_GET['page'] + 1; ?>
                                <li><a href="index.php?act=listsp&page=<?= $nextPage ?>">Next</a></li>
                            <?php } ?>
                            <?php if(isset($_GET['page']) && $_GET['page'] < ceil($countPage) - 2){ $endPage = ceil($countPage); ?>
                                <li><a href="index.php?act=listsp&page=<?= $endPage ?>">Last</a></li>
                            <?php } ?>
                    <?php } ?>
                    <!-- End Pagination -->
            </ul>
        </div>
        <?php if(isset($thongbao)): ?>
            <div class="alert alert-success">
                <?= $thongbao ?>
            </div>
        <?php endif ?>

        <tr>
            <th><input type="checkbox" id="checkBoxAll"></th>
            <th>STT</th>
            <th class="idProduct">Mã sản phẩm</th>
            <th class="nameProduct">Tên sản phẩm</th>
            <th>Ảnh</th>
            <th class="nameCategory">Tên danh mục</th>
            <th class="priceProduct">Giá Ban Đầu</th>
            <th class="priceProduct">Giá Đã Giảm</th>
            <th>Số lượng</th>
            <th>Trạng Thái</th>
            <th class="update-day-sp">Ngày Cập Nhật</th>
            <th>Lượt xem</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach($listsp  as $index => $value): ?>
            <?php
                $imagePath = "../imageProduct/".$value['image'];
                if(is_file($imagePath)){
                    $hinh = "<img src='".$imagePath."' alt='' width='150px' height='150px'>";
                }else{
                    $hinh = "<h3>Không có hình ảnh</h3>";
                }
            ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?= $index+1 ?></td>
                <td>SP00<?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td>
                    <?= $hinh ?>
                </td>
                <td><?= $value['namedm'] ?></td>
                <td>$<?= $value['price'] ?></td>
                <td>$<?= $value['discount'] ?></td>
                <td><?= $value['quantity'] ?></td>
                <td>
                    <?php
                        if($value['status'] == 0){
                            echo "Còn hàng";
                        }else{
                            echo "Hết hàng";
                        }
                    ?>
                    
                </td>
                <td><?= $value['update_day'] ?></td>
                <td><?= $value['view'] ?></td>
                <td>
                    <div class="btn listsp">
                        <a href="index.php?act=suasp&id=<?= $value['id'] ?>"><button class="repair">Sửa</button></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa <?= $value['name'] ?> không?')" href="index.php?act=xoasp&id=<?= $value['id'] ?>"><button class="delete" disabled>Xóa</button></a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <script>
        const chooseInputAll = document.getElementsByTagName('input');
        const btnRemove = document.querySelectorAll('.delete');
        const btnRemoveAll = document.querySelector('.btn-deleteAll');
        const allProduct = document.querySelector('#Allproduct');
        let flag = 0;
        allProduct.addEventListener('click',function(){
            flag++;
            if(flag % 2 != 0){
                for(let i = 1; i < chooseInputAll.length; i++){
                    chooseInputAll[i].checked = true;
                    btnRemoveAll.disabled = false;
                    // btnRemove.disabled = false;
                    for(let j = 0; j < btnRemove.length; j++){
                        if(i-1 == j){
                            btnRemove[j].disabled = false;
                        }
                    }
                } 
            }else{
                for(let i = 1; i < chooseInputAll.length; i++){
                    chooseInputAll[i].checked = false;
                    btnRemoveAll.disabled = true;
                    // btnRemove.disabled = true;
                    for(let j = 0; j < btnRemove.length; j++){
                        btnRemove[j].disabled = true;
                    }
                }
            }
        });
        chooseInputAll[1].addEventListener('change',function(){
            if(chooseInputAll[1].checked == true){
                for(let i = 2; i < chooseInputAll.length; i++){
                    chooseInputAll[i].checked = true;
                    btnRemoveAll.disabled = false;
                    for(let j = 0; j < btnRemove.length; j++){
                        if(i-2 == j){
                            btnRemove[j].disabled = false;
                        }
                    }
                }
            }else{
                for(let i = 2; i < chooseInputAll.length; i++){
                    chooseInputAll[i].checked = false;
                    btnRemoveAll.disabled = true;
                    for(let j = 0; j < btnRemove.length; j++){
                        btnRemove[j].disabled = true;
                    }
                }
            }
        });
       
        for(let i = 2; i < chooseInputAll.length; i++){
            chooseInputAll[i].addEventListener('change',function(){
                if(chooseInputAll[i].checked == true){
                    for(let j = 0; j < btnRemove.length; j++){
                        if(i-2 == j){
                            btnRemove[j].disabled = false;
                        }
                    }
                }else{
                    for(let j = 0; j < btnRemove.length; j++){
                        btnRemove[j].disabled = true;
                    }
                }
            });  
        }
    </script>
</div>