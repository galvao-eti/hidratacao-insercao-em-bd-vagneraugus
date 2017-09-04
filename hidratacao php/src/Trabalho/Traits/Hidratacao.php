<?php

namespace Trabalho\Traits;

trait Hidratacao {

    public function populate(array $val) {

        try {
            foreach ($val as $atributo => $value) {
                $Set = 'set' . ucfirst($atributo);
                if (method_exists($this, $Set)) {
                    $this->$Set($value);
                } else {
                    die("<pre>" . __FILE__ . " " . __LINE__ . "\n" . print_r("Método " . $Set . " Inexistente!", true) . "</pre>");
                }
            }
        } catch (Exception $e) {
            die("<pre>" . __FILE__ . "  " . __LINE__ . "\n" . print_r($e->getMessage(), true) . "</pre>");
        }

    }

}
