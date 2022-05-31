<?php 
    include_once("../models/register.php");
    class C_Register {
        public function getDormitoryRegister($id_dormitory, $semester ){
            $mRegister = new M_Register;
            $result = $mRegister->getDormitoryRegister($id_dormitory, $semester );
            return $result ;
        }
        public function getRoomRegister($id_room, $semester ){
            $mRegister = new M_Register;
            $result = $mRegister->getRoomRegister($id_room, $semester );
            return $result ;
        }
        public function getSemesterRegister($semester){
            $mRegister = new M_Register;
            $result = $mRegister->getSemesterRegister($semester);
            return $result;
        }
        public function createRegister($id_dormitory, $id_room, $id_manager, $name_student, $identity_card, $phone_number, $semester , $date_register ){
            $mRegister = new M_Register;
            $result = $mRegister->createRegister($id_dormitory, $id_room, $id_manager, $name_student, $identity_card, $phone_number, $semester , $date_register );
            return $result;
        }
        public function createRegister1($name_dormitory, $name_room, $id_manager, $name_student, $identity_card, $phone_number, $semester , $date_register ){
            $mRegister = new M_Register;
            $result = $mRegister->createRegister1($name_dormitory, $name_room, $id_manager, $name_student, $identity_card, $phone_number, $semester , $date_register );
            return $result;
        }
        public function deleteRegister($id_register){
            $mRegister = new M_Register;
            $result = $mRegister->deleteRegister($id_register);
            return $result;
        }
        public function updateRegister($id_register, $id_room, $id_manager, $name_student, $identity_card, $phone_number, $semester){
            $mRegister = new M_Register;
            $result = $mRegister->updateRegister($id_register, $id_room, $id_manager, $name_student, $identity_card, $phone_number, $semester);
            return $result;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["createRegister1"])){
            $c_Register = new C_Register;
            $result =$c_Register->createRegister1( $_POST["name_dormitory"], $_POST["name_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"], $_POST["date_register"]);
            header("Location: ../views/register.php");
            exit();
        }
    }
?>
