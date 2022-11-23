<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
?>

<head>
<title>Guia 3x3 - QBLearning</title>
<link rel="stylesheet" href="css.css">
</head>

<body id="guiabarra">

<a class="btn_voltar" href="tutorial.php">Voltar</a>
<br>
<div class="titulo_tutorial">

    <h1>Cubo mágico 3x3 - o clássico</h1>

    <h5 class="sub_tutorial">É o ideal para começar - você vai utilizar os conteitos do 3x3 em todos os outros cubos.</h5>

</div>
<div class="siiim"><p></p></div>
<br>
<div class="fundo_guia">
    <img class="img_fundo" src="imagens/background.png" alt="erro"><br>
</div>
<div class="fundo_guia1">
    <img class="img_fundo" src="imagens/background.png" alt="erro"><br>
</div>
<br>
<br>

<div class="guia_caminho">
    <img class="img_guia" src="imagens/inicio.png" alt="erro"><br>
</div>
<div class="guia_caminho">
    <img class="img_guia" src="imagens/meio1.png" alt="erro"><br>
</div>
<div class="guia_caminho">
    <img class="img_guia" src="imagens/meio2.png" alt="erro"><br>
</div>
<div class="guia_caminho">
    <img class="img_guia" src="imagens/meio1.png" alt="erro"><br>
</div>
<div class="guia_caminho">
    <img class="img_guia" src="imagens/meio2.png" alt="erro"><br>
</div>
<div class="guia_caminho">
    <img class="img_guia" src="imagens/meio1.png" alt="erro"><br>
</div>
<div class="guia_caminho">
    <img class="img_guia" src="imagens/meio2.png" alt="erro"><br>
</div>

<div class="tut_centro">

<div class="tut_pecas caixa_tutorial">
    <a href="3x3_pecas.php"><img class="imagem_tutorial" src="cubes/peças.png" alt="Peças"></a>
    <a href="3x3_pecas.php" class="nome_tutorial_detalhes">Peças do cubo</a>
</div>

<div class="tut_mov caixa_tutorial_1">
    <a href="3x3_movimentos.php"><img class="imagem_tutorial" src="cubes/3x3uprime.png" alt="Movimentos"></a>
    <a href="3x3_movimentos.php" class="nome_tutorial_detalhes">Movimentos</a>
</div>

<div class="tut_casos caixa_tutorial_1">
    <a href="3x3_casos.php"><img class="imagem_tutorial" src="cubes/casos.png" alt="Construção"></a>
    <a href="3x3_casos.php" class="nome_tutorial_detalhes">Construção</a>
</div>

<div class="tut_camadas caixa_tutorial">
    <a href="3x3_camadas.php"><img class="imagem_tutorial" src="cubes/layermethod.png" alt="Camadas"></a>
    <a href="3x3_camadas.php" class="nome_tutorial_detalhes">Método de Camadas</a>
</div>

<div class="tut_extrab caixa_tutorial_1">
    <a href="3x3_extrab.php"><img class="imagem_tutorial" src="cubes/extrabasic.png" alt="Extra B."></a>
    <a href="3x3_extrab.php" class="nome_tutorial_detalhes">Extra Básico</a>
</div>

<div class="tut_mova caixa_tutorial_2">
    <a href="3x3_mova.php"><img class="imagem_tutorial" src="cubes/mova.png" alt="Movimentos A."></a>
    <a href="3x3_mova.php" class="nome_tutorial_detalhes">Movimentos Avançados</a>
</div>

<div class="tut_cfop caixa_tutorial_2">
    <a href="3x3_cfop.php"><img class="imagem_tutorial" src="cubes/cfop.png" alt="CFOP"></a>
    <a href="3x3_cfop.php" class="nome_tutorial_detalhes">CFOP (método avançado)</a>
</div>

</div>

</html>