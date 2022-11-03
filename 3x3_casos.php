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

<a class="btn_voltar" href="3x3_basico.php">Voltar</a>
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

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/centros.png" alt="Peças">
        <h6 class="titulo_null">Centros</h6>
        <p class="nome_null"></p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/peças.png" alt="Método de Camadas">
        <h6 class="titulo_null">Meios</h6>
        <p class="nome_null"></p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/quinas.png" alt="CFOP">
        <h6 class="titulo_null">Quinas</h6>
        <p class="nome_null"></p>
    </div>
</div>


<br>
<br>
<br>
<br>
<h4 class="titulo_conteudo_tutorial">Vídeos recomendados:</h4>

<h6 class="titulo_videos">&#10070; Cubo Velocidade</h6>

<iframe class="videos_tut" width="560" height="315" src="https://www.youtube.com/embed/gydNrosJwio" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<br>
<br>
<br>

</html>