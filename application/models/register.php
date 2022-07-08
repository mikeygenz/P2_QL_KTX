<?php
  class E_Register {
    public $id_register;
    public $name_dormitory;
    public $name_room;
    public $id_manager;
    public $name_student;
    public $identity_card ;
    public $phone_number;
    public $semester;
    public $date_register ;


    public function resgister_construct($id_register, $name_dormitory, $name_room,$id_manager, $name_student, $identity_card,$phone_number , $semester, $date_register ) {
      $this->name_dormitory = $name_dormitory;
      $this->name_room = $name_room;
      $this->name_student = $name_student;
      $this->id_manager = $id_manager ;
      $this->id_register = $id_register;
      $this->identity_card = $identity_card;
      $this->phone_number = $phone_number;
      $this->semester = $semester;
      $this->date_register = $date_register ;

    }
  }
  class M_Register {
    public function register_construct(){}
    public function getAllRegister() {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER");
      mysqli_close($conn);
      return $result;
    }
    public function getRegister($id_register) {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.id_register = '$id_register'");
      mysqli_close($conn);
      return $result;
    }
    public function getDormitoryRegister($name_dormitory, $semester ) {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.name_dormitory = '$name_dormitory', REGISTER.semester = '$semester'");
      mysqli_close($conn);
      return $result;
    }
    public function getRoomRegister($name_room, $semester ) {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.name_room = '$name_room'AND REGISTER.semester = '$semester'");
      mysqli_close($conn);
      return $result;
    }
    public function getSemesterRegister($semester){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.semester = '$semester'");
      mysqli_close($conn);
      return $result;
    }
    public function createRegister($name_dormitory, $name_room,$id_manager, $name_student, $identity_card,$phone_number , $semester, $date_register){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $sql= "INSERT INTO REGISTER(name_dormitory, name_room, id_manager, name_student, identity_card, phone_number , semester, date_register) 
      VALUE ('$name_dormitory', '$name_room','$id_manager', '$name_student', '$identity_card','$phone_number' , '$semester',' $date_register')";
      $result = $conn->query($sql);
      mysqli_close($conn);
      echo $result->error;
      return $result;
    }
    public function searchRegister($name_dormitory, $name_room,$name_student, $identity_card,$phone_number , $semester){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $sql= "SELECT * FROM REGISTER WHERE REGISTER.name_dormitory LIKE '%$name_dormitory%'
      AND REGISTER.name_room LIKE '%$name_room%'
      AND REGISTER.name_student LIKE '%$name_student%'
      AND REGISTER.identity_card LIKE '%$identity_card%'
      AND REGISTER.phone_number LIKE '%$phone_number%'
      AND REGISTER.semester LIKE '%$semester%'";
      $result = $conn->query($sql);
      mysqli_close($conn);
      return $result;
    }
    public function updateRegister($id_register,$name_dormitory, $name_room,$id_manager, $name_student, $identity_card,$phone_number , $semester){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $sql = "UPDATE REGISTER SET REGISTER.name_dormitory='$name_dormitory', REGISTER.name_room='$name_room', REGISTER.id_manager='$id_manager', 
                REGISTER.name_student='$name_student',REGISTER.identity_card='$identity_card', REGISTER.phone_number='$phone_number', REGISTER.semester ='$semester'
                WHERE REGISTER.id_register = '$id_register'";
        $result = $conn->query($sql);
        mysqli_close($conn);
      }
    public function deleteRegister($id_register){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $conn->query("DELETE FROM REGISTER WHERE REGISTER.id_register = '$id_register'");
        mysqli_close($conn);
    }
  }
?>
