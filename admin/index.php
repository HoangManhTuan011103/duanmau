<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: ../index.php");
    }
    include "../model/pdo.php";
    include "../model/model-dm.php";
    include "../model/model-sp.php";
    include "../model/model-tk.php";
    include "../model/model-bl.php";
    include "../model/model-cart.php";
    include "../model/model-thongke.php";
    include "../global.php";
    
    $soLuongSp = sanpham_soluong();
    $soLuongDm = danhmuc_soluong();
    $soLuongKh = taikhoan_soluong();
    $soLuongBl = binhluan_soluong();
    $soLuongBill = bill_soluong();
    // Controler
    $flag = 0;
    if(isset($_GET['actLog'])){
        $flag++;
        $actLog = $_GET['actLog'];
        if($flag == 1){
            switch($actLog){
                case 'logOut':
                    session_destroy();
                    include "../admin/signin.php";
                    break;
                case 'login':
                    if (isset($_POST['btn-lg'])) {
                        $email = $_POST['gmail'];
                        $password = $_POST['password'];
                        $checkUser = taikhoan_select($email, $password);
                        // Cần kiểm tra lại co gì đó sai sai
                        if (is_array($checkUser) && $checkUser['role'] == "1" ) {
                            $_SESSION['user'] = $checkUser;
                            header("location: index.php");
                        } else {
                            $information = "Tài khoản hoặc mật khẩu chưa chính xác";
                        }
                    }
                    include "../admin/signin.php";
                    break;
                // case 'forgetAccount':
                //     if (isset($_POST['btn-forgotPass'])) {
                //         $emailForgort = $_POST['emailForgort'];
                //         $checkEmail = taikhoan_select_one($emailForgort);
                //         if (is_array($checkEmail)) {
                //             $forgotPass = "Mật khẩu của bạn: " . $checkEmail['password'];
                //         } else {
                //             $forgotPass = "Email của bạn không tồn tại";
                //         }
                //     }
                //     include "../admin/signin.php";
                //     break;
                }
                
        }
    }else{
        $flag = 0;
        include "header.php";
    }
   if($flag == 0){
        if(isset($_GET['act'])){
            $act = $_GET['act'];
            switch($act){
                case 'bieudo':
                    $listThongKe = thong_ke();
                    include "thong-ke/bieudo.php";
                    break;
                case 'thongke':
                    $listThongKe = thong_ke();
                    include "thong-ke/list.php";
                    break;
                case 'order':
                    if(isset($_POST['btn-key']) && $_POST['key'] != ""){
                        $key = $_POST['key'];
                    }else{
                        $key = "";
                    }
                    $listBill = orderPlaced_selectAll($key,0);
                    include "don-hang/list.php";
                    break;
                case 'xoaAllOrder':
                    cart_deleteAll();
                    bill_deleteAll();
                    $thongbao = "Xóa tất cả đơn hàng thành công";
                    $listBill = orderPlaced_selectAll("",0);
                    include "don-hang/list.php";
                    break;
                case 'xoaOrder':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        cart_delete($id);
                        bill_delete($id);
                        $thongbao = "Xóa đơn hàng thành công";
                    }
                    if(isset($_POST['btn-key']) && $_POST['key'] != ""){
                        $key = $_POST['key'];
                    }else{
                        $key = "";
                    }
                    $listBill = orderPlaced_selectAll($key,0);
                    include "don-hang/list.php";
                    break;
                case 'dsbl':
                    $listCommentPr = get_product_comment();
                    include "binh-luan/list.php";
                    break;
                case 'viewbl':
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        $id = $_GET['id'];
                        $listComment = binhluan_selectAll($id);
                        $getInforBasic = get_inforBasic($id);
                    }
                    include "binh-luan/list-spbl.php";
                    break;
                case 'xoabl':
                    if(isset($_GET['id']) && isset($_GET['idPr'])){
                        $id = $_GET['id'];
                        binhluan_delete($id);
                        $listComment = binhluan_selectAll($_GET['idPr']);
                        $getInforBasic = get_inforBasic($_GET['idPr']);
                        $thongbao = "Xóa bình luận thành công";
                    }
                    include "binh-luan/list-spbl.php";
                    break;
                //Khách hàng
                case 'xoakh':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        taikhoan_delete($id);
                        $thongbao = "Xóa khách hàng thành công";
                    }
                    $listAccount = taikhoan_soluong();
                    include "khach-hang/list.php";
                    break;
                case 'suakh';
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $detailKh = taikhoan_select_id($id);
                    }
                    include "khach-hang/edit.php";
                    break;
                case 'updatekh':
                    if(isset($_POST['btn-repair-account'])){
                        $id = $_POST['id'];
                        $user = $_POST['nameAccount'];
                        $email = $_POST['emailAccount'];
                        $password = $_POST['passAccount'];
                        $address = $_POST['addressAccount'];
                        $telephone = $_POST['telephoneAccount'];
                        $image = $_POST['avatarAccount'];
                        $role = $_POST['role'];
                        if($_FILES['avatarAccount']['size'] > 0){
                            $image = $_FILES['avatarAccount']['name'];
                        }
                        if($image != ""){
                            move_uploaded_file($_FILES['avatarAccount']['tmp_name'],"../imageProduct/".$image);
                        }
                        taikhoan_update_admin($id,$user,$email,$password,$address,$telephone,$image,$role);
                        $thongbao = "Cập nhật thông tin thành công";
                    }
                    $listAccount = taikhoan_soluong();
                    include "khach-hang/list.php";
                    break;
                case 'dskh':
                    $listAccount = taikhoan_soluong();
                    include "khach-hang/list.php";
                    break;
                case 'addkh':
                    if(isset($_POST['btn-add'])){
                        $user = $_POST['nameAccount'];
                        $email = $_POST['emailAccount'];
                        $password = $_POST['passAccount'];
                        $address = $_POST['addressAccount'];
                        $telephone = $_POST['telephoneAccount'];
                        $role = $_POST['role'];
                        taikhoan_insert_admin($user,$email,$password,$address,$telephone,$role);
                        $thongbao = "Thêm tài khoản mới thành công";
                    }
                    include "khach-hang/add.php";
                    break;
                case 'listsp':
                    if(isset($_POST['btn-findPr'])){
                        $namePr = $_POST['nameFind'];
                    }else{
                        $namePr = '';
                    }
                    if(isset($_POST['btn-finDm'])){
                        $iddm = $_POST['iddm'];
                    }else{
                        $iddm = '';
                    }
                    $sqlClone = "select * from san_pham";
                    $sqlAll = pdo_query($sqlClone);
                    
                    // Important
                    // if(isset($_SESSION['filter'])){
                    //     $_SESSION['filter'] = sanpham_selectAll($iddm,$namePr,$rowsAdmin);
                    // }else{
                    $listsp  = sanpham_selectAll($iddm,$namePr,$rowsAdmin);
                    // }
                    // $listsp = $_SESSION['filter'];
                    // $listsp = sanpham_selectAll($iddm,$namePr,$rowsAdmin);
                    // $listsp = sanpham_selectAll($iddm,$namePr,$rowsAdmin);
                    $countPage = get_Page_Product_admin($iddm,$namePr,$rowsAdmin);
                    // Important
                    // if(isset($_GET['page']) &&  $_GET['page'] > 0 && $_GET['page'] <= $countPage+1 ){
                    //     $page = $_GET['page'];
                    // }else{
                    //     $page = '1';
                    // }
                    $soLuongSp = sanpham_soluong();
                    $listdm = danhmuc_selectAll();
                    include "san-pham/list.php";
                    break;
                case 'addsp':
                    if(isset($_POST['btn-add'])){
                        $tenSp = $_POST['nameProduct'];
                        $soluongSp = $_POST['amountProduct'];
                        $giaSp = $_POST['priceProduct'];
                        $giaDaGiam = $_POST['discountProduct'];
                        $danhmucSp = $_POST['catProduct'];
                        $statusSp = $_POST['statusProduct'];
                        $imageSp = $_FILES['imageProduct']['name'];
                        $describeSp = $_POST['description'];
                        move_uploaded_file($_FILES['imageProduct']['tmp_name'],"../imageProduct/".$imageSp );
                        sanpham_insert($tenSp,$soluongSp,$giaSp,$imageSp,$describeSp,$giaDaGiam,$statusSp,$danhmucSp);
                        $thongbao = "Thêm sản phẩm thành công";
                    }
                    $listdm = danhmuc_selectAll();
                    include "san-pham/add.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        sanpham_delete($id);
                        $thongbao = "Xóa sản phẩm thành công";
                    }
                    $listsp = sanpham_selectAll(0,"",$rowsAdmin);
                    include "san-pham/list.php";
                    break;
                case 'suasp';
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $detailSp = sanpham_select($id);
                        $listdm = danhmuc_selectAll();
                    }
                    include "san-pham/edit.php";
                    break;
                case 'updatesp';
                    if(isset($_POST['btn-edit-sp'])){
                        $tenSp = $_POST['nameProduct'];
                        $soluongSp = $_POST['amountProduct'];
                        $giaSp = $_POST['priceProduct'];
                        $giaDaGiam = $_POST['discountProduct'];
                        $danhmucSp = $_POST['catProduct'];
                        $statusSp = $_POST['statusProduct'];
                        $imageSp = $_POST['imageProduct'];
                        $describeSp = $_POST['description'];
                        $id = $_POST['id'];
                        if($_FILES['imageProduct']['size'] > 0){
                            $imageSp = $_FILES['imageProduct']['name'];
                        }
                        move_uploaded_file($_FILES['imageProduct']['tmp_name'],"../imageProduct/".$imageSp );
                        sanpham_update($id,$tenSp,$soluongSp,$giaSp,$imageSp,$describeSp,$giaDaGiam,$statusSp,$danhmucSp);
                        $thongbao = "Cập nhật sản phẩm thành công";
                    }
                    $listdm = danhmuc_selectAll();
                    $listsp = sanpham_selectAll(0,"",$rowsAdmin);
                    include "san-pham/list.php";
                    break;
                // Sản phẩm
                // Danh mục 
                case 'adddm':
                    if(isset($_POST['btn-add'])){
                        $tenLoai = $_POST['tenloai'];
                        danhmuc_insert($tenLoai);
                        $thongbao = "Thêm danh mục thành công";
                    }
                    include "danh-muc/add.php";
                    break;
                case 'listdm':
                    $listdm = danhmuc_selectAll();
                    include "danh-muc/list.php";
                    break;
                case 'xoadm':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        danhmuc_delete($id);
                        $thongbao = "Xóa danh mục thành công";
                    }
                    $listdm = danhmuc_selectAll();
                    include "danh-muc/list.php";
                    break;
                case 'suadm';
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $detailDm = danhmuc_select($id);
                    }
                    include "danh-muc/edit.php";
                    break;
                case 'updatedm';
                    if(isset($_POST['btn-edit'])){
                        $tenLoai = $_POST['tenloai'];
                        $id = $_POST['id'];
                        danhmuc_update($id, $tenLoai);
                        $thongbao = "Cập nhật danh mục thành công";
                    }
                    $listdm = danhmuc_selectAll();
                    include "danh-muc/list.php";
                    break;
                // Danh mục 
                default:
                    include "home.php";
                    break;
            }
        }else{
            include "home.php";
        }
   }
?>