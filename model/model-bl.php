<?php
  
    // Insert data
    function binhluan_insert($noidung,$id_user,$id_pr){
        $sql = "INSERT INTO `binh_luan`(`noidung`, `id_user`, `id_pr`) VALUES ('$noidung','$id_user','$id_pr')";
        pdo_execute($sql,$noidung,$id_user,$id_pr);
    }
    // Select All data
    function binhluan_selectAll($idPr){
        $sql = "SELECT A.`user`, A.`email`, A.`image`, A.`role`, B.`id` ,B.`noidung`, B.`id_user`, B.`id_pr`, B.`date_create`,C.`name`
        FROM `tai_khoan` A INNER JOIN `binh_luan` B
        ON A.id = B.id_user INNER JOIN `san_pham` C ON B.id_pr = C.id where 1";
        if($idPr > 0){
            $sql .= " AND B.`id_pr`=$idPr";
        }
        $sql .= " order by B.id desc ";
        return pdo_query($sql,$idPr);
    }
    function get_inforBasic($idPr){
        $sql = "select name, image from san_pham where id=$idPr";
        return pdo_query_one($sql);
    }
    function binhluan_delete($ma){
        $sql="delete from binh_luan where id=$ma";
        pdo_execute($sql);
    }
    function binhluan_soluong(){
        $sql = "select * from binh_luan";
        return pdo_query($sql);
    }
    function get_product_comment(){
        $sql = "SELECT A.id, A.name, A.image, B.namedm, COUNT(C.id_pr) FROM `san_pham` A INNER JOIN `danh_muc` B ON A.id_danh_muc = B.id  INNER JOIN `binh_luan` C ON A.id = C.id_pr GROUP BY C.id_pr HAVING COUNT(C.id_pr) > 0";
        return pdo_query($sql);
    }
?>
