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

    <h1>Peças - cubo 3x3</h1>

</div>

<br>

<div class="conteudo_tutorial">

<p>O cubo mágico possui 3 tipos de peça: os centros, os meios e as quinas. Cada tipo de peça se comporta de uma maneira diferente na hora de mover as camadas do cubo. É super importante você entender como cada peça funciona antes de começar a estudar o cubo.</p>

</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/centros.png" alt="Peças">
        <h6 class="titulo_null">Centros</h6>
        <p class="nome_null">São as 6 peças centrais do cubo. Elas possuem uma cor só, e indicam qual cor aquela face inteira deve seguir. Não é possível mudar um centro de lugar, eles sempre vão estar na mesma posição em relação aos outros centros.</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/peças.png" alt="Método de Camadas">
        <h6 class="titulo_null">Meios</h6>
        <p class="nome_null">São as peças que ficam "encostadas" nos centros e possuem somente duas cores. O cubo possui um total de 12 deles, e não é possível trocar um meio de lugar com uma quina ou com um centro.</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/quinas.png" alt="CFOP">
        <h6 class="titulo_null">Quinas</h6>
        <p class="nome_null">São as peças que ficam nos cantos do cubo e possuem três cores. O cubo possui um total de 6 delas, e não é possível trocar uma quina de lugar com um meio ou com um centro.</p>
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