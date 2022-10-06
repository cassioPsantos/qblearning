<?php session_start() ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
?>

<head>
<title>Perfil - QBLearning</title>
</head>

<body>
<h1 class="titulo"><?php echo $_SESSION['nome_usuario']?></h1>
<h6 class="subtitulo">Endereço de email: <?php echo $_SESSION['email_usuario']?></h6>
<h6 class="subtitulo">Senha: <?php echo $_SESSION['senha_usuario']?></h6>
</body>
</html>