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

    $query_resultado = "SELECT nome, email, cpf, integrante.id_time FROM integrante INNER JOIN ttimes ON integrante.id_time = ttimes.id_time and ttimes.id_time = $id";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
        //$i = 0;
        //faz a busca pela coluna
        
        while($row_users = $resultado->fetch(PDO::FETCH_BOTH)){
        //facilita na hora de printar os dados
        //$i+=1;
        extract($row_users);
        //foreach($row_users as $jogadores){
            echo "Nome: " . $row_users["nome"] . "<br>Email: " . $row_users["email"] . "<br>cpf: " . $row_users["cpf"] . "<br>ID do time: " . $row_users["id_time"] . "<br> <hr>";
        }
    }else{
        echo "<script>alert('Erro: Nenhum dado encontrado!');</script>";
    }
}

?>

</body>
</html>