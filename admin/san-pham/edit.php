<?php
    if(is_array($detailSp)){
        extract($detailSp);
       
    }
    $imagePath = "../imageProduct/".$image;
    if(is_file($imagePath)){
        $hinh = "<img src='".$imagePath."' alt='' width='150px' height='150px'>";
    }else{
        $hinh = "<h3>Không có hình ảnh</h3>";
    }
?>
<div class="title">
    <h2>Cập nhật Sản Phẩm</h2>
</div>
<div class="form form-2">
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $id ?>">


        <div class="columnProduct1">
            <p>Tên sản phẩm:</p>
            <input type="text" name="nameProduct" autocomplete="off" value="<?= $name ?>">
        </div>
      
        <div class="columnProduct2">
            <p>Số lượng sản phẩm:</p>
            <input type="number" name="amountProduct" autocomplete="off" value="<?= $quantity ?>">
        </div>

        <div class="columnProduct3">
            <p>Giá sản phẩm:</p>
            <input type="text" name="priceProduct" autocomplete="off" value="<?= $price ?>">
        </div>

        <div class="columnProduct4">
            <p>Giá đã giảm:</p>
            <input type="text" name="discountProduct" autocomplete="off" value="<?= $discount ?>">
        </div>

        <div class="columnProduct5">
            <p>Danh mục sản phẩm:</p>
            <select name="catProduct" id="">
                <option value="0" hidden>Chọn danh mục của sản phẩm</option>
                <?php foreach($listdm as $value): ?>
                  
                    <option value="<?= $value['id'] ?>" <?= $value['id'] == $id_danh_muc ? "selected" : "" ?> ><?= $value['namedm'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="columnProduct6">
            <p>Trạng thái sản phẩm:</p>
            <!-- <input type="text" name="statusProduct" autocomplete="off" value=""> -->
            <select name="statusProduct" id="">
                <option value="89" hidden>Chọn trạng thái sản phẩm</option>
                <option value="0" <?= $status==0 ? "selected" : "" ?> >Còn hàng</option>
                <option value="1" <?= $status==1 ? "selected" : "" ?>  >Hết hàng</option>
            </select>
        </div>
        
        <div class="columnProduct7">
            <p>Ảnh sản phẩm:</p>
            <div class="input-image">
                <input type="file" name="imageProduct">
                <input type="hidden" name="imageProduct" value="<?= $image ?>">
                <div class="img-update">
                    <?= $hinh ?>
                </div>
            </div>
        </div>

        <div class="columnProduct8">
            <p>Mô tả sản phẩm:</p>
            <textarea name="description" id="" cols="55" rows="7"><?= $describe ?></textarea>
        </div>

        <div class="btn-add">
            <button type="submit" name="btn-edit-sp">Cập nhật</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=listsp">
                <input class="btn-hight" type="button" value="Danh sách">
            </a>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
    </form>
</div>