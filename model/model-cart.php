<?php
function bill_delete($ma)
{
    $sql = "delete from bill where id=$ma";
    pdo_execute($sql, $ma);
}
function cart_delete($ma)
{
    $sql = "delete from cart where id_bill=$ma";
    pdo_execute($sql, $ma);
}
function cart_deleteAll()
{
    $sql = "delete from cart";
    pdo_execute($sql);
}
function bill_deleteAll()
{
    $sql = "delete from bill";
    pdo_execute($sql);
}
function totalOrder()
{
    $sum = 0;
    foreach ($_SESSION['myCart'] as $value) {
        $totalAnPr = $value[3] * $value[4];
        $sum += $totalAnPr;
    }
    return $sum;
}
function bill_insert($idUser, $userOrder, $addessOrder, $telephoneOrder, $emailOrder, $money, $totalOrder)
{
    $sql = "INSERT INTO `bill`(`id_user`,`bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `total`) VALUES ('$idUser','$userOrder','$addessOrder','$telephoneOrder','$emailOrder','$money','$totalOrder')";
    return pdo_execute_return_lastInsertId($sql);
}
function cart_insert($id_user, $id_pr, $img, $name, $price, $soluong, $thanhtien, $id_bill)
{
    $sql = "INSERT INTO `cart`(`id_user`, `id_pr`, `img`, `name`, `price`, `soluong`, `thanhtien`, `id_bill`) VALUES ('$id_user','$id_pr ','$img ','$name ','$price ','$soluong ','$thanhtien ','$id_bill ')";
    return pdo_execute($sql);
}
function bill_selectAll($ma)
{
    $sql = "select * from bill where id=$ma";
    return pdo_query_one($sql);
}
function cart_selectAll($ma)
{
    $sql = "select * from cart where id_bill=$ma";
    return pdo_query($sql);
}
function orderPlaced_selectAll($key = "", $ma)
{
    $sql = "select * from bill where 1";
    if ($ma > 0) {
        $sql .= " AND id_user=$ma";
    }
    if ($key != "") {
        $sql .= " AND id like '%$key%'";
    }
    $sql .= " order by id desc";
    return pdo_query($sql);
}
function bill_soluong()
{
    $sql = "select * from bill where 1";
    return pdo_query($sql);
}

function get_status_order($status)
{
    switch ($status) {
        case '0':
            $nameStatus = "New orders";
            break;
        case '1':
            $nameStatus = "Orders are being processed";
            break;
        case '2':
            $nameStatus = "Delivery in progress";
            break;
        case '3':
            $nameStatus = "Completed";
            break;
        default:
            $nameStatus = "New orders";
            break;
    }
    return $nameStatus;
}
