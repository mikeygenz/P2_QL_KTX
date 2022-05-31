<?php
  class E_Register {
    public $id_register;
    public $id_dormitory;
    public $id_room;
    public $id_manager;
    public $name_student;
    public $identity_card ;
    public $phone_number;
    public $semester;
    public $date_register ;


    public function resgister_construct($id_register, $id_dormitory, $id_room,$id_manager, $name_student, $identity_card,$phone_number , $semester, $date_register ) {
      $this->id_dorm = $id_dormitory;
      $this->id_room = $id_room;
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
    public function getDormitoryRegister($id_dorm, $semester ) {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.id_dorm = '$id_dorm', REGISTER.semester = '$semester'");
      mysqli_close($conn);
      return $result;
    }
    public function getRoomRegister($id_room, $semester ) {
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.id_room = '$id_room'AND REGISTER.semester = '$semester'");
      mysqli_close($conn);
      return $result;
    }
    public function getSemesterRegister($semester){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT * FROM REGISTER WHERE REGISTER.semester = '$semester'");
      mysqli_close($conn);
      return $result;
    }
    public function createRegister($id_dormitory, $id_room,$id_manager, $name_student, $identity_card,$phone_number , $semester, $date_register){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $sql= "INSERT INTO REGISTER(id_dormitory, id_room, id_manager, name_student, identity_card, phone_number , semester, date_register) 
      VALUE ('$id_dormitory', '$id_room','$id_manager', '$name_student', '$identity_card','$phone_number' , '$semester',' $date_register')";
      $result = $conn->query($sql);
      mysqli_close($conn);
      echo $result->error;
      return $result;
    }
    public function createRegister1($name_dormitory, $name_room,$id_manager, $name_student, $identity_card,$phone_number , $semester, $date_register){
      $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
      $result = $conn->query("SELECT id_dormitory FROM DORMITORY WHERE DORMITORY.name_dormitory = '$name_dormitory'");
      $row= $result->fetch_assoc();
      $id_dormitory= $row["id_dormitory"];
      $result = $conn->query("SELECT id_room FROM ROOM WHERE ROOM.name_room = '$name_room'");
      $row= $result->fetch_assoc();
      $id_room= $row["id_room"];
      $sql= "INSERT INTO REGISTER(id_dormitory, id_room, id_manager, name_student, identity_card, phone_number , semester, date_register) 
      VALUE ('$id_dormitory', '$id_room','$id_manager', '$name_student', '$identity_card','$phone_number' , '$semester',' $date_register')";
      $result = $conn->query($sql);
      mysqli_close($conn);
      echo $result->error;
      return $result;
    }
    public function updateRegister($id_register, $id_room,$id_manager, $name_student, $identity_card,$phone_number , $semester){
        $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
        $sql = "UPDATE REGISTER SET REGISTER.id_room='$id_room', REGISTER.id_manager='$id_manager', REGISTER.name_student='$name_student',
                REGISTER.identity_card='$identity_card', REGISTER.phone_number='$phone_number', REGISTER.semester ='$semester', 
                REGISTER.id_room='$id_room', REGISTER.id_room='$id_room', REGISTER.id_manager='$id_manager' WHERE REGISTER.id_register = '$id_register'";
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
