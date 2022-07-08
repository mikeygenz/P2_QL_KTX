<?php 
    include_once("../models/register.php");
    class C_Register {
        public function invoke(){
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["createRegister"])){
                    $c_Register = new C_Register;
                    $result =$c_Register->createRegister( $_POST["name_dormitory"], $_POST["name_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"], $_POST["date_register"]);
                    header("Location: ../views/registerView.php");
                    exit();
                }
                if(isset($_POST["updateRegister"])){
                    $c_Register = new C_Register;
                    $result =$c_Register->updateRegister($_POST["id_register"], $_POST["name_dormitory"], $_POST["name_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"]);
                    header("Location: ../views/registerView.php");
                    exit();
                }
                if(isset($_POST["editRegister"])){
                    $id_register=$_POST["id_register"];
                    header("Location: ../views/registerEdit.php?id_register=$id_register");
                    exit();
                }
                if(isset($_POST["searchRegister"])){
                    $c_Register = new C_Register;
                    $result = $c_Register->searchRegister($_POST["name_dormitory"], $_POST["name_room"],$_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"]);
                    $registerList= $result;
                    return $registerList;
                }             
            }
            $c_Register = new C_Register;
            $registerList = $c_Register->getAllRegister();
            return $registerList;

        }
        public function getDormitoryRegister($name_dormitory, $semester ){
            $mRegister = new M_Register;
            $result = $mRegister->getDormitoryRegister($name_dormitory, $semester );
            return $result ;
        }
        public function getAllRegister(){
            $mRegister = new M_Register;
            $result = $mRegister->getAllRegister();
            return $result ;
        }
        public function getRegister($id_register){
            $mRegister = new M_Register;
            $result = $mRegister->getRegister($id_register);
            return $result ;
        }
        public function getRoomRegister($name_room, $semester ){
            $mRegister = new M_Register;
            $result = $mRegister->getRoomRegister($name_room, $semester );
            return $result ;
        }
        public function getSemesterRegister($semester){
            $mRegister = new M_Register;
            $result = $mRegister->getSemesterRegister($semester);
            return $result;
        }
        public function createRegister($name_dormitory, $name_room, $id_manager, $name_student, $identity_card, $phone_number, $semester , $date_register ){
            $mRegister = new M_Register;
            $result = $mRegister->createRegister($name_dormitory, $name_room, $id_manager, $name_student, $identity_card, $phone_number, $semester , $date_register );
            return $result;
        }
        public function searchRegister($name_dormitory, $name_room,$name_student, $identity_card, $phone_number, $semester ){
            $mRegister = new M_Register;
            $result = $mRegister->searchRegister($name_dormitory, $name_room, $name_student, $identity_card, $phone_number, $semester );
            return $result;
        }
        public function deleteRegister($id_register){
            $mRegister = new M_Register;
            $result = $mRegister->deleteRegister($id_register);
            return $result;
        }
        public function updateRegister($id_register,$name_dormitory, $name_room, $id_manager, $name_student, $identity_card, $phone_number, $semester){
            $mRegister = new M_Register;
            $result = $mRegister->updateRegister($id_register,$name_dormitory, $name_room, $id_manager, $name_student, $identity_card, $phone_number, $semester);
            return $result;
        }
    }
    $c_Register = new C_Register;
    $registerList = $c_Register->invoke();
    // if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //     if(isset($_POST["createRegister"])){
    //         $c_Register = new C_Register;
    //         $result =$c_Register->createRegister( $_POST["name_dormitory"], $_POST["name_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"], $_POST["date_register"]);
    //         header("Location: ../views/registerView.php");
    //         exit();
    //     }
    //     if(isset($_POST["updateRegister"])){
    //         $c_Register = new C_Register;
    //         $result =$c_Register->updateRegister($_POST["id_register"], $_POST["name_dormitory"], $_POST["name_room"], $_POST["id_manager"], $_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"]);
    //         header("Location: ../views/registerView.php");
    //         exit();
    //     }
    //     if(isset($_POST["editRegister"])){
    //         $id_register=$_POST["id_register"];
    //         header("Location: ../views/registerEdit.php?id_register=$id_register");
    //         exit();
    //     }
    //     if(isset($_POST["searchRegister"])){
    //         $c_Register = new C_Register;
    //         $result = $c_Register->searchRegister($_POST["name_dormitory"], $_POST["name_room"],$_POST["name_student"], $_POST["identity_card"], $_POST["phone_number"], $_POST["semester"]);
    //     }
    // }

?>
