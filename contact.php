<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - Room 4 Hotel</title>
    <style>
        /* Đặt body là flex container và height 100% để đẩy footer xuống dưới */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        /* Thiết lập nội dung chính chiếm không gian còn lại để footer luôn ở cuối */
        .content {
            flex: 1;
        }
    </style>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #fff;">

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

<!-- Main Content (Flex container để đẩy footer xuống dưới) -->
<div class="content">
    <!-- Banner -->
    <section style="position: relative; width: 100%; height: 670px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
        <img src="banner2.jpg" alt="Banner" style="width: 1920px; height: 670px; object-fit: cover;">
        <!-- Phần Liên Hệ -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 600px; width: 100%; text-align: center; z-index: 1; font-family: 'Be Vietnam Pro', sans-serif;">
            <div style="border: 2px solid #207335; border-radius: 10px; padding: 20px; background-color: rgba(255, 255, 255, 0.9);">
                <h2 style="color: #207335; font-size: 32px; margin-bottom: 20px;">Liên Hệ Với Chúng Tôi</h2>
                <form action="save_contact.php" method="post" style="display: flex; flex-direction: column; gap: 15px;">
                    <input type="text" name="full_name" placeholder="Họ và tên" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <input type="email" name="email" placeholder="Email" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <input type="tel" name="phone" placeholder="Số điện thoại" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <input type="text" name="subject" placeholder="Tiêu đề" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <textarea name="message" placeholder="Nội dung liên hệ, góp ý" rows="5" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; resize: none;"></textarea>
                    <button type="submit" style="background-color: #207335; color: white; padding: 10px; border: none; cursor: pointer;">Gửi</button>
                </form>
            </div>
        </div>
    </section>
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
