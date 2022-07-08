<?php 
    session_start();
    session_destroy();
    session_start();
    $conn = new mysqli("127.0.0.1", "root", "", "ql_ktx");
    $u = $_POST["user_name"];
    $p= $_POST["password"];
    $result = $conn->query("SELECT * FROM MANAGER WHERE MANAGER.username='$u' AND MANAGER.password='$p'");
    mysqli_close($conn);
    if($result->num_rows > 0){
        $data = mysqli_fetch_array($result);
        $_SESSION["position"] = $data["position"];
        $_SESSION["user_id"] = $data["id_manager"];
        $_SESSION["name_manager"]= $data["name_manager"];
        if($_SESSION["position"] == "Quản lý"){
            $_SESSION["permission"] = 1;
        }else{
            $_SESSION["permission"] = 0;
        }
        header("Location: ./views/home.php");
        exit;
    }else{
        header("Location: ./index.php");
        exit;
    }
?>