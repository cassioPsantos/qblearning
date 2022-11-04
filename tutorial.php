<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = $_SESSION['tipo_cubo'];
?>

<head>
<title>Tutoriais - QBLearning</title>
<link rel="stylesheet" href="css.css">
</head>

<body>

<div class="titulo_tutorial">

    <h1>Aprenda a resolver o cubo mágico!</h1>

    <h5 class="sub_tutorial">Para começar a estudar, primeiro escolha qual cubo você deseja aprender.</h5>

</div>

<div class="tutoriais">
    <div class="caixa_tutorial">
        <img class="imagem_tutorial" src="imagens/2x2branco.png" alt="2x2">
        <a href="tutorial_2x2.php" class="nome_tutorial">Cubo 2x2</a>
    </div>

    <div class="caixa_tutorial">
        <img class="imagem_tutorial" src="imagens/3x3branco.png" alt="3x3">
        <a href="3x3_tutorial.php" class="nome_tutorial">Cubo 3x3</a>
    </div>

    <div class="caixa_tutorial">
        <img class="imagem_tutorial" src="imagens/4x4branco.png" alt="4x4">
        <a href="tutorial_4x4.php" class="nome_tutorial">Cubo 4x4</a>
    </div>
</div>

</body>
</html>