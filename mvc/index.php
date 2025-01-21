<?php 
// include 'app/Models/Product.php';
// $conn = new Product();
// $conn->getConnection();
// Test Model
// include 'app/Models/Model.php';
// include 'app/Models/Product.php';
include __DIR__ . '/vendor/autoload.php';
// Xử lý kết nối ENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();
// use App\Models\Product;
// $model = new Model();
// Test getConnection
// $model->getConnection();
// var_dump($model) ;
// Lúc nào muốn kết nối đến CSDL thì cũng cần gọi
// phương thức getConnection()
// Test thực thi câu lệnh
// Thêm 1 sản phẩm
// $sql = "INSERT INTO products VALUES (?,?,?,?)";
// $data = [null, "Sản phẩm 1", 10000, "Sản phẩm 1 test mode"];
// $model->setSQL($sql); // Đưa câu lệnh SQL muốn thực thi vào trước
// $model->execute($data);
// Thêm thành công
// Test truy vấn
// Truy vấn lấy nhiều bản ghi
// $sql = "SELECT * FROM products";
// $model->setSQL($sql); // Đưa câu lệnh SQL muốn thực thi vào trước
// var_dump($model->all()); // -> lấy thành công giá trị
// Truy vấn lấy 1 bản ghi
// $sql = "SELECT * FROM products WHERE id = ?";
// $model->setSQL($sql); // Đưa câu lệnh SQL muốn thực thi vào trước
// var_dump($model->first([1])); // -> lấy thành công giá trị
// Test Product
// $product = new Product();
// var_dump($product->getAllProducts()); // Test Product truy nhiều bản ghi
// var_dump($product->getIDProducts(1)) // Test Product truy 1 bản ghi
// Thêm sản phẩm
// $product->addProduct(null, 'Test Product', 1000, 'Test Product 1');
// var_dump($product->getAllProducts());
// Chỉnh sủa sản phẩm
// $product->editProduct(1, 'Test Product Updated', 1500, 'Test Product Updated 1');
// var_dump($product->getAllProducts());
//  Xóa sản phẩm
// $product->deleteProduct(1);
// var_dump($product->getAllProducts());
use App\Controllers\CategoryController;
$cate = new CategoryController();
$cate->index()
?>