<?php
    function thong_ke(){
        $sql = "select danh_muc.id as madm,
        danh_muc.namedm as tendm,
         count(san_pham.id) as countsp, 
        min(san_pham.price) as minprice,
         max(san_pham.price) as maxprice,
        round(avg(san_pham.price)) as avgprice
         from san_pham left join danh_muc
         on danh_muc.id=san_pham.id_danh_muc 
        group by danh_muc.id 
        order by danh_muc.id desc;";
        return pdo_query($sql);
    }
?>