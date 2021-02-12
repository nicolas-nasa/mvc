<?php
require 'env.php';
//conextão com banco de dados

$config = array();

//verifica se está em produção ou desenvolvimento e altera o banco.

if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://projeto.y/");
    $config['dbname'] = 'estrutura_mvc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else{
    define("BASE_URL", "http://projeto.y/");
    $config['dbname'] = 'estrutura_mvc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}

global $db;
try {
    $pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'], $config['dbpass']);


} catch (PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}