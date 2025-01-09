<?php 
// Quy tắc đặt tên
// 1. Biến và Hàm: Thường dùng kiểu camelCase - Viết thường chữ đầu và 
// viết hoa chữ cái đầu của các từ tiếp theo
// Ví dụ:
// -Biến:
$myName = "Nguyen Van A";
// -Hàm:
function myFunction(){
    echo "Hello World";
}
// 2. Hằng số: Thường dùng kiểu SNAKE_CASE - 
// VIẾT HOA TOÀN BỘ VÀ CÁC TỪ CÁCH NHAU BỞI DẤU GẠCH DƯỚI
// Ví dụ:
define("MY_NAME", "Nguyen Van A");
const MY_NAMES = "Nguyen Van A";
// 3. Class: Thường dùng kiểu PascalCase - Viết hoa chữ cái đầu của mỗi từ
// Ví dụ:
class Variable{
    // code
}
// Tên file == Tên class
///////////////////////////////////
// Ôn tập
// Mảng & Hàm
// 1. Mảng: Là một biến có thể chứa nhiều giá trị
// Mảng có mấy loại: 3 loại
// - Mảng chỉ số: Mảng có key là số (chỉ số tính từ 0 -> n-1)
// - Mảng kết hợp: Mảng có key là chuỗi
// - Mảng đa chiều: Mảng chứa mảng
// Bài tập: Thực hiện khai báo, truy xuất dữ liệu cho cả 3 loại mảng
// 2. Hàm: Là một khối lệnh đã được đóng gói để thực 1 công việc nào đó và 
// có thể tái sử dụng nhiều lần
// Hàm có 2 loại:
// - Hàm có giá trị trả về
// + Có tham số truyền vào
// + Không có tham số truyền vào
// - Hàm không có giá trị trả về
// + Có tham số truyền vào
// + Không có tham số truyền vào
// Lấy vi dụ về cả 4 loại hàm
?>