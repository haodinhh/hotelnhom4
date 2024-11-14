<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Lý - Room 4 Hotel</title>
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
            width: 100%; 
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            background-color: #207335;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            height: 45px;
            font-size: 16px;
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
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: center; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1; text-align: left;">
            <img src="hotel-logo.png" alt="Room 4 Hotel Logo" style="height: 60px;">
        </div>
        <!-- Navigation -->
        <nav style="flex: 2; text-align: center;">
            <p style="color: #207335; font-size: 20px; font-weight: bold; margin: 0;">HỆ THỐNG QUẢN LÝ</p>
        </nav>
        <!-- Empty Div for alignment -->
        <div style="flex: 1; text-align: right;">
            <a href="index.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; text-decoration: none; cursor: pointer;">Thoát</a>
        </div>
</header>


<!-- Main Content -->
<div class="content" style="font-family: 'Be Vietnam Pro', sans-serif;">
    <div class="container">
        <h2>Đăng Nhập</h2>
        <form action="admin_login.php" method="POST">
            <label for="username">Tên Đăng Nhập</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            
            <label for="password">Mật Khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            
            <button type="submit">Đăng Nhập</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

</body>
</html>
