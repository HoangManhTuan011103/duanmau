<div class="title">
    <h2>Thêm Mới Sản Phẩm</h2>
</div>
<div class="form form-2">
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
        <div class="columnProduct1">
            <p>Tên sản phẩm:</p>
            <input type="text" name="nameProduct" autocomplete="off" value="">
        </div>
      
        <div class="columnProduct2">
            <p>Số lượng sản phẩm:</p>
            <input type="number" name="amountProduct" autocomplete="off" value="">
        </div>

        <div class="columnProduct3">
            <p>Giá sản phẩm:</p>
            <input type="text" name="priceProduct" autocomplete="off" value="">
        </div>

        <div class="columnProduct4">
            <p>Giá đã giảm:</p>
            <input type="text" name="discountProduct" autocomplete="off" value="">
        </div>

        <div class="columnProduct5">
            <p>Danh mục sản phẩm:</p>
            <select name="catProduct" id="">
                <option value="0" hidden>Chọn danh mục của sản phẩm</option>
                <?php foreach($listdm as $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value['namedm'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="columnProduct6">
            <p>Trạng thái sản phẩm:</p>
            <!-- <input type="text" name="statusProduct" autocomplete="off" value=""> -->
            <select name="statusProduct" id="">
                <option value="89" hidden>Chọn trạng thái sản phẩm</option>
                <option value="0">Còn hàng</option>
                <option value="1">Hết hàng</option>
            </select>
        </div>
        
        <div class="columnProduct7">
            <p>Ảnh sản phẩm:</p>
            <div class="input-image">
                <input type="file" name="imageProduct">
            </div>
        </div>

        <div class="columnProduct8">
            <p>Mô tả sản phẩm:</p>
            <textarea name="description" id="" cols="55" rows="7"></textarea>
        </div>

        <div class="btn-add">
            <button type="submit" name="btn-add">Thêm Mới</button>
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