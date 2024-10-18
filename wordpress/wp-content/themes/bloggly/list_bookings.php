<?php
require_once('../../../wp-config.php'); // Đường dẫn tùy vào vị trí file
global $wpdb;

// Lấy dữ liệu từ bảng wp_bookings
$bookings = $wpdb->get_results("SELECT * FROM wp_bookings ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Đặt Sân</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Danh sách Đặt Sân</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Loại Sân</th>
                <th>Ngày</th>
                <th>Giờ</th>
                <th>Thời Lượng</th>
                <th>Giá</th>
                <th>Phương Thức Thanh Toán</th>
                <th>Ghi Chú</th>
                <th>Ngày Đặt</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($bookings): ?>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= $booking->id ?></td>
                        <td><?= $booking->fullname ?></td>
                        <td><?= $booking->phone ?></td>
                        <td><?= $booking->email ?></td>
                        <td><?= $booking->field_type ?></td>
                        <td><?= $booking->booking_date ?></td>
                        <td><?= $booking->booking_time ?></td>
                        <td><?= $booking->duration ?> phút</td>
                        <td><?= $booking->price ?></td>
                        <td><?= $booking->payment_method ?></td>
                        <td><?= $booking->notes ?></td>
                        <td><?= $booking->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="12">Chưa có đặt sân nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
