<?php 
// Viết router
use Bramus\Router\Router;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;
$router = new Router();
// Phương thức
// get : Hiển thị dữ liệu (Hiện danh sách, hiện form, ...)
// post : Thêm dữ liệu
// put : Cập nhật dữ liệu
// delete : Xóa dữ liệu
// C1: 
// $router->get('/admin/home', function() {
//     echo 'Home Page';
// });
// Nhóm
// ví dụ:
// $router->get('/admin/list', function() {
//     echo 'Home Page';
// });
$router->mount('/admin', function() use ($router) {
    $router->get('/home', function() {
        echo 'Home Page';
    });
    $router->get('/list', function() {
        echo 'List Page';
    });
});
// Tham chiếu sang controller
// $router->phương thức('đường dẫn', 'namespace\tên class@tên phương thức');
$router->get('category-list',CategoryController::class.'@index');
// Viết route cho product
$router->get('product', ProductController::class.'@index');
$router->run();
?>