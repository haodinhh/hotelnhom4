<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "31012004";
$dbname = "hotel_manager";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the number of reviews to load per request
$limit = 10;

// Check if this is an AJAX request for additional reviews
if (isset($_GET['load_more'])) {
    $offset = (int)$_GET['offset'];
    $sql = "SELECT content, reviewer_name, rating FROM reviews LIMIT $limit OFFSET $offset";
    $review_result = $conn->query($sql);

    if ($review_result->num_rows > 0) {
        while ($review_row = $review_result->fetch_assoc()) {
            echo "<div style='border: 1px solid #ddd; border-radius: 8px; padding: 20px; margin-bottom: 20px; text-align: left; display: flex; justify-content: space-between; align-items: center;'>";
            echo "<div style='flex: 1;'>";
            echo "<p><strong>" . htmlspecialchars($review_row['content']) . "</strong></p>";
            echo "<p><em>- " . htmlspecialchars($review_row['reviewer_name']) . "</em></p>";
            echo "</div>";
            // Display stars for the rating
            echo "<div style='margin-left: 20px;'>";
            for ($i = 1; $i <= 5; $i++) {
                echo "<span style='color: " . ($i <= $review_row['rating'] ? "#FFD700" : "#ddd") . ";'>&#9733;</span>";
            }
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Không có đánh giá nào khác.</p>";
    }
    exit();
}

// Initial query to load the first 10 reviews
$sql = "SELECT content, reviewer_name, rating FROM reviews LIMIT $limit";
$review_result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Đánh Giá - Room 4 Hotel</title>
</head>
<body style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #fff;">

<!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1;">
            <a href="index.php">
                <img src="hotel-logo.png" alt="DinhHao Hotel Logo" style="height: 60px;">
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
    <img src="banner.jpg" alt="Banner" style="width: 100%; height: 400px; object-fit: cover;">
</section>

<!-- Reviews Section -->
<section style="max-width: 800px; margin: -150px auto 40px; padding: 20px; border: 2px solid #207335; border-radius: 10px; background-color: #fff; text-align: center; position: relative; z-index: 10;">
    <h2 style="color: #207335; font-size: 32px; margin-bottom: 20px;">Đánh Giá</h2>

    <div id="review-container">
    <?php
    if ($review_result->num_rows > 0) {
        while ($review_row = $review_result->fetch_assoc()) {
            echo "<div style='border: 1px solid #ddd; border-radius: 8px; padding: 20px; margin-bottom: 20px; text-align: left; display: flex; justify-content: space-between; align-items: center;'>";
            echo "<div style='flex: 1;'>";
            echo "<p><strong>" . htmlspecialchars($review_row['content']) . "</strong></p>";
            echo "<p><em>- " . htmlspecialchars($review_row['reviewer_name']) . "</em></p>";
            echo "</div>";
            // Display stars for the rating
            echo "<div style='margin-left: 20px;'>";
            for ($i = 1; $i <= 5; $i++) {
                echo "<span style='color: " . ($i <= $review_row['rating'] ? "#FFD700" : "#ddd") . ";'>&#9733;</span>";
            }
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Chưa có đánh giá nào.</p>";
    }
    ?>
</div>


    <!-- "Write Review" Button -->
    <a href="write_review.php" style="position: absolute; top: 45px; right: 20px; background-color: #C88BD9; color: white; padding: 10px 10px; border: none; border-radius: 5px; text-decoration: none; font-size: 14px;">Viết Đánh Giá</a>

    <!-- "Load More" Button -->
    <button id="load-more" style="background-color: #207335; color: white; padding: 10px 20px; border: none; cursor: pointer;">Xem Thêm</button>
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
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

<script>
    let offset = <?php echo $limit; ?>;

    document.getElementById('load-more').addEventListener('click', function() {
        fetch(`view_reviews.php?load_more=true&offset=${offset}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('review-container').innerHTML += data;
                offset += <?php echo $limit; ?>;
            })
            .catch(error => console.error('Error loading more reviews:', error));
    });
</script>

</body>
</html>
