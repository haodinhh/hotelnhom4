<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "31012004";
$dbname = "hotel_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$phone_number = "";
$booking_info = null;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = $_POST["phone_number"];
    
    // Truy vấn thông tin đặt phòng
    $sql = "SELECT b.room_id, b.check_in_date, b.check_out_date, c.name, c.phone_number, r.room_number, r.room_type, r.price 
            FROM bookings b
            JOIN customers c ON b.customer_id = c.customer_id
            JOIN rooms r ON b.room_id = r.room_id
            WHERE c.phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $booking_info = $result->fetch_assoc();
    } else {
        $error_message = "Không tìm thấy đặt phòng với số điện thoại này.";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phòng Đã Đặt - Room 4 Hotel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #fff;
            border-bottom: 2px solid #ddd;
            padding: 10px 0;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            border: 2px solid #207335;
            text-align: center;
        }

        footer {
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    <div style="flex: 1;">
        <a href="index.php"> <!-- Liên kết quay về trang chủ -->
                <img src="hotel-logo.png" alt="DinhHao Hotel Logo" style="height: 60px;">
            </a>
        </div>
        <nav style="flex: 2; text-align: center;">
            <a href="rooms.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Phòng</a>
            <a href="features.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Tiện Nghi</a>
            <a href="introduce.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Giới Thiệu</a>
            <a href="manage_bookings.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Quản Lý</a>
            <a href="contact.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Liên Hệ</a>
        </nav>
        <div style="flex: 1; text-align: right;">
            <a href="login.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; cursor: pointer; text-decoration: none; margin-right: 10px;">Đăng Nhập</a>
            <a href="register.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; text-decoration: none; cursor: pointer;">Đăng Ký</a>
        </div>
    </div>
</header>

<!-- Phần tra cứu số điện thoại -->
<div class="container">
    <div class="content">
        <h2 style="color: #207335; font-size: 32px; margin-bottom: 20px;">Tra Cứu Đặt Phòng</h2>
        <form method="POST" action="">
            <input type="text" name="phone_number" placeholder="Nhập số điện thoại" required style="padding: 10px; width: 300px; margin-bottom: 20px;">
            <button type="submit" style="background-color: #207335; color: white; padding: 10px 20px; border: none; cursor: pointer;">Tra Cứu</button>
        </form>
        
        <?php if ($booking_info): ?>
            <div style="margin-top: 20px; text-align: left; border: 2px solid #207335; padding: 20px; border-radius: 8px; width: 100%; max-width: 600px;">
                <h3>Thông Tin Đặt Phòng:</h3>
                <p><strong>Tên Khách Hàng:</strong> <?php echo $booking_info['name']; ?></p>
                <p><strong>Số Điện Thoại:</strong> <?php echo $booking_info['phone_number']; ?></p>
                <p><strong>Phòng Số:</strong> <?php echo $booking_info['room_number']; ?></p>
                <p><strong>Loại Phòng:</strong> <?php echo $booking_info['room_type']; ?></p>
                <p><strong>Giá Phòng:</strong> <?php echo number_format($booking_info['price'], 0, ',', '.'); ?> VND/Đêm</p>
                <p><strong>Ngày Nhận Phòng:</strong> <?php echo $booking_info['check_in_date']; ?></p>
                <p><strong>Ngày Trả Phòng:</strong> <?php echo $booking_info['check_out_date']; ?></p>
            </div>
        <?php elseif ($error_message): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</div>

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
        <a href="manager.php" target="_blank" style="color: white; text-decoration: none;">
            <img src="x-icon.png" alt="X" style="width: 20px; margin-right: 5px;">
        </a>
    </p>
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

</body>
</html>

