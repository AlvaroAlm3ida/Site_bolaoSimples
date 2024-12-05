<?php
if(isset($_POST['submit']))
{
        //print_r('Nome:' . $_POST['username']);
        //print_r('<br>');
       // print_r('Setor:' . $_POST['setor']);
       // print_r('<br>');
       // print_r('Diciplina:' . $_POST['diciplina']);
        //print_r('<br>');
        //print_r('pagamento:' . $_POST['pagamento']);
        include_once('config.php');

       $nome = $_POST['username'];
       $setor = $_POST['setor'];
       $diciplina = $_POST['diciplina'];
       $pagamento = $_POST['pagamento'];

       
       // Verifica se o registro já existe no banco
    $query = "SELECT * FROM Cadastros WHERE nome = '$nome'";
    $resultado = mysqli_query($conexao, $query);
      
        //Nessa parte faz o insert que vai para o banco de dados:
      //$result = mysqli_query($conexao, "INSERT INTO Cadastros(nome,setor,diciplina,pagamento)     
      // VALUES('$nome','$setor','$diciplina','$pagamento')");


    if (mysqli_num_rows($resultado) > 0) {
        // Registro duplicado
        echo "<script>alert('Erro: Já existe um cadastro com esse nome.')</script>";
    } else {
        // Realiza o INSERT se não for duplicado
        $result = mysqli_query($conexao, "INSERT INTO Cadastros(nome, setor, diciplina, pagamento)     
        VALUES('$nome', '$setor', '$diciplina', '$pagamento')");
    }

       if($resultado){
        echo "<script>alert('Cadastro realizado com sucesso!')</script>";
       }
       else 
       {
        echo "<script>alert('Erro ao cadastrar')</script>";
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
            <form action="index.php" method="POST">
                <h2 class="title">Cadastrar  </h2>
    
                <label for="username">Nome</label>
                <div class="input">
                    <i class="fa-regular fa-user"></i>
                    <input id="username" name="username" placeholder="Username" type="text" />                
                </div>
                <label for="setor">Setor (Energy,mobility ou corporate)</label required>
                <div class="input">
                    <i class="fa-solid fa-envelope"></i>
                    <input id="setor" name="setor" placeholder="Setor" type="text" required />           
                </div>
                <label for="diciplina">Diciplina</label required>
                <div class="input">
                    <i class="fa-solid fa-key"></i>
                    <input id="diciplina" name="diciplina" placeholder="Ex: CIVIL" type="text" required/>               
                </div>
                <p>Efetuou o pagamento?</p>
                <input type="radio" name="pagamento" id="sim" value="sim">
                <label for="sim">Sim</label>
                <input type="radio" name="pagamento" id="nao" value="nao"> 
                <label for="nao">Não</label>
                <div id="btn">
                    <button type="submit" name="submit">Cadastrar no bolão</button>
                    <br>
                    <button type="button" onclick="window.location.href='consult.php';">Consulte</button>
                </div>
              
            </form>
        </div>
</body>
</html>