<?php
// Bắt buộc phải thêm dòng này để Vercel có thể xử lý request
require __DIR__ . '/../vendor/autoload.php';

// Thiết lập header để trình duyệt hiểu đây là một phản hồi JSON
header('Content-Type: application/json');

// Lấy tham số 'name' từ URL (ví dụ: /api?name=Vercel)
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Khách';

// Tạo một mảng dữ liệu PHP
$data = [
    'message' => "Chào mừng, $name!",
    'status' => 'success',
    'timestamp' => time()
];

// Chuyển đổi mảng PHP thành chuỗi JSON và trả về
echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>