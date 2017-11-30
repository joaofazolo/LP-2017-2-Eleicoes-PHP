<?php
    include_once(__DIR__.'/domain/partido.php');
    include_once(__DIR__.'/domain/candidato.php');
    include_once(__DIR__.'/io/leitor.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <title>Trabalho PHP</title>
</head>
<body>
    <div>
        <form action="./io/leitor.php" method="post">
            <p> Arquivo de Entrada: </p>
            <p> <input type="text" name="ArquivoEntrada"> </p>
            <p> <input type="submit"> </p>
        </form>
    </div>
</body>
</html>