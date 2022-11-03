<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
include('funcoes_crono.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = $_SESSION['tipo_cubo'];

// funções embaralhamento
$scrambler = new Scrambler();
$pira_scrambler = new pira_Scrambler();
$mega_scrambler = new mega_Scrambler();
$two_scrambler = new two_Scrambler();
$skewb_scrambler = new skewb_Scrambler();
$embaralhamento = $_SESSION['embar'];
$embar = str_replace("'","''",$embaralhamento,$i);
$embaralhamento = $embar;
$embar_check = $_GET['embar_check'];

// definição de dia
$dia = date("Y-m-d");

$tempo = $_GET['tempo'];
$tempo_final = tempoFinal($tempo);
if ($embar_check == 1) {
    $_SESSION['cubo_check'] = 1;
}
$embar_check = 0;
if (isset($_POST['btnEnviar'])) {
    $_SESSION['tipo_cubo'] = $_POST['tipo_cubo'];
    $tipo_cubo = $_SESSION['tipo_cubo'];
    $_SESSION['cubo_check'] = 1;
}

//deletar tempo
if (isset($_GET['deletar_btn'])) {
    $i = $_GET['cod'];
    $sql_deletar = "DELETE FROM tempos WHERE cod='$i'";
    mysqli_query($conn, $sql_deletar);
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: cronometro.php");
    } else {
        echo "<script>alert('Houve algum erro.');</script>";
        mysqli_error($conn);
        echo $conn->error;
    }
}

// seleção de melhor tempo
$sql_dados_cubo = "SELECT melhor_tempo FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo = $dados_cubo['melhor_tempo'];
    
// seleção de pior tempo
$sql_dados_cubo = "SELECT pior_tempo FROM pior_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$pior_tempo = $dados_cubo['pior_tempo'];

// seleção de melhor media
$sql_dados_cubo = "SELECT melhor_media FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media = $dados_cubo['melhor_media'];

// seleção de pior media
$sql_dados_cubo = "SELECT pior_media FROM pior_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$pior_media = $dados_cubo['pior_media'];

if ($tempo != null) {

    if ($_SESSION['cubo_check'] == 0) {

        // inserção de tempos
        $sql_tempo = "INSERT INTO tempos (id_usuario, tipo_cubo, tempo) 
        VALUES ('$id_usuario', '$tipo_cubo', '$tempo')";
        mysqli_query($conn, $sql_tempo);

        // inserção de melhor tempo
        if ($tempo < $melhor_tempo or $melhor_tempo == null) {
            $melhor_tempo = $tempo;
            $sql_melhortempo = "SELECT * FROM melhor_tempo WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_melhortempo);
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
            $pior_tempo = $tempo;
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

        //inserção de último tempo
        $sql_ultimotempo = "SELECT * FROM ultimo_tempo WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
        mysqli_query($conn, $sql_ultimotempo);
        if (mysqli_affected_rows($conn) == 0) {
            $sql_ultimotempo = "INSERT INTO ultimo_tempo (id_usuario, tipo_cubo, embaralhamento, ultimo_tempo, dia) 
                                VALUES ('$id_usuario', '$tipo_cubo', '$embaralhamento', '$tempo', '$dia')";
            mysqli_query($conn, $sql_ultimotempo);
        } else if (mysqli_affected_rows($conn) > 0) {
            $sql_ultimotempo = "UPDATE ultimo_tempo
                                SET ultimo_tempo = '$tempo',
                                embaralhamento = '$embaralhamento',
                                dia = '$dia'
                                WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_ultimotempo);
        }
    }
}

