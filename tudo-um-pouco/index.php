<?php  
session_start();

if (isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']); // opcional: limpa para não repetir
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>
        <li><a href="funcionalidades/logar.php">login</a></li>
        <li><a href="funcionalidades/cadastrar.php">cadastrar</a></li>
    </ul>

    <div class=" ">
        <div class="title">
            <h1>Upload de arquivos online</h1>
            <div>
                <p>Quer hospedar seus arquivos para abaixar depois?</p>
                <p>Esta sem  armazenamento em seu dispositivo?</p>
                <p>Nosso site te da ate 100gigas de armazento, ja pensou em guarda com segurança e praticidade?</p>
                <p>Nossa segurança de ultima ponta, Não se proucupe, Nosso Site permite ate backup Caso voce perca ou apague</p>
            </div>
        </div>
    </div>

</body>
</html>