<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sanbongmc";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kích hoạt hiển thị lỗi
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Xử lý khi có form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $field = $_POST['field'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';
    $notes = $_POST['notes'] ?? '';

    // Hiển thị dữ liệu gửi lên
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Kiểm tra nếu các trường bắt buộc không bị rỗng
    if (empty($fullname) || empty($phone) || empty($field) || empty($date) || empty($time) || empty($duration) || empty($payment_method)) {
        echo "Vui lòng điền tất cả các trường bắt buộc.";
    } else {
        // Sử dụng Prepared Statements để chèn dữ liệu
        $stmt = $conn->prepare("INSERT INTO reservations (fullname, phone, email, field, date, time, duration, payment_method, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $fullname, $phone, $email, $field, $date, $time, $duration, $payment_method, $notes);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            echo "Đặt sân thành công!";
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        // Đóng câu lệnh
        $stmt->close();
    }
} else {
    echo "Form chưa được gửi.";
}

// Đóng kết nối
$conn->close();
?>
