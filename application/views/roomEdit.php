<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/roomEdit.css" rel="stylesheet">
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
                <div class="edit_room">
                    <?php
                    include_once("../controllers/room.php");
                    $c_Room = new C_Room;
                    $name_room = $_GET["name_room"];
                    $room = $c_Room->getRoom($name_room);
                    $row = $room->fetch_assoc();
                    ?>
                    <form action="../controllers/room.php" method="post">
                        <div class="edit-room-input">
                            <label for="name">Tên phòng:</label>
                            <input type="text" id="name_room" name="name_room" value="<?php echo $row["name_room"] ?>" required />
                        </div>
                        <div class="edit-room-input">
                            <label for="name">Số giường: </label>
                            <input type="text" id="beds" name="beds" value="<?php echo $row["beds"] ?>" required />
                        </div>
                        <div class="edit-room-input">
                            <label for="name">Gía phòng: </label>
                            <input type="text" id="price" name="price" value="<?php echo $row["price"] ?>" required />
                        </div>
                        <div class="edit-room-input">
                            <label for="name">Cơ sở vật chất: </label> <br>
                            <textarea class="input-text-textarea" type="text" id="note" name="note"><?php echo $row["note"] ?></textarea>
                        </div>
                        <div class="edit-room-input">
                            <input style="display:none" type="text" id="name_room" name="name_room" value="<?php echo $row["name_room"] ?>" />
                            <input style="display:none" type="text" id="name_dormitory" name="name_dormitory" value="<?php echo $row["name_dormitory"] ?>" />
                            <button type="submit" name="updateRoom">Lưu thông tin</button>
                            <button type="submit" name="deleteRoom">Xóa phòng</button>
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