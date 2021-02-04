<?php

spl_autoload_register(function($class) {

    $classPath = explode('\\', $class);

    $classDir = $classPath[0];
    $className = $classPath[1];
    $ext = "php";

    $fullPath = __DIR__ . "/${classDir}" . "/" . "${className}.${ext}";
    $fullPath = str_replace("\\", "/", $fullPath);

    if(!file_exists($fullPath)) {
        echo "Error: file ${fullPath} not found";
        return;
    }

    require_once "$fullPath";

});
