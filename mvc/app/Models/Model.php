<?php 
namespace App\Models;
use PDO;
use PDOException;
use Exception;
class Model{
    // Tạo tài nguyên cung cấp cho các class trong 
    // mô hình MVC (Đặc biệt Models)
    // Kết nối CSDL
    // Thuộc tính 
    // Thuộc tính giúp kết nối CSDL
    private $host = "localhost"; 
    // Địa chỉ IP của máy chủ chứa CSDL (có thể thay bằng IP)
    private $dbname = "wd19312";
    // Tên CSDL
    private $username = "root";
    // Tên đăng nhập CSDL
    private $password = "";
    // Mật khẩu CSDL
    // Thuộc tính kết nối CSDL
    private $pdo;
    // thuộc tính chứa câu lệnh SQL muốn thực thi
    private $sql;
    //Thuộc tính đối tượng PDOStatement sau khi thực thi câu lệnh4
    private $sta;
    // Khai báo hằng trạng thái truy vấn
    // Nhiều bản ghi
    const FETCH_ALL = 'all';
    // Nhiều bản ghi đơn
    const FETCH_FIRST = 'first';
    // Phương thức khởi
    public function __construct(){
        $this->pdo = $this->getConnection();
    }
    // Phương thức giúp kết nối CSDL
    private function getConnection(){
        try{
            $connection = new PDO("mysql:host={$this->host};
            dbname={$this->dbname}", 
            $this->username, 
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
        );
        // echo "Kết nối thành công";
        return $connection;
        }catch(PDOException $ex){
            throw new Exception("Lỗi kết nối database ".$ex->getMessage());
        }
    }
    // Thực hiện truyền câu lênh sql muốn thực 
    protected function setSQL($sql){
        $this->sql = $sql;
    }
    // Thực thi thao tác
    //1: dùng binValue để tự động xác định kiểu
    //2: Tránh 1 số vấn đề liên quan đến bảo mật
    // Ý tưởng đó nhập định mảng để chuyền vào thứ tự mà k 
    // gán biến như cũ
    // Ví dụ:
    // Trước vẫn dùng
    // INSERT INTO tên bảng (cột 1, côt 2, ..., cột n)
    // VALUES (giá trị 1/biến 1, giá trị 2/biến 2, ..., giá trị n/biến n)
    // Ghép thành câu lệnh sql
    // Thay bằng
    // INSERT INTO tên bảng (cột 1, côt 2,..., cột n)
    // VALUES (?,?,...,?)
    // Và truyền vào thứ tự mà k gán biến như trước
    // Cần truyền bao cột thì có bấy nhiêu dấu hỏi
    // Và thứ truyền phải khớp với lệnh
    protected function execute($options = []){
        try{
            $this->sta = $this->pdo->prepare($this->sql);
            if(!empty($options)){
                foreach($options as $key => $value){
                    $this->sta->bindValue($key+1, $value);
                }
            }
            $this->sta->execute();
            return $this->sta;
        }catch(PDOException $ex){
            throw new Exception("Lỗi thực thi câu lênh SQL: "
            .$ex->getMessage());
        }
    }
    // Truy vấn
    // Phương thức thự thi truy vấn
    protected function executeQuery($options = [], $fetchMode = self::FETCH_ALL){
        // Mặc định là truy vấn trả về nhiều bản
        $result = $this->execute($options);
        if(!$result){
            return false;
        }
        return $fetchMode === self::FETCH_FIRST
        ? $result->fetch(PDO::FETCH_OBJ) // Nếu trọn 1 thì trả về 1
        : $result->fetchAll(PDO::FETCH_OBJ);
    }
    // Trả về nhiều bản ghi (từ 2 bản ghi trở lên)
    // Phương thức trả về nhiều
    protected function all($options = []){
        return $this->executeQuery($options, self::FETCH_ALL);
    }
    // Trả về 1 bản ghi (Thường là truy theo id)
    protected function first($options = []){
        return $this->executeQuery($options, self::FETCH_FIRST);
    }
    // Ngắt kết nối
    public function disconnect(){
        $this->pdo = null;
        $this->sta = null;
    }
}
?>