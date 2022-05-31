<?php
  // include_once("db.php");
  class E_Dormitory {
    public $id_dormitory;
    public $name_dormitory;
    public $rooms;
    public $beds;
    public $price;
    public $note ;

    public function dorm_construct($id_dormitory, $name_dormitory, $rooms, $beds, $price, $note) {
      $this->id_dorm = $id_dormitory;
      $this->name_dorm = $name_dormitory;
      $this->rooms = $rooms;
      $this->beds = $beds;
      $this->price = $price;
      $this->note = $note;
    }
  }
  
  class M_Dormitory {
    public function dorm_construct(){}
    public function getAllDormitory() {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM DORMITORY");
      mysqli_close($conn);
      return $result;
    }
    public function createDormitory($name_dormitory, $rooms, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("INSERT INTO DORMITORY ( name_dormitory, rooms, beds, price, note) VALUE ('$name_dormitory', '$rooms', '$beds', '$price', '$note')");
      $result = $conn->query("SELECT id_dormitory FROM DORMITORY WHERE DORMITORY.name_dormitory = '$name_dormitory'");
      $row= $result->fetch_assoc();
      $id_dormitory= $row["id_dormitory"];
      mysqli_close($conn);
      include_once("../models/room.php");
      $mRoom = new M_Room;
      $mRoom->createRooms($id_dormitory, $name_dormitory, $rooms, $beds, $price, $note);
      return $result;
    }
    public function deleteDormitory($id_dormitory){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("DELETE FROM ROOM WHERE ROOM.id_dormitory = '$id_dormitory'");
      $result = $conn->query("DELETE FROM DORMITORY WHERE DORMITORY.id_dormitory = '$id_dormitory'");
      mysqli_close($conn);
      return $result;
    }
  }
