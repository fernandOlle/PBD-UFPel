<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Integrante</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Integrante</h1>
    <form method="POST" action="Integrante.php">
    <input type="varchar" name="cpf" id="nome" placeholder="Digite o cpf" required><br><br>
    <input type="text" name="nome" id="nome" placeholder="Digite o nome" required><br><br>
    <input type="email" name="email" id="nome" placeholder="Digite o email, ex: exemplo@gmail.com" required><br><br>
    <input type="int" name="id_time" id="nome" placeholder="Digite o ID do time que irá participar" required><br><br>


        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $id_time = $_POST["id_time"];

    $buscar_id = "SELECT * from times where id_time = '$id_time' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0){
        //Se não achou no banco de dados o ID do time fornecido
        echo "<script>alert('ID de time não encontrado');</script>";
    else{
        //Se achou ele adiciona
        $query_Integrante = "INSERT INTO integrante (cpf, nome , email, id_time ) VALUES ('$cpf', '$nome', '$telefone', '$email', '$id_time')";
        $cad_Integrante = $pdo->prepare($query_Integrante);
        $cad_Integrante->execute();
    }

    if( $cad_Integrante->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert('Integrante cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro: Integrante não cadastrado!');</script>";
    }

    }
?>