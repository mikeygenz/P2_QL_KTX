<?php
include_once("../models/room.php");
class C_Room
{
    public function invoke()
    {
        $mRoom = new M_Room;
        $roomList = $mRoom->getAllRoom();
        return $roomList;
    }
    public function getRooms($name_dormitory)
    {
        $mRoom = new M_Room;
        $roomList = $mRoom->getRooms($name_dormitory);
        return $roomList;
    }
    public function getRoom($name_room)
    {
        $mRoom = new M_Room;
        $room = $mRoom->getRoom($name_room);
        return $room;
    }
    public function createRoom($name_dormitory, $name_room, $beds, $price, $note)
    {
        $mRoom = new M_Room;
        $result = $mRoom->createRoom($name_dormitory, $name_room, $beds, $price, $note);
    }
    public function deleteRoom($name_room)
    {
        $mRoom = new M_Room;
        $result = $mRoom->deleteRoom($name_room);
        return $result;
    }
    public function updateRoom($name_room, $beds, $price, $note)
    {
        $mRoom = new M_Room;
        $result = $mRoom->updateRoom($name_room, $beds, $price, $note);
        return $result;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["deleteRoom"])) {
        $c_Room = new C_Room;
        $result = $c_Room->deleteRoom($_POST["name_room"]);
        header("Location: ../views/roomView.php?name_dormitory='$_POST[name_dormitory]'");
        exit;
    }
    if (isset($_POST["updateRoom"])) {
        $c_Room = new C_Room;
        $result = $c_Room->updateRoom($_POST["name_room"], $_POST["beds"], $_POST["price"], $_POST["note"]);
        header("Location: ../views/roomView.php?name_dormitory='$_POST[name_dormitory]'");
        exit;
    }
    if (isset($_POST["editRoom"])) {
        header("Location: ../views/roomEdit.php?name_room='$_POST[name_room]'");
        exit;
    }
}
