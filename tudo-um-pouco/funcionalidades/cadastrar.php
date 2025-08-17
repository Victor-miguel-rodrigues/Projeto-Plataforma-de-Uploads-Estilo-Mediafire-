<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
        require_once '../repositorio/db.php';
        
        if(isset($_POST['enviar'])){
            $nome = mysqli_escape_string($connect, $_POST['nome']);
            $senha = mysqli_escape_string($connect,$_POST['senha']);
            $email = mysqli_escape_string($connect, $_POST['email']);

            if(!empty($nome) or !empty($email) or !empty($senha)){
                $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$novaSenha')";

                if(mysqli_query($connect,$sql)){
                     mysqli_close($connect);
                    $_SESSION['status-cadastro'] = true;
                    $_SESSION['mensagem'] = "Cadastrado com sucesso";
                    header('location: ../index.php?msg=sucesso');
                }
            }else{
                echo "Campos não pode ser nulo";
            }
            
        }
    
        ?>
    
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        login : <input type="text" name="nome" id="nome"><br>
        email : <input type="text" name="email" id="email"><br>
        senha : <input type="text" name="senha" id="senha"><br>
        <button type="submit" name="enviar">cadastrar</button>
     </form>
</body>
</html>