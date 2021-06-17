<?php
    include("./Conexao.php");

if( isset($_POST['Testando']) ){
    // verifica se foi selecionado
    $resultado = $_POST['Testando'];

    switch($resultado){
        case "1":
            header('Location: ../lib/Select-Apagar-PHP/Torneio.php');
        break;
    
        case "2":
            header('Location: ../lib/Select-Apagar-PHP/Patrocinador.php');
        break;
    
        case "3":
            header('Location: ../lib/Select-Apagar-PHP/Organizador.php');
        break;
        
        case "4":
            header('Location: ../lib/Select-Apagar-PHP/Dias.php');
        break;
    
        case "5":
            header('Location: ../lib/Select-Apagar-PHP/Ingresso.php');
        break;
            
        case "6":
            header('Location: ../lib/Select-Apagar-PHP/PatrocinadorMaterial.php');
        break;
        
        case "8":
            header('Location: ../lib/Select-Apagar-PHP/Times.php');
        break;
        
        case "9":
            header('Location: ../lib/Select-Apagar-PHP/Integrante.php');
        break;
        
        case "11":
            header('Location: ../lib/Select-Apagar-PHP/AlugadoEmprestado.php');
        break;
                
        case "12":
            header('Location: ../lib/Select-Apagar-PHP/Comprado.php');
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
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Cadastrar</title>
</head>
<body>
<center><a href="../index.php" class= "button">Voltar para o inicio</a>
<form method="POST" style="width:25%" action="Select_Apagar.php">
  <select class="form-select" aria-label="Default select example" name="Testando">
    <option selected>Selecione um banco para Apagar</option>
    <option value="1">Torneio</option>
    <option value="2">Patrocinador</option>
    <option value="3">Organizador</option>
    <option value="4">Dias</option>
    <option value="5">Ingresso</option>
    <option value="6">PatrocinadorMaterial</option>
    <option value="8">Times</option>
    <option value="9">Integrante</option>
    <option value="11">AlugadoEmprestado</option>
    <option value="12">Comprado</option>

  </select>

<!-- botão -->
<input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" value="Enviar">
</form>
</body>
</html>