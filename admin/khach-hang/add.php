<div class="title">
    <h2>Thêm Tài Khoản</h2>
</div>
<div class="form form-2">
    <form action="index.php?act=addkh" method="POST" enctype="multipart/form-data">
        <div class="columnProduct1">
            <p>Tên khách hàng:</p>
            <input type="text" name="nameAccount" autocomplete="off" value="">
        </div>

        <div class="columnProduct2">
            <p>Email:</p>
            <input type="text" name="emailAccount" autocomplete="off" value="">
        </div>

        <div class="columnProduct3">
            <p>Mật khẩu:</p>
            <input type="text" name="passAccount" autocomplete="off" value="">
        </div>

        <div class="columnProduct4">
            <p>Địa chỉ:</p>
            <input type="text" name="addressAccount" autocomplete="off" value="">
        </div>

        <div class="columnProduct5">
            <p>Vai trò:</p>
            <select name="role" id="">
                <option value="9999" hidden>Vai trò của tài khoản</option>
                <option value="0">Khách hàng</option>
                <option value="1">Quản trị</option>
            </select>
        </div>

        <div class="columnProduct6">
            <p>Số điện thoại:</p>
            <input type="text" name="telephoneAccount" autocomplete="off" value="">
        </div>

        <div class="btn-add">
            <button type="submit" name="btn-add">Thêm Mới</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=dskh">
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