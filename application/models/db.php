<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ql_ktx";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    // sql to create table

    $sql = "CREATE TABLE DORMITORY (
        id_dormitory INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name_dormitory NVARCHAR(30) NOT NULL,
        rooms INT(6) NOT NULL,
        beds INT(6) NOT NULL,
        price INT(10) NOT NULL,
        note TEXT
        )";
    if ($conn->query($sql) === TRUE) {
        echo "Table DORMITORY created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE MANAGER (
        id_manager INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name_manager NVARCHAR(50) NOT NULL,
        identity_card NVARCHAR(20) NOT NULL,
        phone_number NVARCHAR(20) NOT NULL,
        possition NVARCHAR(20) NOT NULL,
        username NVARCHAR(20) NOT NULL,
        password NVARCHAR(20) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table MANAGER created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE ROOM (
        id_room INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_dormitory INT(6) UNSIGNED ,
        name_room NVARCHAR(30) NOT NULL,
        beds INT(6) NOT NULL,
        price INT(10) NOT NULL,
        note TEXT ,
        FOREIGN KEY(id_dormitory) REFERENCES DORMITORY(id_dormitory)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table ROOM created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE REGISTER (
        id_register INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_dormitory INT(6) UNSIGNED ,
        id_room INT(6) UNSIGNED ,
        id_manager INT(6) UNSIGNED ,
        name_sv NVARCHAR(50) NOT NULL,
        identity_card NVARCHAR(20) NOT NULL,
        phone_number NVARCHAR(20),
        semester INT(5) NOT NULL,
        date_res DATETIME NOT NULL,
        FOREIGN KEY(id_dormitory) REFERENCES DORMITORY(id_dormitory),
        FOREIGN KEY(id_room) REFERENCES ROOM(id_room),
        FOREIGN KEY(id_manager) REFERENCES MANAGER(id_manager)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table REGISTER created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>