<?php session_start(); ?>
<html>
<?php 
include('config.php');
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$tipo_cubo = "3x3";
$tempo = $_GET['tempo'];
if ($tempo != null) {
    $sql = "INSERT INTO tempos (id_usuario, tipo_cubo, tempo) 
            VALUES ('$id_usuario', '$tipo_cubo', '$tempo')";
    mysqli_query($conn, $sql);
}
?>
<head>
<link rel="stylesheet" href="css.css">
<title>Cronômetro - QBLearning</title>
</head>

<body onkeyup="inicia()">
    <h1 id="tempo"><?php
    if ($tempo == null) {
        echo "0";
    } else {
        echo $tempo;
    }
    ?></h1><br>
    <script>
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
            } else {
            crocheck=1
            clearInterval(timer);
            window.location.href = '/qblearning/cronometro.php?tempo='+tempo.toFixed(2)
            }
        }
    </script>

<div class="container tabela_tempos">
    <table class="table table-hover">
        <tr>
            <td>Código</td>
            <td>Tempo</td>
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

</body>
</html>