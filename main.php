<?php
    include 'c:\xampp\htdocs\LP\domain\candidato.php';
    include 'c:\xampp\htdocs\LP\domain\partido.php';
    include 'c:\xampp\htdocs\LP\io\leitor.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <title>Trabalho</title>
</head>
<body>
    <div id="header">
        <p>Trabalho LP PHP</p>
    </div>
    <div>
        <p>
    <?php
        //Vetor de candidatos
        $vetCandidatos;
        lerCSV("vitoria2016.csv");
    ?>
    </p>
    </div>
    
</body>
</html>