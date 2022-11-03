<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
?>

<head>
<title>Tutoriais - QBLearning</title>
<link rel="stylesheet" href="3x3.css">
</head>

<body>

<a class="btn_voltar" href="tutorial.php">Voltar</a>
<br>
<div class="titulo_tutorial">

    <h1>Cubo mágico 3x3 - o clássico</h1>

    <h5 class="sub_tutorial">É o ideal para começar - você vai utilizar os conteitos do 3x3 em todos os outros cubos.</h5>

</div>

<h4 class="titulo_conteudo_tutorial">Por onde começar?</h4>

<div class="conteudo_tutorial">

<p>O cubo mágico 3x3, também chamado apenas como "cubo mágico", é o mais típico e conhecido twisty puzzle. Foi inventado em 1974 por Ernő Rubik e começou a ser comercializado em 1980 pela Ideal Toys, com o nome de "Cubo de Rubik" (do inglês Rubik's Cube). É nele que você deve começar a aprender! Para começar, basta escolher um dos métodos recomendados abaixo.</p>

</div>

<div class="tutoriais">
    <div class="tut_basico caixa_tutorial">
    <img class="imagem_tutorial" src="cubes/basic.png" alt="Básico">
        <a href="3x3_basico.php" class="nome_tutorial_detalhes">Fundamentos</a>
    </div>

    <div class="tut_camadas caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/layermethod.png" alt="Método de Camadas">
        <a href="3x3_camadas.php" class="nome_tutorial_detalhes">Método de Camadas</a>
    </div>

    <div class="tut_cfop caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/cfop.png" alt="CFOP">
        <a href="3x3_cfop.php" class="nome_tutorial_detalhes">CFOP (avançado)</a>
    </div>
</div>

</html>