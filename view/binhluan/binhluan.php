<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/model-bl.php";

    $idPr = $_REQUEST['idPr'];
    $dsbl = binhluan_selectAll($idPr);
    if (isset($_POST['btn-send-comment'])) {
        $noidung = $_POST['content-comment'];
        $id_user = $_SESSION['user']['id'];
        $id_pr = $_POST['idPr'];
        binhluan_insert($noidung, $id_user, $id_pr);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="title-comment">
        <h2>Reviews and feedback from customers</h2>
    </div>
    <div class="content-main-comment">
        <!-- Nội dung bình luận -->
        <?php
            $sum = 0;
            for($i = 0; $i < sizeof($dsbl); $i++){
                $sum++;
            }
        ?>
            <?php foreach ($dsbl as $v) : ?>
                <?php
                    $imagePath = "./imageProduct/" . $v['image'];
                    $hinh = "<img src='" . $imagePath . "' alt=''>";
                    if($v['role'] == 1){
                        $vaiTro = "( Admin )";
                    }else{
                        $vaiTro = "";
                    }
                    $textAvatar = substr($v['user'],0,1);
                ?>
                <div class="infor-customer-comment">
                    <div class="avatar">
                        <?= $v['image'] == "" ? "<h4>$textAvatar</h4>" : $hinh ?>
                    </div>
                    <div class="name-customer">
                        <p><?= $v['user'] ?></p> <span class="adminAccount"><?= $vaiTro ?></span>
                    </div>
                </div>
                <div class="show-comment">
                    <p>
                        <?= $v['noidung'] ?>
                    </p>
                </div>
                <div class="action-comment">
                    <ul>
                        <?php
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $timeCurrent = time();
                            $timeCommentDate = $v['date_create'];
                            $timeCommentString = strtotime($timeCommentDate);
                            $timeCommentCalculate = $timeCurrent - $timeCommentString;
                            // $timeCommentShow = date("s", $timeCommentCalculate)." giây";
                            $timeCommentShow = "Vừa xong";
                            if($timeCommentCalculate > 0 && $timeCommentCalculate < 60){
                                $timeCommentShow = date("s", $timeCommentCalculate)." giây";
                            }else if($timeCommentCalculate >= 60 && $timeCommentCalculate < 60*60 ){
                                $timeCommentShow = date("i", $timeCommentCalculate)." phút";
                            }else if($timeCommentCalculate >= 60*60 && $timeCommentCalculate < 60*60*24 ){
                                $timeCommentShow = date("G", $timeCommentCalculate-8*60*60)." giờ";
                            }else if($timeCommentCalculate >= 60*60*24 && $timeCommentCalculate < 60*60*24*7 ){
                                $timeCommentShow = floor($timeCommentCalculate/ (60*60*24)) ." ngày";
                            }else if($timeCommentCalculate >= 60*60*24*7){
                                $timeCommentShow = floor($timeCommentCalculate / (60*60*24*7)) ." tuần" ;
                            }

                        ?>
                        <li class="reply"><a href="">Reply</a></li>
                        <!-- <li>-</li> -->
                        <?php if(isset($_SESSION['user']['id']) && $_SESSION['user']['id'] == $v['id_user'] ): ?>
                            <li class="delete"><a onclick="return confirm('Are you sure you want to remove this comment not?')" href="index.php?act=deleteComment&id=<?= $v['id'] ?>&idDetail=<?= $idPr ?>">Delete</a></li>
                        <?php endif; ?>

                        <li class="dateComment">
                            <?= $timeCommentShow ?>
                            
                            <div class="timeCommentDate">
                                <?= $v['date_create'] ?>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php endforeach ?>
        <!-- Nội dung bình luận -->
    </div>

    <div class="content-comment">
        <?php if(isset($_SESSION['user'])){?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="idPr" value="<?= $idPr ?>">
                <textarea name="content-comment" id="" cols="120" rows="10" placeholder="Please leave a comment..."></textarea>
                <div class="main-comment">
                    <div class="total-comment">
                        <p><?= $sum ?> Comment</p>
                    </div>
                    <div class="btn-send-comment">
                        <button type="submit" name="btn-send-comment">Send</button>
                    </div>
                </div>
            </form>
        <?php }else{ ?>
            <p class="noLogin">You are not logged in? <span class="waitingLogin"><a href="index.php?actlogin=dangnhap">Please log in</a></span> to comment</p>
        <?php } ?>
    </div>
</body>

</html>