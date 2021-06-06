<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Times</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>
    <h1>Listar Times</h1>

<?php
    $query_usuarios = "SELECT id_time, nome_time, nmr_integrantes, total_partidas, rodadaatual, eliminado, id_torneio FROM times";
    $resultado_usuarios = $pdo->prepare($query_usuarios);
    $resultado_usuarios->execute();

    if( ($resultado_usuarios) AND ($resultado_usuarios->rowCount() != 0 ) ){
        while($row_usuários = $resultado_usuarios->fetch( PDO:: FETCH_ASSOC )){
            //vardump($row_usuários);
            extract($row_usuários);
            echo "ID: " . $id_time . "<br>Nome do time: " . $nome_time . "<br>Número de integrabtes: " . $nmr_integrantes . "<br>Total de partidas: " . $total_partidas . "<br>Rodada atual: ". $rodadaatual . "<br>Foi eliminado?" . $eliminado . "<br>ID do torneio:" . $id_torneio . "<br> <hr>";
        }
      
    } else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }