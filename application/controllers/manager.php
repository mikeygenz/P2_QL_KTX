<?php
    include_once("../models/manager.php");
    class C_Manager {
        public function invoke(){
            $mManager = new M_Manager;
            $managerList = $mManager->getAllManager();
            return $managerList;
        }
        public function createManager($name_manager,$identity_card,$phone_number, $position, $username, $password){
            $mManager = new M_Manager;
            $result =$mManager->createManager($name_manager,$identity_card,$phone_number, $position, $username, $password);
            return $result;
        }
        public function updateInforManager($id_manager,$name_manager,$identity_card,$phone_number){
            $mManager = new M_Manager;
            $result =$mManager->updateInforManager($id_manager,$name_manager,$identity_card,$phone_number);
            return $result;
        }
        public function updatePassManager($id_manager, $password){
            $mManager = new M_Manager;
            $result =$mManager->updatePassManager($id_manager, $password);
            return $result;
        }
        public function updateManager($id_manager,$name_manager,$identity_card,$phone_number, $position, $username, $password){
            $mManager = new M_Manager;
            $result =$mManager->updateManager($id_manager,$name_manager,$identity_card,$phone_number, $position, $username, $password);
            return $result;
        }
        public function deleteManager($id_manager){
            $mManager = new M_Manager;
            $result =$mManager->deleteManager($id_manager);
            return $result;
        }
        public function getManager($id_manager){
            $mManager = new M_Manager;
            $result =$mManager->getManager($id_manager);
            return $result;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["createManager"])){
            $c_Manager = new C_Manager;
            $result =$c_Manager->createManager( $_POST["name_manager"], $_POST["identity_card"], $_POST["phone_number"], $_POST["position"], $_POST["username"], $_POST["password"]);
            header("Location: ../views/managerView.php");
            exit;
        }
        if(isset($_POST["deleteManager"])){
            $c_Manager = new C_Manager;
            $result =$c_Manager->deleteManager( $_POST["id_manager"]);
            header("Location: ../views/managerView.php");
            exit;
        }
        if(isset($_POST["editManager"])){
            $c_Manager = new C_Manager;
            $id_manager=$_POST["id_manager"];
            header("Location: ../views/managerEdit.php?id_manager='$id_manager'");
            exit;
        }
        if(isset($_POST["editInforManager"])){
            $c_Manager = new C_Manager;
            $result =$c_Manager->updateInforManager($_POST["id_manager"], $_POST["name_manager"], $_POST["identity_card"], $_POST["phone_number"]);
            header("Location: ../views/managerView.php");
            exit;
        }
        if(isset($_POST["editPassManager"])){
            $c_Manager = new C_Manager;
            $result =$c_Manager->updatePassManager($_POST["id_manager"],  $_POST["new2_password"]);
            header("Location: ../views/managerView.php");
            exit;
        }
    }
?>