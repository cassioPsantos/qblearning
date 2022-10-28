<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = $_GET['tipo_cubo'];

if (isset($_GET['deletar_btn'])) {
    $i = $_GET['cod'];
    $table = $_GET['tabela'];
    $sql_deletar = "DELETE FROM $table WHERE cod='$i'";
    mysqli_query($conn, $sql_deletar);
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: tempos.php");
    } else {
        echo "<script>alert('Houve algum erro.');</script>";
        mysqli_error($conn);
        echo $conn->error;
        header("Location: tempos.php");
    }
}

// seleção de melhor tempo
$sql_dados_cubo = "SELECT * FROM melhor_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_tempo_cod = $dados_cubo['cod'];
$melhor_tempo = $dados_cubo['melhor_tempo'];
$melhor_tempo_data = $dados_cubo['dia'];
$melhor_tempo_embar = $dados_cubo['embaralhamento'];

// seleção de pior tempo
$sql_dados_cubo = "SELECT * FROM pior_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$pior_tempo_cod = $dados_cubo['cod'];
$pior_tempo = $dados_cubo['pior_tempo'];
$pior_tempo_data = $dados_cubo['dia'];
$pior_tempo_embar = $dados_cubo['embaralhamento'];

// seleção de ultimo tempo
$sql_dados_cubo = "SELECT * FROM ultimo_tempo WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$ultimo_tempo_cod = $dados_cubo['cod'];
$ultimo_tempo = $dados_cubo['ultimo_tempo'];
$ultimo_tempo_data = $dados_cubo['dia'];
$ultimo_tempo_embar = $dados_cubo['embaralhamento'];

// seleção de melhor media
$sql_dados_cubo = "SELECT * FROM melhor_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$melhor_media_cod = $dados_cubo['cod'];
$melhor_media = $dados_cubo['melhor_media'];
$melhor_media_data = $dados_cubo['dia'];

// seleção de pior media
$sql_dados_cubo = "SELECT * FROM pior_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$pior_media_cod = $dados_cubo['cod'];
$pior_media = $dados_cubo['pior_media'];
$pior_media_data = $dados_cubo['dia'];

// seleção de última media
$sql_dados_cubo = "SELECT * FROM ultima_media WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados_cubo = mysqli_query($conn, $sql_dados_cubo);
$dados_cubo = mysqli_fetch_array($query_dados_cubo);
$ultima_media_cod = $dados_cubo['cod'];
$ultima_media = $dados_cubo['ultima_media'];
$ultima_media_data = $dados_cubo['dia'];

// seleção de média geral
$sql_media = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario' AND tipo_cubo = '$tipo_cubo'";
$query_media = mysqli_query($conn, $sql_media);
$dados_media = mysqli_fetch_array($query_media);
$media = $dados_media['media'];

//seleção de quantidade de tempos
$sql_dados = "SELECT COUNT(tempo) AS quantidade_tempos FROM tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados = mysqli_query($conn, $sql_dados);
$dados = mysqli_fetch_array($query_dados);
$quantidade_tempos = $dados['quantidade_tempos'];

//seleção de tempo gasto
$sql_dados = "SELECT SUM(tempo) AS tempo_gasto FROM tempos WHERE id_usuario= '$id_usuario' AND tipo_cubo= '$tipo_cubo'";
$query_dados = mysqli_query($conn, $sql_dados);
$dados = mysqli_fetch_array($query_dados);
if ($dados['tempo_gasto'] == null) {
    $tempo_gasto = "N/A";
} else {
    $tempo_gasto = tempoFinal($dados['tempo_gasto']);
}

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
    <h5 class="linha_detalhes">Melhor tempo: 
                <?php 
                if ($melhor_tempo != 0) {
                    $tempo_final = tempoFinal($melhor_tempo);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
    <h5 class="linha_detalhes">Pior tempo:        
                <?php 
                if ($pior_tempo != 0) {
                    $tempo_final = tempoFinal($pior_tempo);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
    <h5 class="linha_detalhes">Último tempo:     
                <?php 
                if ($ultimo_tempo != 0) {
                    $tempo_final = tempoFinal($ultimo_tempo);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
    <div class="detalhes_2">
        <h5 class="linha_detalhes">Melhor média 3/5:          
                <?php 
                if ($melhor_media != 0) {
                    $tempo_final = tempoFinal($melhor_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
        <h5 class="linha_detalhes">Pior média 3/5:                
                <?php 
                if ($pior_media != 0) {
                    $tempo_final = tempoFinal($pior_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
        <h5 class="linha_detalhes">Última média 3/5:                
                <?php 
                if ($ultima_media != 0) {
                    $tempo_final = tempoFinal($ultima_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
    </div>
    <h5 class="linha_detalhes">Média geral: 
                <?php 
                if ($ultima_media != 0) {
                    $tempo_final = tempoFinal($ultima_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h5>
    <br>
</div>

<div class="caixas_detalhe">

    <h3 class="quantidade_tempos">Quantidade de tempos registrados: <?php echo $quantidade_tempos ?></h3>
    <h3 class="quantidade_tempos">Tempo total gasto resolvendo: <?php echo $tempo_gasto ?></h3>

    <!-- melhor tempo detalhes -->
    <div class="caixa_pagina">
            <form method="GET">
            <input type="hidden" name="cod" value="<?php echo $melhor_tempo_cod ?>"></input>
            <input type="hidden" name="tabela" value="melhor_tempo"></input>
            <input type="submit" onclick="return confirm('Tem certeza que deseja deletar o dado? Essa ação não pode ser desfeita.')" class='deletar_detalhes_btn' name="deletar_btn" value="Excluir"></input></td>
            </form>
        <h3 class="titulo_caixas">Melhor tempo:                
                    <?php 
                    if ($melhor_tempo != 0) {
                        $tempo_final = tempoFinal($melhor_tempo);
                        echo $tempo_final;
                    } else {
                        echo 'N/A';
                    } ?></h3>
        <h6 class="coisas_detalhes">Data: <?php 
                    if ($melhor_tempo != 0) {
                        echo date_format(date_create($melhor_tempo_data), "d/m/Y");
                    } else {
                        echo 'N/A';
                    }?></h6>
        <h6 class="coisas_detalhes">Embaralhamento: <?php                 
                    if ($melhor_tempo != 0) {
                        echo $melhor_tempo_embar;
                    } else {
                        echo 'N/A';
                    }?></h6>
        <br>
    </div>

    <!-- pior tempo detalhes -->
    <div class="caixa_pagina">
            <form method="GET">
            <input type="hidden" name="cod" value="<?php echo $pior_tempo_cod ?>"></input>
            <input type="hidden" name="tabela" value="pior_tempo"></input>
            <input type="submit" onclick="return confirm('Tem certeza que deseja deletar o dado? Essa ação não pode ser desfeita.')" class='deletar_detalhes_btn' name="deletar_btn" value="Excluir"></input></td>
            </form>
        <h3 class="titulo_caixas">Pior tempo:                
                    <?php 
                    if ($pior_tempo != 0) {
                        $tempo_final = tempoFinal($pior_tempo);
                        echo $tempo_final;
                    } else {
                        echo 'N/A';
                    } ?></h3>
        <h6 class="coisas_detalhes">Data: <?php 
                    if ($pior_tempo != 0) {
                        echo date_format(date_create($pior_tempo_data), "d/m/Y");
                    } else {
                        echo 'N/A';
                    }?></h6>
        <h6 class="coisas_detalhes">Embaralhamento: <?php                 
                    if ($pior_tempo != 0) {
                        echo $pior_tempo_embar;
                    } else {
                        echo 'N/A';
                    }?></h6>
        <br>
    </div>

    <!-- ultimo tempo detalhes -->
    <div class="caixa_pagina">
            <form method="GET">
            <input type="hidden" name="cod" value="<?php echo $ultimo_tempo_cod ?>"></input>
            <input type="hidden" name="tabela" value="ultimo_tempo"></input>
            <input type="submit" onclick="return confirm('Tem certeza que deseja deletar o dado? Essa ação não pode ser desfeita.')" class='deletar_detalhes_btn' name="deletar_btn" value="Excluir"></input></td>
            </form>
        <h3 class="titulo_caixas">Último tempo:                
                    <?php 
                    if ($ultimo_tempo != 0) {
                        $tempo_final = tempoFinal($ultimo_tempo);
                        echo $tempo_final;
                    } else {
                        echo 'N/A';
                    } ?></h3>
        <h6 class="coisas_detalhes">Data: <?php 
                    if ($ultimo_tempo != 0) {
                        echo date_format(date_create($ultimo_tempo_data), "d/m/Y");
                    } else {
                        echo 'N/A';
                    }?></h6>

        <h6 class="coisas_detalhes">Embaralhamento: <?php                 
                    if ($ultimo_tempo != 0) {
                        echo $ultimo_tempo_embar;
                    } else {
                        echo 'N/A';
                    }?></h6>
    </div>
</div>

<br>

<div class="caixas_detalhe">
<!-- melhor media detalhes -->
<div class="caixa_pagina">
        <form method="GET">
        <input type="hidden" name="cod" value="<?php echo $melhor_media_cod ?>"></input>
        <input type="hidden" name="tabela" value="melhor_media"></input>
        <input type="submit" onclick="return confirm('Tem certeza que deseja deletar o dado? Essa ação não pode ser desfeita.')" class='deletar_detalhes_btn' name="deletar_btn" value="Excluir"></input></td>
        </form>
    <h3 class="titulo_caixas">Melhor média 3/5:                
                <?php 
                if ($melhor_media != 0) {
                    $tempo_final = tempoFinal($melhor_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h3>
    <h6 class="coisas_detalhes">Data: <?php 
                if ($melhor_media != 0) {
                    echo date_format(date_create($melhor_media_data), "d/m/Y");
                } else {
                    echo 'N/A';
                }?></h6>

    <br>
</div>

<!-- pior media detalhes -->
<div class="caixa_pagina">
        <form method="GET">
        <input type="hidden" name="cod" value="<?php echo $pior_media_cod ?>"></input>
        <input type="hidden" name="tabela" value="pior_media"></input>
        <input type="submit" onclick="return confirm('Tem certeza que deseja deletar o dado? Essa ação não pode ser desfeita.')" class='deletar_detalhes_btn' name="deletar_btn" value="Excluir"></input></td>
        </form>
    <h3 class="titulo_caixas">Pior média 3/5:                
                <?php 
                if ($pior_media != 0) {
                    $tempo_final = tempoFinal($pior_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h3>
    <h6 class="coisas_detalhes">Data: <?php 
                if ($pior_media != 0) {
                    echo date_format(date_create($pior_media_data), "d/m/Y");
                } else {
                    echo 'N/A';
                }?></h6>

    <br>
</div>

<!-- ultima media detalhes -->
<div class="caixa_pagina">
        <form method="GET">
        <input type="hidden" name="cod" value="<?php echo $ultima_media_cod ?>"></input>
        <input type="hidden" name="tabela" value="ultima_media"></input>
        <input type="submit" onclick="return confirm('Tem certeza que deseja deletar o dado? Essa ação não pode ser desfeita.')" class='deletar_detalhes_btn' name="deletar_btn" value="Excluir"></input></td>
        </form>
    <h3 class="titulo_caixas">Última média 3/5:               
                <?php 
                if ($ultima_media != 0) {
                    $tempo_final = tempoFinal($ultima_media);
                    echo $tempo_final;
                } else {
                    echo 'N/A';
                } ?></h3>
    <h6 class="coisas_detalhes">Data: <?php 
                if ($ultima_media != 0) {
                    echo date_format(date_create($ultima_media_data), "d/m/Y");
                } else {
                    echo 'N/A';
                }?></h6>

    <br>
</div>
</div>

</body>
</html>