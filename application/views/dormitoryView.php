<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/home.css" rel="stylesheet">
    <link href="../css/dormitoryView.css" rel="stylesheet">
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
                include_once("../controllers/dormitory.php");
                $c_Dormitory = new C_Dormitory;
                $dormList = $c_Dormitory->invoke();
                ?>
                <div class="view_dorm">
                    <table>
                        <tr style="height:30px">
                            <th>Tên nhà</th>
                            <th>Số phòng</th>
                            <th>Số giường</th>
                            <th>Giá phòng</th>
                            <th>Cở sở vật chất</th>
                            <th>Tùy chọn</th>
                        </tr>
                        <?php
                        if ($dormList->num_rows > 0) {
                            $i = 0;
                            while ($row = $dormList->fetch_assoc()) {
                        ?>
                                <tr>
                                    <form action="../controllers/dormitory.php" method="post">
                                        <td><?php echo $row["name_dormitory"]; ?></td>
                                        <td><?php echo $row["rooms"]; ?></td>
                                        <td><?php echo $row["beds"]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><?php echo $row["note"]; ?></td>
                                        <input style="display:none" type="text" name="name_dormitory" value="<?php echo $row["name_dormitory"] ?>">
                                        <td>
                                            <button class="btn" type="submit" name="deleteDormitory">Xóa</button>
                                            <!-- </form>
                                    <form action="../controllers/dormitory.php" method="post"> -->
                                            <input style="display:none" type="text" name="name_dormitory" value="<?php echo $row["name_dormitory"] ?>">
                                            <button class="btn" type="submit" name="viewDormitory">Xem</button>
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