<?php
namespace App\Controllers; 
class CategoryController extends Controller{
    // Phương thức
    // Hiện thị
    public function index(){
        // Đưa ra giao diện của hiện thị
        // Danh sách danh mục 
        // include_once(__DIR__."/../../resources/views/category/list.php");
        return $this->view('category.list');
    }
    // Thêm
    // Sửa
    // ..
}
?>