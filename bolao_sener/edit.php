<?php

if(!empty($_GET['id_cadastrado']))
{
    include_once('config.php');

    $id = $_GET['id_cadastrado'];

    $sqlSelect = "SELECT * FROM Cadastros WHERE id_cadastrado=$id";

    $result = $conexao->query($sqlSelect);

    if($result -> num_rows > 0)
        {
            while($user_data = $result->fetch_assoc())
                {
                        $nome = $user_data['Nome'];
                        $setor = $user_data['setor'];
                        $diciplina = $user_data['diciplina'];
                        $pagamento = $user_data['pagamento'];
                }
      }
      
else
{
    header('Location: consult.php');
}
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <img src="logo_sener 1.png" alt="Logo Sener">
    </header>
       
        <div id="form">
            <form action="saveEdit.php" method="POST">
                <h2 class="title">Editar </h2>
    
                <label for="username">Nome</label>
                <div class="input">
                    <i class="fa-regular fa-user"></i>
                    <input id="username" name="username" placeholder="Username" type="text" value="<?php echo $nome ?>"/>                
                </div>
                <label for="setor">Setor (Energy,mobility ou corporate)</label required>
                <div class="input">
                    <i class="fa-solid fa-envelope"></i>
                    <input id="setor" name="setor" placeholder="Setor" type="text" value="<?php echo $setor ?>" required />           
                </div>
                <label for="diciplina">Diciplina</label required>
                <div class="input">
                    <i class="fa-solid fa-key"></i>
                    <input id="diciplina" name="diciplina" placeholder="Ex: CIVIL" type="text" value="<?php echo$diciplina?>" required/>               
                </div>
                <p>Efetuou o pagamento?</p>
                <input type="radio" name="pagamento" id="sim" value="sim" <?php echo($pagamento == 'sim') ? 'checked' : '' ?> >
                <label for="sim">Sim</label>
                <input type="radio" name="pagamento" id="nao" value="nao" <?php echo($pagamento == 'nao') ? 'checked' : '' ?> >
                <label for="nao">Não</label>

                   

                <div id="btn">
                 <input type ="hidden" name="id_cadastrado" value="<?php echo $id ?>">
                   <button type="submit" name="update" id="update">Editar</button>
                </div>
                
            </form>
        </div>
</body>
</html>
