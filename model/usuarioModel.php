<?php
require_once('conexao.php');

class Usuario extends conexao {
    private $usuario;
    private $senha;
    private $tabela = 'usuarios';

    public function __construct() {
        parent::__construct();
    }

    // Método de login
    public function logar($usuario, $senha) {
        $sql = "SELECT usuario, senha FROM $this->tabela WHERE usuario = :usuario AND senha = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            session_start();
            $_SESSION['logado'] = true;
            header('Location: ../view/agenda.php?logado=true');
        } else {
            header('Location: ../view/index.php?erro=login');
        }
    }
}