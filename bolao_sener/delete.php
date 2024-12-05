<?php

if(!empty($_GET['id_cadastrado']))
{
    include_once('config.php');

    $id = $_GET['id_cadastrado'];

    $sqlSelect = "SELECT * FROM Cadastros WHERE id_cadastrado=$id";

    $result = $conexao->query($sqlSelect);

    if($result -> num_rows > 0)
        {
           $sqlDelete = "DELETE FROM Cadastros WHERE id_Cadastrado=$id";
           $resultDelete = $conexao->query($sqlDelete);
      }
      

         // Verifica se a exclusão foi bem-sucedida
         if ($resultDelete) {
            // Exclusão bem-sucedida, redireciona
            header('Location: consult.php');
            exit(); // Garante que o código pare aqui
        } else {
            // Erro ao excluir
            echo "Erro ao excluir registro: " . $conexao->error;
        }
    } else {
        // Registro não encontrado
        echo "Registro não encontrado.";
    }



?>