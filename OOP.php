<?php 
// Lớp và đối tượng
// 1. Đối tượng: chia thành 2 phần
// - Đặc điểm (Thuộc tinh == Biến)
// Công thức khai báo: 
// phạm_vi_truy_cập $tên_thuộc tính; hoặc 
// phạm_vi_truy_cập $tên_thuộc tính = giá trị;
// phạm_vi_truy_cập: public, protected, private (Học và châm cứu buổi sau)
// Ví dụ:
// Đối tượng: Sinh Viên
// - Thuộc tính: Mã sinh, Tên, Ngày sinh, Địa chỉ, Điểm, Chuyên ngành, ...
// - Hành động (Phương thức == Hàm)
// Công thức khai báo:
// phạm_vi_truy_cập function tên_phương_thức($thamso1, $thamso2, ...){
//     // code
// }
// phạm_vi_truy_cập: public, protected, private
// Tham số: Có thể hoặc không có
// Ví dụ:
// Đối tượng: Sinh Viên
// - Phương thức: Học, Thi, Nghỉ học, ...
// 2. Lớp (Class): Khuôn mẫu để tạo ra nhiều đồi tượng có chung thuộc tính
// và phương thức
// Công thức khai báo:
// class Tên_lớp{
// Thuộc tính
// Phương thức
// }
// Ví dụ:
class SinhVien{
    // Thuộc tính
    public $maSinhVien;
    public $tenSinhVien;
    public $ngaySinh;
    // Phương thức
    public function hoc(){
        echo "Sinh viên đang học";
    }
    public function thi(){
        echo "Sinh viên đang thi";
    }
}
// Bài tập: Lấy ví dụ 3 đối tượng (Liệt kê thuộc tính và phương thức) 
// Chuyển sang dạng đối tượng trong máy tính

?>