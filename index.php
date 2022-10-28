<?php
session_start();
include "./model/pdo.php";
include "./model/model-sp.php";
include "./model/model-dm.php";
include "./model/model-tk.php";
include "./model/model-cart.php";
include "./model/model-bl.php";
include "./global.php";
// date_default_timezone_set("Asia/Ho_Chi_Minh");

if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = [];
}
$productTop = sanpham_select_top10();
$productNew = sanpham_selectAll_home($rows);
$productBanner = sanpham_select_topBanner();
$categories = danhmuc_selectAll();
$countPage = get_Page_Product($rows);
$flag = 0;
if (isset($_GET['actlogin'])) {
    $flag++;
    include "./view/taikhoan/header.php";
    $actlogin = $_GET['actlogin'];
    if ($flag == 1) {
        switch ($actlogin) {
            case 'dangnhap':
                if (isset($_POST['btn-login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $checkUser = taikhoan_select($email, $password);
                    // Cần kiểm tra lại co gì đó sai sai
                    if (is_array($checkUser)) {
                        $_SESSION['user'] = $checkUser;
                        // $information = "Bạn đã đăng nhập thành công";
                        header("location: index.php");
                    } else {
                        $information = "Account or password incorrect";
                    }
                }
                include "./view/taikhoan/home.php";
                break;
            case 'dangky':
                if (isset($_POST['btn-signup'])) {
                    $email = $_POST['email'];
                    $checkMail = taikhoan_select_validate($email);
                    
                    $user = $_POST['fullName'];
                    $password = $_POST['pass'];
                    $rePassword = $_POST['repass'];
                    $errors = [];
                    if($email == ""){
                        $errors['email'] = "You must enter your email";
                    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = "Email format is wrong";
                    }
                    if(is_array($checkMail)){
                        $errors['email'] = "Email already exists";
                    }
                    if($user == ""){
                        $errors['user'] = "You must enter a name";
                    }else if(strlen($user) < 3){
                        $errors['user'] = "Name must be more than 3 characters";
                    }
                    if($password == ""){
                        $errors['pass'] = "You must enter a password";
                    }else if(strlen($password) < 6){
                        $errors['pass'] = "Password must be more than 6 characters";
                    }
                    if($rePassword != $password){
                        $errors['rePassword'] = "Password does not match";
                    }
                    if(!$errors){
                        taikhoan_insert($user, $email, $password);
                        echo "<script>
                                window.location.href='index.php?actlogin=dangnhap';
                                alert ('Congratulations on your successful registration')
                            </script>";
                    }
                }
                include "./view/taikhoan/signup.php";
                break;
            case 'forgetAcount':
                if (isset($_POST['btn-forgot'])) {
                    $email = $_POST['email'];
                    $checkEmail = taikhoan_select_one($email);
                    if (is_array($checkEmail)) {
                        $forgotPass = "Your password is: " . $checkEmail['password'];
                    } else {
                        $forgotPass = "Your email does not exist";
                    }
                }
                include "./view/taikhoan/forgetPass.php";
                break;
            case 'changePass':
                if (isset($_POST['btn-forgot'])) {
                    $passAccount = $_SESSION['user']['password'];
                    // $emailAccount = $_SESSION['user']['email'];
                    // $checkPass = taikhoan_select_validate_pass($emailAccount);
                    $pass = $_POST['pass'];
                    $newPass = $_POST['newPass'];
                    $reNewPass = $_POST['reNewPass'];
                    $errors = [];
                    if($pass == ""){
                        $errors['pass'] = "You need to enter a password";
                    }else if($pass != $passAccount){
                        $errors['pass'] = "Your password is incorrect";
                    }

                    if($newPass == ""){
                        $errors['newPass'] = "You need to enter a new password";
                    }else if(strlen($newPass) < 6){
                        $errors['newPass'] = "Password must be more than 6 characters";
                    }

                    if($reNewPass != $newPass){
                        $errors['reNewPass'] = "New password not match";
                    }
                    if(!$errors){
                        update_pass($_SESSION['user']['id'],$newPass);
                        echo " <script>
                            alert('You have successfully changed your password');
                            window.location.href='index.php?actlogin=changePass';
                        </script> ";
                    }
                }
                include "./view/taikhoan/changePass.php";
                break;
            default:
                include "./view/home.php";
                break;
        }
    }
} else {
    $flag = 0;
    include "./view/header.php";
}
if ($flag == 0) {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'spct':
                if (isset($_GET['idsp'])) {
                    $id = $_GET['idsp'];
                    luotxem_update($id);
                    $product = sanpham_select($id);
                    $iddm = $product['id_danh_muc'];
                    $productRelated = sanpham_select_cung_loai($iddm, $id);
                } else {
                    include "./view/home.php";
                }
                include "./view/detail.php";
                break;
            case 'deleteComment':
                if(isset($_GET['id']) && isset($_GET['idDetail'])){
                    $id = $_GET['idDetail'];
                    $product = sanpham_select($id);
                    binhluan_delete($_GET['id']);
                    $dsbl = binhluan_selectAll($_GET['idDetail']);
                    $iddm = $product['id_danh_muc'];
                    $productRelated = sanpham_select_cung_loai($iddm, $id);
                }
                include "./view/detail.php";
                break;
            case 'sp':
                if (isset($_POST['btn-searchSp'])) {
                    $errors = [];
                    $keyName = $_POST['keyName'];
                    if($keyName == ""){
                        $errors['keyName'] = "You have not entered your search information";
                        echo " <script> 
                                    alert('".$errors['keyName']."')
                                    window.location.href='index.php'
                                </script>";
                        
                    }
                    if(!$errors){
                        $keyName = $_POST['keyName'];
                    }
                } else {
                    $keyName = "";
                }

                if (isset($_GET['iddm'])) {
                    $iddm = $_GET['iddm'];
                } else {
                    $iddm = 0;
                }
                $spFollowId = sanpham_selectAll($iddm, $keyName,8);
                $namedm = danhmuc_select_sp($iddm);
                include "./view/product.php";
                break;
            case 'updateAccount':
                if (isset($_POST['btn-edit-account'])) {
                    $id = $_POST['id'];
                    $user = $_POST['nameAccount'];
                    $email = $_POST['emailAccount'];
                    $password = $_POST['passAccount'];
                    $address = $_POST['addressAccount'];
                    $telephone = $_POST['telephoneAccount'];
                    $image = $_POST['avatarAccount'];
                    if ($_FILES['avatarAccount']['size'] > 0) {
                        $image = $_FILES['avatarAccount']['name'];
                        // move_uploaded_file($_FILES['avatarAccount']['tmp_name'], "./imimageProduct/" . $image);
                    }
                    if ($image != "") {
                        move_uploaded_file($_FILES['avatarAccount']['tmp_name'], "./imageProduct/" . $image);
                    }
                    taikhoan_update($id, $user, $email, $address, $telephone, $image);
                    $_SESSION['user'] = taikhoan_select($email, $password);
                    echo "<script>window.location.href='index.php?act=updateAccount';
                                alert ('Successfully updated');
                        </script>";
                    // $thongbao = "alert ('Cập nhật thông tin thành công')";
                }
                include "./view/editAcount.php";
                break;
            case 'logOut':
                session_destroy();
                // Có thể thay thế header(location: index.php) bắng
                // câu lệnh javascript cơ bản trong BOM với window.location.href
                echo "<script>window.location.href='index.php';</script>";
                break;
            case 'devices':
                $productFollowCat = sanpham_selectAll_devices();

                $productFollowPhone= sanpham_selectAll_page_phone($rowDevices);
                $productFollowWacth= sanpham_selectAll_page_watch($rowDevices);
                $productFollowAccessory = sanpham_selectAll_page_accessory($rowDevices);

                $countPagePhone = get_Page_Product_Devices_phone($rowDevices);
                $countPageWatch = get_Page_Product_Devices_watch($rowDevices);
                $countPageAccessory = get_Page_Product_Devices_accessory($rowDevices);
                include "./view/devices.php";
                break;
            case 'payment':
                include "./view/payment.php";
                break;
            case 'guarantee':
                include "./view/guarantee.php";
                break;
            case 'about':
                include "./view/about.php";
                break;
            // Giỏ hàng
            // Fix bug in index.php
            case 'cart':
                if (isset($_SESSION['user'])) {
                    include "./view/cart/cart.php";
                }else{
                    // $stringWebsite = $_GET['act'];
                    if(isset($_POST['valueCurrent']) && $_POST['valueCurrent'] == 1){
                        echo "<script>
                        let correct = 'You must be logged in to perform the shopping cart function';
                        if (confirm(correct) == true) {
                            window.location.href = 'index.php?actlogin=dangnhap';
                        }else{
                            window.location.href = 'index.php';
                        }
                        </script>";
                    }else{
                        echo "<script>
                            window.location.href = 'index.php';
                        </script>";
                    }
                }
                break;
            case 'addToCart':
                if (isset($_SESSION['user'])) {
                    if (isset($_POST['btn-addCart']) ) {
                        $id = $_POST['id'];
                        $image = $_POST['image'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $amount = $_POST['amount'];
                        $totalMoney = $price * $amount;
                        $cartEmty = [$id, $image, $name, $price, $amount,$totalMoney];
                        array_push($_SESSION['myCart'], $cartEmty);
                        echo "<script>window.location.href='index.php?act=cart';</script>";
                    }
                    include "./view/cart/cart.php";
                }else{
                    echo "<script>
                                let correct = 'You must be logged in to add products';
                                if (confirm(correct) == true) {
                                    window.location.href = 'index.php?actlogin=dangnhap';
                                }else{
                                    window.location.href = 'index.php';
                                }
                        </script>";
                }
                break;
            case 'deleteCart':
                if(isset($_GET['idPrCart'])){
                    $count = $_GET['idPrCart'];
                    array_splice($_SESSION['myCart'],$count,1);
                }else{
                    $_SESSION['myCart'] = [];
                }
                echo "<script>
                        window.location.href = 'index.php?act=cart';
                    </script>";
                break;
            case 'billOrder':
                // Create Bill
                if(isset($_POST['btn-agreeOrder'])){
                    $idUser = $_SESSION['user']['id'];
                    $userOrder = $_POST['userOrder'];
                    $addessOrder = $_POST['addessOrder'];
                    $emailOrder = $_POST['emailOrder'];
                    $telephoneOrder = $_POST['telephoneOrder'];
                    $money = $_POST['money'];
                    $totalOrder =  totalOrder();
                    $idOrder = bill_insert($idUser,$userOrder,$addessOrder,$telephoneOrder,$emailOrder,$money,$totalOrder);

                    // Insert into cart with Session['myCart] and $idOrder
                    foreach($_SESSION['myCart'] as $value){
                        cart_insert($_SESSION['user']['id'],$value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$idOrder);
                    }
                    $_SESSION['myCart'] = [];

                }
                $bill = bill_selectAll($idOrder);
                $billDetail = cart_selectAll($idOrder);
                include "./view/cart/orderCart.php";
                break;
            // Giỏ hàng
            case 'orderPlaced';
                $listorderPlaced = orderPlaced_selectAll("",$_SESSION['user']['id']);
                include "./view/cart/orderPlaced.php";
                break;
            default:
                include "./view/home.php";
                break;
        }
    } else {
        include "./view/home.php";
    }
    include "./view/footer.php";
}
?>