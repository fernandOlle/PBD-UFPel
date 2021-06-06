<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Times</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Times</h1>
    <form method="POST" action="Times.php">
    <input type="int" name="nmr_integrantes" id="nome" placeholder="Digite o número de integrantes" required><br><br>
    <input type="text" name="nome_time" id="nome" placeholder="Digite o nome do time" required><br><br>
    <input type="int" name="total_partidas" id="nome" placeholder="Digite o total de partidas" required><br><br>
    <input type="int" name="rodadaatual" id="nome" placeholder="Digite a rodada atual" required><br><br>
    <input type="boolean" name="eliminado" id="nome" placeholder="Digite se o time está eliminado(0/1)" required><br><br>
    <input type="int" name="id_torneio" id="nome" placeholder="Digite o ID do torneio" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $nmr_integrantes = $_POST["nmr_integrantes"];
    $total_partidas = $_POST["total_partidas"];
    $rodadaatual = $_POST["rodadaatual"];
    $eliminado = $_POST["eliminado"];
    $id_torneio = $_POST["id_torneio"];
    $nome_time = $_POST["nome_time"]; 

    $buscar_id = "SELECT * from torneio where id_torneio = '$id_torneio' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0){
        //Se não achou no banco de dados o ID do torneio fornecido
        echo "<script>alert('ID de torneio não encontrado');</script>";
    }else{
        //Se achou ele adiciona
        $query_times = "INSERT INTO ttimes (nmr_integrantes, nome_time, total_partidas, rodadaatual, eliminado, id_torneio) VALUES ('$nmr_integrantes', '$nome_time' '$total_partidas', '$rodadaatual', '$eliminado', '$id_torneio')";
        $cad_times = $pdo->prepare($query_times);
        $cad_times->execute();
        if( $cad_times->rowCount() ){
            //se conseguiu cadastrar
            echo "<script>alert('Time cadastrado!');</script>";
        }else{
            echo "<script>alert('Erro: Time não cadastrado!');</script>";
        }
    }


    }
?>