<?php
session_start();
require_once "../repositorio/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
   <?php 
      $sql = 'SELECT * FROM arquivos';
      $resultado = mysqli_query($connect,$sql);
      $dados = mysqli_fetch_array($resultado);
    
    ?>
   <img src="<?php echo $dados['caminho'] ?>" width="35%" alt="Minha imagem">


</body>
</html>