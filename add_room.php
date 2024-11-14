<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "31012004";
$dbname = "hotel_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $description = $_POST['description']; // Lấy miêu tả từ form
    
    // Xử lý upload ảnh
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Kiểm tra định dạng file ảnh
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        die("Chỉ cho phép các định dạng ảnh: JPG, JPEG, PNG, GIF.");
    }
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = basename($_FILES["image"]["name"]); // Lưu tên file ảnh

        // Thêm thông tin phòng vào cơ sở dữ liệu
        $sql = "INSERT INTO rooms (room_number, room_type, price, description, image) VALUES (?, ?, ?, ?, ?)"; // Cập nhật câu lệnh SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdss", $room_number, $room_type, $price, $description, $image); // Cập nhật các tham số

        if ($stmt->execute()) {
            // Chuyển hướng về trang danh sách phòng với thông báo thành công
            header("Location: list_room.php?message=Thêm phòng thành công!");
            exit(); // Dừng script ngay sau khi chuyển hướng
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Có lỗi khi upload hình ảnh.";
    }
}

$conn->close();
?>
