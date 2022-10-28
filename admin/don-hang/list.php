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
<div class="find-pr-cat listsp">
    <form action="index.php?act=order" method="post">
        <?php 
            $sum = 0;
            for($i = 0; $i < sizeof($listBill); $i++){
                $sum++;
            }
        ?>
        <label for="">Số lượng đơn hàng đang hiển thị: <span><?= $sum ?></span> </label> <br> <br>
        <input type="text" name="key" placeholder="Nhập mã đơn hàng muốn tìm kiếm">
        <button type="submit" name="btn-key" >Tìm kiếm</button>
    </form>

</div>
<div class="table-manager listsp">
    <table border="1">
        <h2>Quản lý đơn hàng</h2>
        <div class="form listsp listkh">
            <select name="" id="" class="selection listsp">
                <option value="" hidden>Tìm Theo</option>
                <option value="">Theo A - Z</option>
                <option value="">Theo Z - A</option>
                <option value="">Theo mã tài khoản</option>
            </select>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả đơn hàng không?')" href="index.php?act=xoaAllOrder"><button class="btn-see accountClient btn-deleteAll" disabled>Xóa tất cả</button></a>
            <button id="Allproduct" style="padding: 11px 10px; border-radius: 5px;" >Chọn tất cả</button>
        </div>

        <?php if(isset($thongbao)): ?>
            <div class="alert alert-success">
                <?= $thongbao ?>
            </div>
        <?php endif ?>

        <tr>
            <th><input type="checkbox"></th>
            <th>STT</th>
            <th class="idProduct">Mã đơn hàng</th>
            <th class="nameProduct">Khách hàng</th>
            <th >Số lượng</th>
            <th class="priceProduct">Giá trị đơn hàng</th>
            <th class="nameCategory">Ngày đặt hàng</th>
            <th class="priceProduct">Tình trạng</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($listBill as $index => $value): ?>
            <?php
                $statusName = get_status_order($value['bill_status']);
                $countBill = cart_selectAll($value['id']);
                $amount = sizeof($countBill);
                ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?= $index+1 ?></td>
                <td>DH000<?= $value['id'] ?></td>
                <td><?= $value['bill_name'] ?></td>
                <td><?= $amount ?></td>
                <td><?= $value['total'] ?>$</td>
                <td><?= $value['date_create'] ?></td>
                <td><?= $statusName ?></td>
                <td>
                    <div class="btn listsp">
                        <a href="index.php?act=suabl&id=<?= $value['id'] ?>"><button class="repair">Sửa</button></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng DH000<?= $value['id'] ?> không?')" href="index.php?act=xoaOrder&id=<?= $value['id'] ?>"><button class="delete" disabled>Xóa</button></a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <div class="btn-list">

    </div>
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