<?php

require '../autoload.php';

use Trabalho\Usuario;
use Trabalho\Produto;

$usu = new Usuario(); 
$prod = new Produto();


$usu->populate(array( 
    "login" => "admin",
    "senha" => 123
));

$prod->populate(array( 
    "descricao" => "Churrasqueira",
    "valor" => 500.00
));

$config = file_get_contents("../config.json");
$config = json_decode($config);
$con = \Trabalho\BancoDeDados::connectDb($config->usuario, $config->senha, $config->host, $config->db);

$usu->saveBd($con);
$prod->saveBd($con);

die("<pre>" . __FILE__ . "  " . __LINE__ . "\n" . print_r("Concluido!", true) . "</pre>");




