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

<a class="btn_voltar" href="guia_3x3.php">Voltar</a>
<br>
<div class="titulo_tutorial">

    <h1>Construção do cubo mágico - cubo 3x3</h1>

</div>

<br>

<div class="conteudo_tutorial">

<p>O cubo mágico foi desenvolvido por Ernő Rubik inicialmente como um projeto de estudo de conceitos de arquitetura em três dimensões para aplicar em suas classes. A construção do puzzle é bem detalhada e complexa, e é importante entender como ele é feito e como ele funciona para aprimorar os estudos ao máximo.</p>

<h4 class="titulo_conteudo_tutorial">Esquema de cores</h4>

<p>Quando você for seguir um ebaralhamento, você deve segurar o cubo de modo que a face branca fique apontada para você e a cor verde fique apontada para cima. Segurando o cubo assim, o esquema de cores ficará posicionado de acordo com a imagem abaixo.</p>

</div>

<div class="img_tut_1">
    <img class="imagem_tutorial_1" src="imagens/all.png" alt="Esquema de cores">
</div>
<br>
<div class="conteudo_tutorial">

<p>É importante saber como as cores são dispostas no cubo para facilitar a visualização na hora de resolver. Você pode perceber que a cor branca é oposta à cor amarela, a cor vermelha é oposta à cor laranja, e a cor verde é oposta à cor azul. Se você fizer o seguinte algoritmo no seu cubo: U2 D2 R2 L2 F2 B2, você poderá ver um padrão conhecido como o padrão Xadrez, que mostra cada face com os meios trocas pelos peios da cor oposta à cor daquela face. Experimente!</p>

</div>

<div class="tutoriais_centro">
    <div class="tut_null caixa_tutorial"></div>
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/checkerboard.png" alt="Padrão de tabuleiro de xadrez">
        <h6 class="titulo_null">Padrão de xadrez</h6>
        <p class="nome_null"></p>
    </div>
    <div class="tut_null caixa_tutorial"></div>
</div>

<br>
<br>
<br>
<br>
<!-- <h4 class="titulo_conteudo_tutorial">Vídeos recomendados:</h4>

<h6 class="titulo_videos">&#10070; Cubo Velocidade</h6>

<iframe class="videos_tut" width="560" height="315" src="https://www.youtube.com/embed/gydNrosJwio" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
-->
<br>
<br>
<br>
<br>

</html>