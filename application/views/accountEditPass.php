<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/managerEditPass.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
    <title>KTX</title>
</head>

<body>
    <div>
        <?php
        session_start();
        ?>
        <?php include_once("header.php") ?>
        <?php include_once("top_menu.php") ?>
    </div>
    <div class="main-content">
        <div class="row">
            <?php include_once("navbar.php") ?>
            <div class="col-10">
                <?php
                include_once("../controllers/manager.php");
                $c_Manager = new C_Manager;
                $id_manager = $_SESSION["user_id"];
                $manager = $c_Manager->getManager($id_manager);
                $row = $manager->fetch_assoc();
                ?>
                <div class="sub-content">
                    <div class="edit-pass-manager">
                        <form name="editPassForm" action="../controllers/manager.php" onsubmit="return validateForm()" method="post">
                            <input style="display: none" type="text" name="id_manager" value="<?php echo $id_manager ?>">
                            <div class="edit-pass-manager-input">
                                <label for="username">Tên tài khoản:</label>
                                <input type="text" name="username" required value="<?php echo $row["username"] ?>" />
                            </div>
                            <div class="edit-pass-manager-input">
                                <label for="password">Nhập mật khẩu hiện tại:</label>
                                <input type="password" name="old_password" /> <br>
                                <div class="a123">
                                    <p id="oldPassErr" class="error"> </p>
                                </div>
                            </div>
                            <div class="edit-pass-manager-input">
                                <label for="password">Nhập mật khẩu mới:</label>
                                <input type="password" name="new1_password" />
                            </div>
                            <div class="edit-pass-manager-input">
                                <label for="password">Nhập lại mật khẩu mới:</label>
                                <input type="password" name="new2_password" />
                            </div>
                            <div class="edit-pass-manager-input">
                                <button class="save-infor" type="submit" name="editPassManager">Lưu thông tin</button>
                            </div>
                        </form>
                        <div class="btn-back">
                            <button class="back-button" type="button" onclick="quay_lai_trang_truoc()">Quay lại</button>
                        </div>
                    </div>
                    <!-- <button class="back-button" type="button" onclick="quay_lai_trang_truoc()">Quay lại</button> -->
                </div>

            </div>
        </div>
        <script>
            function quay_lai_trang_truoc() {
                history.back();
            }

            function validateForm() {
                let x = document.forms["editPassForm"]["old_password"].value;
                if (x == "1") {
                    let y = document.getElementById("oldPassErr");
                    y.innerHTML = "Mật khẩu cũ không đúng";
                    return false;
                }
            }
        </script>
    </div>
    <?php include_once("footer.php") ?>
</body>

</html>