<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Designado Alugado/Emprestado</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Designado Alugado/Emprestado</h1>
    <form method="POST" action="Designado_comprado.php">
    <input type="int" name="id_dias" id="nome" placeholder="Digite o ID do dia que será designado esse equipamento" required><br><br>
    <input type="int" name="id_equipamento_alugadoemprestado" id="nome" placeholder="Digite o ID do equipamento comprado" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $id_dias = $_POST["id_dias"];
    $id_equipamento_alugadoemprestado = $_POST["id_equipamento_alugadoemprestado"];

    $buscar_id = "SELECT * from alugadoemprestado where id_equipamento = '$id_equipamento_alugadoemprestado' ";
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
    }else{
        //Se achou ele adiciona
        $query_alugadoemprestado = "INSERT INTO designado_alugadoemprestado (id_dias, id_equipamento_alugadoemprestado) VALUES ('$id_dias', '$id_equipamento_alugadoemprestado')";
        $cad_alugadoemprestado = $pdo->prepare($query_alugadoemprestado);
        $cad_alugadoemprestado->execute();
        if( $cad_alugadoemprestado->rowCount() ){
            //se conseguiu cadastrar
            echo "<script>alert('Designado Alugado/Emprestado cadastrado!');</script>";
        }else{
            echo "<script>alert('Erro: Designado Alugado/Emprestado não cadastrado!');</script>";
        }
    }
    

    }
?>