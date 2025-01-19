<?php 
namespace test;
// include 'ns.php';
// include 'ns1.php';
// Là bao gồm (File tại và 1 số file khác)
// Nếu bao gồm xảy hiện tượng trùng biến, hàm, class, thuộc tinh 
// và phương thức ...
// Namespace: là một cách tổ chức và phân nhóm các đối tượng như biến
// hàm, thuộc tính, .... trong một phạm vi (scope) riêng biệt
// Điều này giúp giảm xung đột đặt tên khi các chương trình lớn có thể sử dụng
// các đối tương cùng tên
class Names{
    // thuộc tinh
    public $ho;
    public $hoDem;
}
// ns
$ns = new SinhVien();
?>