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

    <h1>Movimentos - cubo 3x3</h1>

</div>

<br>

<div class="conteudo_tutorial">

<p>Para se resolver o cubo, é necessário o uso de algoritmos, que são sequências de movimentos com o objetivo de resolver algum caso específico. Esses movimentos são indicados com letras (que são as iniciais da face em inglês), onde cada letra simboliza um movimento em sentido horário na camada correspondende. Quando a letra é seguida de um apóstrofe, significa que o movimento deve ser em sentido anti-horário e quando a letra é seguida de um "2", significa que o movimento deve ser feito em sentido horário (ou anti-horário) duas vezes.</p>

</div>

<div class="tutoriais_centro">
    <div class="tut_null caixa_tutorial"></div>
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/basic.png" alt="Cubo feito">
        <h6 class="titulo_null">Como segurar</h6>
        <p class="nome_null">Considere que você está segurando o cubo com a face vermelha apontada para você e a face branca apontada para cima. Tente fazer os movimentos no seu cubo!</p>
    </div>
    <div class="tut_null caixa_tutorial"></div>
</div>

<br>
<br>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3u.png" alt="U">
        <h6 class="titulo_null">U</h6>
        <p class="parag_null">('up' - face de cima em sentido horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3uprime.png" alt="U'">
        <h6 class="titulo_null">U'</h6>
        <p class="parag_null">(face de cima em sentido anti-horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3u2.png" alt="U2">
        <h6 class="titulo_null">U2</h6>
        <p class="parag_null">(face de cima duas vezes em qualquer sentido)</p>
    </div>
</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3r.png" alt="R">
        <h6 class="titulo_null">R</h6>
        <p class="parag_null">('right' - face da direita em sentido horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3rprime.png" alt="R'">
        <h6 class="titulo_null">R'</h6>
        <p class="parag_null">(face da direita em sentido anti-horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3r2.png" alt="R2">
        <h6 class="titulo_null">R2</h6>
        <p class="parag_null">(face da direita duas vezes em qualquer sentido)</p>
    </div>
</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3l.png" alt="L">
        <h6 class="titulo_null">L</h6>
        <p class="parag_null">('left' - face da esquerda em sentido horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3lprime.png" alt="L'">
        <h6 class="titulo_null">L'</h6>
        <p class="parag_null">(face da esquerda em sentido anti-horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3l2.png" alt="L2">
        <h6 class="titulo_null">L2</h6>
        <p class="parag_null">(face da esquerda duas vezes em qualquer sentido)</p>
    </div>
</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3f.png" alt="F">
        <h6 class="titulo_null">F</h6>
        <p class="parag_null">('frete' - face da frete em sentido horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3fprime.png" alt="F'">
        <h6 class="titulo_null">F'</h6>
        <p class="parag_null">(face da frete em sentido anti-horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3f2.png" alt="F2">
        <h6 class="titulo_null">F2</h6>
        <p class="parag_null">(face da frete duas vezes em qualquer sentido)</p>
    </div>
</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3b.png" alt="B">
        <h6 class="titulo_null">B</h6>
        <p class="parag_null">('back' - face de trás em sentido horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3bprime.png" alt="B'">
        <h6 class="titulo_null">B'</h6>
        <p class="parag_null">(face de trás em sentido anti-horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3b2.png" alt="B2">
        <h6 class="titulo_null">B2</h6>
        <p class="parag_null">(face de trás duas vezes em qualquer sentido)</p>
    </div>
</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3d.png" alt="D">
        <h6 class="titulo_null">D</h6>
        <p class="parag_null">('down' - face de baixo em sentido horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3dprime.png" alt="D'">
        <h6 class="titulo_null">D'</h6>
        <p class="parag_null">(face de baixo em sentido anti-horário)</p>
    </div>

    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/3x3d2.png" alt="D2">
        <h6 class="titulo_null">D2</h6>
        <p class="parag_null">(face de baixo duas vezes em qualquer sentido)</p>
    </div>
</div>

<h4 class="titulo_conteudo_tutorial">Vídeos recomendados:</h4>

<h6 class="titulo_videos">&#10070; Cubo Velocidade</h6>

<iframe class="videos_tut" width="560" height="315" src="https://www.youtube.com/embed/F6WyMUSLHZo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<br>
<br>
<br>

</html>