<?php
    include_once("../models/dormitory.php");
    class C_Dormitory {
        public function invoke(){
            $mDormitory = new M_Dormitory;
            $dormitoryList = $mDormitory->getAllDormitory();
            return $dormitoryList;
        }
        public function createDorm($name_dormitory, $rooms, $beds, $price, $note){
            $mDormitory = new M_Dormitory;
            $result =$mDormitory->createDormitory($name_dormitory, $rooms, $beds, $price, $note);
            return $result;
        }
        public function deleteDorm($id_dormitory){
            $mDormitory = new M_Dormitory;
            $result =$mDormitory->deleteDormitory($id_dormitory);
            return $result;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["createDormitory"])){
            $c_Dormitory = new C_Dormitory;
            $result =$c_Dormitory->createDorm( $_POST["name_dormitory"], $_POST["rooms"], $_POST["beds"], $_POST["price"], $_POST["note"]);
            header("Location: ../views/dormitory.php");
            exit;
        }
        if(isset($_POST["deleteDormitory"])){
            $c_Dormitory = new C_Dormitory;
            $result =$c_Dormitory->deleteDorm( $_POST["id_dormitory"]);
            header("Location: ../views/dormitory.php");
            exit;
        }
    }
?>