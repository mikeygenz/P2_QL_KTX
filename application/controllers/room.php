<?php
    include_once("../models/room.php");
    class C_Room {
        public function invoke(){
            $mRoom = new M_Room;
            $roomList = $mRoom->getAllRoom();
            return $roomList;
        }
        public function getRooms($id_dormitory){
            $mRoom = new M_Room;
            $roomList = $mRoom->getRooms($id_dormitory);
            return $roomList;
        }
        public function getRoom($id_room){
            $mRoom = new M_Room;
            $room = $mRoom->getRoom($id_room);
            return $room;
        }
        public function createRoom( $name_dormitory, $name_room, $beds, $price, $note){
            $mRoom= new M_Room;
            $result = $mRoom->createRoom($name_dormitory, $name_room, $beds, $price, $note);
        }
        public function deleteRoom($id_room) {
            $mRoom= new M_Room;
            $result = $mRoom->deleteRoom($id_room); 
        }
        public function updateRoom($id_room ,$name_room, $beds, $price, $note) {
            $mRoom= new M_Room;
            $result = $mRoom->updateRoom($id_room ,$name_room, $beds, $price, $note);   
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["deleteRoom"])){
            $c_Room = new C_Room;
            $result =$c_Room->deleteRoom( $_POST["id_room"]);
        }
        if(isset($_POST["updateRoom"])){
            $c_Room = new C_Room;
            $result =$c_Room->updateRoom( $_POST["id_room"], $_POST["name_room"], $_POST["beds"], $_POST["price"], $_POST["note"]);
        }
    }
?>