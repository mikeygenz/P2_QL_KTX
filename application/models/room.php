<?php
  class E_Room {
    public $name_dormitory;
    public $name_room;
    public $beds;
    public $price;
    public $note;

    public function room_construct($name_dormitory, $name_room, $beds, $price, $note) {
      $this->name_dormitory = $name_dormitory;
      $this->name_room = $name_room;
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
    public function getRooms($name_dormitory){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM ROOM WHERE ROOM.name_dormitory = $name_dormitory ");
      mysqli_close($conn);
      return $result;
    }
    public function createRooms($name_dormitory, $rooms, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $i=0;
      while ($i < $rooms){
        $i=$i+1;
        $name_room= "$name_dormitory-$i";
        $result =$conn->query("INSERT INTO ROOM (name_dormitory, name_room, beds, price, note) VALUE ('$name_dormitory','$name_room', '$beds', '$price', '$note')");
      }
      mysqli_close($conn);
    }
    public function createRoom($name_dormitory, $name_room, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result =$conn->query("INSERT INTO ROOM (name_room, beds, price, note) VALUE ('$name_room', '$beds', '$price', '$note')");
      $result = $conn->query("SELECT rooms FROM DORMITORY WHERE DORMITORY.name_dormitory = '$name_dormitory'");
      $row= $result->fetch_assoc();
      $rooms= $row["rooms"];
      $rooms= $rooms + 1;
      $result = $conn->query("UPDATE DORMITORY SET DORMITORY.rooms = '$rooms' WHERE DORMITORY.name_dormitory = '$name_dormitory'");
      mysqli_close($conn);
    }
    public function deleteRoom($name_room){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT name_dormitory FROM ROOM WHERE ROOM.name_room = '$name_room'");
      $row= $result->fetch_assoc();
      $name_dormitory= $row["name_dormitory"];
      $result = $conn->query("SELECT rooms FROM DORMITORY WHERE DORMITORY.name_dormitory = '$name_dormitory'");
      $row= $result->fetch_assoc();
      $rooms= $row["rooms"];
      $rooms= $rooms - 1;
      $result = $conn->query("DELETE FROM ROOM WHERE ROOM.name_room= '$name_room'");
      if($rooms == 0){
        $result = $conn->query("DELETE FROM DORMITORY WHERE DORMITORY.name_dormitory= '$name_dormitory'");
      }else{
        $result = $conn->query("UPDATE DORMITORY SET DORMITORY.rooms = '$rooms' WHERE DORMITORY.name_dormitory = '$name_dormitory'");
      }
      mysqli_close($conn);
      return $name_dormitory;
    }
    public function updateRoom($name_room, $beds, $price, $note){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("UPDATE ROOM SET ROOM.name_room = '$name_room',ROOM.beds = '$beds',ROOM.price = '$price', ROOM.note = '$note'  WHERE ROOM.name_room = '$name_room'");
      mysqli_close($conn);
      return $result;
    }
    public function getRoom($name_room){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM ROOM WHERE ROOM.name_room= $name_room");
      mysqli_close($conn);
      return $result;
    }
  }
?>

