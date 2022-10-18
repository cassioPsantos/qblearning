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
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];
    $nascimento =  $_POST['nascimento'];
    
    $sql = "UPDATE usuarios
            SET nome_usuario = '$nome_usuario', nome_completo = '$nome_completo', 
                email = '$email', senha = '$senha', genero = '$genero', nascimento = '$nascimento'
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
<form method="post">
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

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Nova senha: <input class='form-control' type="password" name="senha"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                Data de nascimento: <input class='form-control' type="date" name="nascimento" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    Gênero: <select class='form-control' name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-1">
                <div class="form-group">
                    <input class='btn btn-primary' type="submit" value="Editar perfil" name="btnEnviar" />
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <a class='btn btn-danger' href='perfil.php'>Cancelar</a>
                </div>
            </div>
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