<?php
  class E_Room {
    public $id_dorm;
    public $id_room;
    public $name_room;
    public $beds;
    public $price;
    public $note;

    public function room_construct($id_dorm, $id_room, $name_room, $beds, $price, $note) {
      $this->id_dorm = $id_dorm;
      $this->name_room = $name_room;
      $this->id_room = $id_room;
      $this->beds = $beds;
      $this->price = $price;
      $this->note = $note;
    }
  }
  class M_Room {
    public function room_construct(){}
    public function getAllRoom() {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM ROOM");
      mysqli_close($conn);
      return $result;
    }
    public function getRooms($id_dormitory){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM ROOM WHERE ROOM.id_dormitory = '$id_dormitory'");
      mysqli_close($conn);
      return $result;
    }
    public function createRooms($id_dormitory, $name_dormitory, $rooms, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $i=0;
      while ($i < $rooms){
        $i=$i+1;
        $name_room= "$name_dormitory-$i";
        $result =$conn->query("INSERT INTO ROOM ( id_dormitory, name_room, beds, price, note) VALUE ('$id_dormitory', '$name_room', '$beds', '$price', '$note')");
      }
      mysqli_close($conn);
    }
    public function createRoom($name_dormitory, $name_room, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT id_dormitory FROM DORMITORY WHERE DORMITORY.name_dormitory= '$name_dormitory'");
      $row= $result->fetch_assoc();
      $id_dormitory= $row["id_dormitory"];
      $result =$conn->query("INSERT INTO ROOM ( id_dormitory, name_room, beds, price, note) VALUE ('$id_dormitory', '$name_room', '$beds', '$price', '$note')");
      $result = $conn->query("SELECT rooms FROM DORMITORY WHERE DORMITORY.id_dormitory = '$id_dormitory'");
      $row= $result->fetch_assoc();
      $rooms= $row["rooms"];
      $rooms= $rooms + 1;
      $result = $conn->query("UPDATE DORMITORY SET DORMITORY.rooms = '$rooms' WHERE DORMITORY.id_dormitory = '$id_dormitory'");
      mysqli_close($conn);
    }
    public function deleteRoom($id_room){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT id_dorm FROM ROOM WHERE ROOM.id_room = '$id_room'");
      $row= $result->fetch_assoc();
      $id_dormitory= $row["id_dormitory"];
      $result = $conn->query("SELECT rooms FROM DORMITORY WHERE DORMITORY.id_dormitory = '$id_dormitory'");
      $row= $result->fetch_assoc();
      $rooms= $row["rooms"];
      $rooms= $rooms - 1;
      $result = $conn->query("DELETE FROM ROOM WHERE ROOM.id_room= '$id_room'");
      if($rooms == 0){
        $result = $conn->query("DELETE FROM DORMITORY WHERE DORMITORY.id_dormitory= '$id_dormitory'");
      }else{
        $result = $conn->query("UPDATE DORMITORY SET DORMITORY.rooms = '$rooms' WHERE DORMITORY.id_dormitory = '$id_dormitory'");
      }
      mysqli_close($conn);
    }
    public function updateRoom($id_room ,$name_room, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("UPDATE ROOM SET ROOM.name_room = '$name_room',ROOM.beds = '$beds',ROOM.price = '$price', ROOM.note = '$note'  WHERE ROOM.id_room = '$id_room'");
      mysqli_close($conn);
      return $result;
    }
    public function getRoom($id_room){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM ROOM WHERE ROOM.id_room= '$id_room'");
      mysqli_close($conn);
      return $result;
    }
  }
?>