$sql_checktempos = "SELECT * FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
mysqli_query($conn, $sql_checktempos);
if (mysqli_affected_rows($conn) >= 5) {
    //seleção de média de 5

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_5 = mysqli_fetch_array($query_media5);
    $x1 = $dados_media5_5['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 1,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_5 = mysqli_fetch_array($query_media5);
    $x2 = $dados_media5_5['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 2,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_4 = mysqli_fetch_array($query_media5);
    $x3 = $dados_media5_4['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 3,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_3 = mysqli_fetch_array($query_media5);
    $x4 = $dados_media5_3['tempo'];

    $sql_media5 = "SELECT tempo from tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo' order by cod DESC LIMIT 4,1";
    $query_media5 = mysqli_query($conn, $sql_media5);
    $dados_media5_2 = mysqli_fetch_array($query_media5);
    $x5 = $dados_media5_2['tempo'];

    $media_5 = gerarMedia5($x1, $x2, $x3, $x4, $x5);

    //inserção de melhor média
    if ($media_5 < $melhor_media or $melhor_media == null) {
        $melhor_media = $media_5;
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

    //inserção de pior média
    if ($media_5 > $pior_media or $pior_media == null) {
        $pior_media = $media_5;
        $sql_piormedia = "SELECT * FROM pior_media WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
        mysqli_query($conn, $sql_piormedia);
        if (mysqli_affected_rows($conn) == 0) {
            $sql_piormedia = "INSERT INTO pior_media (id_usuario, tipo_cubo, pior_media, dia) 
                                VALUES ('$id_usuario', '$tipo_cubo', '$pior_media', '$dia')";
            mysqli_query($conn, $sql_piormedia);
        } else if (mysqli_affected_rows($conn) > 0) {
            $sql_piormedia = "UPDATE pior_media
                                SET pior_media = '$pior_media',
                                dia = '$dia'
                                WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_piormedia);
        }
    }

    //inserção de última média
    $sql_ultimamedia = "SELECT * FROM ultima_media WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
    mysqli_query($conn, $sql_ultimamedia);
    if (mysqli_affected_rows($conn) == 0) {
        $sql_ultimamedia = "INSERT INTO ultima_media (id_usuario, tipo_cubo, ultima_media, dia) 
                            VALUES ('$id_usuario', '$tipo_cubo', '$media_5', '$dia')";
        mysqli_query($conn, $sql_ultimamedia);
    } else if (mysqli_affected_rows($conn) > 0) {
        $sql_ultimamedia = "UPDATE ultima_media
                            SET ultima_media = '$media_5',
                            dia = '$dia'
                            WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
        mysqli_query($conn, $sql_ultimamedia);
    }
}

// seleção da média
$sql_media = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
$query_media = mysqli_query($conn, $sql_media);
$dados_media = mysqli_fetch_array($query_media);
$media = $dados_media['media'];
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
        $embaralhamento = $two_scrambler->generate();
        echo $embaralhamento;
        break;
    case '3x3':
        $embaralhamento = $scrambler->generate();
        echo $embaralhamento;
        break;
    case '4x4':
        $scrambler->setLength(30);
        $scrambler->setWide(25);
        $embaralhamento = $scrambler->generate();
        echo $embaralhamento;
        break;
    case '5x5':
        $scrambler->setLength(30);
        $scrambler->setWide(25);
        $embaralhamento = $scrambler->generate();
        echo $embaralhamento;
        break;
    case '6x6':
        $scrambler->setLength(35);
        $scrambler->setTwo(10);
        $scrambler->setThree(10);
        $embaralhamento = $scrambler->generate();
        echo $embaralhamento;
        break;
    case '7x7':
        $scrambler->setLength(35);
        $scrambler->setTwo(10);
        $scrambler->setThree(10);
        $embaralhamento = $scrambler->generate();
        echo $embaralhamento;
        break;
    case 'Piramynx':
        $embaralhamento = $pira_scrambler->generate();
        echo $embaralhamento;
        break;
    case 'Megaminx':
        ?><script>
            document.getElementById('embar').style.fontSize = '15px';
            document.getElementById('embar').style.marginTop = '1.5%';
        </script><?php
        $mega_embar_1 = $mega_scrambler->generate();
        $mega_embar_2 = $mega_scrambler->generate();
        $mega_embar_3 = $mega_scrambler->generate();
        $mega_embar_4 = $mega_scrambler->generate();
        $mega_embar_5 = $mega_scrambler->generate();
        $mega_embar_6 = $mega_scrambler->generate();
        $mega_embar_7 = $mega_scrambler->generate();
        $embaralhamento = $mega_embar_1 . " / " . $mega_embar_2 . "<br>" . $mega_embar_3 . " / " . $mega_embar_4 . "<br>" . $mega_embar_5 . " / " . $mega_embar_6 . "<br>" . $mega_embar_7;
        echo $embaralhamento;
        break;
    case 'Skewb':
        $embaralhamento = $skewb_scrambler->generate();
        echo $embaralhamento;
        break;
    case 'Square-1':
        echo "ainda não desenvolvido";
        break;
    case 'Clock':
        echo "ainda não desenvolvido";
        break;
}
$_SESSION['embar'] = $embaralhamento;
?></p>
</div>
    <h1 id="tempo"><?php
    if ($tempo == null) {
        echo "0";
    } else {
        $tempo_final = tempoFinal($tempo);
        echo $tempo_final;
    }
    ?></h1><br>

<div id="tempo_comeca">
<div class="container tabela_tempos">
    <table class="table table-striped">  
        <div class="tabela_titulo">
            <a>Tempos</a>
        </div>
        <?php
        $sql_listagem = "SELECT * FROM tempos WHERE id_usuario='$id_usuario' AND tipo_cubo='$tipo_cubo' ORDER BY cod DESC";
        $query_listagem = mysqli_query($conn, $sql_listagem);
        while ($dados_listagem = mysqli_fetch_array($query_listagem)) { ?>
            <tr>
                <td><?php
                    $tempo_final = tempoFinal($dados_listagem['tempo']);
                    echo $tempo_final;
                    $tempo_deletar = $dados_listagem['cod'];
                ?></td>
                <td>
                    <form method="GET">
                        <input type="hidden" name="cod" value="<?php echo $tempo_deletar ?>"></input>
                        <input type="submit" class='deletar_btn' name="deletar_btn" value="X"></input></td>
                    </form>
                </td>
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
            <td><?php
                if ($melhor_tempo != null) {
                    $tempo_final = tempoFinal($melhor_tempo); 
                    echo $tempo_final;
                } else {
                    echo "N/A";
                }
                ?></td>
        </tr>
        <tr>
            <td>Pior tempo:</td>
            <td><?php
                if ($pior_tempo != null) {
                    $tempo_final = tempoFinal($pior_tempo); 
                    echo $tempo_final;
                } else {
                    echo "N/A";
                }
                ?></td>
        </tr>
        <tr>
            <td>Média geral:</td>
            <td><?php 
                if ($media != 0) {
                    $tempo_final = tempoFinal($media);
                    echo number_format((float)$tempo_final, 2);
                } else {
                    echo 'N/A';
                }
                ?></td>
        </tr>
        <tr>
            <td>Média 3/5:</td>
            <td><?php 
            $sql_checktempos = "SELECT * FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_checktempos);
            if (mysqli_affected_rows($conn) >= 5) {
                $tempo_final = tempoFinal($media_5);
                echo number_format((float)$tempo_final, 2);
            } else {
                echo "N/A";
            }
            ?></td>
        </tr>
        <tr>
            <td>Melhor média 3/5:</td>
            <td><?php
            $sql_checktempos = "SELECT * FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_checktempos);
            if (mysqli_affected_rows($conn) >= 5) {
                $tempo_final = tempoFinal($melhor_media);
                echo number_format((float)$tempo_final, 2);
            } else {
                echo "N/A";
            }
            ?></td>
        </tr>
        <tr>
            <td>Pior média 3/5:</td>
            <td><?php
            $sql_checktempos = "SELECT * FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
            mysqli_query($conn, $sql_checktempos);
            if (mysqli_affected_rows($conn) >= 5) {
                $tempo_final = tempoFinal($pior_media);
                echo number_format((float)$tempo_final, 2);
            } else {
                echo "N/A";
            }
            ?></td>
        </tr>
    </table>
</div>

<div class="espaco_comecar">
    <h5>Pressione e segure espaço para começar</h5>
</div><br>

<div class="embar_botao">
    <button id="embar_botao" class="botao_azul">Atualizar embaralhamento</button>
</div>

<form method="POST">
<div class="escolher_cubo">
    <table class="">
        <tr class="">
            <td class="tabela_tipo_cubo">
                <p class="titulo_tipo_cubo">Tipo de cubo:</p>
            </td>
            <td class="select_tipo_cubo">
                <select class="form-control" name="tipo_cubo">
                    <option selected="true" disabled="disabled" hidden="hidden"><?php echo $tipo_cubo?></option>
                    <option value="2x2">2x2</option>
                    <option value="3x3">3x3</option>
                    <option value="4x4">4x4</option>
                    <option value="5x5">5x5</option>
                    <option value="6x6">6x6</option>
                    <option value="7x7">7x7</option>
                    <option value="Piramynx">Piramynx</option>
                    <option value="Megaminx">Megaminx</option>
                    <option value="Skewb">Skewb</option>
                    <option value="Square-1">Square-1</option>
                    <option value="Clock">Clock</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tabela_tipo_cubo">
                <input class="botao_azul atualiza_btn" type="submit" value="Atualizar" name="btnEnviar"/>
            </td>
            <td class="tabela_tipo_cubo">
                <div class="imagem_tipo_cubo1">
                    <img src="imagens/<?php 
                    switch ($tipo_cubo) {
                    case '2x2':
                        echo "2x2.png";
                        break;
                    case '3x3':
                        echo "3x3.png";
                        break;
                    case '4x4':
                        echo "4x4.png";
                        break;
                    case '5x5':
                        echo "5x5.png";
                        break;
                    case '6x6':
                        echo "6x6.png";
                        break;
                    case '7x7':
                        echo "7x7.png";
                        break;
                    case 'Piramynx':
                        echo "piramynx.png";
                        break;
                    case 'Megaminx':
                        echo "megaminx.png";
                        break;
                    case 'Skewb':
                        echo "skewb.png";
                        break;
                    case 'Square-1':
                        echo "square1.png";
                        break;
                    case 'Clock':
                        echo "clock.png";
                        break;
                }
                    ?>" alt="tipo_cubo" class="imagem_tipo_cubo">
                </div>
            </td>
        </tr>
    </table>
</div>
</form>

</div>

</body>
</html>