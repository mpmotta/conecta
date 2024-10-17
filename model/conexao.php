<?php
abstract class Conexao {
    private $servidor = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $banco = 'agenda';
    protected $conn;

    public function __construct() {
        $this->conexao();
    }

    private function conexao() {
        $this->conn = new PDO("mysql:host=$this->servidor;dbname=$this->banco", $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>