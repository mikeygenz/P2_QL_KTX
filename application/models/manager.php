<?php
  class E_Manager {
    public $id_manager;
    public $name_manager;
    public $identity_card;
    public $phone_number;
    public $position;
    public $username;
    public $password;

    public function room_construct($id_manager, $name_manager, $identity_card, $phone_number, $position, $username, $password) {
      $this->name_manager = $name_manager;
      $this->id_manager = $id_manager;
      $this->identity_card = $identity_card;
      $this->phone_number = $phone_number;
      $this->position = $position;
      $this->username = $username;
      $this->password = $password;
    }
  }
  class M_Manager {
    public function manager_construct(){}
    public function getAllManager() {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM Manager");
      mysqli_close($conn);
      return $result;
    }
    public function getManager($id_manager){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM MANAGER WHERE MANAGER.id_manager=$id_manager");
      mysqli_close($conn);
      return $result;
    }
    public function createManager($name_manager,$identity_card,$phone_number, $position, $username, $password){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result =$conn->query("INSERT INTO MANAGER (name_manager, identity_card, phone_number, position, username, password) VALUE ('$name_manager','$identity_card','$phone_number', '$position', '$username', '$password')");
      mysqli_close($conn);
      return $result;
    }
    public function updateManager($id_manager,$name_manager,$identity_card,$phone_number, $position, $username, $password){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $result =$conn->query("UPDATE MANAGER SET MANAGER.name_manager='$name_manager',MANAGER.identity_card='$identity_card', MANAGER.phone_number='$phone_number', MANAGER.position='$position', MANAGER.username='$username', MANAGER.password='$password') WHERE MANAGER.id_manager='$id_manager'");
        mysqli_close($conn);
        return $result;
      }
      public function updateInforManager($id_manager,$name_manager,$identity_card,$phone_number){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $result =$conn->query("UPDATE MANAGER SET MANAGER.name_manager='$name_manager',MANAGER.identity_card='$identity_card', MANAGER.phone_number='$phone_number' WHERE MANAGER.id_manager='$id_manager'");
        mysqli_close($conn);
        return $result;
      }
      public function updatePassManager($id_manager,$password){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $result =$conn->query("UPDATE MANAGER SET  MANAGER.password='$password' WHERE MANAGER.id_manager='$id_manager'");
        mysqli_close($conn);
        return $result;
      }
    public function deleteManager($id_manager){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $result =$conn->query("DELETE FROM MANAGER WHERE MANAGER.id_manager= '$id_manager'");
        mysqli_close($conn);
        return $result;
      }
  }
