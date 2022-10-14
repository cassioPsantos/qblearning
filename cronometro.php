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
    $_SESSION['cubo_check'] = 1;
}

function calculo_media5(array $array_media_5) {

    if(empty($array_media_5)) {
        return;
    }
    
    $max = PHP_INT_MIN;
    $secondMax = PHP_INT_MIN;
    $thirdMax = PHP_INT_MIN;
    $fourthMax = PHP_INT_MIN;
    $fifthMax = PHP_INT_MIN;
    
    foreach($array_media_5 as $number) {
        
        if($number > $max) {
            $fifthMax = $fourthMax;
            $fourthMax = $thirdMax;
            $thirdMax = $secondMax;
            $secondMax = $max;
            $max = $number;
        }
    
        if($number > $secondMax && $number < $max) {
            $fifthMax = $fourthMax;
            $fourthMax = $thirdMax;
            $thirdMax = $secondMax;
            $secondMax = $number;
        }

        if($number > $thirdMax && ($number < $max && $number < $secondMax)) {
            $fifthMax = $fourthMax;
            $fourthMax = $thirdMax;
            $thirdMax = $number;
        }

        if($number > $fourthMax && ($number < $max && $number < $secondMax && $number < $thirdMax)) {
            $fifthMax = $fourthMax;
            $fourthMax = $number;
        }

        if($number > $fifthMax && ($number < $max && $number < $secondMax && $number < $thirdMax && $number < $fourthMax)) {
            $fifthMax = $number;
        }

    }
    

}

// seleção de melhor tempo
$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$_SESSION['melhor_tempo'] = $dados_cubo['melhor_tempo'];
    
// seleção de pior tempo
$sql_dados_cubo = "SELECT pior_tempo FROM pior_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$_SESSION['pior_tempo'] = $dados_cubo['pior_tempo'];

    //seleção de média de 5

    $sql_media5 = "SELECT tempo from tempos order by cod DESC LIMIT 3,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_5 = mysqli_fetch_array($query_media5);
    $x2 = $dados_media5_5['tempo'];

    $sql_media5 = "SELECT tempo from tempos order by cod DESC LIMIT 2,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_4 = mysqli_fetch_array($query_media5);
    $x3 = $dados_media5_4['tempo'];

    $sql_media5 = "SELECT tempo from tempos order by cod DESC LIMIT 1,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_3 = mysqli_fetch_array($query_media5);
    $x4 = $dados_media5_3['tempo'];

    $sql_media5 = "SELECT tempo from tempos order by cod DESC LIMIT 1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_2 = mysqli_fetch_array($query_media5);
    $x5 = $dados_media5_2['tempo'];

$melhor_tempo = $_SESSION['melhor_tempo'];
$pior_tempo = $_SESSION['pior_tempo'];
$tempo = $_GET['tempo'];
$embaralhamento = "";
$dia = date("Y-m-d");

if ($tempo != null) {

    if ($_SESSION['cubo_check'] == 0) {

        $x1 = $tempo;
        $array_media_5 = array($x1, $x2, $x3, $x4, $x5);
        var_dump($array_media_5);
        
        $media_5 = calculo_media5($array_media_5);

        // inserção de tempos
        $sql_tempo = "INSERT INTO tempos (id_usuario, tipo_cubo, tempo) 
                        VALUES ('$id_usuario', '$tipo_cubo', '$tempo')";
        mysqli_query($conn, $sql_tempo);

        // inserção de melhor tempo
        if ($tempo < $melhor_tempo or $melhor_tempo == null) {
            $_SESSION['melhor_tempo'] = $tempo;
            $melhor_tempo = $tempo;
            $sql_melhortempo = "SELECT * FROM melhor_tempo WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_melhortempo);
            $teste = mysqli_affected_rows($conn);
            if (mysqli_affected_rows($conn) == 0) {
                $sql_melhortempo = "INSERT INTO melhor_tempo (id_usuario, tipo_cubo, melhor_tempo, embaralhamento, dia) 
                                    VALUES ('$id_usuario', '$tipo_cubo', '$melhor_tempo', '$embaralhamento', '$dia')";
                mysqli_query($conn, $sql_melhortempo);
            } else if (mysqli_affected_rows($conn) > 0) {
                $sql_melhortempo = "UPDATE melhor_tempo
                                    SET melhor_tempo = '$melhor_tempo',
                                    embaralhamento = '$embaralhamento',
                                    dia = '$dia'
                                    WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
                mysqli_query($conn, $sql_melhortempo);
            }

        }
        
        // inserção de pior tempo
        if ($tempo > $pior_tempo or $pior_tempo == null) {
            $_SESSION['pior_tempo'] = $tempo;
            $pior_tempo = $_SESSION['pior_tempo'];
            $sql_piortempo = "SELECT * FROM pior_tempo WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_piortempo);
            if (mysqli_affected_rows($conn) == 0) {
                $sql_piortempo = "INSERT INTO pior_tempo (id_usuario, tipo_cubo, pior_tempo, embaralhamento, dia) 
                                    VALUES ('$id_usuario', '$tipo_cubo', '$pior_tempo', '$embaralhamento', '$dia')";
                mysqli_query($conn, $sql_piortempo);
            } else if (mysqli_affected_rows($conn) > 0) {
                $sql_piortempo = "UPDATE pior_tempo
                                    SET pior_tempo = '$pior_tempo',
                                    embaralhamento = '$embaralhamento',
                                    dia = '$dia'
                                    WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
                mysqli_query($conn, $sql_piortempo);
            }

        }
    
    }
    // seleção da média
    $sql_media = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
    $query_media = mysqli_query($conn, $sql_media);
    $dados_media = mysqli_fetch_array($query_media);
    $media = $dados_media['media'];

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
            <td><?php echo number_format((float)$melhor_tempo, 2); ?></td>
        </tr>
        <tr>
            <td>Pior tempo:</td>
            <td><?php echo number_format((float)$pior_tempo, 2); ?></td>
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
                    <option selected="true" disabled="disabled">Tipo de cubo: <?php echo $tipo_cubo?> </option>
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