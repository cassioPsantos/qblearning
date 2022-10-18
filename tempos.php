<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
?>

<head>
<title>Tempos - QBLearning</title>
</head>

<body>

<div class="container cont_tempos">
    <img src="3x3.jpg" alt="3x3" class="img3x3">

    <div class="row">

        <div class="col-3"></div>

        <div class="col-7">
            <h2 class="titulo_cubo">Cubo 3x3</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-3"></div>

        <div class="col-7 dados_cubo">
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_3x3 != null) {
                    echo $melhor_tempo_3x3;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
        
    </div>

    <div class="row">

        <div class="col-3"></div>

        <div class="col-7 dados_cubo">
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_3x3 != null) {
                echo $melhor_media_3x3;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>

    </div>

</div>

</body>
</html>