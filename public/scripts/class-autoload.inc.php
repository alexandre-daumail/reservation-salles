<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if (strpos($url, 'view') !== false) {
        $path = '../controller/';
    }
    else {
        $path = 'controller/';
    }
    $extension = '.class.php';
    require_once $path . $className .$extension;
}