<?php
$id = $_GET['id'];

require_once('../controller/pessoaController.php');
$pessoa = new pessoa(); 
$consulta = $pessoa->consultaID($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .avatar{
            width: 128px;
            height: 128px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: solid 2px #000;
        }
    </style>    
</head>
<body class="bg-secondary">
    <div class="container bg-light p-0" style="width:400px; margin: auto">
        <h2 class="text-center p-3">Editar Dados</h2>
        <form method="post" enctype="multipart/form-data"
        action="../controller/pessoaController.php?action=editarPessoa">
            <div class="m-3 text-center">
                <img class="avatar" id="imagem" src="img/avatar/<?php echo $pessoa->getAvatar() ?>">
                <input type="file" 
                class="form-control btn-primary"
                name="avatar" >
            </div>
            <div class="m-3">
                <input type="hidden" name="meuid" value="<?php echo $id?>">
                <input type="hidden" name="meuavatar" value="<?php echo $pessoa->getAvatar() ?>">
                <input type="text" name="nome" class="form-control"
                value="<?php echo $pessoa->getNome() ?>">
            </div>
            <div class="m-3">
                <input type="tel" name="fone" class="form-control"
                value="<?php echo $pessoa->getFone() ?>">
            </div> 
            <div class="m-3">   
                <input type="email" name="email" class="form-control"
                value="<?php echo $pessoa->getEmail() ?>">
            </div>
            <div class="m-3">    
            <a href="agenda.php" class="btn btn-secondary mb-3">Voltar</a>
                <button type="submit" class="btn btn-primary mb-3">
                    Alterar
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>    
    <script>
        $('input[type="file"]').change(function(){
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#imagem').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        });
    </script>    
</body>
</html>