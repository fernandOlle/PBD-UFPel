<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Alugado/Emprestado</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Alugado/Emprestado</h1>
    <form method="POST" action="alugadoemprestado.php">
    <input type="text" name="tipo" id="nome" placeholder="Digite o tipo de matérial/objeto" required><br><br>
    <label>Digite a data de devolução: </label>
        <input type="date" name="hora" id="nome" placeholder="Digite a data de devolução" required><br><br>
    <input type="int" name="valor" id="nome" placeholder="Digite o valor"><br><br>
    <input type="boolean" name="emprestado" id="nome" placeholder="Sé é emprestado (TRUE/1) ou alugado(FALSE/0)"><br><br>
    <input type="text" name="designado" id="nome" placeholder="Digite o local designado" required><br><br>
    <input type="int" name="id_patrocinador" id="nome" placeholder="Digite o ID do patrocinador"><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    // false = alugado
    // true = emprestado
    if( isset($_POST['BotaoEnviar']) ){

    $tipo = $_POST["tipo"];
    $hora = $_POST["hora"];
    $valor = $_POST["valor"];
    $emprestado = $_POST["emprestado"];
    $designado = $_POST["designado"];
    $id_patrocinador = $_POST["id_patrocinador"];

    $buscar_id = "SELECT * from patrocinadormaterial where id_patrocinio = '$id_patrocinador' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0){
        //Se não achou no banco de dados
        echo "<script>alert('ID patrocinador não foi encontrado');</script>";
    else{
        //Se achou ele adiciona
        $query_alugadoemprestado = "INSERT INTO alugadoemprestado (tipo, datadevolucao, valor, emprestado, partdesiguinada, id_patrocinio) VALUES ('$tipo', '$hora', '$valor', '$emprestado', '$designado', '$id_patrocinador')";
        $cad_alugadoemprestado = $pdo->prepare($query_alugadoemprestado);
        $cad_alugadoemprestado->execute();
    }

    if( $cad_alugadoemprestado->rowCount() ){
        //se conseguiu cadastrar
        echo "<script>alert(' Alugado/Emprestado cadastrado!');</script>";
    }else{
        echo "<script>alert('Erro:  Alugado/Emprestado não cadastrado!');</script>";
    }

    }
?>