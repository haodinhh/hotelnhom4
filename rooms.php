<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Địa chỉ máy chủ
$username = "root"; // Tên đăng nhập cơ sở dữ liệu
$password = "31012004"; // Mật khẩu cơ sở dữ liệu
$dbname = "hotel_manager"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng - Room 4 Hotel</title>
    <style>
        /* Thêm font Be Vietnam Pro */
        @font-face {
            font-family: 'Be Vietnam Pro';
            src: url('path/to/BeVietnamPro-Regular.ttf') format('truetype'); /* Đường dẫn đến file font */
        }

        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Be Vietnam Pro', sans-serif; /* Sử dụng font Be Vietnam Pro */
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Đảm bảo body ít nhất cao bằng viewport */
        }
        header {
            background-color: white;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-container a {
            text-decoration: none;
        }
        .header-container img {
            height: 60px;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #207335;
            font-size: 18px;
        }
        .content {
            display: flex;
            justify-content: center;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1; /* Chiếm phần còn lại của không gian */
        }
        .search-box {
            width: 25%;
            background-color: white;
            padding: 20px;
            margin-right: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: sticky;
            top: 20px; /* Giữ vị trí trên khi cuộn */
        }
        .search-box input, .search-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .search-box button {
            width: 100%;
            padding: 10px;
            background-color: #207335;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-box button:hover {
            background-color: #165524;
        }
        .room-list {
            width: 70%;
        }
        .room-card {
            background-color: white;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .room-card img {
            width: 100%;
            height: 200px;
            background-color: #f2f2f2;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        .room-card h3 {
            color: #207335;
            margin: 10px 0;
        }
        .room-card p {
            margin: 5px 0;
        }
        .room-card button {
            padding: 10px;
            background-color: #207335;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .room-card button:hover {
            background-color: #165524;
        }
        footer {
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto; /* Đẩy footer xuống dưới cùng */
            font-family: Arial, sans-serif;
        }
        footer p {
            margin: 5px 0;
        }
        .checkbox-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            gap: 10px; /* Khoảng cách giữa checkbox và nhãn */
        }
        .checkbox-item input {
            margin-right: 0; /* Loại bỏ khoảng cách mặc định */
            transform: scale(1.2); /* Điều chỉnh kích thước checkbox nếu cần */
        }
        .checkbox-item label {
            font-size: 18px;
            color: #207335;
            white-space: nowrap; /* Đảm bảo nội dung không xuống dòng */
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="header-container">
        <!-- Logo -->
        <div>
            <a href="index.php"> <!-- Liên kết quay về trang chủ -->
                <img src="hotel-logo.png" alt="DinhHao Hotel Logo" style="height: 60px;">
            </a>
        </div>
        <!-- Navigation -->
        <nav>
            <a href="rooms.php">Phòng</a>
            <a href="features.php">Tiện Nghi</a>
            <a href="introduce.php">Giới Thiệu</a>
            <a href="manage_bookings.php">Quản Lý</a>
            <a href="contact.php">Liên Hệ</a>
        </nav>
        <!-- Buttons -->
        <div style="text-align: right;">
            <a href="login.php" style="background-color: #207335; color: white; padding: 5px 10px; text-decoration: none; margin-right: 10px;">Đăng Nhập</a>
            <a href="register.php" style="background-color: #207335; color: white; padding: 5px 10px; text-decoration: none;">Đăng Ký</a>
        </div>
    </div>
</header>

<!-- Giới Thiệu Tiện Nghi -->
<section style="max-width: 1200px; margin: 40px auto; text-align: center;">
    <h2 style="font-family: 'SVN-Angellife', sans-serif; letter-spacing: 5px; color: #207335; font-size: 60px; margin-bottom: 5px;">Danh Sách Phòng</h2>
</section>

<!-- Content -->
<div class="content">
    <!-- Search Box -->
    <div class="search-box">
        <h3>Tìm Phòng</h3>
        <label for="checkin">Ngày nhận phòng</label>
        <input type="date" id="checkin" name="checkin">
        <label for="checkout">Ngày trả phòng</label>
        <input type="date" id="checkout" name="checkout">
        <button type="submit">Tìm Kiếm</button>
    </div>

    <!-- Room List -->
    <div class="room-list">
                <?php
                // Truy vấn cơ sở dữ liệu để lấy danh sách phòng
                $sql = "SELECT * FROM rooms"; // Truy vấn danh sách các phòng
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Hiển thị các phòng
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='room-card' style='border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;'>";           
                        // Kiểm tra và hiển thị ảnh từ trường 'image'
                        $image_path = 'uploads/' . $row['image']; // Đường dẫn đến thư mục chứa ảnh
                        if (file_exists($image_path)) {
                            echo "<img src='" . $image_path . "' alt='Phòng " . $row['room_type'] . "' style='width:100%; height:200px; object-fit:cover;'>";
                        } else {
                            echo "<img src='placeholder.jpg' alt='Hình ảnh không khả dụng' style='width:100%; height:200px; object-fit:cover;'>";
                        }
                        
                        echo "<h3>" . $row['room_type'] . " - Phòng số " . $row['room_number'] . "</h3>";
                        echo "<p>Giá: " . number_format($row['price'], 0, ',', '.') . " VND/Đêm</p>";
                        echo "<p>" . $row['description'] . "</p>"; // Hiển thị miêu tả phòng
                        // Nút Đặt Ngay chuyển hướng tới trang đặt phòng với ID phòng
                    echo "<a href='booking.php?id=" . $row['room_id'] . "' style='text-decoration: none;'><button style='background-color: #207335; color: white; padding: 10px; border: none; cursor: pointer;'>Đặt Ngay</button></a>";
                        // Thêm nút Chi Tiết với liên kết đến trang room_details.php
                        echo "<a href='room_details.php?id=" . $row['room_id'] . "' style='text-decoration: none;'><button style='background-color: #A9A9A9; color: white; padding: 10px; border: none; cursor: pointer;'>Chi Tiết</button></a>";
                        echo "</div>";
                    }
                } else {
                    echo "Không có phòng nào.";
                }
                
                $conn->close(); // Đóng kết nối
                ?>
            </div>
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
