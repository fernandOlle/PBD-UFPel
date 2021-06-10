
<?php
    include("./modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Menu
        </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class= "panel">
        <center>
            <h1>
                <a a href= "https://github.com/fernandOlle/PBD-UFPel" class= "test"><img src="pbdprototipo.png" width= auto; height= 220px;></a>
            </h1>
        </center>
    </div>
    <br>
        <center>
        <a href="./modulos/Select_Adicionar.php" class= "button buttontest">Adicionar</a>
        <a href="./modulos/Select_Listar.php" class= "button buttontest">Listar</a>
        <a href="./modulos/Select_Apagar.php" class= "button buttontest">Apagar</a>
        <a href="./modulos/Buscas.php" class= "button buttontest">BuscasSQL</a>
        </center>
</body>
</html>