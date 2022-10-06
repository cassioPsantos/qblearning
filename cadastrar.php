<html>
<head>
<link rel="stylesheet" href="css.css">
<title>Criar conta - QBLearning</title>
</head>

<body>
<?php
include('conexao.php');

if (isset($_POST['btnEnviar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nascimento =  $_POST['nascimento'];
    
    $sql = "INSERT INTO usuarios (nome, email, senha, nascimento) 
            VALUES ('$nome', '$email', '$senha', '$nascimento')";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário cadastrado com sucesso.') </script>";
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
?>

<div class="cadastro cadform">
<div class="logo">
        <img src="logo2.png" alt="Logo QBLearning" class="logoimg">
</div>
<div class="container" id="cadastrotitle">
        <p>Crie sua conta para fazer parte da QBLearning!</p>
        <p>Já tem uma conta? <a href="entrar.php">Entre aqui.</a></p>
        <p><a href="listaUsuario.php">Checar usuários</a> (teste temporario)</p>
</div>

<div class="container">
    <form method="post">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Nome: <input class='form-control' type="text" name="nome"/>
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
                Senha: <input class='form-control' type="password" name="senha"/>
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
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                    <option value="3">Outro</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input class='btn btn-primary' type="submit" value="Criar Conta" name="btnEnviar" />
                </div>
            </div>
        </div>

    </form>
</div>
</div>

</body>
</html>