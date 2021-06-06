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

<h1>Buscar por times</h1>
    <form method="POST" action="PorTimes.php">
        <label>Id: </label>
        <input type="text" name="id" id="id" placeholder="Digite o ID do time para fazer a busca" required><br><br>
                                                            <!–- required faz com que não seja vazio  -–>
    </form>

<?php

if( !empty( $_POST["id"])  ){
    // verifica se já foi enviado algo pelo formulário

    $id = $_POST["id"] + 0;
    // + 0 força ele p converter a int

    $query_resultado = "SELECT nome, email, cpf, integrante.id_time from integrante INNER JOIN participa ON integrante.id_time = participa.id_time and participa.id_time = $id ";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){

        //faz a busca pela coluna
        $row_usuários = $resultado->fetch(PDO::FETCH_ASSOC);
        
        //facilita na hora de printar os dados
        extract($row_usuários);
        echo "Nome: " . $nome . "<br>Email: " . $email . "<br>cpf: " . $cpf . "<br>ID do time: " . $integrante.id_time . "<br> <hr>";
    }else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }
}

?>

</body>
</html>