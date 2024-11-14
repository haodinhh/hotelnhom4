<?php
// Kết nối tới cơ sở dữ liệu
include 'db_connection.php';

// Lấy thông tin phòng từ ID
if (isset($_GET['id'])) {
    $room_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM rooms WHERE room_id = :room_id");
    $stmt->bindParam(':room_id', $room_id);
    $stmt->execute();
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Xử lý việc cập nhật phòng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    // Xử lý upload hình ảnh
    if ($image) {
        $target_dir = "uploads/"; // Thư mục lưu trữ hình ảnh
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Cập nhật thông tin phòng cùng với hình ảnh
        $stmt = $conn->prepare("UPDATE rooms SET room_number = :room_number, room_type = :room_type, price = :price, description = :description, image = :image WHERE room_id = :room_id");
        $stmt->bindParam(':image', $image);
    } else {
        // Nếu không có hình ảnh mới, chỉ cập nhật các thông tin khác
        $stmt = $conn->prepare("UPDATE rooms SET room_number = :room_number, room_type = :room_type, price = :price, description = :description WHERE room_id = :room_id");
    }

    $stmt->bindParam(':room_number', $room_number);
    $stmt->bindParam(':room_type', $room_type);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':room_id', $room_id);

    if ($stmt->execute()) {
        // Điều hướng về trang quản lý phòng sau khi cập nhật thành công
        header("Location: list_room.php"); // Thay "manage_rooms.php" bằng trang quản lý thực tế của bạn
        exit();
    } else {
        echo "Lỗi khi cập nhật thông tin phòng.";
    }
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Phòng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
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
            border: 2px solid #207335;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #207335;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 120px;
        }
        button {
            background-color: #207335;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #1a5a27;
        }
        .image-preview {
            margin: 20px 0;
            text-align: center;
        }
        .image-preview img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        footer {
            background-color: #207335;
            color: white;
            padding: 20px;
            text-align: center;
        }
        footer a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<header style="background-color: #fff; border-bottom: 2px solid #ddd; padding: 10px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Logo -->
        <div style="flex: 1; text-align: left;">
            <img src="logo-hotel.png" alt="DinhHao Hotel Logo" style="height: 60px;">
        </div>
        <!-- Navigation (Centered) -->
        <div style="flex: 2; display: flex; justify-content: center;">
            <p style="color: #207335; font-size: 20px; font-weight: bold; margin: 0; text-align: center;">Hệ thống quản lý phòng khách sạn</p>
        </div>
        <!-- Button -->
        <div style="flex: 1; text-align: right;">
            <a href="list_room.php" style="background-color: #207335; color: white; padding: 5px 10px; border: none; text-decoration: none; cursor: pointer;">Quay Lại</a>
        </div>
    </div>
</header>

<!-- Form Chỉnh Sửa Phòng -->
<section>
    <h2>Chỉnh Sửa Phòng</h2>
    <form action="edit_room.php?id=<?php echo $room['room_id']; ?>" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;"> <!-- Thêm khoảng cách phía dưới -->
            <label for="room_number">Số Phòng</label>
            <input type="text" id="room_number" name="room_number" value="<?php echo $room['room_number']; ?>" required>
        </div>
        <div style="margin-bottom: 15px;"> <!-- Thêm khoảng cách phía dưới -->
            <label for="room_type">Loại Phòng</label>
            <input type="text" id="room_type" name="room_type" value="<?php echo $room['room_type']; ?>" required>
        </div>
        <div style="margin-bottom: 15px;"> <!-- Thêm khoảng cách phía dưới -->
            <label for="price">Giá</label>
            <input type="text" id="price" name="price" value="<?php echo $room['price']; ?>" required>
        </div>
        <div style="margin-bottom: 15px;"> <!-- Thêm khoảng cách phía dưới -->
            <label for="description">Mô Tả</label>
            <textarea id="description" name="description" rows="4" required><?php echo $room['description']; ?></textarea>
        </div>
        <div class="image-preview" style="margin-bottom: 15px;"> <!-- Thêm khoảng cách phía dưới -->
            <label for="image">Hình Ảnh Hiện Tại:</label><br>
            <img src="uploads/<?php echo $room['image']; ?>" alt="Hình Ảnh Phòng">
        </div>
        <div style="margin-bottom: 15px;"> <!-- Thêm khoảng cách phía dưới -->
            <label for="image">Tải Lên Hình Ảnh Mới:</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>
        <button type="submit">Cập Nhật</button>
    </form>
</section>


<!-- Footer -->
<footer>
    <p>Hotline: 0333.999.222 | 0123.456.789</p>
    <p>
        Theo dõi chúng tôi qua:
        <a href="https://www.facebook.com/hao.vngdinh/" target="_blank">
            <img src="fb-icon.png" alt="Facebook" style="width: 20px; margin-right: 5px;">
        </a>
        <a href="https://www.instagram.com/haor.ddinhf/" target="_blank">
            <img src="instagram-icon.png" alt="Instagram" style="width: 20px; margin-right: 5px;">
        </a>
    </p>
    <p>© 2024 - Bản quyền thuộc về DinhHao Hotel</p>
    <p>Địa chỉ: Xã Nhà Bé - Huyện Nhà Lớn - TP. Nhà Siêu Lớn</p>
</footer>

</body>
</html>
