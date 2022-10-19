<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
include('funcoes_cronometro.php');
include('scrambler.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = $_SESSION['tipo_cubo'];
$scrambler = new Scrambler();
$pira_scrambler = new pira_Scrambler();
$mega_scrambler = new mega_Scrambler();
$embaralhamento = '';
//$embaralhamento = $scrambler->generate();
$dia = date("Y-m-d");
$embar_check = $_GET['embar_check'];
if ($embar_check == 1) {
    $_SESSION['cubo_check'] = 1;
}
$embar_check = 0;
if (isset($_POST['btnEnviar'])) {
    $_SESSION['tipo_cubo'] = $_POST['tipo_cubo'];
    $tipo_cubo = $_SESSION['tipo_cubo'];
    $_SESSION['cubo_check'] = 1;
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

// seleção de melhor media
$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$_SESSION['melhor_media'] = $dados_cubo['melhor_media'];

    //seleção de média de 5

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 3,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_5 = mysqli_fetch_array($query_media5);
    $x2 = $dados_media5_5['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 2,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_4 = mysqli_fetch_array($query_media5);
    $x3 = $dados_media5_4['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 1,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_3 = mysqli_fetch_array($query_media5);
    $x4 = $dados_media5_3['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_2 = mysqli_fetch_array($query_media5);
    $x5 = $dados_media5_2['tempo'];

$melhor_tempo = $_SESSION['melhor_tempo'];
$pior_tempo = $_SESSION['pior_tempo'];
$tempo = $_GET['tempo'];

if ($tempo != null) {

    if ($_SESSION['cubo_check'] == 0) {

        $x1 = $tempo;
        $max = max($x1, $x2, $x3, $x4, $x5);
        $min = min($x1, $x2, $x3, $x4, $x5);
        if ($max == $x1) {

            if ($min == $x2) {
                $media_5 = ($x3 + $x4 + $x5) / 3;
            }
        
            if ($min == $x3) {
                $media_5 = ($x2 + $x4 + $x5) / 3;
            }
        
            if ($min == $x4) {
                $media_5 = ($x3 + $x2 + $x5) / 3;
            }
        
            if ($min == $x5) {
                $media_5 = ($x3 + $x2 + $x4) / 3;
            }
        }
        
        if ($max == $x2) {
        
            if ($min == $x1) {
                $media_5 = ($x3 + $x2 + $x5) / 3;
            }
        
            if ($min == $x3) {
                $media_5 = ($x1 + $x4 + $x5) / 3;
            }
        
            if ($min == $x4) {
                $media_5 = ($x3 + $x1 + $x5) / 3;
            }
        
            if ($min == $x5) {
                $media_5 = ($x3 + $x1 + $x4) / 3;
            }
        }
        
        if ($max == $x3) {
        
            if ($min == $x1) {
                $media_5 = ($x4 + $x2 + $x5) / 3;
            }
        
            if ($min == $x2) {
                $media_5 = ($x1 + $x4 + $x5) / 3;
            }
        
            if ($min == $x4) {
                $media_5 = ($x1 + $x2 + $x5) / 3;
            }
        
            if ($min == $x5) {
                $media_5 = ($x1 + $x2 + $x4) / 3;
            }
        
        }
        
        if ($max == $x4) {
        
            if ($min == $x1) {
                $media_5 = ($x3 + $x2 + $x5) / 3;
            }
        
            if ($min == $x2) {
                $media_5 = ($x3 + $x1 + $x5) / 3;
            }
        
            if ($min == $x3) {
                $media_5 = ($x1 + $x2 + $x5) / 3;
            }
        
            if ($min == $x5) {
                $media_5 = ($x3 + $x2 + $x1) / 3;
            }
        }
        
        if ($max == $x5) {
        
            if ($min == $x1) {
                $media_5 = ($x3 + $x2 + $x4) / 3;
            }
        
            if ($min == $x2) {
                $media_5 = ($x3 + $x1 + $x4) / 3; 
            }
        
            if ($min == $x3) {
                $media_5 = ($x1 + $x2 + $x4) / 3;
            }
        
            if ($min == $x4) {
                $media_5 = ($x3 + $x2 + $x1) / 3;
            }
        
        }

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

        //inserção de melhor média
        if ($media_5 < $melhor_media or $melhor_media == null) {
            $_SESSION['melhor_media'] = $media_5;
            $melhor_media = $_SESSION['melhor_media'];
            $sql_melhormedia = "SELECT * FROM melhor_media WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_melhormedia);
            if (mysqli_affected_rows($conn) == 0) {
                $sql_melhormedia = "INSERT INTO melhor_media (id_usuario, tipo_cubo, melhor_media, dia) 
                                    VALUES ('$id_usuario', '$tipo_cubo', '$melhor_media', '$dia')";
                mysqli_query($conn, $sql_melhormedia);
            } else if (mysqli_affected_rows($conn) > 0) {
                $sql_melhormedia = "UPDATE melhor_media
                                    SET melhor_media = '$melhor_media',
                                    dia = '$dia'
                                    WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
                mysqli_query($conn, $sql_melhormedia);
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

<body id="cadastrobarray">
<div id="tempo_comeca2">
<p id="embar" class="embaralhamento"><?php
switch ($tipo_cubo) {
    case '2x2':
        echo $scrambler->generate();
        break;
    case '3x3':
        echo $scrambler->generate();
        break;
    case '4x4':
        $scrambler->setLength(30);
        $scrambler->setWide(25);
        echo $scrambler->generate();
        break;
    case '5x5':
        $scrambler->setLength(30);
        $scrambler->setWide(25);
        echo $scrambler->generate();
        break;
    case '6x6':
        $scrambler->setLength(35);
        $scrambler->setTwo(10);
        $scrambler->setThree(10);
        echo $scrambler->generate();
        break;
    case '7x7':
        $scrambler->setLength(35);
        $scrambler->setTwo(10);
        $scrambler->setThree(10);
        echo $scrambler->generate();
        break;
    case 'Piramynx':
        echo $pira_scrambler->generate();
        break;
    case 'Megamynx':
        ?><script>
            document.getElementById('embar').style.fontSize = '15px';
            document.getElementById('embar').style.marginTop = '1.5%';
        </script><?php
        echo $mega_scrambler->generate();
        echo '  /  ';
        echo $mega_scrambler->generate();
        echo '  /  ';
        echo $mega_scrambler->generate();
        echo '<br>';
        echo $mega_scrambler->generate();
        echo '  /  ';
        echo $mega_scrambler->generate();
        echo '  /  ';
        echo $mega_scrambler->generate();
        echo '<br>';
        echo $mega_scrambler->generate();
        break;
    case 'Skewb':
        echo "ainda não desenvolvido";
        break;
    case 'Square-1':
        echo "ainda não desenvolvido";
        break;
    case 'Clock':
        echo "ainda não desenvolvido";
        break;
}
?></p>
</div>
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
        <div class="tabela_titulo">
            <a>Tempos</a>
        </div>
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
        <div class="tabela_titulo">
            <a>Dados da sessão</a>
        </div>
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
                    echo '0.00';
                }
                ?></td>
        </tr>
        <tr>
            <td>Média 3/5:</td>
            <td><?php echo number_format((float)$media_5, 2); ?></td>
        </tr>
        <tr>
            <td>Melhor média 3/5:</td>
            <td><?php echo number_format((float)$melhor_media, 2); ?></td>
        </tr>
    </table>
</div>

<div class="espaco_comecar">
    <h5>Pressione e segure espaço para começar</h5>
</div><br>

<div class="embar_botao">
    <button id="embar_botao" class="btn btn-primary">Atualizar embaralhamento</button>
</div>

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