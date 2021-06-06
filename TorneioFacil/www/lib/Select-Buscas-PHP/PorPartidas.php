<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar por times</title>
</head>
<body>
<a href="../../index.php">Voltar para o inicio</a>

<h1>Buscar por partidas</h1>

<?php

    $query_resultado = "SELECT nome_time, dt_ini, hr_ini FROM dias INNER JOIN participa ON participa.id_dias = dias.id_dias INNER JOIN times ON times.id_time = participa.id_time ORDER BY dt_ini ASC";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){

        //faz a busca pela coluna
        $row_usuários = $resultado->fetch(PDO::FETCH_ASSOC);
        
        //facilita na hora de printar os dados
        extract($row_usuários);
        echo "Nome do time: " . $nome_time . "<br>Data do inicio da partida: " . $dt_ini . "<br>Hora do inicio da partida: " . "<br> <hr>";
    }else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }

?>

</body>
</html>