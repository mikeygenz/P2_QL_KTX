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
                <div class="add-manager">
                    <form action="../controllers/manager.php" method="post">
                        <div class="add-manager-input">
                            <label for="name_manager">Tên nhân viên:</label>
                            <input type="text" name="name_manager" required />
                        </div>
                        <div class="add-manager-input">
                            <label for="identity_card">Căn cước công dân:</label>
                            <input type="text" name="identity_card" required />
                        </div>
                        <div class="add-manager-input">
                            <label for="phone_number">Số điện thoại:</label>
                            <input type="text" name="phone_number" required />
                        </div>
                        <div class="add-manager-input">
                            <label for="position">Vai trò:</label>
                            <input type="text" name="position" required />
                        </div>
                        <div class="add-manager-input">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" required />
                        </div>
                        <div class="add-manager-input">
                            <label for="password">Mật khẩu:</label>
                            <input type="text" name="password" />
                        </div>
                        <div class="add-manager-input">
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