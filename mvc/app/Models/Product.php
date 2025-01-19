<?php 
namespace App\Models;
use App\Models\Model;
class Product extends Model{
    private $connection; // Thuộc tính kết nối CSDL
    protected $table = 'products'; // Thuộc tinh chứa tên bảng
    // Kế thừa kêt nối của Model
    // Phương thức khởi tạo
    public function __construct(){
        $this->connection = new Model();
    }
    // Thực hiện truy vấn
    // Lấy nhiều bản ghi
    public function getAllProducts(){
        $sql = "SELECT * FROM {$this->table}";
        $this->connection->setSQL($sql);
        return $this->connection->all();
    }
    // Lấy bản ghi theo id (Truyền vào)
    public function getIDProducts($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $this->connection->setSQL($sql);
        return $this->connection->first([$id]);
    }
    // Thực hiện thao tác
    // Thêm 
    public function addProduct($id, $tenSP, $gia, $moTa){
        $sql = "INSERT INTO products VALUES (?,?,?,?)";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id, $tenSP, $gia, $moTa]);
    }
    // Sửa
    public function editProduct($id, $tenSP, $gia, $moTa){
        $sql = "UPDATE products SET ten_san_pham =?, gia =?, mo_ta =? WHERE id =?";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$tenSP, $gia, $moTa, $id]);
    }
    // Xóa
    public function deleteProduct($id){
        $sql = "DELETE FROM products WHERE id =?";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id]);
    }
}
?>