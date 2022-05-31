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
                <div class="view_register">
                    <div class="table" >
                        <?php 
                            include_once("../controllers/register.php"); 
                                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                        if(isset($_POST["createRegister"])){
                                            $c_Register = new C_Register;
                                            $result =$c_Register->createRegister( $_POST["id_dormitory"], $_POST["id_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"], $_POST["date_register"]);
                                            $registerList = $c_Register->getRoomRegister($_POST["id_room"], $_POST["semester"]);
                                        }
                                        if(isset($_POST["deleteRegister"])){
                                            $c_Register = new C_Register;
                                            $result =$c_Register->deleteRegister( $_POST["id_register"]);
                                            $registerList = $c_Register->getRoomRegister($_POST["id_room"], $_POST["semester"]);
                                        }
                                        if(isset($_POST["updateRegister"])){
                                            $c_Register = new C_Register;
                                            $result =$c_Register->updateRegister($_POST["id_register"],$_POST["id_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"]);
                                            $registerList = $c_Register->getRoomRegister($_POST["id_room"], $_POST["semester"]);
                                        }
                                        if(isset($_POST["viewRoomRegister"])){
                                            $c_Register = new C_Register;
                                            $registerList = $c_Register->getRoomRegister($_POST["id_room"], $_POST["semester"]);
                                        }
                                    }
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
                                <form action="../views/registerR.php" method="post">
                                    <td><input type="text" name="name_dormitory" value="<?php echo $_POST["name_dormitory"] ?>"></td>
                                    <td><input type="text" name="name_room" value="<?php echo $_POST["name_room"] ?>"></td>
                                    <td><input type="text" name="name_student"></td>
                                    <td><input type="text" name="identity_card"></td>
                                    <td><input type="text" name="semester"></td>
                                    <td><input type="text" name="phone_number"></td>
                                    <input style="display:none" type="text" name="id_dormitory" value="<?php echo $_POST["id_dormitory"] ?>">
                                    <input style="display:none" type="text" name="id_room" value="<?php echo $_POST["id_room"] ?>">
                                    <input style="display:none" type="text" name="id_manager" value="1">
                                    <?php $currentDate = new DateTime(); ?>
                                    <input style="display:none" type="text" name="date_register" value="<?php echo $currentDate->format('Y-m-d H:i:s') ?>">
                                    <td><button class="btn" type="submit" name="createRegister" >Lưu </button></td>
                                </form>
                                </tr>
                                <?php 
                                    if ($registerList->num_rows > 0) {
                                        $i=0;
                                        while($row = $registerList -> fetch_assoc()) {
                                ?>
                                <tr id="i<?php echo $row["id_register"] ?>">
                                <form action="../views/registerR.php" method="post">
                                    <td><?php echo $_POST["name_dormitory"]; ?></td>
                                    <td><?php echo $_POST["name_room"]; ?></td>
                                    <td><?php echo $row["name_student"]; ?></td>
                                    <td><?php echo $row["identity_card"]; ?></td>
                                    <td><?php echo $row["semester"]; ?></td>
                                    <td><?php echo $row["phone_number"]; ?></td>
                                    <td>
                                        <button class="btn" type="submit" name="deleteRegister" >Xóa </button>
                                </form>
                                        <button class="btn" onclick='openUpdate("<?php echo $row["id_register"] ?>")' >Sửa</button>
                                    </td>
                                </tr>
                                <tr style="display:none" id="<?php echo $row["id_register"] ?>">
                                    <form action="../views/registerR.php" method="post">
                                    <td><input type="text" name="name_dormitory" value="<?php echo $_POST["name_dormitory"] ?>"></td>
                                    <td><input type="text" name="name_room" value="<?php echo $_POST["name_room"] ?>"></td>
                                    <td><input type="text" name="name_student" value="<?php echo $row["name_student"] ?>"></td>
                                    <td><input type="text" name="identity_card" value="<?php echo $row["identity_card"] ?>"></td>
                                    <td><input type="text" name="semester" value="<?php echo $row["semester"] ?>"></td>
                                    <td><input type="text" name="phone_number" value="<?php echo $row["phone_number"] ?>"></td>
                                    <input style="display:none" type="text" name="id_dormitory" value="<?php echo $row["id_dormitory"] ?>">
                                    <input style="display:none" type="text" name="id_room" value="<?php echo $row["id_room"] ?>">
                                    <input style="display:none" type="text" name="id_manager" value="1">
                                    <?php $currentDate = new DateTime(); ?>
                                    <input style="display:none" type="text" name="date_register" value="<?php echo $currentDate->format('Y-m-d H:i:s') ?>">
                                    <td>
                                    <input style="display:none" type="text" name="id_register" value="<?php echo $row["id_register"] ?>">
                                        <button class="btn" type="submit" name="updateRegister" value="<?php echo $row["id_register"] ?>">Lưu </button>
                                    </form>
                                        <button class="btn" onclick='closeUpdate("<?php echo $row["id_register"] ?>")' >Hủy </button>
                                    </td>
                                </tr>
                                <?php
                                            $i++;
                                        }
                                    }
                                    else{
                                        echo "No result found";
                                    }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
        function openUpdate(para){
            document.getElementById(para).style.display = "";
            document.getElementById("i"+para).style.display = "none";
        }
        function closeUpdate(para){
            document.getElementById(para).style.display = "none";
            document.getElementById("i"+para).style.display = "";
        }
    </script>
    </div>
    <?php include_once("footer.php") ?>
</body>
</html>