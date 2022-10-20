<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
?>

<head>
<title>Tempos - QBLearning</title>
<script src="tempos.js" defer></script>
</head>

<body>

<?php
// seleção de melhores tempos
$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '2x2'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_2x2 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '3x3'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_3x3 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '4x4'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_4x4 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '5x5'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_5x5 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '6x6'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_6x6 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '7x7'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_7x7 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Piramynx'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_pira = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Megaminx'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_mega = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Skewb'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_skewb = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Square-1'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_square1 = $dados_cubo['melhor_tempo'];

$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Clock'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_clock = $dados_cubo['melhor_tempo'];
    
// seleção de melhores medias
$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '2x2'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_2x2 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '3x3'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_3x3 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '4x4'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_4x4 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '5x5'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_5x5 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '6x6'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_6x6 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '7x7'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_7x7 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Piramynx'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_pira = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Megaminx'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_mega = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Skewb'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_skewb = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Square-1'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_square1 = $dados_cubo['melhor_media'];

$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= 'Clock'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_clock = $dados_cubo['melhor_media'];
?>

<div class="cont_2x2 cont_tempos">
    <img src="imagens/2x2.png" alt="2x2" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btn2x2"></input>
        <div class="dados_cubo">
            <h2>Cubo 2x2</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_2x2 != null) {
                    echo $melhor_tempo_2x2;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_2x2 != null) {
                echo $melhor_media_2x2;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_3x3 cont_tempos">
    <img src="imagens/3x3.png" alt="3x3" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btn3x3"></input>
        <div class="dados_cubo">
            <h2>Cubo 3x3</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_3x3 != null) {
                    echo $melhor_tempo_3x3;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
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

<div class="cont_4x4 cont_tempos">
    <img src="imagens/4x4.png" alt="4x4" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btn4x4"></input>
        <div class="dados_cubo">
            <h2>Cubo 4x4</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_4x4 != null) {
                    echo $melhor_tempo_4x4;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_4x4 != null) {
                echo $melhor_media_4x4;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_5x5 cont_tempos">
    <img src="imagens/5x5.png" alt="5x5" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btn5x5"></input>
        <div class="dados_cubo">
            <h2>Cubo 5x5</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_5x5 != null) {
                    echo $melhor_tempo_5x5;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_5x5 != null) {
                echo $melhor_media_5x5;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_6x6 cont_tempos">
    <img src="imagens/6x6.png" alt="6x6" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btn6x6"></input>
        <div class="dados_cubo">
            <h2>Cubo 6x6</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_6x6 != null) {
                    echo $melhor_tempo_6x6;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_6x6 != null) {
                echo $melhor_media_6x6;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_7x7 cont_tempos">
    <img src="imagens/7x7.png" alt="7x7" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btn7x7"></input>
        <div class="dados_cubo">
            <h2>Cubo 7x7 </h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_7x7 != null) {
                    echo $melhor_tempo_7x7;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_7x7 != null) {
                echo $melhor_media_7x7;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_pira cont_tempos">
    <img src="imagens/piramynx.png" alt="Piramynx" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btnpira"></input>
        <div class="dados_cubo">
            <h2>Piramynx</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_pira != null) {
                    echo $melhor_tempo_pira;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_pira != null) {
                echo $melhor_media_pira;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_mega cont_tempos">
    <img src="imagens/megaminx.png" alt="Megaminx" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btnmega"></input>
            <div class="dados_cubo">
            <h2>Megaminx</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_mega != null) {
                    echo $melhor_tempo_mega;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_mega != null) {
                echo $melhor_media_mega;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_skewb cont_tempos">
    <img src="imagens/skewb.png" alt="Skewb" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btnskewb"></input>
        <div class="dados_cubo">
            <h2>Skewb</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_skewb != null) {
                    echo $melhor_tempo_skewb;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_skewb != null) {
                echo $melhor_media_skewb;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="cont_square1 cont_tempos">
    <img src="imagens/square1.png" alt="Square-1" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btnsquare1"></input>
        <div class="dados_cubo">
            <h2>Square-1</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_square1 != null) {
                    echo $melhor_tempo_square1;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_square1 != null) {
                echo $melhor_media_square1;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>

<div class="container div_clock ">
<div class="cont_clock cont_tempos">
    <img src="imagens/clock.png" alt="Clock" class="img_cubo">
    <input type="button" class="btn_tempos" value="Detalhes" id="btnclock"></input>
        <div class="dados_cubo">
            <h2>Clock</h2>
            <h6>
            Melhor tempo: <?php 
                if ($melhor_tempo_clock != null) {
                    echo $melhor_tempo_clock;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
            <h6>
            Melhor média 3/5: <?php 
                if ($melhor_media_clock != null) {
                echo $melhor_media_clock;
                } else {
                    echo "Nenhum";
                }?>
            </h6>
        </div>
</div>
</div>

</body>
</html>