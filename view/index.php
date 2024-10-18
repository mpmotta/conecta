<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
    <div class="container bg-light p-0" style="width:400px; margin: auto; margin-top: 80px">
        <h1 class="text-center">AGENDA</h1>
        <h2 class="text-center p-3">Página de Login</h2>
        <form method="post" action="../controller/usuarioController.php?action=logar">
            <div class="m-3">
                <input required type="text" name="usuario" class="form-control"
                placeholder="Usuário">
            </div>
            <div class="m-3">
                <input required type="password" name="senha" class="form-control"
                placeholder="Senha">
            </div> 
            <div class="m-3">   
            <button type="submit" class="btn btn-primary mb-3">
                    Logar
                </button>
            </div>    
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if(isset($_GET['erro']) && $_GET['erro'] == 'login'){
            echo  "<script src='js/erro-login.js'></script>";
        }

        if(isset($_GET['user']) && $_GET['user'] == 'deslogado'){
            echo  "<script src='js/deslogado.js'></script>";
        }
    ?>
</body>
</html>