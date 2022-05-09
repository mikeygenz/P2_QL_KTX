<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "20194040";
        $dbname = "ql_ktx";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        // sql to create table
        // $sql = "CREATE TABLE DORMITORYS (
        //     id_dorm INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     dorm_name NVARCHAR(30) NOT NULL,
        //     rooms INT(6) NOT NULL
        // )";
        // if ($conn->query($sql) === TRUE) {
        //     echo "Table DORMITORYS created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }
        // $sql = "CREATE TABLE MANAGERS (
        //     id_man INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     man_name NVARCHAR(50) NOT NULL,
        //     cccd NVARCHAR(20) NOT NULL,
        //     phone NVARCHAR(20) NOT NULL,
        //     possition NVARCHAR(20) NOT NULL,
        //     username NVARCHAR(20) NOT NULL,
        //     pass NVARCHAR(20) NOT NULL
        // )";
        // if ($conn->query($sql) === TRUE) {
        //     echo "Table MANAGERS created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }
        // $sql = "CREATE TABLE ROOMS (
        //     id_room INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     id_dorm INT(6) UNSIGNED ,
        //     room_name NVARCHAR(30) NOT NULL,
        //     beds INT(6) NOT NULL,
        //     cost INT(10) NOT NULL,
        //     note NVARCHAR(200),
        //     FOREIGN KEY(id_dorm) REFERENCES DORMITORYS(id_dorm)
        // )";
        // if ($conn->query($sql) === TRUE) {
        //     echo "Table ROOMS created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }
        // $sql = "CREATE TABLE REGISTERS (
        //     id_register INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     id_dorm INT(6) UNSIGNED ,
        //     id_room INT(6) UNSIGNED ,
        //     id_man INT(6) UNSIGNED ,
        //     sv_name NVARCHAR(50) NOT NULL,
        //     cccd NVARCHAR(20) NOT NULL,
        //     phone NVARCHAR(20),
        //     semester INT(5) NOT NULL,
        //     date_res DATETIME NOT NULL,
        //     note NVARCHAR(200),
        //     FOREIGN KEY(id_dorm) REFERENCES DORMITORYS(id_dorm),
        //     FOREIGN KEY(id_room) REFERENCES ROOMS(id_room),
        //     FOREIGN KEY(id_man) REFERENCES MANAGERS(id_man)
        // )";

        // if ($conn->query($sql) === TRUE) {
        //     echo "Table REGISTERS created successfully";
        // } else {
        //     echo "Error creating table: " . $conn->error;
        // }

        $conn->close();
    ?>
    </body>
</html>
