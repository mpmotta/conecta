<?php
require_once 'conexao.php';

class Pessoa extends Conexao {
    private $id;
    private $avatar;
    private $nome;
    private $fone;
    private $email;
    private $tabela = 'pessoas';

    // construtor
    public function __construct() {
        parent::__construct();
    }

    // getters e setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getFone() {
        return $this->fone;
    }

    public function setFone($fone) {
        $this->fone = $fone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // consulta no banco
    public function consulta() {
        $sql = "SELECT id, avatar, nome, fone, email FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultaID($id) {
        $sql = "SELECT avatar, nome, fone, email FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setAvatar($result['avatar']);
            $this->setNome($result['nome']);
            $this->setFone($result['fone']);
            $this->setEmail($result['email']);
        }
    }

    public function inserir(Pessoa $pessoa) {
        $sql = "INSERT INTO $this->tabela (nome, fone, email) VALUES (:nome, :fone, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $pessoa->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $pessoa->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $pessoa->getEmail(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editar(Pessoa $pessoa, $id) {
        $sql = "UPDATE $this->tabela SET avatar = :avatar, nome = :nome, fone = :fone, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':avatar', $pessoa->getAvatar(), PDO::PARAM_STR);
        $stmt->bindParam(':nome', $pessoa->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $pessoa->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $pessoa->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>