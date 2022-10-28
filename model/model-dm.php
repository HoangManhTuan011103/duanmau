<?php
    // Select all data
    function danhmuc_soluong(){
        $sql = "select * from danh_muc";
        return pdo_query($sql);
    }
    function danhmuc_selectAll(){
        $sql = "select * from danh_muc order by id desc";
        return pdo_query($sql);
    }
    // Insert data
    function danhmuc_insert($ten_loai){
        $sql = "insert into danh_muc(namedm) values('$ten_loai')";
        pdo_execute($sql,$ten_loai);
    }
    // Delete data
    function danhmuc_delete($ma_loai){
        $sql="delete from danh_muc where id=$ma_loai";
        pdo_execute($sql,$ma_loai);
    }
    // Select a data
    function danhmuc_select($ma_loai){
        $sql = "select * from danh_muc where id=$ma_loai";
        return pdo_query_one($sql, $ma_loai);
    }
    //Update data
    function danhmuc_update($ma_loai,$ten_loai){
        $sql = "update danh_muc set namedm='$ten_loai' where id=$ma_loai";
        pdo_execute($sql,$ten_loai,$ma_loai);
    }
?>