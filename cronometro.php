<?php session_start(); ?>
<html>
<?php 
include('config.php');
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = "3x3";
$tempo = $_GET['tempo'];
$melhor_tempo = $_SESSION['melhor_tempo'];
$pior_tempo = $_SESSION['pior_tempo'];
$media = $_SESSION['media'];
if ($tempo != null) {
    $sql = "INSERT INTO tempos (id_usuario, tipo_cubo, tempo) 
            VALUES ('$id_usuario', '$tipo_cubo', '$tempo')";
    mysqli_query($conn, $sql);
    if ($tempo < $melhor_tempo OR $melhor_tempo == null) {
        $melhor_tempo = $tempo;
        $_SESSION['melhor_tempo'] = $tempo;
    }
    if ($tempo > $pior_tempo OR $pior_tempo == null) {
        $pior_tempo = $tempo;
        $_SESSION['pior_tempo'] = $tempo;
    }
    $sqlmedia = "SELECT AVG(tempo) AS media FROM tempos WHERE id_usuario = '$id_usuario'";
    $query1 = mysqli_query($conn, $sqlmedia);
    $dados1 = mysqli_fetch_array($query1);
    $media = $dados1['media'];
    $_SESSION['media'] = $media;
}

?>
<head>
<link rel="stylesheet" href="css.css">
<title>Cronômetro - QBLearning</title>
</head>

<body onkeypress="cor_cron()" onkeyup="inicia()">
    <h1 id="tempo"><?php
    if ($tempo == null) {
        echo "0";
    } else {
        echo $tempo;
    }
    ?></h1><br>

    <script>

        // função do cronômetro

        let tempo = 0;
        let timer;
        let crocheck = 1;

        function inicia(){
            if (crocheck == 1) {
            crocheck=0 
            tempo=0
            timer = setInterval(() => {
                tempo += 0.01;
                document.getElementById('tempo').innerHTML = tempo.toFixed(2);
            }, 10);
            document.getElementById('tempo').style.color = 'black'
            document.getElementById('tempo_comeca').style.visibility = 'hidden'
            } else {
            crocheck=1
            clearInterval(timer);
            window.location.href = '/qblearning/cronometro.php?tempo='+tempo.toFixed(2)
            }
        }

        function cor_cron(){
            if (crocheck == 1) {
                document.getElementById('tempo').style.color = 'blue'
            }
        }

    </script>

<div id="tempo_comeca">
<div class="container tabela_tempos">
    <table class="table table-striped">  
        <tr>
            <th>Código</td>
            <th>Tempo</td>
        </tr>
        <?php
        $sql1 = "SELECT * FROM tempos WHERE id_usuario='$id_usuario'";
        $query = mysqli_query($conn, $sql1);
        while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['cod'] ?></td>
                <td><?php echo $dados['tempo'] ?></td>
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
            <td><?php echo $media_5 ?></td>
        </tr>
        <tr>
            <td>Melhor média de 5:</td>
            <td><?php echo $melhormedia_5 ?></td>
        </tr>
        <tr>
            <td>Média de 12:</td>
            <td><?php echo $media_12 ?></td>
        </tr>
        <tr>
            <td>Melhor média de 12:</td>
            <td><?php echo $melhormedia_12 ?></td>
        </tr>
    </table>
</div>

<div class="espaco_comecar">
    <h5>Pressione e segure espaço para começar</h5>
</div>
</div>

</body>
</html>