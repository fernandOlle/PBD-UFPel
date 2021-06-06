<?php
    include("./Conexao.php");

if( isset($_POST['Testando']) ){
    // verifica se foi selecionado
    $resultado = $_POST['Testando'];

    switch($resultado){
        case "1":
            header('Location: ../lib/Select-Buscas-PHP/PorPartidas.php');
        break;
    
        case "2":
            header('Location: ../lib/Select-Buscas-PHP/PorTimes.php');
        break;
    
        case "3":
            header('Location: ../lib/Select-Buscas-PHP/Equipamentos.php');
        break;
        
        case "4":
            header('Location: ../lib/Select-Buscas-PHP/Patrocinador.php');
        break;
    
        case "5":
            header('Location: ../lib/Select-Buscas-PHP/Ingresso.php');
        break;
            
        case "6":
            header('Location: ../lib/Select-Buscas-PHP/Organizador.php');
        break;   
    }

}else{
    $resultado = 0;
}


?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuscasSQL</title>
</head>
<body>
<a href="../index.php">Voltar para o inicio</a>
<form method="POST" style="width : 30%" action="Buscas.php">
  <select class="form-select" aria-label="Default select example" name="Testando">
    <option selected>Selecione um banco para listar</option>
    <option value="1">Busca Integrantes por Dia</option>
    <option value="2">Busca Integrantes por Time</option>
    <option value="3">Busca Equipamento</option>
    <option value="4">Patrocinador</option>
    <option value="5">Busca Ingresso</option>
    <option value="6">Busca Dados Organizador</option>

  </select>

<!-- botão -->
<input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" value="Enviar">
</form>
</body>
</html>