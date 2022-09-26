<?php session_start(); ?>
<html>
<?php include('config.php');
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM cubos WHERE id_usuario='$id_usuario'";
$query = mysqli_query($conn, $sql);
?>
<head>
<link rel="stylesheet" href="css.css">
<title>Coleção - QBLearning</title>
</head>

<body>
    <h1 class="titulo">Coleção</h1>
    <a class="btn btn-primary colbtn" href="cadastrar_cubo.php">Cadastrar novo cubo</a>

    <table class='table table-hover'>
        <tr>
            <td>Tipo de Cubo</td>
            <td>Modelo</td>
            <td>Data de manutenção</td>
            <td>Data de aquisição</td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['tipo_cubo'] ?></td>
                <td><?php echo $dados['modelo'] ?></td>
                <td><?php echo $dados['manutencao'] ?></td>
                <td><?php echo $dados['aquisicao'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>