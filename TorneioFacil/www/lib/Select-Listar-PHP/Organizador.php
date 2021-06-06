<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Organizador</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>
    <h1>Listar Organizador</h1>

<?php
    $query_usuarios = "SELECT cpf, nome, telefone, email, id_torneio FROM organizador";
    $resultado_usuarios = $pdo->prepare($query_usuarios);
    $resultado_usuarios->execute();

    if( ($resultado_usuarios) AND ($resultado_usuarios->rowCount() != 0 ) ){
        while($row_usuários = $resultado_usuarios->fetch( PDO:: FETCH_ASSOC )){
            //vardump($row_usuários);
            extract($row_usuários);
            echo "<br>CPF: " . $cpf . "<br>Nome: " . $nome . "<br>Telefone: " . $telefone . "<br>Email:" . $email . "<br>ID do torneio:" . $id_torneio . "<br> <hr>";
        }
      
    } else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }