<?php
// Thiết lập header để trình duyệt hiểu đây là một phản hồi JSON
header("Content-Type: application/json; charset=UTF-t");

// Xử lý các phương thức request khác nhau (GET, POST, v.v.)
$method = $_SERVER['REQUEST_METHOD'];

// Dữ liệu mẫu
$users = [
    ['id' => 1, 'name' => 'Nguyễn Văn A'],
    ['id' => 2, 'name' => 'Trần Thị B'],
    ['id' => 3, 'name' => 'Lê Văn C']
];

if ($method === 'GET') {
    // Nếu là request GET, trả về danh sách người dùng
    echo json_encode([
        'status' => 'success',
        'data' => $users
    ]);
} else {
    // Các phương thức khác không được hỗ trợ trong ví dụ này
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode([
        'status' => 'error',
        'message' => 'Phương thức không được hỗ trợ'
    ]);
}
?>