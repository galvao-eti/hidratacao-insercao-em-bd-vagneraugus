<?php

namespace Trabalho;

class Usuario {

    private $login;
    private $senha;

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        if (strlen($senha) < 6) {
            throw new \Exception("A Senha deve conter 6 digitos");
            return;
        }
        $this->senha = $senha;
    }

    use Traits\Hidratacao;

    public function saveBd(\PDO $con) {
        $login = $this->getLogin();
        $senha = $this->getSenha();
        try {
            $sql = "Insert into tbusuario (login, senha) values (:login, :senha)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(":login", $login);
            $stmt->bindParam(":senha", $senha);
            $stmt->execute();
        } catch (Exception $e) {
            die("<pre>" . __FILE__ . "  " . __LINE__ . "\n" . print_r($e, true) . "</pre>");
        }
    }

}
