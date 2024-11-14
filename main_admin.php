<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Khách Sạn - Room 4 Hotel</title>
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
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
        }
        section {
            margin-top: 20px;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #207335;
        }
        .option-button {
            background-color: #207335;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            margin: 10px 0;
            width: 100%;
            text-align: center;
        }
        .option-button:hover {
            background-color: #1a5a27;
        }
        footer {
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
        footer a {
            color: white;
            text-decoration: none;
        }
        /* Keeping the borders for the management options */
        .management-option {
            width: 20%;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .management-option img {
            width: 60px;
            margin-bottom: 10px;
        }
        .management-option h3 {
            color: #207335;
            font-family: 'Be VietNam Pro', sans-serif;
        }
        .management-option button {
            background-color: #207335;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .management-option button:hover {
            background-color: #1a5a27;
        }
    </style>
</head>
<body>

<!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1; text-align: left;">
            <img src="hotel-logo.png" alt="DinhHao Hotel Logo" style="height: 60px;">
        </div>
        <!-- Navigation (Centered) -->
        <div style="flex: 2; display: flex; justify-content: center;">
            <p style="color: #207335; font-size: 20px; font-weight: bold; margin: 0; text-align: center;">QUẢN LÝ KHÁCH SẠN</p>
        </div>
        <!-- Button -->
        <div style="flex: 1; text-align: right;">
            <a href="index.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; text-decoration: none; cursor: pointer;">Thoát</a>
        </div>
    </div>
</header>

<section>
    <h2 style="font-family: 'Be Vietnam Pro', sans-serif; letter-spacing: 0px; color: #207335; font-size: 50px; margin-bottom: 40px;">VUI LÒNG CHỌN CHỨC NĂNG</h2>

    <div style="display: flex; justify-content: space-around; margin-bottom: 40px; gap: 30px;">
        <div class="management-option">
            <img src="hotel-manager.png" alt="QLPKS">
            <h3>QUẢN LÝ PHÒNG KHÁCH SẠN</h3>
            <a href="list_room.php">
                <button>Chọn</button>
            </a>
        </div>

        <div class="management-option">
            <img src="feedback.png" alt="Feedback">
            <h3>QUẢN LÝ CÁC ĐÁNH GIÁ CỦA KHÁCH HÀNG</h3>
            <a href="feedback_manager.php">
                <button>Chọn</button>
            </a>
        </div>

        <div class="management-option">
            <img src="mail.png" alt="Mail">
            <h3>QUẢN LÝ THƯ LIÊN HỆ ĐÓNG GÓP CỦA KHÁCH HÀNG</h3>
            <a href="mail_manager.php">
                <button>Chọn</button>
            </a>
        </div>
    </div>
</section>


<!-- Footer -->
<footer>
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

</body>
</html>
