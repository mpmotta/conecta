<?php
    require_once('../model/usuarioModel.php');

    class usuarioController {

        public function logar() {
            $usuario = new Usuario();

            $user = $_POST['usuario'];
            $senha = $_POST['senha'];
            //$salt = md5($senha);
            //$senha = hash('sha256', $salt);
            $usuario->logar($user, $senha);    
        }

        public function sair() {
            session_start();
            session_destroy();
            header('Location: ../view/index.php?user=deslogado');

        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'logar') {
                $this->logar();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'sair') {
                $this->sair();
            }
        }
    }
    $UsuarioController = new UsuarioController();
    $UsuarioController->handleRequest();
?>
