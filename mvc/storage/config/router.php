<?php 
// Viết hàm 1 truyền vào tên route thì gọi đến được route đó
// route - Không param
// route - có param
function route($routeName, $params = []){
    if(count($params) > 0){
        foreach($params as $key => $value){
            $path = str_replace("{".$key."}",
             $value, $routeName);
             $routeName = $path;
        }
    }else{
        $path = $routeName;
    }
    $scriptPath = str_replace( basename($_SERVER["SCRIPT_NAME"]), 
    "", $_SERVER["SCRIPT_NAME"]);
    return $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$scriptPath.$path;
    // var_dump($scriptPath);
    // return $path;
}

// Gọi đến route
// route('product-list/{id}/{name}', ['id => 1, ''name'=> 'a']); => product-list/1/a
// var_dump(route('product')); // Không param
// var_dump(route('product-list/{id}', ['id' => 1])); // Có param 
// route('product-list/{id}/{name}', ['id' => 1, 'name'=> 'a'])
// echo"<pre>";
// var_dump($_SERVER);
?>