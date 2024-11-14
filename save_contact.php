<?php
// Kết nối tới cơ sở dữ liệu
include 'db_connection.php';

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Thực hiện truy vấn lưu thông tin vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO contact_requests (full_name, email, phone, subject, message) VALUES (:full_name, :email, :phone, :subject, :message)");
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);

    // Kiểm tra nếu việc lưu thành công
    if ($stmt->execute()) {
        // Chuyển hướng đến trang cảm ơn
        header("Location: thank_you.php");
        exit;
    } else {
        echo "Có lỗi xảy ra khi lưu thông tin. Vui lòng thử lại.";
    }
}
?>
