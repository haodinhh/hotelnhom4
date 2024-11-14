<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost"; // Thay đổi nếu cần
$username = "root"; // Tên đăng nhập MySQL
$password = "31012004"; // Mật khẩu MySQL
$dbname = "hotel_manager"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy room_id từ URL
if (isset($_GET['id'])) {
    $room_id = intval($_GET['id']); // Chuyển đổi sang kiểu số nguyên
    // Truy vấn dữ liệu cho phòng cụ thể
    $sql = "SELECT room_number, room_type, price, image, description FROM rooms WHERE room_id = $room_id";
    $result = $conn->query($sql);

    // Kiểm tra nếu có dữ liệu trả về
    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc(); // Lấy dữ liệu phòng
    } else {
        echo "<script>alert('Không tìm thấy phòng!'); window.location.href='rooms.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID phòng không hợp lệ!'); window.location.href='rooms.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Phòng - DinhHao Hotel</title>
</head>
<body style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #fff;">

 <!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1;">
            <a href="index.php"> <!-- Thay đổi đường dẫn tại đây -->
                <img src="logo-hotel.png" alt="DinhHao Hotel Logo" style="height: 60px;">
            </a>
        </div>
        <!-- Navigation -->
        <nav style="flex: 2; text-align: center;">
            <a href="rooms.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Phòng</a>
            <a href="features.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Tiện Nghi</a>
            <a href="introduce.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Giới Thiệu</a>
            <a href="manage_bookings.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Quản Lý</a>
            <a href="contact.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Liên Hệ</a>
        </nav>
        <!-- Buttons -->
        <div style="flex: 1; text-align: right;">
            <a href="login.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; cursor: pointer; text-decoration: none; margin-right: 10px;">Đăng Nhập</a>
            <a href="register.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; text-decoration: none; cursor: pointer;">Đăng Ký</a>
        </div>
    </div>
</header>

<!-- Banner -->
<section style="position: relative; text-align: center;">
    <img src="uploads/<?php echo $room['image']; ?>" alt="Phòng <?php echo $room['room_type']; ?>" style="width: 100%; height: 400px; object-fit: cover;">
</section>

<!-- Chi Tiết Phòng -->
<section style="max-width: 1200px; margin: 20px auto; text-align: center; font-family: 'Be Vietnam Pro', sans-serif;">
    <div style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; border: 2px solid #207335;">
        <h2 style="color: #207335; font-size: 32px; margin-bottom: 20px;">Chi Tiết Phòng</h2>
        <h3 style="color: #207335;">Loại Phòng: <?php echo $room['room_type']; ?> - Số Phòng: <?php echo $room['room_number']; ?></h3>
        <p style="font-size: 24px; color: #207335;">Giá: <?php echo number_format($room['price'], 0, ',', '.'); ?> VND/Đêm</p>
        <p style="margin-top: 20px;"><?php echo $room['description']; ?></p>
        <button style="background-color: #207335; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 20px;">Đặt Ngay</button>
    </div>
</section>

<!-- Footer -->
<footer style="background-color: #207335; color: white; padding: 20px; text-align: center;">
    <p>Hotline: 0333.999.222 | 0123.456.789</p>
    <p>
        Theo dõi chúng tôi qua:
        <a href="https://www.facebook.com" target="_blank" style="color: white; text-decoration: none;">
            <img src="fb-icon.png" alt="Facebook" style="width: 20px; margin-right: 5px;">
        </a>
        <a href="https://www.instagram.com" target="_blank" style="color: white; text-decoration: none;">
            <img src="instagram-icon.png" alt="Instagram" style="width: 20px; margin-right: 5px;">
        </a>
    </p>
    <p>© 2024 - Bản quyền thuộc về và Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>


</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
