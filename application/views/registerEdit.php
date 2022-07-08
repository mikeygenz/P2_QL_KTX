<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/registerEdit.css" rel="stylesheet">
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
                <div class="edit-register">
                    <?php
                    include_once("../controllers/register.php");
                    $c_Register = new C_Register;
                    $id_register = $_GET["id_register"];
                    $register = $c_Register->getRegister($id_register);
                    $row = $register->fetch_assoc();
                    ?>
                    <form action="../controllers/register.php" method="post">
                        <div class="edit-register-input">
                            <label for="name_dormitory">Tên nhà KTX:</label>
                            <input type="text" name="name_dormitory" value="<?php echo $row["name_dormitory"] ?>" required />
                        </div>
                        <div class="edit-register-input">
                            <label for="name_room">Tên phòng:</label>
                            <input type="text" name="name_room" value="<?php echo $row["name_room"] ?>" required />
                        </div>
                        <div class="edit-register-input">
                            <label for="semester">Kỳ học:</label>
                            <input type="text" name="semester" value="<?php echo $row["semester"] ?>" required />
                        </div>
                        <div class="edit-register-input">
                            <label for="name_studnet">Tên sinh viên:</label>
                            <input type="text" name="name_student" value="<?php echo $row["name_student"] ?>" required />
                        </div>
                        <div class="edit-register-input">
                            <label for="identity_card">Căn cước công dân:</label>
                            <input type="text" name="identity_card" value="<?php echo $row["identity_card"] ?>" required />
                        </div>
                        <div class="edit-register-input">
                            <label for="phone_number">Số điện thoại:</label>
                            <input type="text" name="phone_number" value="<?php echo $row["phone_number"] ?>" />
                        </div>
                        <div class="edit-register-input">
                            <input style="display:none" type="text" name="id_manager" value="1">
                            <?php $currentDate = new DateTime(); ?>
                            <input style="display:none" type="text" name="date_register" value="<?php echo $currentDate->format('Y-m-d H:i:s') ?>">
                            <input style="display:none" type="text" name="id_register" value="<?php echo $row["id_register"] ?>">
                            <button type="submit" name="updateRegister">Lưu thông tin</button>
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