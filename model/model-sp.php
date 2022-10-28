<?php
    // Select all data
    function sanpham_soluong(){
        $sql = "select * from san_pham";
        return pdo_query($sql);
    }
    function get_Page_Product($rows){
        // $rows = 12;
        $sql = "select * from san_pham where 1 order by id desc";
        $numberPage = pdo_query($sql);
        $countPage = sizeof($numberPage) / $rows;
        return $countPage;
    }
  
    function sanpham_selectAll_home($rows){
        // $rows = 12;
        $countPage = get_Page_Product($rows);
        if(isset($_GET['page']) &&  $_GET['page'] > 0 && $_GET['page'] <= $countPage+1 ){
            $page = $_GET['page'];
        }else{
            $page = '1';
        }
        $from = ($page - 1) * $rows;
        $sql = "select * from san_pham where 1 order by id desc limit $from,$rows ";
        return pdo_query($sql);
    }
    function get_Page_Product_admin($iddm,$namePr,$rowsAdmin){
        // $rows = 5;
        $sql = "select A.*, B.namedm from san_pham A inner join danh_muc B on A.id_danh_muc = B.id where 1 ";
        if($iddm > 0 ){
            $sql .= " and id_danh_muc = $iddm";
        }
        if($namePr != ""){
            $sql .= " and name like '%$namePr%'";
        }
        $sql .= " order by A.id desc";
        $numberPage = pdo_query($sql);
        $countPage = sizeof($numberPage) / $rowsAdmin;
        return $countPage;
    }
    function sanpham_selectAll($iddm,$namePr,$rowsAdmin){
        $countPage = get_Page_Product_admin($iddm,$namePr,$rowsAdmin);
        if(isset($_GET['page']) &&  $_GET['page'] > 0 && $_GET['page'] <= $countPage+1 ){
            $page = $_GET['page'];
        }else{
            $page = '1';
        }
        $from = ($page - 1) * $rowsAdmin;
        $sql = "select A.*, B.namedm from san_pham A inner join danh_muc B on A.id_danh_muc = B.id where 1 ";
        if($iddm > 0 ){
            $sql .= " and id_danh_muc = $iddm";
        }
        if($namePr != ""){
            $sql .= " and name like '%$namePr%'";
        }
        $sql .= " order by A.id desc limit $from,$rowsAdmin";
        return pdo_query($sql);
    }


    function danhmuc_select_sp($ma_loai){
        if($ma_loai > 0){
            $sql = "select * from danh_muc where id=$ma_loai";
            $dm = pdo_query_one($sql, $ma_loai);
            extract($dm);
            return $namedm;
        }else{
            return "";
        }
    }
  
    
    function sanpham_select_top10(){
        $sql = "select * from san_pham where 1 order by view desc limit 0,8";
        return pdo_query($sql);
    }
    function sanpham_select_topBanner(){
        $sql = "select * from san_pham where 1 order by view desc limit 0,4";
        return pdo_query($sql);
    }
    // Insert data
    function sanpham_insert($ten,$soluong,$gia,$anh,$mota,$giamgia,$trangthai,$danhmuc){
        $sql = "INSERT INTO `san_pham`(`name`,`quantity`,`price`, `image`,`describe`,`discount`,`status`,`id_danh_muc`) VALUES ('$ten',$soluong,$gia,'$anh','$mota',$giamgia,$trangthai,$danhmuc)";
        pdo_execute($sql,$soluong,$gia,$anh,$mota,$giamgia,$trangthai,$danhmuc);
    }
    // Delete data
    function sanpham_delete($ma){
        $sql="delete from san_pham where id=$ma";
        pdo_execute($sql,$ma);
    }
    // Select a data
    function sanpham_select($ma){
        $sql = "select * from san_pham where id=$ma";
        return pdo_query_one($sql, $ma);
    }
    function sanpham_select_cung_loai($ma,$iddm){
        $sql = "select * from san_pham where id_danh_muc=$ma and id <> $iddm";
        return pdo_query($sql);
    }
    //Update data
    function sanpham_update($id,$tenSp,$soluongSp,$giaSp,$imageSp,$describeSp,$giaDaGiam,$statusSp,$danhmucSp){
        $sql = "UPDATE `san_pham` SET `name`='$tenSp',`quantity`='$soluongSp',`price`='$giaSp',`image`='$imageSp',`describe`='$describeSp',`discount`='$giaDaGiam',`status`='$statusSp',`id_danh_muc`='$danhmucSp' where id=$id";
        pdo_execute($sql,$tenSp,$soluongSp,$giaSp,$imageSp,$describeSp,$giaDaGiam,$statusSp,$danhmucSp,$id);
    }
    function luotxem_update($id){
        $sql = "UPDATE `san_pham` SET `view`=`view`+1 where id=$id";
        pdo_execute($sql,$id);
    }
    // 
    function sanpham_selectAll_devices(){
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where 1 order by id desc";
        return pdo_query($sql);
    }
    function get_Page_Product_Devices_phone($rows){
        // $rows = 12;
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where id_danh_muc = 14 order by id desc";
        $numberPage = pdo_query($sql);
        $countPageDevices = sizeof($numberPage) / $rows;
        return $countPageDevices;
    }
    function get_Page_Product_Devices_watch($rows){
        // $rows = 12;
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where id_danh_muc = 23 order by id desc";
        $numberPage = pdo_query($sql);
        $countPageDevices = sizeof($numberPage) / $rows;
        return $countPageDevices;
    }
    function get_Page_Product_Devices_accessory($rows){
        // $rows = 12;
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where id_danh_muc = 16 order by id desc";
        $numberPage = pdo_query($sql);
        $countPageDevices = sizeof($numberPage) / $rows;
        return $countPageDevices;
    }
    function sanpham_selectAll_page_phone($rows){
        $countPage = get_Page_Product_Devices_phone($rows);
        if(isset($_GET['pagePhone']) &&  $_GET['pagePhone'] > 0 && $_GET['pagePhone'] <= $countPage+1 ){
            $page = $_GET['pagePhone'];
        }else{
            $page = '1';
        }
        $from = ($page - 1) * $rows;
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where id_danh_muc = 14 order by id desc limit $from,$rows ";
        return pdo_query($sql);
    }
    function sanpham_selectAll_page_watch($rows){
        $countPage = get_Page_Product_Devices_watch($rows);
        if(isset($_GET['pageWatch']) &&  $_GET['pageWatch'] > 0 && $_GET['pageWatch'] <= $countPage+1 ){
            $page = $_GET['pageWatch'];
        }else{
            $page = '1';
        }
        $from = ($page - 1) * $rows;
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where id_danh_muc = 23 order by id desc limit $from,$rows ";
        return pdo_query($sql);
    }
    function sanpham_selectAll_page_accessory($rows){
        $countPage = get_Page_Product_Devices_accessory($rows);
        if(isset($_GET['pageAccessory']) &&  $_GET['pageAccessory'] > 0 && $_GET['pageAccessory'] <= $countPage+1 ){
            $page = $_GET['pageAccessory'];
        }else{
            $page = '1';
        }
        $from = ($page - 1) * $rows;
        $sql = "select A.*, B.`namedm` from `san_pham` A INNER JOIN `danh_muc` B ON A.`id_danh_muc`=B.`id` where id_danh_muc = 16 order by id desc limit $from,$rows ";
        return pdo_query($sql);
    }
?>