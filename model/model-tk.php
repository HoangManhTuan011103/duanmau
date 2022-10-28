<?php
    function taikhoan_soluong(){
        $sql = "select * from tai_khoan order by id desc";
        return pdo_query($sql);
    }
    function taikhoan_insert($user,$email,$password){
        $sql = "INSERT INTO `tai_khoan`(`user`,`email`,`password`) VALUES ('$user','$email','$password')";
        pdo_execute($sql,$user,$email,$password);
    }
    function taikhoan_select($email,$password){
        $sql = "select * from tai_khoan where email='$email' and password='$password'";
        return pdo_query_one($sql,$email,$password);
    }
    function taikhoan_update($id,$user,$email,$address,$telephone,$image){
        $sql = "UPDATE `tai_khoan`
         SET 
         `user`='$user',
        `email`='$email',
        `address`='$address',
        `telephone`='$telephone',
        `image`='$image'
         WHERE id=$id";
        pdo_execute($sql,$id,$user,$email,$address,$telephone,$image);
    }
    function taikhoan_select_one($email){
        $sql = "select * from tai_khoan where email='$email'";
        return pdo_query_one($sql,$email);
    }
    function taikhoan_select_validate($email){
        $sql = "select `email` from tai_khoan where email='$email'";
        return pdo_query_one($sql,$email);
    }
    function update_pass($id,$pass){
        $sql = "UPDATE `tai_khoan` SET `password`='$pass' WHERE id=$id";
        pdo_execute($sql,$id,$pass);
    }
    // function taikhoan_select_validate_pass($email){
    //     $sql = "select `password` from tai_khoan where email='$email'";
    //     return pdo_query_one($sql,$email);
    // }
    function taikhoan_insert_admin($user,$email,$password,$address,$telephone,$role){
        $sql = "INSERT INTO `tai_khoan`(`user`,`email`,`password`,`address`, `telephone`,`role`) VALUES ('$user','$email','$password','$address','$telephone','$role')";
        pdo_execute($sql,$user,$email,$password,$address,$telephone,$role);
    }
    function taikhoan_update_admin($id,$user,$email,$password,$address,$telephone,$image,$role){
        $sql = "UPDATE `tai_khoan` SET `user`='$user',`email`='$email',`password`='$password',`address`='$address',`telephone`='$telephone',`image`='$image',`role`='$role' WHERE id=$id";
        pdo_execute($sql,$id,$user,$email,$password,$address,$telephone,$image,$role);
    }
    function taikhoan_delete($ma){
        $sql="delete from tai_khoan where id=$ma";
        pdo_execute($sql,$ma);
    }
    function taikhoan_select_id($ma){
        $sql = "select * from tai_khoan where id=$ma";
        return pdo_query_one($sql, $ma);
    }
?>