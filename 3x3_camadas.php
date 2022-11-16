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

    <h1>Método de camadas - cubo 3x3</h1>

</div>

<br>

<div class="conteudo_tutorial">

<p>Aprenda o método básico para resolver o cubo mágico, o método de camadas. Ele é divido em 7 passos: fazer a cruz branca, colocar as quinas brancas, terminar a segunda camada, fazer a cruz amarela, orientar as quinas amarelas, permutar as quinas amarelas, e por fim, permutar os meios amarelos. Para se resolver cada etapa, você vai precisar seguir um pensamento lógico simples e alguns algoritmos básicos e simples de serem lembrados. Revisite essa página sempre que precisar, até conseguir fazer todos os passos por conta própria!</p>

</div>

<!-- <div class="tutoriais">
    <div class="tut_null caixa_tutorial">
        <img class="imagem_tutorial" src="cubes/centros.png" alt="Peças">
        <h6 class="titulo_null">Centros</h6>
        <p class="nome_null">São as 6 peças centrais do cubo. Elas possuem uma cor só, e indicam qual cor aquela face inteira deve seguir. Não é possível mudar um centro de lugar, eles sempre vão estar na mesma posição em relação aos outros centros.</p>
    </div>
</div> -->

<h4 class="titulo_conteudo_tutorial">Primeiro passo: fazer a cruz branca</h4>

<div class="conteudo_tutorial">

<p>Para fazer a cruz branca, você precisa posicionar corretamente todas as peças de meio que possuem a cor branca. Para isso você precisa primeiro localizar uma peça de meio que contenha, em uma de suas cores, a cor branca. Faça isso segurando a face branca para baixo. No exemplo abaixo, vamos começar pelo meio branco/azul.</p>

</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut1.png" alt="tut1">
        <p class="nome_null">Para colocar o meio no lugar certo, primeiro você deve ligar a cor que não é branca do meio com seu centro correspondente. Para isso, neste exemplo, vamos fazer um movimento U para deixar o meio na posição certa.</p>
    </div>

    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut2.png" alt="tut2">
        <p class="nome_null">Após isso, temos que ligar a cor branca do meio com o centro branco. Como ele está apontado para baixo, vamos fazer um movimento de F2 para assim colocar o meio no seu lugar certo.</p>
    </div>

    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut3.png" alt="tut3">
        <p class="nome_null">Com isso feito, temos o primeiro meio no lugar. Precisamos fazer isso com os outros 3 meios que possuem a cor branca, para assim a face branca ficar com um formato de cruz.</p>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="conteudo_tutorial">

<p>Este processo é bem intuitivo e não requer nenhum algoritmo, apenas prática. Precisamos sempre colocar um meio no lugar, mas sem tirar outro que já estava no lugar certo. Vamos ver mais um exemplo, dessa vez com o meio branco/azul já posicionado, e buscando posicionar o meio branco/vermelho. Este caso é um pouco mais complicado. Para conseguirmos deixar os dois meios no lugar, vamos precisar tirar o branco/azul do lugar e colocá-lo novamente, após posicionarmos a parte vermelha do meio branco/vermelho com o centro vermelho.</p>

</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut4.png" alt="tut4">
        <p class="nome_null">Vamos começar colocando o meio branco/vermelho na camada de cima, para podermos colocá-lo com o centro vermelho. Para isso, vamos fazer um movimento de F'.</p>
    </div>

    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut5.png" alt="tut5">
        <p class="nome_null">Após isso, vamos fazer um movimento de U', para ligar a cor vemelha do meio com o centro vermelho.</p>
    </div>

    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut6.png" alt="tut6">
        <p class="nome_null">Depois de colocármos a peça de meio com o centro de cor certa, precisamos voltar o meio azul para o seu lugar. Para isso, vamos fazer um movimento de F.</p>
    </div>
</div>

<div class="tutoriais">
    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut7.png" alt="tut7">
        <p class="nome_null">Com isso, podemos colocar o meio branco/vermelho no lugar sem tirar o branco/azul do lugar. Para isso, faremos um movimento de R2.</p>
    </div>

    <div class="tut_null caixa_tutorial_2">
        <img class="imagem_tutorial_2" src="cubes/tut8.png" alt="tut8">
        <p class="nome_null">Com isso, temos os dois meios em seus devidos lugares.</p>
    </div>
</div>

<br>
<br>
<br>

<div class="conteudo_tutorial">

<p>Pode parecer um pouco complexo, mas acredite, é super simples! Lembre-se: a prática leva à perfeição, então pratique! Não tenha medo de embaralhar seu cubo e tentar resolver a cruz branca, é essencial para você aprender.</p>

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