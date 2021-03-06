<?php
// facilita a instancia de uma classe inutilzando o requiere.
session_start();
require 'config.php';

$html = spl_autoload_register(function($class){
    if(file_exists('controllers/'.$class.'.php')) {
        require 'controllers/'.$class.'.php';
    }else if (file_exists('models/'.$class.'.php')){
        require 'models/'.$class.'.php';
    }else if (file_exists('core/'.$class.'.php')){
        require 'core/'.$class.'.php';
    }
});
$core = new Core();
$core->run();

