<html>
<head>
<link rel="stylesheet" href="css.css">
<title>Criar conta - QBLearning</title>
</head>

<body>
<?php
include('conexao.php');

if (isset($_POST['btnEnviar'])) {
    $nome_usuario = $_POST['nome_usuario'];
    $nome_completo = $_POST['nome_completo'];
    $descricao = "";
    $foto = "default.png";
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];
    $nascimento =  $_POST['nascimento'];
    
    $sql = "INSERT INTO usuarios (nome_usuario, nome_completo, email, senha, genero, nascimento, descricao, foto) 
            VALUES ('$nome_usuario', '$nome_completo', '$email', '$senha', '$genero', '$nascimento', '$descricao', '$foto')";

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
        <img src="imagens/logo2.png" alt="Logo QBLearning" class="logoimg">
</div>
    <div class="container logotext" id="cadastrotitle">
        <p>Crie sua conta para fazer parte da QBLearning!</p>
        <p>Já tem uma conta? <a href="entrar.php">Entre aqui.</a></p>
</div>

<div class="container-fluid">
    <div class="cadform2">
    <form method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                Nome de usuário: <input class='form-control' type="text" name="nome_usuario"/>
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
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
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
</div>

</body>
</html>