<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Equipamentos Comprados</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>

<h1>Buscar Equipamentos Comprados</h1>

<?php

    $query_resultado = "SELECT tipo, dt_ini, valor FROM dias JOIN designado_comprado ON dias.id_dias = designado_comprado.id_dias JOIN comprado ON comprado.id_equipamento = designado_comprado.id_equipamento_comprado ORDER BY dt_ini ASC";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
        
        while($row_users = $resultado->fetch(PDO::FETCH_BOTH)){
        
        //facilita na hora de printar os dados
        extract($row_users);
        echo "Tipo do equipamento: " . $tipo . "<br>Data de quando foi recebido: " . $dt_ini . "<br>Custo: " . $valor . "<br> <hr>";
    }}else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }

?>

</body>
</html>