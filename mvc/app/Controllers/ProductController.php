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
}
?>