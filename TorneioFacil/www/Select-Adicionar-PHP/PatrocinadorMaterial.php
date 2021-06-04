<?php
    include("../Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Patrocinador Material</title>
</head>
<body>
    <a href="../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Patrocinador Material</h1>
    <form method="POST" action="PatrocinadorMaterial.php">
    <input type="text" name="tipo" id="nome" placeholder="Digite o tipo de matérial/objeto" required><br><br>
    <label>Digite a data que foi fornecido: </label>
        <input type="date" name="Data" id="nome" placeholder="Digite a data que foi fornecido" required><br><br>
        <input type="text" name="local_guardado" id="nome" placeholder="Digite o local onde foi guardado" required><br><br>
        <input type="int" name="id_torneio" id="nome" placeholder="Digite o ID do torneio" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $Data = $_POST["Data"];
    $tipo = $_POST["tipo"];
    $local_guardado = $_POST["local_guardado"];
    $id_torneio = $_POST["id_torneio"];
    
    $buscar_id = "SELECT * from torneio where id_torneio = '$id_torneio' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0){
        //Se não achou no banco de dados o ID do torneio fornecido
        echo "<script>alert('ID de torneio não encontrado');</script>";
    }else{
        //Se achou ele adiciona
        $query_patrocinador = "INSERT INTO patrocinadormaterial (tipo, dt_aquisicao, local_guardado, id_torneio ) VALUES ('$tipo', '$Data', '$local_guardado', '$id_torneio')";
        $cad_patrocinador = $pdo->prepare($query_patrocinador);
        $cad_patrocinador->execute();
    }

    if( $cad_patrocinador->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert('Patrocinador material cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro: Patrocinador material não cadastrado!');</script>";
    }

    }
?>