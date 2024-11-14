<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu - Room 4 Hotel</title>
    <link href="https://fonts.googleapis.com/css2?family=Be+VietNam+Pro:wght@400&display=swap" rel="stylesheet"> <!-- Thêm link font -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            display: flex; /* Sử dụng flexbox cho body */
            flex-direction: column; /* Đặt chiều dọc cho các phần tử con */
            min-height: 100vh; /* Đảm bảo body chiếm tối thiểu chiều cao màn hình */
        }
        .content {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            align-items: flex-start;
            gap: 20px;
            flex: 1; /* Làm cho phần nội dung chiếm không gian còn lại */
        }
        .text-section {
            flex: 1;
            padding: 0 20px; /* Căn lề hai bên */
        }
        .image-section {
            flex: 1;
        }
        .statistics {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            font-family: 'Be VietNam Pro', sans-serif; /* Đổi font chữ cho phần thống kê */
        }
        .stat {
            text-align: center;
        }
        .stat-number {
            font-size: 24px;
            color: #207335;
        }
        .stat-number strong {
            font-weight: bold; /* In đậm số liệu */
            font-size: 28px; /* Có thể điều chỉnh kích thước chữ cho số liệu */
        }
        .stat-image {
            width: 50px; /* Đặt chiều rộng cho ảnh minh họa */
            height: auto; /* Chiều cao tự động để duy trì tỉ lệ */
            margin-bottom: 10px; /* Khoảng cách giữa ảnh và số liệu */
        }
        footer {
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

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

<!-- Giới thiệu -->
<section class="content">
    <div class="text-section">
        <h2 style="color: #207335; font-size: 32px; font-family: 'Be VietNam Pro', sans-serif;">Giới thiệu về Room 4 Hotel</h2>
        <p style="font-family: 'Be VietNam Pro', sans-serif; text-align: justify; font-size: 18px; line-height: 1.6;">Room 4 Hotel tự hào là một trong những điểm đến đầu hàng Việt Nam để cho những ai tìm kiếm trải nghiệm lưu trú tuyệt vời tại khu vực. 
            Với vị trí đắc địa, khách sạn mang đến không gian yên bình và sang trọng, phù hợp cho cả du khách nghỉ dưỡng và doanh nhân. 
            Chúng tôi cam kết cung cấp dịch vụ chất lượng cao với đội ngũ nhân viên chuyên nghiệp, tận tâm và luôn sẵn sàng đáp ứng mọi nhu cầu của khách hàng. 
            Các phòng nghỉ được thiết kế hiện đại và tiện nghi, mang đến cảm giác thoải mái như ở nhà. Ngoài ra, Room 4 Hotel còn có nhiều đa dạng các tiện nghi như: Spa, TV, Điều Hòa,... và dịch vụ chăm sóc khách hàng 24/7, giúp mỗi kỳ nghỉ của bạn trở nên hoàn hảo hơn. 
            Hãy đến với Room 4 Hotel để trải nghiệm dịch vụ tuyệt vời và những kỷ niệm đáng nhớ!</p>
    </div>
    <div class="image-section">
        <img src="introducee.png" alt="Room 4 Hotel" style="width: 100%; height: auto; border-radius: 10px;">
    </div>
</section>

<!-- Thống kê -->
<section class="statistics">
    <div class="stat">
        <img src="hotel-icon.png" alt="Phòng" class="stat-image">
        <div class="stat-number"><strong>+100</strong></div> <!-- Đã in đậm số liệu -->
        <p>Phòng</p>
    </div>
    <div class="stat">
        <img src="customer-icon.png" alt="Khách hàng" class="stat-image">
        <div class="stat-number"><strong>+200</strong></div> <!-- Đã in đậm số liệu -->
        <p>Khách hàng</p>
    </div>
    <div class="stat">
        <img src="rate-icon.png" alt="Đánh giá" class="stat-image">
        <div class="stat-number"><strong>+200</strong></div> <!-- Đã in đậm số liệu -->
        <p>Đánh giá</p>
    </div>
    <div class="stat">
        <img src="member-icon.png" alt="Nhân viên" class="stat-image">
        <div class="stat-number"><strong>50+</strong></div> <!-- Đã in đậm số liệu -->
        <p>Nhân viên</p>
    </div>
</section>

<!-- Giới thiệu Chủ Tịch -->
<section class="content">
    <div class="image-section" style="flex: 1;">
        <img src="chutichhao.jpg" alt="Chủ Tịch" style="width: 100%; height: auto; border-radius: 10px;">
    </div>
    <div class="text-section" style="flex: 1; padding: 0 20px;">
        <h2 style="color: #207335; font-size: 32px; font-family: 'Be VietNam Pro', sans-serif;">Chủ tịch của Room 4 Hotel</h2>
        <p style="font-family: 'Be VietNam Pro', sans-serif; text-align: justify; font-size: 18px; line-height: 1.6;">
        Chủ tịch của Room 4 Hotel - ông Vương Đình Hảo là một trong những nhà lãnh đạo đầu hàng trong ngành khách sạn tại Việt Nam.
         Với hơn 25 năm kinh nghiệm trong lĩnh vực quản lý khách sạn và dịch vụ khách hàng, ông đã góp phần quan trọng vào sự phát triển và thành công của Room 4 Hotel.
          Ông luôn đặt khách hàng làm trung tâm, cam kết mang lại những trải nghiệm tuyệt vời nhất cho du khách.
           Dưới sự dẫn dắt của ông, Room 4 Hotel đã nhận được nhiều giải thưởng danh giá và trở thành một trong những khách sạn được yêu thích nhất trong khu vực Đông Nam Á.
        </p>
    </div>
</section>

<!-- Giới thiệu Đội Ngũ -->
<section class="content">
    <div class="text-section" style="flex: 1; padding: 0 20px;">
        <h2 style="color: #207335; font-size: 32px; font-family: 'Be VietNam Pro', sans-serif;">Đội ngũ của Room 4 Hotel</h2>
        <p style="font-family: 'Be VietNam Pro', sans-serif; text-align: justify; font-size: 18px; line-height: 1.6;">
        Đội ngũ nhân viên tại Room 4 Hotel là một tập hợp những chuyên gia giàu kinh nghiệm, nhiệt huyết và luôn sẵn sàng phục vụ khách hàng. 
        Chúng tôi tự hào về việc có một đội ngũ đa dạng và năng động, bao gồm các quản lý khách sạn, nhân viên lễ tân, phục vụ phòng, và các chuyên gia trong lĩnh vực dịch vụ khách hàng. 
        Mỗi thành viên trong đội ngũ đều cam kết cung cấp dịch vụ tận tâm và chu đáo, đảm bảo rằng mỗi khách hàng đều cảm thấy thoải mái và hài lòng khi lưu trú tại Room 4 Hotel.
        Chúng tôi luôn nỗ lực không ngừng để nâng cao chất lượng dịch vụ và tạo ra những trải nghiệm đáng nhớ cho khách hàng.
        </p>
    </div>
    <div class="image-section" style="flex: 1;">
        <img src="system-run.jpg" alt="Đội ngũ Hảo Hotel" style="width: 100%; height: auto; border-radius: 10px;">
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
        <a href="manager.php" target="_blank" style="color: white; text-decoration: none;">
            <img src="x-icon.png" alt="X" style="width: 20px; margin-right: 5px;">
        </a>
    </p>
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

</body>
</html>
