<?php
if (isset($_SESSION['user_id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('http://localhost:3000/application/index.php');
}else {
	if (isset($_SESSION['permission']) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_SESSION['permission'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($permission == '0') {
			// Nếu không phải admin thì xuất thông báo
			header('http://localhost:3000/application/views/home.php');
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='http://localhost:3000/application/views/home.php'> Click để về lại trang chủ</a>";
			exit();
		}else{
		}
	}
}
?>