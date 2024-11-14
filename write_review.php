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

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewer_name = $_POST['reviewer_name'];
    $content = $_POST['content'];
    $rating = $_POST['rating']; // Nhận giá trị đánh giá sao

    // Chuẩn bị truy vấn
    $stmt = $conn->prepare("INSERT INTO reviews (reviewer_name, content, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $reviewer_name, $content, $rating);

    // Thực hiện truy vấn
    if ($stmt->execute()) {
        // Redirect to a thank you page after successful submission
        header("Location: thank_you.php");
        exit;
    } else {
        echo "<p style='color: red; text-align: center;'>Lỗi: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viết Đánh Giá - Room 4 Hotel</title>
    <style>
        /* Sticky Footer */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #fff;
        }
        main {
            flex: 1;
        }
        /* Adjust form and layout styles */
        .container {
            max-width: 600px;
            margin: 40px auto;
            text-align: left;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-size: 18px;
            color: #333;
        }
        input, textarea, button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #207335;
            color: white;
            cursor: pointer;
        }
        /* Styling for star rating */
.stars {
    display: flex;
    justify-content: space-between;
    width: 200px;
    flex-direction: row-reverse; /* Change direction to right-to-left */
}

.stars input[type="radio"] {
    display: none;
}

.stars label {
    font-size: 30px;
    cursor: pointer;
    color: #ccc;
}

/* Make the selected stars from right to left */
.stars input[type="radio"]:checked ~ label {
    color: #FFD700;
}

.stars input[type="radio"]:checked + label {
    color: #FFD700;
}

        /* Prevent textarea resizing */
        textarea {
            resize: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div style="flex: 1;">
            <a href="index.php">
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

<!-- Form Viết Đánh Giá -->
<main>
    <section class="container">
        <div style="border: 2px solid #207335; border-radius: 10px; padding: 20px; background-color: #fff;">
            <h2 style="color: #207335; font-size: 32px; margin-bottom: 20px; text-align: center;">Viết Đánh Giá của Bạn</h2>
            <form action="write_review.php" method="POST">
                <label for="reviewer_name">Tên của bạn:</label>
                <input type="text" id="reviewer_name" name="reviewer_name" required>

                <label for="content">Nội dung đánh giá:</label>
                <textarea id="content" name="content" required rows="5"></textarea>

                <label for="rating">Đánh giá sao:</label>
                <div class="stars">
                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1">★</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">★</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">★</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">★</label>
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">★</label>
                </div>

                <button type="submit">Gửi Đánh Giá</button>
            </form>
        </div>
    </section>
</main>

<!-- Footer -->
<footer style="background-color: #207335; color: white; padding: 20px; text-align: center; margin-top: auto;">
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
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

</body>
</html>
