<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Deletar Comprado</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Comprado </h1>
    <form method="POST" action="Comprado.php">

    <input type="text" name="id" id="id" placeholder="Digite o ID para Apagar" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
if( isset($_POST['BotaoEnviar']) ){

    // verifica se já foi enviado algo pelo formulário

    $id = $_POST["id"] + 0;
    // + 0 força ele p converter a int

    $query_resultado = "SELECT * FROM comprado WHERE id_equipamento = $id LIMIT 1";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
    $remover = "DELETE FROM comprado WHERE  id_equipamento = $id";
    $apagar = $pdo->prepare($remover);

    if( $apagar->execute() ){
        echo "<script>alert('Comprado apagado com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Comprado não apagado!');</script>";
    }

    }
}
?>