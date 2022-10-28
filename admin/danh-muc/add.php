<div class="title addDm">
    <h2>Thêm Mới Danh Mục</h2>
</div>
<div class="form form3">

    <form action="index.php?act=adddm" method="POST">

        <p>Mã danh mục</p>
        <input type="text" name="maloai" value="" disabled>


        <p>Tên danh mục:</p>
        <input type="text" name="tenloai" autocomplete="off" value="">


        <div class="btn-add">
            <button type="submit" name="btn-add">Thêm Mới</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=listdm">
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
</div>