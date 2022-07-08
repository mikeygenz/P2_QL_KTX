<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/registerView.css" rel="stylesheet">
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
                <div class="view-register">
                    <div>
                        <form action="../controllers/register.php" method="post"></form>
                    </div>
                    <div class="table">
                        <?php
                        include_once("../controllers/register.php");
                        $c_Register = new C_Register;
                        $registerList = $c_Register->invoke();
                        ?>
                        <table>
                            <tr>
                                <th>Tên tòa nhà </th>
                                <th>Tên phòng </th>
                                <th>Tên sinh viên </th>
                                <th>Căn cước công dân </th>
                                <th>Kỳ học </th>
                                <th>Số điện thoại </th>
                                <th>Tùy chọn</th>
                            </tr>
                            <tr>
                                <form action="../views/registerView.php" method="post">
                                    <td><input type="text" name="name_dormitory" /></td>
                                    <td><input type="text" name="name_room" /></td>
                                    <td><input type="text" name="name_student" /></td>
                                    <td><input type="text" name="identity_card" /></td>
                                    <td><input type="text" name="semester" /></td>
                                    <td><input type="text" name="phone_number" /></td>
                                    <td>
                                        <button class="btn" type="submit" name="searchRegister">Tìm </button>
                                </form>
                                </td>
                            </tr>
                            <?php
                            if ($registerList->num_rows > 0) {
                                $i = 0;
                                while ($row = $registerList->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <form action="../controllers/register.php" method="post">
                                            <td><?php echo $row["name_dormitory"]; ?></td>
                                            <td><?php echo $row["name_room"]; ?></td>
                                            <td><?php echo $row["name_student"]; ?></td>
                                            <td><?php echo $row["identity_card"]; ?></td>
                                            <td><?php echo $row["semester"]; ?></td>
                                            <td><?php echo $row["phone_number"]; ?></td>
                                            <td>
                                                <input style="display:none" type="text" name="id_register" value="<?php echo $row["id_register"] ?>">
                                                <button class="btn" type="submit" name="deleteRegister">Xóa </button>
                                                <button class="btn" type="submit" name="editRegister">Sửa </button>
                                        </form>
                                        </td>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            } else {
                            }
                            ?>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("footer.php") ?>
</body>

</html>