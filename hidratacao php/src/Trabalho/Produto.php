<?php

namespace Trabalho;

class Produto {

    private $descricao;
    private $valor;

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        if ($valor < 1) {
            throw new \Exception("Valor deve ser 1 ou maior que 1");
            return;
        }
        $this->valor = $valor;
    }

    use Traits\Hidratacao;

    public function saveBd(\PDO $con) {
        $descricao = $this->getDescricao();
        $valor = $this->getValor();
        try {
            $sql = "Insert into tbproduto (descricao, valor) values (:descricao, :valor)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":valor", $valor);
            $stmt->execute();
        } catch (\Exception $e) {
            die("<pre>" . __FILE__ . "  " . __LINE__ . "\n" . print_r($e, true) . "</pre>");
        }
    }

}
