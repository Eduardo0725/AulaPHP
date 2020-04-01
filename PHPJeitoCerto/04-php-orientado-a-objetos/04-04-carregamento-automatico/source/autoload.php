<?php

spl_autoload_register(function($class){
/* 
    echo "<pre>" , var_dump([
        $class
    ]) , "</pre>";
 */
    $prefix = "Source\\";
    $baseURL = __DIR__ . "/";
    $len = strlen($prefix);

    if(strncmp($prefix,$class,$len) !== 0){
        return;
    }
    
    $useClass = substr($class, $len);
    $useClass = str_replace("\\","/",$useClass);

    $file = $baseURL . $useClass . ".php";

    if(file_exists($file)){
        require $file;
    }

    /* 
    echo "<pre>" , var_dump([
        $class,
        $prefix,
        $useClass,
        $file
    ]) , "</pre>";
     */
});