<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Ingresso</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Ingresso</h1>
    <form method="POST" action="Ingresso.php">
    <input type="int" name="valor" id="nome" placeholder="Digite o valor do ingresso" required><br><br>
    <label>Digite a data da partida: </label>
        <input type="date" name="Data" id="nome" placeholder="Digite a data da partida" required><br><br>
        <input type="int" name="assento" id="nome" placeholder="Digite o assento" required><br><br>
    <input type="varchar" name="cpf" id="nome" placeholder="Digite o cpf" required><br><br>
    <input type="int" name="id_torneio" id="nome" placeholder="Digite o ID do torneio" required><br><br>
    <input type="int" name="id_dias" id="nome" placeholder="Digite o ID do dia" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $valor = $_POST["valor"];
    $Data = $_POST["Data"];
    $assento = $_POST["assento"];
    $cpf = $_POST["cpf"];
    $id_torneio = $_POST["id_torneio"];
    $id_dias = $_POST["id_dias"];

    $buscar_id = "SELECT * from torneio where id_torneio = '$id_torneio' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    $buscar_id2 = "SELECT * from dias where id_dias = '$id_dias' ";
    $verificar_busca2 = $pdo->prepare($buscar_id2);
    $verificar_busca2->execute();
    $numRegistros2 = $verificar_busca2->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0 || $numRegistros2 == 0){
        //Se não achou no banco de dados algum dos 3 dados
        echo "<script>alert('Algum dado não foi encontrado');</script>";
    else{ 
        // se achou o ID fornecido ele pega o campo da data desse ID do dia
        $Data = mysql_query("select dt_ini from $consulta2");        

        $query_Ingresso = "INSERT INTO ingresso (valor, dt_partida, nmr_assento , cpf, id_torneio, id_dias ) VALUES ('$valor', '$Data', '$assento', '$cpf', '$id_torneio', '$id_dias')";
        $cad_Ingresso = $pdo->prepare($query_Ingresso);
        $cad_Ingresso->execute();
    }

    if( $cad_Ingresso->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert('Ingresso cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro: Ingresso não cadastrado!');</script>";
    }

    }
?>