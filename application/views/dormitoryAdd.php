<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/dormitoryAdd.css" rel="stylesheet">
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
                <div class="add-dormitory">
                    <form action="../controllers/dormitory.php" method="post">
                        <div class="add-dormitory-input">
                            <label for="name">Tên nhà KTX:</label>
                            <input type="text" name="name_dormitory" required />
                        </div>
                        <div class="add-dormitory-input">
                            <label for="rooms">Số phòng: </label>
                            <input type="text" name="rooms" required />
                        </div>
                        <div class="add-dormitory-input">
                            <label for="beds">Số giường mỗi phòng: </label>
                            <input type="text" name="beds" required />
                        </div>
                        <div class="add-dormitory-input">
                            <label for="price">Gía phòng: </label>
                            <input type="text" name="price" required />
                        </div>
                        <div class="add-dormitory-input-note">
                            <label for="note">Cơ sở vật chất: </label> <br>
                            <textarea class="input-text-textarea" type="text" name="note"></textarea>
                        </div>
                        <div class="add-dormitory-input">
                            <button type="submit" name="createDormitory">Lưu thông tin</button>
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