<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ingresso</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>
    <h1>Listar Ingresso</h1>

<?php
    $query_usuarios = "SELECT id_ingresso, valor, dt_partida, nmr_assento, cpf, id_torneio, id_dias FROM ingresso";
    $resultado_usuarios = $pdo->prepare($query_usuarios);
    $resultado_usuarios->execute();

    if( ($resultado_usuarios) AND ($resultado_usuarios->rowCount() != 0 ) ){
        while($row_usuários = $resultado_usuarios->fetch( PDO:: FETCH_ASSOC )){
            //vardump($row_usuários);
            extract($row_usuários);
            echo "<br>ID: " . $id_ingresso . "<br>Valor: " . $valor . "<br>Data da partida:" . $dt_partida . "<br>Número do assento:" . $nmr_assento . "<br>CPF da pessoa que comprou:" . $cpf . "<br>ID do torneio:" . $id_torneio . "<br>ID do dia da partida:" . $id_dias . "<br> <hr>";
        }
      
    } else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }