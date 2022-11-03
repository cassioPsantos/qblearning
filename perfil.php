<?php session_start() ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id='$id_usuario'";
$query = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($query);
$idade = date_diff(date_create($dados['nascimento']), date_create('now'))->y;

//seleção quantidade de tempos
$sql_dados = "SELECT COUNT(tempo) AS quantidade_tempos FROM tempos WHERE id_usuario = '$id_usuario'";
$query_dados = mysqli_query($conn, $sql_dados);
$quantidade_tempos = mysqli_fetch_array($query_dados)['quantidade_tempos'];

//seleção de tempo gasto
$sql_dados = "SELECT SUM(tempo) AS tempo_gasto FROM tempos WHERE id_usuario = '$id_usuario'";
$query_dados = mysqli_query($conn, $sql_dados);
$tempo_gasto = mysqli_fetch_array($query_dados)['tempo_gasto'];

//seleção de cubo favorito
$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = '2x2' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_2x2 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = '3x3' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_3x3 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = '4x4' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_4x4 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = '5x5' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_5x5 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = '6x6' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_6x6 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = '7x7' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_7x7 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = 'Piramynx' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_piramynx = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = 'Megaminx' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_megaminx = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = 'Square-1' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_square1 = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = 'Skewb' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_skewb = mysqli_fetch_array($query_fav)['qnt_tempos'];

$sql_fav = "SELECT COUNT(tempo) AS qnt_tempos FROM tempos WHERE tipo_cubo = 'Clock' AND id_usuario = '$id_usuario'";
$query_fav = mysqli_query($conn, $sql_fav);
$fav_clock = mysqli_fetch_array($query_fav)['qnt_tempos'];

$temp = max($fav_2x2, $fav_3x3, $fav_4x4, $fav_5x5, $fav_6x6, $fav_7x7, $fav_piramynx, $fav_megaminx, $fav_square1, $fav_skewb, $fav_clock);

switch ($temp) {
    case $fav_2x2:
        $cubo_favorito = '2x2';
        $nome_cubo = 'Cubo 2x2';
        break;
    case $fav_3x3:
        $cubo_favorito = '3x3';
        $nome_cubo = 'Cubo 3x3';
        break;
    case $fav_4x4:
        $cubo_favorito = '4x4';
        $nome_cubo = 'Cubo 4x4';
        break;        
    case $fav_5x5:
        $cubo_favorito = '5x5';
        $nome_cubo = 'Cubo 5x5';
        break;
    case $fav_6x6:
        $cubo_favorito = '6x6';
        $nome_cubo = 'Cubo 6x6';
        break;
    case $fav_7x7:
        $cubo_favorito = '7x7';
        $nome_cubo = 'Cubo 7x7';
        break; 
    case $fav_piramynx:
        $cubo_favorito = 'Piramynx';
        $nome_cubo = 'Piramynx';
        break; 
    case $fav_megaminx:
        $cubo_favorito = 'Megaminx';
        $nome_cubo = 'Megaminx';
        break; 
    case $fav_skewb:
        $cubo_favorito = 'Skewb';
        $nome_cubo = 'Skewb';
        break; 
    case $fav_square1:
        $cubo_favorito = 'Square-1';
        $nome_cubo = 'Square-1';
        break; 
    case $fav_clock:
        $cubo_favorito = 'Clock';
        $nome_cubo = 'Clock';
        break;
}

//seleção melhor tempo cubo favorito
$sql_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$cubo_favorito'";
$query_cubo = mysqli_query($conn, $sql_cubo);
$melhor_tempo = number_format((float)tempoFinal(mysqli_fetch_array($query_cubo)['melhor_tempo']), 2);

//seleção melhor media cubo favorito
$sql_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$cubo_favorito'";
$query_cubo = mysqli_query($conn, $sql_cubo);
$melhor_media = number_format((float)tempoFinal(mysqli_fetch_array($query_cubo)['melhor_media']), 2);

//seleção media geral cubo favorito
$sql_cubo = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$cubo_favorito'";
$query_cubo = mysqli_query($conn, $sql_cubo);
$media = number_format((float)tempoFinal(mysqli_fetch_array($query_cubo)['media']), 2);

