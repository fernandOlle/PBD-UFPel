<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Comprado</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Comprado</h1>
    <form method="POST" action="Comprado.php">
    <input type="text" name="tipo" id="nome" placeholder="Digite o tipo de matérial/objeto" required><br><br>
    <input type="text" name="designado" id="nome" placeholder="Digite o local designado" required><br><br>
    <input type="int" name="valor" id="nome" placeholder="Digite o valor"><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];
    $designado = $_POST["designado"];

    $query_Comprado = "INSERT INTO comprado (tipo, valor, partdesiguinada) VALUES ('$tipo', '$valor', '$designado')";
    $cad_Comprado = $pdo->prepare($query_Comprado);
    $cad_Comprado->execute();

    if( $cad_Comprado->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert(' Comprado cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro: Comprado não cadastrado!');</script>";
    }

    }
?>