<?php
if(!isset($loaderisok)){
    spl_autoload_register(function ($class_name) {
        $class_path = __DIR__.'/php/'.$class_name . '.php';
        if (file_exists($class_path)) {
            require $class_path;
        }else{
            echo 'Class'.$class_name.' not found';
            die();
        }
    });
    $loaderisok = true;
}