<?php
require_once "../repositorio/db.php";

session_start();


if(!isset($_SESSION['logado']) or $_SESSION['logado'] == false){
    sleep(3);
    header('location: ../index.php?login=error');
}

$id = $_SESSION['id'];
$sql = "SELECT email from usuarios where id = '$id' ";
$resultado = mysqli_query($connect,$sql);
$dados = mysqli_fetch_array($resultado);

echo " Perfil Seja Bem Vindo :".$dados['email'];

if(isset($_POST['sair'])){
    session_unset();
    session_destroy();
    $_SESSION['logado'] = false;
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=folder" />
</head>
<body>


    <div class="top">
        <div class="content">
            <h1>Arquivos Subidos</h1>
            <p>Seus oploads</p>
        </div>
         <div class="pastas">
             <div class="pasta">
                  <h3> pasta de uploads</h3>
                  <span class="material-symbols-outlined">folder</span><a href="#" onclick="redirecionar(); return false;">Arquivos</a>
             </div>
        </div>
    </div>
    <br>

    <?php
        if(isset($_POST['subir'])){
           //var_dump($_FILES);
            $arquivosPermitidos = array('jpg','jpeg','png','gif');
            $data_upload = date("Y-m-d H:i:s"); // exemplo: 2025-08-16 20:15:00
            $ativo = true;


            $tiposPermitidos = array(
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif'
            );

            //var_dump($_FILES);

            if(isset($_FILES['arquivos'])){

                for($i = 0; $i < count($_FILES['arquivos']['name']) ;$i++){
                    $nome = $_FILES["arquivos"]["name"][$i];
                    $error = $_FILES["arquivos"]["error"][$i];
                    $temporario = $_FILES["arquivos"]["tmp_name"][$i];
                    $size = $_FILES['arquivos']['size'][$i];
                    
                    $extensao = pathinfo($nome, PATHINFO_EXTENSION);

                    if(!empty($nome) and $error == 0) {

                        if(in_array($extensao,$arquivosPermitidos)){

                             $mimeType = mime_content_type($temporario);

                             if(in_array($mimeType,$tiposPermitidos)){

                                  /*nome_original, novo_nome,
                                 caminho_temporario,extensão,tamanho,criado_em,ativo*/

                                 $pasta = "../arquivos/";
                                 $novo_nome = uniqid().".$extensao";
                                 $caminhoFinal = $pasta.$novo_nome;
                                 if(move_uploaded_file($temporario,$pasta.$novo_nome)){

                                    $sql = "INSERT INTO  arquivos (nome_original,nome_unico,caminho,extensao,tamanho,criado_em,ativo)  
                                    VALUES ('$nome','$novo_nome','$caminhoFinal','$extensao','$size','$data_upload','$ativo') ";

                                    if(mysqli_query($connect,$sql)){
                                        $_SESSION['msg'] = 'sucesso';
                                    }
                                 }else{
                                    echo "Falha no upload";
                                 }

                                //$sql = "INSERT INTO  arquvivos (nome_original,novo_unico,caminho,tamanho,criado_em,ativo)  VALUES () ";
                             }else{
                                echo "Tipo Não permitido";
                             }
                        }else{
                            echo "extensão Não suportada TIPO :".$extensao;
                        }
                    }else{
                        echo "Nome ou erro contido no arquivo";
                    }
                }

            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

        <input type="file" name="arquivos[]" id="" multiple>
        <button type="submit" name="subir">Fazer upload</button> <br><br>
        <button type="submit" name="sair">Sair</button>
    </form>

    <script>
        function redirecionar() {
    // Mostra mensagem opcional "Redirecionando..."
           setTimeout(function(){
             window.location.href = '../arquivos/arquivos.php';
            }, 2000); // espera 2 segundos
        }



    </script>
      
</body>
</html>