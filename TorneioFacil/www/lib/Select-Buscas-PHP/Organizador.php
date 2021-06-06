<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ingressos</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>

<h1>Listar Ingressos</h1>

<?php

    $query_resultado = "SELECT nome, telefone, cpf, email from organizador";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
        
        while($row_users = $resultado->fetch(PDO::FETCH_BOTH)){
        
        //facilita na hora de printar os dados
        extract($row_users);
        echo "Nome: " . $nome . "<br>Telefone: " . $telefone . "<br>CPF: " . $cpf . "<br>Email: " . $email ."<br> <hr>";
    }}else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }

?>

</body>
</html>