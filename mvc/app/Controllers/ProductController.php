<?php 
namespace App\Controllers;
use App\Models\Product;
class ProductController extends Controller{
    public function index(){
        $modelPro = new Product();
        $listPro = $modelPro->getAllProducts();
        // var_dump($listPro);
        return $this->view('product.list', compact('listPro'));
    }
    // thêm sản phẩm
    // hiển thị form thêm sản phẩm
    public function create(){
        return $this->view('product.add');
    }
    // xử lý form thêm sản phẩm
    public function store(){
        // var_dump($_POST);
        // die();
        //validate
        $errors = []; // Mảng chứa lỗi
        if(empty($_POST['ten_san_pham'])){
            $errors[] = "Tên sản phẩm không được để trống";
        }
        if(empty($_POST['mo_ta'])){
            $errors[] = "Mô tả không được để trống";
        }
        if(empty($_POST['gia'])){
            $errors[] = "Giá không được để trống";
        }
        if(empty($_FILES['hinh_anh']['name'])){
            $errors[] = "Hình ảnh không được để trống";
        }
        // var_dump($errors);
        // Hiển thị thông báo lỗi
    }
}
?>