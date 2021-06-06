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

    $query_resultado = "SELECT valor, nmr_assento, cpf, id_ingresso, id_dias from ingresso";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
        
        while($row_users = $resultado->fetch(PDO::FETCH_BOTH)){
        
        //facilita na hora de printar os dados
        extract($row_users);
        echo "Valor: " . $valor . "<br>Número do Assento: " . $nmr_assento . "<br>CPF: " . $cpf . "<br>Id do Ingresso: " . $id_ingresso . "<br>Id do Dia: " . $id_dias . "<br> <hr>";
    }}else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }

?>

</body>
</html>