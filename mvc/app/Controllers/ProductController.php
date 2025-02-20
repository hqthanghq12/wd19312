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
        // Xử lý upload files
        if(isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0){
            // Đường dẫn upload file
            $targetDir = __DIR__."/../../storage/uploads/";
            // Các định file được upload
            $allowedTypes = ['jpg', 'png', 'gif', 'jpeg'];
            // Kích thước max được upload
            $maxSize =  2 * 1024 * 1024 ;// 2MB
            // Lấy thông tin file
            $fileName = basename($_FILES['hinh_anh']['name']);// tên file
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); // loại file
            $fileSize = $_FILES['hinh_anh']['size']; // kích thước file
            $fileTmpName = $_FILES['hinh_anh']['tmp_name']; // Nơi lưu file tạm thời
            // Kiểm tra loại file và kích thước
            if(!in_array($fileType, $allowedTypes)){
                $errors[] = "File bạn chọn không đúng định dạng";
            }
            if($fileSize > $maxSize){
                $errors[] = "File bạn chọn quá lớn";
            }
            // tiến hành upload
            $newFileName = time().'_'.$fileName;
            $imagePath =  $targetDir.$newFileName;
            // Kiểm upload
            if(!move_uploaded_file($fileTmpName, $imagePath)){
                $errors[] = "Xảy ra lỗi trong upload file";
            }
            if(!file_exists($imagePath)){
                $errors[] = "File ảnh upload không tồn tại";
            }
        }
        // var_dump($errors);
        // Hiển thị thông báo lỗi
        if(count($errors) > 0){
            flash('errors', $errors, 'product-add');
        }else{
            //Thêm sản phẩm vào CSDL
            $modelPro = new Product();
            $result = $modelPro->addProduct(
                null,
                $_POST['ten_san_pham'],
                $_POST['gia'],
                $newFileName,
                $_POST['mo_ta']
            );
            if($result){
                flash('success', 
                'Thêm sản phẩm thành công',
                'product-add');
            }else{
                flash('errors',
                'Thêm sản phẩm thất bại',
                'product-add');
            }
        }
    }
    // Chỉnh sửa sản phẩm 
    public function edit($id){
        $modelPro = new Product();
        $product = $modelPro->getIDProducts($id);
        return $this->view('product.edit',
        compact('product'));
    }
    public function update($id){
        // var_dump($_POST);
        $errors = []; // Mảng chứa lỗi
        $modelPro = new Product();
        $imageData = $modelPro->getIDProducts($id)->hinh_anh;
        if(empty($_POST['ten_san_pham'])){
            $errors[] = "Tên sản phẩm không được để trống";
        }
        if(empty($_POST['mo_ta'])){
            $errors[] = "Mô tả không được để trống";
        }
        if(empty($_POST['gia'])){
            $errors[] = "Giá không được để trống";
        }
            // Đường dẫn upload file
            $targetDir = __DIR__."/../../storage/uploads/";
        // Xử lý upload files
        if(isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0){
            // Các định file được upload
            $allowedTypes = ['jpg', 'png', 'gif', 'jpeg'];
            // Kích thước max được upload
            $maxSize =  2 * 1024 * 1024 ;// 2MB
            // Lấy thông tin file
            $fileName = basename($_FILES['hinh_anh']['name']);// tên file
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); // loại file
            $fileSize = $_FILES['hinh_anh']['size']; // kích thước file
            $fileTmpName = $_FILES['hinh_anh']['tmp_name']; // Nơi lưu file tạm thời
            // Kiểm tra loại file và kích thước
            if(!in_array($fileType, $allowedTypes)){
                $errors[] = "File bạn chọn không đúng định dạng";
            }
            if($fileSize > $maxSize){
                $errors[] = "File bạn chọn quá lớn";
            }
            // tiến hành upload
            $newFileName = time().'_'.$fileName;
            $imagePath =  $targetDir.$newFileName;
            // Kiểm upload
            if(!move_uploaded_file($fileTmpName, $imagePath)){
                $errors[] = "Xảy ra lỗi trong upload file";
            }
            if(!file_exists($imagePath)){
                $errors[] = "File ảnh upload không tồn tại";
            }
        }else{
            $newFileName = $imageData;
        }
        // var_dump($errors);
        // Hiển thị thông báo lỗi
        if(count($errors) > 0){
            flash('errors', $errors, 'product-edit/'.$id);
        }else{
            //Thêm sản phẩm vào CSDL
            $modelPro = new Product();
            $result = $modelPro->editProduct(
                $id,
                $_POST['ten_san_pham'],
                $_POST['gia'],
                $newFileName,
                $_POST['mo_ta']
            );
            if($result){
                if($newFileName != $imageData && file_exists($targetDir.$imageData)){
                    unlink($targetDir.$imageData); // Xóa file 
                }
                flash('success', 
                'Chỉnh sửa sản phẩm thành công',
                'product');
            }else{
                flash('errors',
                'Chỉnh sửa sản phẩm thất bại',
                'product');
            }
        }
    }
    public function delete($id){
        $targetDir = __DIR__."/../../storage/uploads/";
        $modelPro = new Product();
        $imageData = $modelPro->getIDProducts($id)->hinh_anh;
        $result = $modelPro->deleteProduct($id);
        if($result){
            if(file_exists($targetDir.$imageData)){
                unlink($targetDir.$imageData); // Xóa file 
            }
            flash('success', 
            'Xóa sản phẩm thành công',
            'product');
        }else{
            flash('errors',
            'Xóa sản phẩm thất bại',
            'product');
        }
    }
}
?>