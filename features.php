<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiện Nghi - Room 4 Hotel</title>
</head>
<body style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #fff;">

<!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1;">
            <a href="index.php"> <!-- Thay đổi đường dẫn tại đây -->
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

<!-- Giới Thiệu Tiện Nghi -->
<section style="max-width: 1200px; margin: 40px auto; text-align: center;">
    <h2 style="font-family: 'SVN-Angellife', sans-serif; letter-spacing: 5px; color: #207335; font-size: 60px; margin-bottom: 40px;">Các Tiện Nghi</h2>
    
    <!-- Hàng 1 -->
    <div style="display: flex; justify-content: space-around; margin-bottom: 40px; gap: 30px;">
        <!-- Điều Hòa -->
        <div style="width: 30%; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
            <img src="dieu-hoa.png" alt="Điều Hòa" style="width: 60px; margin-bottom: 10px;">
            <h3 style="color: #207335; font-family: 'Be VietNam Pro', sans-serif;">Điều Hòa</h3>
            <p style="text-align: justify; line-height: 1.6; font-family: 'Be VietNam Pro', sans-serif;">Tại Room 4 Hotel, mỗi phòng đều được trang bị hệ thống điều hòa 2 chiều hiện đại, giúp duy trì không gian thoải mái, vui vẻ và dễ chịu. Bạn có thể chỉnh nhiệt độ theo sở thích, phù hợp để đảm bảo có những trải nghiệm tuyệt vời xuyên suốt thời gian sử dụng dịch vụ.</p>
        </div>

        <!-- Máy Giặt -->
        <div style="width: 30%; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
            <img src="may-giat.png" alt="Máy Giặt" style="width: 60px; margin-bottom: 10px;">
            <h3 style="color: #207335; font-family: 'Be VietNam Pro', sans-serif;">Máy Giặt</h3>
            <p style="text-align: justify; line-height: 1.6; font-family: 'Be VietNam Pro', sans-serif;">Tại Room 4 Hotel, mỗi phòng đều được trang bị hệ thống máy giặt với công nghệ hiện đại, đa dạng các chức năng giặt giũ nhằm đảm bảo phù hợp với mọi loại vải hiện đang có ở trên thị trường. Đặc biệt, có hệ thống sấy khô giúp khách hàng không phải lo khi đang cần gấp quần áo.</p>
        </div>

        <!-- Bình Nóng Lạnh -->
        <div style="width: 30%; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
            <img src="binh-nong-lanh.png" alt="Bình Nóng Lạnh" style="width: 60px; margin-bottom: 10px;">
            <h3 style="color: #207335; font-family: 'Be VietNam Pro', sans-serif;">Bình Nóng Lạnh</h3>
            <p style="text-align: justify; line-height: 1.6; font-family: 'Be VietNam Pro', sans-serif;">
            Tại Room 4 Hotel, mỗi phòng đều được trang bị bình nóng lạnh tiện lợi, đảm bảo rằng bạn luôn có nước nóng hoặc lạnh vào bất cứ thời gian nào bạn cần. 
            Điều này giúp bạn có những trải nghiệm thoải mái hơn trong suốt thời gian lưu trú.</p>
        </div>
    </div>

    <!-- Hàng 2 -->
    <div style="display: flex; justify-content: space-around; gap: 30px;">
        <!-- Spa -->
        <div style="width: 30%; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
            <img src="spa.png" alt="Spa" style="width: 60px; margin-bottom: 10px;">
            <h3 style="color: #207335; font-family: 'Be VietNam Pro', sans-serif;">Spa</h3>
            <p style="text-align: justify; line-height: 1.6; font-family: 'Be VietNam Pro', sans-serif;">
                Đến với Room 4 Hotel, chúng tôi tự hào tiên phong trong việc cung cấp dịch vụ Spa thư giãn với các liệu pháp chăm sóc sắc đẹp chuyên nghiệp và lành mạnh. Hãy để chúng tôi mang đến cho bạn những phút giây thư giãn sau những thời gian làm việc quá căng thẳng.</p>
        </div>

        <!-- Máy Sưởi -->
        <div style="width: 30%; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
            <img src="may-suoi.png" alt="Máy Sưởi" style="width: 60px; margin-bottom: 10px;">
            <h3 style="color: #207335; font-family: 'Be VietNam Pro', sans-serif;">Máy Sưởi</h3>
            <p style="text-align: justify; line-height: 1.6; font-family: 'Be VietNam Pro', sans-serif;">
                Để đảm bảo sự thoải mái tối đa trong những ngày đông lạnh giá, mỗi phòng của chúng tôi đều được trang bị máy sưởi với công nghệ hiện đại. 
                Bạn sẽ luôn cảm thấy ấm áp và dễ chịu như mùa xuân mặc cho thời tiết bên ngoài như thế nào.</p>
        </div>

        <!-- TV -->
        <div style="width: 30%; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
            <img src="tv.png" alt="TV" style="width: 60px; margin-bottom: 10px;">
            <h3 style="color: #207335; font-family: 'Be VietNam Pro', sans-serif;">TV</h3>
            <p style="text-align: justify; line-height: 1.6; font-family: 'Be VietNam Pro', sans-serif;">
                Tại Room 4 Hotel, mỗi phòng đều được trang bị TV màn hình cong với chất lượng sắc nét, âm thanh sống động. 
                Ngoài ra, TV được tích hợp nhiều kênh truyền hình trong nước và quốc tế. Kèm với đó, TV đi kèm với các dịch vụ thông minh như Youtube, Netflix,... giúp khách hàng trải nghiệm đa dạng.</p>
        </div>
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
