<?php
    include("../Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Dias</title>
</head>
<body>
    <a href="../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Dias</h1>
    <form method="POST" action="Dias.php">
    <label>Digite a data de inicio: </label>
        <input type="date" name="dataINI" id="nome"required><br><br>

        <label>Digite a hora: </label>
        <input type="DateTime" name="hora" id="nome" placeholder="Digite a hora" required><br><br>
        <input type="int" name="id_torneio" id="nome" placeholder="Digite o ID do torneio" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $dataINI = $_POST["dataINI"];
    $hora = $_POST["hora"];
    $id_torneio = $_POST["id_torneio"];

    $buscar_id = "SELECT * from torneio where id_torneio = '$id_torneio' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0){
        //Se não achou no banco de dados o ID do torneio fornecido
        echo "<script>alert('ID de torneio não encontrado');</script>";
    }else{
        // se achou o ID fornecido ele pega o campo da data de inicio e fim do torneio
        $ini_torneio = mysql_query("select dt_ini from $consulta");
        $fim_torneio = mysql_query("select dt_fim from $consulta");

    if( strtotime($ini_torneio) < strtotime($dataINI) || strtotime($dataINI) > strtotime($fim_torneio) ){
        //Se a data fornecida for inválida
        echo "<script>alert('Erro: data fornecida inválida');</script>";
    }else{
        //Se for válida ele adiciona
        $query_Dias = "INSERT INTO dias (dt_ini, hr_ini, id_torneio) VALUES ('$dataINI', '$hora', '$id_torneio')";
        $cad_Dias = $pdo->prepare($query_Dias);
        $cad_Dias->execute();
    }
    }

    if( $cad_Dias->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert('Dias cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro: Dias não cadastrado!');</script>";
    }

    }
?>