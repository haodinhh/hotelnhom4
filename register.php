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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize it
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    // SQL query to insert data into the 'users' table
    $query = "INSERT INTO users (username, password, fullname, email, phone, address, dob) 
              VALUES ('$username', '$password', '$fullname', '$email', '$phone', '$address', '$dob')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Redirect to login page after successful registration
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký - Room 4 Hotel</title>
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
            margin: 20px 0; /* Thêm khoảng cách trên và dưới */
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
            font-weight: bold; /* In đậm tiêu đề đăng ký */
        }
        label {
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="password"], input[type="date"] {
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
            font-weight: bold; /* In đậm chữ "Đăng Nhập" */
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
            <a href="index.php"><img src="hotel-logo.png" alt="DinhHao Hotel Logo" style="height: 60px;"></a>
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
        <h2>Đăng Ký</h2>
        <form action="#" method="POST">
            <label for="username">Tên Đăng Nhập</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            
            <label for="password">Mật Khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

            <label for="fullname">Tên Khách Hàng</label>
            <input type="text" id="fullname" name="fullname" placeholder="Nhập tên khách hàng" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" required>
            
            <label for="phone">Số Điện Thoại</label>
            <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
            
            <label for="address">Địa Chỉ</label>
            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" required>
            
            <label for="dob">Ngày Sinh</label>
            <input type="date" id="dob" name="dob" required>
            
            <button type="submit">Đăng Ký</button>
        </form>
        <div class="link">
            <p>Bạn đã có tài khoản? <a href="login.php">Đăng Nhập Ngay</a></p> <!-- Chữ "Đăng Nhập" đã in đậm -->
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
