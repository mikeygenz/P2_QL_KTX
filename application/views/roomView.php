<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/home.css" rel="stylesheet">
    <link href="../css/roomView.css" rel="stylesheet">
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
                <div class="view-room">
                    <table>
                        <tr style="height:30px">
                            <th style="width:15%">Tên phòng</th>
                            <th style="width:15%">Số giường</th>
                            <th style="width:15%">Giá phòng</th>
                            <th>Cở sở vật chất</th>
                            <th style="width:15%">Tùy chọn</th>
                        </tr>
                        <?php
                        include_once("../controllers/room.php");
                        $c_Room = new C_Room;
                        $name_dormitory = $_GET["name_dormitory"];
                        $roomList = $c_Room->getRooms($name_dormitory);
                        if ($roomList->num_rows > 0) {
                            $i = 0;
                            while ($row = $roomList->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $row["name_room"]; ?></td>
                                    <td><?php echo $row["beds"]; ?></td>
                                    <td><?php echo $row["price"]; ?></td>
                                    <td style="display:flex"><?php echo $row["note"]; ?></td>
                                    <td>
                                        <form action="../controllers/room.php" method="post">
                                            <input style="display:none" type="text" name="name_room" value="<?php echo $row["name_room"] ?>">
                                            <button class="btn" type="submit" name="editRoom">Chỉnh sửa</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                                $i++;
                            }
                        } else {
                            echo "No result found";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("footer.php") ?>
</body>

</html>