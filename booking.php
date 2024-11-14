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

// Kiểm tra nếu có thông tin phòng được chọn
if (isset($_GET['id'])) {
    $room_id = $_GET['id'];

    // Truy vấn thông tin phòng
    $sql = "SELECT room_type, price, image FROM rooms WHERE room_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Lấy thông tin phòng
    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy phòng.";
        exit;
    }
}

// Xử lý form đặt phòng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    // Thêm khách hàng vào bảng customers
    $sql_customer = "INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)";
    $stmt_customer = $conn->prepare($sql_customer);
    $stmt_customer->bind_param("sss", $name, $email, $phone);
    $stmt_customer->execute();
    $customer_id = $stmt_customer->insert_id; // Lấy ID khách hàng mới được thêm

    // Thêm thông tin đặt phòng vào bảng bookings
    $sql_booking = "INSERT INTO bookings (customer_id, room_id, check_in_date, check_out_date) VALUES (?, ?, ?, ?)";
    $stmt_booking = $conn->prepare($sql_booking);
    $stmt_booking->bind_param("iiss", $customer_id, $room_id, $check_in_date, $check_out_date);
    $stmt_booking->execute();

    
    // Chuyển hướng đến trang thành công
    header("Location: booking_success.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Phòng - DinhHao Hotel</title>
    <style>
        /* Form Styles */
        .booking-form {
            max-width: 600px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 8px;
            border: 2px solid #207335;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .booking-form h2 {
            color: #207335;
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
        }

        .booking-form div {
            margin-bottom: 20px;
        }

        .booking-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .booking-form input {
            padding: 10px;
            width: calc(100% - 20px); /* Căn chỉnh chiều rộng */
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Đảm bảo padding không làm tăng chiều rộng */
        }

        .booking-form button {
            background-color: #207335;
            color: white;
            padding: 12px; /* Điều chỉnh padding để nút lớn hơn */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%; /* Đảm bảo nút chiếm toàn bộ chiều rộng */
            font-size: 16px; /* Điều chỉnh kích thước chữ */
            margin-top: 10px; /* Tạo khoảng cách giữa các trường và nút */
        }

        /* Responsive */
        @media (max-width: 600px) {
            .booking-form {
                padding: 20px; /* Giảm padding trên màn hình nhỏ */
            }

            .booking-form h2 {
                font-size: 28px; /* Giảm kích thước tiêu đề trên màn hình nhỏ */
            }
        }
    </style>
</head>
<body style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #fff;">

<!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1;">
        <a href="index.php"> <!-- Liên kết quay về trang chủ -->
                <img src="logo-hotel.png" alt="DinhHao Hotel Logo" style="height: 60px;">
            </a>
        </div>
        <!-- Navigation -->
        <nav style="flex: 2; text-align: center;">
            <a href="rooms.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Phòng</a>
            <a href="features.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Tiện Nghi</a>
            <a href="introduce.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Giới Thiệu</a>
            <a href="management.php" style="margin: 0 15px; text-decoration: none; color: #207335; font-size: 18px;">Quản Lý</a>
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
    <img src="uploads/<?php echo $room['image']; ?>" alt="Banner" style="width: 100%; height: 400px; object-fit: cover;">
</section>

<!-- Form Đặt Phòng -->
<section>
    <div class="booking-form">
        <h2>Đặt Phòng</h2>
        <form method="POST" action="">
            <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
            <div>
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div>
                <label for="check_in_date">Ngày nhận:</label>
                <input type="date" id="check_in_date" name="check_in_date" required>
            </div>
            <div>
                <label for="check_out_date">Ngày trả:</label>
                <input type="date" id="check_out_date" name="check_out_date" required>
            </div>
            <button type="submit">Đặt Ngay</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer style="background-color: #207335; color: white; padding: 20px; text-align: center;">
    <p>Hotline: 0333.999.222 | 0123.456.789</p>
    <p>
        Theo dõi chúng tôi qua:
        <a href="https://www.facebook.com/hao.vngdinh/" target="_blank" style="color: white; text-decoration: none;">
            <img src="fb-icon.png" alt="Facebook" style="width: 20px; margin-right: 5px;">
        </a>
        <a href="https://www.instagram.com/haor.ddinhf/" target="_blank" style="color: white; text-decoration: none;">
            <img src="instagram-icon.png" alt="Instagram" style="width: 20px; margin-right: 5px;">
        </a>
    </p>
    <p>© 2024 - Bản quyền thuộc về DinhHao Hotel</p>
    <p>Địa chỉ: Xã Nhà Bé - Huyện Nhà Lớn - TP. Nhà Siêu Lớn</p>
</footer>

</body>
</html>
