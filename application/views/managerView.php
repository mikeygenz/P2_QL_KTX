<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/home.css" rel="stylesheet">
    <link href="../css/managerView.css" rel="stylesheet">
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
                $managerList = $c_Manager->invoke();
                ?>
                <div class="sub-content">
                <div class="view-manager">
                    <table>
                        <tr style="height:30px">
                            <th>Tên nhân viên</th>
                            <th>Vai trò</th>
                            <th>Căn cước công dân</th>
                            <th>Số điện thoại</th>
                            <!-- <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th> -->
                            <th>Tùy chỉnh</th>
                        </tr>
                        <?php
                        if ($managerList->num_rows > 0) {
                            $i = 0;
                            while ($row = $managerList->fetch_assoc()) {
                        ?>
                                <tr>
                                    <form action="../controllers/manager.php" method="post">
                                        <td><?php echo $row["name_manager"]; ?></td>
                                        <td><?php echo $row["position"]; ?></td>
                                        <td><?php echo $row["identity_card"]; ?></td>
                                        <td><?php echo $row["phone_number"]; ?></td>
                                        <!-- <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["password"]; ?></td> -->
                                        <input style="display:none" type="text" name="id_manager" value="<?php echo $row["id_manager"] ?>">
                                        <td>
                                            <button class="delete-btn" type="submit" name="deleteManager">Xóa</button>
                                        </td>
                                    </form>
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
    </div>
    <?php include_once("footer.php") ?>
</body>

</html>