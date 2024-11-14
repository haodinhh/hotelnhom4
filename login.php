<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Room 4 Hotel</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f7f7f7;
            overflow-x: hidden;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
        }
        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            align-items: center;
        }
        h2 {
            color: #207335;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%; /* Đảm bảo khung nhập liệu rộng 100% */
            padding: 10px; /* Giữ padding như cũ */
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* Đảm bảo padding và border không làm tăng kích thước */
        }
        button {
            width: 100%;
            background-color: #207335;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            height: 45px; /* Chiều cao nút */
            font-size: 16px; /* Kích thước chữ trong nút */
        }
        button:hover {
            background-color: #165524;
        }
        .link {
            text-align: center;
            margin-top: 15px;
        }
        .link a {
            text-decoration: none;
            color: #207335;
        }
        .register-link {
            margin-top: 20px;
            text-align: center;
        }
        .register-link a {
            color: #207335; /* Màu chữ đăng ký */
            text-decoration: none; /* Bỏ gạch chân */
            font-weight: bold; /* In đậm chữ đăng ký */
        }
        header {
            background-color: #fff;
            border-bottom: 2px solid #ddd;
            padding: 10px 0;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        nav {
            flex: 1;
            text-align: right;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #207335;
            font-size: 18px;
        }
        footer {
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="header-container">
        <!-- Logo with link to the main page -->
        <div>
            <a href="index.php"><img src="hotel-logo.png" alt="Room 4 Hotel Logo" style="height: 60px;"></a>
        </div>
        <!-- Navigation -->
        <nav>
            <a href="rooms.php">Phòng</a>
            <a href="features.php">Tiện Nghi</a>
            <a href="introduce.php">Giới Thiệu</a>
            <a href="manage_bookings.php">Quản Lý</a>
            <a href="contact.php">Liên Hệ</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<div class="content" style="font-family: 'Be Vietnam Pro', sans-serif;">
    <div class="container">
        <h2>Đăng Nhập</h2>
        <form action="#" method="POST">
            <label for="username">Tên Đăng Nhập</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            
            <label for="password">Mật Khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            
            <button type="submit">Đăng Nhập</button>
        </form>
        <div class="register-link">
            <p>Bạn chưa có tài khoản? <a href="register.php">Đăng Ký Ngay</a></p> <!-- Chữ "Đăng Ký Ngay" đã in đậm -->
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
