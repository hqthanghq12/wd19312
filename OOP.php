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
// class SinhVien{
//     // Thuộc tính
//     public $maSinhVien = "PH123456";
//     public $tenSinhVien= "Nguyễn Văn A";
//     public $ngaySinh = "01/01/2000";
//     // Phương thức
//     public function hoc(){
//         echo "Sinh viên đang học";
//     }
//     public function thi(){
//         echo "Sinh viên đang thi";
//     }
// }
// Khởi tạo đối tượng
// $sv1 = new SinhVien();
// Truy cập vào thuộc tính
// $sv->maSinhVien;
// Bài tập: Lấy ví dụ 3 đối tượng (Liệt kê thuộc tính và phương thức) 
// Chuyển sang dạng đối tượng trong máy tính
// 4 tính chất của oop: Đóng gói, Kế thừa, Đa hình, Trừu tượng
// 1. Đóng gói: Đóng gói cho phép chúng ta che giấu thông tin của
// đối tượng và chỉ phép các phương thức được định nghĩa trong
// lớp đó mới có thể truy cập và sử dụng thuộc tinhs và phương thức
// đó.
// Phạm vi truy cập: public, protected, private
// - public: Có thể truy cập từ bất kỳ đâu
// - protected: Chỉ có thể truy cập từ bên trong lớp và lớp kế thừa
// - private: Chỉ có thể truy cập từ bên trong lớp
// class SinhVien{
//     // Thuộc tính
//     private $maSinhVien = "PH6789"; // không được
//     private $tenSinhVien = "Nguyễn Văn A"; // không được
//     private $ngaySinh = "01/02/2000"; // được
//     // Phương thức get và set
//     // get: Trả về giá trị của thuộc tính
//     // set: Gán giá trị cho thuộc tính
//     public function getMaSinhVien(){
//         return $this->maSinhVien;
//     }
//     public function setMaSinhVien($maSinhVien){
//         $this->maSinhVien = $maSinhVien;
//     }
// }
// // Khởi tạo đối tượng
// $sv1 = new SinhVien();
// // Truy cập vào thuộc tính
// // echo $sv1->ngaySinh;
// // echo $sv1->maSinhVien; // không được
// // echo $sv1->tenSinhVien; // không được
// // Không được truy cập trưc tiếp vào thuộc tính private
// // Sử dụng phương thức get và set
// $sv1->setMaSinhVien("PH4567");
// echo $sv1->getMaSinhVien();
// 2. Kế thừa: Tính kế thừa cho phép xây dựng các lớp mới dựa trên cơ sở của lớp
// hiện có. Lớp mới (lớp con) sẽ được kế thừa 1 phần hoặc toàn bộ các 
// thuộc tính và phương thức của lớp cha.
// ví dụ
// Lớp cha
// class Animal{
//     // Thuộc tính
//     protected $name;
//     protected $color;
//     private $size;
// }
// Lớp con
// class Dog extends Animal{
//     // Hằng số
//     const PI = 3.14;
//     // Thuộc tính
//     private $age;
//     // Phương thức
//     public function eatDog(){
//         echo $this->age;
//         echo $this->name;
//         echo $this->color;
//         // echo $this->size; // Không được
//     }
// }
// Hằng số trong OOP(Constant)
// truy cập: Tên_lớp::Tên_hằng_số
// echo Dog::PI; // 3.14
// Trừu tượng
// 1 class được gọi là class trừu tượng là khi class đó chứa
// phương thức trừu tượng
// Class trừu tượng không thể khỏi tạo nhưng vẫn co thuộc tinh và 
// phương thức
// Khai báo
abstract class Animal {
    // Phương thức trừu tượng
    abstract public function eat();
    abstract public function diChuyen();
}
// class con
// class Dog extends Animal{
//     public function eat(){
//         echo "Ăn ăn";
//     }
//     public function diChuyen(){
//         echo "Đi chuyển";
//     }
// }
// Đa hình
// Đa hình không phải là 1 class -> không có thuộc tính
// Mà chỉ các phương thức trừu tượng
// Ví dụ
interface DiChuyen {
    public function diChuyen();
}
// class sử dụng
class Dog implements DiChuyen{
    public function diChuyen(){
        echo "Đi chuyển 4 chân";
    }
}
class Car implements DiChuyen{
    public function diChuyen(){
        echo "Đi chuyển 4 bánh xe";
    }
}
// Đa hình hay Trừu tượng đều là bản thiết kế của dự án phần mềm
// Đa hình là bản thiết kế cho các class không chung bản chất nhưng 
// chung hành động
// Trừu tượng là bản thiết kế cho các class chung bản chất
// Trait
// PHP chỉ có đơn kế thừa 
trait TongHieu{
    public function tinhTong($a, $b){
        return $a + $b;
    }
    private function tinhHieu($a, $b){
        return $a - $b;
    }
}
trait TichThuong{
    protected function tinhTich($a, $b){
        return $a * $b;
    }
    public function tinhThuong($a, $b){
        return $a / $b;
    }
}

class TinhToan{
    use TichThuong, TongHieu;
    public function tinhToan($a, $b){
        return $this->tinhHieu($a, $b) + $this->tinhTich($a, $b);
    }
}
?>