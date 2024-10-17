<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
    <div class="container bg-light p-0" style="width:400px; margin: auto">
        <h2 class="text-center p-3">Cadastro na Agenda</h2>
        <form method="post" action="../controller/pessoaController.php?action=cadastrarPessoa">
            <div class="m-3">
                <input type="text" name="nome" class="form-control"
                placeholder="Nome">
            </div>
            <div class="m-3">
                <input type="tel" name="fone" class="form-control"
                placeholder="Telefone">
            </div> 
            <div class="m-3">   
                <input type="email" name="email" class="form-control"
                placeholder="Email">
            </div>
            <div class="m-3">   
            <a href="agenda.php" class="btn btn-secondary mb-3">Voltar</a> 
                <button type="submit" class="btn btn-primary mb-3">
                    Cadastrar
                </button>
            </div>    
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if(isset($_GET['campoVazio'])) {
                    echo  "<script src='js/erro-vazio.js'></script>";
                }
    ?>

</body>
</html>