<?php
   include_once('config.php');
   
    if(isset($_POST['update']))
    {

     

        $id = $_POST['id_cadastrado'];
        $nome = $_POST['username'];
        $setor = $_POST['setor'];
        $diciplina = $_POST['diciplina'];
        $pagamento = $_POST['pagamento'];

        $sqlUpdate = "UPDATE cadastros SET nome='$nome' , setor = '$setor', diciplina = '$diciplina' , pagamento = '$pagamento'
        WHERE id_cadastrado='$id'";

        $result = $conexao ->query($sqlUpdate);

       
    // Executando a consulta
    if ($conexao->query($sqlUpdate)) {
        echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
        header("Location: consult.php"); // Redireciona após o update
        exit(); // Importante para garantir que o script pare após o redirecionamento
    } else {
        echo "<script>alert('Erro ao atualizar cadastro: " . mysqli_error($conexao) . "');</script>";
    }

    }
   
?>