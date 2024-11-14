<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "31012004";  // Thay đổi mật khẩu nếu cần
$dbname = "hotel_manager"; // Cơ sở dữ liệu chứa bảng admin_accounts

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Tạo câu truy vấn để kiểm tra tài khoản admin
    $sql = "SELECT * FROM admin_accounts WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $admin_username, $admin_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra nếu tài khoản hợp lệ
    if ($result->num_rows > 0) {
        // Tài khoản đúng, chuyển hướng tới trang quản lý
        header("Location: main_admin.php");
        exit();
    } else {
        // Tài khoản sai, hiển thị thông báo lỗi
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
    $stmt->close();
}

$conn->close();
?>
