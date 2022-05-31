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
                <div class="cre_dorm">
                    <form action="../controllers/dormitory.php" method="post">
                        <table>
                            <td> Tên nhà: <input type="text" name="name_dorm"><br></td>
                            <td> Số phòng: <input type="text" name="rooms"><br></td>
                            <td> Số giường: <input type="text" name="beds"><br></td>
                            <td> Gía phòng: <input type="text" name="cost"><br></td>
                            <td> <input type="submit"></td>
                        </table>
                    </form>
                </div>
                <div class="view_dorm">
                    <table>
                        <tr>                        
                            <th>Tên nhà</th>
                            <th>Số phòng</th>
                            <th>Số giường</th>
                            <th>Gía phòng</th>
                            <th>Tùy chọn</th>
                        </tr>
                        <tr>
                            <form action="../controllers/dormitory.php" method="post">                         
                            <td> <input type="text" name="name_dorm"><br></td>
                            <td> <input type="text" name="rooms"><br></td>
                            <td> <input type="text" name="beds"><br></td>
                            <td> <input type="text" name="price"><br></td>
                            <td> <input type="submit"></td>
                            </form>
                        </tr>
                        <?php 
                            if ($dormList->num_rows > 0) {
                                $i=0;
                                while($row = $dormList -> fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["name_dorm"]; ?></td>
                            <td><?php echo $row["rooms"]; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
    </div>
    <?php include_once("footer.php") ?>
</body>
</html>