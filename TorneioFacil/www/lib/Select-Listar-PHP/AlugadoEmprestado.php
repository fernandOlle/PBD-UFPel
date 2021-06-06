<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alugado/Emprestado</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>
    <h1>Listar Alugado/Emprestado</h1>

<?php
    $query_usuarios = "SELECT id_equipamento, tipo, datadevolucao, valor, emprestado, partdesiguinada, id_patrocinio FROM alugadoemprestado";
    $resultado_usuarios = $pdo->prepare($query_usuarios);
    $resultado_usuarios->execute();

    if( ($resultado_usuarios) AND ($resultado_usuarios->rowCount() != 0 ) ){
        while($row_usuários = $resultado_usuarios->fetch( PDO:: FETCH_ASSOC )){
            //vardump($row_usuários);
            extract($row_usuários);
            echo "<br>ID: " . $id_equipamento . "<br>Tipo do Equipamento: " . $tipo . "<br>Data de devolução: " . $datadevolucao . "<br>Valor se alugado: " . $valor . "<br>É emprestado? " . $emprestado . "<br>Parte que foi designada: " . $partdesiguinada . "<br>ID do patrocinador: " . $id_patrocinio . "<br> <hr>";
        }
      
    } else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }