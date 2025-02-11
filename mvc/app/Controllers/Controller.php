<?php 
namespace App\Controllers;
use eftec\bladeone\BladeOne;
class Controller{
    // Xây dựng phương thức giúp redenr ra view
    protected function view($viewFile, $data = []){
        // Đường dẫn nơi chứa các file view
        $view = __DIR__.'/../../resources/views';
        // Đường dẫn nơi chứa các file cache
        $cache = __DIR__.'/../../storage/cache';
        // Khởi tạo BladeOne
        $blade = new BladeOne($view, $cache, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}
?>