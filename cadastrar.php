<html>
<head>
<link rel="stylesheet" href="css.css">
<title>Criar conta - QBLearning</title>
</head>
<?php
include('conexao.php');

if (isset($_POST['btnEnviar'])) {
    $nome_usuario = $_POST['nome_usuario'];
    $nome_completo = $_POST['nome_completo'];
    $descricao = "";
    $foto = "default.png";
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $genero = $_POST['genero'];
    $nascimento =  $_POST['nascimento'];

    if ($senha == $confirmar_senha) {
        $sql = "INSERT INTO usuarios (nome_usuario, nome_completo, email, senha, genero, nascimento, descricao, foto) 
                VALUES ('$nome_usuario', '$nome_completo', '$email', '$senha', '$genero', '$nascimento', '$descricao', '$foto')";
        mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script> alert('Usuário cadastrado com sucesso.') </script>";
        } else {
            echo "<script> alert('Ocorreu algum erro.') </script>";
        }
    } else {
        echo "<script> alert('As senhas não batem.') </script>";
    }
}
?>

<body>
<div class="tela_cadastro">
    <div class="logo">
        <img src="imagens/logo2.png" alt="Logo QBLearning" class="logoimg">
        <p>Crie sua conta para fazer parte da QBLearning!</p>
        <p>Já tem uma conta? <a href="entrar.php">Entre aqui.</a></p>
    </div>

    <div class="cadastro_campos">

        <form method="post">

            <div class="form_etapa">
                Nome completo <input class='form_campo' type="text" name="nome_completo" required>
            </div>

            Nome de usuário
            <div class="form_etapa">
                <input type="text" class="form_campo" id="nome_usuario">
            </div>

            <div class="form_etapa">
                Email<br> <input class="form_campo" type="email" name="email">
            </div>

            <div class="form_etapa">
                Senha<br> <input class='form_campo' type="password" name="senha">
            </div>

            <div class="form_etapa">
                Confirmar senha <input class='form_campo' type="password" name="confirmar_senha">
            </div>

            <div class="row">

                <div class="col-6 form_etapa">
                    Data de nascimento <input class='form_campo' type="date" name="nascimento">
                </div>
                
                <div class="col-6 form_etapa">
                    Gênero
                    <select class='form_campo' name="genero">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

            </div>

            <div class="form_etapa">
                <input class='botao_azul' type="submit" value="Criar Conta" name="btnEnviar">
            </div>

        </form>
    </div>
</div>

</body>
</html>