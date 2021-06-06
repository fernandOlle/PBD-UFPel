<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar participa</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar participa</h1>
    <form method="POST" action="Participa.php">
    <input type="int" name="id_dias" id="nome" placeholder="Digite o ID do dia que o time irá participar" required><br><br>
    <input type="int" name="id_time" id="nome" placeholder="Digite o ID do time que irá participar" required><br><br>


        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $id_dias = $_POST["id_dias"];
    $id_time = $_POST["id_time"];

    $buscar_id = "SELECT * from dias where id_dias = '$id_dias' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    $buscar_id2 = "SELECT * from times where id_time = '$id_time' ";
    $verificar_busca2 = $pdo->prepare($buscar_id2);
    $verificar_busca2->execute();
    $numRegistros2 = $verificar_busca2->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0 || $numRegistros2 == 0){
        //Se não achou algum dos 2 ID
        echo "<script>alert('Algum dado não foi encontrado');</script>";
    }else{
        //Se achou ele adiciona
        $query_participa = "INSERT INTO participa (id_dias, id_time) VALUES ('$id_dias', '$id_time')";
        $cad_participa = $pdo->prepare($query_participa);
        $cad_participa->execute();
        if( $cad_participa->rowCount() ){
            //se conseguiu cadastrar
            echo "<script>alert('Participa cadastrado!');</script>";
        }else{
            echo "<script>alert('Erro: Participa não cadastrado!');</script>";
        }
    }


    }
?>