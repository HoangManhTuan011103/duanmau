<main class="main-devices">
    <div class="title-devices">
        <i class="fa-solid fa-hand-point-right"></i>
        <h2>Update Account</h2>
    </div>
    <!-- Start devices -->
    <!-- Start Smart Phone -->
    <section class="product-cat" id="2">
        <div class="title-cat">
            <a href="">
                <h3><i class="fa-solid fa-file-invoice"></i>Account Information</h3>
            </a>
        </div>
        <?php
        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
            $imagePath = "./imageProduct/" . $image;
            if (is_file($imagePath)) {
                $hinh = "<img class='myAvatar' src='" . $imagePath . "' alt='' width='150px' height='150px'>";
            } else {
                $hinh = "<p class='noImage'>Chưa có hình ảnh đại diện</p>";
            }
        }
        ?>
        <div class="form-account">
            <form action="index.php?act=updateAccount" method="post" class="form-update" enctype="multipart/form-data">
                <div class="avatar-account accountUpdate">
                    <!-- <p class="avatarAccountShow">Ảnh đại diện:</p> -->
                    <?= $hinh ?>
                    <label for="avatarAccountHidden" id="changeMyAvatar">Change avatar</label>
                    <input type="file" name="avatarAccount" id="avatarAccountHidden" hidden >
                    <input type="hidden" name="avatarAccount" value="<?= $image ?>">
                </div>
                <div class="infor-rightAccount">
                    <div class="name-account accountUpdate">
                        <p>Account name:</p>
                        <input type="text" name="nameAccount" autocomplete="off" value="<?= $user ?>">
                    </div>
                    <div class="email-account accountUpdate">
                        <p>Email:</p>
                        <input type="text" name="emailAccount" autocomplete="off" value="<?= $email ?>">
                    </div>
                    <input type="hidden" name="passAccount" autocomplete="off" value="<?= $password ?>">
                    <div class="address-account accountUpdate">
                        <p>Address:</p>
                        <input type="text" name="addressAccount" autocomplete="off" value="<?= $address ?>">
                    </div>
                    <div class="telephone-account accountUpdate">
                        <p>Telephone Number:</p>
                        <input type="text" name="telephoneAccount" autocomplete="off" value="<?= $telephone ?>">
                    </div>
                    <div class="btn-account">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" class="btn-hmt" name="btn-edit-account">Update</button>
                        <!-- <input class="btn-hight btn-hmt" type="reset" value="Reset"> -->
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
