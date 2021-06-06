<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Organizador </title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Organizador </h1>
    <form method="POST" action="Organizador.php">

    <input type="text" name="id" id="id" placeholder="Digite o cpf" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
if( isset($_POST['BotaoEnviar']) ){

    // verifica se já foi enviado algo pelo formulário

    $id = $_POST["id"] + 0;
    // + 0 força ele p converter a int

    $query_resultado = "SELECT * FROM organizador WHERE cpf = $id LIMIT 1";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
    $remover = "DELETE FROM organizador WHERE  cpf = $id";
    $apagar = $pdo->prepare($remover);

    if( $apagar->execute() ){
        echo "<script>alert('Organizador apagado com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Organizador não apagado!');</script>";
    }

    }
}
?>