<?php 
// Kết nối, truy vấn, thao tác với CSDL
// 2. Thực hiện truy vấn
// 3. Thao tác với dữ liệu
class Product{
    // 1. Kết nối CSDL
    // Thuộc tính giúp kết nối CSDL
    public $host = "localhost"; 
    // Địa chỉ IP của máy chủ chứa CSDL (có thể thay bằng IP)
    public $dbname = "wd19312";
    // Tên CSDL
    public $username = "root";
    // Tên đăng nhập CSDL
    public $password = "";
    // Mật khẩu CSDL
    // Phương thức giúp kết nối CSDL
    public function getConnection(){
        try{
            $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, 
            $this->username, $this->password);
            // Thiết lập lỗi khi thao tác với CSDL
            $conn->setAttribute(PDO::ATTR_ERRMODE, 
            PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");
            echo "Kết nối thành công";
            return $conn;
        }catch(PDOException $e){
            echo "Lỗi rồi fix đê: ".$e->getMessage();
        }
    }

}
?>