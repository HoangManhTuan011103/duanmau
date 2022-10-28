<?php
    if(is_array($detailDm)){
        extract($detailDm);
    }
    // foreach ($detailDm as $value){
    //     if($_GET['id'] != $id){
    //         $errorId = "Không tồn tại mã danh mục cần tìm!";
    //     }else{
    //         return $id;
    //     }
    //     return $errorId;
    // }
?>

   <div class="title">
        <h2>Cập Nhật Danh Mục</h2>
   </div>
    <div class="form">
  
        <form action="index.php?act=updatedm" method="POST">

            <p>Mã danh mục</p>
            <input type="text" name="maloai" value="<?= $id ?>" disabled>


            <p>Tên danh mục:</p>
            <input type="text" name="tenloai" autocomplete="off" value="<?=(isset($namedm) && $namedm != "") ? $namedm : "Không tồn tại danh mục có mã là: $id" ?>">
           

            <div class="btn-add">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" name="btn-edit">Cập nhật</button>
                <input class="btn-hight" type="reset" value="Nhập Lại">
                <a href="index.php?act=listdm">  
                    <input class="btn-hight" type="button" value="Danh sách">
                </a>
            </div>

            
            <?php
            if(isset($thongbao) && $thongbao != ""){
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>