?>

<head>
<title>Perfil - QBLearning</title>
</head>

<body>

<div class="header_perfil">
    <img class="imagem_perfil" alt="foto de perfil" src="uploads/<?php echo $dados['foto'] ?>">
</div>

<div class="capa_perfil">
</div>

<a class="botao btn_editar" href="editar_perfil.php">Editar perfil</a>

<div class="nome_completo">
    <h1><?php echo $dados['nome_completo']?></h1>
    <p class="idade_perfil">(<?php echo $idade.'y' ?>, <?php echo $dados['genero'] ?>)</p>
</div>

<div class="nome_usuario">
    <p><?php echo "@".$dados['nome_usuario']?></p>
</div>

<div class="descricao">
    <p class="desc_texto">"<?php echo $dados['descricao']?>"</hp>
</div>

<br>

<h3 class="titulo">Dados da conta</h3>
<div class="nome_usuario">
    <p>Email: <?php echo $dados['email']?></p>
    <p>Data de nascimento: <?php echo date_format(date_create($dados['nascimento']), "d/m/Y")?></p>
</div>

<br>
<h1 class="titulo">Cubo Favorito</h1>
<br>
<div class="cubo_favorito">
    <img class="img_cubo_fav" src="imagens/<?php echo $cubo_favorito?>.png" alt="cubo_favorito">
    <h4 class="nome_cubo_fav"><?php echo $nome_cubo ?></h4>
    <div class="dados_cubo_fav">
        <h5 class="">Quantidade de tempos: <?php echo $temp ?></h5>
        <h5 class="">Melhor tempo: <?php echo $melhor_tempo ?></h5>
        <h5 class="">Média: <?php echo $media ?></h5>
        <h5 class="">Melhor média: <?php echo $melhor_media ?></h5>
    </div>
</div>
<br>

<h3 class="titulo">Tempos regis. p/ cubo</h3>
<br>

<div class="tempos_p_cubo">
    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/2x2.png" alt="2x2">
        <h5 class="nome_tempos_cubo">Cubo 2x2: <?php echo $fav_2x2 ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/3x3.png" alt="3x3">
        <h5 class="nome_tempos_cubo">Cubo 3x3: <?php echo $fav_3x3 ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/4x4.png" alt="4x4">
        <h5 class="nome_tempos_cubo">Cubo 4x4: <?php echo $fav_4x4 ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/5x5.png" alt="5x5">
        <h5 class="nome_tempos_cubo">Cubo 5x5: <?php echo $fav_5x5 ?></h5>
    </div>
</div>

<div class="tempos_p_cubo">
    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/6x6.png" alt="6x6">
        <h5 class="nome_tempos_cubo">Cubo 6x6: <?php echo $fav_6x6 ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/7x7.png" alt="7x7">
        <h5 class="nome_tempos_cubo">Cubo 7x7: <?php echo $fav_7x7 ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/piramynx.png" alt="Piramynx">
        <h5 class="nome_tempos_cubo">Piramynx: <?php echo $fav_piramynx ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/megaminx.png" alt="megaminx">
        <h5 class="nome_tempos_cubo">Megaminx: <?php echo $fav_megaminx ?></h5>
    </div>
</div>

<div class="tempos_p_cubo">
    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/skewb.png" alt="skewb">
        <h5 class="nome_tempos_cubo">Skewb: <?php echo $fav_skewb ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/square1.png" alt="square-1">
        <h5 class="nome_tempos_cubo">Square-1: <?php echo $fav_square1 ?></h5>
    </div>

    <div class="tempo_cubo">
        <img class="img_tempos_cubo" src="imagens/clock.png" alt="clock">
        <h5 class="nome_tempos_cubo">Clock: <?php echo $fav_clock ?></h5>
    </div>
</div>

<h3 class="quantidade_tempos_perfil">Tempos registrados (todos os cubos): <?php echo $quantidade_tempos ?></h3>

<h3 class="quantidade_tempos_perfil">Tempo gasto (todos os cubos): <?php echo tempoFinal($tempo_gasto) ?></h3>

<br>
<br>
<br>
<br>

</body>
</html>