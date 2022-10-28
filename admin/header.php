<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../content/css/style-admin.css">
    <link rel="stylesheet" href="../content/css/home-admin.css">
    <link rel="stylesheet" href="../content/css/product-admin.css">
    <link rel="stylesheet" href="../content/css/category-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>header</title>
    <style>
        input.btn-hight {
            outline: none !important;
            padding: 10px 20px !important;
            background-color: #269977;
            border: 1px solid #269977;
            color: #FFFFF6;
            border-radius: 5px;
            width: 102.73px !important;
            font-weight: bold;
            cursor: pointer;
        }

        .form {
            display: flex;
            justify-content: center;
        }
        .form select{
            outline: none;
            padding: 5px 0 5px 10px;
            width: 415px;
            margin-bottom: -20px;
        }

        textarea{
            outline: none;
            padding-left: 10px;
            padding-top: 5px;
        }
        .title {
            text-align: center;
            margin-left: 300px;
            padding: 50px 0 25px 0;
        }
        .form3{
            margin-left: 250px;

        }
        .title.addDm{
            margin-left: 260px;
        }
        .title a {
            text-align: center;
            color: blue;
            font-weight: bold;
        }

        .form input {
            outline: none;
            padding: 5px 0 5px 10px;
            width: 400px;
            margin-bottom: -20px;
        }
        .form-2 form {
            display: grid;
            column-gap: 40px;
            margin-left: 300px;
            grid-template-areas: "columnProduct columnProduct"
            "columnProduct1 columnProduct2"
            "columnProduct3 columnProduct4"
            "columnProduct5 columnProduct6"
            "columnProduct7 columnProduct7"
            "columnProduct8 columnProduct8"
            "btn-add btn-add";
        }
        .columnProduct1{
            grid-area: columnProduct1;
        }
        .columnProduct2{
            grid-area: columnProduct2;
        }
        .columnProduct3{
            grid-area: columnProduct3;
        }
        .columnProduct4{
            grid-area: columnProduct4;
        }
        .columnProduct5{
            grid-area: columnProduct5;
        }
        .columnProduct6{
            grid-area: columnProduct6;
        }
        .columnProduct6>select{
            width: 400px;
        }
        .columnProduct7{
            grid-area: columnProduct7;
        }
        .columnProduct8{
            grid-area: columnProduct8;
        }
        .columnProduct8 textarea{
            width: 100%;
        }
        .columnProduct input{
            width: 100%;

        }
        div.btn-add{
            grid-area: btn-add;
        }
        .form p {
            font-size: 15px;
            font-weight: bold;
            margin: 13px 0;
        }
        .input-image{
            width: 100%;
            border: 1px solid #000000;
            padding: 15px 0 20px 0;
        }
        .img-update img{
            display: block;
            margin: 15px 0 0 10px;
        }
        .input-image input{
            width: 100%;
        }
        .form .columnProduct5 select{
            width: 100%;
        }

        .form h5 {
            margin: 8px 0 0 0;
            padding: 0;
        }

        .btn-add {
            padding-top: 20px;
            text-align: center;
        }

        .btn-add button {
            outline: none;
            padding: 10px 20px;
            background-color: #269977;
            border: 1px solid #269977;
            color: #FFFFF6;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Start navigation left -->
        <nav class="navigation-column">
            <!-- Logo and title -->
            <div class="title-page-admin">
                <div class="logo-page-admin">
                    <a href="../index.php"><i class="fa-brands fa-page4"></i></a>
                </div>
                <div class="text-page-admin">
                    <a href="../index.php"><img src="../content/image/logo-white-footer.png" alt=""></a>
                </div>
            </div>
            <!-- Logo and title -->
            <!-- Navigation First -->
            <div class="list-main-first">
                <div class="title-list">
                    <h2>Buy & Manager</h2>
                </div>
                <nav class="navigation-list-fisrt">
                    <ul>
                        <li><a href="index.php"><i class="fa-solid fa-house"></i>Trang chủ</a></li>
                        <li><a href="index.php?act=addsp"><i class="fa-brands fa-product-hunt"></i>Sản phẩm</a></li>
                        <li><a href="index.php?act=adddm"><i class="fa-solid fa-book-atlas"></i>Danh Mục</a></li>
                        <li><a href="index.php?act=dsbl"><i class="fa-solid fa-calendar-days"></i>Bình Luận</a></li>
                        <li><a href="index.php?act=dskh"><i class="fa-solid fa-user"></i>Danh sách người dùng</a></li>
                        <li><a href="index.php?act=thongke"><i class="fa-solid fa-database"></i>Thống kê hệ thống</a></li>
                        <li><a href="index.php?act=order"><i class="fa-solid fa-clock-rotate-left"></i>Danh sách đơn hàng</a></li>
                        <li><a onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" href="index.php?actLog=logOut"><i class="fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Navigation First -->
        </nav>