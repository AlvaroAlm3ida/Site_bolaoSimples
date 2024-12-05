<?php
include_once('config.php');

$sql= "SELECT*FROM Cadastros ORDER BY id_cadastrado ASC";    
$result = $conexao->query($sql);

//print_r($result);
$sql = "SELECT COUNT(nome) AS total FROM Cadastros";

// Consulta para contar o número total de registros
$sql_count = "SELECT COUNT(nome) AS total FROM Cadastros";
$result_count = $conexao->query($sql_count); // Executa a query

if ($result_count) {
    $row = $result_count->fetch_assoc(); // Busca os dados
    $total = $row['total']; // Armazena o total de registros
}

// Consulta para contar o número total de PAGAMENTOS
$sql_count = "SELECT COUNT(pagamento) AS total_pagamentos FROM Cadastros WHERE pagamento ='sim'";
$result_count = $conexao->query($sql_count); // Executa a query

if ($result_count) {
    $row = $result_count->fetch_assoc(); // Busca os dados
    $total_pagamentos = $row['total_pagamentos']; // Armazena o total de registros
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado-Sener</title>   
    <style>
        header img {

width: 15%;
height: auto;

}
    
    body{
    
    margin: 0;
    height: 100vh;
    width: 100vw;
    background:#fff
}

.resposta-sim {
        background-color: #d4edda; /* Cor verde claro para "Sim" */
        color: #155724; /* Texto verde escuro */
        }
        .resposta-nao {
            background-color: #fff; /* Cor BRANCO para "Não" */
           
        }
table{
    background:  #ADD8E6;
}

</style>
</head>
<header>
        <img src="logo_sener 1.png" alt="Logo Sener">
    </header>
<body>
    <h1>CONSULTA DE CADASTRADOS E EDIÇÃO </h1>
    <h2> <?php echo "NÚMERO DE PESSOAS: " . $total ?> </h2>
    <h2> <?php echo "NÚMERO DE PAGAMENTOS: " . $total_pagamentos ?> </h2>
    <table width="1000px" border="1">    
    <tr>
           <!-- <th>ID</th> -->
            <th>Nome</th>
            <th>Setor</th>
            <th>Diciplina</th>
            <th>Pagamento</th>
            <th>Editar</th>
            <th>Excluir</th>
    </tr>

    <?php 

    while($user_data = mysqli_fetch_assoc($result))
    {
        // Define a classe de estilo com base no valor de 'pagamento'
        $classe_pagamento = ($user_data['pagamento'] == "sim") ? "resposta-sim" : "resposta-nao";
        echo"<tr class = '$classe_pagamento '>";
        //echo "<td>".$user_data['id_cadastrado']."</td>";
        echo "<td>".$user_data['Nome']."</td>";
        echo "<td>".$user_data['setor']."</td>";
        echo "<td>".$user_data['diciplina']."</td>";
            // Exibe o campo de pagamento somente se for "sim"
            if($user_data['pagamento']=="sim"){
                    echo "<td>" . $user_data['pagamento'] . "</td>";       
            } else{
                echo "<td style='display:'';'></td>"; //campo oculto
            }

        echo "<td>
                <a class='btn btn-sm btn-primary' href='edit.php?id_cadastrado=$user_data[id_cadastrado]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                </svg>
                </a>
                  </td>";

         echo "<td>

                <a class='btn btn-sm btn-danger' href='delete.php?id_cadastrado=$user_data[id_cadastrado]'>>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                </svg>

                </a>

            </td>";

        echo "</tr>"; 

    }

?>

</table>


    
  


</body>