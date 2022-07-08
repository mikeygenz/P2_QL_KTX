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
        name_dormitory NVARCHAR(30) NOT NULL PRIMARY KEY,
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
        position NVARCHAR(20) NOT NULL,
        username NVARCHAR(20) NOT NULL,
        password NVARCHAR(20) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table MANAGER created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE ROOM (
        name_room NVARCHAR(30) NOT NULL PRIMARY KEY,
        name_dormitory NVARCHAR(30) NOT NULL ,
        beds INT(6) NOT NULL,
        price INT(10) NOT NULL,
        note TEXT ,
        FOREIGN KEY(name_dormitory) REFERENCES DORMITORY(name_dormitory)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table ROOM created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $sql = "CREATE TABLE REGISTER (
        id_register INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name_dormitory NVARCHAR(30) NOT NULL ,
        name_room NVARCHAR(30) NOT NULL ,
        id_manager INT(6) UNSIGNED ,
        name_student NVARCHAR(50) NOT NULL,
        identity_card NVARCHAR(20) NOT NULL,
        phone_number NVARCHAR(20),
        semester INT(5) NOT NULL,
        date_register DATETIME NOT NULL,
        FOREIGN KEY(name_dormitory) REFERENCES DORMITORY(name_dormitory),
        FOREIGN KEY(name_room) REFERENCES ROOM(name_room),
        FOREIGN KEY(id_manager) REFERENCES MANAGER(id_manager)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table REGISTER created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>