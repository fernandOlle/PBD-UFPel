<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Torneio</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Torneio</h1>
    <form method="POST" action="Torneio.php">
        <label>Digite a data de inicio: </label>
        <input type="date" name="dataINI" id="nome"required><br><br>
                                                            <!–- required faz com que não seja vazio  -–>
        <label>Digite a data de fim: </label>
        <input type="date" name="dataFIM" id="nome" placeholder="Digite a data de fim" required><br><br>

        <input type="bigint" name="orcamento" id="nome" placeholder="Digite o orçamento" required><br><br>

        <input type="text" name="end" id="nome" placeholder="Digite o endereço"><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
if( isset($_POST['BotaoEnviar']) ){

$dataINI = $_POST["dataINI"];
$dataFIM = $_POST["dataFIM"];
$orcamento = $_POST["orcamento"];
$end = $_POST["end"];

if($dataFIM < $dataINI){
    echo "<script>alert('Erro: data fornecida inválida');</script>";
    return;
}

$query_torneio = "INSERT INTO torneio (dt_ini, dt_fim, orcamento, endereco) VALUES ('$dataINI', '$dataFIM', '$orcamento', '$end')";

$cad_torneio = $pdo->prepare($query_torneio);
$cad_torneio->execute();

if( $cad_torneio->rowCount() ){
    //se conseguiu cadastrar
    echo "<script>alert('Torneio cadastrado!');</script>";
}else{
    echo "<script>alert('Erro: Torneio não cadastrado!');</script>";
}

}
?>