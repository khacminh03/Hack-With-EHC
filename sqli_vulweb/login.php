<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'hackwithehc');

// Kiểm tra kết nối
if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

// Xử lý đăng nhập khi người dùng gửi mẫu đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Đăng nhập thành công, lưu thông tin người dùng vào phiên làm việc (session)
        $_SESSION["username"] = $username;
        if ($username == "admin") {
            header("Location: admin.php"); // Chuyển hướng sang trang admin.php
            exit();
        } else {
            header("Location: dashboard.php"); // Chuyển hướng sang trang dashboard.php cho người dùng bình thường
            exit();
        }
    } else {
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
        echo $error_message;
    }
}
?>
