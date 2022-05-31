<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../css/home.css" rel="stylesheet">
    <title>KTX</title>
</head>
<body>
    <div >
        <?php include_once("header.php") ?>
        <?php include_once("top_menu.php") ?>
    </div>
    <div class="main-content">
        <div class="row">
            <?php include_once("navbar.php") ?>
            <div class="col-10">
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
                                <form action="../controllers/register.php" method="post">
                                    <td><input type="text" name="name_dormitory" ></td>
                                    <td><input type="text" name="name_room" ></td>
                                    <td><input type="text" name="name_student"></td>
                                    <td><input type="text" name="identity_card"></td>
                                    <td><input type="text" name="semester"></td>
                                    <td><input type="text" name="phone_number"></td>
                                    <input style="display:none" type="text" name="id_manager" value="1">
                                    <?php $currentDate = new DateTime(); ?>
                                    <input style="display:none" type="text" name="date_register" value="<?php echo $currentDate->format('Y-m-d H:i:s') ?>">
                                    <td><button class="btn" type="submit" name="createRegister1" >Lưu </button></td>
                                </form>
                                </tr>
                           </table>
            </div>
        </div>
    </div>
    <?php include_once("footer.php") ?>
</body>
</html>