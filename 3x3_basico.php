<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
?>

<head>
<title>Tutoriais - QBLearning</title>
<link rel="stylesheet" href="css.css">
</head>

<body>

<a class="btn_voltar" href="3x3_tutorial.php">Voltar</a>
<br>
<div class="titulo_tutorial">

    <h1>Fundamentos - cubo 3x3</h1>

</div>

<br>

<div class="conteudo_tutorial">

<p>Caso você não tenha nenhum conhecimento sobre o cubo mágico, é importante começar pelos fundamentos. Nessa seção, você irá aprender sobre as peças do cubo, a notação e movimentos básicos do cubo mágico, e a construção do cubo.</p>

</div>

<div class="tutoriais">
    <div class="tut_basico caixa_tutorial">
    <img class="imagem_tutorial" src="cubes/peças.png" alt="Peças">
        <a href="3x3_pecas.php" class="nome_tutorial_detalhes">Peças do cubo</a>
    </div>

    <div class="tut_basico caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3uprime.png" alt="Movimentos">
        <a href="3x3_movimentos.php" class="nome_tutorial_detalhes">Movimentos</a>
    </div>

    <div class="tut_basico caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/casos.png" alt="CFOP">
        <a href="3x3_casos.php" class="nome_tutorial_detalhes">Construção</a>
    </div>
</div>

</html>