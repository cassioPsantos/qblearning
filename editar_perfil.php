<?php session_start(); ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
?>

<head>
<link rel="stylesheet" href="css.css">
<title>Editar perfil - QBLearning</title>
</head>

<body id="cadastrobarra">
<h1 class="titulo1">Editar perfil</h1>

<?php

if (isset($_POST['btnEnviar'])) {
    $nome_usuario = $_POST['nome_usuario'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha_atual = $_POST['senha_atual'];
    $descricao =  $_POST['descricao'];

    $file =  $_FILES['file'];
    $file_nome = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $file_tamanho = $file['size'];
    $file_erro = $file['error'];
    $file_tipo = $file['type'];

    $tipo_arquivo_temp = explode('.', $file_nome);
    $tipo_arquivo = strtolower(end($tipo_arquivo_temp));

    $permitido = array('jpg', 'jpeg', 'png');
    if (in_array($tipo_arquivo, $permitido)) {
        if ($file_erro === 0) {
            if ($file_tamanho < 1000000) {
                $foto = "foto_perfil".$id_usuario.".".$tipo_arquivo;
                $file_destino = 'uploads/'.$foto;
                move_uploaded_file($fileTmpName, $file_destino);
            } else {
                echo "<script> alert('O arquivo escolhido é grande demais.') </script>";
            }
        } else {
            echo "<script> alert('Não foi possível enviar o arquivo.') </script>";
        }
    } else {
        echo "<script> alert('Tipo de arquivo não suportado.') </script>";
    }
    
    $sql = "UPDATE usuarios
            SET nome_usuario = '$nome_usuario', nome_completo = '$nome_completo', 
                email = '$email', foto = '$foto', descricao = '$descricao'
            WHERE id='$id_usuario' AND senha='$senha_atual'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário atualizado com sucesso.') </script>";
        header("Location: http://localhost/qblearning/perfil.php");
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
?>
<div class="row">
<div class="container col-10">
<form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Novo nome de usuário: <input class='form-control' type="text" name="nome_usuario"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Nome completo: <input class='form-control' type="text" name="nome_completo"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Foto de perfil: <input class='form-control' type="file" name="file"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Descrição: <textarea class='form-control' name="descricao"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Email: <input class="form-control" type="email" name="email"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Senha atual: <input class='form-control' type="password" name="senha_atual"/>
                </div>
            </div>
        </div>

    <div class="form-group">
        <input class='btn btn-primary' type="submit" value="Cadastrar cubo" name="btnEnviar" />
        <a class="btn btn-danger" href="colecao.php">Cancelar</a>
    </div>

    </form>
</div>

<div class="container fundo_cadastro col-6">
    <div>
        <img src="imagens/logobranco.png" alt="Logo QBLearning" class="logocad">
    </div>
</div>
</div>
</body>
</html>