<?php
// Thiết lập header để cho phép truy cập từ mọi nguồn (CORS) và định dạng JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// --- Dữ liệu giả (Giống như lấy từ Database) ---
$products = [
    [
        "id" => 1,
        "name" => "Laptop ABC",
        "price" => 25000000,
        "description" => "Laptop mạnh mẽ cho lập trình viên."
    ],
    [
        "id" => 2,
        "name" => "Chuột không dây XYZ",
        "price" => 750000,
        "description" => "Chuột công thái học, giảm mỏi tay."
    ],
    [
        "id" => 3,
        "name" => "Bàn phím cơ Pro",
        "price" => 1800000,
        "description" => "Trải nghiệm gõ phím tuyệt vời với Blue switch."
    ]
];

// --- Xử lý yêu cầu ---
$response = null;

// ===================================================================
// BẮT ĐẦU PHẦN QUAN TRỌNG CẦN KIỂM TRA
// ===================================================================

// Kiểm tra xem có tham số 'id' trên URL không và nó không rỗng
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy ID và chuyển thành số nguyên
    
    // Tìm sản phẩm có ID tương ứng
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            $response = $product; // Gán sản phẩm tìm thấy vào biến $response
            break; // Dừng vòng lặp ngay khi tìm thấy
        }
    }
} else {
    // Nếu không có tham số 'id', trả về tất cả sản phẩm
    $response = $products;
}

// ===================================================================
// KẾT THÚC PHẦN QUAN TRỌNG CẦN KIỂM TRA
// ===================================================================


// --- Trả về phản hồi ---
if ($response) {
    // Nếu tìm thấy dữ liệu, trả về status 200 OK
    http_response_code(200);
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    // Nếu không tìm thấy sản phẩm với ID đã cho, trả về lỗi 404 Not Found
    http_response_code(404);
    echo json_encode(
        ["message" => "Không tìm thấy sản phẩm."],
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );
}
?>