<?php
// Kết nối tới cơ sở dữ liệu
include 'db_connection.php';

// Khởi tạo biến thông báo
$message = '';

// Xử lý việc xóa yêu cầu
if (isset($_GET['delete'])) {
    $request_id = $_GET['delete'];
    // Thực hiện truy vấn xóa yêu cầu khỏi cơ sở dữ liệu
    $stmt = $conn->prepare("DELETE FROM contact_requests WHERE id = :id");
    $stmt->bindParam(':id', $request_id);
    if ($stmt->execute()) {
        // Xóa thành công, thông báo sẽ được hiển thị
        $message = "Yêu cầu đã được xóa thành công.";
    } else {
        $message = "Lỗi khi xóa yêu cầu.";
    }
}

// Lấy danh sách yêu cầu từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT * FROM contact_requests");
$stmt->execute();
$contact_requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thư Đóng Góp - Room 4 Hotel</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #207335;
            color: white;
        }
        button {
            padding: 10px;
            background-color: #207335;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #165524;
        }
        .message {
            color: #d9534f; /* Màu đỏ cho thông báo */
            text-align: center;
            margin-bottom: 20px;
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
            <img src="hotel-logo.png" alt="DinhHao Hotel Logo" style="height: 60px;">
        </div>
        <!-- Navigation -->
        <nav style="flex: 2; text-align: center;">
            <p style="color: #207335; font-size: 20px; font-weight: bold; margin: 0;">QUẢN LÝ THƯ ĐÓNG GÓP KHÁCH HÀNG</p>
        </nav>
        <!-- Empty Div for alignment -->
        <div style="flex: 1; text-align: right;">
            <a href="main_admin.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; text-decoration: none; cursor: pointer;">Quay lại</a>
        </div>
    </div>
</header>

<div class="container">
    <!-- Thông báo -->
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Email</th>
                <th>Điện Thoại</th>
                <th>Chủ Đề</th>
                <th>Thông Điệp</th>
                <th>Ngày Gửi</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contact_requests as $request): ?>
            <tr>
                <td><?php echo $request['id']; ?></td>
                <td><?php echo $request['full_name']; ?></td>
                <td><?php echo $request['email']; ?></td>
                <td><?php echo $request['phone']; ?></td>
                <td><?php echo $request['subject']; ?></td>
                <td><?php echo $request['message']; ?></td>
                <td><?php echo $request['created_at']; ?></td>
                <td>
                    <a href="manage_contact_requests.php?delete=<?php echo $request['id']; ?>"><button>Xóa</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer>
    <p>© 2024 - Bản quyền thuộc về Room 4 Hotel</p>
    <p>Địa chỉ: Số 41 P. Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
</footer>

</body>
</html>
