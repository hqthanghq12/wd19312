<?php 
    function flash($key, $msg, $router){
        $_SESSION[$key] = $msg;
        switch($key){
            case 'success':
                unset($_SESSION['errors']);
                break;
            case 'errors':
                unset($_SESSION['success']);
                break;
        }
        header('Location:'.route($router).'?msg='.$key);
        die();
    }
?>