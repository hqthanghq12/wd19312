<?php 
    if(!function_exists('storage')){
        function storage($nameFile){
            $scriptPath = str_replace( basename($_SERVER["SCRIPT_NAME"]), 
            "", $_SERVER["SCRIPT_NAME"]);
            return empty($nameFile) ? ''
            : $scriptPath.'storage/uploads/'.$nameFile;
        }
    }
?>