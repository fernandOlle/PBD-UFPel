<?php
    include("./Conexao.php");

if( isset($_POST['Testando']) ){
    // verifica se foi selecionado
    $resultado = $_POST['Testando'];

    switch($resultado){
        case "1":
            header('Location: ../lib/Select-Listar-PHP/Torneio.php');
        break;
    
        case "2":
            header('Location: ../lib/Select-Listar-PHP/Patrocinador.php');
        break;
    
        case "3":
            header('Location: ../lib/Select-Listar-PHP/Organizador.php');
        break;
        
        case "4":
            header('Location: ../lib/Select-Listar-PHP/Dias.php');
        break;
    
        case "5":
            header('Location: ../lib/Select-Listar-PHP/Ingresso.php');
        break;
            
        case "6":
            header('Location: ../lib/Select-Listar-PHP/PatrocinadorMaterial.php');
        break;
    
        case "7":
            header('Location: ../lib/Select-Listar-PHP/Designado_alugadoemprestado.php');
        break;
        
        case "8":
            header('Location: ../lib/Select-Listar-PHP/Times.php');
        break;
        
        case "9":
            header('Location: ../lib/Select-Listar-PHP/Integrante.php');
        break;
            
        case "10":
            header('Location: ../lib/Select-Listar-PHP/Designado_comprado.php');
        break;
        
        case "11":
            header('Location: ../lib/Select-Listar-PHP/AlugadoEmprestado.php');
        break;
                
        case "12":
            header('Location: ../lib/Select-Listar-PHP/Comprado.php');
        break; 
        
        case "13":
            header('Location: ../lib/Select-Listar-PHP/Participa.php');
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
    <title>Listar</title>
</head>
<body>
<a href="../index.php">Voltar para o inicio</a>
<form method="POST" action="Select_Listar.php">
  <select class="form-select" aria-label="Default select example" name="Testando">
    <option selected>Selecione um banco para listar</option>
    <option value="1">Torneio</option>
    <option value="2">Patrocinador</option>
    <option value="3">Organizador</option>
    <option value="4">Dias</option>
    <option value="5">Ingresso</option>
    <option value="6">PatrocinadorMaterial</option>
    <option value="7">Designado_alugadoemprestado</option>
    <option value="8">Times</option>
    <option value="9">Integrante</option>
    <option value="10">Designado_comprado</option>
    <option value="11">AlugadoEmprestado</option>
    <option value="12">Comprado</option>
    <option value="13">Participa</option>

  </select>

<!-- botão -->
<input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" value="Enviar">
</form>
</body>
</html>