
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
        session_start();
        if(isset($_POST['login'])){
            $nome = mysqli_escape_string($connect,$_POST['nome']);
            $senha = mysqli_escape_string($connect,$_POST['senha']);

            if(empty($nome) and empty($senha)){
                echo 'Senha/nome não pode ser vazio';
            }

            $sql = "SELECT nome from usuarios where nome = '$nome' ";
            $resultado = mysqli_query($connect,$sql);
            
            if(mysqli_num_rows($resultado) > 0){

                $sqlSenha = "SELECT senha from usuarios where nome = '$nome' ";
                $senhaDb = mysqli_query($connect,$sqlSenha);
                $dados = mysqli_fetch_assoc($senhaDb);
                $senhaBanco = implode(" ",$dados);

                if(password_verify($senha,$senhaBanco)){

                        $sql = "SELECT * FROM usuarios  WHERE nome = '$nome'";
                        $resultado = mysqli_query($connect,$sql);

                           if(mysqli_num_rows($resultado) == 1){
                               $_SESSION['logado'] = true;
                               $dados = mysqli_fetch_array($resultado);
                               $_SESSION['id'] = $dados['id'];
                               header('location: ../pag/index.php?msg=logado');
                            }
                }else{
                        echo 'incorreto';
                }
                 
        
            }
        }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
      nome : <input type="text" name="nome" id="">
      senha : <input type="password" name="senha" id="">
      <button type="submit" name="login">Entrar</button>
    </form>
    
</body>
</html>