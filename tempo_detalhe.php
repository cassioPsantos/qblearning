<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = $_GET['tipo_cubo'];

// seleção de melhor tempo
$sql_dados_cubo = "SELECT * FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo = $dados_cubo['melhor_tempo'];

// seleção de pior tempo
$sql_dados_cubo = "SELECT * FROM pior_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$pior_tempo = $dados_cubo['pior_tempo'];

// seleção de ultimo tempo
$sql_dados_cubo = "SELECT * FROM ultimo_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$ultimo_tempo = $dados_cubo['ultimo_tempo'];

// seleção de melhor media
$sql_dados_cubo = "SELECT * FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media = $dados_cubo['melhor_media'];

// seleção de pior media
$sql_dados_cubo = "SELECT * FROM pior_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$pior_media = $dados_cubo['pior_media'];

// seleção de última media
$sql_dados_cubo = "SELECT * FROM ultima_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$ultima_media = $dados_cubo['ultima_media'];

// seleção de média geral
$sql_media = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
$query_media = mysqli_query($conn, $sql_media);
$dados_media = mysqli_fetch_array($query_media);
$media = $dados_media['media'];

switch ($tipo_cubo) {
    case '2x2':
        $img_detalhes = "2x2.png";
        $nome_cubo = "Cubo 2x2";
        break;
    case '3x3':
        $img_detalhes = "3x3.png";
        $nome_cubo = "Cubo 3x3";
        break;
    case '4x4':
        $img_detalhes = "4x4.png";
        $nome_cubo = "Cubo 4x4";
        break;
    case '5x5':
        $img_detalhes = "5x5.png";
        $nome_cubo = "Cubo 5x5";
        break;
    case '6x6':
        $img_detalhes = "6x6.png";
        $nome_cubo = "Cubo 6x6";
        break;
    case '7x7':
        $img_detalhes = "7x7.png";
        $nome_cubo = "Cubo 7x7";
        break;
    case 'Piramynx':
        $img_detalhes = "piramynx.png";
        $nome_cubo = "Piramynx";
        break;
    case 'Megaminx':
        $img_detalhes = "megaminx.png";
        $nome_cubo = "Megaminx";
        break;
    case 'Skewb':
        $img_detalhes = "skewb.png";
        $nome_cubo = "Skewb";
        break;
    case 'Square-1':
        $img_detalhes = "square1.png";
        $nome_cubo = "Square-1";
        break;
    case 'Clock':
        $img_detalhes = "clock.png";
        $nome_cubo = "Clock";
        break;
}
?>

<head>
<link rel="stylesheet" href="css.css">
<title>Tempos - QBLearning</title>
</head>

<body>

<div class="titulo_pagina">
<a class="btn_voltar" href="tempos.php">Voltar</a>
    <img class="img_detalhes" src="imagens/<?php echo $img_detalhes ?>" alt="cube_image" class="img_cubo">
    <h1 class="titulo_detalhes"><?php echo $nome_cubo ?></h1>
    <h5 class="linha_detalhes">Melhor tempo: <?php echo $melhor_tempo ?></h5>
    <h5 class="linha_detalhes">Pior tempo: <?php echo $pior_tempo ?></h5>
    <h5 class="linha_detalhes">Último tempo: <?php echo $ultimo_tempo ?></h5>
    <div class="detalhes_2">
        <h5 class="linha_detalhes">Melhor média 3/5: <?php echo $melhor_media ?></h5>
        <h5 class="linha_detalhes">Pior média 3/5: <?php echo $pior_media ?></h5>
        <h5 class="linha_detalhes">Última média 3/5: <?php echo $ultima_media ?></h5>
    </div>
    <h5 class="linha_detalhes">Média geral: <?php echo number_format((float)$media, 2) ?></h5>
    <br>
</div>

</body>
</html>