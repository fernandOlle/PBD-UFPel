<?php
    include("../Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Designado Comprado</title>
</head>
<body>
    <a href="../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Designado Comprado</h1>
    <form method="POST" action="Designado_comprado.php">
    <input type="int" name="id_dias" id="nome" placeholder="Digite o ID do dia que será designado esse equipamento" required><br><br>
    <input type="int" name="id_equipamento_comprado" id="nome" placeholder="Digite o ID do equipamento comprado" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $id_dias = $_POST["id_dias"];
    $id_equipamento_comprado = $_POST["id_equipamento_comprado"];

    $buscar_id = "SELECT * from comprado where id_equipamento = '$id_equipamento_comprado' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    $buscar_id2 = "SELECT * from dias where id_dias = '$id_dias' ";
    $verificar_busca2 = $pdo->prepare($buscar_id2);
    $verificar_busca2->execute();
    $numRegistros2 = $verificar_busca2->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0 || $numRegistros2 == 0 ){
        //Se não achou no banco de dados algum dos 2 dados
        echo "<script>alert('Algum dado não foi encontrado');</script>";
    else{
        //Se achou ele adiciona
        $query_Designadocomprado = "INSERT INTO designado_comprado (id_dias, id_equipamento_comprado) VALUES ('$id_dias', '$id_equipamento_comprado')";
        $cad_Designadocomprado = $pdo->prepare($query_Designadocomprado);
        $cad_Designadocomprado->execute();
    }

    if( $cad_Designadocomprado->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert('Designado comprado cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro: Designado comprado não cadastrado!');</script>";
    }

    }
?>