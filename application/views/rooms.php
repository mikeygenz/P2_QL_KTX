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
                    <?php 
                        include_once("../controllers/room.php") ;
                        $c_Room = new C_Room;
                        $roomList = $c_Room->invoke();
                    ?>
                <div id="ttt" class="view_room" >
                    <table>
                        <tr>                        
                            <th>Tên phòng</th>
                            <th>Số giường</th>
                            <th>Gía phòng</th>
                            <th>Tùy chọn</th>
                        </tr>
                            <?php 
                                if ($roomList->num_rows > 0) {
                                    $i=0;
                                    while($row = $roomList -> fetch_assoc()) {
                            ?>
                        <tr>
                            <form action="../controllers/room.php" method="post">
                            <td><?php echo $row["name_room"]; ?></td>
                            <td><?php echo $row["beds"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td>
                            <button type="submit" name="view">Xem</button>
                            <button type="submit" name="delete">Xóa </button>
                            <input style="display:none" type="text" name="id_room" value="<?php echo $row["id_room"] ?>">
                            </form>
                            <button onclick='test1("<?php echo $row["id_room"] ?>")'>Sửa</button>
                            </td>
                        </tr>
                        <tr style="display:none" id="<?php echo $row["id_room"] ?>">
                            <form action="../controllers/room.php" method="post">
                            <td><input type="text" name="name_room" value="<?php echo $row["name_room"]; ?>"></td>
                            <td><input type="text" name="beds" value="<?php echo $row["beds"]; ?>"></td>
                            <td><input type="text" name="price" value="<?php echo $row["price"]; ?>"></td>
                            <td>
                            <button type="submit" name="update" value="<?php echo $row["id_room"] ?>">Lưu</button>
                            <input style="display:none" type="text" name="id_room" value="<?php echo $row["id_room"] ?>">
                            </form>
                            <button onclick='test2("<?php echo $row["id_room"] ?>")'>Hủy</button> 
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
                </div>
            </div>
        </div>
    <script>
        function test1(para){
            // document.getElementById(para).style.inset = "0px";
            document.getElementById(para).style.display = "";
            // document.getElementById(para).style.position = "absolute";
            // document.getElementById(para).style.backgroundColor = "rgba(68, 68, 68, 0.85)";
            // document.getElementById(para).style.justifyContent = "center";
        }
        function test2(para){
            // document.getElementById(para).style.inset = "0px";
            document.getElementById(para).style.display = "none";
            // document.getElementById(para).style.position = "absolute";
            // document.getElementById(para).style.backgroundColor = "rgba(68, 68, 68, 0.85)";
            // document.getElementById(para).style.justifyContent = "center";
        }
    </script>
    </div>
    <?php include_once("footer.php") ?>
</body>
</html>