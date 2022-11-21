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
    $senha = $_POST['senha'];
    $descricao =  $_POST['descricao'];
    
    $sql = "UPDATE usuarios
            SET nome_usuario = '$nome_usuario', nome_completo = '$nome_completo', 
                email = '$email', descricao = '$descricao'
            WHERE id='$id_usuario' AND senha='$senha'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário atualizado com sucesso.') </script>";
        header("Location: http://localhost/qblearning/perfil.php");
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
} else {
    $sql = "SELECT * FROM usuarios WHERE id='$id_usuario'";
    $query = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($query);
    $nome_completo = $dados['nome_completo'];
    $nome_usuario = $dados['nome_usuario'];
    $descricao = $dados['descricao'];
    $email = $dados['email'];
}

if (isset($_POST['btnPerfil'])) {
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
    
    $sql = "UPDATE usuarios SET foto = '$foto' WHERE id = '$id_usuario'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário atualizado com sucesso.') </script>";
        header("Location: http://localhost/qblearning/perfil.php");
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
    
} else {
    $foto = $dados['foto'];
}

if (isset($_POST['btnTirarFoto'])) {
    $sql = "UPDATE usuarios SET foto = 'default.png' WHERE id = '$id_usuario'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário atualizado com sucesso.') </script>";
        header("Location: http://localhost/qblearning/perfil.php");
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}

?>
<div class="row">
    
<div class="editar_perfil_form col-9">
    <form method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-6 form-group">
        Nome de usuário: <input class='form-control' type="text" name="nome_usuario" value="<?php echo $nome_usuario ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-6 form-group">
        Nome completo: <input class='form-control' type="text" name="nome_completo" value="<?= $nome_completo ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-6 form-group">
        Descrição: <textarea class='form-control' name="descricao"><?= $descricao ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-6 form-group">
        Email: <input class="form-control" type="email" name="email" value="<?= $email ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-6 form-group">
        Confirme sua senha: <input class="form-control" type="password" name="senha"/>
        </div>
    </div>

    <div class="form-group">
        <input class='botao_azul' type="submit" value="Salvar perfil" name="btnEnviar" />
        <a class="botao_vermelho" href="perfil.php">Cancelar</a>
    </div>

    </form>
</div>

<h1 class="titulo2">Editar foto de perfil</h1>

<div class="editar_imagem_form col-6">
    <form method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-3 foto_perfil">
            <img class="imagem_editar" alt="foto de perfil" src="uploads/<?php echo $foto ?>">
        </div>
    </div>

    <div class="row">
        <div class="foto_input">
                <label for="file"  class="btn_imagem botao" >Escolher arquivo</label>
                <input type="file" name="file" id="file"/>
        </div>
        <div class="form-group">
            <input class='btn_imagem botao_azul' type="submit" value="Salvar imagem" name="btnPerfil"/>
        </div>
        <div class="form-group">
            <input class='btn_imagem esp4 botao_vermelho' type="submit" value="Tirar foto" name="btnTirarFoto"/>
        </div>
    </div>

    </form>
</div>

<div class="fundo_cadastro col-6">
    <img src="imagens/logobranco.png" alt="Logo QBLearning" class="logocad">
</div>
</div>



</body>
</html>