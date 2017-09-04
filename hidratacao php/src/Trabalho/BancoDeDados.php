<?php

namespace Trabalho;

class BancoDeDados {

    public static $inicia;

    private function __construct($usu, $sen, $hos, $bd) {
//       'mysql:dbname=phpconfbr;host=localhost';
    }

    public static function connectDb($usu, $sen, $hos, $bd) {
        if (self::$inicia === NULL) {
            $dsn = 'mysql:dbname=' . $bd . ';host=' . $hos;
            self::$inicia = new \PDO($dsn, $usu, $sen);
        }
        return self::$inicia;
    }

}
