<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/managerAdd.css" rel="stylesheet">
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
        <?php include_once("../controllers/permission.php") ?>
    </div>
    <div class="main-content">
        <div class="row">
            <?php include_once("navbar.php") ?>
            <div class="col-10">
                <?php
                include_once("../controllers/manager.php");
                $c_Manager = new C_Manager;
                $id_manager = $_GET["id_manager"];
                $manager = $c_Manager->getManager($id_manager);
                $row = $manager->fetch_assoc();
                ?>
                <div class="edit-manager">
                    <form action="../controllers/manager.php" method="post">
                        <div class="edit-manager-input">
                            <label for="name_manager">Tên nhân viên:</label>
                            <input type="text" name="name_manager" required value="<?php $row["name_manager"] ?>" />
                        </div>
                        <div class="edit-manager-input">
                            <label for="identity_card">Căn cước công dân:</label>
                            <input type="text" name="identity_card" required value="<?php $row["identity_card"] ?>" />
                        </div>
                        <div class="edit-manager-input">
                            <label for="phone_number">Số điện thoại:</label>
                            <input type="text" name="phone_number" required value="<?php $row["phone_number"] ?>" />
                        </div>
                        <div class="edit-manager-input">
                            <label for="position">Vai trò:</label>
                            <input type="text" name="position" required value="<?php $row["position"] ?>" />
                        </div>
                        <div class="edit-manager-input">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" required value="<?php $row["username"] ?>" />
                        </div>
                        <div class="edit-manager-input">
                            <label for="password">Mật khẩu:</label>
                            <input type="text" name="password" value="<?php $row["password"] ?>" />
                        </div>
                        <div class="edit-manager-input">
                            <button type="submit" name="createManager">Lưu thông tin</button>
                        </div>
                    </form>

                </div>
                <button class="back-button" type="button" onclick="quay_lai_trang_truoc()">Quay lại</button>
            </div>
        </div>
        <script>
            function quay_lai_trang_truoc() {
                history.back();
            }
        </script>
    </div>
    <?php include_once("footer.php") ?>
</body>

</html>