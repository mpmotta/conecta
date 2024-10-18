<?php
	session_start();
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true ){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
    <div class="container bg-light p-0">
    <h1 class="bg-black.bg-gradient text-center p-5">Minha Agenda</h1>
    <section class="p-5">
        <table class="table table-striped">
            <tr>
                <th>NUM</th>
                <th>NOME</th>
                <th>FONE</th>
                <th>EMAIL</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>    
            <?php
                    require_once('../controller/pessoaController.php');
                    $pessoa = new pessoa(); 
                    $consulta = $pessoa->consulta();

                    foreach($consulta as $linha){
                        $id = $linha['id'];
                        $nome = $linha['nome'];
                        $fone = $linha['fone'];
                        $email = $linha['email'];

                        echo"
                        <tr>
                            <td>$id</td> 
                            <td>$nome</td>
                            <td>$fone</td>
                            <td>$email</td>
                            
                            <td><a class='btn btn-success' href='editar.php?id=$id'>Editar</a></td>

                            <td><a class='btn btn-danger' onclick='confirmDelete($id)' href='#'>Excluir</a></td>

                        </tr>    
                        ";
                    }
                ?>
                <tr>
                    <td colspan="5">
                        <a class="btn btn-primary" href="cadastro.php">CADASTRAR</a>
                    </td>
                    <td>
                        <a class="btn btn-dark" onclick="confirmSair()"
                        href="#">SAIR</a>
                    </td> 
                </tr>
        </table>        
    </section>            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php

        if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'ok'){
            echo  "<script src='js/cadastro.js'></script>";
        }

        if(isset($_GET['edit']) && $_GET['edit'] == 'ok'){
            echo  "<script src='js/editado.js'></script>";
        }

        if(isset($_GET['delete']) && $_GET['delete'] == 'ok'){
            echo  "<script src='js/excluido.js'></script>";
        }

        if(isset($_GET['logado']) && $_GET['logado'] == 'true'){
            echo  "<script src='js/logado.js'></script>";
        }
    ?>

<script>
  function confirmDelete(id) {
    Swal.fire({
        title: "Você tem certeza?",
        text: "Não será possível reverter essa ação!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#c00",
        cancelButtonColor: "#aaa",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim, apagar!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../controller/pessoaController.php?id=${id}&action=excluirPessoa`;
        }
    });
  }

  function confirmSair() {
    Swal.fire({
        title: "DESLOGAR!",
        text: "VOCÊ TEM CERTEZA?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#060",
        cancelButtonColor: "#aaa",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deslogar!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../controller/usuarioController.php?action=sair`;
        }
    });
  }
</script>    


</body>
</html>
<?php
	}else{
		header('Location: index.php');
	}
?>