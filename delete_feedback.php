<?php
// Kết nối tới cơ sở dữ liệu
include 'db_connection.php';

// Kiểm tra nếu có ID của feedback cần xóa
if (isset($_GET['id'])) {
    // Lấy ID của feedback từ URL
    $feedback_id = $_GET['id'];

    // Thực hiện truy vấn xóa feedback khỏi cơ sở dữ liệu
    $stmt = $conn->prepare("DELETE FROM reviews WHERE review_id = :review_id");
    $stmt->bindParam(':review_id', $feedback_id);
    
    // Kiểm tra xem câu lệnh có thực thi thành công hay không
    if ($stmt->execute()) {
        // Chuyển hướng trở lại trang danh sách feedback với thông báo thành công
        header("Location: feedback_manager.php?message=Feedback đã được xóa thành công.");
        exit;
    } else {
        // Nếu xảy ra lỗi khi xóa
        header("Location: feedback_manager.php?message=Lỗi khi xóa feedback.");
        exit;
    }
} else {
    // Nếu không có ID thì chuyển hướng về trang danh sách với thông báo lỗi
    header("Location: feedback_manager.php?message=Không có feedback nào được chọn để xóa.");
    exit;
}
?>
