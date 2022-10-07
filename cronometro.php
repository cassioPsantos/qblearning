<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = $_SESSION['tipo_cubo'];
if (isset($_POST['btnEnviar'])) {
    $_SESSION['tipo_cubo'] = $_POST['tipo_cubo'];
    $tipo_cubo = $_SESSION['tipo_cubo'];
    $sql_dados_cubos = "SELECT tempo FROM melhor_tempo WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo';
                        SELECT media FROM melhor_media WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
    $query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
    $dados_cubo = mysqli_fetch_array($query_dados_cubo);
    $_SESSION['cubo_check'] = 1;
    $_SESSION['media'] = "";
    $_SESSION['melhor_tempo'] = $dados_cubo['tempo'];
    $_SESSION['pior_tempo'] = $dados_cubo['media'];
}
$tempo = $_GET['tempo'];
$melhor_tempo = $_SESSION['melhor_tempo'];
$pior_tempo = $_SESSION['pior_tempo'];
$media = $_SESSION['media'];
$embaralhamento = "";
$dia = date("d/m/Y");

if ($tempo != null) {

    if ($_SESSION['cubo_check'] == 0) {

        // inserção temporaria de tempos
        $sql_tempo = "INSERT INTO tempos (id_usuario, tipo_cubo, tempo) 
                        VALUES ('$id_usuario', '$tipo_cubo', '$tempo')";
        $query_dados_cubo = mysqli_query($conn, $sql_tempo);

        // definição de melhor tempo da sessão
        if ($tempo < $melhor_tempo OR $melhor_tempo == null) {
            $melhor_tempo = $tempo;
            $_SESSION['melhor_tempo'] = $tempo;
            $sql_melhortempo = "INSERT INTO melhor_tempo (id_usuario, tipo_cubo, tempo, embaralhamento, dia) 
                                VALUES ('$id_usuario', '$tipo_cubo', '$melhor_tempo', '$embaralhamento', '$dia')";
            mysqli_query($conn, $sql_melhortempo);
        }
        
        // definição de pior tempo da sessão
        if ($tempo > $pior_tempo OR $pior_tempo == null) {
            $pior_tempo = $tempo;
            $_SESSION['pior_tempo'] = $tempo;
        }
    
    }
    // definição da média da seção
    $sql_media = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
    $query_media = mysqli_query($conn, $sql_media);
    $dados_media = mysqli_fetch_array($query_media);
    $media = $dados_media['media'];
    $_SESSION['media'] = $media;

    // definição de melhor média geral da sessão
    if ($media < $melhor_media OR $melhor_media == null) {
        $melhor_media = $media;
        $_SESSION['melhor_media'] = $media;
        $sql_melhormedia = "INSERT INTO melhor_media (id_usuario, tipo_cubo, media, dia) 
                            VALUES ('$id_usuario', '$tipo_cubo', '$melhor_media', '$dia')";
        mysqli_query($conn, $sql_melhormedia);
    }
}

$_SESSION['cubo_check'] = 0;
?>
<head>
<link rel="stylesheet" href="css.css">
<title>Cronômetro - QBLearning</title>
<script src="cronometro.js" defer></script>
</head>

<body>
    <h1 id="tempo"><?php
    if ($tempo == null) {
        echo "0";
    } else {
        echo $tempo;
    }
    ?></h1><br>

<div id="tempo_comeca">
<div class="container tabela_tempos">
    <table class="table table-striped">  
        <tr>
            <th>Código</td>
            <th>Tempo</td>
        </tr>
        <?php
        $sql_listagem = "SELECT * FROM tempos WHERE id_usuario='$id_usuario' AND tipo_cubo='$tipo_cubo'";
        $query_listagem = mysqli_query($conn, $sql_listagem);
        while ($dados_listagem = mysqli_fetch_array($query_listagem)) { ?>
            <tr>
                <td><?php echo $dados_listagem['cod'] ?></td>
                <td><?php echo $dados_listagem['tempo'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="container tabela_dados">
    <table class="table table-striped">
        <tr>
            <td>Melhor tempo:</td>
            <td><?php echo $melhor_tempo ?></td>
        </tr>
        <tr>
            <td>Pior tempo:</td>
            <td><?php echo $pior_tempo ?></td>
        </tr>
        <tr>
            <td>Média da sessão:</td>
            <td><?php 
                if ($media != 0) {
                    echo number_format((float)$media, 2);
                } else {
                    $media = '';
                }
                ?></td>
        </tr>
        <tr>
            <td>Média de 5:</td>
            <td><?php /* echo $media_5 */ ?></td>
        </tr>
        <tr>
            <td>Melhor média de 5:</td>
            <td><?php /* echo $melhormedia_5 */ ?></td>
        </tr>
        <tr>
            <td>Média de 12:</td>
            <td><?php /* echo $media_12 */ ?></td>
        </tr>
        <tr>
            <td>Melhor média de 12:</td>
            <td><?php /* echo $melhormedia_12 */ ?></td>
        </tr>
    </table>
</div>

<div class="espaco_comecar">
    <h5>Pressione e segure espaço para começar</h5>
</div>
<br>

<form method="POST">
<div class="form-group escolher_cubo">
    <table class="table table-striped">
        <tr>
            <td>
                <select class="form-control" name="tipo_cubo">
                    <option>Tipo de cubo: <?php echo $tipo_cubo?> </option>
                    <option value="2x2">2x2</option>
                    <option value="3x3">3x3</option>
                    <option value="4x4">4x4</option>
                    <option value="5x5">5x5</option>
                    <option value="6x6">6x6</option>
                    <option value="7x7">7x7</option>
                    <option value="Piramynx">Piramynx</option>
                    <option value="Megamynx">Megamynx</option>
                    <option value="Skewb">Skewb</option>
                    <option value="Square-1">Square-1</option>
                    <option value="Clock">Clock</option>
                </select>
            </td>
        </tr>
        <div class="atualizabtn">
        <tr>
            <td>
                <input class="btn btn-primary" type="submit" value="Atualizar" name="btnEnviar" />
            </td>
        </tr>
        </div>
    </table>
</div>
</form>

</div>

</body>
</html>