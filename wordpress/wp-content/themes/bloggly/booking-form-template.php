<?php
/* Template Name: Booking Form */
get_header(); 
?>
<div class="container">
    <h2>Đặt Sân - Mỏ Cày Football Club</h2>
    <form action="" method="POST">
        <!-- Thông tin người đặt -->
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" required placeholder="Nhập họ và tên">

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" required placeholder="Nhập số điện thoại">

        <label for="email">Email (tuỳ chọn):</label>
        <input type="email" id="email" name="email" placeholder="Nhập email">

        <!-- Thông tin đặt sân -->
        <label for="field">Chọn sân:</label>
        <select id="field" name="field" required>
            <option value="5-nguoi">Sân 5 người</option>
            <option value="7-nguoi">Sân 7 người</option>
            <option value="11-nguoi">Sân 11 người</option>
        </select>

        <label for="date">Ngày đặt sân:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Giờ bắt đầu:</label>
        <input type="time" id="time" name="time" required>

        <label for="duration">Thời lượng đặt sân:</label>
        <select id="duration" name="duration" required>
            <option value="60">60 phút</option>
            <option value="90">90 phút</option>
            <option value="120">120 phút</option>
        </select>

        <label for="price">Giá thuê (VND):</label>
        <input type="text" id="price" name="price" readonly value="500000 VND/giờ">

        <!-- Phương thức thanh toán -->
        <label>Phương thức thanh toán:</label>
        <select name="payment_method" required>
            <option value="pay_at_field">Thanh toán khi đến sân</option>
            <option value="bank_transfer">Chuyển khoản ngân hàng</option>
            <option value="e_wallet">Ví điện tử</option>
        </select>

        <!-- Ghi chú thêm -->
        <label for="notes">Ghi chú thêm (không bắt buộc):</label>
        <textarea id="notes" name="notes" rows="3" placeholder="Yêu cầu đặc biệt..."></textarea>

        <!-- Điều khoản và xác nhận -->
        <div class="terms">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">Tôi đồng ý với các điều khoản và chính sách của sân.</label>
        </div>

        <!-- Nút gửi -->
        <button type="submit" class="btn">Đặt Sân</button>
    </form>
</div>
<?php get_footer(); ?>
