<?php
    include("./Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>

<form method="POST" action="Select_Apagar.php">
  <select class="form-select" aria-label="Default select example" name="Testando">
    <option selected>Selecione um banco para Apagar</option>
    <option value="1">Torneio</option>
    <option value="2">Patrocinador</option>
    <option value="3">Organizador</option>
    <option value="4">Dias</option>
    <option value="5">Ingresso</option>
    <option value="6">PatrocinadorMaterial</option>
    <option value="7">Equipamento</option>
    <option value="8">Times</option>
    <option value="9">Integrante</option>
    <option value="10">IntegrantesTime</option>
    <option value="11">Designado</option>
    <option value="12">AlugadoEmprestado</option>
    <option value="13">Comprado</option>
    <option value="14">Participa</option>

  </select>

<!-- botão -->
<input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" value="Enviar">
</form>

<?php

if( isset($_POST['Testando']) ){
    // verifica se foi selecionado
    $resultado = $_POST['Testando'];
}else{
    $resultado = 0;
}

switch($resultado){
    case "1":
    break;

    case "2":
    break;

    case "3":
    break;
    
    case "4":
    break;

    case "5":
    break;
        
    case "6":
    break;

    case "7":
    break;
    
    case "8":
    break;
    
    case "9":
    break;
        
    case "10":
    break;
    
    case "11":
    break;
            
    case "12":
    break; 
    
    case "13":
    break;
                
    case "14":
    break;      
}

?>

</body>
</html>