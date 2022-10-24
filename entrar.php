<?php session_start() ?>
<html>
<head>
<link rel="stylesheet" href="css.css">
<title>Entrar - QBLearning</title>
</head>
<?php
include('conexao.php');

if (isset($_POST['btnEntrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    mysqli_query($conn, $sql);
    $query = mysqli_query($conn, $sql);
    while ($dados = mysqli_fetch_array($query)) {
        $_SESSION['nome_usuario'] = $dados['nome_usuario'];
        $_SESSION['id_usuario'] = $dados['id'];
        $_SESSION['tipo_cubo'] = "3x3";
        $_SESSION['cubo_check'] = 0;
        $_SESSION['embar'] = "";
    }
    if (mysqli_affected_rows($conn) > 0) {
        echo"<script> alert('Login sucessido.') </script>";
        header("Location: http://localhost/qblearning/cronometro.php");
        die();
    }else{
           echo"<script> alert('Usuário ou senha incorretos.') </script>";
    }
}
?>

<div class="cadastro cadform">

<div class="logo">
        <img src="imagens/logo2.png" alt="Logo QBLearning" class="logoimg">
</div>
<div class="container logotext2" id="cadastrotitle2">
        <p>Entre na sua conta para entrar na QBLearning.</p>
        <p>Não possui uma conta? <a href="cadastrar.php">Cadastre-se aqui.</a></p>
</div>

<div class="container-fluid cadentrar" id="form">

    <div class="cadform2">
    <form method="post">

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
                Senha: <input class='form-control' type="password" name="senha"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input class='btn btn-primary' type="submit" value="Entrar" name="btnEntrar" />
                </div>
            </div>
        </div>

    </form>
    </div>
</div>
</div>
</html>